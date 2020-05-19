<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kategorija;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function index()
    {

        $allcategories = Kategorija::all();

        return view('email', compact('allcategories'));
    }

 public function send(Request $request)
    {
        $data = array(
            'messagebody' => $request->input('zinute'),
            'email' => $request->input('elpastas')
        );
        Mail::send('email', $data,

            function ($message) use ($data) {
                $message->from($data['email']);
                $message->to('tobis1599@gmail.com', 'To FakeName')->subject('alligator testas');
                $message->subject('Ar veikia?');

            });

        $allcategories=Kategorija::all();

       return view('email', compact('allcategories'));

    }
}
