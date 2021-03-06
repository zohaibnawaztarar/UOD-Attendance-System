<?php
namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Module;
use App\Locations;
use App\TimeTable;
use App\Enrolment;
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

    public function getAddSessionPage()
    {
        return view('addSession');
    }

    public function getStudentPage()
    {
        return view('students');
    }
// this gets all users from system
   /* public function getSystemAdminPage()
    {
        $users = User::all();
        return view('systemAdmin', ['users' => $users]);
    }*/

    // Only gets the users with school Admin roles
    public function getSystemAdminPage()
    {
        $users = User::whereHas('roles', function($q){
        $q->where('name', 'School Admin');
    })->get();
        return view('systemAdmin', ['users' => $users]);
    }

    // Only gets the users with school Admin roles
    public function getDeleteLecturersPage()
    {
        $users = User::whereHas('roles', function($q){
            $q->where('name', 'Lecturer');
        })->get();
        return view('deleteLecturers', ['users' => $users]);
    }

    public function getAddSchoolStaff()
    {
        $users = User::all();
        return view('addSchoolStaff', ['users' => $users]);
    }

    public function getDeleteModule()
    {
        $modules = Module::all();
        return view('deleteModule', ['modules' => $modules]);
    }

    public function getSchoolAdminPage()
    {

        return view('schoolAdmin');
    }

    public function getAddModulePage()
    {

        return view('addModule');
    }

    public function getAddLocationPage()
    {
        $locations = Locations::all();
        return view('addLocation', ['locations' => $locations]);
    }

    public function getDeleteLocation()
    {
        $locations = Locations::all();
        return view('deleteLocation', ['locations' => $locations]);
    }

    public function getDeletelocationdb ($location_id)
    {
        $location = locations::where('id', $location_id)->first();
        $location->delete();
        return redirect()->back()->with(['message' => 'Successfully deleted!']);
    }

    public function getaddLecturer()
    {
        $users = User::all();
        return view('addLecturer', ['users' => $users]);
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


    public function getDeleteStaff ($user_id)
    {
        $user = user::where('id', $user_id)->first();
        $user->delete();
        return redirect()->back()->with(['message' => 'Successfully deleted!']);
    }



    public function getDeleteModuledb ($module_id)
    {
        $module = module::where('id', $module_id)->first();
        $module->delete();
        return redirect()->back()->with(['message' => 'Successfully deleted!']);
    }

    public function getAddSessions()
    {
        $sessions = TimeTable::all();
        return view('addSession', ['sessions' => $sessions]);
        $modules = module::all();
        $module = module::where('id', $module_id)->first();
        //$teacher = User::whereHas('roles', function($q){$q->whereIn('role_id', ['2']);})->get();

        return view('addSession', ['modules' => $modules] );
        /*$teachers = User::whereHas('roles', function($q){
            $q->where('name', 'Lecturer');
        })->get();*/
        /*$teachers = User::all();
        return view('addSession',  ['teachers' => $teachers] );*/
    }

    public function getModuleLocation()
    {
        $modules = Module::all();
        $locations = Locations::all();
        /*$teachers = User::whereHas('roles', function($q){
            $q->where('name', 'Lecturer');
        })->get();*/



        //return view('addSession',  ['teachers' => $teachers] );
        $teachers = User::whereHas('roles', function($q){
            $q->where('name', 'Lecturer');
        })->get();
        return view('addSession', ['modules' => $modules], ['locations' => $locations, 'teachers' => $teachers]);




    }



    public function getModuleStudents()
    {
        $modules = Module::all();
        //$students = User::all();
        $students = User::whereHas('roles', function($q){$q->whereIn('role_id', ['1']);})->get();
        return view('moduleEnrolment', ['modules' => $modules], ['students' => $students]);


    }



}
