<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kategorija;
use App\Preke;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class OrderController extends Controller
{
    public function index(){
        $allcategories=Kategorija::all();
        $items = Preke::all();
        $cate='null';

        $kr=session('krepselis');
//        dd($kr);
        if(session()->has('krepselis')) {
            $result = DB::table('krepselis')->where('krepselis.id_krepselis', '=', $kr)->leftJoin('preke_krepselis', 'id_krepselis', '=', 'preke_krepselis.fk_krepselis')
                ->leftJoin('preke', 'preke_krepselis.fk_preke', '=', 'id_preke')
                ->select('preke_krepselis.*', 'preke.kaina', 'preke.pavadinimas', 'preke.aprasymas', DB::raw('krepselis.kaina as kr_kaina'))->get();

        }
        $id = auth()->user()->id;
        // print_r($id);

        return view('order', compact('allcategories','result', 'kr', 'id'));
    }
    






}
