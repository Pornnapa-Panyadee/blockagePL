<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ChatBotPopupController extends Controller
{
    // API F110 
    function adviceF110(){

        $data = DB::table('advice')
        ->where('id','=',"F110")
        ->get(columns:['details', 'desc', 'method']);
        $data_json = json_decode($data, true);

        $detailsAdviceF110 = $data_json[0]['details'];
        $descAdviceF110 = $data_json[0]['desc'];
        $methodAdviceF110 = $data_json[0]['method'];
 
        return view('new_form_blockage', compact(['detailsAdviceF110', 'descAdviceF110', 'methodAdviceF110']));
    }


}
