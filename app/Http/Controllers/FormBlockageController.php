<?php

namespace App\Http\Controllers;
use File;
use Image;

use Illuminate\Http\Request;
use App\BlockageLocation;
use App\Blockage;
use App\BlockageCrossection;
use App\River;
use App\ProblemDetail;
use App\Solution;
use App\Project;
use App\Photo;
use App\ChangeLogs;
use App\Expert;
use App\User;
use Grimzy\LaravelMysqlSpatial\Types\Point;

use AuthenticatesUsers;
use SpatialTrait;
use DB;
use Auth;


class FormBlockageController extends Controller
{
  

    
    public function formblockage()
    {
        echo("form_blockage function");
        return view('form_blockage');
    }

    public function reportBackend(User $user ){
   
        if(!isset(Auth::user()->name )){
            $name="99";
        }else{
            $name=Auth::user()->name ;
        }
        
      
        if($name=="admin"){
            return view('result',compact('name'));
        }else{
            return view('auth/login');
        }
    }

   
    public function storeform(Request $request){
        // dd($request);
        function calCode($users,$text) {
        
            if($users== NULL){
                return ("00001");
            }else{
                
                $names = str_split($users->$text);
                if($text=="prob_id" ||$text=="proj_id" ){
                    $code =$names[3].$names[4].$names[5].$names[6];
                }else{
                    $code =$names[2].$names[3].$names[4].$names[5];
                }
                $num=$code+1;

                if($num<10){
                    return ("0000".$num);
                }else if ($num<100){
                    return ("000".$num);
                }else if ($num<1000){
                    return ("00".$num);
                }else {
                    return ("0".$num);
                }
            }
            
        }
        function calCodePix($users,$text) {
       
            if($users== NULL){
                return ("01");
            }else{
                $names = str_split($users->$text);
                    $code =$names[13].$names[14];
                    $num=$code+1;
                    // dd($code);
                    if($num<10){
                        return ("0".$num);
                    }else{
                        return ($num);
                    }
            }
        }

    
        $locations = DB::table('blockage_locations')->select('blk_location_id')->orderBy('created_at', 'asc')->get()->last();
        $crossection = DB::table('blockage_crossections')->select('blk_xsection_id')->orderBy('created_at', 'asc')->get()->last();
        $river = DB::table('rivers')->select('river_id')->orderBy('created_at', 'asc')->get()->last();
        $problem = DB::table('problem_details')->select('prob_id')->orderBy('created_at', 'asc')->get()->last();
        $solution = DB::table('solutions')->select('sol_id')->orderBy('created_at', 'asc')->get()->last();
        $project = DB::table('projects')->select('proj_id')->orderBy('created_at', 'asc')->get()->last();
        $blockage = DB::table('blockages')->select('blk_id')->orderBy('created_at', 'asc')->get()->last();
    
        // echo ($problem);
        $locationsId="L".calCode($locations,"blk_location_id");
        $crossectionId="X".calCode($crossection,"blk_xsection_id");
        $riverId="R".calCode($river,"river_id");
        $problemId="PB".calCode($problem,"prob_id");
        $solutionId="S".calCode($solution,"sol_id");
        $projectId="PJ".calCode($project,"proj_id");
        $blockageId="B".calCode($blockage,"blk_id");
        //echo ($projectId."/".$blockageId);
        $vill=explode(" ",$request->blk_village);
        $code =DB::table('info_village')->select('vill_code')->where('vill_name',$vill[2] )->where('vill_moo',$vill[1])->get();
        $codeBlk=$code[0]->vill_code;
        $blkcode = DB::table('blockages')->select('blk_id')->where('blk_code','like',"B".$codeBlk.'%' )->get();
        // dd(count($blkcode));
        if(count($blkcode)<10){
            $num="00".(count($blkcode)+1);
        }else{
            $num="0".(count($blkcode)+1);
        }
        $codeBlk="B".$code[0]->vill_code.$num;

        //dd($codeBlk);
        //location point
        //$locationSt = new Point($request->latstart,$request->longstart);
        $locationSt = new Point($request->latstart,$request->longstart);
        $locationFin = new Point($request->latend,$request->longend);
        $locationSt_utm = new Point($request->xstart,$request->ystart);
        $locationFin_utm = new Point($request->xend,$request->yend);
        

        /////////--------blockage_location-------------/////////
            $loc = new BlockageLocation(
                [
                    'blk_location_id'=>$locationsId ,
                    'blk_start_location'=>$locationSt,
                    'blk_end_location'=>$locationFin,
                    'blk_village'=>$request->blk_village,
                    'blk_tumbol'=>$request->blk_tumbol,
                    'blk_district'=>$request->blk_district,
                    'blk_province'=>$request->blk_province,
                    'blk_start_utm'=>$locationSt_utm,
                    'blk_end_utm'=>$locationFin_utm,
                    'comment'=>$request->comment
                ]
            );
            // dd($loc);
            $loc->save();


        /////////--------blockage_crossection-------------/////////
      
            $BlockageCrossection = new BlockageCrossection(
                [
                    'blk_xsection_id'=>$crossectionId,
                    'blk_id'=>$blockageId,
                    'past'=>json_encode($request->past),
                    'current_start'=>json_encode($request->current_start),
                    'current_narrow'=>json_encode($request->current_narrow),
                    'current_end'=>json_encode($request->current_end),
                    'current_brigde'=>json_encode($request->current_bridge)
                ]
            );
            $BlockageCrossection->save();
        /////////--------River-------------/////////
            $River = new River(
                [
                'river_id'=>$riverId,
                'river_name'=>$request->river_name,
                'river_type'=>$request->river_type,
                'river_main'=>$request->river_main
                ]
            );
            $River->save();
        /////////--------addSolution-------------/////////
            $solutionLoc = new Solution(
                
                [
                    'sol_id'=>$solutionId,
                    'proj_id'=>$projectId,
                    'responsed_dept'=>$request->responsed_dept,
                    'sol_how'=> $request->sol_how,
                    'result'=>$request->result_selector,
                    'sol_edit'=> $request->sol_edit
                ]
            );
            $solutionLoc->save();

        /////////--------addProject-------------/////////
            if($request->proj_status=="received"){
                $proj_budget=$request->proj_budget2;
                $proj_year=$request->proj_year2;
            }else{
                $proj_budget=$request->proj_budget;
                $proj_year=$request->proj_year;
            }
            $ProjectLoc = new Project(
            
                [
                    
                    'proj_id'=>$projectId,
                    'proj_char'=>$request->proj_name,
                    'proj_status'=>$request->proj_status,
                    'proj_budget'=>$proj_budget,
                    'proj_year'=>$proj_year
                ]
            );
            $ProjectLoc->save();

        ///////--------blockage Main-------------/////////
            if($request->blk_length_type=='น้อยกว่า 10 เมตร') {
                $length=0;
            }else{
                $length=$request->blk_length;
            }
            $Blockage = new Blockage(
                [
                    'blk_id' =>$blockageId,
                    'blk_code'=>$codeBlk,
                    'blk_location_id' => $locationsId,
                    'river_id' => $riverId,
                    'blk_crossection_id' =>$crossectionId,
                    'sol_id' =>$solutionId,
                    'blk_user_id'=> Auth::user()->id,
                    'blk_user_name'=> Auth::user()->name,
                    'blk_length_type' =>$request->blk_length_type,
                    'blk_length' =>$length,
                    'damage_type' => json_encode($request->damage_type),
                    'damage_level' => json_encode($request->damage_level),
                    'damage_frequency' => $request->damage_frequency,
                    'blk_surface'=>$request->blk_surface,
                    'blk_surface_detail'=>$request->blk_surface_detail,
                    'proj_id'=>$projectId,
                    'blk_slope_bed'=>$request->blk_slope_bed,
                    'survey_date'=>$request->survey_date,
                    'status_approve'=> 0,
                    'survey_engineer'=>$request->survey_engineer,
                    'survey_engineer_position'=>$request->survey_engineer_position,
                    'survey_engineer_unit'=>$request->survey_engineer_unit,
                ]
            );
            $Blockage->save();
        /////////--------Expert-------------/////////
            $Expertdata = new Expert(
                [
                    'blk_id'=>$blockageId,
                    'blk_code'=>$codeBlk,
                    'survey_problem'=>$request->problem,
                    'survey_solution'=>$request->exp_solution,
                    'exp_area'=>$request->exp_area,
                    'exp_L0'=>$request->exp_L0,
                    'exp_H'=>$request->exp_H,
                    'exp_C'=>$request->exp_C,
                    'exp_tc'=>$request->exp_tc,
                    'exp_returnPeriod'=>$request->exp_returnPeriod,
                    'exp_I'=>$request->exp_I,
                    'exp_maxflow'=>$request->exp_maxflow,
                    'survey_slope'=>$request->exp_slope
                ]
            );
            $Expertdata->save();
        /////////--------ProblemDetail-------------/////////
            $ProblemCount = ProblemDetail::count();
            $Promblemloc = new ProblemDetail(
                
                [
                    'prob_id'=> $problemId,
                    'blk_id'=>$blockageId,
                    'prob_level'=>$request->prob_level,
                    'nat_erosion'=>$request->nat_erosion,
                    'nat_shoal'=>$request->nat_shoal,
                    'nat_missing'=>$request->nat_missing,
                    'nat_winding'=>$request->nat_winding,
                    'nat_weed'=>$request->nat_weed,
                    'nat_weed_detail'=>$request->nat_weed_detail,
                    'nat_other'=>$request->nat_other,
                    'nat_other_detail'=>$request->nat_other_detail,
                    // 'nat_other_detail'=>"1",
                    'hum_structure'=>$request->hum_structure,
                    'hum_str_owner_type'=>$request->hum_str_owner_type,
                    'hum_stc_bld_num'=>$request->hum_stc_bld_num,
                    'hum_stc_fence_num'=>$request->hum_stc_fence_num,
                    'hum_str_other'=>$request->hum_str_other,
                    'hum_stc_bld_bu_num'=>$request->hum_stc_bld_bu_num,
                    'hum_stc_fence_bu_num'=>$request->hum_stc_fence_bu_num,
                    'hum_str_other_bu'=>$request->hum_str_other_bu,
                    'hum_road'=>$request->hum_road,
                    'hum_smallconvert'=>$request->hum_smallconvert,
                    'hum_road_paralel'=>$request->hum_road_paralel,
                    'hum_replaced_convert'=>$request->hum_replaced_convert,
                    'hum_bridge_pile'=>$request->hum_bridge_pile,
                    'hum_soil_cover'=>$request->hum_soil_cover,
                    'hum_trash'=>$request->hum_trash,
                    'hum_other'=>$request->hum_other,
                    'hum_other_detail'=>$request->hum_other_detail,

                ]
            );
            $Promblemloc->save();
            // dd($Promblemloc);
        
        /////////--------UpPhoto-------------/////////
            
            if ($request->hasFile('photo_type_bld')) {
                $images = $request->file('photo_type_bld');
                
                //setting flag for condition
                $org_img = $thm_img = true;
                // create new directory for uploading image if doesn't exist
                if( ! File::exists('images/originals/')) {
                    $org_img = File::makeDirectory('images/originals/', 0777, true);
                    
                }
                if ( ! File::exists('images/thumbnails/')) {
                    $thm_img = File::makeDirectory('images/thumbnails', 0777, true);
                }
    
                // loop through each image to save and upload
                foreach($images as $key => $image) {
                    
                    $blockage = DB::table('blockages')->select('blk_code')->where('blk_id', $blockageId)->get();
                    $photo= DB::table('photos')->select('photo_id')->where('blk_id', $blockageId)->orderBy('created_at', 'asc')->get()->last();
                    
                    $blockageId=$blockageId;                
                    $photosId=$blockage[0]->blk_code."-".calCodePix($photo,"photo_id");
                    $filename = $photosId.'.'.$image->getClientOriginalExtension();
                    //path of image for upload
                    $org_path = 'images/originals/' . $filename;
                    $thm_path = 'images/thumbnails/' . $filename;
    
                    // upload image to server
                    if (($org_img && $thm_img) == true) {
                        Image::make($image)->fit(900, 500, function ($constraint) {
                                $constraint->upsize();
                            })->save($org_path);
                        Image::make($image)->fit(270, 160, function ($constraint) {
                            $constraint->upsize();
                        })->save($thm_path);
                    }
                    
                    $loc = new Photo(
                        [
                            'photo_id'=> $photosId,
                            'blk_id'=>$blockageId,
                            'photo_type'=>'Blockage',
                            'photo_name'=>$org_path,
                            'thumbnail_name'=>$thm_path,
                            'photo_detail'=>''
                            
                        ]
                    );
                    $loc->save();
                }
            }


        //    return redirect()->route("form.Qnaire4");
        return redirect()->route('blocker');
        
    }


