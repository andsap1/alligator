@extends('layouts.app')

@section('turinys')
{{--<div class="container">--}}
{{--    <div class=" justify-content-center" style="text-align: center">--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-10 col-sm-offset-1 hid">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm-6 col-sm-offset-3 text-center">--}}
{{--                        5--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--<h1 id="antraste" >Contact us</h1>--}}
{{--<form class="form" method="POST" action="{{ Route('send') }}">--}}
{{--    <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}
{{--    <div class="col-lg-10 offset-lg-1">--}}
{{--        <div  class="container-fluid" id="laisko_krastai">--}}
{{--            <hr>--}}
{{--            <br>--}}
{{--            <label  for="elpastas"><b>Your email</b></label>--}}
{{--            <input  class="form-control" type="email" placeholder="Email" name="elpastas" required>--}}
{{--            <br>--}}
{{--            <label for="zinute"><b>Message</b></label>--}}
{{--            <textarea  class="form-control" style="min-height: 150px" type="text" placeholder="Text" name="zinute" required></textarea>--}}
{{--            <button class="btn" id="mygtukas" type="submit"><a style="color: white" href="/">Send</a></button>--}}

{{--        </div>--}}
{{--    </div>--}}

{{--</form>--}}

    <h1 id="antraste" >Log in</h1>
        <div class="col-lg-10 col-md-10 offset-lg-2 offset-md-2 ">
            <div class="container-fluid">
                <hr>
                <br>
                    <form class="form" method="POST" action="{{ route('login') }}">
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

                        <div class="form-group row">
                            <div class="col-lg-2 col-md-6 offset-lg-8 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
{{--                                <button class="btn" id="mygtukas" type="submit">--}}
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
            </div>
        </div>

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
