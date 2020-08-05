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
    public function usersVote()
    {
        return $this->belongsToMany('App\Event', 'user_sondage', 'event_id', 'user_id');
    }
}
