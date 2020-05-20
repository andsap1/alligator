<!DOCTYPE html>
<html >
<head>
    <title>Alligator PDR online store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

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
            <a href="{{asset('cart')}}">
            <img class="cart" src="{{asset('images/cart.png')}}"  />
            </a>

        </div>
    </div>
    </div>
</div>
<nav class="navbar navbar-inverse" style="background-color: #222629;">
    <div class="container-fluid" >
        <div class="search-container" >
            <form  class="formPaieska" action="/paieska.php"id ="paslepti" media="(min-width: 766px)">
                <input class="formPaieskaVest" type="text" placeholder="Search..." name="search" id="paieska">
                <button class="button" type="search">search</button>
            </form>
        </div >

        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav"  id="meniu">
                <li class="active"><a href="{{ action('ShopController@indexHome')}}">Home</a></li>
                <li><a href="{{ action('ShopController@index')}}">Products</a></li>
                <li><a href="{{ action('AboutController@index')}}">About us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li> <div class="search-container" id="search" >
                        <form class="formPaieska" action="/paieska.php" id="hide">
                            <input class="formPaieskaVest" type="text" placeholder="Search..." name="search" id="paieska">
                            <button class="button" style="height: 26px;" type="search">search</button>
                        </form>
                    </div></li>
                @if (Auth::guest())
                    <li><a href="./login"><span class="glyphicon glyphicon-user"></span>Sign in</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span> &nbsp{{ Auth::user()->name }} <span class="caret"></span> </a>

                        <div class="dropdown-menu" >
{{--                           <a class="dropdown-item" href="{{ url('/logout') }}">Sign out</a>--}}
                            <a class="dropdown-item" href="{{ action('ShopController@getCategory', Auth::user()->name)}}">Account</a>
                        </div>
                    </li>
                @endif
{{--                <li><a href="#"> Your Account</a></li>--}}

            </ul>
        </div>

    </div>

</nav>
<div class="dropdown show">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown link
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="#">Action</a>
        <a class="dropdown-item" href="#">Another action</a>
        <a class="dropdown-item" href="#">Something else here</a>
    </div>
</div>
{{--   /*kai sumazini atsidengia kitoje vietoje side bar*/--}}
<div class="container" id="sideNot"  media="(min-width: 766px)" style="margin-left: 40px;" >
    <button class="nav nav-sidebar" id="button1" type="button"  data-toggle="collapse" data-target="#navbarSide"
            aria-controls="navbarSide" aria-expanded="true" aria-label="Toggle navigation" style="margin-left: 40px;">
        <span class="glyphicon glyphicon-menu-down"></span>

    </button>

    <div class="bg-dark p-4">
        <div  class="nav-item active" id="navbarSide">
            <ul class="list-unstyled components"  style="margin-left: 40px;">
                <li class="{{ Request::url() ==  'shop1' ? 'active' : ''  }}"><a href="{{asset('shop1')}}">All products</a></li>
                @foreach($allcategories as $category)
                    <li class="{{ Request::url() == url('/shop1*') ? 'active' : '' }}"><a href="{{ action('ShopController@getCategory', $category->id_kateg)}}">{{ $category->pavadinimas }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
 <div class="wrapper">


                <nav id="sidebar">
                    <div class="bg-dark p-4">

                            <ul class="list-unstyled components">
                                <li class="{{ Request::url() ==  'shop1' ? 'active' : ''  }}"><a href="{{asset('shop1')}}">All products</a></li>
                                @foreach($allcategories as $category)
                                    <li class="{{ Request::url() == url('/shop1*') ? 'active' : '' }}"><a href="{{ action('ShopController@getCategory', $category->id_kateg)}}">{{ $category->pavadinimas }}</a></li>
                                @endforeach
                            </ul>

                </div>
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
