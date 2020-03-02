<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
   /* public function sessions()
    {
        return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }*/

    public function module()
    {
        return $this->belongsTo('App\Module');
    }

    public function teacher()
    {
        return $this->belongsTo('App\User');
    }

    public function location()
    {
        return $this->belongsTo('App\Locations');
    }
}
