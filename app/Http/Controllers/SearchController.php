<?php

namespace App\Http\Controllers;

use App\Kategorija;
use App\Uzsakymas;
use Illuminate\Http\Request;
use App\Preke;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $request->validate(['search' => 'required|min:2|max:100']);
        $allcategories = Kategorija::all();
        $search = $request->input('search');
        $search = preg_replace("#[^0-9a-z_\s]#i","",$search);
        $preke = Preke::where('pavadinimas', 'LIKE', '%'.$search.'%')
            ->orWhere('aprasymas', 'LIKE', '%'.$search.'%')
            ->paginate(5);
        return view('searchrez',compact('allcategories'))->with('preke', $preke);
    }

    public function searchproduct(Request $request)
    {
        $allcategory = Kategorija::all();
        $request->validate(['search' => 'required|min:2|max:100']);
        $search = $request->input('search');
        $search = preg_replace("#[^0-9a-z_\s]#i","",$search);
            $preke = Preke::where('pavadinimas', 'LIKE', '%'.$search.'%')
                ->orWhere('aprasymas', 'LIKE', '%'.$search.'%')
                ->paginate(5);
            return view('searchproduct', compact('allcategory'))->with('preke', $preke);
    }

    public function searchorders(Request $request)
    {
        $request->validate(['search' => 'required|max:11']);
        $search = $request->input('search');
        $search = preg_replace("#[^0-9]#","",$search);
        $asUZ = Uzsakymas::where('id_uzsakymas', $search)->first();
        return view('searchorder')->with('asUZ', $asUZ);
    }
}
