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
        $items = Preke::all();

        return view('home', compact('allcategories','items'));
    }
    public function index(){
        $allcategories=Kategorija::all();
        $items = Preke::all();
        $cate='null';
       $photo= DB::table('prekes_nuotrauka')->first();
//        foreach($items as $item)
//        {
//            $photo=Nuotrauka::where('fk_preke','=',$item->id_preke)->first();
//        }
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
            foreach($items as $item)
            {
                $photo=Nuotrauka::where('fk_preke','=',$item->id_preke)->first();
            }
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
        $allphotos=Nuotrauka::where('fk_preke','=',$id)->get();
        return view('item', compact('item','allcategories', 'categoryname','allphotos'));

    }
}
