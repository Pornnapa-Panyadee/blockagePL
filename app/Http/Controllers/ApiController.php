<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getDataforHome($amp=0, $tambol=0){

        if(!empty($request->blk_district)){
            if(!empty($request->blk_tumbolCR) && $request->blk_tumbolCR!="sum"){
                $data = DB::table('blockage_locations')
                ->join('blockages', 'blockages.blk_location_id', '=', 'blockage_locations.blk_location_id')
                ->join('rivers', 'rivers.river_id', '=', 'blockages.river_id')
                ->where('blockage_locations.blk_province', '=', "เชียงราย")
                ->where('blockage_locations.blk_district', '=',$request->blk_district)
                ->where('blockage_locations.blk_tumbol', '=',$request->blk_tumbolCR)
                ->get();
            }else  {
                $data = DB::table('blockage_locations')
                ->join('blockages', 'blockages.blk_location_id', '=', 'blockage_locations.blk_location_id')
                ->join('rivers', 'rivers.river_id', '=', 'blockages.river_id')
                ->where('blockage_locations.blk_province', '=', "เชียงราย")
                ->where('blockage_locations.blk_district', '=',$request->blk_district)
                ->get();
            }
            
                // dd($data);


        }else{
            $data = DB::table('blockage_locations')
                ->join('blockages', 'blockages.blk_location_id', '=', 'blockage_locations.blk_location_id')
                ->join('rivers', 'rivers.river_id', '=', 'blockages.river_id')
                ->where('blockage_locations.blk_province', '=', "เชียงราย")
                ->get();
                //  dd($data);
        }

        $districtData['data'] = Page::getDistrictCR();
        //  dd($districtData['data']);
        if(Auth::guest()){
            return view('pages.home',compact('data','districtData'));
        }else{
            return view('pages.test',compact('data','districtData'));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
