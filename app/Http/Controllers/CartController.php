<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kategorija;
use App\Nuotrauka;
use App\Preke;
use App\PrekeKrepselis;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function index(){
        $allcategories=Kategorija::all();
        $item = Preke::all();
        $kr=session('krepselis');
//        dd($kr);
        if(session()->has('krepselis')) {
            $result=DB::table('krepselis')->where('krepselis.id_krepselis','=',$kr)->leftJoin('preke_krepselis',
                'id_krepselis','=','preke_krepselis.fk_krepselis')
                ->leftJoin('preke','preke_krepselis.fk_preke','=','id_preke')
                ->select('preke_krepselis.*','preke.kaina','preke.pavadinimas','preke.aprasymas',DB::raw('krepselis.kaina as kr_kaina'))->get();
          foreach($result as $rs){
            $mainphoto=Nuotrauka::where('fk_preke','=',$rs->fk_preke)->get();
//              $rs=Nuotrauka::where('fk_preke','=','fk_preke')->first();
//              dd($mainphoto);
//              dd($rs);
          }
//
//            dd($mainphoto);
//            dd($result);
//            $results = DB::select('select preke.pavadinimas, preke.kaina,
//pasirinktos_prekes.id_Tarpine, pasirinktos_prekes.kiekis, preke.Spalva,
//krepselis.Kaina as Final_Kaina FROM (SELECT MAX(id_Krepselis)
// as lll FROM krepselis) a LEFT JOIN pasirinktos_prekes
// on a.lll=pasirinktos_prekes.fk_krepselio_id
// LEFT JOIN preke on pasirinktos_prekes.fk_prekes_id = preke.id_Preke LEFT JOIN krepselis on a.lll=krepselis.id_Krepselis');


//            $suma = DB::select(DB::raw("SELECT krepselis.Kaina as Final_Kaina, krepselis.id_Krepselis as IDD FROM (SELECT MAX(id_Krepselis) as lll FROM krepselis) a LEFT JOIN pasirinktos_prekes on a.lll=pasirinktos_prekes.fk_krepselio_id LEFT JOIN preke on pasirinktos_prekes.fk_prekes_id = preke.id_Preke LEFT JOIN krepselis on a.lll=krepselis.id_Krepselis LIMIT 1"));
//            $kiekis = DB::select(DB::raw("SELECT COUNT(a.Final_Kaina) as kiekiss From (SELECT preke.Pavadinimas, preke.Aprasymas, preke.Kaina, pasirinktos_prekes.kiekis, preke.Spalva, krepselis.Kaina as Final_Kaina FROM (SELECT MAX(id_Krepselis) as lll FROM krepselis) a LEFT JOIN pasirinktos_prekes on a.lll=pasirinktos_prekes.fk_krepselio_id LEFT JOIN preke on pasirinktos_prekes.fk_prekes_id = preke.id_Preke LEFT JOIN krepselis on a.lll=krepselis.id_Krepselis) a"));
//            foreach ($kiekis as $kk){
//                session(['kiekis'=>$kk->kiekiss]);
//            }
//            return view('cart', compact('allcategories', 'results', 'suma', 'kiekis'));
//        }else {
//            return redirect(route('main'));
        }
        return view('cart', compact('allcategories','result', 'kr','mainphoto'));
    }

        public function deletePreke($id)
            {

       PrekeKrepselis::where('id_Tarpine','=',$id)->delete();
       return Redirect::to('/cart')->with('success', 'Item deleted');

        }
}
