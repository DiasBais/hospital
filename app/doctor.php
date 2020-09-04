<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class doctor extends Model
{
    public function directions()
    {
        return $this->belongsTo('App\Directions', 'direction_id', 'id');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
