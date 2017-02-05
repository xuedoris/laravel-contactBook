<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidateTwoFARequest;
use Auth;
use Google2FA;

class TwoFAController extends Controller
{
    private $secretKey;
    private $keySize = 32;
    private $keyPrefix = '';

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function enable()
    {
        $user = Auth::user();
        $this->secretKey = Google2FA::generateSecretKey($this->keySize, $this->keyPrefix);
        $user->g2fa_secretkey = $this->secretKey;
        $user->save();
        $inlineUrl = Google2FA::getQRCodeInline(
            config('app.name'),
            'xuedoris@hot.com',
            $this->secretKey
        );
        return view('auth.2fa.enable', ['image' => $inlineUrl,
            'secret' => $this->secretKey]);
    }

    /**
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function disable()
    {
        $user = Auth::user();

        //make secret column blank
        $user->g2fa_secretkey = null;
        $user->save();

        return 'Disabled';
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function getValidateToken()
    {
        if (session('2fa:user:id')) {
            return view('auth.2fa.validate');
        }

        return redirect('login');
    }

    /**
     *
     * @param Illuminate\Http\Request|ValidateTwoFARequest $request
     * @return \Illuminate\Http\Response
     */
    public function postValidateToken(ValidateTwoFARequest $request)
    {
        //login and redirect user
        $userId = $request->session()->pull('2fa:user:id');
        Auth::loginUsingId($userId);
        session()->flash('welcomeMessage', 'Welcome !!!');
        return redirect('/home');;
    }
}
