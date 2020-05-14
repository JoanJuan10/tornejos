<?php

namespace App\Http\Controllers;

use App\Game;
use App\Participation;
use App\Round;
use App\Tournament;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;
use Symfony\Component\HttpFoundation\JsonResponse;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($game)
    {
        $allT = Tournament::where('game_id', '=', $game)->orderBy('id', 'DESC')->get();
        $game = Game::find($game);

        return view("tournaments", [
            'tournaments' => $allT,
            'game' => $game,
            'user' => Auth::user()->id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($game = null)
    {
        if ($game != null){
            $game = Game::find($game);
        }

        return view("newtournament", [
            'game' => $game,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *t
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $juegos = Game::where('name', '=', $request->post("juego"))->get();

        if (!$juegos->count()) {
            Game::create([
                'name' => $request->post("juego"),
            ]);
            $juegos = Game::where('name', '=', $request->post("juego"))->get();
        }
        foreach ($juegos as $juego) {
            $juegos = $juego;
        }
        

        $reglas = $request->post("reglas");
        $premios = $request->post("premios");

        $datetime = new DateTime();
        $data = $request->post("fecha");
        $datetime->setDate(substr($data,0,4), substr($data,5,2), substr($data,8,2));
        $hora = $request->post("hora");
        $datetime->setTime(substr($hora,0,2),substr($hora,3,2),0);

        $public = 0;
        if ($request->post("publico")) {
            $public = 1;
        }
        else {
            $public = 0;
        }
        

        Tournament::create([
            'name' => $request->post("nombretorneo"),
            'description' => $request->post("descripcion"),
            'dateoftournament' => $datetime,
            'rules' => $reglas,
            'prizes' => $premios,
            'openregistration' => 0,
            'started' => 0,
            'public' => $public,
            'user_id' => Auth::id(),
            'game_id' => $juegos->id,
        ]);
        return redirect(route("listTournaments",$juegos->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function show($tournament)
    {
        $torneo = Tournament::find($tournament);

        $participantes = Participation::where("tournament_id", "=", $torneo->id)->get();

        return view("tournament", [
            'torneo' => $torneo,
            'user' => Auth::user(),
            'participantes' => $participantes,
        ]);
    }

    /**
     * Show the form for editing the specified resource. 
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit($tournament)
    {
        
        $torneo = Tournament::find($tournament);
        $participantes = Participation::where("tournament_id", "=", $torneo->id)->get();
        $date = substr($torneo->dateoftournament, 0,10);
        $time = substr($torneo->dateoftournament, 11,5);
        return view("edittournament", [
            'torneo' => $torneo,
            'date' => $date,
            'time' => $time,
            'user' => Auth::user(),
            'participantes' => $participantes,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tournament)
    {
        $juegos = Game::where("name", '=', $request->post("juego"))->get();

        if (!$juegos->count()) {
            Game::create([
                'name' => $request->post("juego"),
            ]);
            $juegos = Game::where('name', '=', $request->post("juego"))->get();
        }
        foreach ($juegos as $juego) {
            $juegos = $juego;
        }

        $public = 0;
        if ($request->post("publico")) {
            $public = 1;
        }
        else {
            $public = 0;
        }

        $torneo = Tournament::find($tournament);

        $torneo->name = $request->post('nombretorneo');
        $torneo->description = $request->post('descripcion');
        $torneo->rules = $request->post('reglas');
        $torneo->prizes = $request->post('premios');
        $torneo->game_id = $juegos->id;
        $torneo->public = $public;

        $datetime = new DateTime();
        $data = $request->post("fecha");
        $datetime->setDate(substr($data,0,4), substr($data,5,2), substr($data,8,2));
        $hora = $request->post("hora");
        $datetime->setTime(substr($hora,0,2),substr($hora,3,2),0);


        $torneo->dateoftournament = $datetime;
        $torneo->save();

        return redirect(route('showTournament', $torneo->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy($tournament)
    {
        $torneo = Tournament::find($tournament);
        $juego = $torneo->game->id;
        Tournament::destroy($tournament);
        return redirect(route("listTournaments", $juego));
    }
    public function inscripciones ($tournament) {
        $torneo = Tournament::find($tournament);

        if ($torneo->openregistration) {
            $torneo->openregistration = 0;
        }
        else {
            $torneo->openregistration = 1;
        }

        $torneo->save();

        return redirect(route('showTournament', $torneo->id));

    }
    public function start ($tournament) {
        $torneo = Tournament::find($tournament);

        if ($torneo->openregistration) {
            $torneo->openregistration = 0;
        }
        $torneo->started = 1;

        $torneo->save();

        $participantes = Participation::where('tournament_id', '=', $tournament)->get();

        $fights = 0;

        if ($participantes->count() == 2) {
            $numfights = 1;
            $fights = [
                [1,2]
            ];
        }
        else if ($participantes->count() <= 4) {
            $numfights = 4;
            $fights = [
                [1,4],
                [2,5],
            ];
        }
        else if ($participantes->count() <= 8) {
            $numfights = 8;
            $fights = [
                [1,8],
                [4,5],
                [2,7],
                [3,6],
            ];
        }
        else if ($participantes->count() <= 16) {
            $numfights = 16;
            $fights = [
                [1,16],
                [3,9],
                [4,13],
                [5,12],
                [2,15],
                [7,10],
                [3,14],
                [6,11],
            ];
        }
        else if ($participantes->count() <= 32) {
            $numfights = 32;
            $fights = [
                [1,32],
                [16,17],
                [8,25],
                [9,24],
                [4,29],
                [13,20],
                [5,28],
                [12,21],
                [2,31],
                [15,18],
                [7,26],
                [10,23],
                [3,30],
                [14,19],
                [6,27],
                [11,22],
            ];
        }
        for ($i=0; $i < $numfights; $i++) { 
            if (($i + 1) <= $numfights / 2) {
                Round::create([
                    'user_id_1' => $participantes[$fights[$i][0] - 1]->id,
                    'user_id_2' => $participantes[$fights[$i][1] - 1]->id,
                    'tournament_id' => $tournament,
                    'roundtype' => "X",
                ]);
            }
            else {
                Round::create([
                    'tournament_id' => $tournament,
                    'roundtype' => "X",
                ]);
            }
        }



        return redirect(route('showTournament', $torneo->id));
        
    }
    public function savebracket($idtournament, Request $request) {
        return new JsonResponse($_GET);
    }
    public function genbracket($idtournament, Request $request) {
        $rondas = Round::where("tournament_id", "=", $idtournament)->get();

        foreach ($rondas as $ronda) {
            if ($ronda->user_id_1) {
                $ronda->user_id_1 = $ronda->player1->player->name;
                $ronda->user_id_2 = $ronda->player2->player->name;
            }
        }
        return new JsonResponse($rondas);
    }
}
