<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    protected $fillable = [
        'match_id',
        'user_id',
        'first_team_result',
        'second_team_result'
    ];

    public function match()
    {
        return $this->belongsTo('App\Match');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
