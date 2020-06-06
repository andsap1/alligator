<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kategorija;
use App\Krepselis;
use App\Nuotrauka;
use App\Preke;
use App\PrekeKrepselis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function index(){
        $allcategories=Kategorija::all();
        $kr=session('krepselis');
        if(session()->has('krepselis')) {
            $result=DB::table('krepselis')->where('krepselis.id_krepselis','=',$kr)->leftJoin('preke_krepselis', 'id_krepselis','=','preke_krepselis.fk_krepselis')
                ->leftJoin('preke','preke_krepselis.fk_preke','=','id_preke')
                ->select('preke_krepselis.*','preke.kaina','preke.pavadinimas','preke.aprasymas',DB::raw('krepselis.kaina as kr_kaina'))->get();

            $visosp = DB::table('preke_krepselis')->where('preke_krepselis.fk_krepselis','=',$kr)->get();
            $kiekelis=0;
            foreach ($visosp as $kk){
                $kiekelis=$kiekelis+$kk->kiekis;
            }
            session(['kiekis'=>$kiekelis]);

//            dd($kiekelis);

//          for ($i=0; $i<$kiekis; $i++){
//              session(['kiekis'=>$kiekis]);
//          }
//            foreach ($kiekis as $kk){
//                session(['kiekis'=>$kk->kiekiss]);
//            }

//            (DB::raw("SELECT COUNT(a.Final_Kaina) as kiekiss From (SELECT preke.Pavadinimas, preke.Aprasymas, preke.Kaina, pasirinktos_prekes.kiekis, preke.Spalva, krepselis.Kaina as Final_Kaina FROM (SELECT MAX(id_Krepselis) as lll FROM krepselis) a LEFT JOIN pasirinktos_prekes on a.lll=pasirinktos_prekes.fk_krepselio_id LEFT JOIN preke on pasirinktos_prekes.fk_prekes_id = preke.id_Preke LEFT JOIN krepselis on a.lll=krepselis.id_Krepselis) a"));


//            $suma = DB::select(DB::raw("SELECT krepselis.Kaina as Final_Kaina, krepselis.id_Krepselis as
//IDD FROM (SELECT MAX(id_Krepselis) as lll FROM krepselis) a LEFT JOIN pasirinktos_prekes on a.lll=pasirinktos_prekes.fk_krepselio_id
//LEFT JOIN preke on pasirinktos_prekes.fk_prekes_id = preke.id_Preke LEFT JOIN krepselis on a.lll=krepselis.id_Krepselis LIMIT 1"));
//
//            $kiekis = DB::select(DB::raw("SELECT COUNT(a.Final_Kaina) as kiekiss From (SELECT preke.Pavadinimas, preke.Aprasymas, preke.Kaina, pasirinktos_prekes.kiekis, preke.Spalva, krepselis.Kaina as Final_Kaina FROM (SELECT MAX(id_Krepselis) as lll FROM krepselis) a LEFT JOIN pasirinktos_prekes on a.lll=pasirinktos_prekes.fk_krepselio_id LEFT JOIN preke on pasirinktos_prekes.fk_prekes_id = preke.id_Preke LEFT JOIN krepselis on a.lll=krepselis.id_Krepselis) a"));

//          foreach($result as $rs){
//              $mainphoto=Nuotrauka::where('fk_preke','=',$rs->fk_preke)->get();
////              dd($mainphoto);
//          }
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
        else {
            return Redirect::back();
        }

        return view('cart', compact('allcategories','result', 'kr'));
    }
    public function deletePreke($id)
    {
        $kr=session('krepselis');
        if( PrekeKrepselis::where('fk_krepselis','=',$kr)->count()>1)
        {
        PrekeKrepselis::where('id_Tarpine','=',$id)->delete();

        //update krepselio suma
            $naujakaina=0;
            $visoskp=PrekeKrepselis::where('fk_krepselis','=',$kr)->get();
            foreach ($visoskp as $vp){
                $preke=Preke::where('id_preke',$vp->fk_preke)->first();
                $naujakaina=$naujakaina+($preke->kaina*$vp->kiekis);
            }
            Krepselis::where('id_krepselis', $kr)->update(
                [
                    'kaina' => $naujakaina,
                ]);
        return Redirect::back()->with('success', 'Item deleted');
        }

        else{
            PrekeKrepselis::where('id_Tarpine','=',$id)->delete();
            $visosp=PrekeKrepselis::where('fk_krepselis','=',$kr)->get();
            Krepselis::where('id_krepselis','=',$kr)->delete();
            $kiekelis=0;
            foreach ($visosp as $kk){
                $kiekelis=$kiekelis+$kk->kiekis;
            }
            session(['kiekis'=>$kiekelis]);
            session()->forget('krepselis');

            return Redirect::to('shop1')->with('success', 'Item deleted');
        }

    }

}
