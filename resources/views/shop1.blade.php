@extends('layouts.app')
<style>
    .text{
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        line-height: 16px;
        max-height: 32px;

        /* The number of lines to be displayed */
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }
</style>
@section('turinys')
@if($cate!='null')
       <h1>{{$cate->pavadinimas}}</h1>
    @else
    <h1 >Visos prekės</h1>
@endif

    @foreach($items as $item)
        <div class="col-md-4">
            <div class="card item">
                <div class="img-wrap">
                @foreach($photo as $ph)
                    @if ($item->id_preke == $ph->fk_preke)
                           <img src="./images/{{$ph->pavadinimas}}.jpg"  alt="paveiksliukas {{$ph->pavadinimas}}" >
{{--                        <p>{{$ph->pavadinimas}}</p>--}}
                       @break
{{--                        @else <img style="min-height: 300px"   alt="paveiksliukas {{$ph->pavadinimas}}" >--}}
{{--                        @break--}}
                    @endif

                @endforeach
                </div>
{{--
{{--                <div ><p>{{$photo->pavadinimas}}</p> </div>--}}
                <div class="info-wrap">
                    <h4 class="title">{{$item->pavadinimas}}</h4>
                    <div class="text"> <p>{{$item->aprasymas}}</p></div>
{{--                    <div class="rating-wrap">--}}
{{--                        <div class="label-rating">{{$item->diametras}}</div>--}}
{{--                        <div class="label-rating">{{$item->ilgis}} </div>--}}
{{--                    </div> <!-- rating-wrap.// -->--}}
                </div>
                <div class="info-wrap">

                    <div class="rating-wrap">
                        <div >{{$item->diametras}}</div>
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
