<?php

namespace App\Http\Controllers;
use Illuminate\Cookie\Middleware\EncryptCookies;
use App\Mail\AutoMailForgot;
use Illuminate\Support\Facades\DB; 
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt; 

class SendPasswordForgetController extends Controller
{
    // Send mail forgot password user
    function forgetUserName($email){
        $element = DB::table("users")
        ->select('email', 'password')
        ->where('email','=', $email)
        ->get();
        
        $rePassword = "";
        $element_json = json_decode($element);
        $userMail = $element[0] -> email;
        $EncodePassword = $element_json[0]->password;
        $testDecode = Crypt::decrypt($EncodePassword);
        dd($testDecode);
        // try{
        //     $rePassword = Crypt::decryptString("$EncodePassword");
        // }catch(DecryptException $e){

        // }
        // dd($rePassword, $e);
        // dd($rePassword);

        // $decrypted = Crypt::decrypt($EncodePassword -> passsword);
        // dd($decrypted);

        $message = "";

        if(count($element) <= 0){
            $message = `Not found this email: $email `;
        }
        elseif(count($element) > 1){
            $message = "Ops something worng with your email contract admin.";
        }
        
    }
    
}
