<?php

namespace App\Http\Controllers;
use App\TimeTable;
use App\Attendance;
use App\User;
use App\Role;
use App\Module;
use App\Locations;
use App\Enrolment;
use Illuminate\Http\Request;

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
        //$session_id = TimeTable::where('pin', $pin)->value('id');
        //$session_id = $request['session_id'];
        $attendee_id = $request['attendee_id'];
        $status = $request['status'];
try{
    $session_id = TimeTable::where('pin', $pin)->value('id');
}
catch (\ErrorException $error){

}


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
}
