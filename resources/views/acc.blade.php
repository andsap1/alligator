@extends('layouts.app')

@section('turinys')
    <h1 id="antraste" >My account</h1>
    <hr>
    <br>

                <div class="col-lg-10 offset-lg-1">
                    <form class="form" method="POST" action="{{ Route('confirmEditAcc',  Auth::user()->id)}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         <div  class="container-fluid" id="laisko_krastai">

                             <div class="form-group row">
                                 <label for="email" class="col-lg-2 control-label">Your email:</label>
                                 <div class="col-lg-6">
                                     <input  id="email" class="form-control" type="email"  name="email" value="{{$user->email}}" required>
                                 </div>
                             </div>
                             <div class="form-group row">
                                 <label for="name" class="col-lg-2 control-label">Name:</label>
                                 <div class="col-lg-6">
                                     <input id="name" class="form-control" type="text" name="name" value="{{$user->name}}" required>
                                 </div>
                             </div>

{{--                             <div class="form-group row">--}}
{{--                                 <label for="password" class="col-lg-2 control-label">New password</label>--}}
{{--                                 <div class="col-lg-6">--}}
{{--                                     <input id="password" type="password" class="form-control" name="password"  min="8">--}}
{{--                                 </div>--}}
{{--                             </div>--}}
{{--                             <div class="form-group row">--}}
{{--                                 <label for="password-confirm" class="col-lg-2 control-label">Confirm Password</label>--}}

{{--                                 <div class="col-lg-6">--}}
{{--                                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" min="8" >--}}
{{--                                 </div>--}}
{{--                             </div>--}}
{{--                        <label  for="elpastas"><b>Your email</b></label>--}}
{{--                        <input  class="form-control" type="email" placeholder="Email" name="elpastas" value="{{$user->email}}" required>--}}
                        <br>

                        <button class="btn" id="green_btn" type="submit"><a style="color: white" >Save</a></button>

                    </div>
                    </form>
                </div>

@endsection
