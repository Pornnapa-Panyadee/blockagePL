<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Blockage;
use App\Page;
use App\River;
use App\BlockageCrossection;
use App\ProblemDetail;
use App\Solution;
use App\Project;
use App\User;
use App\BlockageLocation;
use App\Photo;
use App\ChangeLogs;
use App\Expert;
use Auth;


class PagesController extends Controller
{
    // public function __construct()
    //   {
    //       $this->middleware('auth');
    //   }
  
    public function indexdistrict(){

        // Fetch departments
        $districtData['data'] = Page::getDistrict();
       // dd($districtData['data']);
        // Load index view
        return view('indexdistrict')->with("districtData",$districtData);
        
      }

      public function formblockage($uid){
        // dd($uid);
        // Fetch departments
        
        $user = \App\Blockage::where('blk_id', $uid)->value('blk_user_id');
        // dd(User::find($user));
        $userId = auth()->user()->id;
        // dd($userId);
        if($user != $userId) return view('auth.login');
        $districtData['data'] = Page::getDistrict();
        $river = River::where('river_id', str_replace("B", "R", $uid))->get();
        // dd($river);
        //$json = file_get_contents('http://localhost/chiang-rai/public/getBlockageID/' . $uid);
       
        $json = file_get_contents('https://cmblockage.cmfightflood.com/getBlockageID/'.$uid);
        $obj = json_decode($json);
        $id = 0;
        // dd($obj[0]);
        $temp = BlockageCrossection::where('blk_id', $uid)->value('past');
        $blk_crossection_past = json_decode($temp);
        $temp = BlockageCrossection::where('blk_id', $uid)->value('current_start');
        $blk_crossection_current_start = json_decode($temp);
        $temp = BlockageCrossection::where('blk_id', $uid)->value('current_narrow');
        $blk_crossection_current_narrow = json_decode($temp);
        $temp = BlockageCrossection::where('blk_id', $uid)->value('current_end');
        $blk_crossection_current_end = json_decode($temp);
        $temp = BlockageCrossection::where('blk_id', $uid)->value('current_brigde');
        $blk_crossection_current_brigde = json_decode($temp);


        $blk_damage_level = json_decode($obj[0]->damage_level);
        $blk_project = \App\Project::where('proj_id', str_replace("B", "PJ", $uid))->get();
        $ProblemDetail = ProblemDetail::where('blk_id', $uid)->get();
        // dd($river);
        // dd($blk_crossection_current_brigde);
        // Load index view
        return view('form_blockage',[
          'river' => $river,
          'obj' => $obj,
          'id' => $id,
          'blk_crossection_past' => $blk_crossection_past,
          'blk_crossection_current_start' => $blk_crossection_current_start,
          'blk_crossection_current_narrow' => $blk_crossection_current_narrow,
          'blk_crossection_current_end' => $blk_crossection_current_end,
          'blk_crossection_current_brigde'=>$blk_crossection_current_brigde,
          'blk_problem_detail' => $ProblemDetail,
          'uid' => $uid,
          'blk_damage_level' => $blk_damage_level,
          'blk_project' => $blk_project[0],

        ])->with("districtData",$districtData);
        
      }

