<?php

namespace App\Http\Controllers;

use App\Kategorija;
use App\Preke;
use App\User;
use App\Uzsakymas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
//    public function admin()
//    {
//        return view('adminLog');
//    }
    public function index()
    {
        $allcategories=Kategorija::all();
        return view('admin',compact('allcategories'));
    }
    public function users()
    {
        $allNaud = User::all();
        return view('users', compact('allNaud'));
    }
    public function product()
    {
        $allPro = Preke::all();
        return view('product', compact('allPro'));
    }
    public function orders()
    {
        $allUz = Uzsakymas::all();
        return view('orders', compact('allUz'));
    }
    public function confirmEditedUser(Request $request, $id)
    {
    $validator = Validator::make(
        [
            'name' => $request->input('name'),
            'email' => $request->input('email')

        ],
        [
            'name' => 'required',
            'email' => 'required|max:30'
        ]
    );

    if ($validator->fails())
    {
        return Redirect::back()->withErrors($validator);
    }
    else
    {
        $data = User::where('id', '=', $id)->update([
            'name'=>$request->input('name'),
            'email' =>$request->input('email')
        ]);
    }
    return Redirect::to('/users')->with('success', 'User Edited');
}

    public function editUser($id)
    {
        $selectedUser = User::where('id','=',$id)->first();
        return view('useredit', compact('selectedUser'));
    }
    public function deleteUser($id)
    {
        /*$temos=knyg::where('fk_autorius','=',$id)->get();

        foreach ($temos as $tema) {
            knyg::where('id','=',$tema->id)->delete();
        }*/

        /*autor::where('id','=',$id)->delete();
        return Redirect::to('/index')->with('puiku', 'Autorius pašalintas');*/

            User::where('id','=',$id)->delete();
            return Redirect::to('/users')->with('puiku');
    }
}
