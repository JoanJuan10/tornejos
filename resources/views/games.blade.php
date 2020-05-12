@extends("layouts.layout")

@section("js")
<script>
    function filtrar() {
        var input, filtre, games, i, txtValue;
        input = $("#filtre");
        filtre = input.val().toUpperCase();
        games = $(".games").children();

        for (var game in games) {
            txtValue = $(games[game]).find("a").text();
            if (txtValue.toUpperCase().indexOf(filtre) > -1) {
                games[game].style.display = "";
            } 
            else {
                games[game].style.display = "none";
            }
        }
    }
    
</script>

@guest
<script>
    location.href = "{{route('register')}}";
</script>
@endguest

@endsection

@section("css")
<style>
    .boton-juego {
        width: 100%;
        color: white;
        margin-top: 5px;
        margin-bottom: 20px;
    }
    .img-fluid {
        width: 100%;
    }
    #filtre {
        margin-left: 30px;
    }
    #crear-torneo a {
        color: red;
    }
    #crear-torneo a:hover {
        color: green;
    }
    #crear-torneo {
        text-align: right;
        font-size: 19px;
        margin-top: 12px;
    }

</style>
@endsection

@section("content")

<section>
    <div class="container">
    <div class="row" style="margin-bottom: 30px;">
        <h2 style="color: white">Busca Tornejos</h2>
        <input type="text" id="filtre" onkeyup="filtrar()" placeholder="Filtra per jocs" title="Escriu el nom del joc a buscar">
        <div class="col-md-6" id="crear-torneo">
            <a href="{{route('createTournament')}}" role="button"><i class="fa fa-plus-square" aria-hidden="true"></i> Crear Torneo</a>
        </div>
    </div>
        <div class="row games">
            @foreach ($games as $game)
                <div class="col-md-3">
                    <div><img id="icono" class="img-fluid" src="{{$game->img_link}}"></div>
                    <a role="button" href="{{route("listTournaments", $game->id)}}" class="btn btn-outline-dark boton-juego">{{$game->name}}</a>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
