@extends('layouts.app_editform')

@section('content')
    <div class="dashboard-main-wrapper">
        @include('includes.head')
        @include('includes.header')
        <div class="dashboard-wrapper">
            <div class="row" style="padding:30px;">
                <h4><a href="{{ asset('/blocker') }}">รายละเอียดแบบสำรวจ </a> &raquo; แก้ไขแบบสำรวจ &raquo; {{ $obj[$id]->blk_code }}</h4>
            </div>
            <div class="flex-center position-ref full-height">
                <div class="content" >
                     <div class="card border-3 border-top border-top-primary">
                        <div class="card-header"> 
                            <h2> แบบสำรวจรายละเอียดการกีดขวางทางน้ำ </h2>
                            <h4>กิจกรรมการพัฒนาระบบข้อมูลของสิ่งกีดขวางทางน้ำในลำน้ำคูคลองและถนนในจังหวัดเชียงใหม่</h4>
                        </div>
                            <div class="title m-b-md form-group">   
                                <!-- Progress Wizard -->
                                <div class="js-wizard-simple block block block-rounded" >
                                    <!-- Step Tabs -->
                                    <ul class="nav nav-tabs nav-tabs-block nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#wizard-progress-step1" data-toggle="tab">ลักษณะทั่วไป</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#wizard-progress-step2" data-toggle="tab">ความเสียหายที่เคยเกิดขึ้น</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#wizard-progress-step3" data-toggle="tab">สภาพปัญหา</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#wizard-progress-step4" data-toggle="tab">การแก้ไข</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#wizard-progress-step5" data-toggle="tab">ภาพประกอบ</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#wizard-progress-step6" data-toggle="tab">แนวทางแก้ไข</a>
                                        </li>
                                    </ul>
                                    <!-- END Step Tabs -->

                                    <!-- Form -->
                                    <!-- <form action="{{ route('form.Qnaire5.uploadImage') }}" method="post" enctype="multipart/form-data" onsubmit="return confirm('บันทึกข้อมูล !!');"> -->
                                    <?php $text='editsurvey/'. $obj[$id]->blk_id ;?>
                                    <!-- <form action="{{route('form.storeform')}}" method="post" enctype="multipart/form-data" onsubmit="return confirm('บันทึกข้อมูล เรียบร้อย !!');" > -->
                                    <form action="{{asset($text)}}" method="get" onsubmit="return confirm('แก้ไข เรียบร้อย !!');">
                                        {{ csrf_field() }}
                                        <!-- Wizard Progress Bar -->
                                        <div class="block-content block-content-sm">
                                            <div class="progress" data-wizard="progress" style="height: 8px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <!-- END Wizard Progress Bar -->
                                        <?php 
                                            function add($t) {
                                                if($t=='1'){ $text='value=1 checked';}
                                                else{ $text='value=1';}
                                                return $text;
                                            }
                                            function checktext($t1) {
                                                if($t1!=NULL ||$t1>0 ){$text='value=1 checked';}
                                                else{$text='value=1';}
                                                return $text;
                                            }
                                            function checksame($t1, $t2) {
                                                if($t1==$t2){$text='checked';}
                                                else{ $text=' '; }
                                                return $text;
                                            }
                                            function checkphoto($text){
                                                if($text!=NULL){
                                                    // $img='http://localhost/blockagePL/public/'.$text;
                                                    $img='https://watercenter.scmc.cmu.ac.th/blockage/jang_basin/'.$text; 
                                                    echo "<img src='{{$img}}'  width=200px; style='margin-left:10px;'>";
                                                }else{ echo "";}	
                                            }
                                        ?> 
                                        <!-- Steps Content -->
                                        <div class="block-content block-content-full tab-content" style="min-height: 300px;">
                                            <!-- Step 1 -->
                                            <div class="tab-pane active" id="wizard-progress-step1" role="tabpanel">
                                                <table class="table table-borderless">
                                                    <tr><th colspan="2">ลำน้ำที่เกิดปัญหาการกีดขวางทางน้ำ</th></tr>
                                                    <tr>
                                                        <th width="20%">ชื่อลำน้ำ  </th>
                                                        <td><input type="text" id="river_name" name="river_name" value='{{ $river[$id]->river_name ?? "" }}' placeholder="-- กรอกชื่อ --" ></td>
                                                    </tr>
                                                    <tr>
                                                        <th> เป็นสาขาของแม่น้ำ </th>
                                                        <td><input type="text" id="river_main" name="river_main" value='{{ $river[$id]->river_main ?? "" }}' placeholder="-- กรอกชื่อ --" ></td>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th> วันที่ทำการสำรวจ </th>
                                                        <td>
                                                            <!-- <input type="date" id="survey_date" name="survey_date" placeholder="dd-mm-yyyy" value='{{ $obj[$id]->survey_date }}'  > -->
                                                            <input type="text" name="survey_date" id="survey_date" value='{{ $obj[$id]->survey_date }}' />
                                                        </td>
                                                    </tr>
                                                </table>
                                                <br>
                                                {{-- 1 ลักษณะทั่วไป--}}
                                                <h4><span class="number">1 </span>  ลักษณะทั่วไป  </h4> </td>
                                                <table class="table table-borderless">
                                                    {{-- 1.1 --}}
                                                    <tr>
                                                        <th colspan="2" width="30%">1.1 ประเภทลำน้ำ  {{-- <span class="chatbox__button"><img src="{{ asset('images/question-mark.png') }} " /></span> --}}  </th>
                                                        <td>
                                                            <select id="river_type" name="river_type">
                                                                <option value="{{ $river[$id]->river_type }}">{{ $river[$id]->river_type }}</option>
                                                                <option value="แม่น้ำสายหลัก">แม่น้ำสายหลัก</option>
                                                                <option value="แม่น้ำสาขา">แม่น้ำสาขา</option>
                                                                <option value="ลำห้วย">ลำห้วย</option>
                                                                <option value="ลำเหมือง">ลำเหมือง</option>
                                                            </select>
                                                            <div class="invalid-feedback"></div>
                                                        </td>
                                                    </tr>
                                                    <tr><th colspan="2">1.2 ที่ตั้งของช่วงเวลาที่เกิดปัญหา  {{--  <span class="chatbox__button1"><img src="{{ asset('images/question-mark.png') }} " /></span>  --}} </th></tr>
                                                    <tr>
                                                        <td align="right" class="text_location">จังหวัด : </td>
                                                        <td colspan="2">
                                                            <select id="blk_province" name="blk_province" value=''>
                                                                <option value="เชียงใหม่">เชียงใหม่</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" class="text_location">อำเภอ : </td>
                                                        <td colspan="2">
                                                            <select id='blk_district' name='blk_district'  onchange="validateForm(this.id)">
                                                                <option value='{{ $obj[$id]->blockage_location->blk_district }}'>{{ $obj[$id]->blockage_location->blk_district }}</option>
                                                                <!-- Read district -->
                                                                @foreach($districtData['data'] as $village)
                                                                <option value='{{ $village->vill_district }}'>{{ $village->vill_district  }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="invalid-feedback"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" class="text_location">ตำบล : </td>
                                                        <td colspan="2">
                                                            <select id="blk_tumbol" name="blk_tumbol"  onchange="validateForm(this.id)">
                                                                <option value='{{ $obj[$id]->blockage_location->blk_tumbol }}'>{{ $obj[$id]->blockage_location->blk_tumbol }}</option>
                                                            </select>
                                                            <div class="invalid-feedback"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" class="text_location" >หมู่บ้าน : </td>
                                                        <td colspan="2">
                                                            <select id="blk_village" name="blk_village" onchange="validateForm(this.id)">
                                                                <option value='{{ $obj[$id]->blockage_location->blk_village }}'>{{ $obj[$id]->blockage_location->blk_village }}</option>
                                                            </select>
                                                            <div class="invalid-feedback"></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" class="text_location">หมายเหตุ : </td>
                                                        <td colspan="2">
                                                            <input type="text" id="comment" name="comment"  value='{{ $obj[$id]->blockage_location->comment }}'  >
                                                        </td>
                                                    </tr>
                                                </table>
                                                {{-- Location --}}
                                                <table>
                                                    <tr>
                                                        <td colspan="2">
                                                            <select name="crsSource" id="crsSource" onchange="updateCrs('Source')"  style="visibility:hidden;">
                                                                <option value selected="selected">Select a CRS</option>
                                                            </select>
                                                        </td>
                                                        <td colspan="2">
                                                            <select name="crsDest" id="crsDest" onchange="updateCrs('Dest')"  style="visibility:hidden;">
                                                                <option value selected="selected">Select a CRS</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <table style="margin-left:10px;" class="table table-borderless">
                                                    <tr>
                                                        <td colspan="4">พิกัดเริ่มต้นของปัญหา : {{-- <span class="chatbox__button2"><img src="{{ asset('images/question-mark.png') }} " /></span>--}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td width=10%> &nbsp;</td>
                                                        <td><input type="text" id="xstart" name="xstart" placeholder="UTM Easting" value='{{ $obj[$id]->blockage_location->blk_start_utm->coordinates[1] ?? "" }}'> </td>
                                                        <td><input type="text" id="ystart" name="ystart" placeholder="UTM Northing" value='{{ $obj[$id]->blockage_location->blk_start_utm->coordinates[0] ?? "" }}'></td>
                                                    </tr>
                                                    <tr>
                                                        <td> &nbsp;</td>
                                                        <td align="center" >
                                                            <button class="btn btn-outline-success waves-effect" type="button" onclick="transform()"> UTM >> Lat/Long  </button>  
                                                        </td>
                                                        <td align="center" >
                                                            <button class="btn btn-outline-success waves-effect" type="button" onclick="transformutm()">  Lat/Long >> UTM </button> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td > &nbsp;</td>
                                                        <td><input type="text" id="latstart" name="latstart" placeholder="Latitude" value='{{ $obj[$id]->blockage_location->blk_start_location->coordinates[1] ?? "" }}'></td>
                                                        <td><input type="text" id="longstart" name="longstart" placeholder="Longitude" value='{{ $obj[$id]->blockage_location->blk_start_location->coordinates[0] ?? "" }}'></td>
                                                    </tr>
                                                    <tr>
                                                        <td > &nbsp;</td>
                                                        <td colspan="2" align="center" >  <button class="btn btn-outline-success btn-lg btn-block waves-effect"  type="button" onclick="getStLocation()" >Location</button>
                                                    </tr>
                                                </table>
                                                <table style="margin-left:10px;" class="table table-borderless">
                                                    <tr>
                                                        <td colspan="4">พิกัดสิ้นสุดของปัญหา : {{-- <span class="chatbox__button3"><img src="{{ asset('images/question-mark.png') }} " /></span> --}} </td>
                                                    </tr>
                                                    <tr>
                                                        <td width=10%> &nbsp;</td>
                                                        <td><input type="text" id="xend" name="xend" placeholder="UTM Easting" value='{{ $obj[$id]->blockage_location->blk_end_utm->coordinates[1] ?? "" }}'></td>
                                                        <td><input type="text" id="yend" name="yend" placeholder="UTM Northing" value='{{ $obj[$id]->blockage_location->blk_end_utm->coordinates[0] ?? "" }}'></td>
                                                    </tr>
                                                    <tr>
                                                        <td> &nbsp;</td>
                                                        <td align="center" >
                                                            <button  class="btn btn-outline-success waves-effect"  type="button" onclick="transformend()" > UTM >> Lat/Long  </button>  
                                                        </td>
                                                        <td align="center" >
                                                            <button  class="btn btn-outline-success waves-effect"  type="button" onclick="transformendutm()"> Lat/Long >> UTM </button> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td > &nbsp;</td>
                                                        <td><input type="text" id="latend" name="latend" placeholder="Latitude" value='{{ $obj[$id]->blockage_location->blk_end_location->coordinates[1] ?? "" }}'></td>
                                                        <td><input type="text" id="longend" name="longend" placeholder="Longitude" value='{{ $obj[$id]->blockage_location->blk_end_location->coordinates[0] ?? "" }}'></td>
                                                    </tr>
                                                    <tr>
                                                        <td > &nbsp;</td>
                                                        <td colspan="2" align="center" >  <button class="btn btn-outline-success btn-lg btn-block waves-effect"  type="button" onclick="getFinLocation()" >Location</button>
                                                    </tr>

                                                </table>
                                            
                                                {{-- 1.3 --}}
                                                <table class="table table-form table-borderless">
                                                    <tr>
                                                        <th colspan="4">1.3 หน้าตัดของลำน้ำเดิมในอดีตก่อนเกิดปัญหา </th>
                                                    </tr>
                                                    <tr>
                                                        <td width="9%"></td>
                                                        <td><input type="text" id="cross_width_past" name="past[width]" placeholder="กว้าง (ม.)" value='{{ $blk_crossection_past->width ?? "" }}' ></td>
                                                        <td><input type="text" id="cross_depth_past" name="past[depth]" placeholder="ลึก (ม.)" value='{{ $blk_crossection_past->depth ?? "" }}' ></td>
                                                        <td><input type="text" id="cross_slope_past" name="past[slop]" placeholder="ความลาดชันตลิ่ง" value='{{ $blk_crossection_past->slop ?? "" }}' ></td>
                                                    </tr>
                                                </table>
                                                {{-- 1.4 --}}
                                                <table class="table table-form table-borderless">
                                                    <tr>
                                                        <th colspan="4">1.4 หน้าตัดของช่วงลำน้ำในปัจจุบันที่เกิดปัญหา </th>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left:20px;" colspan="3">1.4.1. หน้าตัดของลำน้ำ<b>ก่อน</b>ถึงช่วงที่เริ่มที่เกิดปัญหา </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="9%"></td>
                                                        <td><input type="text" id="cross_width_now" name="current_start[width]" placeholder="กว้าง (ม.)" value='{{ $blk_crossection_current_start->width ?? "" }}'  ></td>
                                                        <td><input type="text" id="cross_depth_now" name="current_start[depth]" placeholder="ลึก (ม.)" value='{{ $blk_crossection_current_start->depth ?? "" }}'  ></td>
                                                        <td><input type="text" id="cross_slope_now" name="current_start[slop]" placeholder="ความลาดชันตลิ่ง" value='{{ $blk_crossection_current_start->slop ?? "" }}'  ></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" style="padding-left:20px;">1.4.2. หน้าตัดของลำน้ำที่<b>แคบที่สุด</b>ในช่วงของลำน้ำที่เกิดปัญหา </td>
                                                    </tr>
                                                    <tr>
                                                        <td width=10%></td>
                                                        <td ><input type="checkbox" id="xsection_status" name="current_narrow[type]" value="waterway"  {{checktext($blk_crossection_current_narrow->width ?? "" )}}  /><label for="xsection_status"> ทางน้ำเปิด </label></td>
                                                        <td><input type="text" id="cross_width_narrow" name="current_narrow[width]" placeholder="กว้าง (ม.)" value='{{ $blk_crossection_current_narrow->width ?? "" }}' ></td>
                                                        <td><input type="text" id="cross_depth_narrow" name="current_narrow[depth]" placeholder="ลึก (ม.)" value='{{ $blk_crossection_current_narrow->depth ?? "" }}' ></td>
                                                        <td><input type="text" id="cross_slope_narrow" name="current_narrow[slop]" placeholder="ความลาดชันตลิ่ง" value='{{ $blk_crossection_current_narrow->slop ?? "" }}' ></td>
                                                    </tr>
                                                    <tr>
                                                        <td width=10%></td>
                                                        <td ><input type="checkbox" id="bridge" name="current_narrow[type]" value="bridge"  {{checktext($blk_crossection_current_brigde->width)}} /><label for="bridge"> สะพาน </label></td>
                                                        <td><input type="text" id="cross_width_bridge" name="current_bridge[width]" placeholder="กว้าง (ม.)" value='{{ $blk_crossection_current_brigde->width ?? "" }}' ></td>
                                                        <td><input type="text" id="cross_depth_bridge" name="current_bridge[depth]" placeholder="ลึก (ม.)" value='{{ $blk_crossection_current_brigde->depth ?? "" }}' ></td>
                                                        <td><input type="text" id="cross_len_bridge" name="current_bridge[len]" placeholder="ความยาวช่วงตอม่อ (ม.)" value='{{ $blk_crossection_current_brigde->len ?? "" }}' ></td>
                                                        <td><input type="text" id="cross_num_bridge" name="current_bridge[num]" placeholder="จำนวนตอม่อ (แถว)" value='{{ $blk_crossection_current_brigde->num ?? "" }}' ></td>
                                                    </tr>
                                                    <tr>
                                                        <td ></td>
                                                        <td ><input type="checkbox"  id="culvert_round" value="round" name="current_narrow[culvert][round]" {{checktext($blk_crossection_current_narrow->culvert->diameter)}} ><label for="culvert_round">ท่อกลม</label></td>
                                                        <td><input type="text" id="diameter_culvert" name="current_narrow[culvert][diameter]" placeholder="เส้นผ่าศูนย์กลาง (ม.)" value='{{ $blk_crossection_current_narrow->culvert->diameter ?? "" }}'  ></td>
                                                        <td><input type="text" id="num_culvert1" name="current_narrow[culvert][c][num]" step="any" placeholder="จำนวนท่อ (ช่อง)" value='{{ $blk_crossection_current_narrow->culvert->c->num ?? "" }}' > </td>
                                                        <td><input type="text" id="len_culvert1" name="current_narrow[culvert][c][len]" step="any" placeholder="ยาว (ม.)" value='{{ $blk_crossection_current_narrow->culvert->c->len ?? "" }}' > </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <input type="hidden" name="current_narrow[type]" value="culvert"></td>
                                                        <td ><input type="checkbox" id="culvert_square" value="square" name="current_narrow[culvert][sq]" {{checktext($blk_crossection_current_narrow->culvert->width)}} ><label for="culvert_square">ท่อเหลี่ยม</label></td>
                                                        <td ><input type="text" id="width_culvert" name="current_narrow[culvert][width]" placeholder="กว้าง (ม.)" value='{{ $blk_crossection_current_narrow->culvert->width ?? "" }}' ></td>
                                                        <td ><input type="text" id="high_culvert" name="current_narrow[culvert][high]" placeholder="สูง (ม.)" value='{{ $blk_crossection_current_narrow->culvert->high ?? "" }}'></td>
                                                        <td ><input type="text" id="num_culvert2" name="current_narrow[culvert][sq][num]" placeholder="จำนวนท่อ (ช่อง)" step="any" value='{{ $blk_crossection_current_narrow->culvert->sq->num ?? "" }}' ></td>
                                                        <td><input type="text" id="len_culvert2" name="current_narrow[culvert][sq][len]" step="any" placeholder="ยาว (ม.)" value='{{ $blk_crossection_current_narrow->culvert->sq->len ?? "" }}' > </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <input type="hidden" name="current_narrow[type]" value="other"  ></td>
                                                        <td valign="top"><input type="checkbox" id="xsection_status3" name="current_narrow[type]" value="other" {{checktext($blk_crossection_current_narrow->other )}}/><label for="xsection_status3">อื่นๆ</label></td>
                                                        <td colspan="4"><input type="text" id="current_narrow" name="current_narrow[other]" value="{{ $blk_crossection_current_narrow->other ?? "" }}"> </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" style="padding-left:20px;">1.4.3. หน้าตัดของลำน้ำ<b>ท้ายน้ำ</b>หลังช่วงที่เกิดปัญหา </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="text" id="cross_width_end" name="current_end[width]" placeholder="กว้าง (ม.)" value='{{ $blk_crossection_current_end->width ?? "" }}' ></td>
                                                        <td><input type="text" id="cross_depth_end" name="current_end[depth]" placeholder="ลึก (ม.)" value='{{ $blk_crossection_current_end->depth ?? "" }}' ></td>
                                                        <td><input type="text" id="cross_slope_end" name="current_end[slope]" placeholder="ความลาดชันตลิ่ง" value='{{ $blk_crossection_current_end->slope ?? "" }}' ></td>
                                                        </tr>
                                                </table>
                                                {{-- 1.5 --}}
                                                <table class="table table-form table-borderless">
                                                    <tr>
                                                        <th colspan="3">1.5 ความยาวของช่วงลำน้ำที่เกิดปัญหา {{$obj[0]->blk_length_type}}</th>
                                                    </tr>
                                                </table>
                                                <table class="table table-form table-borderless" width=80%>
                                                    <tr>
                                                        <td width=10%></td>
                                                        <td width=25%><input type="radio" id="blk_length1"  name="blk_length_type" value="น้อยกว่า 10 เมตร" {{checksame($obj[0]->blk_length_type,"น้อยกว่า 10 เมตร")}}><label for="blk_length1">น้อยกว่า 10 เมตร. </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td width=10%></td>
                                                        <td><input type="radio" id="blk_length2"  name="blk_length_type"  value="10 -1000 เมตร" {{checksame($obj[0]->blk_length_type,"10 -1000 เมตร")}} ><label for="blk_length2"> 10 -1000 เมตร.</label></td>
  
                                                        <td> <select id="blk_length_lo" name="blk_length_lo" >
                                                            <option value="{{$len_prob_value_btw}}">{{$len_prob_value_btw}}</option>
                                                            <option value="10-50 เมตร">10-50 เมตร</option>
                                                            <option value="50-100 เมตร">50-100 เมตร</option>
                                                            <option value="100-200 เมตร">100-200 เมตร</option>
                                                            <option value="200-400 เมตร">200-400 เมตร</option>
                                                            <option value="400-600 เมตร">400-600 เมตร</option>
                                                            <option value="600-800 เมตร">600-800 เมตร</option>
                                                            <option value="800-1000 เมตร">800-1000 เมตร</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width=10%></td>
                                                        <td><input type="radio" id="blk_length3"  name="blk_length_type"value="มากกว่า 1 กิโลเมตร" {{checksame($obj[0]->blk_length_type,"มากกว่า 1 กิโลเมตร")}} ><label for="blk_length3">มากกว่า 1 กิโลเมตร</label></td>
                                                        <td><input type="text" id="blk_length_1k"  name="blk_length_more1" placeholder='{{ $len_morekm ?? "" }}' value='{{$len_prob_value}}'></td>
                                                    </tr>    
                                                </table>
                                                {{-- 1.6 --}}
                                                <table class="table table-form table-borderless">
                                                    <tr>
                                                        <th width=20%>1.6 การดาดผิวของลำน้ำ </th>
                                                        <td width=20%><input type="radio" id="blk_surface1" value="ไม่ดาดผิว" name="blk_surface" {{checksame($obj[0]->blk_surface,"ไม่ดาดผิว")}}><label for="blk_surface1">ไม่ดาดผิว</label></td>
                                                        <td><input type="radio" id="blk_surface2" value="ดาดผิว" name="blk_surface" {{checksame($obj[0]->blk_surface,"ดาดผิว")}} ><label for="blk_surface2">ดาดผิว</label></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right">วัสดุที่ดาดผิวของลำน้ำ : </td>
                                                        <td colspan="2"><input type="text" id="blk_surface_detail" name="blk_surface_detail" placeholder="ระบุวัสดุ" value='{{ $obj[$id]->blk_surface_detail  }}'></td>
                                                    </tr>
                                                </table>
                                                {{-- 1.7 --}}
                                                <table class="table table-form table-borderless">
                                                    <tr>
                                                        <th width=30%>1.7 ความลาดชันท้องน้ำช่วงที่เกิดปัญหา </th>
                                                        <td colspan="2"><input type="text" id="blk_slope_bed" name="blk_slope_bed" placeholder="ระบุความลาดชัน" value="{{$obj[$id]->blk_slope_bed}}"> </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- END Step 1 -->

                                            <!-- Step 2 -->
                                            <div class="tab-pane" id="wizard-progress-step2" role="tabpanel">
                                                {{-- 2 ความเสียหาย --}}
                                                <h4><span class="number">2</span>ความเสียหายที่เคยเกิดขึ้น</h4>
                                                <table class="table table-form table-borderless" >
                                                    <tr>
                                                        <th colspan="6">2.1 ลักษณะของความเสียหาย </th>
                                                    </tr>
                                                </table>
                                                <table align="center"  class="table-damages table-borderless" width="80%">
                                                    <tr>
                                                        <td colspan="3"><input type="hidden" name="damage_type[flood]" value="0">
                                                            <input type="checkbox" id="damage_type1"  name="damage_type[flood]" value="1" onclick="damageLevelRadioValidation()" {{add($damage_type->flood)}}> 
                                                            <label for="damage_type1">น้ำท่วม</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="5%"></td>
                                                        <td class="loc_damage"><input type="hidden" name="damage_level[flood]" value="0">
                                                            <input type="radio" id="damageflood1" name="damage_level[flood]" value="low" {{checksame($damage_level->flood,"low")}} /><label for="damageflood1">น้อย</label></td>
                                                        <td class="loc_damage"><input type="radio" id="damageflood2" name="damage_level[flood]" value="medium" {{checksame($damage_level->flood,"medium")}}/><label for="damageflood2"> ปานกลาง</label></td>
                                                        <td class="loc_damage"><input type="radio" id="damageflood3" name="damage_level[flood]" value="high" {{checksame($damage_level->flood,"high")}}/> <label for="damageflood3">มาก</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><input type="hidden" name="damage_type[waste]" value="0">
                                                            <input type='checkbox' id="damage_type2"  name='damage_type[waste]' value="1" {{add($damage_type->waste)}} onclick="damageLevelRadioValidation()">
                                                            <label for="damage_type2">น้ำเสีย</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="5%"></td>
                                                        <td class="loc_damage"><input type="hidden" name="damage_level[waste]" value="0">
                                                            <input type="radio" id="damagewaste1" name="damage_level[waste]" value="low" {{checksame($damage_level->waste,"low")}}  /><label for="damagewaste1">น้อย</label></td>
                                                        <td class="loc_damage"><input type="radio" id="damagewaste2" name="damage_level[waste]" value="medium" {{checksame($damage_level->waste,"medium")}} /><label for="damagewaste2"> ปานกลาง</label></td>
                                                        <td class="loc_damage"><input type="radio" id="damagewaste3" name="damage_level[waste]" value="high" {{checksame($damage_level->waste,"high")}} /> <label for="damagewaste3">มาก</label></td>

                                                    </tr>
                                                    <tr >
                                                        <td colspan="3"><input type="hidden" name="damage_type[other]" value="0">
                                                                        <input type="checkbox" id="damage_type3"  name='damage_type[other]' value="1"  {{add($damage_type->other)}} onclick="damageLevelRadioValidation()">
                                                                        <label for="damage_type3">อื่นๆ </label>
                                                            <input type="hidden" name="damage_level[other][detail]" value="NULL">
                                                            <input class="textbox" name="damage_level[other][detail]" id="damageotherdetail" size="5" placeholder="ระบุ" value="{{$damage_level->other->detail}}" >
                                                        </td>
                                                    </tr>
                                                    <tr >
                                                        <td width="5%"></td>
                                                        <td class="loc_damage"><input type="hidden" name="damage_level[other][level]" value="0">
                                                            <input type="radio" id="damageother1" name="damage_level[other][level]" value="low" {{checksame($damage_level->other->level,"low")}} >
                                                            <label for="damageother1"> น้อย </label>
                                                        </td>
                                                        <td class="loc_damage"><input type="radio" id="damageother2" name="damage_level[other][level]" value="medium"  {{checksame($damage_level->other->level,"medium")}} > <label for="damageother2">ปานกลาง </label></td>
                                                        <td class="loc_damage"><input type="radio" id="damageother3" name="damage_level[other][level]" value="high" {{checksame($damage_level->other->level,"high")}} > <label for="damageother3">มาก </label></td>
                                                    </tr>
                                                </table>

                                                <table class="table table-form table-borderless">
                                                    <tr>
                                                        <th colspan="5">2.2 ความถี่ที่เกิดความเสียหาย </th>
                                                    </tr>
                                                </table>
                                                <table align="center" width="80%" class="table table-form table-borderless">
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2"><input type="radio" id="damage_frequency1" value="มากกว่า 4 ปีครั้ง" name="damage_frequency" {{checksame($obj[0]->damage_frequency,"มากกว่า 4 ปีครั้ง")}}><label for="damage_frequency1">มากกว่า 4 ปีครั้ง </label></td>
                                                        <td><input type="radio" id="damage_frequency2" value="2-4 ปีครั้ง" name="damage_frequency" {{checksame($obj[0]->damage_frequency,"2-4 ปีครั้ง")}}><label for="damage_frequency2" >2-4 ปีครั้ง </label></td>
                                                        <td><input type="radio" id="damage_frequency3" value="ทุกปี" name="damage_frequency" {{checksame($obj[0]->damage_frequency,"ทุกปี")}} > <label for="damage_frequency3">ทุกปี </label></td>

                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- END Step 2 -->

                                            <!-- Step 3 -->
                                            <div class="tab-pane" id="wizard-progress-step3" role="tabpanel">
                                                {{-- ข้อ 3 สภาพปัญหา --}}
                                                <span class="number">3</span>สภาพปัญหา
                                                <table  class="table table-form table-borderless">
                                                    <tr>
                                                        <th colspan="6">3.1 สาเหตุการกีดขวางลำน้ำโดย (เลือกได้หลายข้อ) </th>
                                                    </tr>
                                                </table>
                                                <table align="center" class="table table-form table-borderless" >
                                                    {{-- ธรรมชาติ --}}
                                                        <tr>
                                                        <td colspan="2">ธรรมชาติ</td>
                                                        </tr>
                                                        <tr>
                                                            
                                                            <td><input type="checkbox" id="nat_erosion" name="nat_erosion" {{add($blk_problem_detail[$id]->nat_erosion)}}  /> <label for="nat_erosion"> ตลิ่งพัง, การกัดเซาะ </label></td>
                                                            <td><input type="checkbox" id="nat_shoal" name="nat_shoal"   {{add ($blk_problem_detail[$id]->nat_shoal)}} /><label for="nat_shoal"> การทับถมของตะกอน (ลำน้ำตื้นเขิน)</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" id="nat_missing" name="nat_missing" {{add($blk_problem_detail[$id]->nat_missing)}} /><label for="nat_missing">ลำน้ำขาดหาย</label></td>
                                                            <td><input type="checkbox" id="nat_winding" name="nat_winding" {{add($blk_problem_detail[$id]->nat_winding )}} /> <label for="nat_winding">ลำน้ำคดเคี้ยวมาก </label></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><input type="checkbox" id="nat_weed" name="nat_weed" {{add($blk_problem_detail[$id]->nat_weed)}}> <label for="nat_weed"> วัชพืช : </label>
                                                                <textarea  class="textbox"  id="nat_cause_5_detail" name="nat_weed_detail" placeholder="ระบุวัชพืช" value={{$blk_problem_detail[$id]->nat_weed_detail}}>{{$blk_problem_detail[$id]->nat_weed_detail}}</textarea>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><input type="checkbox" id="nat_other" name="nat_other" {{add($blk_problem_detail[$id]->nat_other)}} > <label for="nat_other"> อื่นๆ : </label>
                                                            <textarea class="textbox" id="nat_cause_6_detail" name="nat_other_detail" placeholder="ระบุ" value={{$blk_problem_detail[$id]->nat_other_detail}}> {{$blk_problem_detail[$id]->nat_other_detail}}</textarea></td>
                                                        </tr>
                                                        {{-- มนุษย์ --}}
                                                        <tr>
                                                            <td colspan="2">มนุษย์</td>
                                                        </tr>
                                                        {{-- สิ่งปลูกสร้าง --}}
                                                        <tr>
                                                            <td colspan="2"><i class="fas fa-angle-double-right"> </i> สิ่งปลูกสร้าง </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-left:20px;" colspan="2"><input type="checkbox" id="hum_str_gov" name="hum_str_owner_type" value="ราชการ" {{checktext($blk_problem_detail[$id]->hum_stc_bld_num)}}><label for="hum_str_gov">เป็นส่วนราชการ </label></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <table align="center" class="table table-form table-borderless">
                                                                    <tr>

                                                                        <td >ส่วนของอาคาร</td><td> <input type="text" id="hum_stc_bld_num" name="hum_stc_bld_num" placeholder="ระบุ (หลัง)" value='{{ $blk_problem_detail[$id]->hum_stc_bld_num }}' ></td>
                                                                        <td >รั้ว</td><td><input type="text" id="hum_stc_fence_num" name="hum_stc_fence_num" placeholder="ระบุ  (หลัง)" value='{{ $blk_problem_detail[$id]->hum_stc_fence_num}}'></td>
                                                                        <td >อื่นๆ </td><td><input type="text" id="hum_str_other" name="hum_str_other" placeholder="ระบุ" value='{{$blk_problem_detail[$id]->hum_str_other }}'></td>

                                                                    </tr>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                        <td style="padding-left:20px;" colspan="2"><input type="checkbox" id="hum_str_bu" name="hum_str_owner_type" value="เอกชน"  {{checktext($blk_problem_detail[$id]->hum_stc_bld_bu_num)}} /><label for="hum_str_bu">เป็นสวนของเอกชนหรือส่วนบุคคล </label></td>
                                                        </tr>
                                                        <tr>
                                                        <td colspan="2">
                                                            <table align="center" class="table table-form table-borderless">
                                                                <tr>
                                                                    <td >ส่วนของอาคาร</td><td> <input type="text" id="hum_stc_bld_bu_num" name="hum_stc_bld_bu_num" placeholder="ระบุ (หลัง)" value='{{ $blk_problem_detail[$id]->hum_stc_bld_bu_num }}'> </td>
                                                                    <td >รั้ว</td><td><input type="text" id="hum_stc_fence_bu_num" name="hum_stc_fence_bu_num" placeholder="ระบุ  (หลัง)" value='{{ $blk_problem_detail[$id]->hum_stc_fence_bu_num }}'> </td>
                                                                    <td >อื่นๆ </td><td><input type="text" id="hum_str_other_bu" name="hum_str_other_bu" placeholder="ระบุ" value='{{$blk_problem_detail[$id]->hum_str_other_bu}}' ></td>

                                                                </tr>
                                                            </table>
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                        <td style="padding-bottom:20px;"></td>
                                                        </tr>
                                                        
                                                        {{-- infa --}}
                                                        <tr>
                                                            <td colspan="2"><i class="fas fa-angle-double-right"> </i>ระบบสาธารณูปโภค (ถนน ท่อลอด สะพานและอื่นๆ) </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-left:40px;"><input type="checkbox" id="hum_road" name="hum_road" {{add($blk_problem_detail[$id]->hum_road)}}><label for="hum_road">ถนนขวางทางน้ำ </label></td>
                                                            <td style="padding-left:40px;"><input type="checkbox" id="hum_smallconvert" name="hum_smallconvert"  {{ add($blk_problem_detail[$id]->hum_smallconvert)}}><label for="hum_smallconvert">ท่อลอดถนนที่ตัดลำน้ำมีขนาดเล็กเกินไประบายน้ำหลากไม่ทัน</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-left:40px;"><input type="checkbox" id="hum_road_paralel" name="hum_road_paralel" {{ add($blk_problem_detail[$id]->hum_road_paralel )}} > <label for="hum_road_paralel">ถนนขนานลำน้ำสร้างกินพื้นที่ลำน้ำ </label></td>
                                                            <td style="padding-left:40px;"><input type="checkbox" id="hum_replaced_convert" name="hum_replaced_convert" {{ add($blk_problem_detail[$id]->hum_replaced_convert)}}><label for="hum_replaced_convert">วางท่อตามแนวลำน้ำทดแทนลำน้ำเดิม</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-left:40px;" colspan="2"> <input type="checkbox" id="hum_bridge_pile" name="hum_bridge_pile" {{ add($blk_problem_detail[$id]->hum_bridge_pile )}}><label for="hum_bridge_pile">สะพานมีหน้าตัดแคบเกินไป หรือมีต่อม่อมากเกินไปในช่วงฤดูน้ำหลากระบายไม่ทัน</label></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="padding-bottom:10px;"></td>
                                                        </tr>
                                                        <tr>
                                                            <td ><input type="checkbox" id="hum_soil_cover" name="hum_soil_cover" {{ add($blk_problem_detail[$id]->hum_soil_cover) }} /><label for="hum_soil_cover">การถมดิน </label></td>
                                                        </tr>
                                                        <tr>
                                                            <td ><input type="checkbox" id="hum_trash" name="hum_trash" {{add($blk_problem_detail[$id]->hum_trash)}} /><label for="hum_trash">สิ่งปฏิกูล </label></td>
                                                        </tr>
                                                        <tr>
                                                            <td><input type="checkbox" id="hum_other" name="hum_other"  {{add($blk_problem_detail[$id]->hum_other) }} onclick="causeOfDamageValidate()"/><label for="hum_other">อื่นๆ </label>
                                                                <textarea  class="textbox"  name="hum_other_detail" id="hum_other_detail" placeholder="ระบุ" value="{{$blk_problem_detail[$id]->hum_other_detail }}" /> {{$blk_problem_detail[$id]->hum_other_detail }}</textarea >
                                                            </td>
                                                        </tr>
                                                </table>
                                                {{-- 3.2 --}}
                                                <table class="table table-form table-borderless">
                                                    <tr>
                                                        <th colspan="6">3.2 ระดับกีดขวาง (เปอร์เซ็นต์คิดโดนพื้นที่ที่ถูกกีดขวางต่อพื้นที่ลำน้ำเดิม) </th>
                                                    </tr>
                                                </table>
                                                <table align="center" class="table table-form table-borderless"> 
                                                    <tr>
                                                        <td ><input type="radio" id="problevel1" name="prob_level" value="1-30%"  {{checksame($blk_problem_detail[$id]->prob_level,"1-30%")}}/> <label for="problevel1">น้อย (1-30%) </label></td>
                                                        <td ><input type="radio" id="problevel2" name="prob_level" value="30-70%" {{checksame($blk_problem_detail[$id]->prob_level,"30-70%")}}/><label for="problevel2">กลาง (30-70%)</label></td>
                                                        <td ><input type="radio" id="problevel3" name="prob_level" value="มากกว่า 70%" {{checksame($blk_problem_detail[$id]->prob_level,"มากกว่า 70%")}}/><label for="problevel3">มาก (มากกว่า 70%)</label></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- END Step 3 -->
                                            
                                            <!-- Step 4 -->
                                            <div class="tab-pane" id="wizard-progress-step4" role="tabpanel">
                                                {{-- ข้อ 4 การแก้ไข --}}
                                                <h4><span class="number">4</span> การดำเนินการแก้ไขของหน่วยงานท้องถิ่น และหน่วยงานที่รับผิดชอบ</h4>

                                                <table align="center" class="table table-form table-borderless">
                                                    <tr>
                                                        <td  colspan="6" >หน่วยงานที่รับผิดชอบ : 
                                                            <input class="textbox" id="responsed_dept" name="responsed_dept" value="{{$solution[0]->responsed_dept}}">
                                                            <div class="invalid-feedback"></div>
                                                        </td>
                                                    </tr>
                                                    <tr class="chooseBox">
                                                        <td colspan="5">
                                                            <input type="radio" id="sol_how" name="sol_how" value="ปรับปรุงแก้ไข" {{checksame($solution[0]->sol_how,"ปรับปรุงแก้ไข")}} onclick="solHowValidate()"><label for="sol_how">ปรับปรุงแก้ไขโดย </label>
                                                            <input class="textbox" id="responsed_dept2" name="sol_edit" placeholder="(วิธีแก้ไขหรือโครงการ)" value="{{$solution[0]->sol_edit}}" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr> <td ><input type="radio" id="sol_how2" name="sol_how" value="เจรจาให้รื้อถอน"  {{checksame($solution[0]->sol_how,"เจรจาให้รื้อถอน")}} ><label for="sol_how2">เจรจาให้รื้อถอน</label></td></tr>
                                                    <tr> <td  colspan="2"><input type="radio" id="sol_how3" name="sol_how" value="ฟ้องร้อง" {{checksame($solution[0]->sol_how,"ฟ้องร้อง")}} ><label for="sol_how3">ฟ้องร้อง</label></td></tr>
                                                    <tr> <td  colspan="2"><input type="radio" id="sol_how4" name="sol_how" value="รื้อถอน" {{checksame($solution[0]->sol_how,"รื้อถอน")}} ><label for="sol_how4">รื้อถอน</label></td></tr>
                                                    <tr> <td  colspan="2"><input type="radio" id="sol_how5" name="sol_how" value="ยังไม่ได้ดำเนินการ" {{checksame($solution[0]->sol_how,"ยังไม่ได้ดำเนินการ")}} ><label for="sol_how5">ยังไม่ได้ดำเนินการ</label></td></tr>
                                                    <tr> <td  colspan="2"><input type="checkbox" id="clear_sol"><label for="clear_sol">ล้างข้อมูลทั้งหมด</label> </td></tr>
                                                </table>
                                                {{-- 4.1 --}}
                                                <table class="table table-form table-borderless">
                                                    <tr>
                                                        <th colspan="6">4.1 ผลการดำเนินการ </th>
                                                    </tr>
                                                </table>
                                                <table class="table table-form table-borderless">
                                                    <tr> <td colspan="2"><input type="radio" id="result_selector1" name="result_selector" value="ได้ผลดีสามารถแก้ไขปัญหาได้"  {{checksame($solution[0]->result,"ได้ผลดีสามารถแก้ไขปัญหาได้")}} ><label for="result_selector1">ได้ผลดีสามารถแก้ไขปัญหาได้</label></td> </tr>
                                                    <tr> <td colspan="2"><input type="radio" id="result_selector2" name="result_selector" value="ได้ผลดีพอสมควรแก้ไขปัญหาได้บางส่วน"  {{checksame($solution[0]->result,"ได้ผลดีพอสมควรแก้ไขปัญหาได้บางส่วน")}} ><label for="result_selector2">ได้ผลดีพอสมควรแก้ไขปัญหาได้บางส่วน</label></td></tr>
                                                    <tr> <td colspan="2"><input type="radio" id="result_selector3" name="result_selector" value="ได้ผลไม่ดีเท่าที่ควรแก้ไขปัญหาได้น้อย"{{checksame($solution[0]->result,"ได้ผลไม่ดีเท่าที่ควรแก้ไขปัญหาได้น้อย")}}   ><label for="result_selector3"> ได้ผลไม่ดีเท่าที่ควรแก้ไขปัญหาได้น้อย</label></td></tr>
                                                    <tr> <td colspan="2"><input type="radio" id="result_selector4" name="result_selector" value="ไม่ได้ผล" {{checksame($solution[0]->result,"ไม่ได้ผล")}}   ><label for="result_selector4"> ไม่ได้ผล </label></td></tr>
                                                    <tr> <td  colspan="2"><input type="checkbox" id="clear_result"><label for="clear_result">ล้างข้อมูลทั้งหมด</label> </td></tr>
                                                </table>
                                                {{-- 4.2 --}}
                                                <table class="table table-form table-borderless">
                                                    <tr>
                                                        <th colspan="6">4.2 สถานภาพปัจจุบันของโครงการที่แก้ไขปัญหาได้ </th>
                                                    </tr>

                                                </table>
                                                <table align="center" width="70%" class="table table-form table-borderless">
                                                    <tr>
                                                        <td><input type="radio" id="proj_status1" name="proj_status" value="plan"  {{checksame($project['proj_status'],"plan")}} onclick="projStatusValidate()" /><label for="proj_status1"> อยู่ในแผน </label></td>
                                                        <td><input type="text" id="proj_year" name="proj_year" step="any" placeholder="ระบุปี พ.ศ" value='{{ $project['proj_year']  }}' disabled ></td> 
                                                        <td><input type="text" id="proj_name" name="proj_name" step="any" placeholder="ระบุชื่อโครงการ" value='{{ $project['proj_name_plan']  }}' disabled></td>
                                                        <td><input type="text" id="proj_budget" name="proj_budget" step="any" placeholder="ระบุงบประมาณ" value='{{ $project['proj_budget_plan'] }}' disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="radio" id="proj_status2" name="proj_status" value="received" {{checksame($project['proj_status'],"received")}} onclick="projStatusValidate()" / ><label for="proj_status2">ได้รับงบประมาณแล้ว</label></td>
                                                        <td><input type="text" id="proj_name2" name="proj_name2" step="any" placeholder="ระบุชื่อโครงการ" value='{{ $project['proj_name_rev']}}' disabled></td>
                                                        <td><input type="text" id="proj_budget2" name="proj_budget2" step="any" placeholder="ระบุงบประมาณ" value='{{ $project['proj_budget_rev'] }}' disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><input type="radio" id="proj_status3" name="proj_status" value="making" {{checksame($project['proj_status'],"making")}}  /><label for="proj_status3">กำลังปรับปรุงหรือก่อสร้าง</label> </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><input type="radio" id="proj_status4" name="proj_status" value="noplan" {{checksame($project['proj_status'],"noplan")}} /><label for="proj_status4">ยังไม่มีในแผน </label></td>
                                                    </tr>
                                                    <tr> <td  colspan="3"><input type="checkbox" id="clear_proj"><label for="clear_proj">ล้างข้อมูลทั้งหมด</label> </td></tr>
                                                </table>
                                            </div>
                                            <!-- END Step 4 -->
                                            
                                            
                                            <!-- Step 5 -->
                                            <div class="tab-pane" id="wizard-progress-step5" role="tabpanel">
                                                {{-- รูป--}}
                                                <span class="number">5</span><b>รูปภาพประกอบ <span class="chatbox__button18"><img src="{{ asset('images/question-mark.png') }} " /></span></b>
                                                <br><br>
                                                <div class="row">
                                                        <?php for($i=0;$i<count($obj[0]->photo);$i++){ ?>
                                                            <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3" style="margin-bottom: 10px;" >
                                                                {{checkphoto($obj[0]->photo[$i]->thumbnail_name)}}  
                                                            <br>
                                                                <font style="padding-left:15%;">{{$obj[0]->photo[$i]->photo_id}}  </font>
                                                            </div>
                                                               
                                                        <?php } ?>
                                                </div>
                                               
                                                <div class="row" style="height: 400px;"></div>
                                            
                                            </div>
                                            <!-- END Step 5 -->
                                            <!-- Step 6 -->
                                            <div class="tab-pane" id="wizard-progress-step6" role="tabpanel">
                                              <span class="number">6</span><b> สภาพปัญหาเบื้องต้นและแนวทางการแก้ไขปัญหา </b> <br><br>
                                              <div class="row">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr><td colspan="2" style="background-color:#C0C0C0">คำอธิบายสภาพปัญหา</td></tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="text-center" style="background-color:#C0C0C0" widht=30%>คำอธิบายสภาพปัญหาเบื้องต้น</td>
                                                                <td class="text-center" style="background-color:#C0C0C0" >ข้อมูลพื้นที่รับน้ำของตำแน่งที่เกิดปัญหา</td>
                                                            </tr>
                                                            <tr>
                                                                <td  ><textarea rows="8" cols="50" style="color:#000;" id="problem" name="problem"> {{$expert[0]->survey_problem}}</textarea></td>
                                                                <td rowspan="3">
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <td>พื้นที่ลาดชัน : </td>
                                                                            <td><input type="text"  id="exp_slope" name="exp_slope" value='{{$expert[0]->exp_slope}}'></td>
                                                                            <td></td>
                                                                        </tr>    
                                                                        <tr>
                                                                            <td>A =</td>
                                                                            <td><input type="text" id="exp_area" name="exp_area" value='{{$expert[0]->exp_area}}'></td>
                                                                            <td>ตารางกิโลเมตร</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> L0 =</td>
                                                                            <td><input type="text" id="exp_L0" name="exp_L0" value='{{$expert[0]->exp_L0}}'></td>
                                                                            <td>กิโลเมตร</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> H =</td>
                                                                            <td><input type="text" id="exp_H" name="exp_H" value='{{$expert[0]->exp_H}}'></td>
                                                                            <td>เมตร</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> C  =</td>
                                                                            <td><input type="text" id="exp_C" name="exp_C" value='{{$expert[0]->exp_C}}'></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> tc  =</td>
                                                                            <td><input type="text" id="exp_tc" name="exp_tc" value='{{$expert[0]->exp_tc}}'></td>
                                                                            <td>ชั่วโมง</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> I  =</td>
                                                                            <td><input type="text" id="exp_I" name="exp_I" value='{{$expert[0]->exp_I}}'></td>
                                                                            <td>มิลลิเมตร/ชั่วโมง</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> อัตราการไหลสูงสุด  =</td>
                                                                            <td><input type="text" id="exp_maxflow" name="exp_maxflow" value='{{$expert[0]->exp_maxflow}}'></td>
                                                                            <td>m<sup>3</sup>/s</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> Return period  =</td>
                                                                            <td><input type="text" id="exp_returnPeriod" name="exp_returnPeriod" value='{{$expert[0]->exp_returnPeriod}}'></td>
                                                                            <td>ปี</td>
                                                                        </tr>
                                                                    </table>  
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center" style="background-color:#C0C0C0">แนวทางการแก้ไขเบื้องต้น</td>
                                                        </tr>
                                                        <tr>
                                                            <td ><textarea rows="8" cols="50" id="exp_solution" name="exp_solution" style="color:#000;"> {{$expert[0]->survey_solution}}</textarea></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                              </div>
                                            </div>
                                            <!-- END Step 6 -->
                                        </div>
                                        <div class="block-content block-content-sm block-content-full bg-body-light rounded-bottom">
                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-secondary" data-wizard="prev">
                                                        <i class="fa fa-angle-left mr-1"></i> Previous
                                                    </button>
                                                </div>
                                                <div class="col-6 text-right">
                                                    <button type="button" class="btn btn-secondary" data-wizard="next">
                                                        Next <i class="fa fa-angle-right ml-1"></i>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary d-none" data-wizard="finish">
                                                        <i class="fa fa-check mr-1"></i> Submit
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
         
                   
    </div>
@endsection