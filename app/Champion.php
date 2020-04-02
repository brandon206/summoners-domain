<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Champion extends Model
{
    // Get the Traits for the champion
    public function traits()
    {
        return $this->hasMany('App\ChampionTrait', 'champion_id');
    }
}
