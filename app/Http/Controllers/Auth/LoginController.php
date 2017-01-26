<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
    * Override the trait function username() from AuthenticatesUsers trait
    */
    public function username()
    {
        return 'username';
    }

    /**
     * Send the post-authentication response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @return \Illuminate\Http\Response
     */
    private function authenticated(Request $request, $user)
    {
        if ($user->g2fa_secretkey) {
            Auth::logout();

            session()->put('2fa:user:id', $user->id);
            return redirect('2fa/validate');
        }

        return redirect()->intended($this->redirectTo);
    }
}