    public function getBlockageData() {
        //$data =  Blockage::with('blockageLocation','blockageCrossection','River','Solution.Project','ProblemDetail')->get();
        
        $data = Blockage::with('blockageLocation','blockageCrossection','River','Solution','Photo')->get();
        return response()->json($data);
    }

    public function getBlockageID($blk_id=0){
        //dd ("555");
        $data = Blockage::with('blockageLocation','blockageCrossection','River','Solution.Project','Photo')->where('blk_id', $blk_id)->distinct()->get();
        return response()->json($data);
        exit;
    }

    public function getBlockagebyUser(User $user ){
        $name=Auth::user()->name ;
        $verify_status = Auth::user()->verify;
 
        // dd (Auth::user()->status_work);
        if($name=="admin" && $verify_status == 1){
            $data = Blockage::with('blockageLocation')->orderBy('created_at', 'DESC')->get();
            // dd($data);
    
            return view('report_admin',compact('data'));
            
        }else if(Auth::user()->status_work=="expert" ||Auth::user()->status_work=="admin" ){
            $user= Auth::user()->name;
            $data = Blockage::with('blockageLocation')->orderBy('created_at', 'DESC')->get();
            // dd($data[0]);
            return view('pages.homeblockage',compact('data','user'));
        }else if($verify_status == 0){
            $massageNotic = "หากคุณต้องการเข้าหน้าเพจนี้ถึงกรุณา";
            return view('verifyMessage', compact('massageNotic'));

        }else if(Auth::user()->status_work=="expert" ){
            $user=Auth::user()->id ;
            $data = Blockage::with('blockageLocation','User')->orderBy('survey_date', 'DESC')->get();
            return view('pages.homeblockage',compact('data'));

        }else{
            $user=Auth::user()->id ;
       
            // dd($user=Auth::user()->id);
            $data = Blockage::with('blockageLocation','User')->where('blk_user_id', $user)->orderBy('survey_date', 'DESC')->get();
            //dd($data);
            //return response()->json($data);
            //exit;
            return view('pages.homeblockage',compact('data'));
           
        }
        
            
    }

