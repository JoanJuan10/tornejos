<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{



    public function player1() {
        return $this->belongsTo('App\User', 'player1');
    }
    public function player2() {
        return $this->belongsTo('App\User', 'player2');
    }
    public function winner() {
        return $this->belongsTo('App\User', 'winner');
    }
}