@extends('layouts.adminapp')

@section('turinys')
<form class="form-horizontal" role="form" method="POST" action="{{ url('manageUser') }}">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="form-group">
        <label class="col-md-4 control-label">Email:</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="email" value="">
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-4 control-label">Name:</label>
        <div class="col-md-12">
            <input type="text" class="form-control" name="name" value="">
        </div>
    </div>
    </form>

@endsection
