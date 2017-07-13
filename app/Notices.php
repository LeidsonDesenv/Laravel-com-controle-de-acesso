<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notices extends Model
{
    public function namewriter()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
