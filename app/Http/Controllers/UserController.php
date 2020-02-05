<?php
namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function getDashboard()
    {
        return view('dashboard');
    }

    public function getChangePassword()
    {
        return view('changePassword');
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

        return redirect()->route('dashboard')->with(['message' => 'Successfully Added!']);

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

        return redirect()->back()->with(['message' => 'Successfully Added!']);
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

        return redirect()->back()->with(['message' => 'Successfully Added!']);
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

        return redirect()->back()->with(['message' => 'Successfully Added!']);
    }


    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }
}
