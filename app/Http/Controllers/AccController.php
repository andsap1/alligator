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
        // $uzsakymai = Uzsakymas::where('fk_id_Klientas', '=', $userId); //kliento uzsakymams matyti
        //   $uzsakymai = Uzsakymas::all(); //kliento uzsakymams matyti

//        $uzsakymai= DB::table('uzsakymas')
//            ->join('busena','uzsakymas.Busena','=', 'busena.id_Busena')
//            ->join('klientas','uzsakymas.fk_id_Klientas','=', 'klientas.id_Klientas')
//            ->where('id_Klientas','=', $userId)
//            ->select('uzsakymas.id_Uzsakymas', 'uzsakymas.Busena', 'busena.name')
//            ->get();



        return view('acc', compact('user','allcategories'));
    }

    public function confirmEditAcc(Request $request, $userId)
    {
        $validator = Validator::make(
            [
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'password2' => $request->input('password_confirmation')

            ],
            [
                'name' => 'required',
                'email' => 'required|max:30',
                'password' => 'max:8',
                'password2' => 'max:8'
            ]
        );

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        } else {
            if($request->input('password')!=null && $request->input('password_confirmation') !=null) {
                $data = User::where('id', '=', $userId)->update([
                    'name'=>$request->input('name'),
                    'email' =>$request->input('email'),
                    'password' => Hash::make($request->input('password'))
                ]);
                return Redirect::back()->with('success', 'Pakeista');
            }
            else{
                $data = User::where('id', '=', $userId)->update([
                    'name'=>$request->input('name'),
                    'email' =>$request->input('email')
                ]);

                return Redirect::back()->with('success', 'Pakeista');
            }


        }
    }
    public function signout(){
        Auth::logout();
        return Redirect::to('shop1')->with('success', 'Atsijungta');
    }


}