      public function newFormblockage(User $user){

        // dd(Auth::user()->id);
        $data = DB::table('advice')->select('details','desc','method')->get();
        $data_json = json_decode($data, true);

        // F110
        $detailsAdviceF110 = $data_json[0]['details'];
        $descAdviceF110 = $data_json[0]['desc'];
        $methodAdviceF110 = $data_json[0]['method'];

        //F121
        $detailsAdviceF121 = $data_json[1]['details'];
 
        //F122
        $detailsAdviceF122 = $data_json[2]['details'];
        $descAdviceF122 = $data_json[2]['desc'];
        $methodAdviceF122 = $data_json[2]['method'];

        //F123
        $detailsAdviceF123 = $data_json[3]['details'];
        $descAdviceF123 = $data_json[3]['desc'];
        $methodAdviceF123 = $data_json[3]['method'];

        //F130
        $detailsAdviceF130 = $data_json[4]['details'];
        $descAdviceF130 = $data_json[4]['desc'];
        $methodAdviceF130 = $data_json[4]['method'];

        //F140
        $detailsAdviceF140 = $data_json[5]['details'];
        $descAdviceF140 = $data_json[5]['desc'];
        $methodAdviceF140 = $data_json[5]['method'];

        //F141
        $detailsAdviceF141 = $data_json[6]['details'];
        $descAdviceF141 = $data_json[6]['desc'];
        $methodAdviceF141 = $data_json[6]['method'];

        //F142
        $detailsAdviceF142 = $data_json[7]['details'];
        $descAdviceF142 = $data_json[7]['desc'];
        $methodAdviceF142 = $data_json[7]['method'];

        //F143
        $detailsAdviceF143 = $data_json[8]['details'];
        $descAdviceF143 = $data_json[8]['desc'];
        $methodAdviceF143 = $data_json[8]['method'];

        //F150
        $detailsAdviceF150 = $data_json[9]['details'];
        $descAdviceF150 = $data_json[9]['desc'];
        $methodAdviceF150 = $data_json[9]['method'];

        //F200
        $detailsAdviceF200 = $data_json[10]['details'];
        $descAdviceF200 = $data_json[10]['desc'];
        $methodAdviceF200 = $data_json[10]['method'];

        //F210
        $detailsAdviceF210 = $data_json[11]['details'];
        $descAdviceF210 = $data_json[11]['desc'];
        $methodAdviceF210 = $data_json[11]['method'];

        //F211
        $detailsAdviceF211 = $data_json[12]['details'];
        $descAdviceF211 = $data_json[12]['desc'];
        $methodAdviceF211 = $data_json[12]['method'];

        //F212
        $detailsAdviceF222 = $data_json[13]['details'];
        $descAdviceF222 = $data_json[13]['desc'];
        $methodAdviceF222 = $data_json[13]['method'];

        //F220
        $detailsAdviceF220 = $data_json[14]['details'];
        $descAdviceF220 = $data_json[14]['desc'];
        $methodAdviceF220 = $data_json[14]['method'];

        //F300
        $detailsAdviceF300 = $data_json[15]['details'];
 
        //F310
        $detailsAdviceF310 = $data_json[16]['details'];
        $descAdviceF310 = $data_json[16]['desc'];
        $methodAdviceF310 = $data_json[16]['method'];

        //F311
        $detailsAdviceF311 = $data_json[17]['details'];
        $descAdviceF311 = $data_json[17]['desc'];
        $methodAdviceF311 = $data_json[17]['method'];

        //F312
        $detailsAdviceF312 = $data_json[18]['details'];
        $descAdviceF312 = $data_json[18]['desc'];
        $methodAdviceF312 = $data_json[18]['method'];

        //F320
        $detailsAdviceF320 = $data_json[19]['details'];
        $descAdviceF320 = $data_json[19]['desc'];
        $methodAdviceF320 = $data_json[19]['method'];

        //F400
        $detailsAdviceF400 = $data_json[20]['details'];
        $descAdviceF400 = $data_json[20]['desc'];
        $methodAdviceF400 = $data_json[20]['method'];

        //F410
        $detailsAdviceF410 = $data_json[21]['details'];
        $descAdviceF410 = $data_json[21]['desc'];
        $methodAdviceF410 = $data_json[21]['method'];

        //F420
        $detailsAdviceF420 = $data_json[22]['details'];
        $descAdviceF420 = $data_json[22]['desc'];
        $methodAdviceF420 = $data_json[22]['method'];

        //F500
        $detailsAdviceF500 = $data_json[23]['details'];
        $descAdviceF500 = $data_json[23]['desc'];
        $methodAdviceF500 = $data_json[23]['method'];

        //F124 
        $detailsAdviceF124 = $data_json[24]['details'];
        $descAdviceF124 = $data_json[24]['desc'];
        $methodAdviceF124 = $data_json[24]['method'];      

        $districtData['data'] = Page::getDistrict();
        if(Auth::user()->status_work=="surveyor1"){
          return view('new_form_blockage_survery', 
          compact(
            ['districtData','detailsAdviceF110', 'descAdviceF110', 'methodAdviceF110', 'detailsAdviceF121', 'detailsAdviceF122', 
            'descAdviceF122',  'methodAdviceF122', 'detailsAdviceF123', 'descAdviceF123', 'methodAdviceF123','detailsAdviceF130', 'descAdviceF130','methodAdviceF130',
            'detailsAdviceF140', 'descAdviceF140', 'methodAdviceF140', 'detailsAdviceF141', 'descAdviceF141', 'methodAdviceF141', 'detailsAdviceF142', 'descAdviceF142',
            'methodAdviceF142', 'detailsAdviceF143', 'descAdviceF143', 'methodAdviceF143','detailsAdviceF150', 'descAdviceF150', 'methodAdviceF150', 'detailsAdviceF200',
            'descAdviceF200', 'methodAdviceF200', 'detailsAdviceF210', 'descAdviceF210','methodAdviceF210', 'detailsAdviceF211','descAdviceF211', 'methodAdviceF211', 'detailsAdviceF222', 
            'descAdviceF222', 'methodAdviceF222',  'detailsAdviceF220', 'descAdviceF220', 'methodAdviceF220', 'detailsAdviceF300', 'detailsAdviceF310', 'descAdviceF310', 'methodAdviceF310',
            'detailsAdviceF311','descAdviceF311', 'methodAdviceF311', 'detailsAdviceF312', 'descAdviceF312','methodAdviceF312','detailsAdviceF320','descAdviceF320',
            'methodAdviceF320', 'detailsAdviceF400','descAdviceF400', 'methodAdviceF400','detailsAdviceF410', 'descAdviceF410', 'methodAdviceF410','detailsAdviceF420', 
            'descAdviceF420','methodAdviceF420','detailsAdviceF500', 'descAdviceF500','methodAdviceF500','detailsAdviceF124','descAdviceF124','methodAdviceF124']
          ));
      
        }else{
          return view('new_form_blockage', 
          compact(
            ['districtData','detailsAdviceF110', 'descAdviceF110', 'methodAdviceF110', 'detailsAdviceF121', 'detailsAdviceF122', 
            'descAdviceF122',  'methodAdviceF122', 'detailsAdviceF123', 'descAdviceF123', 'methodAdviceF123','detailsAdviceF130', 'descAdviceF130','methodAdviceF130',
            'detailsAdviceF140', 'descAdviceF140', 'methodAdviceF140', 'detailsAdviceF141', 'descAdviceF141', 'methodAdviceF141', 'detailsAdviceF142', 'descAdviceF142',
            'methodAdviceF142', 'detailsAdviceF143', 'descAdviceF143', 'methodAdviceF143','detailsAdviceF150', 'descAdviceF150', 'methodAdviceF150', 'detailsAdviceF200',
            'descAdviceF200', 'methodAdviceF200', 'detailsAdviceF210', 'descAdviceF210','methodAdviceF210', 'detailsAdviceF211','descAdviceF211', 'methodAdviceF211', 'detailsAdviceF222', 
            'descAdviceF222', 'methodAdviceF222',  'detailsAdviceF220', 'descAdviceF220', 'methodAdviceF220', 'detailsAdviceF300', 'detailsAdviceF310', 'descAdviceF310', 'methodAdviceF310',
            'detailsAdviceF311','descAdviceF311', 'methodAdviceF311', 'detailsAdviceF312', 'descAdviceF312','methodAdviceF312','detailsAdviceF320','descAdviceF320',
            'methodAdviceF320', 'detailsAdviceF400','descAdviceF400', 'methodAdviceF400','detailsAdviceF410', 'descAdviceF410', 'methodAdviceF410','detailsAdviceF420', 
            'descAdviceF420','methodAdviceF420','detailsAdviceF500', 'descAdviceF500','methodAdviceF500','detailsAdviceF124','descAdviceF124','methodAdviceF124']
          ));

        }
        return view('new_form_blockage', 
          compact(
            ['districtData', 
            'detailsAdviceF110', 
            'descAdviceF110', 
            'methodAdviceF110',
            'detailsAdviceF121',
            'detailsAdviceF122',
            'descAdviceF122',
            'methodAdviceF122',
            'detailsAdviceF123',
            'descAdviceF123',
            'methodAdviceF123',
            'detailsAdviceF130',
            'descAdviceF130',
            'methodAdviceF130',
            'detailsAdviceF140',
            'descAdviceF140',
            'methodAdviceF140',
            'detailsAdviceF141',
            'descAdviceF141',
            'methodAdviceF141',
            'detailsAdviceF142',
            'descAdviceF142',
            'methodAdviceF142',
            'detailsAdviceF143',
            'descAdviceF143',
            'methodAdviceF143',
            'detailsAdviceF150',
            'descAdviceF150',
            'methodAdviceF150',
            'detailsAdviceF200',
            'descAdviceF200',
            'methodAdviceF200',
            'detailsAdviceF210',
            'descAdviceF210',
            'methodAdviceF210',
            'detailsAdviceF211',
            'descAdviceF211',
            'methodAdviceF211',
            'detailsAdviceF222',
            'descAdviceF222',
            'methodAdviceF222',
            'detailsAdviceF220',
            'descAdviceF220',
            'methodAdviceF220',
            'detailsAdviceF300',
            'detailsAdviceF310',
            'descAdviceF310',
            'methodAdviceF310',
            'detailsAdviceF311',
            'descAdviceF311',
            'methodAdviceF311',
            'detailsAdviceF312',
            'descAdviceF312',
            'methodAdviceF312',
            'detailsAdviceF320',
            'descAdviceF320',
            'methodAdviceF320',
            'detailsAdviceF400',
            'descAdviceF400',
            'methodAdviceF400',
            'detailsAdviceF410',
            'descAdviceF410',
            'methodAdviceF410',
            'detailsAdviceF420',
            'descAdviceF420',
            'methodAdviceF420',
            'detailsAdviceF500',
            'descAdviceF500',
            'methodAdviceF500',
            'detailsAdviceF124','descAdviceF124','methodAdviceF124']
          ));
      }
      
