<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('front.contact.index');
    }

    public function addcontact(Request $request)
    {
        $validatedData = $request->validate([
        'body' => 'required|max:1000',
        'email' => 'required|email',
        'name' => 'required|max:100',
        ]);

        $contact = new Contact;
        $contact->body = $request->input('body');
        $contact->email = $request->input('email');
        $contact->tel = $request->input('email');
        $contact->name = $request->input('name');

        $contact->save();

        return redirect()->route('front.contact.index')->with('message', 'この度はお問い合わせメールをお送りいただきありがとうございます。
後ほど、担当者よりご連絡をさせていただきます。
今しばらくお待ちくださいますようよろしくお願い申し上げます。

なお、しばらくたっても当社より返信がない場合は、
お客様によりご入力いただいたメールアドレスに誤りがある場合がございます。
その際は、お手数ですが再度送信いただくか、
お電話（ 000-1234-5678 ）にてご連絡いただけますと幸いです。');;
    }

    
}
