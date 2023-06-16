<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\AutoMailReply;


class TestingEmailController extends Controller
{
    //
    public function testingemail(){
        $userEmail = DB::table('users')
        ->select('email')
        ->where('verify','=',0)
        ->where('sendEmail','=',0)
        ->get();
        // ->get(columns:['email']);

        $countingmail = count($userEmail);
        $dataDecode = json_decode($userEmail, true);
        if($countingmail > 0){
            foreach($dataDecode as $d){
                foreach($d as $k=>$v) {
                    // echo $v;
                    $replyDetails = [
                        'title' => 'Your account is verified.',
                        'body' => ('login to https://blockage.crflood.com/login'),
                        'replyback' => "Do not reply this email"
                    ];
            
                    Mail::to($v) -> send(new AutoMailReply($replyDetails));
                    DB::table('users')->where('email','=', $v)->update(['sendEmail' => 1]);
                    DB::table('users')->where('email','=', $v)->update(['verify' => 1]);
                }
            }
        //    echo "Success sent e-mail and update sendEmail to 1.";
           return redirect('/usersverify');
        }else{
            // echo "all e-mail alreadly verified.";
            return redirect('/usersverify');
        }
    }


    public function sendingEmailByPerUser($updateByEmail){

        $replyDetails = [
            'title' => ('Your account is verified.'),
            'body' => ('login to https://blockage.crflood.com/login'),
            'replyback' => ("Do not reply this email")
        ];

        DB::table('users')->where('email','=',$updateByEmail)->update(['sendEmail' =>1 ]);
        DB::table('users')->where('email','=',$updateByEmail)->update(['verify' =>1 ]);
        Mail::to($updateByEmail) -> send(new AutoMailReply($replyDetails));

        // echo ("verified email ".$updateByEmail);
        return redirect('/usersverify');
    }
}
