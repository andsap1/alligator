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
<script>

    $(function(){
        var url = window.location.href;
        $("#sidebaradmin a").each(function(){
            if(url== (this.href)) {
                $(this).closest("a").addClass("active");
            }
        });
    });
</script>
<div class="fixed-top galva" style="border-bottom: white">
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <p>There is an error in the data you are entering:</p>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
</div>
<div class="jumbotron " style="background-color: white; align-content: center">
    <div class="container-fluid">
        <div class="row vertical-align" >
            <div class=" col-sm-2 img-col">
                <img class="log" src="{{asset('images/log.png')}}" />
            </div>
            <div class="col-sm-4 ">
                <h1 id="nameAlligator">Alligator PDR tools</h1>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-inverse" style="background-color: #222629;">
    <div class="container-fluid" >
        <ul class="nav navbar-nav navbar-right">
            @auth('admin')
                <li><a href="{{ route('adminRoutes.admin.signout')}}">Sign out </a></li>
            @endauth
        </ul>
    </div>
</nav>
{{--   /*kai sumazini atsidengia kitoje vietoje side bar*/--}}
<div class="wrapper">
    <nav id="sidebaradmin">
        <div class="bg-dark p-4">

            <ul class="list-unstyled components">
                <a href="{{ action('AdminController@index')}}"><div style="text-align: center;"><span class="glyphicon glyphicon-indent-left"></span><h5>Category</h5></div></a>
                <a href="{{ action('AdminController@users')}}"><div style="text-align: center;"><span class="glyphicon glyphicon-user"></span><h5>Users</h5></div></a>
                <a href="{{ action('AdminController@product')}}"><div style="text-align: center;"><span class="glyphicon glyphicon-list-alt"></span><h5>Products</h5></div></a>
                <a href="{{ action('AdminController@orders')}}"><div style="text-align: center;"><span class="glyphicon glyphicon-th-list"></span><h5>Orders</h5></div></a>
            </ul>

        </div>
    </nav>

    <div id="content">
        <div class="container-fluid" >
            <div class="row">
                @yield('turinys')
            </div>
        </div>

    </div>
</div>


<script>	/*Menu-toggle*/
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("active");
        alert(1);
    });</script>
</body>
</html>
