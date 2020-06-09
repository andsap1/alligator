@extends('layouts.app')
@section('turinys')

@if($cate!='null')

       <h1 id="antraste">{{$cate->pavadinimas}}</h1>
      <hr>

           <form method="POST" action="{{Route('sort', $cate->id_kateg)}}" >
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <span class="input-field">
        <label style="padding-left: 15px">Order by </label>
        <select name="orderBy" id="orderBy"  class="form-control" style="width: fit-content; display:inherit">
            <option value="">newest</option>
            <option value="asc">price low</option>
            <option value="desc">price high</option>
        </select>
<button type="submit" class="btn" id="mygtukas" style="display: inherit; margin-top: 0px;">Order</button>
    </span>
<br>
               <br>
           </form>


    @else
    <h1 id="antraste">All products</h1>
    <hr>

        <form method="POST" action="{{Route('sort1')}}" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <span class="input-field">
        <label style="padding-left: 15px">Order by </label>
        <select name="orderBy" id="orderBy"  class="form-control" style="width: fit-content; display:inherit">
            <option value="">newest</option>
            <option value="asc">price low</option>
            <option value="desc">price high</option>
        </select>
<button type="submit" class="btn" id="green_btn" style="display: inherit; margin-top: 0px;">Order</button>
    </span>
<br>
            <br>

        </form>

@endif
<div id="result"></div>
<script>
        var selectedItem = sessionStorage.getItem("SelectedItem");
        $('#orderBy').val(selectedItem);
sessionStorage.removeItem("SelectedItem");
        $('#orderBy').change(function () {
            var idetVal = $(this).val();
            sessionStorage.setItem("SelectedItem", idetVal);

});

</script>
    @if(count($items) === 0)
        <p>There is no products with this category yet.</p>
    @else
    @foreach($items as $item)
        <div>
        <div class="col-md-4">
            <div class="card item">
                <a href="{{ action('ShopController@openPreke', $item->id_preke)}}" >
                <div class="img-wrap">
                @foreach($photo as $ph)
                    @if ($item->id_preke == $ph->fk_preke)
                           <img src="{{ asset('/images') . '/' . $ph->pavadinimas . '.jpg'}}"  alt="paveiksliukas {{$ph->pavadinimas}}" >
                       @break
{{--                        @else {{'no photo'}} @break;--}}
                    @endif

                @endforeach
                </div>
                <div class="info-wrap">
                    <h4 class="title">{{$item->pavadinimas}}</h4>
                    <div class="text"> <p>{{$item->aprasymas}}</p></div>
                </div>
                <div class="info-wrap">
                    @if($item->galiuko_aukstis)
                            <div><span id="info1">Lenght:&nbsp</span>{{$item->ilgis}}cm &nbsp
                                <span id="info1">Tip&nbspheight:&nbsp</span>{{$item->galiuko_aukstis}}cm</div>
                            <div><span id="info1">Diameter:&nbsp</span>{{$item->diametras}}mm</div>

                        @else
                        <div><span id="info1">Lenght:&nbsp</span>{{$item->ilgis}}cm</div>
                        <div><span id="info1">Diameter:&nbsp</span>{{$item->diametras}}mm</div>
                    @endif
                    </div> <!-- rating-wrap.// -->


                <div class="bottom-wrap">

                    <a href="{{ action('ShopController@openPreke', $item->id_preke)}}" class="btn btn-primary float-right" id="green_btn" style="margin-right: 10px;">
                        View</a>
                    <div class="price h4">{{$item->kaina}} Eur
                    </div>
                </div>
                </a>
            </div>
         </div>

        </div>

    @endforeach
    @endif

@endsection
