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
        $currentUser = $this->user->find(Auth::user()->id);
        $contacts = $currentUser->contacts()->orderBy('created_at', 'desc')->paginate(5);
        return view('home', compact('contacts'));
    }
}
