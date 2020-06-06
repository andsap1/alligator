<?php

namespace App\Http\Controllers;
use App\Kategorija;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AccController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $user=User::where('id','=', $userId)->first();
        $allcategories = Kategorija::all();
        return view('acc', compact('user','allcategories'));
    }

    public function confirmEditAcc(Request $request, $userId)
    {
        $validator = Validator::make(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email')
//                'password' => $request->input('password'),
//                'password2' => $request->input('password_confirmation')
            ],
            [
                'name' => 'required',
                'email' => 'required|email|max:30'
//                'password' => 'max:8',
//                'password2' => 'max:8'
            ]
        );

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            if($request->input('password')!=null || $request->input('password_confirmation') !=null) {
                $slapt = $request->input('password');
                $slapt1 = $request->input('password_confirmation');
                if ($slapt == $slapt1) {
                    $data = User::where('id', '=', $userId)->update([
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'password' => Hash::make($request->input('password'))
                    ]);
                    return Redirect::back()->with('success', 'Information changed (incl. password)');
                }
                else{
                    return Redirect::back()->withErrors('Passwords do not match');}
            }
            else{
                $data = User::where('id', '=', $userId)->update([
                    'name'=>$request->input('name'),
                    'email' =>$request->input('email')
                ]);
                return Redirect::back()->with('success', 'Information changed');
            }
        }
    }
    public function signout(){
        Auth::logout();
        return Redirect::to('shop1')->with('success', 'Loged out');
    }


}
