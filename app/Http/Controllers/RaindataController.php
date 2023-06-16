<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RaindataController extends Controller
{
    public function getIDF($amp=0){
        clearstatcache();
        $amp_name="images/rain/".$amp.".jpg";
        if(@is_array(getimagesize($amp_name))){ $has_file=1;}
        else{ $has_file=0; }
        
        // dd($amp);
        return view('rain/showrain',compact('amp_name','amp','has_file'));

    }

    public function getDDF($amp=0){
        clearstatcache();
        $amp_name="images/rain/ddf/".$amp.".jpg";
        if(@is_array(getimagesize($amp_name))){ $has_file=1;}
        else{ $has_file=0; }
        
        // dd($amp);
        return view('rain/showrain_ddf',compact('amp_name','amp','has_file'));

    }
}
