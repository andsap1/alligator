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
                        <form class="form-horizontal" method="post" action="{{Route('orderInsert')}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group col-sm-7">
                                <label for="adresas">Adress</label>
                                <input name="adresas" type="text" class="form-control" placeholder="Address"  >
                            </div>
                            <div class="form-group col-sm-7">
                                <label for="vardas">First name</label>
                                <input name="vardas" type="text" class="form-control" placeholder="First name">
                            </div>
                            <div class="form-group col-sm-7">
                                <label for="pavarde">Last name</label>
                                <input name="pavarde" type="text" class="form-control" placeholder="Last name" >
                            </div>

                            <div class="form-group col-sm-7">
                                <label for="data">Date</label>
                                <input type="date" value="<?php
                                $date = new DateTime("now", new DateTimeZone('Europe/Vilnius') );
                                echo $date->format('Y-m-d');?>" readonly="readonly" class="form-control"/>
                            </div>

                            <div class="form-group col-sm-7">
                            {{--    <script
                                    src="https://www.paypal.com/sdk/js?client-id=ARgs-HAJc8YKzu4yLF3CfWHJs616kOemPfSB8pC053iucVrKBm67OjAz-7LuCcolKHa9qbAIyeCf3tuS&currency=EUR"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
                                </script>
                                <div id="paypal-button-container"></div>

                                <script src="https://www.paypal.com/sdk/js?client-id=sb"></script>--}}
{{--                                <script>paypal.Buttons().render('#paypal-button-container');</script>--}}

                                 {{--/*   @foreach($result as $kaina)--}}
                                 {{--   <h2 class="total" style="text-align: end">Total &nbsp;<span class="kaina">{{$kaina->kr_kaina}} €</span></h2>--}}
                                 {{--   @break--}}
                                 {{--   @endforeach*/--}}
                                {{--    paypal.Buttons({
                                        createOrder: function(data, actions) {
                                            // This function sets up the details of the transaction, including the amount and line item details.
                                            return actions.order.create({
                                                purchase_units: [{
                                                    amount: {@foreach($result as $kaina)
                                                        value:"{{$kaina->kr_kaina}}"
                                                        @break
                                                        @endforeach
                                                    }
                                                }]
                                            });
                                        },
                                        onApprove: function(data, actions) {
                                            // This function captures the funds from the transaction.
                                            return actions.order.capture().then(function(details) {
                                                // This function shows a transaction success message to your buyer.
                                                alert('Transaction completed by ' + details.payer.name.given_name);

                                            });
                                        }
                                    }).render('#paypal-button-container');--}}
                                 <script>
                                  function myPay()
                                 {
                                     window.open("pay", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=500,left=500,width=400, height=400");
                                 }

                                </script>

                                <button type="submit"class="btn" id="mygtukas" onclick="myPay()">Order</button>
                            </div>

                        </form>
                    </div>

                </div>
            </table>
        </div>
    </div>


@endsection
