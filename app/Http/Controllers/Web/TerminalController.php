<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Office;

class TerminalController extends Controller
{
    public function index() 
    {
        $terminals = Office::with('departure')->where('office_type_id', 4)->get();
        $agencies = Office::with('departure')->where('office_type_id', 1)->get();
        return view('public.pages.terminals', [
            'terminals' => $terminals,
            'agencies' => $agencies,
        ]);
    }
}
