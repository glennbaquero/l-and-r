<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Omnipay\Omnipay;
use App\Http\Requests\Payments\AuthorizeNetPaymentStoreRequest;
use App\Http\Requests\Reservation\ReservationRequest;

use App\Http\Resources\TicketCollection;
use App\Http\Fetch\TicketFetch;

use App\Http\Fetch\PreprocessTicketFetch;
use App\Http\Resources\PreprocessTicketCollection;

use App\Actions\Tickets\TicketCreateOrUpdateAction;

use Illuminate\Validation\ValidationException;

use App\Notifications\NotifyPassenger;
use App\Notifications\TicketNotifyPassenger;
use App\Notifications\ThankYouNotification;

use App\Models\Ticket;
use App\Models\TicketType;
use App\Models\City;
use App\Models\Stop;
use App\Models\Trip;
use App\Models\TripTime;
use App\Models\Passenger;
use App\Models\Price;
use App\Models\Coupon;
use App\Models\Voucher;
use App\Models\Route;
use App\Models\PreprocessTicket;
use App\Models\Bus;
use App\Models\AuthorizeNetPayment;

use Log;
use Carbon\Carbon;
use DB;
use Session;

class TicketController extends Controller
{    
	protected $fetch;
    protected $preprocess_fetch;

    /**
     * Create new controller instance
     * 
     * @return void
     */
    public function __construct(TicketFetch $fetch, PreprocessTicketFetch $preprocess_fetch)
    {
        $this->middleware('App\Http\Middleware\TicketMiddleware', ['only' => ['index']]);
        $this->middleware('App\Http\Middleware\DriverAuthMiddleware', ['only' => ['validateTransactionNumber', 'transactionNumberPage', 'scanTicketQR']]);
        $this->fetch = $fetch;
        $this->preprocess_fetch = $preprocess_fetch;
    }

    /**
     * Show users index page
     * 
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $existing_cash = $user->cashes()->where('office_id', $user->office_id)->whereDate('created_at', now())->first();

        if(! $existing_cash) {  
            return redirect()->route('open-cash.index');
        } 

        return view('pages.ticket.index', [
            'headers' => TicketCollection::$headers,
            'searches' => TicketCollection::$searches,
            'cities' => City::orderby('name', 'asc')->get(),
            'ticket_types' => TicketType::get(),
        ]);
    }

    /**
     * Fetch all users
     * 
     * @return Illuminate\Http\Response
     */
    public function fetch($office_id = null, $office_view = null)
    {

        if($office_id) {
            request()->request->add(['office_id' => $office_id]);
        }

        if($office_view) {
            request()->request->add(['office_view' => true]);
        } else {
            request()->request->add(['office_view' => false]);
        }

        if(auth()->guard('web_user')->check()) {
            request()->request->add(['web_user_id' => auth()->guard('web_user')->user()->id]);
        }

        return new TicketCollection($this->fetch->execute(request()->input()));
    }

    /**
     * Fetch all users
     * 
     * @return Illuminate\Http\Response
     */
    public function fetchPreprocessTicket($office_id = null, $office_view = null)
    {

        if($office_id) {
            request()->request->add(['office_id' => $office_id]);
        }

        if($office_view) {
            request()->request->add(['office_view' => true]);
        } else {
            request()->request->add(['office_view' => false]);
        }
        return new PreprocessTicketCollection($this->preprocess_fetch->execute(request()->input()));
    }

    /**
     * Find available trip from selected departure and arrival
     *
     * @return array $trips
     */
    
