@extends('layouts.app')

@section('turinys')
    <h1 id="antraste2" >Log in</h1>
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
                            <div class="col-lg-8 col-md-10 offset-lg-8 offset-md-4 " style="text-align: end">
                                    <div class="col-lg-8  offset-lg-8 nopad">
                                        <a class="btn btn-link nopad"  href="{{asset('register')}}">Don't have account? <span id="register">Register here!  </span></a>
                                    </div>
                                     <div class="col-lg-4 nopad">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link nopad" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                     </div>
{{--                                    <br>--}}
{{--                                <div class="form-check">--}}
{{--                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
{{--                                    <label class="form-check-label" for="remember">--}}
{{--                                        {{ __('Remember Me') }}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
                            </div>
{{--                            <div class="col-lg-8 col-md-10 offset-lg-8 offset-md-4" style="text-align: end">--}}
{{--                                ssss--}}
{{--                            </div>--}}
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-lg-8 col-md-10 offset-md-4"style="text-align: end">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
{{--                                <button class="btn" id="mygtukas" type="submit">--}}

                                <button type="submit" id="mygtukas" class="btn btn-primary">
                                    {{ __('Log in') }}
                                </button>

                            </div>
                        </div>
                    </form>
            </div>
        </div>

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
@endsection
