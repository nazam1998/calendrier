<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates = ['start', 'end'];
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
