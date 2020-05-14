<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{

    protected $fillable = [
        'roundtype', 'user_id_1', 'user_id_2', 'score1','score2', 'tournament_id'
    ];


    public function player1() {
        return $this->belongsTo('App\Participation', 'user_id_1');
    }
    public function player2() {
        return $this->belongsTo('App\Participation', 'user_id_2');
    }
}