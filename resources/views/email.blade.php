@extends('layouts.app')
<style>

    #mygtukas {
        background-color: #61892F;
        width: 15%;
        margin-top: 10px;
        text-align: center;
        text-decoration: none;
        display: block;
        font-size: 16px;
    }

</style>

@section('turinys')
{{--<div>--}}
    <h1 id="antraste" >Contact us</h1>
    <form class="form" method="POST" action="{{ Route('send') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-lg-10 offset-lg-1">
        <div  class="container-fluid" id="laisko_krastai">
            <hr>
            <br>
            <label  for="elpastas"><b>Your email</b></label>
            <input  class="form-control" type="email" placeholder="Email" name="elpastas" required>
            <br>
            <label for="zinute"><b>Message</b></label>
            <textarea  class="form-control" style="min-height: 150px" type="text" placeholder="Text" name="zinute" required></textarea>
            <button class="btn" id="mygtukas" type="submit"><a style="color: white" href="/">Send</a></button>

        </div>
        </div>
    </form>
{{--</div>--}}
    @endsection
