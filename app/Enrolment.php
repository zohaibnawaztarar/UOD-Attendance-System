<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    public function enrolment()
    {
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }
}
