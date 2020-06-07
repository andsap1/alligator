@extends('layouts.adminapp')

@section('turinys')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" id="antraste">User edit</div>
                    <hr>
                    <div class="card-body">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('confirmEditedUser', $selectedUser->id) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">User ID: {{$selectedUser->id}}</label>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Email:</label>
                    <div class="col-lg-6">
                        <input  id="email" class="form-control" type="email"  name="email" value="{{$selectedUser->email}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" style="margin-left: 30px">Name:</label>
                    <div class="col-lg-6">
                        <input id="name" class="form-control" type="text" name="name" value="{{$selectedUser->name}}" required>
                    </div>
                </div>
                <br>

                <div class="form-group row mb-0">
                    <div class="col-md-10 offset-md-4" style="margin-left: -35px">
                        <button type="submit" id="mygtukas"class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
    </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
