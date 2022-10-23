<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Career;
use Session;

class CareerController extends Controller
{
    public function index() 
    {
        return view('public.pages.careers');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'additional_comments' => 'required',
            'phone_number' => 'required',
        ]);

        Career::create($request->all());

        Session::flash('success', 'Your application is sent to us, we will back to you soon!');
        return back();
    }
}
