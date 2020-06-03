@extends('layouts.app')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    @media (max-width: 1200px) {
        #cart_sonas {
            height: auto;
            width: auto;
        }
    }
</style>
@section('turinys')


    <div class="container" id="cart_sonas">
        <div class="col-lg-10 offset-lg-1">
            <table id="cart" class="table table-hover table-condensed" >
                <thead>
                <tr style="border-bottom: 0px">
                    <th style="width:50%;border-bottom: 10px;">Product</th>
                    <th style="width:10%;border-bottom: 10px;">Price</th>
                    <th style="width:8%;border-bottom: 10px;">Quantity</th>
                    <th style="width:22%;border-bottom: 10px;"class="text-center">Subtotal</th>
                    <th style="width:10%;border-bottom: 10px;"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    {{--                    <h4 style="padding-left: 15px">{{$kr}} </h4>--}}
                    @foreach($result as $resul)
                        {{--                        @foreach($mainphoto as $ph)--}}
                        <td data-th="Product">
                            <div class="row">
                                {{--   <img src="{{ asset('/images') . '/' . $resul->pavadinimas . '.jpg'}}"  alt="paveiksliukas {{$resul->pavadinimas}}" >--}}
                                {{--     <div class="col-sm-4 hidden-xs">--}}{{--<img src="http://placehold.it/100x100" alt="..." class="img-responsive"/>--}}{{--
         --}}{{--                             @if($resul->fk_preke == $ph->fk_preke)--}}{{--
         --}}{{--                               <img style="height: 100pt;width: 100pt" src="{{ asset('/images') . '/' . $ph->pavadinimas . '.jpg'}}" alt="paveiksliukas " >--}}{{--
         --}}{{--                           @endif--}}{{--
                                     </div>--}}


                                <div class="col-sm-8">

                                    <h4 style="padding-left: 15px" id="countas"> &nbsp {{$resul->pavadinimas}} </h4>

                                </div>
                            </div>
                        </td>
                        <td data-th="Price">{{$resul->kaina}} €</td>
                        <td data-th="Quantity" class="text-center">{{$resul->kiekis}}</td>
                        {{--   <td data-th="Subtotal" class="text-center">{{$resul->kaina}} €</td>--}}
                        {{--                        <input type="number" class="form-control text-center" value="1">--}}
                        {{--                    </td>--}}

                        {{--   @foreach($suma as $sumele)
                               <div class="order_total_title">Užsakymo kaina:</div>
                               <div class="order_total_amount">{{ $sumele->Final_Kaina }} Eur</div>
                               {{session(['kaina'=>$sumele->Final_Kaina])}}
                               @endforeach--}}
                        <td data-th="Subtotal" class="text-center" >{{$resul->kiekis*$resul->kaina}} €</td>
                        <td> <a class="actions" onclick="return confirm('Do you really want to delete this?')"
                                href="{{route('deletePreke', $resul->id_Tarpine)}}" >
                                <button class="btn btn-sm"><i class="glyphicon glyphicon-trash" style="color: red"></i></button>
                            </a>
                        </td>

                </tr>
                {{--                @endforeach--}}
                @endforeach
                </tbody>
                <tfoot>

                <tr>
                    <td colspan="3" class="hidden-xs"></td>
                    @foreach($result as $resul)


                        <td class="hidden-xs text-center"><strong>{{$resul->kr_kaina}} €</strong>
                            @break


                        </td> @endforeach
                    <td>
                        <a href="{{ asset('/order') }}" class="btn btn-block" style="background-color: #61892F; color: white">Order</a>


                </tr>
                </tfoot>
            </table>
        </div>
    </div>




@endsection
