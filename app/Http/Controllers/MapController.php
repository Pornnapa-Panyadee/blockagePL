<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlockageLocation;
use App\Blockage;
use App\BlockageCrossection;
use App\River;
use App\ProblemDetail;
use App\Solution;
use App\Project;
use DB;
use Auth;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use App\User;
ini_set("memory_limit","521M");
class MapController extends Controller
{
    public function map()
    {
        return view('form.map');
    }

    public function getBlockageMap() {
        $data = Blockage::with('blockageLocation','blockageCrossection','River','Solution','Photo')->get();
        //return response()->json($data);
       
        $result=[];
        $properties['time']=[];
        
        for ($i=0;$i<count($data);$i++){
            //$locationSt = new Point($request->latstart,$request->longstart);
            
            $point =($data[0]->blk_start_location);
            if($data[$i]->blockageLocation->blk_province=="เชียงใหม่"){
                $result[] = [
                    'id' => $data[$i]->blk_id,
                    'type' => "Feature",
                    'properties' => [
                        'time'=> date($data[$i]->updated_at),
                        'blk_code'=> $data[$i]->blk_code,
                        'blk_id'=>$data[$i]->blk_id,
                        'river'=>$data[$i]->River->river_name,
                        'location'=>$data[$i]->blockageLocation->blk_village,
                        'tambol'=> $data[$i]->blockageLocation->blk_tumbol , 
                        'district'=>$data[$i]->blockageLocation->blk_district ],
                        'geometry'=> $data[$i]->blockageLocation->blk_start_location
                ];
            }
                       
         }
        $test['type']="FeatureCollection";
        $test['features']=$result;
        //dd($test);
         $test = json_encode($test);
         echo $test;
        //return response()->json($data);
        
    }

