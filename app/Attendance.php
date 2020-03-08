<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model


{
    protected $fillable = ['session_id', 'attendee_id'];

    public function module()
    {
        return $this->belongsTo('App\Module', 'session_id');
    }

    public function student()
    {
        return $this->belongsTo('App\User', 'attendee_id');
    }

    public function time()
    {
        return $this->belongsTo('App\TimeTable', 'session_id');
    }


}
