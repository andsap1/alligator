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

       <h1 id="antraste">{{$cate->pavadinimas}}</h1>
      <hr>

           <form method="POST" action="{{Route('sort', $cate->id_kateg)}}" >
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <span class="input-field">
        <label>Order by </label>
        <select name="orderBy" id="orderBy"  class="form-control" style="width: fit-content; display:inherit">
            <option value="">newest</option>
            <option value="asc">price low</option>
            <option value="desc">price high</option>
        </select>
<button type="submit" class="btn" id="mygtukas" style="display: inherit; margin-top: 0px;">Order</button>
    </span>

           </form>


    @else
    <h1 id="antraste">All products</h1>
    <hr>

        <form method="POST" action="{{Route('sort1')}}" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <span class="input-field">
        <label>Order by </label>
        <select name="orderBy" id="orderBy"  class="form-control" style="width: fit-content; display:inherit">
            <option value="">newest</option>
            <option value="asc">price low</option>
            <option value="desc">price high</option>
        </select>
<button type="submit" class="btn" id="mygtukas" style="display: inherit; margin-top: 0px;">Order</button>
    </span>


        </form>

@endif
{{--<div>--}}
{{--<form method="POST" action="{{Route('sort')}}" >--}}
{{--    <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--    <span class="input-field">--}}
{{--        <label>Order by </label>--}}
{{--        <select name="orderBy" id="dropdown"  class="form-control" style="width: fit-content; display:inherit">--}}
{{--            <option value="">newest</option>--}}
{{--            <option value="asc" >price low</option>--}}
{{--            <option value="desc">price high</option>--}}
{{--        </select>--}}
{{--<button type="submit" class="btn" id="mygtukas" style="display: inherit; margin-top: 0px;">Order</button>--}}
{{--    </span>--}}


{{--</form>--}}
{{--</div>--}}
<div id="result"></div>
<script>
@if($cate != null)
   

        var selectedItem = sessionStorage.getItem("SelectedItem");
        $('#orderBy').val(selectedItem);
sessionStorage.removeItem("SelectedItem");
        $('#orderBy').change(function () {

            var idetVal = $(this).val();
            sessionStorage.setItem("SelectedItem", idetVal);

        });

    @else
        var selectedItem = sessionStorage.getItem("SelectedItem");
        $('#orderBy').val(selectedItem);
sessionStorage.removeItem("SelectedItem");
        $('#orderBy').change(function () {
            var idetVal = $(this).val();
            sessionStorage.setItem("SelectedItem", idetVal);

});
    @endif

</script>

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
{{--                        @else <img style="height: 299px"   alt="paveiksliukas {{$ph->pavadinimas}}" >--}}
{{--                        @break--}}
                    @endif

                @endforeach
                </div>
                <div class="info-wrap">
                    <h4 class="title">{{$item->pavadinimas}}</h4>
                    <div class="text"> <p>{{$item->aprasymas}}</p></div>
{{--                    <div class="rating-wrap">--}}
{{--                        <div class="label-rating">{{$item->diametras}}</div>--}}
{{--                        <div class="label-rating">{{$item->ilgis}} </div>--}}
{{--                    </div> <!-- rating-wrap.// -->--}}
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
                    </div> <!-- price-wrap.// -->
                </div> <!-- bottom-wrap.// -->
                </a>
            </div>
         </div>

        </div>

{{--        {{ $items->links() }}--}}
    @endforeach
@endsection
