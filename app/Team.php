<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'photo_id'];

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function match()
    {
        return $this->belongsTo('App\Match');
    }
}