    public function findAvailableTrip(Request $request)
    {
        $departure = $request->departure_id;
        $arrival = $request->arrival_id;

        $stops = Stop::where('departure_id', $departure)->get();

        $trips = [];
        $available_dates = [];
        $buses = [];

        $start_of_day = now()->startOfDay()->format('H:i:s');
        $end_of_day = now()->endOfDay()->format('H:i:s');

        foreach ($stops as $departure_stop) {
            // if($departure_stop->route->stops()->where('arrival_id', $arrival)->whereTime('schedule_start', '>=', now())->whereTime('schedule_end', '<=', now())->count()) {
            if($departure_stop->route->stops()->where('arrival_id', $arrival)->whereTime('schedule_start', '>=', $start_of_day)->whereTime('schedule_end', '<=', $end_of_day)->count()) {
                // $arrival_stops = $departure_stop->route->stops()->where('arrival_id', $arrival)->whereTime('schedule_start', '>=', now())->whereTime('schedule_end', '<=', now())->get();
                $arrival_stops = $departure_stop->route->stops()->where('arrival_id', $arrival)->whereTime('schedule_start', '>=', $start_of_day)->whereTime('schedule_end', '<=', $end_of_day)->get();
                foreach ($arrival_stops as $stop) {
                    if(!collect($trips)->contains('route', $stop->route)) {
                        $availableTrips = $stop->route->trips()->where('date', '>=', now());
                        if($availableTrips->count()) {
                            if(!collect($trips)->contains('trips', $availableTrips->get())) {
                                array_push($trips, [
                                    'route' => $stop->route,
                                    'trips' => $availableTrips->orderby('date', 'asc')->get(),
                                ]);   

                                $available_dates = $availableTrips->distinct()->pluck('date');
                                // $buses = $availableTrips->pluck('bus_id')->toArray();
                            }

                        }
                    }
                }
            }
        }

        $buses = array_unique($buses);

        $price = Price::where('departure_id', $departure)->where('arrival_id', $arrival)->first();

        if(!$price && $request->filled('departure_id') && $request->filled('arrival_id')) {
            throw ValidationException::withMessages([
                'error' => ['No available price for the selected departure to arrival.']
            ]);
        }

        return response()->json([
            'trips' => $trips,
            'price' => $price,
            // 'buses' => Bus::whereIn('id', $buses)->get(),
            'available_dates' => $available_dates
        ]);

    }

    /**
     * get all the trip time
     *
     * @return array $trips
     */
    
    public function getTripTime(Request $request)
    {
        $trips = Trip::whereIn('id', $request->trip_ids)->where('bus_id', $request->bus_id)->pluck('id');
        $time = TripTime::with('trip')->whereIn('trip_id', $trips)->get();


        if($request->filled('public_reservation')) {
            foreach($time as $_time) {
                $_time['available_seat'] = $this->getAvailableSeat($_time->id, $request)->original['available_seat'];
            }    
        }

        return response()->json([
            'time' => $time
        ]);
    }

    public function getAvailableSeat($time, $request) 
    {

        $time = TripTime::find($time);
        $trip = Trip::find($time->trip_id);
        $rows = $time->bus->bus_model->bus_rows;
        $available_seat = 0;

        foreach ($rows as $row) {
           $data = $this->renderBusModel($row, $trip, $request);

           $available_seat += $data;

        }

        return response()->json([
            'available_seat' => $available_seat
        ]);
    }

    public function getAvailableBus(Request $request)
    {
        $bus_ids = Trip::whereIn('id', $request->trip_ids)->pluck('bus_id');
        $buses = Bus::whereIn('id', $bus_ids)->get();
        return response()->json([
            'buses' => $buses
        ]);
    }

    /**
     * Fetch bus from selected trip
     *
     * @return array $trips
     */
    
    public function getBus(Request $request)
    {
        $time = TripTime::find($request->time_id);
        $trip = Trip::find($time->trip_id);

        // $rows = $trip->bus->bus_model->bus_rows;
        $rows = $time->bus->bus_model->bus_rows;
        $bus_model = [];
        $available_seat = 0;

        foreach ($rows as $row) {
           $data = $this->renderBusModel($row, $trip, $request);

           $available_seat += $data;
           array_push($bus_model, $row->bus_columns);

        }

        return response()->json([
            'bus_model' => $bus_model,
            'bus' => $time->bus,
            'available_seat' => $available_seat
        ]);

    }

