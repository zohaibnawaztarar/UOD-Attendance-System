<?php
namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getDashboard()
    {
        return view('dashboard');
    }

    public function getRegister()
    {
        return view('register');
    }
    public function postSignUp(Request $request)
    {
        $this->validate($request, [
           'email' => 'required|email|unique:users',
            'first_name' => 'required|max:120',
            'last_name' => 'required|max:120',
            'password' => 'required|min:6'
        ]);
        $email = $request['email'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->password = $password;

        $user->save();
        $user->roles()->attach(Role::where('name', 'Student')->first());

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function postSchoolStaff(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:120',
            'last_name' => 'required|max:120',
            'password' => 'required|min:6'
        ]);
        $email = $request['email'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->password = $password;

        $user->save();
        $user->roles()->attach(Role::where('name', 'School Admin')->first());

       // Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function postLecturer(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'first_name' => 'required|max:120',
            'last_name' => 'required|max:120',
            'password' => 'required|min:6'
        ]);
        $email = $request['email'];
        $first_name = $request['first_name'];
        $last_name = $request['last_name'];
        $password = bcrypt($request['password']);

        $user = new User();
        $user->email = $email;
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->password = $password;

        $user->save();
        $user->roles()->attach(Role::where('name', 'Lecturer')->first());

        // Auth::login($user);

        return redirect()->route('dashboard');
    }

    public function postSignIn(Request $request)
    {

           $this->validate($request, [
              'email' => 'required',
               'password' => 'required'
           ]);

        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']])){
            return redirect()->route('dashboard');
        }
        return redirect()->back();
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function postModule(Request $request)
    {
        $this->validate($request, [
            'moduleCode' => 'required|max:120',
            'name' => 'required|max:120',
        ]);
        $moduleCode = $request['moduleCode'];
        $name = $request['name'];


        $module = new Module();
        $module->moduleCode = $moduleCode;
        $module->name = $name;


        $module->save();
        // $user->roles()->attach(Role::where('name', 'Student')->first());

        //Auth::login($user);

        return redirect()->route('dashboard');
    }
}
