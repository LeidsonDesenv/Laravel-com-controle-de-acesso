<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Notices extends Model
{
    protected $fillable  = ['user_id', 'title', 'description'];
    public function namewriter()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    public $rules = ['title'       => 'required | max:100',
                     'description' => 'required | max:255'
                     ];
    
}