    public function renderBusModel($row, $trip, $request) {

        $response = [];
        $arrival_ids = array_values(array_unique($trip->tickets->pluck('arrival_id')->toArray()));
        $destination_ids = array_values(array_unique($trip->tickets->pluck('destination_id')->toArray()));
        $passenger_seat = 0;

        foreach ($row->bus_columns as $column) {

            foreach($trip->tickets as $key => $ticket) {
                $last_stop = $trip->route->stops()->latest()->orderby('id', 'desc')->first();

                if($last_stop->arrival_id === $ticket->arrival_id) {
                    if($ticket->bus_model_column_id == $column->id) {
                        $column['passenger'] = $ticket->passenger;

                        if($ticket->payment_method == 'Cash' || $ticket->payment_method == 'Credit Card' || $ticket->payment_method == 'External Credit Card' ) {
                            // $column->image_path = url('icons/seat_sold.png');
                             $column->image_path = url('icons/sold_seat.png');
                        } elseif ($ticket->payment_method == 'Reservation') {
                            $column->image_path = url('icons/seat_reserve.png');
                            // $column->image_path = url('icons/reserved_seat.png');
                        }

                        $column->is_reserved = true;
                    }
                } elseif ($ticket->arrival_id == $request->arrival_id) {
                    if($ticket->bus_model_column_id == $column->id) {
                        $column['passenger'] = $ticket->passenger;

                        if($ticket->payment_method == 'Cash' || $ticket->payment_method == 'Credit Card' || $ticket->payment_method == 'External Credit Card') {
                            // $column->image_path = url('icons/seat_sold.png');
                            $column->image_path = url('icons/sold_seat.png');
                        } elseif ($ticket->payment_method == 'Reservation') {
                            $column->image_path = url('icons/seat_reserve.png');
                            // $column->image_path = url('icons/reserved_seat.png');
                        }
                        $column->is_reserved = true;
                    }
                }


                if($ticket->departure_id == $request->departure_id && $ticket->arrival_id == $request->arrival_id) {
                    if($ticket->bus_model_column_id == $column->id) {
                        $column['passenger'] = $ticket->passenger;

                        if($ticket->payment_method == 'Cash' || $ticket->payment_method == 'Credit Card' || $ticket->payment_method == 'External Credit Card') {
                            // $column->image_path = url('icons/seat_sold.png');
                            $column->image_path = url('icons/sold_seat.png');
                        } elseif ($ticket->payment_method == 'Reservation') {
                            $column->image_path = url('icons/seat_reserve.png');
                            // $column->image_path = url('icons/reserved_seat.png');
                        }
                        $column->is_reserved = true;
                    }
                } 

                if($ticket->arrival_id == $request->departure_id) {
                    if($ticket->bus_model_column_id == $column->id) {
                        // $column['passenger'] = $ticket->passenger;

                        $column->image_path = url('icons/seat_double_sold.png');
                        // $column->image_path = url('icons/fixed_seat.png');
                    }
                }
            }

            if(str_contains($column->image_path, 'seat_available' ) || str_contains($column->image_path, 'icons/seat.png' )) {
                $passenger_seat += 1;
            }
        }

        // dd($passenger_seat);

        return $passenger_seat;
    }

    /**
     * Fetch passenger
     *
     * @return array $trips
     */
    
    public function getPassenger(Request $request)
    {
        $passengers = [];
        if($request->filled('search')) {
            $passengers = Passenger::select(['phone_number', 'first_name', 'last_name', 'gender', 'cellphone_number', 'email', 'ticket_type_id', 'with_infant', 'infant_firstname', 'infant_lastname', 'infant_gender', 'cellphone_number'])->whereLike('phone_number', $request->search)->orWhereLike('last_name', $request->search)->orWhereLike('first_name', $request->search)->distinct('phone_number')->get();
        }

        return response()->json([
            'passengers' => $passengers
        ]);

    }

    public function printTicket($id, $passenger, $arrival, $departure, $preprocess=false) 
    {
        if($preprocess) {
            $ticket = PreprocessTicket::where('ticket_number', $id)->first();
        } else {
            $ticket = Ticket::where('ticket_number', $id)->first();
        }


        $departure = $ticket->departure->name;
        $arrival = $ticket->arrival->name;

        if($ticket->departure->offices()->where('office_type_id', 6)->count()) {
            $departure = $ticket->departure->offices()->where('office_type_id', 6)->first()->address_line_1;
        }

        if($ticket->arrival->offices()->where('office_type_id', 6)->count()) {
            $arrival = $ticket->arrival->offices()->where('office_type_id', 6)->first()->address_line_1;
        }

        return view('pages.ticket.print', [
            'ticket' => $ticket,
            'departure' => $departure,
            'arrival' => $arrival,
        ]);
    }

