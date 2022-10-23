<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\City;

use DB;
use App\Models\Rating;
use App\Models\Stop;

class HomeController extends Controller
{
    public function index() 
    {
        $suggested_locations = Stop::with(['arrival.arrival_prices', 'route.departure'])->where('suggested_location', true)->get();
        $hasUserLoggedIn = auth()->guard('web_user')->check();

        return view('public.pages.index',[
            'ratings' => Rating::get(),
            'suggested_locations' => $suggested_locations,
            'hasUserLoggedIn' => $hasUserLoggedIn ? 1 : 0
        ]);
    }

    public function storeRate(Request $request)
    {
        if(!$request->filled('name')) {
            $request->name = 'Anonymous';
        }

        Rating::create($request->all());

        return response()->json([
            'message' => 'Rate send success',
            'success' => true
        ]);
    }
}
