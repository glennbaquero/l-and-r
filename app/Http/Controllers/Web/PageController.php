<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function tripSeatPage()
    {
        $period = \Carbon\CarbonPeriod::create('now', '12 months', 25);
        $years = [];

        foreach($period as $date) {
            $years[$date->format('y')] = $date->format('Y');
        }

        $saved_payload = null;

        if(session()->has('saved_payload')) {
            $saved_payload = session()->get('saved_payload');
            // dd($saved_payload);
        }

        return view('public.pages.trip-seat-selection', [
            'years' => json_encode($years),
            'ticket_types' => \App\Models\TicketType::get(),
            'saved_payload' => json_encode($saved_payload),
        ]);
    }

    public function dashboardPage()
    {
        return view('public.pages.dashboard');
    }

    public function paymentPage()
    {
        return view('public.pages.payment');
    }
}
