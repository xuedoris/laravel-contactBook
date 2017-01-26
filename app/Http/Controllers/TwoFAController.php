<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
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
     * @param  Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postValidateToken(Request $request)
    {
        //get user id and create cache key
        $userId = $request->session()->pull('2fa:user:id');
        $user = User::findOrFail(
                $userId
            );
        $valid = Google2FA::verifyKey($user->g2fa_secretkey, $request['totp']);

        if($valid) {
        	//login and redirect user
	        Auth::loginUsingId($userId);

	        return redirect('/home');
        } else return redirect('login');

    }
}
