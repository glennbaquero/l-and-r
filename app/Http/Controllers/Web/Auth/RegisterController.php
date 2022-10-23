<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\WebUser;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Hash;
use Auth;
use DB;

class RegisterController extends Controller
{
    /**
     * Registers a user
     * 
     * @param Illuminate\Http\Request
     */
    public function register(RegisterRequest $request)
    {
        DB::beginTransaction();

            $user = WebUser::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'mobile_number' => $request->mobile_number,
                'password' => Hash::make($request->password),
            ]);

        DB::commit();

        $user->sendEmailVerificationNotification();
        
    	return response()->json([
            'message' => 'Registration complete. Please verify this account using this email '.$request->email
    	]);
    }

    public function signup()
    {
        return view('public.pages.auth.signup');
    }
}
