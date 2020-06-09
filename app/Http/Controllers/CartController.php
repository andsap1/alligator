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
        }
        else {
            return Redirect::back();
        }

        return view('cart', compact('allcategories','result', 'kr'));
    }


    public function updatePreke($id, Request $request){
        $kr=session('krepselis');
       $preke= PrekeKrepselis::where('id_Tarpine','=',$id)->first();
        $plus=$request->input('plus');
        $minus=$request->input('minus');
            if($plus!=null){
                $preke->update(
                    [
                        'kiekis' => $preke->kiekis+1,
                    ]);
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
                return Redirect::back()->with('success', 'Quantity changed');
            }
            elseif($minus!=null && $preke->kiekis>1){
                $preke->update(
                    [
                        'kiekis' => $preke->kiekis-1,
                    ]);
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
                return Redirect::back()->with('success', 'Quantity changed');
            }
        else {
            return Redirect::back()->withErrors('Quantity can not be less than 1');
        }


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
