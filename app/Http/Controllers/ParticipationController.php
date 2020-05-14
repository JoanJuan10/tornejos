<?php

namespace App\Http\Controllers;

use App\Participation;
use Illuminate\Http\Request;

class ParticipationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($idtournament, $idplayer)
    {
        $participaciones = Participation::where('user_id', "=", $idplayer)->get();
        if (!$participaciones->count()) {
            Participation::create([
                'user_id' => $idplayer,
                'tournament_id' => $idtournament,
                'defeated' => 0,
            ]);
        }
        return redirect(route("showTournament",$idtournament));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function show(Participation $participation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function edit(Participation $participation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participation $participation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function destroy($idtournament, $idplayer)
    {
        $participations = Participation::where("user_id", "=", $idplayer)->where("tournament_id", "=", $idtournament)->get();

        foreach ($participations as $participation) {
            $participations = $participation;
        }
        Participation::destroy($participations->id);

        return redirect(route("showTournament", $idtournament));
    }
}
