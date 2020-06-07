<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kategorija;
use App\Krepselis;
use App\Preke;
use App\PrekeKrepselis;
use App\User;
use App\Uzsakymas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;

class OrderController extends Controller
{
    public function index(){
        $allcategories=Kategorija::all();
        $items = Preke::all();
        $cate='null';

        $kr=session('krepselis');

        if(session()->has('krepselis')) {
            $result = DB::table('krepselis')->where('krepselis.id_krepselis', '=', $kr)->leftJoin('preke_krepselis', 'id_krepselis', '=', 'preke_krepselis.fk_krepselis')
                ->leftJoin('preke', 'preke_krepselis.fk_preke', '=', 'id_preke')
                ->select('preke_krepselis.*', 'preke.kaina', 'preke.pavadinimas', 'preke.aprasymas', DB::raw('krepselis.kaina as kr_kaina'))->get();
        }
        return view('order', compact('allcategories','result', 'kr'));
    }


    public function insertOrder(Request $request)
    {
        $kr=session('krepselis');
        $id = auth()->user()->id;
        $validator = Validator::make(
            [   'adresas' =>$request->input('adresas'),
                'vardas'=>$request->input('vardas'),
                'pavarde'=>$request->input('pavarde')

            ],
            [   'adresas' => 'required',
                'vardas' => 'required',
                'pavarde' => 'required'

            ]
        );

        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $allInfo = new Uzsakymas();
            $allInfo->adresas  = $request->input('adresas');
            $allInfo->vardas  = $request->input('vardas');
            $allInfo->pavarde  = $request->input('pavarde');
            $allInfo->busena  = 'pateiktas';
            $allInfo->data = Carbon::now('Europe/Vilnius');
            $allInfo->fk_id_krepselis = $kr;
            $allInfo->fk_id_User = $id;
            $allInfo->save();

            session()->forget('krepselis');
            session(['kiekis'=>0]);

        }
        return Redirect::to('shop1')->with('success', 'Order accepted');
    }


}
