<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Libs\Repositories\UserInterface as User;
use Auth;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
