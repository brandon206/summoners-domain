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
    // Get the Ability Stats for the champion
    public function ability()
    {
        return $this->hasOne('App\ChampionAbility', 'champion_id', 'id');
    }
}
