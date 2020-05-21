<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kategorija;
use App\Nuotrauka;
use App\Preke;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\PrekeKrepselis;
use Illuminate\Database\QueryException;

class CartController extends Controller
{
    public function index()
    {
        $allcategories = Kategorija::all();
        $item = Preke::all();
        $kr = session('krepselis');
//        dd($kr);
        if (session()->has('krepselis')) {
            $result = DB::table('krepselis')->where('krepselis.id_krepselis', '=', $kr)->leftJoin('preke_krepselis', 'id_krepselis', '=', 'preke_krepselis.fk_krepselis')
                ->leftJoin('preke', 'preke_krepselis.fk_preke', '=', 'id_preke')
                ->select('preke_krepselis.*', 'preke.kaina', 'preke.pavadinimas', 'preke.aprasymas', DB::raw('krepselis.kaina as kr_kaina'))->get();


            return view('cart', compact('allcategories', 'result', 'kr'));
        }
    }
    public function deletePreke($id)
    {

        PrekeKrepselis::where('id_Tarpine','=',$id)->delete();
        return Redirect::to('/cart')->with('success', 'Item deleted');

    }

}
