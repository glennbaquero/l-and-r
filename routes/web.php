<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LocaleController;

use App\Http\Controllers\OfficeController;
use App\Http\Controllers\Offices\OfficeCreateController;
use App\Http\Controllers\Offices\OfficeUpdateController;
use App\Http\Controllers\Offices\OfficeDeleteController;

use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\Currencies\CurrencyCreateController;
use App\Http\Controllers\Currencies\CurrencyUpdateController;
use App\Http\Controllers\Currencies\CurrencyDeleteController;

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\Companies\CompanyCreateController;
use App\Http\Controllers\Companies\CompanyUpdateController;
use App\Http\Controllers\Companies\CompanyDeleteController;

use App\Http\Controllers\TicketTypeController;
use App\Http\Controllers\TicketTypes\TicketTypeCreateController;
use App\Http\Controllers\TicketTypes\TicketTypeUpdateController;
use App\Http\Controllers\TicketTypes\TicketTypeDeleteController;

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Services\ServiceCreateController;
use App\Http\Controllers\Services\ServiceUpdateController;
use App\Http\Controllers\Services\ServiceDeleteController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\Users\UserCreateController;
use App\Http\Controllers\Users\UserUpdateController;
use App\Http\Controllers\Users\UserDeleteController;

use App\Http\Controllers\GroupController;
use App\Http\Controllers\Groups\GroupCreateController;
use App\Http\Controllers\Groups\GroupUpdateController;
use App\Http\Controllers\Groups\GroupDeleteController;

use App\Http\Controllers\GroupPrivilegeController;
use App\Http\Controllers\GroupPrivileges\GroupPrivilegeUpdateController;

use App\Http\Controllers\GroupMessageController;
use App\Http\Controllers\GroupMessages\GroupMessageCreateController;
use App\Http\Controllers\GroupMessages\GroupMessageUpdateController;
use App\Http\Controllers\GroupMessages\GroupMessageDeleteController;

use App\Http\Controllers\DriverController;
use App\Http\Controllers\Drivers\DriverCreateController;
use App\Http\Controllers\Drivers\DriverUpdateController;
use App\Http\Controllers\Drivers\DriverDeleteController;

use App\Http\Controllers\PrinterController;
use App\Http\Controllers\Printers\PrinterCreateController;
use App\Http\Controllers\Printers\PrinterUpdateController;
use App\Http\Controllers\Printers\PrinterDeleteController;

use App\Http\Controllers\GroupEmailController;
use App\Http\Controllers\GroupEmails\GroupEmailCreateController;
use App\Http\Controllers\GroupEmails\GroupEmailUpdateController;
use App\Http\Controllers\GroupEmails\GroupEmailDeleteController;

use App\Http\Controllers\TerminalController;
use App\Http\Controllers\Terminals\TerminalCreateController;
use App\Http\Controllers\Terminals\TerminalUpdateController;
use App\Http\Controllers\Terminals\TerminalDeleteController;

use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\Recommendations\RecommendationCreateController;
use App\Http\Controllers\Recommendations\RecommendationUpdateController;
use App\Http\Controllers\Recommendations\RecommendationDeleteController;

use App\Http\Controllers\RouteController;
use App\Http\Controllers\Routes\RouteCreateController;
use App\Http\Controllers\Routes\RouteUpdateController;
use App\Http\Controllers\Routes\RouteDeleteController;

use App\Http\Controllers\MultiRouteController;
use App\Http\Controllers\MultiRoutes\MultiRouteCreateController;
use App\Http\Controllers\MultiRoutes\MultiRouteUpdateController;
use App\Http\Controllers\MultiRoutes\MultiRouteDeleteController;

use App\Http\Controllers\PriceController;
use App\Http\Controllers\Prices\PriceCreateController;
use App\Http\Controllers\Prices\PriceUpdateController;
use App\Http\Controllers\Prices\PriceDeleteController;
use App\Http\Controllers\Prices\PriceBatchUploadController;

use App\Http\Controllers\InterlinePriceController;
use App\Http\Controllers\InterlinePrices\InterlinePriceCreateController;
use App\Http\Controllers\InterlinePrices\InterlinePriceUpdateController;
use App\Http\Controllers\InterlinePrices\InterlinePriceDeleteController;

use App\Http\Controllers\TripController;
use App\Http\Controllers\Trips\TripCreateController;
use App\Http\Controllers\Trips\TripUpdateController;
use App\Http\Controllers\Trips\TripDeleteController;

use App\Http\Controllers\TravelScheduleController;
use App\Http\Controllers\TravelSchedules\TravelScheduleCreateController;
use App\Http\Controllers\TravelSchedules\TravelScheduleUpdateController;

use App\Http\Controllers\CellController;
use App\Http\Controllers\Cells\CellCreateController;
use App\Http\Controllers\Cells\CellUpdateController;
use App\Http\Controllers\Cells\CellDeleteController;

use App\Http\Controllers\BusModelController;
use App\Http\Controllers\BusModels\BusModelCreateController;
use App\Http\Controllers\BusModels\BusModelUpdateController;
use App\Http\Controllers\BusModels\BusModelDeleteController;

use App\Http\Controllers\BusController;
use App\Http\Controllers\Buses\BusCreateController;
use App\Http\Controllers\Buses\BusUpdateController;
use App\Http\Controllers\Buses\BusDeleteController;

use App\Http\Controllers\TravelExpenseController;
use App\Http\Controllers\TravelExpenses\TravelExpenseCreateController;
use App\Http\Controllers\TravelExpenses\TravelExpenseUpdateController;
use App\Http\Controllers\TravelExpenses\TravelExpenseDeleteController;

use App\Http\Controllers\DailyItineraryController;

use App\Http\Controllers\ItineraryUpdateController;
use App\Http\Controllers\Observations\ObservationCreateController;

use App\Http\Controllers\BoardingManagementController;

use App\Http\Controllers\BaggageController;
use App\Http\Controllers\Baggages\BaggageCreateController;
use App\Http\Controllers\Baggages\BaggageUpdateController;
use App\Http\Controllers\Baggages\BaggageDeleteController;

use App\Http\Controllers\TicketSupportController;

use App\Http\Controllers\TicketController;
use App\Http\Controllers\Tickets\TicketCreateController;
use App\Http\Controllers\Tickets\TicketCancelController;
use App\Http\Controllers\Tickets\TicketUpdateController;

use App\Http\Controllers\CityController;
use App\Http\Controllers\Cities\CityCreateController;
use App\Http\Controllers\Cities\CityBatchUploadController;
use App\Http\Controllers\Cities\CityUpdateController;
use App\Http\Controllers\Cities\CityDeleteController;

