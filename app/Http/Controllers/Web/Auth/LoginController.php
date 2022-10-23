<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\Models\WebUser;

class LoginController extends Controller
{
    /**
     * Login user and fetch authenticated token
     * 
     * @param Illuminate\Http\Request
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $user = WebUser::where('email', $request->email)->first();
        
        if (!$user) {
            $this->sendFailedLoginResponse();
        }

        $password = \Hash::check($request->password, $user->password);

        if (!$password) {
            $this->sendFailedLoginResponse();
        }
      
        if (($user && $password) && !$user->email_verified_at) {
            throw ValidationException::withMessages([
                'email' => ['Your account is not yet verified. Please verify your account using the registered email.']
            ]);
        }


        auth()->guard('web_user')->login($user);
        
        if(session()->has('saved_payload')) {
            return redirect('/travel/trip-seat');
        }

        return redirect('/travel');
    }

    /**
     * Send failed login message
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    public function sendFailedLoginResponse()
    {
        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    /**
     * Logout User
     * 
     * @param Illuminate\Http\Request
     */
    
    public function logout(Request $request)
    {
        auth()->guard('web_user')->logout();

        return redirect('/travel');
    }

    public function index()
    {
        return view('public.pages.auth.login');
    }
}
