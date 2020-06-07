@extends('layouts.adminapp')

@section('turinys')


    <h1 id="antraste2" >Admin log in</h1>
<div class="col-lg-10 col-md-10 offset-lg-2 offset-md-2 ">
    <div class="container-fluid">
        <hr>
        <br>
        <form class="form" method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-lg-2 col-md-2 col-form-label text-md-right">Email</label>
                <div class="col-lg-6 col-md-8">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="password" class="col-lg-2 col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>
                <div class="col-lg-6 col-md-8">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4"style="text-align: end">
                    {{--                                <button class="btn" id="mygtukas" type="submit">--}}

                    <button type="submit" id="mygtukas" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection
