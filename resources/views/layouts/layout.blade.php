<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Debuggers - Plataforma de Torneos de Videojuegos</title>
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
    <!-- Custom fonts for this template -->
    <link href="{{asset("vendor/fontawesome-free/css/all.min.css")}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    
    <!-- Custom styles for this template -->
    <link href="{{asset("css/agency.min.css")}}" rel="stylesheet">
	@yield("css")
    
</head>

<body id="page-top">
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="{{route("main")}}">DEBUGGERS</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
					@guest
					<li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{route("register")}}">Registrate</a>
                    </li>
					<li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{route("login")}}">Login</a>
                    </li>
					@else
					<li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="{{route("listGames")}}">Torneos</a>
                    </li>
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle js-scroll-trigger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<div class="nav-item dropdown-menu dropdown-menu-right" style="background-color: red!important" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" style="background-color: transparent; text-align: center; font-weight: 800;" href="{{ route('logout') }}"
								onclick="event.preventDefault();
								document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</div>
                    </li>
					@endguest

                </ul>
            </div>
        </div>
    </nav>
    
    @yield("content")
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-4">
                    <span class="copyright">Creative Commons &copy; Debuggers 2020</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item">
                            <a href="{{route("privacitat")}}">Política de Privacidad</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{route("termes")}}">Terminos de Uso</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap core JavaScript -->
    <script src="{{asset("vendor/jquery/jquery.min.js")}}"></script>
    <script src="{{asset("vendor/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
    
    <!-- Plugin JavaScript -->
    <script src="{{asset("vendor/jquery-easing/jquery.easing.min.js")}}"></script>
    
    <!-- Contact form JavaScript -->
    <script src="{{asset("js/jqBootstrapValidation.js")}}"></script>
    <script src="{{asset("js/contact_me.js")}}"></script>
    
    <!-- Custom scripts for this template -->
    <script src="{{asset("js/agency.min.js")}}"></script>
	@yield("js")
    
</body>

</html>
