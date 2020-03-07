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
}
