<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locations extends Model
{
    public function Location()
    {
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }

    public function timetable()
    {
        return $this->hasMany('App\TimeTable');
    }
}
