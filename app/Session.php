<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public function session()
    {
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }
}
