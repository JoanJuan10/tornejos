@extends("layouts.layout")


@section ("css")

<style>
    #top {
        font-size: 20px;
    }
    #crear-torneo a {
        color: red;
    }
    #crear-torneo a:hover {
        color: green;
    }
    #crear-torneo {
        text-align: right;
    }
    #show a:hover {
        color: orange;
    }

</style>

@endsection

@section("js")
@guest
<script>
    location.href = "{{route('register')}}";
</script>
@endguest
@endsection

@section ("content")
<section>
    <div class="container">
        <div class="row" id="top">
            <div class="col-md-6">
                <div id="title">Torneos de {{$game->name}}</div> 
            </div>
            <div class="col-md-6" id="crear-torneo">
                <a href="{{route('createTournament', $game->id)}}" role="button"><i class="fa fa-plus-square" aria-hidden="true"></i> Crear Torneo</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th>Nombre del Torneo</th>
                            <th>Organizador</th>
                            <th>Fecha y Hora de Inicio</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach ($tournaments as $tournament)
                            @if (($tournament->openregistration && !$tournament->started) || $tournament->user_id == $user)
                                <tr>
                                    <td>{{$tournament->name}}</td>
                                    <td>{{$tournament->creator->name}}</td>
                                    <td>{{$tournament->dateoftournament}}</td>
                                    <td id="show">
                                    <a href="{{route('showTournament', $tournament->id)}}" role="button"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection