<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccController extends Controller
{
    public function index()
    {
//         $klientas=Klientas::where('id_Klientas','=', $userId)->first();
//        $allcategories = Kategorija::all();
//        // $uzsakymai = Uzsakymas::where('fk_id_Klientas', '=', $userId); //kliento uzsakymams matyti
//        //   $uzsakymai = Uzsakymas::all(); //kliento uzsakymams matyti
//
//        $uzsakymai= DB::table('uzsakymas')
//            ->join('busena','uzsakymas.Busena','=', 'busena.id_Busena')
//            ->join('klientas','uzsakymas.fk_id_Klientas','=', 'klientas.id_Klientas')
//            ->where('id_Klientas','=', $userId)
//            ->select('uzsakymas.id_Uzsakymas', 'uzsakymas.Busena', 'busena.name')
//            ->get();
//
//
//
//        return view('changePassword', compact('klientas','allcategories', 'uzsakymai'));
//    }
    }
}