    public function getdata( ){

            $data = Blockage::with('blockageLocation')->get();
            return view('pages.data',compact('data'));
            
    }

    public function getBlockagebyAdmin(){
        //dd ("555");
        
        $data = Blockage::with('blockageLocation')->get();
        
         //return response()->json($data);
        //exit;
         return view('report_admin',compact('data'));
    }

    public function getBlockagebyAdminAll(){
        //dd ("555");
        
        $data = Blockage::with('blockageLocation')->get();
        
        $problem =  ProblemDetail::All();
      
        //dd($problem);
      
        //return response()->json($data);
        //exit;
         return view('report_all',compact('data','problem'));
    }

    public function reportBlockage($blk_id=0){
        // dd ("555");
        //dd($blk_id);
        $data =  Blockage::with('blockageLocation','blockageCrossection','River','Solution','Photo')->where('blk_id', $blk_id)->get();
        //$location= BlockageLocation::where('blk_location_id', $data[0]->blockageLocation->blk_location_id)->get();
        $problem =  ProblemDetail::where('blk_id', $data[0]->blk_id)->get();
        $photo_Blockage=Photo::where('blk_id', $data[0]->blk_id )->Where('photo_type','Blockage')->get();
        $photo_Land=Photo::where('blk_id', $data[0]->blk_id )->Where('photo_type','Land')->get();
        $photo_Riverbefore=Photo::where('blk_id', $data[0]->blk_id )->Where('photo_type','River before')->get();
        $photo_Riverprob=Photo::where('blk_id', $data[0]->blk_id )->Where('photo_type','River prob')->get();
        $photo_Riverafter=Photo::where('blk_id', $data[0]->blk_id )->Where('photo_type','River after')->get();
        $photo_Probsketch=Photo::where('blk_id', $data[0]->blk_id )->Where('photo_type','Prob sketch')->get();
        $solution_id=Solution::where('sol_id',$data[0]->sol_id)->get();
        $project_id=Project::where('proj_id',$solution_id[0]->proj_id)->get();
        
        $damage=$data[0]->damage_level;
        $damage_type=$data[0]->damage_type;
        $past = $data[0]->blockageCrossection->past;
        $current_start = $data[0]->blockageCrossection->current_start;
        $current_narrow = $data[0]->blockageCrossection->current_narrow;
        $current_brigde = $data[0]->blockageCrossection->current_brigde;
        $current_end = $data[0]->blockageCrossection->current_end;

        

        
        $damageData=json_decode($damage);
        $damage_type=json_decode($damage_type);
        $pastData = json_decode($past);
        $current_start = json_decode($current_start);
        $current_narrow = json_decode($current_narrow);
        $current_brigde = json_decode($current_brigde);

        $current_brigde_new=[
            'width'=>0,
            'depth'=> 0,
            'len'=>0,
            'num'=>0
        ];
        
        if($current_brigde==null){
            $current_brigde=json_encode($current_brigde_new);
            $current_brigde=json_decode($current_brigde);
        }
        
        //   dd($current_narrow->culvert);
        $current_narrow_new = [
            'waterway_type' => null,
            'round_type' => null,
            'square_type' => null,
            'other_type' =>null,
            'waterway'=> [
                'width'=>null,
                'depth'=> null,
                'slop'=>null],
            'round'=>[
                'diameter'=>null,
                'num'=>null,
                'len'=>null ],
            'square'=>[
               'width'=>null,
                'high'=>null,
                'num'=>null,
                'len'=>null],
            'other'=>[
                'detail'=>null,
            ]


        ];
        $current_narrow_new=json_encode($current_narrow_new);
        $current_narrow_new=json_decode($current_narrow_new);
  
        if(isset($current_narrow->culvert->diameter)){
            $diameter=$current_narrow->culvert->diameter;
            if(isset($current_narrow->culvert->c->num)){
                $numr=$current_narrow->culvert->c->num;
            }else if (isset($current_narrow->culvert->num)){
                $numr=$current_narrow->culvert->num;
            }else{
                $numr=null;
            }


            if(!empty($current_narrow->culvert->c->len)||!empty($current_narrow->culvert->len)){
                if(isset($current_narrow->culvert->c->len)){
                    $lenr=$current_narrow->culvert->c->len;
                }else if($current_narrow->culvert->len){
                    $lenr=$current_narrow->culvert->len;
                }
            }else{
                $lenr=null;
            }

        }else{
            $diameter=null;
            $numr=null;
            $lenr=null;
        }

        if(isset($current_narrow->culvert->width)){
            $width=$current_narrow->culvert->width;
            $high=$current_narrow->culvert->high;
            if(isset($current_narrow->culvert->sq->num)){
                $numsq=$current_narrow->culvert->sq->num;
            }else if(isset($current_narrow->culvert->num)){
                $numsq=$current_narrow->culvert->num;
            }else{
                $numsq=null;
            }

            if(!empty($current_narrow->culvert->sq->len)||!empty($current_narrow->culvert->len)){
                if(isset($current_narrow->culvert->sq->len)){
                    $lensq=$current_narrow->culvert->sq->len;
                }else if($current_narrow->culvert->len){
                    $lensq=$current_narrow->culvert->len;
                }
            }else{
                $lensq=null;
            }
        }else{
            $width=null;
            $high=null;
            $numsq=null;
            $lensq=null;
        }

       
        if(($current_narrow->type=="waterway" )|| isset($current_narrow->width) ){
            $current_narrow_new->waterway_type="1";
            $current_narrow_new->waterway->width=$current_narrow->width;
            $current_narrow_new->waterway->depth=$current_narrow->depth;
            $current_narrow_new->waterway->slop=$current_narrow->slop;
         }
         // culvert round
        if(isset($current_narrow->culvert->diameter)){
            $current_narrow_new->round_type="1";
            $current_narrow_new->round->diameter=$diameter;
            $current_narrow_new->round->num=$numr;
            $current_narrow_new->round->len=$lenr;

        }
         // culvert square

        if(isset($current_narrow->culvert->width)){
            $current_narrow_new->square_type="1";
            $current_narrow_new->square->width=$width;
            $current_narrow_new->square->high=$high;
            $current_narrow_new->square->num=$numsq;
            $current_narrow_new->square->len=$lensq;

        }
        // other
        if($current_narrow->type=="other" || isset($current_narrow->other) ){
            $current_narrow_new->other_type="1";
            $current_narrow_new->other->detail=$current_narrow->other;
        }  

        // dd($current_narrow_new);
       //dd($data[0]->blockageLocation );
        // dd($solution_id[0]->sol_how);
        $current_end = json_decode($current_end);

        // dd($current_brigde);
        return view('report', compact('data','damageData','damage_type','pastData','current_start','current_narrow_new','current_end','problem','photo_Blockage','photo_Land','photo_Riverbefore','photo_Riverprob','photo_Riverafter','photo_Probsketch','solution_id','project_id','current_brigde'));
       
    }