    public function webPrintTicket($id, $passenger, $arrival, $departure, $preprocess=false) 
    {
        if($preprocess) {
            $ticket = PreprocessTicket::where('ticket_number', $id)->first();
        } else {
            $ticket = Ticket::where('ticket_number', $id)->first();
        }


        $departure = $ticket->departure->name;
        $arrival = $ticket->arrival->name;

        if($ticket->departure->offices()->where('office_type_id', 6)->count()) {
            $departure = $ticket->departure->offices()->where('office_type_id', 6)->first()->address_line_1;
        }

        if($ticket->arrival->offices()->where('office_type_id', 6)->count()) {
            $arrival = $ticket->arrival->offices()->where('office_type_id', 6)->first()->address_line_1;
        }

        return view('public.pages.print', [
            'ticket' => $ticket,
            'departure' => $departure,
            'arrival' => $arrival,
        ]);
    }

    public function scanTicketQR($id, $passenger, $arrival, $departure) 
    {
        $ticket = Ticket::where('ticket_number', $id)->first();
        $ticket->update([
            'boarding_status' => 'On Board',
            'payment_status' => 'Paid',
        ]);

        return response()->json([
            'success' => true
        ]);
    }


    public function couponValidate(Request $request)
    {
        $dayOfTrip = Carbon::parse($request->trip_date)->format('l');

        $coupon = Coupon::where('code', $request->code)->where('trip_date', '<=', $request->trip_date)->where('trip_end_date', '>=', $request->trip_date)->whereNotIn('coupon_available', [0])->first();

        if(!$coupon) {
            return response()->json([
                'title' => 'Coupon validate failed!',
                'message' => 'Sorry, the code is not available.',
                'success' => false
            ]);
        }

        $validateRouteisAvailable = $coupon->routes()->where('route_id', $request->route_id)->count();

        if(!$validateRouteisAvailable && $coupon->apply_to != 'All Routes') {
            return response()->json([
                'title' => 'Coupon validate failed!',
                'message' => 'Sorry, the code is not available.',
                'success' => false
            ]);
        }

        $trip_days = is_array($coupon->trip_days) ? $coupon->trip_days : json_decode($coupon->trip_days);

        foreach ($trip_days as $key => $available_day) {
            if($dayOfTrip == $available_day) {

                $discount = 0;

                switch ($coupon->coupon_type) {
                    case 'Percentage':
                        $discount = $coupon->value / 100;
                        break;
                    
                    default:
                        $discount = $coupon->value;
                        break;
                }

                return response()->json([
                    'coupon' => $coupon,
                    'discount' => $discount,
                    'success' => true,
                    'title' => 'Coupon validate success!',
                    'message' => 'Coupon applied!'
                ]);
            }
        }

        return response()->json([
            'title' => 'Coupon validate failed!',
            'message' => 'Sorry, the code is not available.',
            'success' => false
        ]);
    }

    public function passengerEmailSender(Request $request, $id)
    {
        $passenger = Passenger::withTrashed()->findOrFail($id);
        $passenger->notify(new NotifyPassenger($request->message, $request->subject));


        return response()->json([
            'message' => 'sent successfully',
            'success' => true
        ]);
    }

    public function registerPayment(Request $request) 
    {
        $tickets = Ticket::whereIn('id', $request->ids)->get();

        foreach($tickets as $ticket) {
            $ticket->update([
                'is_registered_payment' => true
            ]);
        }
        

        return response()->json([
            'message' => 'Registered successfully',
            'success' => true
        ]);
    }


    // public function voucherValidate(Request $request)
    // {

    //     $voucher = Voucher::where('code', $request->code)->whereDate('expiration_date', '>', $request->trip_date)->first();

    //     if(!$voucher) {
    //         return response()->json([
    //             'title' => 'Voucher validate failed!',
    //             'message' => 'Sorry, the code is not available.',
    //             'success' => false
    //         ]);
    //     }

    //     if($voucher->passenger->fullname == $request->passenger) {
    //         /**
    //          * @ToDo passenger id in ticket model so that we can summarize the voucher used via tickets
    //          */
    //         $voucher_used_by_passenger = Ticket::where('voucher_code', $request->code)->count();

    //         if($voucher->type_of_voucher === 'Max. Ticket % Discount') {

    //             if($voucher_used_by_passenger < $voucher->max_no_of_discount_ticket) {
    //                 $discount = $voucher->discount_percent / 100;
    //             } else {
    //                 return response()->json([
    //                     'title' => 'Voucher validate failed!',
    //                     'message' => 'Sorry, the code is reached the max usage.',
    //                     'success' => false
    //                 ]);
    //             }

