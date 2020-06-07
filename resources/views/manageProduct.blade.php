@extends('layouts.adminapp')
@section('turinys')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" id="antraste">Add product</div>

                    <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('manageProduct')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pavadinimas" value="{{ old('pavadinimas') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Category</label>
                            <div class="col-md-6">
                                <select class="form-control" name="fk_prekes_kategorija" >
                                    <option value="{{ old('fk_prekes_kategorija') }}"></option>
                                    @foreach($allCat as $ct)
                                        <option value="{{$ct->id_kateg}}">{{$ct->pavadinimas}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Description</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="aprasymas" value="{{ old('aprasymas') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Price</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="kaina" value="{{ old('kaina') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Date</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="ikelimo_data" value="{{ old('ikelimo_data') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Length</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="ilgis" value="{{ old('ilgis') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Diameter</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="diametras" value="{{ old('diametras') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Tip height</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="galiuko_aukstis" value="{{ old('galiuko_aukstis') }}">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-4" style="margin-left: -35px">
                                <button type="submit" id="mygtukas"class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

