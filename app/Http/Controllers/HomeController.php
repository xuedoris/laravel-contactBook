<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\Repositories\UserInterface as User;
use Auth;

class HomeController extends Controller
{
    protected $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = $this->user->getTopContacts(Auth::user()->id, 'newest-added', 5);
        //dd($user);
        return view('home', compact('contacts'));
    }
}
