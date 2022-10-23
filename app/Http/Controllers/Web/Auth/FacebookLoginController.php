<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Two\InvalidStateException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Hash;
use Socialite;
use Auth;
use DB;

use App\Models\WebUser;

class FacebookLoginController extends Controller
{
     const SCOPES = [
        //
    ];

    const FIELDS = [
        'id',
        'first_name', // Default
        'last_name', // Default
        'email', // Default
    ];

    /**
    * Create a redirect method to facebook api.
    *
    * @return void
    */
    public function login(Request $request, $provider = 'facebook')
    {
        return Socialite::driver($provider)->scopes(static::SCOPES)->fields(static::FIELDS)->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(Request $request, $provider = 'facebook')
    {
        if (!$request->has('code') || $request->has('denied')) {
            return redirect('/travel/login');
        }

        try {
            $socialite = Socialite::driver($provider)->scopes(static::SCOPES)->fields(static::FIELDS)->user();
        } catch (InvalidStateException $e) {
            $request->session()->invalidate();
            abort(403, 'Invalid provider token, please try again');
        }

        $request->session()->regenerate();

        $token = $this->authenticate($socialite, $provider);

        $destination = session('destination');
        $route = route('travel');

        return redirect($route);
    }

    public function authenticate($socialite, $provider = 'facebook') {
        DB::beginTransaction();

        /* Find user base on provider email */
        $user = WebUser::withTrashed()->where('email', $socialite->getEmail())->first();

        /* Create user if does not exists */
        if (!$user) {
            $user = $this->createUser($socialite);
        }

        /* Check if user is trashed */
        if ($user->deleted_at) {
            abort(403, 'User has been deactivated by the admin.');
        }

        /* Create socialite provider */
        if (empty($user->facebook_id)) {
            $user->update([
                'facebook_id' => Hash::make($socialite->getId()),
            ]);
        }

        /* Check if socialite id matches */
        if (!Hash::check($socialite->getId(), $user->facebook_id)) {
            abort(403, 'Invalid provider credentials');
        }

        /* Generate token and login */
        $this->guard()->login($user);

        DB::commit();


        $route = route('travel');

        return redirect($route);
    }

    /**
     * Create User
     */
    protected function createUser($socialite) {
        $socialite = json_decode(json_encode($socialite->user));

        return WebUser::create([
            'first_name' => $socialite->first_name,
            'last_name' => $socialite->last_name,
            'email' => isset($socialite->email) ? $socialite->email : uniqid(),
            'email_verified_at' => now(),
            'password' => Str::random(),
        ]);
    }

    /**
     * Get guard
     */
    protected function guard() {
        return Auth::guard('web_user');
    }
}
