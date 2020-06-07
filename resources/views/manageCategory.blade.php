@extends('layouts.adminapp')
@section('turinys')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" id="antraste">Add category</div>

                    <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('manageCategory')}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Category name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="pavadinimas" value="{{ old('pavadinimas') }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Picture name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="nuotraukospav" value="{{ old('nuotraukospav') }}">
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
