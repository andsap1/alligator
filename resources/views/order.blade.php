@extends('layouts.app')

@section('turinys')
    <link href="{{ asset('pay') }}">

    <a style="margin: 0 0 15px 15px;" href="{{URL::previous()}}">
        <svg class="bi bi-chevron-compact-left" width="1.5em" height="2em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M9.224 1.553a.5.5 0 01.223.67L6.56 8l2.888 5.776a.5.5 0 11-.894.448l-3-6a.5.5 0 010-.448l3-6a.5.5 0 01.67-.223z" clip-rule="evenodd"/>
        </svg>
    </a>
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
                        <form id="ived"class="form-horizontal" method="post" action="{{Route('orderInsert')}}">
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

                                 <script>
                                     var child;
                                     var bu = document.getElementById("mygtukas2");
                                  function myPay() {
                                      child = window.open("pay", "_blank", "toolbar=yes, scrollbars=yes, resizable=yes, top=250,left=500,width=450, height=150");

                                      var id = setInterval(function () {
                                           if (child.closed) {

                                                  clearInterval(id);
                                                  document.getElementById("mygtukas2").disabled = false;
                                                  document.getElementById("mygtukas1").disabled = true;
                                              }
                                          }, 100);

                                  }

                                </script>
<style>
    #mygtukas1, #mygtukas2
    {
        background-color: #61892F;
        margin-top: 10px;
        text-align: center;
        text-decoration: none;
        font-size: 16px;
        color: white;
        cursor: pointer;
    }
    .myg{
        text-align: end;
    }
</style>
                            <div class="myg">
                                <button type="button"class="btn" id="mygtukas1" onclick="myPay()">Pay</button>
                                <button type="submit"class="btn" id="mygtukas2" disabled>End Order</button>
                            </div>
                            </div>


                        </form>

                    </div>

                </div>
            </table>
        </div>
    </div>


@endsection