use App\Http\Controllers\VoucherController;
use App\Http\Controllers\Vouchers\VoucherCreateController;
use App\Http\Controllers\Vouchers\VoucherBatchUploadController;
use App\Http\Controllers\Vouchers\VoucherUpdateController;
use App\Http\Controllers\Vouchers\VoucherDeleteController;

use App\Http\Controllers\DiscountOptionController;
use App\Http\Controllers\DiscountOptions\DiscountOptionCreateController;
use App\Http\Controllers\DiscountOptions\DiscountOptionBatchUploadController;
use App\Http\Controllers\DiscountOptions\DiscountOptionUpdateController;
use App\Http\Controllers\DiscountOptions\DiscountOptionDeleteController;

use App\Http\Controllers\ExpenseIncomeController;
use App\Http\Controllers\ExpenseIncomes\ExpenseIncomeCreateController;
use App\Http\Controllers\ExpenseIncomes\ExpenseIncomeBatchUploadController;
use App\Http\Controllers\ExpenseIncomes\ExpenseIncomeUpdateController;
use App\Http\Controllers\ExpenseIncomes\ExpenseIncomeDeleteController;

use App\Http\Controllers\PromotionController;
use App\Http\Controllers\Promotions\PromotionCreateController;
use App\Http\Controllers\Promotions\PromotionBatchUploadController;
use App\Http\Controllers\Promotions\PromotionUpdateController;
use App\Http\Controllers\Promotions\PromotionDeleteController;

use App\Http\Controllers\CouponController;
use App\Http\Controllers\Coupons\CouponCreateController;
use App\Http\Controllers\Coupons\CouponBatchUploadController;
use App\Http\Controllers\Coupons\CouponUpdateController;
use App\Http\Controllers\Coupons\CouponDeleteController;

use App\Http\Controllers\DiscountController;
use App\Http\Controllers\Discounts\DiscountCreateController;
use App\Http\Controllers\Discounts\DiscountBatchUploadController;
use App\Http\Controllers\Discounts\DiscountUpdateController;
use App\Http\Controllers\Discounts\DiscountDeleteController;

use App\Http\Controllers\RouteAndMainDriverController;
use App\Http\Controllers\RouteAndMainDrivers\RouteAndMainDriverCreateController;
use App\Http\Controllers\RouteAndMainDrivers\RouteAndMainDriverBatchUploadController;
use App\Http\Controllers\RouteAndMainDrivers\RouteAndMainDriverUpdateController;
use App\Http\Controllers\RouteAndMainDrivers\RouteAndMainDriverDeleteController;

use App\Http\Controllers\PaymentDocumentController;
use App\Http\Controllers\PaymentDocuments\PaymentDocumentCreateController;
use App\Http\Controllers\PaymentDocuments\PaymentDocumentBatchUploadController;
use App\Http\Controllers\PaymentDocuments\PaymentDocumentUpdateController;
use App\Http\Controllers\PaymentDocuments\PaymentDocumentDeleteController;

use App\Http\Controllers\AccountPayableController;
use App\Http\Controllers\AccountPayables\AccountPayableCreateController;
use App\Http\Controllers\AccountPayables\AccountPayableBatchUploadController;
use App\Http\Controllers\AccountPayables\AccountPayableUpdateController;
use App\Http\Controllers\AccountPayables\AccountPayableDeleteController;

use App\Http\Controllers\FaqController;
use App\Http\Controllers\Faqs\FaqCreateController;
use App\Http\Controllers\Faqs\FaqBatchUploadController;
use App\Http\Controllers\Faqs\FaqUpdateController;
use App\Http\Controllers\Faqs\FaqDeleteController;


use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\InquiryController;

use App\Http\Controllers\AccountReceivableController;

use App\Http\Controllers\PassengerController;

use App\Http\Controllers\OpenCashController;
use App\Http\Controllers\SeatTransferController;

use App\Http\Controllers\ReportController;
use App\Http\Controllers\Reports\PrintController;

use App\Http\Controllers\PassengerReportController;
use App\Http\Controllers\NotificationController;

use App\Http\Controllers\PaymentController;

use App\Http\Controllers\Web\TripSearchController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\Auth\RegisterController;
use App\Http\Controllers\Web\Auth\VerificationController;
use App\Http\Controllers\Web\Auth\LoginController as WebUserLogin;
use App\Http\Controllers\Web\Auth\FacebookLoginController;
use App\Http\Controllers\Web\Auth\ForgotPasswordController;
use App\Http\Controllers\Web\Auth\ResetPasswordController;
use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\Web\ContactUsController;
use App\Http\Controllers\Web\TerminalController as PublicPageTerminalController;
use App\Http\Controllers\Web\CareerController;
use App\Http\Controllers\Web\FaqController as WebFaqController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::auth();

Route::get('/', function () { return redirect('/login'); });

Route::group(['prefix' => 'payment'], function() {
    Route::get('/{id}/{passenger}/{arrival}/{departure}', [PaymentController::class, 'index'])->name('payment.form');
    Route::post('/process/{id}/{passenger}/{arrival}/{departure}', [PaymentController::class, 'payment'])->name('payment.process');
});


Route::group(['prefix' => 'ticket'], function() {
    Route::get('/print/{id}/{passenger}/{arrival}/{departure}/{preprocess?}', [TicketController::class, 'printTicket'])->name('ticket.print');
    Route::get('/confirmation/{id}/{passenger}/{arrival}/{departure}', [TicketController::class, 'ticketConfirmation'])->name('ticket.confirmation');
    Route::get('/verified', [TicketController::class, 'ticketVerified'])->name('ticket.verified');
    Route::post('/confirmed', [TicketController::class, 'confirmedTicket'])->name('ticket.confirmed');
    Route::get('/status/{ticket_status}/{id?}/{passenger?}/{arrival?}/{departure?}', [TicketController::class, 'ticketStatus'])->name('ticket.status');
});


Route::group(['prefix' => 'driver'], function() {
    Route::get('/transaction-number', [TicketController::class, 'transactionNumberPage'])->name('driver.transaction-number');
    Route::post('/transaction-number/validate', [TicketController::class, 'validateTransactionNumber'])->name('driver.validate-transaction-number');
});