    public function reportBlockageDetail($blk_id=0){
        //dd ("555");
        //dd($blk_id);
        $data =  Blockage::with('blockageLocation','blockageCrossection','River','Solution','Photo')->where('blk_id', $blk_id)->get();
        $problem =  ProblemDetail::where('blk_id', $data[0]->blk_id)->get();
        $photo_Blockage=Photo::where('blk_id', $data[0]->blk_id )->Where('photo_type','Blockage')->get();
        $photo_Land=Photo::where('blk_id', $data[0]->blk_id )->Where('photo_type','Land')->get();
        $photo_Riverbefore=Photo::where('blk_id', $data[0]->blk_id )->Where('photo_type','River before')->get();
        $photo_Riverprob=Photo::where('blk_id', $data[0]->blk_id )->Where('photo_type','River prob')->get();
        $photo_Riverafter=Photo::where('blk_id', $data[0]->blk_id )->Where('photo_type','River after')->get();
        $photo_Probsketch=Photo::where('blk_id', $data[0]->blk_id )->Where('photo_type','Prob sketch')->get();
        $solution_id=Solution::where('sol_id',$data[0]->sol_id)->get();
        $project_id=Project::where('proj_id',$solution_id[0]->proj_id)->get();
        
        $damage=$data[0]->damage_level;
        $past = $data[0]->blockageCrossection->past;
        $current_start = $data[0]->blockageCrossection->current_start;
        $current_narrow = $data[0]->blockageCrossection->current_narrow;
        $current_end = $data[0]->blockageCrossection->current_end;
        $damageData=json_decode($damage);
        $pastData = json_decode($past);
        $current_start = json_decode($current_start);
        $current_narrow = json_decode($current_narrow);
       //dd($current_narrow->culvert->diameter);
        if($current_narrow->type=="waterway") {
            $current_narrow->culvert=NULL;
            $current_narrow->diameter=NULL;
            $current_narrow->dwidth=NULL;
            $current_narrow->dhigh=NULL;
            $current_narrow->other=NULL;
        }else if($current_narrow->type=="culvert"){
            if($current_narrow->culvert->diameter!=NULL){
                $current_narrow->width=NULL;
                $current_narrow->depth=NULL;
                $current_narrow->slop=NULL;
                $current_narrow->dwidth=NULL;
                $current_narrow->dhigh=NULL;
                $current_narrow->other=NULL;
            }
            if($current_narrow->culvert!=NULL) {
                $current_narrow->diameter=NULL;
                $current_narrow->width=NULL;
                $current_narrow->depth=NULL;
                $current_narrow->slop=NULL;
                $current_narrow->other=NULL;
            }
            
        }else{

        }
        // dd($current_narrow);
        $current_end = json_decode($current_end);
        return view('report_detail', compact('data','damageData','pastData','current_start','current_narrow','current_end','problem','photo_Blockage','photo_Land','photo_Riverbefore','photo_Riverprob','photo_Riverafter','photo_Probsketch','solution_id','project_id'));
       
    }