    //         } else {
    //             $discount = $voucher->amount;
    //         }

    //         return response()->json([
    //             'voucher' => $voucher,
    //             'discount' => $discount,
    //             'success' => true,
    //             'title' => 'Voucher validate success!',
    //             'message' => 'Voucher applied!'
    //         ]);
    //     } else {
    //         return response()->json([
    //             'title' => 'Voucher validate failed!',
    //             'message' => 'Sorry, the code is not for the passenger.',
    //             'success' => false
    //         ]);
    //     }


    //     return response()->json([
    //         'title' => 'Voucher validate failed!',
    //         'message' => 'Sorry, the code is not available.',
    //         'success' => false
    //     ]);
    // }


    public function ticketConfirmation($id, $passenger, $arrival, $departure) 
    {
        $ticket = PreprocessTicket::where('ticket_number', $id)->first();
        $departure = $ticket->departure->name;
        $arrival = $ticket->arrival->name;

        if($ticket->departure->offices()->where('office_type_id', 6)->count()) {
            $departure = $ticket->departure->offices()->where('office_type_id', 6)->first()->address_line_1;
        }

        if($ticket->arrival->offices()->where('office_type_id', 6)->count()) {
            $arrival = $ticket->arrival->offices()->where('office_type_id', 6)->first()->address_line_1;
        }

        $payloads['id'] = $ticket->id;

        $trip_time = $ticket->trip_time ? $ticket->trip_time->formatted_time : now()->format('h:i A');
        $travel_date = Carbon::parse($ticket->trip->date)->format('F d, Y').' '.$trip_time;

        if($ticket->confirmed && $ticket->confirmation_date) {
            return redirect()->route('ticket.verified');
        }

        return view('pages.ticket.show', [ 
            'ticket' => $ticket, 
            'departure' => $departure, 
            'arrival' => $arrival,
            'travel_date' => $travel_date,
            'payloads' => collect($payloads),
        ]);
    }


    public function confirmedTicket(Request $request) 
    {
        $ticket = PreprocessTicket::where('ticket_number', $id)->first();
        DB::beginTransaction();
            $ticket->update([
                'confirmed' => true,
                'confirmation_date' => now() 
            ]);

            $ticket = Ticket::create([
                'passenger_id' => $ticket->passenger_id,
                'seller_id' => $ticket->seller_id,
                'arrival_id' => $ticket->arrival_id,
                'departure_id' => $ticket->departure_id,
                'trip_id' => $ticket->trip_id,
                'bus_model_column_id' => $ticket->bus_model_column_id,
                'number_of_ticket' => $ticket->number_of_ticket,
                // 'reservation_code' => $ticket->reservation_code,
                'reservation_date' => $ticket->reservation_date,
                'purchase_date' => $ticket->purchase_date,
                'voucher_code' => $ticket->voucher_code,
                'payment_method' => $ticket->payment_method,
                'total_sale' => $ticket->total_sale,
                'boarding_status' => $ticket->boarding_status,
                'payment_status' => $ticket->payment_status,
                'is_cancelled' => $ticket->is_cancelled,
                'new_seat_id' => $ticket->new_seat_id,
                'is_registered_payment' => $ticket->is_registered_payment,
                'office_id' => $ticket->office_id,
            ]);

            $route = route('ticket.print', [$ticket->id, $ticket->passenger->fullname, $ticket->arrival->name, $ticket->departure->name]);
            
            $ticket->passenger->notify(new TicketNotifyPassenger('Your reservation is confirmed, you can download here the copy of your ticket.', $route));
        DB::commit();


        return response()->json([
            'success' => true,
            'header'=> 'Your reservation is confirmed, you can download the copy of your ticket in your email. Thank you!'
        ]);
    }

    public function ticketVerified() 
    {
        return view('pages.ticket.verified');
    }

