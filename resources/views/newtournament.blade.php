@extends ("layouts.layout")

@section ("css")
<style>
    .title {
        text-align: center;
        margin-bottom: 40px;
    }
</style>

@endsection

@section ("content")
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 title">
                <h2>Nuevo Torneo</h2>
            </div>
        </div>
    </div>
    <form method="post" action="{{route("storeTournament")}}">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <fieldset>
                        <legend>Información Basica</legend>
                        <div class="form-group">
                            <label for="nombre">Nombre del torneo:</label>
                            <input type="text" class="form-control" id="nombre" name="nombretorneo" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea id="descripcion" class="form-control" name="descripcion" rows="3" required></textarea>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Información de Juego</legend>
                        <div class="form-group">
                            <label for="juego">Nombre del juego:</label>
                            @if ($game == null)
                                <input type="text" class="form-control" id="juego" name="juego" required>
                            @else
                            <input type="text" class="form-control" value="{{$game->name}}" title="Si quieres crear un torneo para un juego no existente, no elijas juego en el menú." disabled id="nombre" name="nombretorneo">
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="reglas">Reglas del Torneo:</label>
                            <textarea id="reglas" class="form-control" name="reglas" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="premios">Premios del Torneo:</label>
                            <textarea id="premios" class="form-control" name="premios" rows="3" required></textarea>
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
                        <div class="form-group">
                    </fieldset>
                </div>
                <div class="col-md-6">
                    <fieldset>
                        <legend>Miscelánea</legend>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="publico">
                            <label class="form-check-label" for="publico">Torneo Publico</label>
                        </div>
                        <div class="form-group">
                    </fieldset>
                </div>
            </div>
        </div>
    </form>
</section>

@endsection