    // Get Level Damage
    public function getMapByUser(User $user) {
        
        header('Access-Control-Allow-Origin: *');
        // dd($amp);
        $username = Auth::user()->name;
        function checkRisk($level,$fq){
            if($level=="มาก"){
                $l=3;
            }else if($level=="ปานกลาง"){
                $l=2;
            }else{
                $l=1;
            }

            if($fq=="ทุกปี"){
                $f=3;
            }else if($fq=="2-4 ปีครั้ง"){
                $f=2;
            }else{
                $f=1;
            }
            
            $cal=$l*$f;

            if($cal<3){
                return "น้อย";
            }
            else if($cal<6){
                return "ปานกลาง";
            }else{
                return "มาก";
            }
        }
        function checklevel($flood,$waste,$other) {
            if($flood!=NULL||$flood!=0){
                if($flood=="low"){
                    $level="น้อย";
                }else if( $flood=="medium"){
                    $level="ปานกลาง";
                }else if( $flood=="high") {
                    $level="มาก";
                }else{
                    $level=NULL;
                }
            }else if($waste!=NULL||$waste!=0){
                if($waste=="low"){
                    $level="น้อย";
                }else if( $waste=="medium"){
                    $level="ปานกลาง";
                }else if( $waste=="high") {
                    $level="มาก";
                }else{
                    $level=NULL;
                }

            }else if($other!=NULL||$other!=0){
                if($other=="low"){
                    $level="น้อย";
                }else if( $other=="medium"){
                    $level="ปานกลาง";
                }else if( $other=="high") {
                    $level="มาก";
                }else{
                    $level=NULL;
                }
            }
                return $level;
        }

        // $data = DB::table('blockage_locations')
        //         ->join('blockages', 'blockages.blk_location_id', '=', 'blockage_locations.blk_location_id')
        //         ->join('rivers', 'rivers.river_id', '=', 'blockages.river_id')
        //         ->where('blockages.blk_user_name', '=', $username)
        //         ->get(); 
        
        // $data = BlockageLocation::with('blockage','blockage.River')
        //         ->where('blockage.blk_user_name', '=', $username)
        //         ->get();
    
        $data = BlockageLocation::with('blockage','blockage.River')
                ->get();

        $result=[];
        $properties['time']=[];
        // dd($username);
        // for ($i=0;$i<count($data);$i++){
        for ($i=count($data)-10;$i<count($data);$i++){

            if($data[$i]->blockage->blk_user_name == $username){
                $fq = ProblemDetail::select('prob_level')->where ('problem_details.blk_id', $data[$i]->blockage->blk_id)->get();
              
                $damage=$data[$i]->blockage->damage_level;
                $damageData=json_decode($damage);
                $level=checklevel($damageData->flood,$damageData->waste,$damageData->other->level);
                $risk=checkRisk($level,$data[$i]->blockage->damage_frequency);

                    $result[] = [
                        'id' => $data[$i]->blockage->blk_id,
                        'time'=> date($data[$i]->blockage->updated_at),
                        'blk_code'=> $data[$i]->blockage->blk_code,
                        'blk_id'=>$data[$i]->blockage->blk_id,
                        'river'=>$data[$i]->blockage->River->river_name,
                        'location'=>$data[$i]->blk_village,
                        'tambol'=> $data[$i]->blk_tumbol , 
                        'district'=>$data[$i]->blk_district,
                        'geometry'=> $data[$i]->blk_start_location,
                        'level'=>$risk,
                        'status_approve'=>$data[$i]->blockage->status_approve];
             }
            
        }
    
         $result = json_encode($result);
         echo $result;
        
    }
    // Get Level Damage
    public function getDamage($amp=0) {
        header('Access-Control-Allow-Origin: *');
        // dd($amp);
        function checkRisk($level,$fq){
            if($level=="มาก"){ $l=3;} else if($level=="ปานกลาง"){$l=2;}else{ $l=1;}
            if($fq=="ทุกปี"){ $f=3;}else if($fq=="2-4 ปีครั้ง"){ $f=2;}else{ $f=1;}            
            $cal=$l*$f;
            if($cal<3){ return "น้อย"; } else if($cal<6){ return "ปานกลาง";}else{return "มาก";}
        }
        function checklevel($flood,$waste,$other) {
            if($flood!=NULL||$flood!=0){
                if($flood=="low"){
                    $level="น้อย";
                }else if( $flood=="medium"){
                    $level="ปานกลาง";
                }else if( $flood=="high") {
                    $level="มาก";
                }else{
                    $level=NULL;
                }
            }else if($waste!=NULL||$waste!=0){
                if($waste=="low"){
                    $level="น้อย";
                }else if( $waste=="medium"){
                    $level="ปานกลาง";
                }else if( $waste=="high") {
                    $level="มาก";
                }else{
                    $level=NULL;
                }

            }else if($other!=NULL||$other!=0){
                if($other=="low"){
                    $level="น้อย";
                }else if( $other=="medium"){
                    $level="ปานกลาง";
                }else if( $other=="high") {
                    $level="มาก";
                }else{
                    $level=NULL;
                }
            }
                return $level;
        }
        
        $data = BlockageLocation::with('blockage','blockage.River')->where('blk_district',$amp)->get();
       
        
        $result=[];
        $properties['time']=[];
        // dd($data[0]->blockage->status_approve);
        for ($i=0;$i<count($data);$i++){
            //$locationSt = new Point($request->latstart,$request->longstart);
            // if($data[$i]->blockage->status_approve=="2"){
                $fq = ProblemDetail::select('prob_level')->where ('problem_details.blk_id', $data[$i]->blockage->blk_id)->get();
                //dd($fq);
                // $point =($data[0]->blk_start_location);
                $damage=$data[$i]->blockage->damage_level;
                $damageData=json_decode($damage);
                //dd($damage);
                $level=checklevel($damageData->flood,$damageData->waste,$damageData->other->level);
                $risk=checkRisk($level,$data[$i]->blockage->damage_frequency);

                    $result[] = [
                        'id' => $data[$i]->blockage->blk_id,
                        'pin_status'=>$data[$i]->blockage->status_approve,
                        'time'=> date($data[$i]->blockage->updated_at),
                        'blk_code'=> $data[$i]->blockage->blk_code,
                        'blk_id'=>$data[$i]->blockage->blk_id,
                        'river'=>$data[$i]->blockage->River->river_name,
                        'location'=>$data[$i]->blk_village,
                        'tambol'=> $data[$i]->blk_tumbol , 
                        'district'=>$data[$i]->blk_district,
                        'geometry'=> $data[$i]->blk_start_location,
                        'level'=>$risk];
            //  }
            
        }

        // $test['type']="FeatureCollection";
        // $test['features']=$result;
    
         $result = json_encode($result);
         echo $result;
        //return response()->json($data);
        
    }
    // Backup  prob_level
    // public function getDamageByAmpG() {
    //     $amp=["ฝาง","ไชยปราการ","แม่อาย","ดอยหล่อ", "สะเมิง","สันกำแพง","สันทราย","สันป่าตอง","หางดง","เมืองเชียงใหม่","แม่ริม","แม่วาง","แม่ออน"];
    //     $level1=0;$level2=0;$level3=0;
    //     $ampL1=0;$ampL2=0;$ampL3=0;
    //     for($i=0;$i<count($amp);$i++){
    //         $data[$i] =DB::table('blockage_locations')
    //         ->join('blockages', 'blockage_locations.blk_location_id', '=', 'blockages.blk_location_id')
    //         ->join('problem_details', 'blockages.blk_id', '=', 'problem_details.blk_id')
    //         ->select('blockage_locations.blk_district',\DB::raw('count(problem_details.prob_level) as count'),'problem_details.prob_level')
    //         ->where ('blockage_locations.blk_district',$amp[$i])
    //         ->groupBy ('problem_details.prob_level')->get();
    //         $data[$i]->amp=$amp[$i];
    //         $data[$i]->level1=0;
    //         $data[$i]->level2=0;
    //         $data[$i]->level3=0;
    //         for($j=0;$j<count($data[$i]);$j++){
    //             if($data[$i][$j]->prob_level=="1-30%"){
    //                 $data[$i]->level1=$data[$i][$j]->count;
    //                 $ampL1=$ampL1+$data[$i]->level1;
    //             }else if($data[$i][$j]->prob_level=="30-70%"){
    //                 $data[$i]->level2=$data[$i][$j]->count;
    //                 $ampL2=$ampL2+$data[$i]->level2;
    //             }else if($data[$i][$j]->prob_level=="มากกว่า 70%"){
    //                 $data[$i]->level3=$data[$i][$j]->count;
    //                 $ampL3=$ampL3+ $data[$i]->level3;
    //             }
    //         }
         

