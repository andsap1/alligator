<?php

namespace App\Http\Controllers;

use App\Kategorija;
use App\Komentaras;
use App\Krepselis;
use App\Nuotrauka;
use App\Preke;
use App\PrekeKrepselis;
use App\TarpinePrekes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    public function indexHome(){
        $allcategories=Kategorija::all();

        return view('home', compact('allcategories'));
    }
    public function index(){
        $allcategories=Kategorija::all();
        $items = Preke::all()->sortByDesc('ikelimo_data');
        //$items = Preke::paginate(4);//->sortByDesc('ikelimo_data');
       // $items=Preke::paginate(4);
        $cate='null';
        $photo=Nuotrauka::all();
//dd($photo->pavadinimas);


        return view('shop1', compact('allcategories','items','cate','photo'));
    }


    public function getCategory($category)
    {
        if ($category) {
            $items = Preke::where('fk_prekes_kategorija', '=', $category)->get()->sortByDesc('ikelimo_data');
            $prekiusk = Preke::where('fk_prekes_kategorija', '=', $category)->get();
            $cate=Kategorija::where('id_kateg','=',$category)->first();

            $photo=Nuotrauka::all();

        } else {
            $items = Preke::all();
            $prekiusk = $items;
            $cate='null';
        }

        $allcategories = Kategorija::all();

        return view('shop1', compact( 'allcategories','items','cate','photo'));
    }

    public function openPreke($id)
    {
        $item = Preke::where('id_preke', '=', $id)->first();
        $categoryname= Kategorija::where('id_kateg', '=', $item->fk_prekes_kategorija)->first();
        $allcategories = Kategorija::all();
        $mainphoto=Nuotrauka::where('fk_preke','=',$id)->first();
        if($mainphoto==null){
            $mainphoto=new Nuotrauka();
            $mainphoto->pavadinimas='no photo';
        }
        $kiekft=Nuotrauka::where('fk_preke','=',$id)->count();
        $allphotos=Nuotrauka::where('fk_preke','=',$id)->offset(1)->take($kiekft)->get();
        return view('item', compact('item','allcategories', 'categoryname','allphotos','mainphoto'));

    }

    public function insertPrekeKomentaras(Request $request, $id)
    {
        $validator = Validator::make(
            [   'vart_vardas' =>$request->input('vart_vardas'),
                'tekstas' =>$request->input('tekstas'),

            ],
            [   'vart_vardas' => 'required| max:30',
                'tekstas' => 'required',
            ]
        );
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $komentaras = new Komentaras();
            $komentaras->vart_vardas  = $request->input('vart_vardas');
            $komentaras->tekstas  = $request->input('tekstas');
            $komentaras->data  = Carbon::now();
            $komentaras->fk_preke = $id;

            $komentaras->save();
        }
        return Redirect::back()->with('success', 'Komentaras pridėtas');
    }


    public function insertPrekeVertinimas(Request $request, $ids)
    {
        $validator = Validator::make(
            [   'stars' =>$request->input('stars'),
            ],
            [   'stars' => 'required',
            ]
        );
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else {
            $p= Preke::where('id_preke', '=', $ids)->first();
            $iv=$p->ivertinimas;
            $sk=$p->Ivertinimu_sk+1;
            $data = Preke::where('id_preke', '=', $ids)->update([
                'ivertinimas' => $request->input('stars')+$iv,
                'Ivertinimu_sk' => $sk
            ]);
        }

        return Redirect::back()->with('success', 'Ivertinta');
    }



    public function insertPrekeKrepselis(Request $request)
    {
        $validator = Validator::make(
            ['kiekis' => $request->input('kiekis'),

            ],
            ['kiekis' => 'required|numeric'
            ]
        );
        if ($request->session()->has('krepselis')) {

            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }

            $kaina = Preke::where('id_preke', $request->input('preke'))->first();
            $data = Krepselis::where('id_krepselis', session('krepselis'))->first();
            $nauja = (($kaina->kaina) * $request->input('kiekis')) + $data->kaina;

            Krepselis::where('id_krepselis', session('krepselis'))->update(
                [
                    'kaina' => $nauja,
                ]);
            $vs=PrekeKrepselis::where('fk_krepselis', session('krepselis'))->get();
            $skaicius=PrekeKrepselis::where('fk_krepselis', session('krepselis'))->count();
            for($i=0; $i<$skaicius; $i++)
            {

                if($vs[$i]->fk_preke == $request->input('preke'))
                    {
                        PrekeKrepselis::where('id_Tarpine', $vs[$i]->id_Tarpine)->update([
                            'kiekis' => $request->input('kiekis')+$vs[$i]->kiekis]);
                       break;
                    }
                else {
                    $i++;
//
//                    $tarpine = new PrekeKrepselis();
//                    $tarpine->kiekis = $request->input('kiekis');
//                    $tarpine->fk_preke = $request->input('preke');
//                    $tarpine->fk_krepselis = session('krepselis');
//                    $tarpine->save();

                }
            }


//            foreach ($visostarpines as $vs){
//                if($vs->fk_preke == $request->input('preke'))
//                    {
//                        PrekeKrepselis::where('id_Tarpine', $vs->id_Tarpine)->update([
//                            'kiekis' => $request->input('kiekis')+$vs->kiekis,]);
//                       break;
//                    }
//                else {
//                    $tarpine = new PrekeKrepselis();
//                    $tarpine->kiekis = $request->input('kiekis');
//                    $tarpine->fk_preke = $request->input('preke');
//                    $tarpine->fk_krepselis = session('krepselis');
//                    $tarpine->save();
//
//                }
//            }

//            $tarpine = new PrekeKrepselis();
//            $tarpine->kiekis = $request->input('kiekis');
//            $tarpine->fk_preke = $request->input('preke');
//            $tarpine->fk_krepselis = session('krepselis');
//            $tarpine->save();
//
//
            return Redirect::to('cart')->with('success', 'Pridėta');
        }

        else {
            if ($validator->fails()) {
                return Redirect::back()->withErrors($validator);
            }
            $kaina = Preke::where('id_preke', $request->input('preke'))->first();

            $krepselis = new Krepselis();
            $krepselis->kaina = ($kaina->kaina) * $request->input('kiekis');
            $krepselis->save();

            $tarpine = new PrekeKrepselis();
            $tarpine->kiekis = $request->input('kiekis');
            $tarpine->fk_preke = $request->input('preke');
            $tarpine->fk_krepselis = $krepselis->id_krepselis;
            $tarpine->save();
            session(['krepselis' => $krepselis->id_krepselis]);




            return Redirect::to('/cart')->with('success', 'Nebuvo krepselio(prideta)');
        }
    }
    public function sort(Request $request, $category)
    {

        $allcategories=Kategorija::all();
        $cate=Kategorija::where('id_kateg','=',$category)->first();

        $photo=Nuotrauka::all();
        if ($category) {
        switch( $_POST['orderBy'] ) {
           case '':


               $items = Preke::where('fk_prekes_kategorija', '=', $category)->get()->sortByDesc('ikelimo_data');



                break;
            case 'asc':
              //  $items = DB::table('preke')->orderBy('kaina','asc')->get();
                $items = Preke::where('fk_prekes_kategorija', '=', $category)->get()->sortBy('kaina');


                $photo=Nuotrauka::all();
                break;
            case 'desc':
                $items = Preke::where('fk_prekes_kategorija', '=', $category)->get()->sortByDesc('kaina');
              //  $items = DB::table('preke')->orderBy('kaina','desc')->get();
                break;
        }
            $prekiusk = Preke::where('fk_prekes_kategorija', '=', $category)->get();
            $cate=Kategorija::where('id_kateg','=',$category)->first();

            $photo=Nuotrauka::all();
        }
        else
        {
            $cate="null";
        }

$allcategories = Kategorija::all();
        return view('shop1', compact('allcategories','items','cate','photo'));
        //return redirect()->back()->with(compact('items','allcategories','cate','photo'));
    }
    public function sort1(Request $request)
    {
        //$orderBy = request('orderBy');
        // $items = Preke::all()->sortBy('kaina','asc');
        //$items = Preke::('kaina', 'asc')->get();
        $allcategories=Kategorija::all();
        //$items = Preke::all();
        $cate='null';
        $photo=Nuotrauka::all();
        switch( $_POST['orderBy'] ) {
            case '':
                $items = DB::table('preke')->orderBy('ikelimo_data','desc')->get();
                break;
            case 'asc':
                $items = DB::table('preke')->orderBy('kaina','asc')->get();
                break;
            case 'desc':
                $items = DB::table('preke')->orderBy('kaina','desc')->get();
                break;
        }
        return view('shop1', compact('allcategories','items','cate','photo'));
        //return redirect()->back()->with(compact('items','allcategories','cate','photo'));
    }
}
