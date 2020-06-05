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
    public function search(Request $request)
    {
        $request->validate(['search' => 'required|min:2|max:100']);
        $allcategories = Kategorija::all();
        $search = $request->input('search');
        $search = preg_replace("#[^0-9a-z]#i","",$search);
        $preke = Preke::where('pavadinimas', 'LIKE', '%'.$search.'%')
                        ->orWhere('aprasymas', 'LIKE', '%'.$search.'%')
                        ->paginate(5);
        return view('searchrez',compact('allcategories'))->with('preke', $preke);
    }
}