    //     }
    //      return view('general.map', compact('data','ampL1','ampL2','ampL3'));
    // }

    public function getDamageByAmpG() {
        $amp=["เมืองลำปาง","เกาะคา","แม่ทะ","แม่เมาะ"];
        $amp_data= [];
        // dd($amp_data );
        $ampL1=0;$ampL2=0;$ampL3=0;
        function checkRisk($level,$fq){
            if($level=="มาก"){ $l=3;}
            else if($level=="ปานกลาง"){ $l=2;}
            else{$l=1; }
            if($fq=="ทุกปี"){ $f=3;}
            else if($fq=="2-4 ปีครั้ง"){ $f=2;}
            else{ $f=1; }
            $cal=$l*$f;

            if($cal<3){ return "น้อย";}
            else if($cal<6){return "ปานกลาง";}
            else{return "มาก";}
        }
        function checklevel($flood,$waste,$other) {
            if($flood!=NULL||$flood!=0){
                if($flood=="low"){$level="น้อย";}
                else if( $flood=="medium"){ $level="ปานกลาง";}
                else if( $flood=="high") { $level="มาก";}
                else{$level=NULL;}
            }else if($waste!=NULL||$waste!=0){
                if($waste=="low"){ $level="น้อย";}
                else if( $waste=="medium"){ $level="ปานกลาง";}
                else if( $waste=="high") { $level="มาก";}
                else{ $level=NULL;}

            }else if($other!=NULL||$other!=0){
                if($other=="low"){ $level="น้อย";}
                else if( $other=="medium"){ $level="ปานกลาง"; }
                else if( $other=="high") { $level="มาก"; }
                else{ $level=NULL; }
            }
                return $level;
        }
        for($k=0;$k<count($amp);$k++){
            $data = BlockageLocation::with('blockage','blockage.River')->where('blk_district',$amp[$k])->get();   
            $level1=0;$level2=0;$level3=0;
            for ($i=0;$i<count($data);$i++){
                if($data[$i]->blockage->status_approve=="2"){
                    // $fq = ProblemDetail::select('prob_level')->where ('problem_details.blk_id', $data[$i]->blockage->blk_id)->get();
                    $damage=$data[$i]->blockage->damage_level;
                    $damageData=json_decode($damage);
                    $level=checklevel($damageData->flood,$damageData->waste,$damageData->other->level);
                    $risk=checkRisk($level,$data[$i]->blockage->damage_frequency);
                    if($risk=="น้อย"){
                        $level1=$level1+1;
                        $ampL1=$ampL1+1;
                    }else if($risk=="ปานกลาง"){
                        $level2=$level2+1;
                        $ampL2=$ampL2+ 1;
                    }else if($risk=="มาก"){
                        $level3=$level3+1;
                        $ampL3=$ampL3+ 1;
                    }
                 }
                
            }
            $amp_data [] = [
                'amp'=>$amp[$k],
                'level1'=>$level1,
                'level2'=>$level2,
                'level3'=>$level3,
            ];
        }
        // dd($amp_data[0]['amp']);
        return view('general.map', compact('amp_data','ampL1','ampL2','ampL3'));
       
      
    }