Route::middleware(['auth'])->group(function() {

    Route::group(['prefix' => 'dashboard'], function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('/line', [DashboardController::class, 'updateLineGraph'])->name('update-line-graph');
        
    });

    Route::get('/scanner', [DashboardController::class, 'scanQR'])->name('scanner');
    Route::get('/driver/dashboard', [DashboardController::class, 'driverDashboard'])->name('driver-dashboard');

    Route::post('/locale', LocaleController::class)->name('locale');

    Route::post('/user/office/update', [DashboardController::class, 'update'])->name('user-office.update');
    
    Route::post('/notify/users', [NotificationController::class, 'notification'])->name('notify.users');


    Route::group(['prefix' => 'notification'], function() {
        Route::post('/read', [NotificationController::class, 'notificationRead'])->name('notification.read');
        Route::post('/reply/{id}', [NotificationController::class, 'replyToNotification'])->name('reply-to-notification');
    });

    Route::group(['prefix' => 'office'], function() {
        Route::get('/', [OfficeController::class, 'index'])->name('office.index');
        Route::get('/fetch', [OfficeController::class, 'fetch'])->name('office.fetch');
        Route::get('/create', [OfficeController::class, 'create'])->name('office.create');
        Route::post('/store', OfficeCreateController::class)->name('office.store');
        Route::get('/show/{id}', [OfficeController::class, 'show'])->name('office.show');
        Route::post('/update/{id}', OfficeUpdateController::class)->name('office.update');
        Route::post('/destroy/{id}', OfficeDeleteController::class)->name('office.destroy');
        Route::get('/open-close', [OfficeController::class, 'openClose'])->name('office.open-close');
        Route::get('/open-close/update/{id}', [OfficeController::class, 'officeOpenClose'])->name('office.openclose.update');
    });


    Route::group(['prefix' => 'currency'], function() {
        Route::get('/', [CurrencyController::class, 'index'])->name('currency.index');
        Route::get('/fetch', [CurrencyController::class, 'fetch'])->name('currency.fetch');
        Route::get('/create', [CurrencyController::class, 'create'])->name('currency.create');
        Route::post('/store', CurrencyCreateController::class)->name('currency.store');
        Route::get('/show/{id}', [CurrencyController::class, 'show'])->name('currency.show');
        Route::post('/update/{id}', CurrencyUpdateController::class)->name('currency.update');
        Route::post('/destroy/{id}', CurrencyDeleteController::class)->name('currency.destroy');
    });

    Route::group(['prefix' => 'ticket-type'], function() {
        Route::get('/', [TicketTypeController::class, 'index'])->name('ticket-type.index');
        Route::get('/fetch', [TicketTypeController::class, 'fetch'])->name('ticket-type.fetch');
        Route::get('/create', [TicketTypeController::class, 'create'])->name('ticket-type.create');
        Route::post('/store', TicketTypeCreateController::class)->name('ticket-type.store');
        Route::get('/show/{id}', [TicketTypeController::class, 'show'])->name('ticket-type.show');
        Route::post('/update/{id}', TicketTypeUpdateController::class)->name('ticket-type.update');
        Route::post('/destroy/{id}', TicketTypeDeleteController::class)->name('ticket-type.destroy');
    });


    Route::group(['prefix' => 'agency'], function() {
        Route::get('/', [CompanyController::class, 'index'])->name('company.index');
        Route::get('/fetch', [CompanyController::class, 'fetch'])->name('company.fetch');
        Route::get('/create', [CompanyController::class, 'create'])->name('company.create');
        Route::post('/store', CompanyCreateController::class)->name('company.store');
        Route::get('/show/{id}', [CompanyController::class, 'show'])->name('company.show');
        Route::post('/update/{id}', CompanyUpdateController::class)->name('company.update');
        Route::post('/destroy/{id}', CompanyDeleteController::class)->name('company.destroy');
    });

    Route::group(['prefix' => 'user'], function() {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/fetch', [UserController::class, 'fetch'])->name('user.fetch');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', UserCreateController::class)->name('user.store');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::post('/update/{id}', UserUpdateController::class)->name('user.update');
        Route::post('/destroy/{id}', UserDeleteController::class)->name('user.destroy');
    });

    Route::group(['prefix' => 'group'], function() {
         Route::get('/', [GroupController::class, 'index'])->name('group.index');
        Route::get('/fetch', [GroupController::class, 'fetch'])->name('group.fetch');
        Route::get('/create', [GroupController::class, 'create'])->name('group.create');
        Route::post('/store', GroupCreateController::class)->name('group.store');
        Route::get('/show/{id}', [GroupController::class, 'show'])->name('group.show');
        Route::post('/update/{id}', GroupUpdateController::class)->name('group.update');
        Route::post('/destroy/{id}', GroupDeleteController::class)->name('group.destroy');
    });
   
    Route::group(['prefix' => 'group-privilege'], function() {
        Route::get('/', [GroupPrivilegeController::class, 'index'])->name('group-privilege.index');
        Route::get('/fetch', [GroupPrivilegeController::class, 'fetch'])->name('group-privilege.fetch');
        Route::post('/update/{groupId}/{groupPrivilegeid}', GroupPrivilegeUpdateController::class)->name('group-privilege.update');
    });

    Route::group(['prefix' => 'group-message'], function() {
        Route::get('/group-message', [GroupMessageController::class, 'index'])->name('group-message.index');
        Route::get('/group-message/fetch', [GroupMessageController::class, 'fetch'])->name('group-message.fetch');
        Route::get('/group-message/create', [GroupMessageController::class, 'create'])->name('group-message.create');
        Route::post('/group-message/store', GroupMessageCreateController::class)->name('group-message.store');
        Route::get('/group-message/show/{id}', [GroupMessageController::class, 'show'])->name('group-message.show');
        Route::post('/group-message/update/{id}', GroupMessageUpdateController::class)->name('group-message.update');
        Route::post('/group-message/destroy/{id}', GroupMessageDeleteController::class)->name('group-message.destroy');
    });

    Route::group(['prefix' => 'service'], function() {
        Route::get('/', [ServiceController::class, 'index'])->name('service.index');
        Route::get('/fetch', [ServiceController::class, 'fetch'])->name('service.fetch');
        Route::get('/create', [ServiceController::class, 'create'])->name('service.create');
        Route::post('/store', ServiceCreateController::class)->name('service.store');
        Route::get('/show/{id}', [ServiceController::class, 'show'])->name('service.show');
        Route::post('/update/{id}', ServiceUpdateController::class)->name('service.update');
        Route::post('/destroy/{id}', ServiceDeleteController::class)->name('service.destroy');
    });

    Route::group(['prefix' => 'driver'], function() {
        Route::get('/', [DriverController::class, 'index'])->name('driver.index');
        Route::get('/fetch', [DriverController::class, 'fetch'])->name('driver.fetch');
        Route::get('/create', [DriverController::class, 'create'])->name('driver.create');
        Route::post('/store', DriverCreateController::class)->name('driver.store');
        Route::get('/show/{id}', [DriverController::class, 'show'])->name('driver.show');
        Route::post('/update/{id}', DriverUpdateController::class)->name('driver.update');
        Route::post('/destroy/{id}', DriverDeleteController::class)->name('driver.destroy');
    });

    Route::group(['prefix' => 'printer'], function() {
        Route::get('/printer', [PrinterController::class, 'index'])->name('printer.index');
        Route::get('/printer/fetch', [PrinterController::class, 'fetch'])->name('printer.fetch');
        Route::get('/printer/create', [PrinterController::class, 'create'])->name('printer.create');
        Route::post('/printer/store', PrinterCreateController::class)->name('printer.store');
        Route::get('/printer/show/{id}', [PrinterController::class, 'show'])->name('printer.show');
        Route::post('/printer/update/{id}', PrinterUpdateController::class)->name('printer.update');
        Route::post('/printer/destroy/{id}', PrinterDeleteController::class)->name('printer.destroy');
    });

    Route::group(['prefix' => 'group-email'], function() {
        Route::get('/', [GroupEmailController::class, 'index'])->name('group-email.index');
        Route::get('/fetch', [GroupEmailController::class, 'fetch'])->name('group-email.fetch');
        Route::get('/create', [GroupEmailController::class, 'create'])->name('group-email.create');
        Route::post('/store', GroupEmailCreateController::class)->name('group-email.store');
        Route::get('/show/{id}', [GroupEmailController::class, 'show'])->name('group-email.show');
        Route::post('/update/{id}', GroupEmailUpdateController::class)->name('group-email.update');
        Route::post('/destroy/{id}', GroupEmailDeleteController::class)->name('group-email.destroy');
    });

    Route::group(['prefix' => 'faq'], function() {
        Route::get('/', [FaqController::class, 'index'])->name('faq.index');
        Route::get('/fetch', [FaqController::class, 'fetch'])->name('faq.fetch');
        Route::get('/create', [FaqController::class, 'create'])->name('faq.create');
        Route::post('/store', FaqCreateController::class)->name('faq.store');
        Route::get('/show/{id}', [FaqController::class, 'show'])->name('faq.show');
        Route::post('/update/{id}', FaqUpdateController::class)->name('faq.update');
        Route::post('/destroy/{id}', FaqDeleteController::class)->name('faq.destroy');
    });

    Route::group(['prefix' => 'terminal'], function() {
        Route::get('/', [TerminalController::class, 'index'])->name('terminal.index');
        Route::get('/fetch', [TerminalController::class, 'fetch'])->name('terminal.fetch');
        Route::get('/create', [TerminalController::class, 'create'])->name('terminal.create');
        Route::post('/store', TerminalCreateController::class)->name('terminal.store');
        Route::get('/show/{id}', [TerminalController::class, 'show'])->name('terminal.show');
        Route::post('/update/{id}', TerminalUpdateController::class)->name('terminal.update');
        Route::post('/destroy/{id}', TerminalDeleteController::class)->name('terminal.destroy');
    });
    
    Route::group(['prefix' => 'recommendation'], function() {
        Route::get('/', [RecommendationController::class, 'index'])->name('recommendation.index');
        Route::get('/fetch', [RecommendationController::class, 'fetch'])->name('recommendation.fetch');
        Route::get('/create', [RecommendationController::class, 'create'])->name('recommendation.create');
        Route::post('/store', RecommendationCreateController::class)->name('recommendation.store');
        Route::get('/show/{id}', [RecommendationController::class, 'show'])->name('recommendation.show');
        Route::post('/update/{id}', RecommendationUpdateController::class)->name('recommendation.update');
        Route::post('/destroy/{id}', RecommendationDeleteController::class)->name('recommendation.destroy');
    });
    


    // Route::get('/option', function() {
    //     return view('pages.option.index');
    // })->name('option.index');

    // Route::get('/information', function() {
    //     return view('pages.support.information');
    // })->name('information.index');

    Route::group(['prefix' => 'route'], function() {
        Route::get('/', [RouteController::class, 'index'])->name('route.index');
        Route::get('/fetch', [RouteController::class, 'fetch'])->name('route.fetch');
        Route::get('/create', [RouteController::class, 'create'])->name('route.create');
        Route::post('/store', RouteCreateController::class)->name('route.store');
        Route::get('/show/{id}', [RouteController::class, 'show'])->name('route.show');
        Route::post('/copy-reverse/{id}', [RouteController::class, 'copyReverse'])->name('route.copy-reverse');
        Route::post('/update/{id}', RouteUpdateController::class)->name('route.update');
        Route::post('/destroy/{id}', RouteDeleteController::class)->name('route.destroy');
    });

    Route::group(['prefix' => 'multi-route'], function() {
        Route::get('/', [MultiRouteController::class, 'index'])->name('multi-route.index');
        Route::get('/fetch', [MultiRouteController::class, 'fetch'])->name('multi-route.fetch');
        Route::get('/create', [MultiRouteController::class, 'create'])->name('multi-route.create');
        Route::post('/store', MultiRouteCreateController::class)->name('multi-route.store');
        Route::get('/show/{id}', [MultiRouteController::class, 'show'])->name('multi-route.show');
        Route::post('/update/{id}', MultiRouteUpdateController::class)->name('multi-route.update');
        Route::post('/destroy/{id}', MultiRouteDeleteController::class)->name('multi-route.destroy');
    });

    Route::group(['prefix' => 'price'], function() {
        Route::get('/', [PriceController::class, 'index'])->name('price.index');
        Route::get('/fetch', [PriceController::class, 'fetch'])->name('price.fetch');
        Route::get('/create', [PriceController::class, 'create'])->name('price.create');
        Route::post('/store', PriceCreateController::class)->name('price.store');
        Route::get('/show/{id}', [PriceController::class, 'show'])->name('price.show');
        Route::post('/duplicate/{id}', [PriceController::class, 'duplicate'])->name('price.duplicate');
        Route::post('/update/{id}', PriceUpdateController::class)->name('price.update');
        Route::post('/destroy/{id}', PriceDeleteController::class)->name('price.destroy');
        Route::get('/upload',  [PriceController::class, 'upload'])->name('price.upload');
        Route::post('/copy',  [PriceController::class, 'copyPrice'])->name('price.copy-price');
        Route::post('/batch/store', PriceBatchUploadController::class)->name('price.batch-store');
    });

    Route::group(['prefix' => 'interline-price'], function() {
        Route::get('/', [InterlinePriceController::class, 'index'])->name('interline-price.index');
        Route::get('/fetch', [InterlinePriceController::class, 'fetch'])->name('interline-price.fetch');
        Route::get('/create', [InterlinePriceController::class, 'create'])->name('interline-price.create');
        Route::post('/store', InterlinePriceCreateController::class)->name('interline-price.store');
        Route::get('/show/{id}', [InterlinePriceController::class, 'show'])->name('interline-price.show');
        Route::post('/update/{id}', InterlinePriceUpdateController::class)->name('interline-price.update');
        Route::post('/destroy/{id}', InterlinePriceDeleteController::class)->name('interline-price.destroy');
    });

    Route::group(['prefix' => 'trip'], function() {
        Route::get('/', [TripController::class, 'index'])->name('trip.index');
        Route::get('/fetch', [TripController::class, 'fetch'])->name('trip.fetch');
        Route::get('/create', [TripController::class, 'create'])->name('trip.create');
        Route::get('/time/destroy/{id}', [TripController::class, 'deleteTime'])->name('trip-time.destroy');
        Route::post('/store', TripCreateController::class)->name('trip.store');
        Route::get('/show/{id}', [TripController::class, 'show'])->name('trip.show');
        Route::post('/update/{id}', TripUpdateController::class)->name('trip.update');
        Route::post('/destroy/{id}', TripDeleteController::class)->name('trip.destroy');
    });

    Route::group(['prefix' => 'travel-schedule'], function() {
        Route::get('/create', [TravelScheduleController::class, 'create'])->name('travel-schedule.create');
        Route::post('/store', TravelScheduleCreateController::class)->name('travel-schedule.store');
        Route::get('/show/{id}', [TravelScheduleController::class, 'show'])->name('travel-schedule.show');
        Route::post('/update/{id}', TravelScheduleUpdateController::class)->name('travel-schedule.update');
    });

    Route::group(['prefix' => 'cell'], function() {
        Route::get('/', [CellController::class, 'index'])->name('cell.index');
        Route::get('/fetch', [CellController::class, 'fetch'])->name('cell.fetch');
        Route::get('/create', [CellController::class, 'create'])->name('cell.create');
        Route::post('/store', CellCreateController::class)->name('cell.store');
        Route::get('/show/{id}', [CellController::class, 'show'])->name('cell.show');
        Route::post('/update/{id}', CellUpdateController::class)->name('cell.update');
        Route::post('/destroy/{id}', CellDeleteController::class)->name('cell.destroy');
    });

    Route::group(['prefix' => 'bus-model'], function() {
        Route::get('/', [BusModelController::class, 'index'])->name('bus-model.index');
        Route::get('/fetch', [BusModelController::class, 'fetch'])->name('bus-model.fetch');
        Route::get('/create', [BusModelController::class, 'create'])->name('bus-model.create');
        Route::post('/store', BusModelCreateController::class)->name('bus-model.store');
        Route::get('/show/{id}', [BusModelController::class, 'show'])->name('bus-model.show');
        Route::post('/update/{id}', BusModelUpdateController::class)->name('bus-model.update');
        Route::post('/destroy/{id}', BusModelDeleteController::class)->name('bus-model.destroy');
    });

    Route::group(['prefix' => 'bus'], function() {
        Route::get('/', [BusController::class, 'index'])->name('bus.index');
        Route::get('/fetch', [BusController::class, 'fetch'])->name('bus.fetch');
        Route::get('/create', [BusController::class, 'create'])->name('bus.create');
        Route::post('/store', BusCreateController::class)->name('bus.store');
        Route::get('/show/{id}', [BusController::class, 'show'])->name('bus.show');
        Route::post('/update/{id}', BusUpdateController::class)->name('bus.update');
        Route::post('/destroy/{id}', BusDeleteController::class)->name('bus.destroy');
    });

    Route::group(['prefix' => 'travel-expense'], function() {
        Route::get('/', [TravelExpenseController::class, 'index'])->name('travel-expense.index');
        Route::get('/fetch', [TravelExpenseController::class, 'fetch'])->name('travel-expense.fetch');
        Route::get('/create/{trip}', [TravelExpenseController::class, 'create'])->name('travel-expense.create');
        Route::post('/store', TravelExpenseCreateController::class)->name('travel-expense.store');
        Route::get('/show/{id}', [TravelExpenseController::class, 'show'])->name('travel-expense.show');
        Route::post('/update/{id}', TravelExpenseUpdateController::class)->name('travel-expense.update');
    });

    Route::group(['prefix' => 'daily-itinerary'], function() {
        Route::get('/', [DailyItineraryController::class, 'index'])->name('daily-itinerary.index');
        Route::get('/fetch', [DailyItineraryController::class, 'fetch'])->name('daily-itinerary.fetch');
    });

    Route::group(['prefix' => 'itinerary-update'], function() {
        Route::get('/itinerary-update', [ItineraryUpdateController::class, 'index'])->name('itinerary-update.index');
        Route::get('/fetch', [ItineraryUpdateController::class, 'fetch'])->name('itinerary-update.fetch');
    });

    Route::get('/itinerary-passenger/fetch/{id}', [ItineraryUpdateController::class, 'fetchPassenger'])->name('itinerary-passenger.fetch');
    Route::get('/itinerary-observation/fetch/{id}', [ItineraryUpdateController::class, 'fetchObservation'])->name('itinerary-observation.fetch');



    Route::post('/observation/store', ObservationCreateController::class)->name('observation.store');

    Route::group(['prefix' => 'boarding'], function() {
        Route::get('/', [BoardingManagementController::class, 'index'])->name('boarding.index');
        Route::get('/fetch', [BoardingManagementController::class, 'fetch'])->name('boarding.fetch');
        Route::post('/search/ticket', [BoardingManagementController::class, 'search'])->name('boarding-ticket.search');
    });

    Route::group(['prefix' => 'baggage'], function() {
        Route::get('/', [BaggageController::class, 'index'])->name('baggage.index');
        Route::get('/fetch', [BaggageController::class, 'fetch'])->name('baggage.fetch');
        Route::get('/create', [BaggageController::class, 'create'])->name('baggage.create');
        Route::post('/store', BaggageCreateController::class)->name('baggage.store');
        Route::get('/show/{id}', [BaggageController::class, 'show'])->name('baggage.show');
        Route::post('/update/{id}', BaggageUpdateController::class)->name('baggage.update');
        Route::post('/destroy/{id}', BaggageDeleteController::class)->name('baggage.destroy');
    });

    Route::group(['prefix' => 'ticket-support'], function() {
        Route::get('/', [TicketSupportController::class, 'index'])->name('ticket-support.index');
        Route::get('/fetch', [TicketSupportController::class, 'fetch'])->name('ticket-support.fetch');
    });

    Route::group(['prefix' => 'ticket'], function() {
        Route::get('/', [TicketController::class, 'index'])->name('ticket.index');
        Route::get('/fetch/{office_id?}/{office_view?}', [TicketController::class, 'fetch'])->name('ticket.fetch');
        Route::get('/ticket-preprocess/fetch/{office_id?}/{office_view?}', [TicketController::class, 'fetchPreprocessTicket'])->name('ticket-preprocess.fetch');
        Route::post('/find/trip', [TicketController::class, 'findAvailableTrip'])->name('ticket.find-available-trip');
        Route::post('/get/trip/time', [TicketController::class, 'getTripTime'])->name('ticket.get-trip-time');
        Route::post('/get/bus', [TicketController::class, 'getBus'])->name('ticket.fetch-bus');
        Route::post('/get-available-bus', [TicketController::class, 'getAvailableBus'])->name('ticket.get-available-bus');
        Route::post('/get/passengers', [TicketController::class, 'getPassenger'])->name('ticket.fetch-passengers');
        Route::post('/voucher/validate', [TicketController::class, 'couponValidate'])->name('ticket.voucher-validate');
        Route::post('/store', TicketCreateController::class)->name('ticket.store');
        Route::get('/cancel/{id}', TicketCancelController::class)->name('ticket.cancel');
        Route::post('/update/{id}', TicketUpdateController::class)->name('ticket.update');
        Route::post('/email/{id}', [TicketController::class, 'passengerEmailSender'])->name('ticket.send-email');
        Route::post('/register-payment', [TicketController::class, 'registerPayment'])->name('ticket.register-payment');
        Route::post('/paid/notify/passenger', [TicketController::class, 'notifyPassenger'])->name('ticket.paid.notify-passenger');
        Route::get('/scan-qr/{id}/{passenger}/{arrival}/{departure}', [TicketController::class, 'scanTicketQR'])->name('ticket.scan-qr');
    });

    Route::group(['prefix' => 'city'], function() {
        Route::get('/', [CityController::class, 'index'])->name('city.index');
        Route::get('/fetch', [CityController::class, 'fetch'])->name('city.fetch');
        Route::get('/create', [CityController::class, 'create'])->name('city.create');
        Route::get('/upload',  [CityController::class, 'upload'])->name('city.upload');
        Route::post('/store', CityCreateController::class)->name('city.store');
        Route::post('/batch/store', CityBatchUploadController::class)->name('city.batch-store');
        Route::get('/show/{id}', [CityController::class, 'show'])->name('city.show');
        Route::post('/update/{id}', CityUpdateController::class)->name('city.update');
        Route::post('/destroy/{id}', CityDeleteController::class)->name('city.destroy');
    });

    Route::group(['prefix' => 'voucher'], function() {
        Route::get('/', [VoucherController::class, 'index'])->name('voucher.index');
        Route::get('/fetch', [VoucherController::class, 'fetch'])->name('voucher.fetch');
        Route::get('/create', [VoucherController::class, 'create'])->name('voucher.create');
        Route::post('/store', VoucherCreateController::class)->name('voucher.store');
        Route::get('/show/{id}', [VoucherController::class, 'show'])->name('voucher.show');
        Route::post('/update/{id}', VoucherUpdateController::class)->name('voucher.update');
        Route::post('/destroy/{id}', VoucherDeleteController::class)->name('voucher.destroy');
    });

    Route::group(['prefix' => 'discount-option'], function() {
        Route::get('/', [DiscountOptionController::class, 'index'])->name('discount-option.index');
        Route::get('/fetch', [DiscountOptionController::class, 'fetch'])->name('discount-option.fetch');
        Route::get('/create', [DiscountOptionController::class, 'create'])->name('discount-option.create');
        Route::post('/store', DiscountOptionCreateController::class)->name('discount-option.store');
        Route::get('/show/{id}', [DiscountOptionController::class, 'show'])->name('discount-option.show');
        Route::post('/update/{id}', DiscountOptionUpdateController::class)->name('discount-option.update');
        Route::post('/destroy/{id}', DiscountOptionDeleteController::class)->name('discount-option.destroy');
    });

    Route::group(['prefix' => 'expense-income'], function() {
        Route::get('/', [ExpenseIncomeController::class, 'index'])->name('expense-income.index');
        Route::get('/fetch', [ExpenseIncomeController::class, 'fetch'])->name('expense-income.fetch');
        Route::get('/create', [ExpenseIncomeController::class, 'create'])->name('expense-income.create');
        Route::post('/store', ExpenseIncomeCreateController::class)->name('expense-income.store');
        Route::get('/show/{id}', [ExpenseIncomeController::class, 'show'])->name('expense-income.show');
        Route::post('/update/{id}', ExpenseIncomeUpdateController::class)->name('expense-income.update');
        Route::post('/destroy/{id}', ExpenseIncomeDeleteController::class)->name('expense-income.destroy');
    });

    Route::group(['prefix' => 'frequent-traveler'], function() {
        Route::get('/', [PassengerController::class, 'index'])->name('frequent-traveler.index');
        Route::get('/fetch', [PassengerController::class, 'fetch'])->name('frequent-traveler.fetch');
    });

    Route::group(['prefix' => 'promotion'], function() {
        Route::get('/', [PromotionController::class, 'index'])->name('promotion.index');
        Route::get('/fetch', [PromotionController::class, 'fetch'])->name('promotion.fetch');
        Route::get('/create', [PromotionController::class, 'create'])->name('promotion.create');
        Route::post('/store', PromotionCreateController::class)->name('promotion.store');
        Route::get('/show/{id}', [PromotionController::class, 'show'])->name('promotion.show');
        Route::post('/update/{id}', PromotionUpdateController::class)->name('promotion.update');
        Route::post('/destroy/{id}', PromotionDeleteController::class)->name('promotion.destroy');
    });

    Route::group(['prefix' => 'coupon'], function() {
        Route::get('/', [CouponController::class, 'index'])->name('coupon.index');
        Route::get('/fetch', [CouponController::class, 'fetch'])->name('coupon.fetch');
        Route::get('/create', [CouponController::class, 'create'])->name('coupon.create');
        Route::post('/store', CouponCreateController::class)->name('coupon.store');
        Route::get('/show/{id}', [CouponController::class, 'show'])->name('coupon.show');
        Route::post('/update/{id}', CouponUpdateController::class)->name('coupon.update');
        Route::post('/destroy/{id}', CouponDeleteController::class)->name('coupon.destroy');
    });

    Route::group(['prefix' => 'discount'], function() {
        Route::get('/', [DiscountController::class, 'index'])->name('discount.index');
        Route::get('/fetch', [DiscountController::class, 'fetch'])->name('discount.fetch');
        Route::get('/create', [DiscountController::class, 'create'])->name('discount.create');
        Route::post('/store', DiscountCreateController::class)->name('discount.store');
        Route::get('/show/{id}', [DiscountController::class, 'show'])->name('discount.show');
        Route::post('/update/{id}', DiscountUpdateController::class)->name('discount.update');
        Route::post('/destroy/{id}', DiscountDeleteController::class)->name('discount.destroy');
    });

    Route::group(['prefix' => 'open-cash'], function() {
        Route::get('/', [OpenCashController::class, 'index'])->name('open-cash.index');
        Route::post('/store', [OpenCashController::class, 'addCash'])->name('open-cash.store');
        Route::get('/fetch', [OpenCashController::class, 'fetch'])->name('open-cash.fetch');
    });

    Route::group(['prefix' => 'seat'], function() {
        Route::get('/transfer', [SeatTransferController::class, 'index'])->name('seat-transfer.index');
        Route::post('/transfer/generate-bus', [SeatTransferController::class, 'getBus'])->name('seat-transfer.generate-bus');
        Route::post('/transfer/update-bus', [SeatTransferController::class, 'update'])->name('seat-transfer.update');
    });
    Route::post('/fetch/origin/trip', [SeatTransferController::class, 'getTrip'])->name('seat-transfer.fetch-trip');

    Route::group(['prefix' => 'route-main-driver'], function() {
        Route::get('/', [RouteAndMainDriverController::class, 'index'])->name('route-main-driver.index');
        Route::get('/fetch', [RouteAndMainDriverController::class, 'fetch'])->name('route-main-driver.fetch');
        Route::get('/create', [RouteAndMainDriverController::class, 'create'])->name('route-main-driver.create');
        Route::post('/store', RouteAndMainDriverCreateController::class)->name('route-main-driver.store');
        Route::get('/show/{id}', [RouteAndMainDriverController::class, 'show'])->name('route-main-driver.show');
        Route::post('/update/{id}', RouteAndMainDriverUpdateController::class)->name('route-main-driver.update');
        Route::post('/destroy/{id}', RouteAndMainDriverDeleteController::class)->name('route-main-driver.destroy');
    });

    Route::group(['prefix' => 'account-payable'], function() {
        Route::get('/', [AccountPayableController::class, 'index'])->name('account-payable.index');
        Route::get('/fetch', [AccountPayableController::class, 'fetch'])->name('account-payable.fetch');
        Route::get('/create', [AccountPayableController::class, 'create'])->name('account-payable.create');
        Route::post('/store', AccountPayableCreateController::class)->name('account-payable.store');
        Route::get('/show/{id}', [AccountPayableController::class, 'show'])->name('account-payable.show');
        Route::post('/update/{id}', AccountPayableUpdateController::class)->name('account-payable.update');
        Route::post('/destroy/{id}', AccountPayableDeleteController::class)->name('account-payable.destroy');
    });

    Route::group(['prefix' => 'account-receivable'], function() {
        Route::get('/', [AccountReceivableController::class, 'index'])->name('account-receivable.index');
    });

    Route::group(['prefix' => 'passenger-report'], function() {
        Route::get('/', [PassengerReportController::class, 'index'])->name('passenger-report.index');
        Route::get('/fetch', [PassengerReportController::class, 'fetch'])->name('passenger-report.fetch');
        Route::get('/total/fetch/{id}/{type}', [PassengerReportController::class, 'fetchPassenger'])->name('total-passenger.fetch');
    });

    Route::group(['prefix' => 'sales-by-user'], function() {
        Route::get('/', [ReportController::class, 'salesByUser'])->name('sales-by-user');
        Route::get('/print/{seller_ids?}/{date_type?}/{start_date?}/{end_date?}', [PrintController::class, 'printSalesByUser'])->name('sales-by-user.print');
    });

    Route::group(['prefix' => 'daily-till-closure'], function() {
        Route::get('/', [ReportController::class, 'dailyTillClosure'])->name('daily-till-closure');
        Route::get('/print/{seller_ids?}/{date_type?}/{start_date?}/{end_date?}/{cash_register?}', [PrintController::class, 'printDailyTillClosure'])->name('daily-till-closure.print');
    });

    Route::group(['prefix' => 'daily-till-report-terminal'], function() {
        Route::get('/', [ReportController::class, 'dailyTillReportTerminal'])->name('daily-till-report-terminal');
        Route::get('/print/{office_id?}/{date_type?}/{start_date?}/{end_date?}/', [PrintController::class, 'printDailyTillReportTerminal'])->name('daily-till-report-terminal.print');
    });

    Route::group(['prefix' => 'my-daily-closure'], function() {
        Route::get('/', [ReportController::class, 'myDailyClosure'])->name('my-daily-closure');
        Route::get('/print/{date_type?}/{start_date?}/{end_date?}/{cash_register?}', [PrintController::class, 'printMyDailyTillClosure'])->name('my-daily-closure.print');
    });
    
    Route::group(['prefix' => 'reservation-per-route'], function() {
        Route::get('/', [ReportController::class, 'reservationPerRoute'])->name('reservation-per-route');
        Route::get('/print/{date_type?}/{start_date?}/{end_date?}/{trip_ids?}', [PrintController::class, 'printReservationPerRoute'])->name('reservation-per-route.print');
    });

    Route::group(['prefix' => 'price-per-route'], function() {
        Route::get('/', [ReportController::class, 'pricePerRoute'])->name('price-per-route');
        Route::get('/print/{city_id?}/{type_ids?}', [PrintController::class, 'printPricePerRoute'])->name('price-per-route.print');
    });
   
    Route::group(['prefix' => 'income-by-route'], function() {
        Route::get('/', [ReportController::class, 'incomeByRoute'])->name('income-by-route');
        Route::get('/print/{route_ids?}/{bus_ids?}/{service_ids?}/{date_type?}/{start_date?}/{end_date?}', [PrintController::class, 'printIncomeByRoute'])->name('income-by-route.print');
    });

    Route::group(['prefix' => 'sales-by-departure-arrival'], function() {
        Route::get('/', [ReportController::class, 'salesByDepartureArrival'])->name('sales-by-departure-arrival');
        Route::get('/print/{departure_ids?}/{arrival_ids?}/{type_ids?}/{genders?}/{date_type?}/{start_date?}/{end_date?}', [PrintController::class, 'printSalesByDepartureArrival'])->name('sales-by-departure-arrival.print');
    });
   
    Route::group(['prefix' => 'sales-by-travel'], function() {
        Route::get('/', [ReportController::class, 'salesByTravel'])->name('sales-by-travel');
        Route::get('/print/{trip_ids?}/{terminal_ids?}/{service_ids?}/{date_type?}/{start_date?}/{end_date?}', [PrintController::class, 'printSalesByTravel'])->name('sales-by-travel.print');
    });

    Route::group(['prefix' => 'sales-by-voucher'], function() {
        Route::get('/', [ReportController::class, 'salesByVoucher'])->name('sales-by-voucher');
        Route::get('/print/{is_open?}', [PrintController::class, 'printSalesByVoucher'])->name('sales-by-voucher.print');
    });
   
    Route::group(['prefix' => 'sales-by-ticket'], function() {
        Route::get('/', [ReportController::class, 'salesByTicket'])->name('sales-by-ticket');
        Route::get('/print/{office_ids?}/{user_ids?}/{ticket_type_ids?}/{ticket_status?}/{payment_type?}/{date_type?}/{start_date?}/{end_date?}', [PrintController::class, 'printSalesByTicket'])->name('sales-by-ticket.print');
    });

    Route::group(['prefix' => 'sales-by-credit-card'], function() {
        Route::get('/', [ReportController::class, 'salesByCreditCard'])->name('sales-by-credit-card');
        Route::get('/print/{is_concept?}/{office_id?}/{date_type?}/{start_date?}/{end_date?}', [PrintController::class, 'printSalesByCreditCard'])->name('sales-by-credit-card.print');
    });

    Route::group(['prefix' => 'sales-by-state'], function() {
        Route::get('/', [ReportController::class, 'salesByState'])->name('sales-by-state');
        Route::get('/print/{state?}/{office_ids?}/{ticket_type_ids?}/{ticket_status?}/{payment_type?}/{date_type?}/{start_date?}/{end_date?}', [PrintController::class, 'printSalesByState'])->name('sales-by-state.print');
    });
   
    Route::group(['prefix' => 'receivable'], function() {
        Route::get('/', [ReportController::class, 'accountReceivable'])->name('receivable');
        Route::get('/print/{office_id?}/{date_type?}/{start_date?}/{end_date?}', [PrintController::class, 'printAccountReceivable'])->name('receivable.print');
    });
    
    Route::group(['prefix' => 'sales-by-agency'], function() {
        Route::get('/', [ReportController::class, 'salesByAgency'])->name('sales-by-agency');
        Route::get('/print/{terminal_ids?}/{office_ids?}/{date_type?}/{start_date?}/{end_date?}', [PrintController::class, 'printSalesByAgency'])->name('sales-by-agency.print');
    });
   
    Route::group(['prefix' => 'applicant'], function() {
        Route::get('/', [ApplicantController::class, 'index'])->name('applicant.index');
        Route::get('/fetch', [ApplicantController::class, 'fetch'])->name('applicant.fetch');
        Route::get('/show/{id}', [ApplicantController::class, 'show'])->name('applicant.show');
        Route::post('/destroy/{id}', [ApplicantController::class, 'delete'])->name('applicant.destroy');
    });

    Route::group(['prefix' => 'inquiry'], function() {
        Route::get('/', [InquiryController::class, 'index'])->name('inquiry.index');
        Route::get('/fetch', [InquiryController::class, 'fetch'])->name('inquiry.fetch');
        Route::get('/show/{id}', [InquiryController::class, 'show'])->name('inquiry.show');
        Route::post('/destroy/{id}', [InquiryController::class, 'delete'])->name('inquiry.destroy');
    });
    // Route::get('/billing-by-tickets', [ReportController::class, 'billingByTickets'])->name('billing-by-tickets');
    // Route::get('/billing-by-tickets/print/{date_type?}/{start_date?}/{end_date?}', [PrintController::class, 'printBillingByTickets'])->name('billing-by-tickets.print');
    // Route::get('/billing-by-transactions', [ReportController::class, 'billingByTransaction'])->name('billing-by-transactions');
    // Route::get('/billing-by-transactions/print/{date_type?}/{start_date?}/{end_date?}', [PrintController::class, 'printBillingByTransaction'])->name('billing-by-transactions.print');

    Route::get('/passenger/print/{type?}/{trip_id?}/{route_id?}/{date_type?}/{start_date?}/{end_date?}', [PrintController::class, 'printPassenger'])->name('passenger.print');


});


