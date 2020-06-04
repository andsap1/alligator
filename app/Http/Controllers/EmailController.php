<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kategorija;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{

    public function index(){
        $allcategories=Kategorija::all();

        return view('email', compact('allcategories'));
    }


    public function send(Request $request){
        $data=array(
            'messagebody'=>$request->input('message'),
            'sbj'=>$request->input('sbj'),
            'email'=>$request->input('emaill')
        );
        Mail::send('mail',$data,

            /* Mail::send(['text'=>$request->input('tekstas')],['name'=>'Vardas'], */
            function ($message) use($data){
                $message->from($data['email'], $data['email']);
                $message->to('plaktaplyta98@gmail.com');
                $message->subject($data['sbj']);

            });
        $allcategories = Kategorija::all();
        return view('/home', compact('allcategories'));
    }
}
