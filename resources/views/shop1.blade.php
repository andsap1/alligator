@extends('layouts.app')

@section('turinys')
@if($cate!='null')
       <h1>{{$cate->pavadinimas}}</h1>
    @else
    <h1 >Visos prekės</h1>
@endif

    @foreach($items as $item)
        <div class="col-md-4">
            <div class="card item">
                <div class="img-wrap"><img src="{{asset('images/log.png')}}"> </div>
                <div class="info-wrap">
                    <h4 class="title">{{$item->pavadinimas}}</h4>
                    <p class="desc">{{$item->aprasymas}}</p>
                    <div class="rating-wrap">
                        <div class="label-rating">{{$item->diametras}}</div>
                        <div class="label-rating">{{$item->ilgis}} </div>
                    </div> <!-- rating-wrap.// -->
                </div>
                <div class="bottom-wrap">
                    <a href="" class="btn btn-sm btn-primary float-right">Order Now</a>
                    <a href="{{ action('ShopController@openPreke', $item->id_preke)}}" class="btn btn-sm btn-primary float-right" style="margin-right: 5px;">Look</a>
                    <div class="price-wrap h5">
                        <span class="price-new">{{$item->kaina}}</span>
                    </div> <!-- price-wrap.// -->
                </div> <!-- bottom-wrap.// -->
            </div>
        </div>
    @endforeach
@endsection
