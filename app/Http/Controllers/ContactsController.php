<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use DB;
use Auth;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Auth::user()->contacts()->paginate(10);
        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = DB::table('phonetype')->pluck('phonetype', 'id');
        return view('contacts.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return
     */
    public function store(Request $request)
    {
        Contact::create($request->all());
        return view('contacts.create')->with('result', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Auth::user()->contacts()->where('id', $id)->first();
        return view('contacts.detail')->with('contact', $contact);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = DB::table('phonetype')->pluck('phonetype', 'id');
        $contact = Auth::user()->contacts()->where('id', $id)->first();
        return view('contacts.edit')->with(['types'=>$types, 'contact'=>$contact]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact = Auth::user()->contacts()->where('id', $id)->first();
        $contact->update([
            'contactname' => $request['contactname'],
            'phonenumber' => $request['phonenumber'],
            'email' =>$request['email'],
            'phonetype_id' => $request['phonetype_id'],
        ]);
        return view('contacts.edit')->with('result', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::destroy($id);
        $contacts = Auth::user()->contacts()->orderBy('created_at', 'desc')->paginate(5);
        $returnHTML = view('home', compact('contacts'))->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
        
    }

    /**
     * Search and show the requested contacts
     *
     * @param  string $input
     * @return \Illuminate\Http\Response
     */
    public function search($input)
    {
        
        $contacts = Auth::user()->contacts()
                        ->where('contactname', 'LIKE', $input.'%')
                        ->orWhere('phonenumber', 'LIKE', $input.'%')->paginate(10);
        $returnHTML = view('contacts.searchresult', compact('contacts'))->render();

        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }
}
