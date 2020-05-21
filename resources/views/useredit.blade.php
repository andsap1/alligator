@extends('layouts.adminapp')

@section('turinys')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('confirmEditedUser', $selectedUser->id) }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="col-lg-10 offset-lg-1">
            <div  class="container-fluid" id="laisko_krastai">
                <div class="form-group row">
                    <label for="id" class="col-lg-2 control-label">User ID: {{$selectedUser->id}}</label>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-lg-2 control-label">Email:</label>
                    <div class="col-lg-6">
                        <input  id="email" class="form-control" type="email"  name="email" value="{{$selectedUser->email}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-lg-2 control-label">Name:</label>
                    <div class="col-lg-6">
                        <input id="name" class="form-control" type="text" name="name" value="{{$selectedUser->name}}" required>
                    </div>
                </div>
                <br>

                <button class="btn" id="green_btn" type="submit"><a style="color: white" >Save</a></button>

            </div>
    </div>
    </form>


@endsection
