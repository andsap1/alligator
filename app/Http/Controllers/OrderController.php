<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kategorija;
use App\Preke;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $allcategories=Kategorija::all();
        $items = Preke::all();
        $cate='null';
        return view('order', compact('allcategories','items','cate'));
    }

}
