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
        'name', 'description', 'dateoftournament','thirdplace', 'openregistration', 'started', 'game_id','user_id','rules','prizes', 'public'
    ];

    public function creator() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function game() {
        return $this->belongsTo('App\Game', 'game_id');
    }
}
