<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notices extends Model
{
    protected $fillabe = ['user_id', 'title', 'description'];
    public function namewriter()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
