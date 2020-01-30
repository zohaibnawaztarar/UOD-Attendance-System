<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function module()
    {
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }
}
