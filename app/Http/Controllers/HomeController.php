<?php

namespace App\Http\Controllers;

use App\Kategorija;
use Illuminate\Http\Request;
use App\Preke;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allcategories = Kategorija::all();
        return view('home',compact('allcategories'));
    }
}
