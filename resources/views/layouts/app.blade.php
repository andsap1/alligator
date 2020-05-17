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
<body >

<div class="fixed-top galva">
    <p>Important! VAT. (+21%) does not apply for countries outside EU</p>
</div>

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
            <img class="cart" src="{{asset('images/shopping-cart.png')}}" />
        </div>
    </div>
    </div>
</div>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Logo</a>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li> <span style="position: relative;top: 10px">
                        <img class="img" src="{{asset('images/icons8-important-mail-24.png')}} " style="width: 25px; height: 25px;"/>
                   <a> info@betarent.lt</a>
                 </span>

                    <span style="position: relative;top: 10px" >
                        <img class="img" src="{{asset('images/icons8-phone-24.png')}} " style="width: 25px; height: 25px;"/>
                    <a> +370 600 00000</a> </span>
                </li>
                <li class="active"><a href="#">Home</a></li>

                <li><a href="#">Products</a></li>
                <li><a href="#">Deals</a></li>
                <li><a href="#">Stores</a></li>
                <li><a href="#">Contact</a></li>
              <li> <form class="form-inline my-2 my-lg-0" style="position: relative;top: 10px">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" style="background-color: #474B4B;">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            </ul>
        </div>
    </div>
</nav>

 <div class="wrapper">


                <nav id="sidebar">
                    <button class="nav nav-sidebar" type="button"  data-toggle="collapse" data-target="#navbarSide"
                            aria-controls="navbarSide" aria-expanded="false" aria-label="Toggle navigation">
                        <span><h3>↑ ☰</h3></span>

                    </button>

                    <div class="bg-dark p-4">
                        <div  class="nav-item active" id="navbarSide">
                            <ul class="list-unstyled components">
                                <li class="{{ Request::url() ==  'shop1' ? 'active' : ''  }}"><a href="{{asset('shop1')}}">Visos prekės</a></li>
                                @foreach($allcategories as $category)
                                    <li class="{{ Request::url() == url('/shop1*') ? 'active' : '' }}"><a href="{{ action('ShopController@getCategory', $category->id_kateg)}}">{{ $category->pavadinimas }}</a></li>
                                @endforeach
                            </ul>
                    </div>
                </div>
                </nav>

     <div id="content">
         <div class="container-fluid" >
             <div class="row">
{{--                 <h1 >Shop tools</h1>--}}
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
