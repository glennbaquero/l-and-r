<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ContactUs;
use Session;

class ContactUsController extends Controller
{
    public function index() 
    {
        $default_address = []; 
        $default_address['latitude'] = '33.9747754'; 
        $default_address['longitude'] = '-118.228196'; 
        
        return view('public.pages.contact-us' , [ 'default_address' => $default_address ]); 
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        ContactUs::create($request->all());

        Session::flash('success', 'Your inquiry is sent to us, we will back to you soon!');
        return back();
    }
}