Route::group(['prefix' => 'travel'], function() {
    Route::get('', [HomeController::class, 'index'])->name('travel');
    Route::post('/store/rate', [HomeController::class, 'storeRate'])->name('store.rate');

    Route::get('/get-cities', [TripSearchController::class, 'index'])->name('get-cities');

    Route::group(['prefix' => 'ticket'], function() {
        Route::post('/find/trip', [TicketController::class, 'findAvailableTrip'])->name('web.ticket.find-available-trip');
        Route::post('/get/trip/time', [TicketController::class, 'getTripTime'])->name('web.ticket.get-trip-time');
        Route::post('/get/bus', [TicketController::class, 'getBus'])->name('web.ticket.fetch-bus');
        Route::post('/seat/payment', [TicketController::class, 'seatPayment'])->name('web.ticket.payment');
        Route::post('/voucher/validate', [TicketController::class, 'couponValidate'])->name('web.ticket.voucher-validate');
        Route::get('/print/{id}/{passenger}/{arrival}/{departure}/{preprocess?}', [TicketController::class, 'webPrintTicket'])->name('web.ticket.print');
        Route::get('/fetch', [TicketController::class, 'fetch'])->name('web.ticket.fetch');
    });

    Route::post('/save/payload', [TicketController::class, 'savePayload'])->name('web.save-payload');


    Route::middleware(['guest:web_user'])->group(function() {
        Route::get('/signup', [RegisterController::class, 'signup'])->name('signup');
        Route::post('/register', [RegisterController::class, 'register'])->name('register');
        Route::get('/login', [WebUserLogin::class, 'index'])->name('web-user.login');
        Route::post('/login', [WebUserLogin::class, 'login'])->name('travel.login');


        Route::get('facebook/login', [FacebookLoginController::class, 'login'])->name('facebook.login');
        Route::get('facebook/callback', [FacebookLoginController::class, 'callback'])->name('facebook.callback');

        Route::get('/email/verify/{id}/{type}', [VerificationController::class, 'verify'])->name('verification.verify');

        Route::get('/forgot-password', [ForgotPasswordController::class, 'index'])->name('travel.forgot-password');
        Route::post('/forgot-password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('travel.password.email');

        Route::get('/reset-password/{token}/{email}', [ResetPasswordController::class, 'showResetForm'])->name('travel.password.reset');
        Route::post('/reset-password/change', [ResetPasswordController::class, 'reset'])->name('travel.password.change');

    });


    Route::get('/logout', [WebUserLogin::class, 'logout'])->name('travel.logout');

    Route::get('trip-seat', [PageController::class, 'tripSeatPage'])->name('web.trip-seat');
    Route::get('payment', [PageController::class, 'paymentPage']);
    Route::get('dashboard', [PageController::class, 'dashboardPage'])->name('web.dashboard');
    Route::get('about-us', function() { return view('public.pages.about-us'); })->name('web.about-us');
    Route::get('travel-information', function() { return view('public.pages.travel-information'); })->name('web.travel-information');
    Route::get('privacy-policy', function() { return view('public.pages.privacy-policy'); })->name('web.privacy-policy');
    Route::get('covid-19', function() { return view('public.pages.covid'); })->name('web.covid-19');
    Route::get('careers', [CareerController::class, 'index'])->name('web.careers');
    Route::post('careers', [CareerController::class, 'store'])->name('web.careers.store');
    Route::get('faq', [WebFaqController::class, 'index'])->name('web.faq');
    Route::get('terminals', [PublicPageTerminalController::class, 'index'])->name('web.terminals');

    Route::get('contact-us', [ContactUsController::class, 'index'])->name('web.contact-us');
    Route::post('contact-us', [ContactUsController::class, 'store'])->name('web.contact-us.store');


});
