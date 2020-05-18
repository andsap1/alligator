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

        <table id="cart" class="table table-hover table-condensed">
            <thead>
            <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
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
                <td data-th="Subtotal" class="text-center">1.99</td>
                <td class="actions" data-th="">
                    <button class="btn btn-sm"><i class="glyphicon glyphicon-trash" style="color: red"></i></button>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr class="visible-xs">
                <td class="text-center"><strong>Total 1.99</strong></td>
            </tr>
            <tr>
                <td colspan="2" class="hidden-xs"></td>
                <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
                <td><a href="#" class="btn btn-block" style="background-color: #61892F; color: white">Order</a></td>
            </tr>
            </tfoot>
        </table>
    </div>
    </div>

@endsection
