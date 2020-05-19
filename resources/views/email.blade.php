@extends('layouts.app')
<style>

    h1
    {font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
        margin-bottom: 10px;
    }
    #mygtukas
    {
        background-color: #61892F;
        width: 15%;
        margin-top: 10px;
        text-align: center;
        text-decoration: none;
        display: block;
        font-size: 16px;

        cursor: pointer;
        margin-left: auto;
    }


    @media (max-width: 1200px){
        #laisko_krastai {
            height: auto;
            width: auto;
        }
    }
</style>

@section('turinys')
<div>

    <form class="form" method="POST" action="{{ Route('send') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="col-lg-10 offset-lg-1">
        <div  class="container-fluid" id="laisko_krastai">
            <h1 style="margin-bottom: 5px">Contact us</h1>
            <hr >
            <br>
            <label  for="elpastas"><b>Email</b></label>
            <input  class="form-control" type="email" placeholder="Email" name="elpastas" required>
            <br>
            <label for="zinute"><b>Message</b></label>
            <textarea  class="form-control" style="min-height: 150px" type="text" placeholder="Text" name="zinute" required></textarea>
            <button class="btn" id="mygtukas" type="submit"><a style="color: white" href="/">Send</a></button>


        </div>
        </div>

    </form>
</div>
    @endsection
