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
            padding-left: 225px;
        }
        /*.topnav .search-container {
            float: right;

        }

        .topnav input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
        }

        .topnav .search-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

        .topnav .search-container button:hover {
            background: #ccc;
        }

        @media screen and (min-width: 600px) {
            .topnav .search-container {
                float: none;
            }
            .topnav a, .topnav input[type=text], .topnav .search-container button {
                float: none;
                display: block;
                text-align: left;
                width: 100%;
                margin: 0;
                padding: 14px;

            }
            .topnav input[type=text] {
                border: 1px solid #ccc;

            }
        }*/
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
            /*atidengti paieska*/
            div#paslepti {
                display: block;
                padding: auto;
                padding-top: 10px;
                position: absolute;
            }
            span#icon
            {
                padding-bottom: 10px;
            }
        }
        /*paslepta paieska suskleidus*/
        #paslepti{
            display: none;
        }
        #icon{
            position: relative;top: 15px;
            padding-left: auto;
        }
        #pic{
            width: 20px;
            height: 20px;
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
            <h1 id="name">Alligator PDR tools</h1>
        </div>
        <div class="col-sm-2 img-col">
            <img class="cart" src="{{asset('images/shopping-cart.png')}}" />
        </div>
    </div>

</div>

<nav class="navbar navbar-inverse">
    <div class="container-fluid" >

        <div class="search-container" >
            <form action="/paieska.php"id ="paslepti" media="(min-width: 766px)">
                <input type="text" placeholder="Search..." name="search">
                <button type="search">search</button>
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
                <li> <div class="search-container" id="search" >
                        <form action="/paieska.php" id="hide">
                            <input type="text" placeholder="Search..." name="search">
                            <button type="search">search</button>
                        </form>
                    </div></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li> <span id ="icon" >
                        <img class="img" src="{{asset('images/icons8-important-mail-24.png')}} " id="pic"/>
                   <a> info@betarent.lt</a>
                 </span>

                    <span id ="icon" >
                        <img class="img" src="{{asset('images/icons8-phone-24.png')}} " id="pic"/>
                    <a> +370 600 00000</a>
                    <p></p></span>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
            </ul>
        </div>
        {{--   /*kai sumazini atsidengia kitoje vietoje side bar*/--}}
        <div class="container" id="paslepti"  media="(min-width: 766px)">
            <button class="nav nav-sidebar" type="button"  data-toggle="collapse" data-target="#navbarSide"
                    aria-controls="navbarSide" aria-expanded="true" aria-label="Toggle navigation">
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
        </div>
        {{--  /**************************************************/--}}
    </div>
</nav>

<div class="wrapper">


    <nav id="sidebar">
        <button class="nav nav-sidebar" type="button"  data-toggle="collapse" data-target="#navbarSide"
                aria-controls="navbarSide" aria-expanded="true" aria-label="Toggle navigation">
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
