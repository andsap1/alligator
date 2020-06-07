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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>
<body>

<script>

    $(function(){
        var url = window.location.href;
        $("#sidebar a").each(function(){
            if(url== (this.href)) {
                $(this).closest("a").addClass("active");
                $("#products").addClass("activeMenu");
            }
        });
        $("#navbarSide a").each(function(){
            if(url== (this.href)) {
                $(this).closest("a").addClass("active");
            }
        });
        $("#myNavbar a").each(function(){
            if(url== (this.href)) {
                $(this).closest("a").addClass("activeMenu");
            }
        });
    });
</script>


<div class="fixed-top galva" style="border-bottom-color: #6C6F6F">
    <p>Important! VAT. (+21%) does not apply for countries outside EU</p>
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{!! \Session::get('success') !!}</p>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <p>There is an error in the data you are entering:</p>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
            </div>
    @endif
</div>

<div class="jumbotron " style="background-color: white">
    <div class="container-fluid">
    <div class="row vertical-align" >
        {{--class=" col-sm-2 img-col"--}}
        <div >
            <img class="log" src="{{asset('images/log.png')}}" />
        </div>
        <div class="col-sm-8 ">
            <h1 id="nameAlligator">Alligator PDR tools</h1>
        </div>
        <div class="col-sm-2 img-col">
            <div class="cart-item">
            <a href="{{asset('cart')}}">
            <img class="cart" src="{{asset('images/cart.png')}}"  />
            </a>
            <div class="cart_count"><span>
                    @if(session()->has('kiekis'))
                        {{session('kiekis')}}
                    @else
                        0
                    @endif
                </span></div>
            </div>
        </div>

        </div>
    </div>
    </div>
</div>
<nav class="navbar navbar-inverse" style="background-color: #222629;">
    <div class="container-fluid" >
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home1')}}/">Home</a></li>
                <li><a id="products" href="{{ action('ShopController@index')}}">Products</a></li>
                <li><a href="{{ action('AboutController@index')}}">About us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                @include('paieska')

                @if (Auth::guest())
                    <li><a href="{{asset('login')}}"><span class="glyphicon glyphicon-user"></span>&nbspSign in</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-foggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span> &nbsp{{ Auth::user()->name }} <span class="caret"></span> </a>

                        <div class="dropdown-menu" >
                            <a class="dropdown-item" href="{{ action('AccController@index')}}">Account</a>
                            <a class="dropdown-item" href="{{ action('AccController@signout')}}">Sign out</a>
                        </div>
                    </li>
                @endif
{{--                <li><a href="#"> Your Account</a></li>--}}

            </ul>
        </div>
    </div>
</nav>

{{--   /*kai sumazini atsidengia kitoje vietoje side bar*/--}}
<div class="container" id="sideNot"  media="(min-width: 766px)" style="margin-left: 40px;" >
    <button class="nav nav-sidebar" id="button1" type="button"  data-toggle="collapse" data-target="#navbarSide"
            aria-controls="navbarSide" aria-expanded="true" aria-label="Toggle navigation" style="margin-left: 40px;">
        <span class="kateg"> Category </span> <span class="glyphicon glyphicon-menu-down"></span>

    </button>

    <div class="bg-dark p-4">
        <div  class="nav-item collapse" id="navbarSide">

            <ul class="list-unstyled components"  style="margin-left: 40px;">
                <li><a href="{{asset('shop1')}}">All products</a></li>
                @foreach($allcategories as $category)
                    <li><a href="{{ action('ShopController@getCategory', $category->id_kateg)}}">{{ $category->pavadinimas }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
 <div class="wrapper">
                <nav id="sidebar">
                    <div class="bg-dark p-4">

                            <ul class="list-unstyled components">
                                <li><a href="{{asset('shop1')}}">All products</a></li>
                                @foreach($allcategories as $category)
                                    <li><a href="{{ action('ShopController@getCategory', $category->id_kateg)}}">{{ $category->pavadinimas }}</a></li>
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
    <p>Alligator-PDR Tools Copyright</p>
    <form class="form-inline">Contact us
        <div  style="text-align: center">
            <a style="display: contents;" class="fa fa-envelope" href ="{{asset('email')}}"></a>
            <a style="display: contents;" class="fa fa-facebook" href ="https://www.facebook.com/pg/aligatorpdr"></a>
            <a style="display: contents;"  class="fa fa-instagram" href ="https://www.instagram.com/alligator_pdr_tools/"></a>
        </div>

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
