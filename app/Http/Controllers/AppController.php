<?php
namespace App\Http\Controllers;
use App\User;
use App\Role;
use Illuminate\Http\Request;
class AppController extends Controller
{
    public function getIndex()
    {
        return view('home');
    }

    public function getLecturerPage()
    {
        return view('lecturers');
    }

    public function getStudentPage()
    {
        return view('students');
    }

    public function getSystemAdminPage()
    {
        $users = User::all();
        return view('systemAdmin', ['users' => $users]);
    }

    public function getSchoolAdminPage()
    {

        return view('schoolAdmin');
    }

    public function postAdminAssignRoles(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if ($request['role_student']) {
            $user->roles()->attach(Role::where('name', 'Student')->first());
        }
        if ($request['role_lecturer']) {
            $user->roles()->attach(Role::where('name', 'Lecturer')->first());
        }
        if ($request['role_schoolAdmin']) {
            $user->roles()->attach(Role::where('name', 'School Admin')->first());
        }
        return redirect()->back();
    }


}