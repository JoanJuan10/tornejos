@extends("layouts.layout")

@section("content")
    <!-- Header -->
    <header class="masthead">
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading text-uppercase">Unete y participa</div>
                <a class="btn btn-outline-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Informate</a>
                @guest
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{route("register")}}">Registrate</a>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{route("login")}}">Login</a>
                @else
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{route("listGames")}}">Busca un Torneo</a>
                @endguest
            </div>
        </div>
    </header>
    
    <!-- Services -->
    <section class="page-section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Servicios</h2>
                    <h3 class="section-subheading text-muted">Conoce, juega i compite con otros usuarios.<br>Disfuta participando en una gran variedad de torneos de diferentes videojuegos.</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas far fa-pencil-ruler fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Torneos Personalizados</h4>
                    <p class="text-muted">Crea torneos personalizadoss con tus amigos o unete a otros usuarios y compite por ser el mejor.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-trophy fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Torneos Semanales</h4>
                    <p class="text-muted">Participa y gana premios en los torneos semanales de la plataforma.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Rankings i Competiciones</h4>
                    <p class="text-muted">Escala posiciones en los distintos rankings y demuestra tu habilidad en tus videojuegos favoritos. (Proximamente)</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Team -->
    <section class="bg-light page-section" id="team">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Nuestro Gran Equipo</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="team-member">
                    <!--" ICONO SIN ROSTRO: https://cdn2.iconfinder.com/data/icons/ios-7-icons/50/user_male2-512.png"-->
                        <img class="mx-auto rounded-circle" src="img/sergio.jpeg"  alt="Imatge_Sergio">
                        <h4>Sergio Figueroa</h4>
                        <p class="text-muted">Jefe de Diseño</p>
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
                </div>
                <div class="col-sm-6">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="img/baza.jpeg" alt="Imatge_Joan">
                        <h4>Joan Baza</h4>
                        <p class="text-muted">Jefe de Desarrollo</p>
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
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
                </div>
            </div>
        </div>
    </section>
@endsection