<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kategorija;
use App\Preke;
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
        return view('order', compact('allcategories','result', 'kr'));
    }
    // public function insertOrd(Request $request){
       // $userId = Auth::id();
      /*  $suma = DB::select( DB::raw("SELECT krepselis.Kaina as Final_Kaina, krepselis.id_Krepselis as
       IDD FROM (SELECT MAX(id_Krepselis) as lll FROM krepselis) a LEFT JOIN pasirinktos_prekes
      on a.lll=pasirinktos_prekes.fk_krepselio_id LEFT JOIN preke on pasirinktos_prekes.fk_prekes_id = preke.id_Preke
      LEFT JOIN krepselis on a.lll=krepselis.id_Krepselis LIMIT 1") );
        DB::table('kreditine_kortele')->insert(
            ['Korteles_numeris' => $request->input('field4'), 'Savininko_Vardas' => $request->input('field5'),
       'Savininko_Pavarde' => $request->input('field6'), 'Galiojimo_Menesis' => $request->input('field9'),
       'Galiojimo_Metai' => $request->input('field10'), 'CVS' => $request->input('field7'), 'fk_id_Klientas' => $userId]
        );
        DB::table('adresas')->insert(
            ['Adresas' => $request->input('field1'), 'Miestas' => $request->input('field2'), 'Pasto_Kodas' => $request->input('field3')]
        );
        $adr = DB::select( DB::raw("SELECT id_Adresas From adresas Order by id_Adresas Desc LIMIT 1") );
        $krd = DB::select( DB::raw("SELECT id_Kreditine_Kortele From kreditine_kortele Order by id_Kreditine_Kortele Desc LIMIT 1") );
        DB::table('uzsakymas')->insert(
            ['Busena' => 1, 'Data' => date("Y-m-d"), 'fk_id_Klientas' => $userId, 'fk_id_krepselis' => $suma[0]->IDD, 'fk_id_adresas' => $adr[0]->id_Adresas, 'Papildoma_Informacija' => $request->input('field8'), 'fk_id_kreditine_kortele' => $krd[0]->id_Kreditine_Kortele]
        );
        return Redirect::to('shop')->with('success', 'Uzsakyta');*/
//        public function insertAutomobiliai(Request $request)
//        {
//            $validator = Validator::make(
//                [   'valst_nr' =>$request->input('valst_nr'),
//                    'apziura'=>$request->input('apziura'),
//                    'marke'=>$request->input('marke'),
//                    'modelis'=>$request->input('modelis'),
//                    'savininkas_id'=>$request->input('savininkas_id')
//                ],
//                [   'valst_nr' => 'required|min:5|max:6 |alpha_num',
//                    'apziura' => 'required',
//                    'marke' => 'required',
//                    'modelis' => 'required',
//                    'savininkas_id' => 'required'
//                ]
//            );
//
//            if ($validator->fails())
//            {
//                return Redirect::back()->withErrors($validator);
//            }
//            else
//            {
//                $allAuto = new auto();
//                $allAuto->valst_nr  = $request->input('valst_nr');
//                $allAuto->apziura  = $request->input('apziura');
//                $allAuto->marke  = $request->input('marke');
//                $allAuto->modelis  = $request->input('modelis');
//                $allAuto->savininkas_id  = $request->input('savininkas_id');
//
//                $allAuto->save();
//            }
//            return Redirect::to('/automobiliai')->with('success', 'Automobilis pridėtas');
//      //  }
    //}

      //  return view('order', compact('allcategories','items','cate'));
   // }


}
