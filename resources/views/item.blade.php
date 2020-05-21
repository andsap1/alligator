@extends('layouts.app')
<link href="{{ asset('css/rating.css') }}" rel="stylesheet">

@section('turinys')
{{--    border: solid 1px #8f94a0;--}}
    <a style="margin: 0 0 15px 15px;" href="http://localhost/alligator/public/">
{{--           <img style="width: 30px" src="../images/cart.png">--}}
           <svg class="bi bi-chevron-compact-left" width="1.5em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
               <path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 01.223.67L6.56 8l2.888 5.776a.5.5 0 11-.894.448l-3-6a.5.5 0 010-.448l3-6a.5.5 0 01.67-.223z" clip-rule="evenodd"/>
           </svg>
       </a>
        <h1>{{$item->pavadinimas}}</h1>
        <div class="col-lg-2 image_list">
            @foreach($allphotos as $photo)
            <div class=" list-unstyled components ">
            <img class="img-responsive" style="" src="../images/{{$photo->pavadinimas}}.jpg"  alt="paveiksliukas {{$photo->pavadinimas}}">
            </div>
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
                    <form method="POST" action="{{ Route('insertPreke') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="clearfix" >
                            <div>
                                <span for="kiekis">Quantity:</span>
                                <input type="number" id="kiekis" name="kiekis" min="1" max="10" value="1">
                            </div>

                            <select name="preke" style="visibility: hidden">
                                <option value="{{$item->id_preke}}">
                                </option>
                            </select>
                        </div>
                        <div>
                        <div class="product_price">{{$item->kaina}} Eur
                            <span id="cart-button"><button type="submit" class="btn btn-primary pull-right" id="green_btn">Add to cart</button></span>
                        </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
</div>
<div style="margin-top: 50px; " align="center">
    <p style="margin-bottom: 0px">Rating:
        @if($item->Ivertinimu_sk!=0){{round($item->ivertinimas/$item->Ivertinimu_sk, 2)}}
        @else {{$item->Ivertinimu_sk}}
        @endif
    </p>
    <form class="rating" method="POST" action="{{ Route('insertPrekeVertinimas', $item->id_preke) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div  style="margin-left: 7px" class="input-group">
            <label>
                <input type="radio" name="stars" value="1"  />
                <span class="icon">★</span>
            </label>
            <label>
                <input type="radio" name="stars" value="2" />
                <span class="icon">★</span>
                <span class="icon">★</span>
            </label>
            <label>
                <input type="radio" name="stars" value="3" />
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
            </label>
            <label>
                <input type="radio" name="stars" value="4" />
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
            </label>
            <label>
                <input type="radio" name="stars" value="5" />
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
                <span class="icon">★</span>
            </label>
        </div>

        <div>
            <button type="submit" class="btn btn-primary" id="green_btn">Rate</button>
        </div>
    </form>
    <br>
    <br>
    <br>
</div>



<div style="margin-top: 20px;" align="center">
    <p style="margin-bottom: 0px">Comment:</p>
    <form method="POST" action="{{ Route('insertKomentaras', $item->id_preke) }}" class="comment_form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <input type="text" class="form-control comment" name="vart_vardas" value=""  placeholder="Name">
        <textarea name="tekstas" type="text" class="form-control comment" required="required" placeholder="Write comment"></textarea>
        <br>
        <button type="submit" class="btn btn-primary" id="green_btn">Publish</button>
    </form>
</div>
</div>
@endsection