    //edit form
    public function editform(Request $request,$id){
        // dd($request);
        $data =  Blockage::with('blockageLocation','blockageCrossection','River','Solution.Project','ProblemDetail')->where('blk_id', $id)->first();
        $data2 =  Blockage::with('blockageLocation','blockageCrossection','River','Solution.Project','ProblemDetail')->where('blk_id', $id)->first();

        // dd($request->blk_length_lo);
       
        if($request->blk_length_type=='น้อยกว่า 10 เมตร') {
            $length=0;
        }else if($request->blk_length_type=='10 -1000 เมตร'){
           $length=$request->blk_length_lo;
        }else{
            $length=$request->blk_length_more1;
        }
        // dd($length);
        $locationSt = new Point($request->latstart,$request->longstart);
        $locationFin = new Point($request->latend,$request->longend);
        $locationSt_utm = new Point($request->xstart,$request->ystart);
        $locationFin_utm = new Point($request->xend,$request->yend);
        //dd(json_encode($request->damage_level));

        /////////--------blockage-------------/////////
           $blk = Blockage::where('blk_id', $id)
                ->update([  'blk_length_type' =>$request->blk_length_type,
                            'blk_length' =>$length,
                            'damage_type' => json_encode($request->damage_type),
                            'damage_level' => json_encode($request->damage_level),
                            'damage_frequency' => $request->damage_frequency,
                            'blk_surface'=>$request->blk_surface,
                            'blk_surface_detail'=>$request->blk_surface_detail,
                            'blk_slope_bed'=>$request->blk_slope_bed,
                            'survey_date'=>$request->survey_date
                ]);
        /////////--------blockage_location-------------/////////
            $locLocation = BlockageLocation::where('blk_location_id', $data->blk_location_id)
                ->update([
                    'blk_start_location'=>$locationSt,
                    'blk_end_location'=>$locationFin,
                    'blk_village'=>$request->blk_village,
                    'blk_tumbol'=>$request->blk_tumbol,
                    'blk_district'=>$request->blk_district,
                    'blk_province'=>$request->blk_province,
                    'blk_start_utm'=>$locationSt_utm,
                    'blk_end_utm'=>$locationFin_utm,
                    'comment'=> $request->comment
                
                    ]);

        /////////--------blockage_crossection-------------/////////
      
        // $BlockageCrossection = BlockageCrossection::where('blk_xsection_id', $data->blk_xsection_id)
        //         ->update([
        //                 'blk_xsection_id'=>$data->blk_xsection_id,
        //                 'blk_id'=>$id,
        //                 'past'=>json_encode($request->past),
        //                 'current_start'=>json_encode($request->current_start),
        //                 'current_narrow'=>json_encode($request->current_narrow),
        //                 'current_end'=>json_encode($request->current_end),
        //         ]);
       // dd($request->current_narrow);
        $BlockageCrossection= BlockageCrossection::where('blk_xsection_id', $data->blk_crossection_id)
                ->update([
                    'past'=>json_encode($request->past),
                    'current_start'=>json_encode($request->current_start),
                    'current_narrow'=>json_encode($request->current_narrow),
                    'current_end'=>json_encode($request->current_end),
                    'current_brigde'=>json_encode($request->current_bridge)
               ]);


        //  dd($data->blk_crossection_id);
        /////////--------River-------------/////////
        $River= River::where('river_id', $data->river_id)
                ->update([
                'river_name'=>$request->river_name,
                'river_type'=>$request->river_type,
                'river_main'=>$request->river_main
               ]);

        /////////--------addSolution-------------/////////
         
        $solutionLoc = Solution:: where('sol_id',$data->sol_id)
                ->update([
                    'responsed_dept'=>$request->responsed_dept,
                    'sol_how'=> $request->sol_how,
                    'result'=>$request->result_selector,
                    'sol_edit'=> $request->sol_edit
                ]);

        /////////--------Project-------------/////////
         if($request->proj_status=="received"){
            $proj_budget=$request->proj_budget2;
            $proj_name=$request->proj_name2;
            }else{
                $proj_budget=$request->proj_budget;
                $proj_name=$request->proj_name;
            }
            $solution_id=Solution::where('sol_id',$data->sol_id)->first();
            
            $project_id=Project::where('proj_id',$solution_id->proj_id)->first();
            // dd($request->proj_status);
            $ProjectLoc =  Project::where('proj_id',$project_id->proj_id)
                    ->update([
                            'proj_char'=>$proj_name,
                            'proj_status'=>$request->proj_status,
                            'proj_budget'=>$proj_budget,
                            'proj_year'=>$request->proj_year
                        
                        ]);
            // dd($ProjectLoc);           
        /////////--------Promblem-------------/////////     
        //dd($request->nat_erosion);
        $Promblemloc = ProblemDetail::where('blk_id',$data->blk_id)
            ->update([
               
                'prob_level'=>$request->prob_level,
                'nat_erosion'=>$request->nat_erosion,
                'nat_shoal'=>$request->nat_shoal,
                'nat_missing'=>$request->nat_missing,
                'nat_winding'=>$request->nat_winding,
                'nat_weed'=>$request->nat_weed,
                'nat_weed_detail'=>$request->nat_weed_detail,
                'nat_other'=>$request->nat_other,
                'nat_other_detail'=>$request->nat_other_detail,
                // 'nat_other_detail'=>"1",
                'hum_structure'=>$request->hum_structure,
                'hum_str_owner_type'=>$request->hum_str_owner_type,
                'hum_stc_bld_num'=>$request->hum_stc_bld_num,
                'hum_stc_fence_num'=>$request->hum_stc_fence_num,
                'hum_str_other'=>$request->hum_str_other,
                'hum_stc_bld_bu_num'=>$request->hum_stc_bld_bu_num,
                'hum_stc_fence_bu_num'=>$request->hum_stc_fence_bu_num,
                'hum_str_other_bu'=>$request->hum_str_other_bu,
                'hum_road'=>$request->hum_road,
                'hum_smallconvert'=>$request->hum_smallconvert,
                'hum_road_paralel'=>$request->hum_road_paralel,
                'hum_replaced_convert'=>$request->hum_replaced_convert,
                'hum_bridge_pile'=>$request->hum_bridge_pile,
                'hum_soil_cover'=>$request->hum_soil_cover,
                'hum_trash'=>$request->hum_trash,
                'hum_other'=>$request->hum_other,
                'hum_other_detail'=>$request->hum_other_detail,

            ]);
            

        // return redirect()->route("blocker");
        // dd($jsondata);
        

        $jsondata_old=json_decode($data);
        $jsondata_new=json_decode($data2);

        // echo(json($jsondata_old));
        // echo($jsondata_new);
        // return response()->json($jsondata_old);
        $Logs = new ChangeLogs(
            [
                'blk_id'=>$data->blk_id,
                'user_id'=>Auth::user()->id ,
                'data_old'=>$data,
                'data_new'=>$data2
            ]
        );
        $Logs->save();
        //return response()->json($jsondata_old);
        return redirect()->route("blocker");

    }

