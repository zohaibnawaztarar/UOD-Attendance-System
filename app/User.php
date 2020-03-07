<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use Notifiable;
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }

    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

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

    public function isLecturer() {
        return $this->roles()->where('name', 'lecturer')->exists();
    }

    public function isStudent() {
        return $this->roles()->where('name', 'Student')->exists();
    }

    public function isSystemAdmin() {
        return $this->roles()->where('name', 'System Admin')->exists();
    }

    public function isSchoolAdmin() {
        return $this->roles()->where('name', 'School Admin')->exists();
    }
}
