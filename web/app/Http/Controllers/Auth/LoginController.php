<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\SocialAccounts;
use App\User;
use Auth;
use Illuminate\Support\Facades\Redirect;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected function redirectTo() {
        return '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return Redirect::to('/home');
        }

        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return Redirect::to('/');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($facebookUser)
    {
        if ($authUser = User::where('facebook_id', $facebookUser->id)->first()) {
            return $authUser;
        }
        $newUser = new User;
        $newUser->facebook_id = $facebookUser->id;
        $newUser->name = $facebookUser->name;
        $newUser->email = $facebookUser->email.'_fb';
        $newUser->save();
    }

    public function redirectToGoogle()
    { 
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return Redirect::to('/home');
        }

        $authUser = $this->findOrCreateUserGoogle($user);

        Auth::login($authUser, true);

        return Redirect::to('/');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUserGoogle($googleUser)
    {
        if ($authUser = User::where('google_id', $googleUser->id)->first()) {
            return $authUser;
        }
        $newUser = new User;
        $newUser->google_id = $googleUser->id;
        $newUser->name = $googleUser->name;
        $newUser->email = $googleUser->email.'_google';
        $newUser->save();
    }
}
