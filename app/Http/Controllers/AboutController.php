<?php

namespace App\Http\Controllers;

use App\Kategorija;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(){

        $allcategories=Kategorija::all();
        return view('about', compact('allcategories'));
    }
}
