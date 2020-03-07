<?php
/*
* Timely Sheets: Attendance Management System
* Email: mr.brianluna@gmail.com
* Version: 1.0
* Author: Brian Luna
* Copyright 2019 Brian Luna
* Website: https://github.com/brianluna/timelysheets
*/
namespace App\Classes;

use DB;

Class table {

        public static function settings() {
        $settings = DB::table('settings');
        return $settings;
    }

}
