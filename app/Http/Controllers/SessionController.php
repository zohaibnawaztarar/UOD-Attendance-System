<?php
namespace App\Http\Controllers;

use App\User;
use App\Role;
use APP\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{

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

        return redirect()->back()->with->with(['message' => 'Successfully added!']);
    }


}