     // Get Level Damage
     public function getDamage_admin($app=0) {
        header('Access-Control-Allow-Origin: *');
        // dd($amp);
        function checkRisk($level,$fq){
            if($level=="มาก"){
                $l=3;
            }else if($level=="ปานกลาง"){
                $l=2;
            }else{
                $l=1;
            }

            if($fq=="ทุกปี"){
                $f=3;
            }else if($fq=="2-4 ปีครั้ง"){
                $f=2;
            }else{
                $f=1;
            }
            
            $cal=$l*$f;

            if($cal<3){
                return "น้อย";
            }
            else if($cal<6){
                return "ปานกลาง";
            }else{
                return "มาก";
            }
        }
        function checklevel($flood,$waste,$other) {
            if($flood!=NULL||$flood!=0){
                if($flood=="low"){
                    $level="น้อย";
                }else if( $flood=="medium"){
                    $level="ปานกลาง";
                }else if( $flood=="high") {
                    $level="มาก";
                }else{
                    $level=NULL;
                }
            }else if($waste!=NULL||$waste!=0){
                if($waste=="low"){
                    $level="น้อย";
                }else if( $waste=="medium"){
                    $level="ปานกลาง";
                }else if( $waste=="high") {
                    $level="มาก";
                }else{
                    $level=NULL;
                }

            }else if($other!=NULL||$other!=0){
                if($other=="low"){
                    $level="น้อย";
                }else if( $other=="medium"){
                    $level="ปานกลาง";
                }else if( $other=="high") {
                    $level="มาก";
                }else{
                    $level=NULL;
                }
            }
                return $level;
        }

        $data = BlockageLocation::with('blockage','blockage.River')->get();
        // dd($data[143]);
        $result=[];
        $properties['time']=[];
        
        for ($i=0;$i<count($data);$i++){
                    
            if($data[$i]->blockage->status_approve==$app){
                $fq = ProblemDetail::select('prob_level')->where ('problem_details.blk_id', $data[$i]->blockage->blk_id)->get();
                //dd($fq);
                // $point =($data[0]->blk_start_location);
                $damage=$data[$i]->blockage->damage_level;
                $damageData=json_decode($damage);
                //dd($damage);
                $level=checklevel($damageData->flood,$damageData->waste,$damageData->other->level);
                $risk=checkRisk($level,$data[$i]->blockage->damage_frequency);

                    $result[] = [
                        'id' => $data[$i]->blockage->blk_id,
                        'pin_status'=>$data[$i]->blockage->status_approve,
                        'time'=> date($data[$i]->blockage->updated_at),
                        'blk_code'=> $data[$i]->blockage->blk_code,
                        'blk_id'=>$data[$i]->blockage->blk_id,
                        'river'=>$data[$i]->blockage->River->river_name,
                        'location'=>$data[$i]->blk_village,
                        'tambol'=> $data[$i]->blk_tumbol , 
                        'district'=>$data[$i]->blk_district,
                        'geometry'=> $data[$i]->blk_start_location,
                        'level'=>$risk];
             }
            
        }

        // $test['type']="FeatureCollection";
        // $test['features']=$result;
    
         $result = json_encode($result);
         echo $result;
        //return response()->json($data);
        
    }
    
