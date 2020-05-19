<!DOCTYPE html>
<html >
<head>
    <title>Alligator PDR online store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>


    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <style>

    </style>
</head>

<body>

<div class="jumbotron ">
    <div class="container-fluid">
        <div class="row vertical-align" >
            <div class=" col-sm-2 img-col">
                <img class="log" src="{{asset('images/log.png')}}" />
            </div>
            <div class="col-sm-8 ">
                <h1 id="name">Alligator PDR tools</h1>
            </div>
            <div class="col-sm-2 img-col">
                <a href="{{asset('cart')}}">
                    <img class="cart" src="{{asset('images/cart.png')}}"  />
                </a>

            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-inverse">
    <div class="container-fluid" >

         <div class="navbar-header">

             <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
                 <span class="icon-bar"></span>
             </button>

         </div>
         <div class="collapse navbar-collapse" id="myNavbar">

             <ul class="nav navbar-nav navbar-right">
                 <li><a href="#"><span class="glyphicon glyphicon-user"></span> Log out</a></li>
             </ul>
         </div>

     </div>

 </nav>
<div class="wrapper">
<nav id="sidebaradmin">
    <a href="{{ action('AdminController@index')}}"><div style="text-align: center;"><span class="glyphicon glyphicon-home"></span><h5>Pradinis</h5></div></a>
    <a href="{{ action('AdminController@naudotojai')}}"><div style="text-align: center;"><span class="glyphicon glyphicon-user"></span><h5>Naudotojai</h5></div></a>
    <a href="#"><div style="text-align: center;"><span class="glyphicon glyphicon-list-alt"></span><h5>Prekės</h5></div></a>
    <a href="#"><div style="text-align: center;"><span class="glyphicon glyphicon-th-list"></span><h5>Užsakymai</h5></div></a>
</nav>

<div id="content">
    <div class="container-fluid" >
        <div class="row">
            @yield('turinys')
        </div>
    </div>
    {{--            <h2 class="sub-header">Section title</h2>--}}

</div>
</div>


<footer class="container-fluid text-center">
    <p>Online Store Copyright</p>
    <form class="form-inline">Get deals:
        <input type="email" class="form-control" size="50" placeholder="Email Address">
        <button type="button" class="btn btn-danger">Sign Up</button>
    </form>
</footer>
<script>	/*Menu-toggle*/
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
        alert(1);
    });</script>
</body>
</html>