    //edit form Survey
    public function editformsurvey(Request $request,$id){
        // dd($request);
        $data =  Blockage::with('blockageLocation','blockageCrossection','River','Solution.Project','ProblemDetail')->where('blk_id', $id)->first();
        $data2 =  Blockage::with('blockageLocation','blockageCrossection','River','Solution.Project','ProblemDetail')->where('blk_id', $id)->first();

        // dd($request->blk_length_lo);
       
        if($request->blk_length_type=='น้อยกว่า 10 เมตร') {
            $length=0;
        }else if($request->blk_length_type=='10 -1000 เมตร'){
           $length=$request->blk_length_lo;
        }else{
            $length=$request->blk_length_more1;
        }
        // dd($length);
        $locationSt = new Point($request->latstart,$request->longstart);
        $locationFin = new Point($request->latend,$request->longend);
        $locationSt_utm = new Point($request->xstart,$request->ystart);
        $locationFin_utm = new Point($request->xend,$request->yend);
        //dd(json_encode($request->damage_level));

        /////////--------blockage-------------/////////
           $blk = Blockage::where('blk_id', $id)
                ->update([  'blk_length_type' =>$request->blk_length_type,
                            'blk_length' =>$length,
                            'damage_type' => json_encode($request->damage_type),
                            'damage_level' => json_encode($request->damage_level),
                            'damage_frequency' => $request->damage_frequency,
                            'blk_surface'=>$request->blk_surface,
                            'blk_surface_detail'=>$request->blk_surface_detail,
                            'blk_slope_bed'=>$request->blk_slope_bed,
                            'survey_date'=>$request->survey_date
                ]);
        /////////--------blockage_location-------------/////////
            $locLocation = BlockageLocation::where('blk_location_id', $data->blk_location_id)
                ->update([
                    'blk_start_location'=>$locationSt,
                    'blk_end_location'=>$locationFin,
                    'blk_village'=>$request->blk_village,
                    'blk_tumbol'=>$request->blk_tumbol,
                    'blk_district'=>$request->blk_district,
                    'blk_province'=>$request->blk_province,
                    'blk_start_utm'=>$locationSt_utm,
                    'blk_end_utm'=>$locationFin_utm,
                    'comment'=> $request->comment
                
                    ]);
        $BlockageCrossection= BlockageCrossection::where('blk_xsection_id', $data->blk_crossection_id)
                ->update([
                    'past'=>json_encode($request->past),
                    'current_start'=>json_encode($request->current_start),
                    'current_narrow'=>json_encode($request->current_narrow),
                    'current_end'=>json_encode($request->current_end),
                    'current_brigde'=>json_encode($request->current_bridge)
               ]);


        //  dd($data->blk_crossection_id);
        /////////--------River-------------/////////
        $River= River::where('river_id', $data->river_id)
                ->update([
                'river_name'=>$request->river_name,
                'river_type'=>$request->river_type,
                'river_main'=>$request->river_main
               ]);

        /////////--------addSolution-------------/////////
         
        $solutionLoc = Solution:: where('sol_id',$data->sol_id)
                ->update([
                    'responsed_dept'=>$request->responsed_dept,
                    'sol_how'=> $request->sol_how,
                    'result'=>$request->result_selector,
                    'sol_edit'=> $request->sol_edit
                ]);

        /////////--------Project-------------/////////
         if($request->proj_status=="received"){
            $proj_budget=$request->proj_budget2;
            $proj_name=$request->proj_name2;
            }else{
                $proj_budget=$request->proj_budget;
                $proj_name=$request->proj_name;
            }
            $solution_id=Solution::where('sol_id',$data->sol_id)->first();
            
            $project_id=Project::where('proj_id',$solution_id->proj_id)->first();
            // dd($request->proj_status);
            $ProjectLoc =  Project::where('proj_id',$project_id->proj_id)
                    ->update([
                            'proj_char'=>$proj_name,
                            'proj_status'=>$request->proj_status,
                            'proj_budget'=>$proj_budget,
                            'proj_year'=>$request->proj_year
                        
                        ]);
            // dd($ProjectLoc);           
        /////////--------Promblem-------------/////////     
        $Promblemloc = ProblemDetail::where('blk_id',$data->blk_id)
            ->update([
                'prob_level'=>$request->prob_level,
                'nat_erosion'=>$request->nat_erosion,
                'nat_shoal'=>$request->nat_shoal,
                'nat_missing'=>$request->nat_missing,
                'nat_winding'=>$request->nat_winding,
                'nat_weed'=>$request->nat_weed,
                'nat_weed_detail'=>$request->nat_weed_detail,
                'nat_other'=>$request->nat_other,
                'nat_other_detail'=>$request->nat_other_detail,
                // 'nat_other_detail'=>"1",
                'hum_structure'=>$request->hum_structure,
                'hum_str_owner_type'=>$request->hum_str_owner_type,
                'hum_stc_bld_num'=>$request->hum_stc_bld_num,
                'hum_stc_fence_num'=>$request->hum_stc_fence_num,
                'hum_str_other'=>$request->hum_str_other,
                'hum_stc_bld_bu_num'=>$request->hum_stc_bld_bu_num,
                'hum_stc_fence_bu_num'=>$request->hum_stc_fence_bu_num,
                'hum_str_other_bu'=>$request->hum_str_other_bu,
                'hum_road'=>$request->hum_road,
                'hum_smallconvert'=>$request->hum_smallconvert,
                'hum_road_paralel'=>$request->hum_road_paralel,
                'hum_replaced_convert'=>$request->hum_replaced_convert,
                'hum_bridge_pile'=>$request->hum_bridge_pile,
                'hum_soil_cover'=>$request->hum_soil_cover,
                'hum_trash'=>$request->hum_trash,
                'hum_other'=>$request->hum_other,
                'hum_other_detail'=>$request->hum_other_detail,

            ]);
        /////////--------Expert-------------/////////
        $Expertdata = Expert::where('blk_id',$data->blk_id)
            ->update([
                'survey_problem'=>$request->problem,
                'survey_solution'=>$request->exp_solution,
                'exp_area'=>$request->exp_area,
                'exp_L0'=>$request->exp_L0,
                'exp_H'=>$request->exp_H,
                'exp_C'=>$request->exp_C,
                'exp_tc'=>$request->exp_tc,
                'exp_returnPeriod'=>$request->exp_returnPeriod,
                'exp_I'=>$request->exp_I,
                'exp_maxflow'=>$request->exp_maxflow,
            ]);
            

        $jsondata_old=json_decode($data);
        $jsondata_new=json_decode($data2);
        $Logs = new ChangeLogs(
            [
                'blk_id'=>$data->blk_id,
                'user_id'=>Auth::user()->id ,
                'data_old'=>$data,
                'data_new'=>$data2
            ]
        );
        $Logs->save();
        //return response()->json($jsondata_old);
        return redirect()->route("blocker");

    }

