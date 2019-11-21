<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts = Contact::orderBy('updated_at', 'desc')->paginate(20);

        //$options = OOOOO::orderBy('id')->get()->pluck('name', 'id');


       
        return view('admin.contact.index',compact('contacts'));
        //return view('admin.contact.index',compact('contacts','options'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Contact $contact)
    {
        //
        $contact->body = $request->input('body','');

        $contact->save();
        return redirect()->route('admin.contacts.index')->with('message', '保存しました');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $contact = Contact::findOrFail($id);
        return view('admin.contact.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contact = Contact::findOrFail($id);
        //$options = OOOOO::orderBy('id')->get()->pluck('name', 'id');

        return view('admin.contact.edit', compact('contact'));
        //return view('admin.contact.index',compact('contacts','options'));
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
        //
        $contact = Contact::findOrFail($id);
        $contact->body = $request->input('body');
        //$contact->body = $request->input('body');
        //$contact->thumbnail = $request->input('thumbnail');

        $contact->save();
        return redirect()->route('admin.contacts.index')->with('message', '更新しました');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('admin.contacts.index');
    }
}
