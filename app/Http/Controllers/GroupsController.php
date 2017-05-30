<?php

namespace App\Http\Controllers;

use App\Group;
use Auth;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    public function index(Group $group)
    {
        $contacts = $group->contacts()->where('user_id', Auth::user()->id)->paginate(10);
        return view('contacts.index', compact('contacts'));
    }
}
