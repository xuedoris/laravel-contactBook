<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Redirect;
use App;

class LocaleController extends Controller
{
    /**
     * Store user preferred language/locale in the session
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {
       	session()->put(['locale' => $locale]);
        return Redirect::back();
    }
}