      // Fetch district
    public function getDistrict($vill_provinceid=0){

      // Fetch Employees by Departmentid
      $userData['data'] = Page::getprovinceDistrict($vill_provinceid);        
      echo json_encode($userData);
      exit;
    }

     // Fetch tumbol
    public function getTumbol($vill_districtid=0){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: *');
        header('Access-Control-Allow-Headers: *');
        // Fetch Employees by Departmentid
        $userData['data'] = Page::getdistrictTumbol($vill_districtid);        
        echo json_encode($userData);
        exit;
    }

     // Fetch rvillage
     public function getVillage($vill_tumbolid=0){

        // Fetch Employees by Departmentid
        $userVill['data'] = Page::gettumbolVillage($vill_tumbolid); 

        echo json_encode($userVill);
        exit;
    }

    //test edit page
    public function editblockage($uid){
      // dd($uid);
      // Fetch departments
      $data =  Blockage::with('blockageLocation','blockageCrossection','River','Solution','Photo')->where('blk_id', $uid)->get();
      $expert=Expert::where('blk_id', $data[0]->blk_id)->get();
  
      $user = \App\Blockage::where('blk_id', $uid)->value('blk_user_id');
      $userId = auth()->user()->id;
      $admin= auth()->user()->name;
      $status= auth()->user()->status_work;
      //dd($admin);
  
      // dd($userId);
      if(($user != $userId) && ($admin!="admin") && ($status!= "expert")) return view('auth.login');

      $districtData['data'] = Page::getDistrict();
      $river = River::where('river_id',$data[0]->river_id )->get();
      $json = file_get_contents('https://cmblockage.cmfightflood.com/getBlockageID/'.$uid);
      $obj = json_decode($json);

      // dd($obj); 
      $damage_type = json_decode($obj[0]->damage_type);
      $damage_level = json_decode($obj[0]->damage_level);
      // dd($damage_type);
      $id = 0;
      // dd($obj[0]);
      $temp = BlockageCrossection::where('blk_id', $uid)->value('past');
      $blk_crossection_past = json_decode($temp);
      $temp = BlockageCrossection::where('blk_id', $uid)->value('current_start');
      $blk_crossection_current_start = json_decode($temp);
      $temp = BlockageCrossection::where('blk_id', $uid)->value('current_narrow');
      $blk_crossection_current_narrow = json_decode($temp);
      $temp = BlockageCrossection::where('blk_id', $uid)->value('current_end');
      $blk_crossection_current_end = json_decode($temp);
      $temp = BlockageCrossection::where('blk_id', $uid)->value('current_brigde');
      $blk_crossection_current_brigde = json_decode($temp);
     
         
      if($obj[0]->blk_length_type=="มากกว่า 1 กิโลเมตร"||$obj[0]->blk_length_type=="น้อยกว่า 10 เมตร"){
        $len_prob_value_btw="-- ระบุระยะ --";
        $len_prob_value=$obj[0]->blk_length;
        if($obj[0]->blk_length_type=="น้อยกว่า 10 เมตร"){
          $len_prob_value="-- ระบุระยะมากกว่า 1 กม.--";
        }
      }else{
        $len_prob_value_btw=$obj[0]->blk_length;
        $len_prob_value="-- ระบุระยะมากกว่า 1 กม.--";
      }
      $blk_damage_level = json_decode($obj[0]->damage_level);
      $blk_project = \App\Project::where('proj_id', str_replace("B", "PJ", $uid))->get();
      $ProblemDetail = ProblemDetail::where('blk_id', $uid)->get();
      $solution_id=Solution::where('sol_id',$obj[0]->sol_id)->get();
      $project_id=Project::where('proj_id',$solution_id[0]->proj_id)->get();

      // dd($uid);
      // dd($project_id);
      if($project_id[0]->proj_status=="plan"){
        $proj =[
          'proj_status'=>$project_id[0]->proj_status,
          'proj_year'=> $project_id[0]->proj_year,
          'proj_name_plan' => $project_id[0]->proj_char,
          'proj_budget_plan' => $project_id[0]->proj_budget,
          'proj_name_rev'=>NULL,
          'proj_budget_rev'=>NULL
        ];
      }else if($project_id[0]->proj_status=="received"){
        $proj =[
          'proj_status'=>$project_id[0]->proj_status,
          'proj_year'=> NULL,
          'proj_name_plan' => NULL,
          'proj_budget_plan' => NULL,
          'proj_name_rev'=>$project_id[0]->proj_char,
          'proj_budget_rev'=>$project_id[0]->proj_budget
        ];

      }else{
        $proj =[
          'proj_status'=>$project_id[0]->proj_status,
          'proj_year'=> NULL,
          'proj_name_plan' => NULL,
          'proj_budget_plan' => NULL,
          'proj_name_rev'=>NULL,
          'proj_budget_rev'=>NULL
        ];

      }
      // dd($expert);
      // Load index view
      // dd($ProblemDetail[0]->nat_weed_detail);
      if(Auth::user()->status_work=="surveyor1"){
        return view('edit_form_blockage_survey',[
          'river' => $river,
          'obj' => $obj,
          'id' => $id,
          'blk_crossection_past' => $blk_crossection_past,
          'blk_crossection_current_start' => $blk_crossection_current_start,
          'blk_crossection_current_narrow' => $blk_crossection_current_narrow,
          'blk_crossection_current_end' => $blk_crossection_current_end,
          'blk_crossection_current_brigde'=>$blk_crossection_current_brigde,
          'blk_problem_detail' => $ProblemDetail,
          'uid' => $uid,
          'blk_damage_level' => $blk_damage_level,
          // 'blk_project' => $blk_project[0],   
          'solution'=>$solution_id ,
          'project'=>$proj ,
          'len_prob_value'=>$len_prob_value,
          'len_prob_value_btw' => $len_prob_value_btw,
          'damage_type'=>$damage_type,
          'damage_level'=>$damage_level,
          'expert'=>$expert
  
        ])->with("districtData",$districtData);
      }else{
        return view('edit_form_blockage',[
          'river' => $river,
          'obj' => $obj,
          'id' => $id,
          'blk_crossection_past' => $blk_crossection_past,
          'blk_crossection_current_start' => $blk_crossection_current_start,
          'blk_crossection_current_narrow' => $blk_crossection_current_narrow,
          'blk_crossection_current_end' => $blk_crossection_current_end,
          'blk_crossection_current_brigde'=>$blk_crossection_current_brigde,
          'blk_problem_detail' => $ProblemDetail,
          'uid' => $uid,
          'blk_damage_level' => $blk_damage_level,
          // 'blk_project' => $blk_project[0],   
          'solution'=>$solution_id ,
          'project'=>$proj ,
          'len_prob_value'=>$len_prob_value,
          'len_prob_value_btw' => $len_prob_value_btw,
          'damage_type'=>$damage_type,
          'damage_level'=>$damage_level,
          'expert'=>$expert
  
        ])->with("districtData",$districtData);

      }
     
     
    }

    
}
