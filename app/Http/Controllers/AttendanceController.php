<?php

namespace App\Http\Controllers;
use App\Setting;
use App\TimeTable;
use App\Attendance;
use App\Classes\table;
use App\User;
use App\Role;
use App\Module;
use App\Locations;
use App\Enrolment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    public function postAttendance(Request $request)
    {
        $this->validate($request, [
            //'session_id' => 'required|max:120',
            'attendee_id' => 'required|max:120',
            'status' => 'required|max:120',
            'pin' => 'required|max:120',
        ]);



        $pin = $request['pin'];
        $session_id = TimeTable::where('pin', $pin)->value('id');
        //$session_id = $request['session_id'];
        $attendee_id = $request['attendee_id'];
        $status = $request['status'];


        $ip = $request->ip();
        // ip resriction
        $iprestriction = table::settings()->value('ip');

        if ($session_id == null) {
            return redirect()->back()->with(['error' => 'Sign in Failed! Please Provide a valid PIN.']);

        }


        elseif ($iprestriction != null) {
            $ips = explode(",", $iprestriction);
            if(in_array($ip, $ips) == false) {
                return redirect()->back()->with(['error' => 'Whoops! You are not allowed to sign in from outside university network.']);

            }
        }
        else


            $session_id = TimeTable::where('pin', $pin)->value('id');
        $attendance = new Attendance();
        $attendance->session_id = $session_id;
        $attendance->attendee_id = $attendee_id;
        $attendance->status = $status;

        $attendance->save();

        return redirect()->back()->with(['message' => 'Successfully Signed!']);
    }

    public function getViewReports()
    {
        $attendances = Attendance::all();
        return view('attendanceReports', ['attendances' => $attendances]);
    }

    public function getViewStuReport($stu_id)
    {
        $report = Attendance::where('attendee_id', $stu_id)->get();
        return view('myReports', ['report' => $report]);
    }

    public function getStudents()
    {
        $modules = Module::all();
        //$students = User::all();
        $students = User::whereHas('roles', function($q){$q->whereIn('role_id', ['1']);})->get();
        return view('manualSignin', ['modules' => $modules], ['students' => $students]);


    }


    public function getAbsentStudents()
    {
        $modules = Module::all();
        //$students = User::all();
        $students = User::whereHas('roles', function($q){$q->whereIn('role_id', ['1']);})->get();
        return view('attendanceAbsentSignIn', ['modules' => $modules], ['students' => $students]);


    }

    public function postManualAttendance(Request $request)
    {
        $this->validate($request, [
            //'session_id' => 'required|max:120',
            'attendee_id' => 'required|max:120',
            'status' => 'required|max:120',
            'pin' => 'required|max:120',
        ]);



        $pin = $request['pin'];
        $session_id = TimeTable::where('pin', $pin)->value('id');
        //$session_id = $request['session_id'];
        $attendee_id = $request['attendee_id'];
        $status = $request['status'];


        $ip = $request->ip();
        // ip resriction
        $iprestriction = table::settings()->value('ip');

        if ($session_id == null) {
            return redirect()->back()->with(['error' => 'Sign in Failed! Please Provide a valid PIN.']);

        }


        elseif ($iprestriction != null) {
            $ips = explode(",", $iprestriction);
            if(in_array($ip, $ips) == false) {
                return redirect()->back()->with(['error' => 'Whoops! You are not allowed to sign in from outside university network.']);

            }
        }
        else

            foreach($request->attendee_id as $attendee_id){
                $session_id = TimeTable::where('pin', $pin)->value('id');
                $attendance = new Attendance();
                $attendance->session_id = $session_id;
                $attendance->attendee_id = $attendee_id;
                $attendance->status = $status;

                $attendance->save();
            }


        return redirect()->back()->with(['message' => 'Successfully Signed!']);
    }

    // Absent Attendance
    public function postAbsentAttendance(Request $request)
    {
        /*  $this->validate($request, [
              //'session_id' => 'required|max:120',
              'attendee_id' => 'required|max:120',
              'pin' => 'required|max:120',
          ]);*/

        $ses = Attendance::pluck('session_id');
        $attendee = Attendance::pluck('attendee_id');

        $pin = $request['pin'];
        //$session_id = TimeTable::where('pin', $pin)->value('id');

        //Taking module ID from timetable table which corresponds to specific session/pin.
        $module_id = TimeTable::where('pin', $pin)->value('module_id');

        //Taking Student ID from Enrolment module which Corresponds to specific module if
        $attendee_id = Enrolment::where('module_id', $module_id)->pluck('student_id');
        //$attendee_id = $request['attendee_id'];
        $status = $request['status'];
        foreach ($attendee_id as $attendee_id) {

            $session_id = TimeTable::where('pin', $pin)->value('id');

                /*$attendance = new Attendance();

            $attendance->session_id = $session_id;
                $attendance->attendee_id = $attendee_id;
                $attendance->status = $status;
                $attendance->save();*/

            $attendance = Attendance::firstOrCreate(['attendee_id' => $attendee_id , 'session_id' => $session_id],
                ['session_id' => $session_id, 'attendee_id' => $attendee_id, 'status' => '0']);

        }
        return redirect()->back()->with(['message' => 'Successfully Completed!']);


        /*$ip = $request->ip();
        // ip resriction
        $iprestriction = table::settings()->value('ip');

        if ($session_id == null) {
            return redirect()->back()->with(['error' => 'Sign in Failed! Please Provide a valid PIN.']);

        }


        elseif ($iprestriction != null) {
            $ips = explode(",", $iprestriction);
            if(in_array($ip, $ips) == false) {
                return redirect()->back()->with(['error' => 'Whoops! You are not allowed to sign in from outside university network.']);

            }
        }
        else*/


    }

}
