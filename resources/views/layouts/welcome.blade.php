<!DOCTYPE html>
<html >
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


    <style>
        footer {
            background-color: #f2f2f2;
            padding: 25px;
        }
        .jumbotron {
            margin-bottom: 0px;
            padding: 3vh;
        }
        .page-header{
            border-bottom: 0px solid;
        }
        @media only screen and (max-width: 600px) {
            .galva {background: red;}
        }
        .img-col{
            /*margin: auto 3%;*/
            min-width: 50px;
            /*padding: 0 0;*/
            margin-right: 3px;
        }
        .img {
            max-width: 200px;
            min-width: 50px;
            width: 100%;
            /*padding: 2% 2%;*/

        }

        .vertical-align {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: row;
        }
        #nameAlligator{
            font-size: 32px;
        }
        @media only screen and (max-width: 500px) {
           #nameAlligator{
                font-size: unset;
            }
        }

        /** {*/
        /*    box-sizing: border-box;*/
        /*}*/
        /*.row::after {*/
        /*    content: "";*/
        /*    clear: both;*/
        /*    display: block;*/
        /*}*/

        /* For desktop: */
        /*.col-1 {width: 8.33%;}*/
        /*.col-2 {width: 16.66%;}*/
        /*.col-3 {width: 25%;}*/
        /*.col-4 {width: 33.33%;}*/
        /*.col-5 {width: 41.66%;}*/
        /*.col-6 {width: 50%;}*/
        /*.col-7 {width: 58.33%;}*/
        /*.col-8 {width: 66.66%;}*/
        /*.col-9 {width: 75%;}*/
        /*.col-10 {width: 83.33%;}*/
        /*.col-11 {width: 91.66%;}*/
        /*.col-12 {width: 100%; height: 15%}*/

        /*@media only screen and (max-width: 768px) {*/
        /*    !* For mobile phones: *!*/
        /*    [class*="col-"] {*/
        /*        width: 100%;*/
        /*        height: auto;*/
        /*    }*/
        /*}*/
    </style>
</head>
<body >

<div class="fixed-top galva">
    <p>lalalcccccccccccccccccccccccc cddddddddddddd dddd ddddddddddddddddd dddd dddddddddd ddddddd dd  ddddd  ddddd ddd dddbbbbbbbbbb</p>
    <p>Attention! VAT is not included!jj</p>
</div>

    <div class="jumbotron container-fluid">
{{--        <div class="container">--}}
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
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            </ul>
        </div>
    </div>
</nav>



<div class="container-fluid" >
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar" style="height: 100vh">
            <ul class="nav nav-sidebar">
                    @foreach($allcategories as $category)
                        <li><a href="{{ action('ShopController@getCategory', $category->id_kategorija)}}">{{ $category->pavadinimas }}</a>
                        </li>
                    @endforeach
                <li class="active"><a href="#">Overview</a></li>
                <li><a href="#">Reports</a></li>
                <li><a href="#">Analytics</a></li>
                <li><a href="#">Export</a></li>
            </ul>


        </div>
        <div class="col-sm-9 col-md-10 main">
            <h1 >Dashboard</h1>

                <div class="row placeholders">
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4>Label</h4>
                        <span class="text-muted">Something else</span>
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4>Label</h4>
                        <span class="text-muted">Something else</span>
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4>Label</h4>
                        <span class="text-muted">Something else</span>
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4>Label</h4>
                        <span class="text-muted">Something else</span>
                    </div>
                    <div class="col-xs-6 col-sm-3 placeholder">
                        <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
                        <h4>Label</h4>
                        <span class="text-muted">Something else</span>
                    </div>
                </div>

                <h2 class="sub-header">Section title</h2>

            </div>
        </div>
    </div>
</div>


{{--<div class="container" style="width: 100%; background-color: #38c172 ">
    <div class="row">

        <div id="contentLeft" style="width:15%">

            <ul class="nav">
                <li>
                    <a href="#">
                        <i class="zmdi zmdi-view-dashboard"></i> Dashboard
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">BLACK FRIDAY DEAL</div>
                <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-danger">
                <div class="panel-heading">BLACK FRIDAY DEAL</div>
                <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-success">
                <div class="panel-heading">BLACK FRIDAY DEAL</div>
                <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
            </div>
        </div>
    </div>
</div><br>

<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">BLACK FRIDAY DEAL</div>
                <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">BLACK FRIDAY DEAL</div>
                <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="panel panel-primary">
                <div class="panel-heading">BLACK FRIDAY DEAL</div>
                <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
                <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
            </div>
        </div>
    </div>
</div><br><br>--}}

{{--<footer class="container-fluid text-center">--}}
{{--    <p>Online Store Copyright</p>--}}
{{--    <form class="form-inline">Get deals:--}}
{{--        <input type="email" class="form-control" size="50" placeholder="Email Address">--}}
{{--        <button type="button" class="btn btn-danger">Sign Up</button>--}}
{{--    </form>--}}
{{--</footer>--}}

</body>
</html>