    public function ticketStatus($status, $id = null, $passenger = null, $arrival = null, $departure = null) 
    {
        $ticket = null;
        $travel_date = null;
        $route = route('ticket.status', ['not yet been process']);
        $stops = [];

        if($status == 'paid') {
            $ticket = Ticket::where('ticket_number', $id)->first();
            $trip_time = $ticket->trip_time ? $ticket->trip_time->formatted_time : now()->format('h:i A');
            $travel_date = Carbon::parse($ticket->trip->date)->format('F d, Y').' '.$trip_time;
            $route = $ticket->updateStatusUrl();

            $stops = $ticket->trip->route->stops;
            $route_name = $ticket->trip->route->name;

            $per_stop_name = [];

            foreach($stops as $stop) {
                if($stop->arrival->id == $ticket->arrival_id) {
                    $per_stop_name[] = [
                        'departure' => $stop->departure->name,
                        'arrival' => $stop->arrival->name,
                    ];
                    break;
                } else {
                    $per_stop_name[] = [
                        'departure' => $stop->departure->name,
                        'arrival' => $stop->arrival->name,
                    ];
                }
            }

        }

        return view('pages.ticket.status', [
            'status' => $status,
            'ticket' => $ticket,
            'travel_date' => $travel_date,
            'route' => $route,
            'stops' => $per_stop_name,
            'route_name' => $route_name,
        ]);
    }

    public function transactionNumberPage()
    {
        return view('pages.qr.enter-transaction');
    }

