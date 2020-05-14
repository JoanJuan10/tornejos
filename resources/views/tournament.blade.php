@extends("layouts.layout")

@section ("css")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bracket/0.11.1/jquery.bracket.min.css" integrity="sha256-QB9Q3ENRUxlbd2KF7DKBQwoqaKOsczw7BVnbCVTTKsM=" crossorigin="anonymous" />
<style>
    #tournamentmenu {
        padding-top: 0px;
        padding-bottom: 0px;
        margin: 0 auto;
    }
    .bracket {

    }
    .match {

    }
    .round {

    }

    .team {

    }
    .win {

    }
    .lose {

    }
    .highlight {

    }

    .highlightWinner {

    }

    .highlightLoser {

    }

    .connector {

    }

    .label {

    }

    .score {

    }

    .na {

    }

    .bubble {

    }

    .third {

    }

    .fourth {

    }
    
</style>
@endsection

@section ("js")

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bracket/0.11.1/jquery.bracket.min.js" integrity="sha256-mvNdP3BR+ati2Deig7ivY+0Oij09NJCRVV2lvM/R+14=" crossorigin="anonymous"></script>
<script>
    $(function () {

        $.ajax({
            type: "GET",
            url: "{{route('generarLlave',$torneo->id)}}",
            success: function (response) {
                var equipos = [];
                for (let i = 0; i < response.length / 2; i++) {
                    equipos.push([response[i].user_id_1, response[i].user_id_2]);
                }
                var mitad = response.length / 2;

                var resultados = [];
                var resNum = 0;

                for (let i = 0; i < Math.log2(response.length); i++) {
                    resultados[i] = [];
                    for (let j = 0; j < mitad; j++) {
                        resultados[i][j] = [];
                        resultados[i][j].push(response[resNum].score1,response[resNum].score2);
                        resNum++;
                    }
                    mitad = mitad / 2;
                    if (mitad < 2) {
                        mitad = 2;
                    }
                }
                console.log(response);
                console.log(resultados);
                var saveData = {
                    teams: equipos,
                    results: resultados,
                };
                /* Called whenever bracket is modified
                 *
                 * data:     changed bracket object in format given to init
                 * userData: optional data given when bracket is created.
                 */
                function saveFn(data) {
                    var info = {"data": data};
                    $.ajax({
                        type: "GET",
                        url: "{{route('modificarLlave',$torneo->id)}}",
                        data: info,
                        dataType: "JSON",
                        success: function (response) {
                            console.log(response);
                        }
                    });
                }
                 
                var container = $('.demo');
                container.bracket({
                    init: saveData,
                    save: saveFn,
                    userData: "Hola",
                    teamWidth: 200,
                    scoreWidth: 32,
                    matchMargin: 64,
                    roundMargin: 65,
                    disableToolbar: true,
                    disableTeamEdit: true,
                });
                
            }
        });
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
    <div class="container">
        <div class="demo">
        
        </div>
    </div>
</section>
    
@endif


@endsection