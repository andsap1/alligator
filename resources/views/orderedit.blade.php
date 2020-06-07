@extends('layouts.adminapp')
@section('turinys')
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" id="antraste">Order edit</div>

                        <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('confirmEditedOrder', $selectedOrder->id_uzsakymas) }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Adress</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="adresas" value="{{$selectedOrder->adresas}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">First name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="vardas" value="{{$selectedOrder->vardas}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Last name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pavarde" value="{{$selectedOrder->pavarde}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Order state</label>
                            <div class="col-md-6">
                                <select class="form-control" name="busena">
                                    <option value="{{$selectedOrder->busena}}">{{$selectedOrder->busena}}</option>
                                    @if($selectedOrder->busena != "pateiktas")
                                    <option>pateiktas</option>
                                    @endif
                                    @if($selectedOrder->busena != "atšauktas")
                                    <option>atšauktas</option>
                                    @endif
                                    @if($selectedOrder->busena != "įvykdytas")
                                    <option>įvykdytas</option>
                                    @endif
                                    @if($selectedOrder->busena != "baigtas")
                                    <option>baigtas</option>
                                    @endif
                                    @if($selectedOrder->busena != "patvirtintas")
                                    <option>patvirtintas</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-10 offset-md-4" style="margin-left: -35px">
                                        <button type="submit" id="mygtukas"class="btn btn-primary">
                                            Edit
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
