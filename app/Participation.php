<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    protected $fillable = [
        'player_id','user_id', 'tournament_id', 'defeated'
    ];

    public function player() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
