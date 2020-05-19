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
            {{--        @foreach($results as $result)--}}
                    <td data-th="Product">

                        <div class="row">

                            <div class="col-sm-4 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                            <div class="col-sm-4">
                                <h4 class="nomargin">Product 1</h4>
                                <p>Quis aute iure reprehenderit in voluptate </p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">$1.99</td>
                    <td data-th="Quantity">
                        <input type="number" class="form-control text-center" value="1">
                    </td>
                 {{--   @foreach($suma as $sumele)
                        <div class="order_total_title">Užsakymo kaina:</div>
                        <div class="order_total_amount">{{ $sumele->Final_Kaina }} Eur</div>
                        {{session(['kaina'=>$sumele->Final_Kaina])}}
                    @endforeach--}}
                    <td data-th="Subtotal" class="text-center">1.99</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-sm"><i class="glyphicon glyphicon-trash" style="color: red"></i></button>
                    </td>

                </tr>
             {{--   @endforeach--}}
                </tbody>
                <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>Total 1.99</strong></td>
                </tr>
                <tr>
                    <td colspan="3" class="hidden-xs"></td>
                   {{-- @foreach($suma as $kitasuma)--}}
                    <td class="hidden-xs text-center"><strong>Total 1.99{{--{{ $kitasuma->Final_Kaina }} --}}Eur</strong>
                        {{--{{session(['kaina'=>$kitasuma->Final_Kaina])}}--}}
                    </td>
                    <td><a href="#" class="btn btn-block" style="background-color: #61892F; color: white">Order</a></td>
                        {{--@endforeach--}}
                </tr>
                </tfoot>
            </table>
        </div>
    </div>




@endsection
