<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManagmemntVerifyUserController extends Controller
{
    //
    public function managementVerifyusers(User $user){
 
        $name=Auth::user()->name ;
        $verify_status = Auth::user()->verify;
        // dd($name);
        if($name == "admin" && $verify_status == 1){
            $users_register = DB::table('users')->select('*')
            ->where('verify','=',0)
            ->get();
            $userRegisterJson = json_decode($users_register,true);
            // dd($userRegisterJson);

            $user_reportVerified =  DB::table('users')->select('*')
            ->where('verify', '=', 1)
            ->get();
            $userReportVerifiedJsosn = json_decode($user_reportVerified, true);

            return view('ManagementVerifyUser', compact('userRegisterJson', 'userReportVerifiedJsosn'));
        }
        else
        {   
            $massageNotic = "หากคุณต้องการเข้าหน้าเพจนี้ถึงกรุณา";
            return view('verifyMessage', compact('massageNotic'));
        }

        }
}



