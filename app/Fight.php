<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fight extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'player1', 'player2', 'winner', 'tournament'
    ];

    /*
    $table->id();
            $table->foreignId("player1");
            $table->foreign('player1')->references('id')->on('users');
            $table->foreignId("player2");
            $table->foreign('player2')->references('id')->on('users');
            $table->foreignId("winner");
            $table->foreign('winner')->references('id')->on('users');
            $table->foreignId("tournament");
            $table->foreign('tournament')->references('id')->on('tournaments');
            $table->timestamps();
    */
}
