<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    public function  showLoginForm(){
        return view('auth.admin_login');

    }
    public function  login(Request $request){
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required|min:4'
        ]);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('adminRoutes.admin'));
        }
        return redirect()->back()->withInput($request->only('email', 'remember'));

    }

}
