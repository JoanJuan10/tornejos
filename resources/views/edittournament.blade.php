@extends ('layouts.layout')

@section ("css")
<style>
    #tournamentmenu {
        padding-top: 0px;
        padding-bottom: 0px;
        margin: 0 auto;
    }
</style>
@endsection

@section ("content")
@if ($user->id != $torneo->creator->id)
<script>
    location.href = "{{route('listGames')}}";
</script>
@endif
<section>
</section>
<section id="tournamentmenu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills">
                    <li class="nav-item" id="llave">
                        <a class="nav-link " href="{{route("showTournament", $torneo->id)}}?mode=bracket">Llave</a>
                    </li>
                    <li class="nav-item" id="participantes">
                        <a class="nav-link" href="{{route("showTournament", $torneo->id)}}?mode=participants">Participantes</a>
                    </li>
                    <li class="nav-item" id="opciones">
                        <a class="nav-link active"  href="#">Opciones</a>
                    </li>
                    <li class="nav-item" title="Próximamente" id="forum">
                        <a class="nav-link disabled" href="#?mode=forum">Forum</a>
                    </li>
                    <li class="nav-item" title="Próximamente">
                        <a class="nav-link disabled" href="#">Unirse</a>
                    </li>
                    <li class="nav-item" title="Próximamente">
                        <a class="nav-link disabled" href="#">Abandonar</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section>
    <form method="post" action="{{route("updateTournament", $torneo->id)}}">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <fieldset>
                        <legend>Información Basica</legend>
                        <div class="form-group">
                            <label for="nombretorneo">Nombre del torneo:</label>
                            <input type="text" class="form-control" value="{{$torneo->name}}" id="nombretorneo" name="nombretorneo" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea id="descripcion" class="form-control" name="descripcion" rows="8" required>{{$torneo->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="fecha">Fecha y Hora del Torneo:</label>
                            <input type="date" class="form-control" value="{{$date}}"  id="fecha" name="fecha" required>
                            <input type="time" class="form-control" value="{{$time}}" id="hora" name="hora" required>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Información de Juego</legend>
                        <div class="form-group">
                            <label for="juego">Nombre del juego</label>
                            <input type="text" class="form-control" value="{{$torneo->game->name}}" id="juego" name="juego">
                        </div>
                        <div class="form-group">
                            <label for="reglas">Reglas del Torneo:</label>
                            <textarea id="reglas" class="form-control" name="reglas" rows="5" required>{{$torneo->rules}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="premios">Premios del Torneo:</label>
                            <textarea id="premios" class="form-control" name="premios" rows="3" required>{{$torneo->prizes}}</textarea>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Estructura del torneo</legend>
                        <div class="form-group">
                            <label for="tipotorneo">Tipo de Torneo</label>
                            <select id="tipotorneo" class="form-control" name="tipotorneo">
                                <option value="single" selected>Eliminación unica</option>
                                <option value="double" disabled title="No Disponible">Eliminación Doble</option>
                                <option value="league" disabled title="No Disponible">Liga</option>
                            </select>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Miscelánea</legend>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="publico" name="publico" value="si">
                            <label class="form-check-label" for="publico">Torneo Publico</label>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Guardar y Continuar</button>
                </div>
                <div class="col-md-3">
                    <a role="button" href="{{route("deleteTournament", $torneo->id)}}" class="btn btn-primary">Borrar Torneo</a>
                </div>
                <div class="col-md-3">
                    @if ($torneo->openregistration)
                        <a role="button" href="{{route("inscripcionesTorneo", $torneo->id)}}" class="btn btn-primary">Cerrar Inscripciones</a>
                    @else 
                        <a role="button" href="{{route("inscripcionesTorneo", $torneo->id)}}" class="btn btn-primary">Abrir Inscripciones</a>
                    @endif
                </div>
                <div class="col-md-3">
                    <a role="button" href="{{route("empezarTorneo", $torneo->id)}}" class="btn btn-primary">Empezar Torneo</a>
                </div>
            </div>
        </div>
    </form>
</section>

@endsection