    // remove blockage
    public function removeblockage($id){
        $data =  Blockage::where('blk_id', $id)->get();
        $sol = Solution::where('sol_id',$data[0]->sol_id )->get();
        
        /////////--------blockage_location-------------/////////
        $loc = BlockageLocation::where('blk_location_id',$data[0]->blk_location_id)->delete(); 
        /////////--------blockage_crossection-------------/////////
        $BlockageCrossection = BlockageCrossection::where('blk_xsection_id',$data[0]->blk_crossection_id)->delete(); 
        /////////--------River-------------/////////
        $River = River::where('river_id',$data[0]->river_id)->delete();           
        /////////--------addSolution-------------/////////
        $solutionLoc = Solution::where('sol_id',$data[0]->sol_id)->delete();          
        /////////--------addProject-------------/////////      
        $ProjectLoc = Project::where('proj_id',$sol[0]->proj_id)->delete();             
        /////////--------Expert-------------///////// 
        $Expertdata = Expert::where('blk_id',$data[0]->blk_id)->delete();        
        /////////--------ProblemDetail-------------/////////
        $Promblemloc =  ProblemDetail::where('blk_id',$data[0]->blk_id)->delete();       
        /////////--------UpPhoto-------------/////////
        $photo= DB::table('photos')->where('blk_id', $data[0]->blk_id)->delete();   

        ///////--------blockage Main-------------/////////      
        $Blockage = Blockage::where('blk_id',$id)->delete(); 
        
        $Logs = new ChangeLogs(
            [
                'blk_id'=>$data[0]->blk_id,
                'user_id'=>Auth::user()->id ,
                'data_old'=>$data,
                'data_new'=>NULL
            ]
        );
        $Logs->save();
  
        return redirect()->route("blocker");
    }

