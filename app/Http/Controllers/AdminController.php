<?php

namespace App\Http\Controllers;

use App\Naudotojas;
use App\Preke;
use App\Uzsakymas;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin');
    }
    public function users()
    {
        $allNaud = Naudotojas::all();
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
}
