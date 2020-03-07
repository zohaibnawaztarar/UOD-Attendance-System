<?php

namespace App\Http\Controllers;
use App\Classes\table;
use App\TimeTable;
use App\Attendance;
use App\User;
use App\Role;
use App\Module;
use App\Locations;
use App\Enrolment;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function postIp(Request $request)
    {

        $iprestriction = table::settings()->value('ip');
        $ipd = $request['ip'];

        if ($iprestriction != null && $ipd != null) {

            $ip = $request->ip;



            table::settings()
                ->where('id', 1)
                ->update([

                    'ip' => $ip,
                ]);

            return redirect()->back()->with(['message' => 'Successfully Updated!']);
        }
        elseif ($ipd == null && $iprestriction != null ) {
            $tst = Setting::where('id', 1)->first();
            $tst->delete();
            return redirect()->back()->with(['message' => 'Successfully Updated!']);
        }

        elseif ($iprestriction == null && $ipd ==null){
            return redirect()->back()->with(['message' => 'Successfully Updated!']);
        }

        else

            $ip = $request['ip'];
        $setting = new Setting();

        $setting->ip = $ip;

        $setting->save();

        return redirect()->back()->with(['message' => 'Successfully Updated!']);
    }

    public function getViewSettings()
    {
        $settings = table::settings()->value('ip');
        return view('settings', ['settings' => $settings]);
    }
}
