<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChampionAbility extends Model
{
    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }
}
