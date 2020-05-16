<?php

namespace App\Http\Controllers;

use App\Kategorija;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $allcategories = Kategorija::all();

        return view('home', compact('allcategories'));
    }
}
