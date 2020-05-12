<?php

namespace App\Http\Controllers;

use App\Game;
use App\Tournament;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*return view("tournament", [
            'info' => $return,
        ]);*/

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

        

        Tournament::create([
            'name' => $request->post("nombretorneo"),
            'description' => $request->post("descripcion"),
            'dateoftournament' => $datetime,
            'rules' => $reglas,
            'prizes' => $premios,
            'openregistration' => 0,
            'started' => 0,
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
    public function show(Tournament $tournament)
    {
        $torneo = Tournament::find($tournament);
        return view(null, compact($torneo));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Tournament $tournament)
    {
        $torneo = Tournament::find($tournament);
        return view(null, compact($torneo));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tournament $tournament)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tournament  $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tournament $tournament)
    {
        //
    }
}
