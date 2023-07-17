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
        $districtData['data'] = Page::getDistrictLP();
        // dd($districtData);
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
       
        $json = file_get_contents('https://watercenter.scmc.cmu.ac.th/blockage/jang_basin/getBlockageID/'.$uid);
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
        
        $districtData['data'] = Page::getDistrict();
        // dd($districtData['data'][0]->vill_district);
        return view('new_form_blockage', 
          compact(
            ['districtData']
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
      $json = file_get_contents('https://watercenter.scmc.cmu.ac.th/blockage/jang_basin/getBlockageID/'.$uid);
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
