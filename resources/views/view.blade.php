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






    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <style>
        #meniu{

                               padding: auto;
                           }
        #search{
            padding-top: 10px;
            padding-left: inherit;

        }

        @media (max-width: 766px) {
            /*paslepia meniu kai sumazini ekrana*/
            form#hide {
                display: none;
                visibility: hidden;
            }
            /*atidengti paieska*/
            form#paslepti {
                display: block;
                padding: auto;
                padding-top: 10px;
                position: absolute;
            }
            /*atidengti sidebar*/
            div#sideNot {
                display:contents;
                position: absolute;

            }
        }
        /*paslepta paieska suskleidus*/
        #paslepti{
            display: none;
        }
        /*paslepta sidebar  suskleidus*/
        #sideNot{
            display: none;

        }
        #paieska
        {
            background-color: #6C6F6F;
            color: #86C232;
        }

        /**side bar paslepti*/
        @media (max-width: 766px) {
            #sidebar {
                display: block;
                margin-left: -250px;
            }
            #sidebar.active {
                display: block;
                margin-left: 0;
            }
        }

        .formPaieska
        {

            border-radius: 10px;
         }
        .formPaieskaVest
        {

            border-radius: 5px;

            color: #86C232;
        }
        .button
        {

            border-radius: 5px;
            height: 25px;
        }
        /***minimizuoto side bar li elementas*/

        #sideNot  li  {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }
        #sideNot ul li a:hover {
            color: #7386D5;
            background: #fff;
        }
        /********/

    </style>
</head>
<body >

<div class="fixed-top galva">
    <p>Attention! VAT is not included!</p>
</div>

<div class="jumbotron container-fluid">
    <div class="row vertical-align" >
        <div class=" col-sm-2 img-col">
            <img class="log" src="{{asset('images/log.png')}}" />
        </div>
        <div class="col-sm-8 ">
            <h1 id="nameAlligator">Alligator PDR tools</h1>
        </div>
        <div class="col-sm-2 img-col">
            <img class="cart" src="{{asset('images/shopping-cart.png')}}" />
        </div>
    </div>

</div>

<nav class="navbar navbar-inverse">
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
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Product</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li> <div class="search-container" id="search" >
                        <form class="formPaieska" action="/paieska.php" id="hide">
                            <input class="formPaieskaVest" type="text" placeholder="Search..." name="search" id="paieska">
                            <button class="button" type="search">search</button>
                        </form>
                    </div></li>
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
            </ul>
        </div>

    </div>

</nav>
{{--   /*kai sumazini atsidengia kitoje vietoje side bar*/--}}
<div class="container" id="sideNot"  media="(min-width: 766px)" style="margin-left: 40px;" >
    <button class="nav nav-sidebar" type="button"  data-toggle="collapse" data-target="#navbarSide"
            aria-controls="navbarSide" aria-expanded="true" aria-label="Toggle navigation" style="margin-left: 40px;">
        <span><h3>↑ ☰</h3></span>

    </button>

    <div class="bg-dark p-4">
        <div  class="nav-item active" id="navbarSide">
            <ul class="list-unstyled components"  style="margin-left: 40px;">
                <li class="{{ Request::url() ==  'shop1' ? 'active' : ''  }}"><a href="{{asset('shop1')}}">Visos prekės</a></li>
                @foreach($allcategories as $category)
                    <li class="{{ Request::url() == url('/shop1*') ? 'active' : '' }}"><a href="{{ action('ShopController@getCategory', $category->id_kateg)}}">{{ $category->pavadinimas }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
{{--  /**************************************************/--}}

<div class="wrapper">


    <nav id="sidebar">
      {{--  <button class="nav nav-sidebar" type="button"  data-toggle="collapse" data-target="#navbarSide"
                aria-controls="navbarSide" aria-expanded="true" aria-label="Toggle navigation">
            <span><h3>↑ ☰</h3></span>

        </button>--}}

        <div class="bg-dark p-4">
                <ul class="list-unstyled components">
                    <li class="{{ Request::url() ==  'shop1' ? 'active' : ''  }}"><a href="{{asset('shop1')}}">Visos prekės</a></li>
                    @foreach($allcategories as $category)
                        <li class="{{ Request::url() == url('/shop1*') ? 'active' : '' }}"><a href="{{ action('ShopController@getCategory', $category->id_kateg)}}">{{ $category->pavadinimas }}</a></li>
                    @endforeach
                </ul>
        </div>

    </nav>

    <div id="content">
           <div class="container-fluid" >
            <div class="row">
                <h1>Shop tools</h1>

                @foreach($items as $item)
                    <div class="col-md-4">
                        <div class="card item">
                            <div class="img-wrap"><img src="{{asset('images/log.png')}}"> </div>
                            <div class="info-wrap">
                                <h4 class="title">{{$item->pavadinimas}}</h4>
                                <p class="desc">{{$item->aprasymas}}</p>
                                <div class="rating-wrap">
                                    <div class="label-rating">{{$item->diametras}}</div>
                                    <div class="label-rating">{{$item->ilgis}} </div>
                                </div> <!-- rating-wrap.// -->
                            </div>
                            <div class="bottom-wrap">
                                <a href="" class="btn btn-sm btn-primary float-right">Order Now</a>
                                <a href="" class="btn btn-sm btn-primary float-right" style="margin-right: 5px;">Look</a>
                                <div class="price-wrap h5">
                                    <span class="price-new">{{$item->kaina}}</span>
                                </div> <!-- price-wrap.// -->
                            </div> <!-- bottom-wrap.// -->
                        </div>
                    </div>
                @endforeach

                {{--            <h2 class="sub-header">Section title</h2>--}}
            </div>
        </div>

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
