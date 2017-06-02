<?php

namespace App\Http\Controllers;

use App\Contact;
use Validator;
use Illuminate\Http\Request;
use DB;
use Auth;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contacts = Auth::user()->contacts->take(10);
        return response()->json($contacts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $types = DB::table('phonetype')->get();
        return response()->json($types);
    }

    /**
     * Get a validator for save.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'contactname' => 'required|max:255',
            'phonenumber' => 'required|numeric',
            'phonetype_id' => 'required|int',
            'email' => 'required|email|max:255',
            'bday' => 'date'
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        Auth::user()->addContact($request->all());
        //Contact::create();
        return response()->json(['message' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param Contact $contact
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param int $id
     */
    public function show(Contact $contact)
    {
        if(Auth::user()->contacts->contains($contact)){
            return view('contacts.detail')->with('contact', $contact);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
     * Retrieve a list of contacts based on top list type
     * Newest, Recently viwed and etc.
     * @param string $listType
     * @return json
     * */
    public function top($listType)
    {
        $type = 'updated_at';
        switch ($listType){
            case 'newly-added':
                $type = 'created_at';
                break;
        }

        $contacts = Auth::user()->contacts()->orderBy($type, 'desc')->take(10)->get();
        $contacts->load('phonetype');
        return response()->json($contacts);
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
            ->filter($input)
            ->paginate(10);
        return response()->json($contacts->items());
    }
}
