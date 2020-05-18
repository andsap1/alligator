<?php

namespace App\Http\Controllers;

use App\Kategorija;
use App\Nuotrauka;
use App\Preke;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    public function indexHome(){
        $allcategories=Kategorija::all();

        return view('home', compact('allcategories'));
    }
    public function index(){
        $allcategories=Kategorija::all();
        $items = Preke::all();
        $cate='null';
        $photo=Nuotrauka::all();
//dd($photo->pavadinimas);


        return view('shop1', compact('allcategories','items','cate','photo'));
    }

    public function getCategory($category)
    {
        if ($category) {
            $items = Preke::where('fk_prekes_kategorija', '=', $category)->get();
            $prekiusk = Preke::where('fk_prekes_kategorija', '=', $category)->get();
            $cate=Kategorija::where('id_kateg','=',$category)->first();

            $photo=Nuotrauka::all();

        } else {
            $items = Preke::all();
            $prekiusk = $items;
            $cate='null';
        }

        $allcategories = Kategorija::all();

        return view('shop1', compact( 'allcategories','items','cate','photo'));
    }

    public function openPreke($id)
    {
        $item = Preke::where('id_preke', '=', $id)->first();
        $categoryname= Kategorija::where('id_kateg', '=', $item->fk_prekes_kategorija)->first();
        $allcategories = Kategorija::all();
        $mainphoto=Nuotrauka::where('fk_preke','=',$id)->first();
        $kiekft=Nuotrauka::where('fk_preke','=',$id)->count();
        $allphotos=Nuotrauka::where('fk_preke','=',$id)->offset(1)->take($kiekft)->get();
        return view('item', compact('item','allcategories', 'categoryname','allphotos','mainphoto'));

    }
}