    public function validateTransactionNumber(Request $request)
    {
        $ticket = Ticket::where('transaction_number', $request->transaction_number)->orWhere('ticket_number', $request->transaction_number)->first();
        
        $ticket->update([
            'boarding_status' => 'On Board',
            'payment_status' => 'Paid',
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function notifyPassenger(Request $request)
    {
        $ticket = Ticket::find($request->id);
        
        if($request->action != 'Print only') {
            $ticket->passenger->notify(new ThankYouNotification($ticket));
        }

        $route = route('ticket.print', [$ticket->ticket_number, $ticket->passenger->fullname, $ticket->arrival->name, $ticket->departure->name]);

        return response()->json([
            'print_url' => $route
        ]);
    }

    // ReservationRequest
    public function seatPayment(Request $request)
    {
        Log::info('Payment Running...');
        try {   
            $errors = [];

            if(empty($request->passenger['payment']['card_number'])) {
                $errors['card_number'] = 'Card number is required.';
            }  

            if(empty($request->passenger['payment']['expiry_month'])) {
                $errors['expiry_month'] = 'Card expiry month is required.';
            }

            if(empty($request->passenger['payment']['expiry_year'])) {
                $errors['expiry_year'] = 'Card expiry year is required.';
            }
            if(empty($request->passenger['payment']['cvv'])) {
                $errors['cvv'] = 'Card cvv is required.';
            }

            foreach($request->seat_selected_list as $seat_selected) {

                if(empty($seat_selected['passenger']['first_name']) || $seat_selected['passenger']['first_name'] == '' || !isset($seat_selected['passenger']['first_name'])) {
                    $errors['first_name'] = 'Passenger first name is required.';
                }

                if(empty($seat_selected['passenger']['last_name']) || $seat_selected['passenger']['last_name'] == '' || !isset($seat_selected['passenger']['last_name'])) {
                    $errors['last_name'] = 'Passenger last name is required.';
                }

                if(empty($seat_selected['passenger']['email']) || $seat_selected['passenger']['email'] == '' || !isset($seat_selected['passenger']['email'])) {
                    $errors['email'] = 'Passenger email is required.';
                } else {
                    if(!filter_var($seat_selected['passenger']['email'], FILTER_VALIDATE_EMAIL)) {
                        $errors['email'] = 'Passenger email is not valid.';
                    }
                }


                if(empty($seat_selected['passenger']['gender']) || $seat_selected['passenger']['gender'] == 'none' || !isset($seat_selected['passenger']['gender'])) {
                    $errors['gender'] = 'Passenger gender is required.';
                }
                if(empty($seat_selected['passenger']['cellphone_number']) || $seat_selected['passenger']['cellphone_number'] == 'none' || !isset($seat_selected['passenger']['cellphone_number'])) {
                    $errors['cellphone_number'] = 'Passenger cellphone number is required.';
                }
                
                if($seat_selected['passenger']['with_infant']) {
                    if(empty($seat_selected['passenger']['infant_firstname']) || $seat_selected['passenger']['infant_firstname'] == 'none' || !isset($seat_selected['passenger']['infant_firstname'])) {
                        $errors['infant_firstname'] = 'Passenger infant first name is required.';
                    }

                    if(empty($seat_selected['passenger']['infant_firstname']) || $seat_selected['passenger']['infant_firstname'] == 'none' || !isset($seat_selected['passenger']['infant_firstname'])) {
                        $errors['infant_lastname'] = 'Passenger infant last name is required.';
                    }

                    if(empty($seat_selected['passenger']['infant_gender']) || $seat_selected['passenger']['infant_gender'] == 'none' || !isset($seat_selected['passenger']['infant_gender'])) {
                        $errors['infant_gender'] = 'Passenger infant gender is required.';
                    }
                }
            }

            if(!empty($errors)) {
                 throw ValidationException::withMessages($errors);
            }


            $credit_card = new \Omnipay\Common\CreditCard([
                'number' => $request->passenger['payment']['card_number'],
                'expiryMonth' => $request->passenger['payment']['expiry_month'],
                'expiryYear' => $request->passenger['payment']['expiry_year'],
                'cvv' => $request->passenger['payment']['cvv'],
            ]);

            $transaction_id = rand(100000000, 999999999).''.time();

            $gateway = Omnipay::create('AuthorizeNetApi_Api');
            $gateway->setAuthName(config('authorizenet.login_id'));
            $gateway->setTransactionKey(config('authorizenet.transaction_key'));
            $gateway->setTestMode(config('authorizenet.test_mode'));

            $response = $gateway->authorize([
                'amount' => $request->amount,
                'currency' => 'USD',
                'transactionId' => $transaction_id,
                'card' => $credit_card
            ])->send();

            Log::info('Response : '. $response->isSuccessful());

            if($response->isSuccessful()) {
                $transaction_reference = $response->getTransactionReference();
                Log::info('Transaction Reference : '. $transaction_reference);

                $response = $gateway->capture([
                    'amount' => $request->amount,
                    'currency' => 'USD',
                    'transctionReference' => $transaction_reference
                ])->send();
                // $transaction_id = $response->getTransactionReference();

                $amount = $request->amount;

                DB::beginTransaction();
                    foreach($request->seat_selected_list as $seat_selected) {

                        if(empty($seat_selected['passenger']['first_name']) || $seat_selected['passenger']['first_name'] == '' || !isset($seat_selected['passenger']['first_name'])) {
                            throw ValidationException::withMessages([
                                'first_name' => ['Passenger first name is required.']
                            ]);
                        }

                        if(empty($seat_selected['passenger']['last_name']) || $seat_selected['passenger']['last_name'] == '' || !isset($seat_selected['passenger']['last_name'])) {
                            throw ValidationException::withMessages([
                                'last_name' => ['Passenger last name is required.']
                            ]);
                        }

                        if(empty($seat_selected['passenger']['email']) || $seat_selected['passenger']['email'] == '' || !isset($seat_selected['passenger']['email'])) {
                            throw ValidationException::withMessages([
                                'email' => ['Passenger email is required.']
                            ]);
                        }

                        if(empty($seat_selected['passenger']['gender']) || $seat_selected['passenger']['gender'] == 'none' || !isset($seat_selected['passenger']['gender'])) {
                            throw ValidationException::withMessages([
                                'gender' => ['Passenger gender is required.']
                            ]);
                        }
                        if(empty($seat_selected['passenger']['cellphone_number']) || $seat_selected['passenger']['cellphone_number'] == 'none' || !isset($seat_selected['passenger']['cellphone_number'])) {
                            throw ValidationException::withMessages([
                                'cellphone_number' => ['Passenger cellphone number is required.']
                            ]);
                        }
                        
                        if($seat_selected['passenger']['with_infant']) {
                            if(empty($seat_selected['passenger']['infant_firstname']) || $seat_selected['passenger']['infant_firstname'] == 'none' || !isset($seat_selected['passenger']['infant_firstname'])) {
                                throw ValidationException::withMessages([
                                    'infant_firstname' => ['Passenger ifant first name is required.']
                                ]);
                            }

                            if(empty($seat_selected['passenger']['infant_firstname']) || $seat_selected['passenger']['infant_firstname'] == 'none' || !isset($seat_selected['passenger']['infant_firstname'])) {
                                throw ValidationException::withMessages([
                                    'infant_firstname' => ['Passenger infant first name is required.']
                                ]);
                            }

                            if(empty($seat_selected['passenger']['infant_gender']) || $seat_selected['passenger']['infant_gender'] == 'none' || !isset($seat_selected['passenger']['infant_gender'])) {
                                throw ValidationException::withMessages([
                                    'infant_gender' => ['Passenger infant gender is required.']
                                ]);
                            }
                        }
                        


                        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $rand_char = substr(str_shuffle($permitted_chars), 0, 6);
                        $request['ticket_number'] = 'FDN-'.$rand_char;
                        $passenger = Passenger::create([
                            'trip_id' => $request->trip_id,
                            'bus_model_column_id' => $seat_selected['id'],
                            'first_name' => $seat_selected['passenger']['first_name'],
                            'last_name' => $seat_selected['passenger']['last_name'],
                            'arrival_city_id' => $request->arrival_id,
                            // 'ticket_type_id' => $seat_selected['passenger']['ticket_type']['id'],
                            'email' => $seat_selected['passenger']['email'],
                            'phone_number' => '+1'. str_replace(['(', ')', '-', ' '], '', $seat_selected['passenger']['cellphone_number']),
                            'gender' => $seat_selected['passenger']['gender'],
                            'with_infant' => $seat_selected['passenger']['with_infant'],
                            'infant_firstname' => $seat_selected['passenger']['infant_firstname'],
                            'infant_lastname' => $seat_selected['passenger']['infant_lastname'],
                            'infant_gender' => $seat_selected['passenger']['infant_gender'],
                            'no_of_bags' => $seat_selected['passenger']['no_of_bags'],
                            // 'luggage_no' => $request->passenger['luggage_no'],
                            'cellphone_number' => $seat_selected['passenger']['cellphone_number'],
                        ]);
                        
                        $request['passenger_id'] = $passenger->id;

                        $ticket = Ticket::create([
                            'passenger_id' => $request->passenger_id,
                            'arrival_id' => $request->arrival_id,
                            'departure_id' => $request->departure_id,
                            'trip_id' => $request->trip_id,
                            'bus_model_column_id' => $seat_selected['id'],
                            'number_of_ticket' => $request->number_of_ticket,
                            'total_sale' => $request->amount,
                            'payment_method' => 'Credit Card',
                            'purchase_date' => now(),
                            'trip_time_id' => $request->trip_time_id,
                            'driver_id' => $request->driver_id,
                            'type_of_ticket' => $seat_selected['passenger']['ticket_type'],
                            'ticket_number' => $request->ticket_number,
                            'web_user_id' => auth()->guard('web_user')->check() ? auth()->guard('web_user')->user()->id : null
                        ]);

                        // $payment_exist = AuthorizeNetPayment::where('transaction_id', $transaction_reference)->first();

                        // if(!$payment_exist) {
                            AuthorizeNetPayment::create([
                                'transaction_id' => $transaction_reference,
                                'amount' => $request->amount,
                                'currency' => 'USD',
                                'payment_status' => 'Captured',
                                'ticket_id' => $ticket->id,
                                'passenger_id' => $ticket->passenger->id,
                            ]);
                        // }

                        $print_route = route('web.ticket.print', [ $ticket->ticket_number, $ticket->passenger->fullname, $ticket->arrival->name, $ticket->departure->name ]);
                        $email_print_route = route('ticket.print', [ $ticket->ticket_number, $ticket->passenger->fullname, $ticket->arrival->name, $ticket->departure->name ]);
                        $message = 'Your ticket has benn paid, you can print the ticket information here';

                        $ticket->passenger->notify(new TicketNotifyPassenger($message, $email_print_route));
                    }
                DB::commit();
                
                
                
                session()->forget('saved_payload');

                return response()->json([
                    'success' => true,
                    'message' => 'We sent the ticket info in the email you entered. Thank you!',
                    'title' => 'Payment successful',
                    'redirect' => route('ticket.status', [ 'paid', $ticket->ticket_number, $ticket->passenger->fullname, $ticket->arrival->name, $ticket->departure->name ]),
                    'print_route' => $print_route
                ]);
            } else {
                Log::info('Failed Response : '. $response->getMessage());
                return $response->getMessage();
            }
        } catch (Exception $e) {
            Log::info('Catch Error Response : '. $e->getMessage());
            return $e->getMessage();
        }
    }

    public function savePayload(Request $request) 
    {
        session(['saved_payload' => $request->all()]);

        return response()->json([
            'route' => route('web.trip-seat')
        ]);
    }
}
