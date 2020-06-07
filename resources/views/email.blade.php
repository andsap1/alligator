@extends('layouts.app')


@section('turinys')
    <h1 id="antraste" >Contact us</h1>
    <form class="form" method="POST" action="{{ Route('send') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-lg-10 offset-lg-1">
        <div  class="container-fluid" id="laisko_krastai">
            <hr>
            <br>
            <label  for="emaill"><b>Your email</b></label>
            <input  class="form-control" type="email" placeholder="Email" name="emaill" required>
            <br>
            <label  for="sbj"><b>Subject</b></label>
            <input  class="form-control" type="text" placeholder="Subject" name="sbj" required>
            <br>
            <label for="message"><b>Message</b></label>
            <textarea  class="form-control" style="min-height: 150px" type="text" placeholder="Text" name="message" required></textarea>
            <button class="btn" id="mygtukas" type="submit"><a style="color: white" href="/">Send</a></button>

        </div>
        </div>
    </form>
    @endsection
