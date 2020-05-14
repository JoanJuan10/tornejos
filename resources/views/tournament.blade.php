@extends("layouts.layout")

@section ("css")
<style>
    #tournamentmenu {
        padding-top: 0px;
        padding-bottom: 0px;
        margin: 0 auto;
    }

</style>
@endsection

@section ("js")

<script>
    $(function () {
        
    });
</script>

@endsection

@section ("content")

<section>

</section>

<section id="tournamentmenu">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills">
                    <li class="nav-item" id="llave">
                    @if (!$_GET || $_GET["mode"] == "bracket")
                        <a class="nav-link active" href="?mode=bracket">Llave</a>
                    @else 
                        <a class="nav-link " href="?mode=bracket">Llave</a>
                    @endif
                    </li>
                    <li class="nav-item" id="participantes">
                    @if ($_GET && $_GET["mode"] == "participants")
                        <a class="nav-link active" href="?mode=participants">Participantes</a>
                    @else
                        <a class="nav-link" href="?mode=participants">Participantes</a>
                    @endif
                    </li>
                    @if ($user->id == $torneo->user_id)
                        <li class="nav-item" id="opciones">
                            @if ($_GET && $_GET["mode"] == "options")
                                <a class="nav-link active"  href="{{route('editTournament', $torneo->id)}}">Opciones</a>
                            @else
                                <a class="nav-link"  href="{{route('editTournament', $torneo->id)}}">Opciones</a>
                            @endif
                        </li>
                    @endif
                    </li>
                    <li class="nav-item" title="Próximamente" id="forum">
                        @if ($_GET && $_GET["mode"] == "forum")
                            <a class="nav-link active disabled" href="#?mode=forum">Forum</a>
                        @else
                            <a class="nav-link disabled" href="#?mode=forum">Forum</a>
                        @endif
                    </li>
                    @if ($torneo->openregistration)
                        @if ($participantes->count())
                            @for ($i = 0; $i < $participantes->count(); $i++)
                                @if ($participantes[$i]->user_id == $user->id)
                                    <li class="nav-item" title="Próximamente">
                                        <a class="nav-link disabled" href="{{route("salirTorneo",[$torneo->id, $user->id])}}">Abandonar</a>
                                    </li> 
                                    @php
                                        $i = 10000
                                    @endphp
                                @endif
                                @if ($i == $participantes->count() - 1) 
                                    <li class="nav-item" title="Próximamente">
                                        <a class="nav-link disabled" href="{{route("entrarTorneo",[$torneo->id, $user->id])}}">Unirse</a>
                                    </li>
                                @endif
                            @endfor
                        @else
                            <li class="nav-item" title="Próximamente">
                                <a class="nav-link disabled" href="{{route("entrarTorneo",[$torneo->id, $user->id])}}">Unirse</a>
                            </li>
                        @endif
                    @endif
                </ul>
            </div>
        </div>
    </div>
</section>
@if ($_GET && $_GET["mode"] == "participants")
    <section>
        <div class="container">
            <table class="table table-hover table-dark participantes">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Participante</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $i = 1;
                @endphp
                    @foreach ($participantes as $participante)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$participante->player->name}}</td>
                        </tr>
                        @php
                        $i++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
@else
<section>
HOLA
</section>
    
@endif


@endsection