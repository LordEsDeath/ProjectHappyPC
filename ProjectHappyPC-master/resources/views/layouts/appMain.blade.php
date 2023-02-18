<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HappyPC news</title>		
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>HappyPC news</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href='{{ asset("components/bootstrap/dist/css/bootstrap.min.css") }}'>
	<!-- Font Awesome -->
	<link rel="stylesheet" href='{{ asset("components/font-awesome/css/font-awesome.min.css") }}'>
    
	<!-- Theme style -->
	<link rel="stylesheet" href='{{ asset("dist/css/AdminLTE.min.css") }}'>	
	<!-- Google Font -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<!-- Custom style -->
	<link rel="stylesheet" href='{{ asset("dist/css/custom_style.css") }}'>	
</head>

<header>

        <nav style="box-shadow: 10px 5px 5px black;" class="navbar navbar-default">

            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li> <img style="width: 250px; margin-left: 10px; border-radius: 10px;" src="{{ ('/images/logo.png') }}"></li>
                <li> <a class="navbar-brand" href="{{ url('/') }}">Home</a></li>
                <li> <a class="navbar-brand" href="{{ url('/news') }}">News</a></li>
                <li> <a class="navbar-brand" href="{{ url('/games') }}">Games</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
            <li><a href="{{ url('/login') }}" class="navbar-brand">Login</a></li>
            <li><a href="{{ url('/register') }}" class="navbar-brand" style="margin-right:10px;">Register</a></li>
            @else
            <li><a href="{{ url('/dashboard') }}" class="navbar-brand">Admin panel</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ strtoupper(Auth::user()->name) }} <span class="caret"></span>
                </a>
                
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                </ul>
            </li>
            @endif
            </ul>
        </nav>

        <form action="/newssearch" class="navbar-right" style="margin-right:10px;" method="POST">
        @csrf
            <label for="search">Search:</label>
            <input style="border-radius: 10px;" type="search" id="search" name="search">
            <input type="submit" value="Search">
        </form>
    
    <div>
        @yield('content')
    </div>

    
        <!-- jQuery 3 -->
    }
    <script src='{{ asset("components/jquery/dist/jquery.min.js") }}'></script>

    <!-- jQuery UI 1.11.4 -->
    <script src='{{ asset("components/jquery-ui/jquery-ui.min.js") }}'></script>
    <!-- Bootstrap 3.3.7 -->
    <script src='{{ asset("components/bootstrap/dist/js/bootstrap.min.js") }}'></script>
    <!-- AdminLTE App -->
    <script src='{{ asset("dist/js/adminlte.min.js") }}'></script>

</header>
<footer >
    <p style="text-align: center; border-top: 1px solid black;">HappyPC | project | Konstantin | Pavel | Mark </p>
</footer>
</html>	