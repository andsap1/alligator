@extends('layouts.app')

@section('turinys')
    <div>
        <div class="col-lg-10 offset-lg-1">
            <div class="container-fuild">
                <h1 id="antraste">Your order
                    <span class="kaina" style="color:black">
                        <i class="glyphicon glyphicon-shopping-cart"></i>
        </span>
                </h1>
                <hr>
                <div class="products">
                    {{--@foreach($visosprekes as $prekes)--}}
                    <div class="prekes_eilute">
                        <span class="kaina">$200</span>
                        <p class="item-name">Product 1</p>
                        <p class="item-description">Lorem ipsum dolor sit amet</p>
                    </div>
                    {{--      @endforeach--}}
                    <div class="prekes_eilute">
                        <span class="kaina">$120</span>
                        <p class="item-name">Product 2</p>
                        <p class="item-description">Lorem ipsum dolor sit amet</p>
                    </div>
                    {{--@foreach($suma as $kainusuma)--}}
                    <div class="total">Total<span class="kaina">$320</span></div>
                    {{--      @endforeach--}}
                </div>
                <hr>

            </div>
            <div class="container-fuild">
            <h3 class="title">Info details</h3>
            <div class="row">
                <div class="form-group col-sm-7">
                    <label for="adresas">Adress</label>
                    <input id="adresas" type="text" class="form-control" placeholder="Adress" aria-label="Adress" aria-describedby="basic-addon1">
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
                    <label for="card-number">Card Number</label>
                    <input id="card-number" type="text" class="form-control" placeholder="Card Number" aria-label="Card Holder" aria-describedby="basic-addon1">
                </div>
                <div class="form-group col-sm-7">
                    <label for="">Expiration Date</label>
                    <div class="input-group expiration-date">
                        <input type="text" style=" width: 50px; " class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
                  {{--  <span id="date-separator">/</span>--}}

                        <input type="text"  style="width: 50px;" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1">
                </div>
                </div>

                <div class="form-group col-sm-7">
                    <label for="cvc">CVC</label>
                    <input id="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1">
                </div>
                <div class="form-group col-sm-7">
                    <button type="submit"class="btn" id="mygtukas" >Order</button>
                </div>
            </div>
        </div>
        </div>
    </div>

    @endsection
