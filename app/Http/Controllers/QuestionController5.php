<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Blockage;

use File;
use Image;
use DB;

class QuestionController5 extends Controller
{
    protected $photo;
    /**
     * [__construct description]
     * @param Photo $photo [description]
     */
    public function __construct(
        Photo $photo )
    {
        $this->Photo = $photo;
    }
    public function questionnaire5($id)
    {
        $data =  Blockage::with('blockageLocation','Photo')->where('blk_id', $id)->get();
        $data = json_decode($data);
        // dd($data);
        return view('form.questionnaire5', compact('data'));
    }

    public function BlockageId_photo($blk_id=0){
        
        $data =  Blockage::with('blockageLocation')->where('blk_id', $blk_id)->get();
        return view('form/questionnaire5', compact('data'));
       
    }


    public function uploadImage(Request $request)
    {
        // dd($request);
       $blk_id=$request->blk_id;
       function calCode($users,$text) {
           
            if($users== NULL){
                // dd($users);
                return ("01");
            }else{
                $names = str_split($users->$text);
                    $code =$names[13].$names[14];
                    $num=$code+1;
                    // dd($num);
                    if($num<10){
                        return ("0".$num);
                    }else{
                        return ($num);
                    }
            }
        }
        //**************** check if image photo_type_bld exist **********************//
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
                
                $blockage = DB::table('blockages')->select('blk_code')->where('blk_id', $blk_id)->get();
                $photo= DB::table('photos')->select('photo_id')->where('blk_id', $blk_id)->orderBy('created_at', 'asc')->get()->last();
                
                $blockageId=$blk_id;
                $photosId=$blockage[0]->blk_code."-".calCode($photo,"photo_id");
                
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
        
        // return redirect()->route('reportBlockage', [$blk_id]);
        // return redirect()->route('blocker');
        return redirect()->route('form.Qnaire5', ['id' => $blk_id]);
    }

    public function photoremove($photo_id=0) {
        // dd($photo_id);
        $photo = DB::table('photos')->select('*')->where('photo_id', $photo_id)->get(); 
        $blockage = DB::table('blockages')->select('blk_code')->where('blk_id', $photo[0]->blk_id)->get();
        // $blk = WeirSurvey::select('weir_code')->where('weir_id',$photo[0]->weir_id)->get();

        $filename = 'images/originals/'.$photo_id.'.jpg';
        if (file_exists($filename)) {
            unlink($filename);
        }
        $filename1 = 'images/thumbnails/'.$photo_id.'.jpg';
        if (file_exists($filename1)) {
            unlink($filename1);
        }
        $photo1 = DB::table('photos')->where('photo_id',$photo_id)->delete();  
        $photo1 = Photo::select('*')->where('photo_id',$photo_id)->delete(); 

        return redirect()->route('form.Qnaire5', ['id' => $photo[0]->blk_id]);

        // return redirect()->route('addphoto', ['id' => $weir[0]->weir_code]);
    }
}
