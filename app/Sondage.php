<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sondage extends Model
{
    public function events(){
        return $this->belongsToMany('App\Event','event_sondage','sondage_id','event_id');
    }
    public function users(){
        return $this->belongsToMany('App\User','user_sondage','sondage_id','user_id');
    }
}
