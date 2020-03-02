<?php
namespace App\Http\Controllers;

use App\Enrolment;
use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use mysql_xdevapi\Session;

class EnrolmentController extends Controller
{
    public function getViewEnroll()
    {
        $enrolled = Enrolment::all();

        return view('disenrollStudents', ['enrolled' => $enrolled ]);
    }

    public function getDeleteEnrolled ($enrolled_id)
    {
        $session = Enrolment::where('id', $enrolled_id)->first();
        $session->delete();
        return redirect()->back()->with(['message' => 'Successfully deleted!']);
    }






}
