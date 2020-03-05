<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    public function enrolment()
    {
        return $this->hasMany('App\Enrolment');
    }


    public function timetable()
    {
        return $this->hasMany('App\TimeTable');
    }

    public function attendance()
    {
        return $this->hasMany('App\Attendance');
    }



}
