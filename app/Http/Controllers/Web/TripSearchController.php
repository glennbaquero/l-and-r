<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\City;

use DB;
use App\Models\Stop;

class TripSearchController extends Controller
{
    public function index(Request $request) 
    {

        $default_departure = DB::table('cities')->select('cities.id', DB::raw("6371 * acos(cos(radians(" . $request->latitude . "))
                 * cos(radians(cities.latitude)) 
                 * cos(radians(cities.longitude) - radians(" . $request->longitude . ")) 
                 + sin(radians(" .$request->latitude. ")) 
                 * sin(radians(cities.latitude))) AS distance"))->whereNull('deleted_at')->having('distance', '<', 1)->first();

        $default_arrival = DB::table('cities')->select('cities.id', DB::raw("6371 * acos(cos(radians(" . $request->latitude . "))
                 * cos(radians(cities.latitude)) 
                 * cos(radians(cities.longitude) - radians(" . $request->longitude . ")) 
                 + sin(radians(" .$request->latitude. ")) 
                 * sin(radians(cities.latitude))) AS distance"))->whereNotIn('id', [$default_departure->id])->whereNull('deleted_at')->having('distance', '<', 25)->first();

        return response()->json([
            'cities' => City::get(),
            'default_departure' => $default_departure,
            'default_arrival' => $default_arrival,
        ]);
    }
}
