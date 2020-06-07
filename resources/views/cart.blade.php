@extends('layouts.app')
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

@section('turinys')

    <div class="container" id="cart_sonas">
        <div class="col-lg-10 offset-lg-1">
            <table id="cart" class="table table-hover table-condensed" >
                <thead>
                <tr style="border-bottom: 0px">
                    <th style="width:45%;border-bottom: 10px;">Product</th>
                    <th style="width:10%;border-bottom: 10px;">Price</th>
                    <th style="width:15%;border-bottom: 10px;">Quantity</th>
                    <th style="width:22%;border-bottom: 10px;"class="text-center">Subtotal</th>
                    <th style="width:10%;border-bottom: 10px;"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    @foreach($result as $resul)
                        <td data-th="Product">
{{--                            <div class="row">--}}
                                <div class="col-sm-8">
                                    <h4 style="padding-left: 15px" id="countas"> &nbsp {{$resul->pavadinimas}} </h4>
                                </div>
{{--                            </div>--}}
                        </td>
                        <td data-th="Price" id="lyg">{{$resul->kaina}} €</td>
                        <td data-th="Quantity" id="lyg" >

                            <form method="POST" action="{{ Route('updatePreke',$resul->id_Tarpine) }}" >
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" name="minus" value="-" class="minus">
                                <label >{{$resul->kiekis}} </label>
                                <input type="submit" name="plus" value="+" class="plus">
                            </form>
                        </td>
                        <td data-th="Subtotal" class="text-center" id="lyg">{{$resul->kiekis*$resul->kaina}} €</td>
                        <td id="lyg"> <a class="actions" onclick="return confirm('Do you really want to delete this?')"
                                href="{{route('deletePreke', $resul->id_Tarpine)}}" >
                                <button class="btn btn-sm"><i class="glyphicon glyphicon-trash" style="color: red"></i></button>
                            </a>
                        </td>

                </tr>
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
