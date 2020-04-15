<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'dateoftournament', 'openregistration', 'started', 'game',
    ];

    /*
    $table->id();
            $table->string("name");
            $table->string("description");
            $table->date("dateoftournament");
            $table->boolean("openregistration");
            $table->boolean("started");
            $table->foreignId("game");
            $table->foreign('game')->references('id')->on('games');
    */
}
