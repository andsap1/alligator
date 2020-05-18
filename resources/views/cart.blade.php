@extends('layouts.app')
<style>

</style>
@section('turinys')

    <!-- Cart -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        <div class="cart_title">Cart</div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                <li class="cart_item clearfix">
                                   {{-- @foreach($results as $result)
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title"></div>
                                                <div class="cart_item_text">
                                                    <span class="glyphicon glyphicon-barcode" style="height: 50px;width: 50px;"></span>
--}}{{--                                                    <img src="images/preke.png" alt="" height="50px" width="50px"></div>--}}{{--
                                            </div>
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Prekes kodas</div>
                                                <div class="cart_item_text">{{ $result->id_Preke }}</div>
                                            </div>
                                            <div class="cart_item_color cart_info_col">
                                                <div class="cart_item_title">Pavadinimas</div>
                                                <div class="cart_item_text">{{ $result->Pavadinimas }}</div>
                                            </div>
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Kaina</div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Kiekis</div>
                                                <div class="cart_item_text">{{ $result->kiekis }}</div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Spalva</div>
                                                <div class="cart_item_text">{{ $result->Spalva }}</div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title"></div>
                                                <div class="cart_item_text">
                                                    <a href="{{ route('cart.edit',['id'=>$result->id_Tarpine])  }}">
                                                      --}}{{--  <img src="{{asset('/images/iks.png')}}" height="20px" width="20px" >--}}{{--
                                                        <span class="glyphicon glyphicon-remove" style="height: 20px;width: 20px"></span>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    @endforeach--}}
                                </li>
                            </ul>
                        </div>

                        <!-- Order Total -->
                        <div class="order_total">
                            <div class="order_total_content text-md-right">
                               {{-- @foreach($suma as $sumele)
                                    <div class="order_total_title">Order total:</div>
                                    <div class="order_total_amount">{{ $sumele->Final_Kaina }} Eur</div>
                                    {{session(['kaina'=>$sumele->Final_Kaina])}}
                                @endforeach--}}
                            </div>
                        </div>

                        <div class="cart_buttons">
                            <button type="button" class="button cart_button_checkout"><a href="/order">Order</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
