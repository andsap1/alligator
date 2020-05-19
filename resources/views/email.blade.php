@extends('layouts.app')
<style>


</style>

@section('turinys')
<div>

    <form class="form" method="POST" action="{{ Route('send') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-lg-10 offset-lg-1">
        <div  class="container-fluid" id="laisko_krastai">
            <h1 id="antraste" >Contact us</h1>
            <hr>
            <br>
            <label  for="elpastas"><b>Email</b></label>
            <input  class="form-control" type="email" placeholder="Email" name="elpastas" required>
            <br>
            <label for="zinute"><b>Message</b></label>
            <textarea  class="form-control" type="text" placeholder="Text" name="zinute" required></textarea>
            <button class="btn" id="mygtukas" type="submit"><a style="color: white" href="/">Send</a></button>


        </div>
        </div>

    </form>
</div>
    @endsection