    // Location spacific Pin 
    public function getLocation($id=0){
        header('Access-Control-Allow-Origin: *');
        $blk_id=$id;
        $data =  Blockage::where('blk_id', $blk_id)->get();
        $location =BlockageLocation::where('blk_location_id', $data[0]->blk_location_id)->get();
      
        
        // dd($location[0]->blk_start_location->getLat());
        return view('expert.mapshow',compact('data','location'));

    }

    public function locationShow($amp=0,$id=0) {
        header('Access-Control-Allow-Origin: *');
        function checkRisk($level,$fq){
            if($level=="มาก"){
                $l=3;
            }else if($level=="ปานกลาง"){
                $l=2;
            }else{
                $l=1;
            }

            if($fq=="ทุกปี"){
                $f=3;
            }else if($fq=="2-4 ปีครั้ง"){
                $f=2;
            }else{
                $f=1;
            }
            
            $cal=$l*$f;

            if($cal<3){
                return "น้อย";
            }
            else if($cal<6){
                return "ปานกลาง";
            }else{
                return "มาก";
            }
        }
        function checklevel($flood,$waste,$other) {
            if($flood!=NULL||$flood!=0){
                if($flood=="low"){
                    $level="น้อย";
                }else if( $flood=="medium"){
                    $level="ปานกลาง";
                }else if( $flood=="high") {
                    $level="มาก";
                }else{
                    $level=NULL;
                }
            }else if($waste!=NULL||$waste!=0){
                if($waste=="low"){
                    $level="น้อย";
                }else if( $waste=="medium"){
                    $level="ปานกลาง";
                }else if( $waste=="high") {
                    $level="มาก";
                }else{
                    $level=NULL;
                }

            }else if($other!=NULL||$other!=0){
                if($other=="low"){
                    $level="น้อย";
                }else if( $other=="medium"){
                    $level="ปานกลาง";
                }else if( $other=="high") {
                    $level="มาก";
                }else{
                    $level=NULL;
                }
            }
                return $level;
        }
        $data = BlockageLocation::with('blockage','blockage.River')->where('blk_district',$amp)->get();
       
        $result=[];
        $properties['time']=[];
        
        for ($i=0;$i<count($data);$i++){
            //$locationSt = new Point($request->latstart,$request->longstart);
            if($data[$i]->blockage){
                $fq = ProblemDetail::select('prob_level')->where ('problem_details.blk_id', $data[$i]->blockage->blk_id)->get();
                //dd($fq);
                // $point =($data[0]->blk_start_location);
                $damage=$data[$i]->blockage->damage_level;
                $damageData=json_decode($damage);
                //dd($damage);
                $level=checklevel($damageData->flood,$damageData->waste,$damageData->other->level);
                $risk=checkRisk($level,$data[$i]->blockage->damage_frequency);

                    $result[] = [
                        'id' => $data[$i]->blockage->blk_id,
                        'time'=> date($data[$i]->blockage->updated_at),
                        'blk_code'=> $data[$i]->blockage->blk_code,
                        'blk_id'=>$data[$i]->blockage->blk_id,
                        'river'=>$data[$i]->blockage->River->river_name,
                        'location'=>$data[$i]->blk_village,
                        'tambol'=> $data[$i]->blk_tumbol , 
                        'district'=>$data[$i]->blk_district,
                        'geometry'=> $data[$i]->blk_start_location,
                        'level'=>$risk];
             }
            
        }

        // $test['type']="FeatureCollection";
        // $test['features']=$result;
    
         $result = json_encode($result);
         echo $result;
        //return response()->json($data);
        
    }
    

}
