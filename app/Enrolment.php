<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrolment extends Model
{
    public function module()
    {
        return $this->belongsTo('App\Module');
    }

    public function student()
    {
        return $this->belongsTo('App\User');
    }


}
