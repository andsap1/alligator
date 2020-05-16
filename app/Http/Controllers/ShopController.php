<?php

namespace App\Http\Controllers;

use App\Kategorija;
use App\Preke;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function indexHome(){
        $allcategories=Kategorija::all();
        $items = Preke::all();

        return view('home', compact('allcategories','items'));
    }
    public function index(){
        $allcategories=Kategorija::all();
        $items = Preke::all();

        return view('shop', compact('allcategories','items'));
    }

    public function getCategory($category)
    {
        if ($category) {
            $items = Preke::where('fk_prekes_kategorija', '=', $category)->get();
            $prekiusk = Preke::where('fk_prekes_kategorija', '=', $category)->get();
        } else {
            $items = Preke::all();
            $prekiusk = $items;
        }

        $allcategories = Kategorija::all();

        return view('shop', compact( 'allcategories','items'));
    }
}
