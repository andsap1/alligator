@extends('layouts.app')

@section('turinys')
    <div>
        <div class="col-lg-10 offset-lg-1" style="margin-left: 100px;">
            <table id="cart" class="table table-hover table-condensed" >
                <div class="form-group col-sm-7">
                    <div class="container-fuild">
                        <h1 id="antraste">Your order
                            <span class="kaina" style="color:black">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
        </span>
                        </h1>
                        <hr>
                        <div class="products">
                            @foreach($result as $res)
                                <div class="prekes_eilute">
                                    <span class="kaina" style="font-size: 12pt">{{$res->kiekis*$res->kaina}} €</span>
                                    <h4 class="item-name" id="countas" {{--style="text-decoration: underline;"--}}>{{$res->pavadinimas}}</h4>

                                </div>
                            @endforeach

                            @foreach($result as $kaina)
                                <h2 class="total" style="text-align: end">Total &nbsp;<span class="kaina">{{$kaina->kr_kaina}} €</span></h2>
                                @break
                            @endforeach
                        </div>  </div>
                    <hr>

                </div>
                <div class="container-fuild">
                    <div class="form-group col-sm-7">
                        <h3 id="antraste">Info details</h3>
                    </div>
                    <div class="row">
                        <form class="form-horizontal" role="form" method="POST" action="{{Route('orderInsert') }}">

                            <div class="form-group col-sm-7">
                                <label for="adresas">Adress</label>
                                <input id="adresas" type="text" class="form-control" placeholder="Address" aria-label="Address" aria-describedby="basic-addon1">
                            </div>
                            <div class="form-group col-sm-7">
                                <label for="vardas">First name</label>
                                <input id="vardas" type="text" class="form-control" placeholder="First name" aria-label="First name" aria-describedby="basic-addon1">
                            </div>
                            <div class="form-group col-sm-7">
                                <label for="pavarde">Last name</label>
                                <input id="pavarde" type="text" class="form-control" placeholder="Last name" aria-label="Last name" aria-describedby="basic-addon1">
                            </div>

                            <div class="form-group col-sm-7">
                                <label for="data">Date</label>
                                <input type="date" value="<?php echo date('Y-m-d'); ?>" readonly="readonly" class="form-control" aria-label="Date " aria-describedby="basic-addon1"/>
                            </div>

                            <div class="form-group col-sm-7">

                                <button type="submit"class="btn" id="mygtukas" >Order</button>
                            </div>

                        </form>
                    </div>

                </div>
            </table>
        </div>
    </div>


@endsection
