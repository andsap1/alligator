@extends('layouts.adminapp')

@section('turinys')
    <form class="form-horizontal" role="form" method="POST" action="{{ url('manageOrder') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

    </form>

@endsection
