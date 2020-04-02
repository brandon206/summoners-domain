<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChampionTrait extends Model
{
    public function champion()
    {
        return $this->belongsTo(Champion::class);
    }
}
