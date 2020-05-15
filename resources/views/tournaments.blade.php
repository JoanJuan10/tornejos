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
        color: darkred;
        font-weight: 800;
        text-shadow: 0.1em 0.1em 0.2em white;
    }
    #crear-torneo {
        text-align: right;
    }
    #show a:hover {
        color: darkred;
        text-shadow: 0.1em 0.1em 0.2em white;
    }

</style>

@endsection

@section("js")
@guest
<script>
    location.href = "{{route('register')}}";
</script>
@endguest

@if (!empty($_GET))
    @if (!empty($_GET["error"]))
        <script>
            $("#error").show("fast");
        </script>
    @else
        <script>
            $("#error").hide();
        </script>
    @endif
@endif

@endsection

@section ("content")
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger" role="alert" id="error" style="display: none">
                </div>
            </div>
        </div>
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
                            @if ($tournament->public || $tournament->user_id == $user)
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