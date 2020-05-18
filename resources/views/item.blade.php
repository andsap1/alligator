@extends('layouts.app')

@section('turinys')

        <h1>{{$item->pavadinimas}}</h1>
        <div class="col-lg-2 image_list images">
            @foreach($allphotos as $photo)
            <ul class=" list-unstyled components ">
            <li ><img class="img-responsive" src="../images/{{$photo->pavadinimas}}.jpg"  alt="paveiksliukas {{$photo->pavadinimas}}"></li>
            </ul>
            @endforeach
        </div>

        <div class="col-lg-5 images">
            <div ><img class="img-responsive " src="../images/{{$mainphoto->pavadinimas}}.jpg"} alt="paveiksliukas {{$mainphoto->pavadinimas}}"></div>
        </div>

{{--        src="{{asset('images/item1.jpg')}}" alt=""--}}
        <!-- Description -->
        <div class="col-lg-4">
            <div class="product_description">
                <div class="product_category">Category: {{$categoryname->pavadinimas}}</div>
                <div class="product_name">{{$item->pavadinimas}}</div>
                {{-- <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>--}}
                <div class="product_text"><p>{{$item->aprasymas}}</p></div>
                <div class="product_measure ">
                    <p><span id="info1">Lenght:</span> {{$item->ilgis}}</p>
                    <p><span id="info1">Diameter:</span> {{$item->diametras}}</p>
                    @if($item->galiuko_aukstis)
                    <p><span id="info1">Tip height:</span> {{$item->galiuko_aukstis}}</p>
                        @endif
                </div>

                <div class="order_info d-flex flex-row">
                    <form method="POST" action="">
{{--                        {{ Route('insertPreke') }}--}}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="kiekis" >
                            <div>
                                <span for="kiekis">Quantity:</span>
                                <input type="number" id="kiekis" name="kiekis" min="1" max="10" value="1">
                            </div>
{{--                            <select name="preke">--}}
{{--                                <option value="{{$item->id_preke}}">--}}
{{--                                </option>--}}
{{--                            </select>--}}
                        </div>
                        <div>
                        <div class="product_price">{{$item->kaina}} Eur
                            <span id="cart-button"><button type="submit" class="btn btn-primary pull-right">Add to cart</button></span>
                        </div>
{{--                        <div class="cart_button">--}}

                        </div>

                    </form>
                </div>
            </div>
        </div>
</div>

{{--    @foreach($items as $item)--}}
{{--        <div class="col-md-4">--}}

{{--            <div class="card item">--}}
{{--                <div class="img-wrap"><img src="{{asset('images/log.png')}}"> </div>--}}
{{--                <div class="info-wrap">--}}
{{--                    <h4 class="title">{{$item->pavadinimas}}</h4>--}}
{{--                    <p class="desc">{{$item->aprasymas}}</p>--}}
{{--                    <div class="rating-wrap">--}}
{{--                        <div class="label-rating">{{$item->diametras}}</div>--}}
{{--                        <div class="label-rating">{{$item->ilgis}} </div>--}}
{{--                    </div> <!-- rating-wrap.// -->--}}
{{--                </div>--}}
{{--                <div class="bottom-wrap">--}}
{{--                    <a href="" class="btn btn-sm btn-primary float-right">Order Now</a>--}}
{{--                    <a href="{{ action('ShopController@openPreke', $item->id_preke)}}" class="btn btn-sm btn-primary float-right" style="margin-right: 5px;">Look</a>--}}
{{--                    <div class="price-wrap h5">--}}
{{--                        <span class="price-new">{{$item->kaina}}</span>--}}
{{--                    </div> <!-- price-wrap.// -->--}}
{{--                </div> <!-- bottom-wrap.// -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endforeach--}}
@endsection
