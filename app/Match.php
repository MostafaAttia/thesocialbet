<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    protected $fillable = ['first_team_id', 'second_team_id'];

    public function teams()
    {
        return $this->hasMany('App\Team');
    }

    public function findTeam($id)
    {
        return Team::findOrFail($id);
    }

    public function predictions()
    {
        return $this->hasMany('App\Prediction');
    }
}
