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
    .meniu
    {
        padding-left: 225px;
    }


    </style>
</head>
<body >

<div class="fixed-top galva">
      <p>Attention! VAT is not included!</p>
</div>

<div class="jumbotron container-fluid">
    <div class="row vertical-align" >
        <div class=" col-xs-2 col-md-2 img-col">
            <img class="img" src="{{asset('images/log.png')}}" />
        </div>
        <div class="col-xs-10 col-md-10 ">
            <h1 id="name">Alligator PDR tools</h1>
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

        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <div class="meniu">
            <ul class="nav navbar-nav" style="padding-left: 225px">
                <li class="active" style="padding: 100px"><a href="#">Home</a></li>
                <li><a href="#">Products</a></li>
                <li><a href="#">Deals</a></li>
                <li><a href="#">Stores</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="wrapper">
        <nav id="sidebar">
          <ul class="list-unstyled components">
            <li class="{{ Request::url() ==  'shop1' ? 'active' : ''  }}"><a href="{{asset('shop1')}}">Visos prekės</a></li>
             @foreach($allcategories as $category)
            <li class="{{ Request::url() == url('/shop1*') ? 'active' : '' }}"><a href="{{ action('ShopController@getCategory', $category->id_kateg)}}">{{ $category->pavadinimas }}</a></li>
             @endforeach
          </ul>
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

</body>
</html>