    // edit detail from Expert
    public function updateForExpert(Request $request)
    {
        // dd($request);
        $blk = Blockage::where('blk_code', $request->blk_code)
         ->update(['status_approve' =>$request->status_approve]);
        // dd($request);
        $expertInfo = Expert::where('blk_code', $request->blk_code)
                ->update([
                    'exp_problem'=>$request->problem,
                    'exp_area'=>$request->exp_area,
                    'exp_L0'=>$request->exp_L0,
                    'exp_H'=>$request->exp_H,
                    'exp_C'=>$request->exp_C,
                    'exp_tc'=>$request->exp_tc,
                    'exp_returnPeriod'=>$request->exp_returnPeriod,
                    'exp_I'=>$request->exp_I,
                    'exp_maxflow'=>$request->exp_maxflow,
                    'exp_solution'=>$request->exp_solution,
                    'exp_slope'=>$request->exp_slope,
                    'exp_probreport'=>$request->problem,
                    'exp_solreport'=>$request->exp_solution,
                    'survey_solution'=>$request->survey_solution,
                    'survey_problem'=>$request->survey_problem,
                    'approve_by'=>Auth::user()->name
                ]);
        // return redirect()->route('expert.report', ['id' => $request->blk_id]);
        return redirect()->route('expert.expert');
    }


}
