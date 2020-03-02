<?php
namespace App\Http\Controllers;

use App\TimeTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;

class SessionController extends Controller
{
    public function getViewSession()
    {
        $lec = TimeTable::all();
        return view('deleteSession', ['lec' => $lec]);
    }

    public function getDeleteSession ($lec_id)
    {
        $lec = TimeTable::where('id', $lec_id)->first();
        $lec->delete();
        return redirect()->back()->with(['message' => 'Successfully deleted!']);
    }

    public function getViewLec()
    {
        $lec = TimeTable::all();
        return view('lecturers', ['lec' => $lec]);
    }

    public function getStartSession ($lec_id)
    {
        $lec = TimeTable::where('id', $lec_id)->first();
        //$lec->delete();
        return view('QRlecturers', ['lec' => $lec]);
    }

    public function getViewQR()
    {
        $lec = TimeTable::all();
        return view('QRlecturers', ['lec' => $lec]);
    }


    /*public function postModule(Request $request)
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
    }*/





}
