@extends('layouts.app_admin')

@section('content')
    <div class="dashboard-main-wrapper">
        @include('includes.head')
        @include('includes.header')
        <div class="dashboard-wrapper">
            <div class="row" style="padding:30px;">
                <h4><a href="{{ asset('/blocker') }}">รายละเอียดแบบสำรวจ </a> &raquo; เพิ่มแบบสำรวจใหม่ </h4>
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
                                            <a class="nav-link" href="#wizard-progress-step2" data-toggle="tab">ความเสียหาย</a>
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

                                    <form action="{{route('form.storeform')}}" method="post" enctype="multipart/form-data" onsubmit="return confirm('บันทึกข้อมูล เรียบร้อย !!');" >
                                        {{ csrf_field() }}
                                        <!-- Wizard Progress Bar -->
                                        <div class="block-content block-content-sm">
                                            <div class="progress" data-wizard="progress" style="height: 8px;">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                        <!-- END Wizard Progress Bar -->

                                       <!-- Steps Content -->
                                       <div class="block-content block-content-full tab-content" style="min-height: 300px;">
                                            <!-- Step 1 -->
                                            <div class="tab-pane active" id="wizard-progress-step1" role="tabpanel">
                                                <div class="table-responsive">
                                                    <table class="table table-borderless">
                                                        <tr><th colspan="2">ลำน้ำที่เกิดปัญหาการกีดขวางทางน้ำ</th></tr>
                                                        <tr>
                                                            <th width=20%>ชื่อลำน้ำ  </th>
                                                            <td ><input type="text" id="river_name" name="river_name" placeholder="-- กรอกชื่อ --" required onchange="validateForm(this.id)">
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th> เป็นสาขาของแม่น้ำ </th>
                                                            <td><input type="text" id="river_main" name="river_main" placeholder="-- กรอกชื่อ --" >
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th> วันที่ทำการสำรวจ </th>
                                                            <td>
                                                                <!-- <input type="date" id="survey_date" name="survey_date" placeholder="dd-mm-yyyy" placeholder="-- กรอกวันที่ --" isBuddhist: true > -->
                                                                <input type="text" name="survey_date" id="survey_date" />
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <br>
                                                {{-- 1 ลักษณะทั่วไป--}}
                                                <h4><span class="number">1 </span>  ลักษณะทั่วไป  </h4> </td>
                                                <div class="table-responsive">
                                                    <table class="table table-borderless">
                                                        {{-- 1.1 --}}
                                                        <tr>
                                                            <th width=30%>1.1 ประเภทลำน้ำ  {{-- <span class="chatbox__button"><img src="{{ asset('images/question-mark.png') }} " /></span> --}}  </th>
                                                            <td>
                                                                <select id="river_type" name="river_type">
                                                                    <option value="">-- เลือกประเภท --</option>
                                                                    <option value="แม่น้ำสายหลัก">แม่น้ำสายหลัก</option>
                                                                    <option value="แม่น้ำสาขา">แม่น้ำสาขา</option>
                                                                    <option value="ลำห้วย">ลำห้วย</option>
                                                                    <option value="ลำเหมือง">ลำเหมือง</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                    <table class="table table-borderless">
                                                        <tr><th colspan="2">1.2 ที่ตั้งของช่วงเวลาที่เกิดปัญหา  {{--  <span class="chatbox__button1"><img src="{{ asset('images/question-mark.png') }} " /></span>  --}} </th></tr>
                                                        <tr>
                                                            <td align="right" width=30% class="text_location">จังหวัด  </td>
                                                            <td colspan="2">
                                                                <select id='blk_province' name='blk_province' >
                                                                    <option value='เชียงใหม่'> เชียงใหม่ </option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="text_location">อำเภอ  </td>
                                                            <td colspan="2">
                                                                <select id='blk_district' name='blk_district' required onchange="validateForm(this.id)">
                                                                    <option value=''>-- เลือกอำเภอ --</option>
                                                                    <!-- Read district -->
                                        
                                                                    @foreach($districtData['data'] as $village)
                                                                        <option value='{{ $village->vill_district }}'>{{ $village->vill_district  }}</option>
                                                                    @endforeach
                                                                        
                                                                </select>
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="text_location">ตำบล  </td>
                                                            <td colspan="2">
                                                                <select id="blk_tumbol" name="blk_tumbol"  onchange="validateForm(this.id)">
                                                                    <option value=''>-- เลือกตำบล --</option>
                                                                </select>
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="text_location">หมู่บ้าน  </td>
                                                            <td colspan="2">
                                                                <select id="blk_village" name="blk_village"  onchange="validateForm(this.id)">
                                                                    <option value=''>-- เลือกหมู่บ้าน --</option>
                                                                </select>
                                                                <div class="invalid-feedback"></div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right" class="text_location">หมายเหตุ </td>
                                                            <td colspan="2">
                                                                <input type="text" id="comment" name="comment" >
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
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
                                                        <td colspan="3" >พิกัดเริ่มต้นของปัญหา : {{-- <span class="chatbox__button2"><img src="{{ asset('images/question-mark.png') }} " /></span>--}} </td>
                                                        
                                                    </tr>
                                                    <tr>
                                                        <td width=10%> &nbsp;</td>
                                                        <td><input type="text" id="xstart" name="xstart" placeholder="UTM Easting" maxlength="6"  required> 
                                                            <div class="invalid-feedback"></div> 
                                                        </td>
                                                        <td><input type="text" id="ystart" name="ystart" placeholder="UTM Northing" maxlength="7"  required>
                                                            <div class="invalid-feedback"></div>
                                                        </td>
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
                                                        <td ><input type="text" id="latstart" name="latstart" placeholder="Latitude" required> <div class="invalid-feedback"></div></td>
                                                        <td  ><input type="text" id="longstart" name="longstart" placeholder="Longitude" required>
                                                            <div class="invalid-feedback"></div>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td > &nbsp;</td>
                                                        <td colspan="2" align="center" >  <button class="btn btn-outline-success btn-lg btn-block waves-effect"  type="button" onclick="getStLocation()" >Location</button>
                                                    </tr>
                                                </table>
                                                <table style="margin-left:10px;" class="table table-borderless">
                                                    <tr>
                                                        <td colspan="3">พิกัดสิ้นสุดของปัญหา : {{-- <span class="chatbox__button3"><img src="{{ asset('images/question-mark.png') }} " /></span> --}} </td>
                                                    </tr>

                                                    <tr>
                                                        <td width=10%> &nbsp;</td>
                                                        <td><input type="text" id="xend" name="xend" placeholder="UTM Easting" maxlength="6" required>
                                                            <div class="invalid-feedback"></div> 
                                                        </td>
                                                        <td><input type="text" id="yend" name="yend" placeholder="UTM Northing" maxlength="7" required >
                                                            <div class="invalid-feedback"></div>
                                                        </td>
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
                                                        <td ><input type="text" id="latend" name="latend" placeholder="Latitude" required> <div class="invalid-feedback"></div></td>
                                                        <td  ><input type="text" id="longend" name="longend" placeholder="Longitude" required>
                                                            <div class="invalid-feedback"></div>
                                                        </td>

                                                    </tr>
                                                    <tr>
                                                        <td > &nbsp;</td>
                                                        <td colspan="2" align="center" >  <button class="btn btn-outline-success btn-lg btn-block waves-effect"  type="button" onclick="getFinLocation()" >Location</button>
                                                </tr>

                                                </table>
                                            
                                                {{-- 1.3 --}}
                                                <table class="table table-form table-borderless">
                                                    <tr>
                                                        <th colspan="4">1.3 หน้าตัดของลำน้ำ<b>เดิม</b>ในอดีตก่อนเกิดปัญหา <span class="chatbox__button4"><img src="{{ asset('images/question-mark.png') }} " /></span> </th>
                                                    </tr>
                                                    <tr>
                                                        <td width="9%"></td>
                                                        <td><input type="text" id="cross_width_past" name="past[width]" placeholder="กว้าง (ม.)" step="any"  > </td>
                                                        <td><input type="text" id="cross_depth_past" name="past[depth]" placeholder="ลึก (ม.)" step="any" > </td>
                                                        <td><input type="text" id="cross_slope_past" name="past[slop]" placeholder="ความลาดชันตลิ่ง" step="any"  ></td>
                                                    </tr>
                                                </table>
                                                {{-- 1.4 --}}
                                                <table class="table table-form table-borderless">

                                                    <tr>
                                                        <th colspan="4">1.4 หน้าตัดของช่วงลำน้ำในปัจจุบันที่เกิดปัญหา <span class="chatbox__button5"> {{-- <img src="{{ asset('images/question-mark.png') }} " /></span> --}} </th>
                                                    </tr>
                                                    <tr>

                                                        <td style="padding-left:20px;" colspan="3">1.4.1. หน้าตัดของลำน้ำ<b>ก่อน</b>ถึงช่วงที่เริ่มที่เกิดปัญหา  <span class="chatbox__button6"><img src="{{ asset('images/question-mark.png') }} " /></span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="9%"></td>
                                                        <td><input type="text" id="cross_width_now" name="current_start[width]" placeholder="กว้าง (ม.)" step="any" ></td>
                                                        <td><input type="text" id="cross_depth_now" name="current_start[depth]" placeholder="ลึก (ม.)" step="any" ></td>
                                                        <td><input type="text" id="cross_slope_now" name="current_start[slop]" placeholder="ความลาดชันตลิ่ง" step="any" > </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" style="padding-left:20px;">1.4.2. หน้าตัดของลำน้ำที่<b>แคบที่สุด</b>ในช่วงของลำน้ำที่เกิดปัญหา    <span class="chatbox__button7"><img src="{{ asset('images/question-mark.png') }} " /></span> </td>
                                                    </tr>
                                                    <tr>
                                                        <td width=10%></td>
                                                        <td ><input type="checkbox" id="xsection_status" name="current_narrow[type]" value="waterway" /><label for="xsection_status"> ทางน้ำเปิด </label></td>
                                                        <td><input type="text" id="cross_width_narrow" name="current_narrow[width]" placeholder="กว้าง (ม.)" ></td>
                                                        <td><input type="text" id="cross_depth_narrow" name="current_narrow[depth]" placeholder="ลึก (ม.)" ></td>
                                                        <td><input type="text" id="cross_slope_narrow" name="current_narrow[slop]" placeholder="ความลาดชันตลิ่ง"  ></td>
                                                    </tr>

                                                    <tr>
                                                        <td width=10%></td>
                                                        <td ><input type="checkbox" id="bridge" name="current_narrow[type]" value="bridge" /><label for="bridge"> สะพาน </label></td>
                                                        <td><input type="text" id="cross_width_bridge" name="current_bridge[width]" placeholder="กว้าง (ม.)"  ></td>
                                                        <td><input type="text" id="cross_depth_bridge" name="current_bridge[depth]" placeholder="ลึก (ม.)" ></td>
                                                        <td><input type="text" id="cross_len_bridge" name="current_bridge[len]" placeholder="ความยาวช่วงตอม่อ (ม.)"  ></td>
                                                        <td><input type="text" id="cross_num_bridge" name="current_bridge[num]" placeholder="จำนวนตอม่อ (แถว)" ></td>
                                                    </tr>

                                                    <tr>
                                                        <td ></td>
                                                        <td ><input type="checkbox"  id="culvert_round" value="round" name="current_narrow[culvert][round]" ><label for="culvert_round">ท่อกลม</label></td>
                                                        <td><input type="text" id="diameter_culvert" name="current_narrow[culvert][diameter]" placeholder="เส้นผ่าศูนย์กลาง (ม.)" ></td>
                                                        <td><input type="text" id="num_culvert1" name="current_narrow[culvert][c][num]" step="any" placeholder="จำนวนท่อ (ช่อง)" > </td>
                                                        <td><input type="text" id="len_culvert1" name="current_narrow[culvert][c][len]" step="any" placeholder="ยาว (ม.)"  > </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <input type="hidden" name="current_narrow[type]" value="culvert"></td>
                                                        <td ><input type="checkbox" id="culvert_square" value="square" name="current_narrow[culvert][sq]"><label for="culvert_square">ท่อเหลี่ยม</label></td>
                                                        <td ><input type="text" id="width_culvert" name="current_narrow[culvert][width]" placeholder="กว้าง (ม.)" ></td>
                                                        <td ><input type="text" id="high_culvert" name="current_narrow[culvert][high]" placeholder="สูง (ม.)" ></td>
                                                        <td ><input type="text" id="num_culvert2" name="current_narrow[culvert][sq][num]" placeholder="จำนวนท่อ (ช่อง)" step="any"  ></td>
                                                        <td><input type="text" id="len_culvert2" name="current_narrow[culvert][sq][len]" step="any" placeholder="ยาว (ม.)"> </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <input type="hidden" name="current_narrow[type]" value="culvert"></td>
                                                        <td valign="top"><input type="checkbox" id="xsection_status3" name="current_narrow[type]" /><label for="xsection_status3">อื่นๆ</label></td>
                                                        <td colspan="4"><textarea rows="1" cols="100" id="current_narrow" name="current_narrow[other]" > </textarea></td>
                                                    </tr>
                                                    <tr>

                                                        <td colspan="3" style="padding-left:20px;">1.4.3. หน้าตัดของลำน้ำ<b>ท้ายน้ำ</b>หลังช่วงที่เกิดปัญหา   <span class="chatbox__button8"><img src="{{ asset('images/question-mark.png') }} " /></span>  </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td><input type="text" id="cross_width_end" name="current_end[width]" placeholder="กว้าง (ม.)" step="any" >
                                                        </td>
                                                        <td><input type="text" id="cross_depth_end" name="current_end[depth]" placeholder="ลึก (ม.)" step="any" >
                                                        </td>
                                                        <td><input type="text" id="cross_slope_end" name="current_end[slope]" placeholder="ความลาดชันตลิ่ง" step="any" >
                                                        </td>
                                                    </tr>
                                                </table>
                                                {{-- 1.4 --}}
                                                <table class="table table-form table-borderless"  >
                                                    <tr>
                                                        <th colspan="3">1.5 ความยาวของช่วงลำน้ำที่เกิดปัญหา  <span class="chatbox__button9"><img src="{{ asset('images/question-mark.png') }} " /></span></th>
                                                    </tr>
                                                </table>
                                                <table align="center" class="table table-form table-borderless"  width="90%" >
                                                    <tr >
                                                        <td width=10%></td>
                                                        <td width=25%><input type="radio" id="blk_length1"  name="blk_length_type" value="น้อยกว่า 10 เมตร"><label for="blk_length1">น้อยกว่า 10 เมตร. </label></td>
                                                    </tr>
                                                    <tr >
                                                        <td width=10%></td>
                                                        <td><input type="radio" id="blk_length2"  name="blk_length_type"  value="10 -1000 เมตร" ><label for="blk_length2"> 10 -1000 เมตร.</label></td>
                                                        <td> <select id="blk_length" name="blk_length" >
                                                            <option value="">-- ระบุระยะ --</option>
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
                                                    <tr >
                                                        <td width=10%></td>
                                                        <td><input type="radio" id="blk_length3"  name="blk_length_type" value="มากกว่า 1 กิโลเมตร"><label for="blk_length3">มากกว่า 1 กิโลเมตร</label></td>
                                                        <td><input type="text" id="blk_length_1k"  name="blk_length" placeholder="-- ระบุระยะมากกว่า 1 กม.--" ></td>
                                                    </tr>
                                                

                                                </table>
                                                {{-- 1.5 --}}
                                                <table class="table table-form table-borderless">
                                                    <tr>
                                                        <th width=35%>1.6 การดาดผิวของลำน้ำ  <span class="chatbox__button10"><img src="{{ asset('images/question-mark.png') }} " /></span></th>
                                                        <td width=20%><input type="radio" id="blk_surface1" value="ไม่ดาดผิว" name="blk_surface" ><label for="blk_surface1">ไม่ดาดผิว </label></td>
                                                        <td><input type="radio" id="blk_surface2" value="ดาดผิว" name="blk_surface" ><label for="blk_surface2">ดาดผิว</label></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>

                                                        <td align="right">วัสดุที่ดาดผิวของลำน้ำ : </td>
                                                        <td colspan="2"><input type="text" id="blk_surface_detail" name="blk_surface_detail" placeholder="ระบุวัสดุ">
                                                            
                                                        </td>

                                                    </tr>

                                                </table>
                                                {{-- 1.7 --}}
                                                <table class="table table-form table-borderless">
                                                        <tr>
                                                            <th>1.7 ความลาดชันท้องน้ำช่วงที่เกิดปัญหา <span class="chatbox__button1_7"><img src="{{ asset('images/question-mark.png') }} " /></span>
                                                             <input class="textbox" id="blk_slope_bed" name="blk_slope_bed" placeholder="ระบุความลาดชัน">
                                                            </th>
                        
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
                                                        <th colspan="6">2.1 ลักษณะของความเสียหาย {{--  <span class="chatbox__button11"><img src="{{ asset('images/question-mark.png') }} " /></span> --}} </th>
                                                    </tr>
                                                </table>
                                                <table align="center"  class="table-damages table-borderless" width="80%">
                                                    <tr>

                                                        <td colspan="3"><input type="hidden" name="damage_type[flood]" value="0">
                                                                        <input type="checkbox" id="damage_type1"  name="damage_type[flood]" value="1" onclick="damageLevelRadioValidation()"> 
                                                                        <label for="damage_type1">น้ำท่วม</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="5%"></td>
                                                        <td class="loc_damage"><input type="hidden" name="damage_level[flood]" value="0">
                                                            <input type="radio" id="damageflood1" name="damage_level[flood]" value="low" disabled/> 
                                                            <label for="damageflood1">น้อย</label>
                                                        </td>
                                                        <td class="loc_damage"><input type="radio" id="damageflood2" name="damage_level[flood]" value="medium" disabled/><label for="damageflood2"> ปานกลาง</label></td>
                                                        <td class="loc_damage"><input type="radio" id="damageflood3" name="damage_level[flood]" value="high" disabled/> <label for="damageflood3">มาก</label></td>
                                                    </tr>
                                                    <tr>

                                                        <td colspan="3"><input type="hidden" name="damage_type[waste]" value="0">
                                                                        <input type='checkbox' id="damage_type2"  name='damage_type[waste]' value="1" onclick="damageLevelRadioValidation()">
                                                                        <label for="damage_type2">น้ำเสีย</label>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="5%"></td>
                                                        <td class="loc_damage"><input type="hidden" name="damage_level[waste]" value="0">
                                                            <input type="radio" id="damagewaste1" name="damage_level[waste]" value="low" disabled/>
                                                            <label for="damagewaste1"> น้อย </label>
                                                        </td>
                                                        <td class="loc_damage"><input type="radio" id="damagewaste2" name="damage_level[waste]" value="medium" disabled/><label for="damagewaste2"> ปานกลาง </label></td>
                                                        <td class="loc_damage"><input type="radio" id="damagewaste3" name="damage_level[waste]" value="high" disabled/><label for="damagewaste3"> มาก </label></td>
                                                    </tr>
                                                    <tr >
                                                    <td width="10%"><input type="hidden" name="damage_type[other]" value="0">
                                                                        <input type="checkbox" id="damage_type3"  name='damage_type[other]' value="1" onclick="damageLevelRadioValidation()">
                                                                        <label for="damage_type3">อื่นๆ </label>
                                                        <td colspan="2">
                                                            <input type="hidden" name="damage_level[other][detail]" value="NULL">
                                                                        <input type="text" name="damage_level[other][detail]" id="damageotherdetail" size="5" placeholder="ระบุ">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td width="5%"></td>
                                                        <td class="loc_damage"><input type="hidden" name="damage_level[other][level]" value="0">
                                                            <input type="radio" id="damageother1" name="damage_level[other][level]" value="low" disabled/>
                                                            <label for="damageother1"> น้อย </label>
                                                        </td>
                                                        <td class="loc_damage"><input type="radio" id="damageother2" name="damage_level[other][level]" value="medium" disabled/> <label for="damageother2">ปานกลาง </label></td>
                                                        <td class="loc_damage"><input type="radio" id="damageother3" name="damage_level[other][level]" value="high" disabled/> <label for="damageother3">มาก </label></td>
                                                    </tr>
                                                </table>

                                                <table class="table table-form table-borderless">

                                                    <tr>
                                                        <th colspan="5">2.2 ความถี่ที่เกิดความเสียหาย {{-- <span class="chatbox__button12"><img src="{{ asset('images/question-mark.png') }} " /></span> --}} </th>
                                                    </tr>
                                                </table>
                                                <table align="center" width="80%" class="table table-form table-borderless">
                                                    <tr>
                                                        <td></td>
                                                        <td width="30%"><input type="radio" id="damage_frequency1" value="มากกว่า 4 ปีครั้ง" name="damage_frequency" ><label for="damage_frequency1">มากกว่า 4 ปีครั้ง </label></td>
                                                        <td width="30%"><input type="radio" id="damage_frequency2" value="2-4 ปีครั้ง" name="damage_frequency" ><label for="damage_frequency2">2-4 ปีครั้ง </label></td>
                                                        <td><input type="radio" id="damage_frequency3" value="ทุกปี" name="damage_frequency" > <label for="damage_frequency3">ทุกปี </label></td>

                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- END Step 2 -->

                                            <!-- Step 3 -->
                                            <div class="tab-pane" id="wizard-progress-step3" role="tabpanel">
                                                {{-- ข้อ 3 สภาพปัญหา --}}
                                                <h4><span class="number">3</span>สภาพปัญหา</h4>
                                                <table class="table table-form table-borderless">
                                                    <tr>
                                                        <th colspan="6">3.1 สาเหตุการกีดขวางลำน้ำโดย (เลือกได้หลายข้อ) {{-- <span class="chatbox__button13"><img src="{{ asset('images/question-mark.png') }} " /></span> --}}  </th>
                                                    </tr>
                                                </table>
                                                <table align="center" class="table table-form table-borderless">
                                                    {{-- ธรรมชาติ --}}
                                                    <tr>

                                                        <td colspan="2">ธรรมชาติ</td>
                                                    </tr>
                                                    <tr>

                                                        <td><input type="checkbox" id="nat_erosion" name="nat_erosion" value="1"/> <label for="nat_erosion"> ตลิ่งพัง, การกัดเซาะ </label></td>
                                                        <td><input type="checkbox" id="nat_shoal" name="nat_shoal" value="1"/><label for="nat_shoal"> การทับถมของตะกอน (ลำน้ำตื้นเขิน)</label></td>


                                                    </tr>
                                                    <tr>

                                                        <td><input type="checkbox" id="nat_missing" name="nat_missing" value="1"/><label for="nat_missing">ลำน้ำขาดหาย</label></td>
                                                        <td><input type="checkbox" id="nat_winding" name="nat_winding" value="1"/> <label for="nat_winding">ลำน้ำคดเคี้ยวมาก </label></td>


                                                    </tr>   
                                                    <tr>

                                                        <td colspan="2"><input type="checkbox" id="nat_weed" name="nat_weed" onclick="causeOfDamageValidate()" value="1"/> <label for="nat_weed"> วัชพืช <input  class="textbox" id="nat_cause_5_detail" name="nat_weed_detail" placeholder="ระบุวัชพืช">  </label> </td>
                                                        
                                                    <tr>

                                                        <td colspan="2" ><input type="checkbox" id="nat_other" name="nat_other" onclick="causeOfDamageValidate()" value="1"/> <label for="nat_other"> อื่นๆ <input  class="textbox" id="nat_cause_6_detail" name="nat_other_detail" placeholder="ระบุ"> </label></td>
                                                    </tr>
                                                    {{-- มนุษย์ --}}
                                                </table>
                                                <table class="table table-form table-borderless">
                                                    <tr>    
                                                        <td colspan="2">มนุษย์</td>
                                                    </tr>
                                                    {{-- สิ่งปลูกสร้าง --}}

                                                    <tr>

                                                        <td colspan="2"><input type="checkbox" id="hum_structure" name="hum_structure" value="1"/><label for="hum_structure" >สิ่งปลูกสร้าง</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left:20px;" colspan="2"><input type="checkbox" id="hum_str_gov" name="hum_str_owner_type" value="ราชการ" /><label for="hum_str_gov">เป็นส่วนราชการ </label></td>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="3">
                                                            <table align="center" class="table-form table-borderless">
                                                                <tr>
                                                                    <td >ส่วนของอาคาร</td><td> <input type="text" id="hum_stc_bld_num" name="hum_stc_bld_num" placeholder="ระบุ (หลัง)"> </td>
                                                                    <td >รั้ว</td><td><input type="text" id="hum_stc_fence_num" name="hum_stc_fence_num" placeholder="ระบุ  (หลัง)"> </td>
                                                                    <td >อื่นๆ </td><td><input type="text" id="hum_str_other" name="hum_str_other" placeholder="ระบุ"></td>
                                                                
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="padding-left:20px;" colspan="2"><input type="checkbox" id="hum_str_bu" name="hum_str_owner_type" value="เอกชน" /><label for="hum_str_bu">เป็นสวนของเอกชนหรือส่วนบุคคล </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <table align="center" class="table-form table-borderless">
                                                                <tr>

                                                                
                                                                    <td>ส่วนของอาคาร</td>
                                                                    <td ><input type="text" id="hum_stc_bld_num2" name="hum_stc_bld_bu_num" placeholder="ระบุ (หลัง)"></td>
                                                                    <td >รั้ว</td>
                                                                    <td ><input type="text" id="hum_stc_fence_num2" name="hum_stc_fence_bu_num" placeholder="ระบุ (หลัง)"></td>
                                                                    <td >อื่นๆ</td>
                                                                    <td ><input type="text" id="hum_str_other2" name="hum_str_other_bu" placeholder="ระบุ"></td>


                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-bottom:20px;"></td>
                                                    </tr>
                                                    {{-- infa --}}
                                                    <tr>
                                                        <td colspan="2"><input type="checkbox" name="hum_type" id="huminfa" value="ระบบสาธารณูปโภค" /> <label for="huminfa"> ระบบสาธารณูปโภค (ถนน ท่อลอด สะพานและอื่นๆ) </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left:40px;"><input type="checkbox" id="hum_road" name="hum_road" value="1"/><label for="hum_road">ถนนขวางทางน้ำ </label></td>
                                                        <td style="padding-left:40px;"><input type="checkbox" id="hum_smallconvert" name="hum_smallconvert" value="1"/><label for="hum_smallconvert">ท่อลอดถนนที่ตัดลำน้ำมีขนาดเล็กเกินไประบายน้ำหลากไม่ทัน</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left:40px;"><input type="checkbox" id="hum_road_paralel" name="hum_road_paralel" value="1"/> <label for="hum_road_paralel">ถนนขนานลำน้ำสร้างกินพื้นที่ลำน้ำ </label></td>
                                                        <td style="padding-left:40px;"><input type="checkbox" id="hum_replaced_convert" name="hum_replaced_convert" value="1"/><label for="hum_replaced_convert">วางท่อตามแนวลำน้ำทดแทนลำน้ำเดิม</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left:40px;" colspan="2"> <input type="checkbox" id="hum_bridge_pile" name="hum_bridge_pile" value="1"/><label for="hum_bridge_pile">สะพานมีหน้าตัดแคบเกินไป หรือมีต่อม่อมากเกินไปในช่วงฤดูน้ำหลากระบายไม่ทัน</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-bottom:10px;"></td>
                                                    </tr>
                                                    <tr>
                                                        <td ><input type="checkbox" id="hum_soil_cover" name="hum_soil_cover" value="1"/><label for="hum_soil_cover">การถมดิน </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td ><input type="checkbox" id="hum_trash" name="hum_trash" value="1"/><label for="hum_trash">สิ่งปฏิกูล </label></td>
                                                    </tr>
                                                    <tr>
                                                        <td> <input type="checkbox" id="hum_other" name="hum_other" onclick="causeOfDamageValidate()" value="1"/><label for="hum_other">อื่นๆ </label> 
                                                             <input class="textbox"  name="hum_other_detail" id="hum_other_detail" placeholder="ระบุ" />
                                                        </td>
                                                    </tr>
                                                </table>
                                                {{-- 3.2 --}}
                                                <table class="table table-form table-borderless">

                                                    <tr>
                                                        <th colspan="6">3.2 ระดับกีดขวาง (เปอร์เซ็นต์คิดโดนพื้นที่ที่ถูกกีดขวางต่อพื้นที่ลำน้ำเดิม) {{-- <span class="chatbox__button14"><img src="{{ asset('images/question-mark.png') }} " /></span> --}} </th>
                                                    </tr>
                                                </table>
                                                <table align="center" class="table table-form table-borderless"> 
                                                    <tr>
                                                        <td ><input type="radio" id="problevel1" name="prob_level" value="1-30%" /> <label for="problevel1">น้อย (1-30%) </label></td>
                                                        <td ><input type="radio" id="problevel2" name="prob_level" value="30-70%"/><label for="problevel2">กลาง (30-70%)</label></td>
                                                        <td ><input type="radio" id="problevel3" name="prob_level" value="มากกว่า 70%"  /><label for="problevel3">มาก (มากกว่า 70%)</label></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <!-- END Step 3 -->
                                            
                                            <!-- Step 4 -->
                                            <div class="tab-pane" id="wizard-progress-step4" role="tabpanel">
                                                {{-- ข้อ 4 การแก้ไข --}}

                                                <h4><span class="number">4</span> การดำเนินการแก้ไขของหน่วยงานท้องถิ่น และหน่วยงานที่รับผิดชอบ  {{-- <span class="chatbox__button15"><img src="{{ asset('images/question-mark.png') }} " /></span> --}} </h4>

                                                <table align="center" class="table table-form table-borderless">
                                                    <tr>
                                                        <td align="right">หน่วยงานที่รับผิดชอบ :</td>
                                                        <td colspan="6"><input type="text" id="responsed_dept" name="responsed_dept" >
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                        <td colspan="5" style="padding-left:40px;"><input type="radio" id="sol_how" name="sol_how" value="ปรับปรุงแก้ไข" onclick="solHowValidate()" ><label for="sol_how">ปรับปรุงแก้ไขโดย </label>
                                                            <input class="textbox"  id="responsed_dept2" name="sol_edit" placeholder="(วิธีแก้ไขหรือโครงการ)" disabled>
                                                        </td>
                                                    </tr>
                                                    <tr>

                                                        <td style="padding-left:40px;"><input type="radio" id="sol_how2" name="sol_how" value="เจรจาให้รื้อถอน" onclick="solHowValidate()" ><label for="sol_how2">เจรจาให้รื้อถอน</label></td>
                                                        <td style="padding-left:40px;" colspan="2"><input type="radio" id="sol_how3" name="sol_how" value="ฟ้องร้อง"  onclick="solHowValidate()" ><label for="sol_how3">ฟ้องร้อง</label></td>
                                                        <td style="padding-left:40px;" colspan="2"><input type="radio" id="sol_how4" name="sol_how" value="รื้อถอน"  onclick="solHowValidate()" ><label for="sol_how4">รื้อถอน</label></td>
                                                        <td style="padding-left:40px;" colspan="2" 99><input type="radio" id="sol_how5" name="sol_how" value="ยังไม่ได้ดำเนินการ"  onclick="solHowValidate()" ><label for="sol_how5">ยังไม่ได้ดำเนินการ</label></td>
                                                    </tr>
                                                </table>
                                                {{-- 4.1 --}}
                                                <table class="table table-form table-borderless">
                                                    <tr>
                                                        <th colspan="6">4.1 ผลการดำเนินการ  {{-- <span class="chatbox__button16"><img src="{{ asset('images/question-mark.png') }} " /></span> --}} </th>
                                                    </tr>
                                                </table>
                                                <table class="table table-form table-borderless">
                                                    <tr>
                                                        <td width="3%"></td>
                                                        <td colspan="2"><input type="radio" id="result_selector1" name="result_selector" value="ได้ผลดีสามารถแก้ไขปัญหาได้" ><label for="result_selector1">ได้ผลดีสามารถแก้ไขปัญหาได้</label></td>
                                                        <td colspan="2"><input type="radio" id="result_selector2" name="result_selector" value="ได้ผลดีพอสมควรแก้ไขปัญหาได้บางส่วน" ><label for="result_selector2">ได้ผลดีพอสมควรแก้ไขปัญหาได้บางส่วน</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2"><input type="radio" id="result_selector3" name="result_selector" value="ได้ผลไม่ดีเท่าที่ควรแก้ไขปัญหาได้น้อย"><label for="result_selector3"> ได้ผลไม่ดีเท่าที่ควรแก้ไขปัญหาได้น้อย</label></td>
                                                        <td colspan="2"><input type="radio" id="result_selector4" name="result_selector" value="ไม่ได้ผล" ><label for="result_selector4"> ไม่ได้ผล </label></td>
                                                    </tr>
                                                </table>
                                                {{-- 4.2 --}}
                                                <table class="table table-form table-borderless">
                                                    <tr>
                                                        <th colspan="6">4.2 สถานภาพปัจจุบันของโครงการที่แก้ไขปัญหาได้  {{--  <span class="chatbox__button17"><img src="{{ asset('images/question-mark.png') }}" /></span>  --}} </th>
                                                    </tr>

                                                </table>
                                                <table align="center" width="70%" class="table table-form table-borderless">
                                                    <tr>
                                                        <td><input type="radio" id="proj_status1" name="proj_status" value="plan" onclick="projStatusValidate()"/><label for="proj_status1"> อยู่ในแผน </label></td>
                                                        <td><input type="text" id="proj_year" name="proj_year" step="any" placeholder="ระบุปี พ.ศ" disabled></td>
                                                        <td><input type="text" id="proj_name" name="proj_name" step="any" placeholder="ระบุชื่อโครงการ" disabled></td>
                                                        <td><input type="text" id="proj_budget" name="proj_budget" step="any" placeholder="ระบุงบประมาณ" disabled ></td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="radio" id="proj_status2" name="proj_status" value="received" onclick="projStatusValidate()" /><label for="proj_status2">ได้รับงบประมาณแล้ว</label></td>
                                                        <td><input type="text" id="proj_name2" name="proj_name2" step="any" placeholder="ระบุชื่อโครงการ" disabled ></td>
                                                        <td><input type="text" id="proj_budget" name="proj_budget" step="any" placeholder="ระบุงบประมาณ" disabled></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><input type="radio" id="proj_status3" name="proj_status" value="making"  /><label for="proj_status3">กำลังปรับปรุงหรือก่อสร้าง</label></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3"><input type="radio" id="proj_status4" name="proj_status" value="noplan" /><label for="proj_status4">ยังไม่มีในแผน </label></td>
                                                    </tr>
                                                </table>


                                            </div>
                                            <!-- END Step 4 -->
                                            
                                            <!-- Step 5 -->
                                            <div class="tab-pane" id="wizard-progress-step5" role="tabpanel">
                                             
                                                <span class="number">5</span><b>รูปภาพประกอบ (ใส่รูปได้มากกว่า 1 รูป) <span class="chatbox__button18"><img src="{{ asset('images/question-mark.png') }} " /></span></b>
                                                <div class="row">
                                                    <div class="col-lg-2" style="text-align:right;"> กรุณาใส่รูปภาพ :  &nbsp; &nbsp; </div>
                                                    <div class="col-lg-9">
                                                        <div class="form-group">
                                                            <input type="file" id = "photo_type_bld" name="photo_type_bld[]" class="form-control-file" multiple="true">
                                                        </div>
                                                        <div id="image_preview_bld"></div>
                                                    </div>
                                                </div>
                                                <div class="row" style="height: 300px;"></div>
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
                                                                <td  ><textarea rows="8" cols="50" style="color:#000;" id="problem" name="problem"> </textarea></td>
                                                                <td rowspan="3">
                                                                    <table class="table table-bordered">
                                                                        <tr>
                                                                            <td>พื้นที่ลาดชัน : </td>
                                                                            <td><input type="text"  id="exp_slope" name="exp_slope" value=''></td>
                                                                            <td></td>
                                                                        </tr>    
                                                                        <tr>
                                                                            <td>A =</td>
                                                                            <td><input type="text" id="exp_area" name="exp_area" value=' '></td>
                                                                            <td>ตารางกิโลเมตร</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> L0 =</td>
                                                                            <td><input type="text" id="exp_L0" name="exp_L0" value=''></td>
                                                                            <td>กิโลเมตร</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> H =</td>
                                                                            <td><input type="text" id="exp_H" name="exp_H" value=''></td>
                                                                            <td>เมตร</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> C  =</td>
                                                                            <td><input type="text" id="exp_C" name="exp_C" value=''></td>
                                                                            <td></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> tc  =</td>
                                                                            <td><input type="text" id="exp_tc" name="exp_tc" value=''></td>
                                                                            <td>ชั่วโมง</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> I  =</td>
                                                                            <td><input type="text" id="exp_I" name="exp_I" value=''></td>
                                                                            <td>มิลลิเมตร/ชั่วโมง</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> อัตราการไหลสูงสุด  =</td>
                                                                            <td><input type="text" id="exp_maxflow" name="exp_maxflow" value=''></td>
                                                                            <td>m<sup>3</sup>/s</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td> Return period  =</td>
                                                                            <td><input type="text" id="exp_returnPeriod" name="exp_returnPeriod" value=''></td>
                                                                            <td>ปี</td>
                                                                        </tr>
                                                                    </table>  
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-center" style="background-color:#C0C0C0">แนวทางการแก้ไขเบื้องต้น</td>
                                                        </tr>
                                                        <tr>
                                                            <td ><textarea rows="8" cols="50" id="exp_solution" name="exp_solution" style="color:#000;"> </textarea></td>
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
                                                    <button type="button" class="btn btn-secondary on-next-action" data-wizard="next" >
                                                        Next <i class="fa fa-angle-right ml-1"></i>
                                                    </button>
                                                    <button type="submit" class="btn btn-primary d-none on-next-action" data-wizard="finish"  >
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


                <!-- chat -->
                <div class="chatbox">
                    

                    <div class="chatbox__support4 chatbox-infomation">
                        <div class="chatbox__header">
                            <div class="chatbox__image--header">
                                <button class="btn-close" id="closeTab">X</button>
                            </div>
                            <div class="chatbox__content--header">
                            </div>
                        </div>
                        <div class="chatbox__messages">
                            <div class="user-img"><img src="{{ asset('images/chat_bot_web.png') }}" /></div>
                                <div>
                                    <div class="messages__item messages__item--visitor">
                                    
                                    {{--                                 
                                    <p>รายละเอียดของความหมาย</p>
                                    <p>{{$detailsAdviceF130}}</p>
                                    <p>-----------</p>
                                    <p>คำอธิบาย</p>
                                    <p>{{$descAdviceF130}}</p>
                                    <p>-----------</p> 
                                    --}}

                                    <p>วิธีการคำนวนเบื้องต้น</p>
                                    <p>{{$methodAdviceF130}}</p>    

                                    {{--  Trigger/Open The Modal --}}
                                    <button type="button" id="myBtn1" class="btn btn-link">ตัวอย่างรูปภาพ <br>การคำนวนความลาดตลิ่ง</button>
                                    {{--  The Modal --}}
                                    <div id="myModal1" class="modal">

                                        {{--  Modal content--}}
                                        <div class="modal-content">
                                            <span class="close1">&times;</span>
                                            <img  src="{{ asset('images/ref_advice/1_3.jpg') }}"  weight="70%"  >  
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
                        <div class="chatbox__footer">
                        </div>
                    </div>


                    <div class="chatbox__support6 chatbox-infomation">
                        <div class="chatbox__header">
                            <div class="chatbox__image--header">
                                <button class="btn-close" id="closeTab">X</button>
                            </div>
                            <div class="chatbox__content--header">
                            </div>
                        </div>
                        <div class="chatbox__messages">
                            <div class="user-img"><img src="{{ asset('images/chat_bot_web.png') }}" /></div>
                            <div>
                                <div class="messages__item messages__item--visitor">
                                <p>คำอธิบาย</p>
                                <p>{{$methodAdviceF141}}</p>

                                {{--  Trigger/Open The Modal --}}
                                <button type="button" id="myBtn2" class="btn btn-link"> รูปภาพอธิบาย <br> ตำแหน่งเพิ่มเติม</button>
                                {{--  The Modal --}}
                                <div id="myModal2" class="modal">

                                    {{--  Modal content--}}
                                    <div class="modal-content">
                                        <span class="close2">&times;</span>
                                        <img  src="{{ asset('images/ref_advice/1_4_1.jpg') }}"  weight="70%"  >  
                                    </div>
                                </div>
    


                                {{--
                                    <p><a target="_blank" href="{{ asset('images/ref_advice/1_4_1.jpg') }}">รายละเอียดเชิงรูปภาพ</a></p>
                                    --}}  

                                </div>
                            </div>
                        </div>
                        <div class="chatbox__footer">
                        </div>
                    </div>

                    <div class="chatbox__support7 chatbox-infomation">
                        <div class="chatbox__header">
                            <div class="chatbox__image--header">
                                <button class="btn-close" id="closeTab">X</button>
                            </div>
                            <div class="chatbox__content--header">
                            </div>
                        </div>
                        <div class="chatbox__messages">
                            <div class="user-img"><img src="{{ asset('images/chat_bot_web.png') }}" /></div>
                            <div>
                                <div class="messages__item messages__item--visitor">
                                 {{--

                                <p>รายละเอียดของความหมาย</p>
                                <p>{{$detailsAdviceF142}}</p>
                                <p>-----------</p>
                                <p>คำอธิบาย</p>
                                <p>{{$descAdviceF142}}</p>
                                <p>-----------</p>                         
                                    
                                    --}}

                                <p>คำอธิบาย</p>
                                <p>{{$methodAdviceF142}}</p>   

                                {{--  Trigger/Open The Modal --}}
                                <button type="button" id="myBtn3" class="btn btn-link"> รูปภาพเพิ่มเติมประเภท<br>สิ่งกีดขวางทางน้ำ</button>
                                {{--  The Modal --}}
                                <div id="myModal3" class="modal">

                                    {{--  Modal content--}}
                                    <div class="modal-content">
                                        <span class="close3">&times;</span>
                                        <img  src="{{ asset('images/ref_advice/1_4_3.jpg') }}"  weight="70%"  >  
                                    </div>
                                </div>

     
                                    {{--
                                        <p><a target="_blank" href="{{ asset('images/ref_advice/1_4_3.jpg') }}">รายละเอียดเชิงรูปภาพ</a></p>
                                        --}}
                                
                                </div>
                            </div>
                        </div>
                        <div class="chatbox__footer">
                        </div>
                    </div>

                    <div class="chatbox__support8 chatbox-infomation">
                        <div class="chatbox__header">
                            <div class="chatbox__image--header">
                                <button class="btn-close" id="closeTab">X</button>
                            </div>
                            <div class="chatbox__content--header">
                            </div>
                        </div>
                        <div class="chatbox__messages">
                            <div class="user-img"><img src="{{ asset('images/chat_bot_web.png') }}" /></div>
                            <div>
                                <div class="messages__item messages__item--visitor">
                                 {{--

                                <p>รายละเอียดของความหมาย</p>
                                <p>{{$detailsAdviceF143}}</p>
                                <p>-----------</p>
                                <p>คำอธิบาย</p>
                                <p>{{$descAdviceF143}}</p>
                                <p>-----------</p>                         
                                    
                                    --}}

                                <p>คำอธิบาย</p>
                                <p>{{$methodAdviceF143}}</p>    

                                {{--  Trigger/Open The Modal --}}
                                <button type="button" id="myBtn4" class="btn btn-link">รูปภาพตัวอย่าง <br>หน้าตัดลำน้ำ</button>
                                {{--  The Modal --}}
                                <div id="myModal4" class="modal">

                                    {{--  Modal content--}}
                                    <div class="modal-content">
                                        <span class="close4">&times;</span>
                                        <img  src="{{ asset('images/ref_advice/1_4_2.jpg') }}"  weight="70%"  >  
                                    </div>
                                </div>

                                {{-- 
                                    <p><a target="_blank" href="{{ asset('images/ref_advice/1_4_2.jpg') }}">รายละเอียดเชิงรูปภาพ</a></p>
                                    --}}
                                                    

                                </div>
                            </div>
                        </div>
                        <div class="chatbox__footer">
                        </div>
                    </div>

                    <div class="chatbox__support9 chatbox-infomation">
                        <div class="chatbox__header">
                            <div class="chatbox__image--header">
                                <button class="btn-close" id="closeTab">X</button>
                            </div>
                            <div class="chatbox__content--header">
                            </div>
                        </div>
                        <div class="chatbox__messages">
                            <div class="user-img"><img src="{{ asset('images/chat_bot_web.png') }}" /></div>
                            <div>
                                <div class="messages__item messages__item--visitor">
                          
                                <p>รายละเอียดของความหมาย</p>
                                <p>{{$detailsAdviceF150}}</p>
                                <p>-----------</p>
                                <p>คำอธิบาย</p>
                                <p>{{$descAdviceF150}}</p>
                                <p>-----------</p>
                                <p>วิธีการกรอกข้อมูล</p>
                                <p>{{$methodAdviceF150}}</p>    
                                                             
                                </div>
                            </div>
                        </div>
                        <div class="chatbox__footer">
                        </div>
                    </div>

                    <div class="chatbox__support10 chatbox-infomation">
                        <div class="chatbox__header">
                            <div class="chatbox__image--header">
                                <button class="btn-close" id="closeTab">X</button>
                            </div>
                            <div class="chatbox__content--header">
                            </div>
                        </div>
                        <div class="chatbox__messages">
                            <div class="user-img"><img src="{{ asset('images/chat_bot_web.png') }}" /></div>
                            <div>
                                <div class="messages__item messages__item--visitor">
                                    <p>คำอธิบาย</p>
                                    <p>คลองส่งน้ำที่เสริมคลองส่วนที่สัมผัสกับน้ำด้วยวัสดุที่มีความแข็งแรง ที่นิยมใช้กันคือการดาดผิวคลองด้วยคอนกรีต เพราะมีความแข็งแรง และก่อสร้างได้ง่าย ซึ่งจะช่วยลดการรั่วซึมผ่านตัวคลองส่งน้ำ ลดการพังทลายของลาดด้านข้างคลองส่งน้ำ ป้องกันวัชพืชและลดขนาดของตัวคลองลง ทําให้ประหยัดพื้นที่สําหรับการก่อสร้างด้วย</p>

                                    {{--  Trigger/Open The Modal --}}
                                    <center><button type="button" id="myBtn5" class="btn btn-link">รูปภาพตัวอย่าง <br> การดาดผิว</button></center>
                                    {{--  The Modal --}}
                                    <div id="myModal5" class="modal">

                                        {{--  Modal content--}}
                                        <div class="modal-content">
                                            <span class="close5">&times;</span>
                                            <img  src="{{ asset('images/ref_advice/1_6.png') }}"  weight="70%"  >  
                                        </div>
                                    </div>
                        

                                </div>
                            </div>
                        </div>
                        <div class="chatbox__footer">
                        </div>
                    </div>

                    <div class="chatbox__support1_7 chatbox-infomation">
                        <div class="chatbox__header">
                            <div class="chatbox__image--header">
                                <button class="btn-close" id="closeTab">X</button>
                            </div>
                            <div class="chatbox__content--header">
                            </div>
                        </div>
                        <div class="chatbox__messages">
                            <div class="user-img"><img src="{{ asset('images/chat_bot_web.png') }}" /></div>
                            <div>
                                <div class="messages__item messages__item--visitor">
 
                                <p>รายละเอียดของความหมาย</p>
                                <p>ความลาดชันท้องน้ำช่วงที่เกิดปัญหา (โดยประมาณ)</p>
                                <p>-----------</p>
                                <p>คำอธิบาย</p>
                                <p>เป็นความลาดชันท้องน้ำในอดีตก่อนที่จะเกิดปัญหา</p>
                                <p>-----------</p>
                                <p>วิธีการคำนวน</p>
                                <p>โดยสอบถามคนในพื้นที่ และนำมากรอกโดยสูตรตามรูปภาพตัวอย่าง ความกว้าง ยาว สูง (หน่วยเป็นเมตร)</p> 
                                {{--  Trigger/Open The Modal --}}
                                    <center><button type="button" id="myBtn6" class="btn btn-link">รายละเอียดการคำนวน</button></center>
                                    {{--  The Modal --}}
                                    <div id="myModal6" class="modal">

                                        {{--  Modal content--}}
                                        <div class="modal-content">
                                            <span class="close6">&times;</span>
                                            <img  src="{{ asset('images/ref_advice/1_7.jpg') }}"  weight="70%"  >  
                                        </div>
                                    </div>
                                    {{--  The Modal  slope Cal--}}
                                    <div>
                                        <center><button type="button" id="myBtn7" class="btn btn-link">คำนวณความลาดชัน</button></center>
                                    </div>
                                    <div id="myModal7" class="modal">
                                        <div class="modal-content">
                                            <span class="close7">&times;</span>
                                            <center>
                                                <h3>การคำนวณความลาดชันท้องน้ำช่วงที่เกิดปัญหา</h3>
                                            </center>
                                            <div class="row justify-content-center" >
                                                <div class="col-5">
                                                     <img  src="{{ asset('images/ref_advice/1_7.jpg') }}"  width="100%"  >
                                                </div>
                                                <div class="col-5 " >

                                                    <!-- <table width=100% class="modal-cal">
                                                        <tr style="margin-bottom: 200px;">
                                                            <td>ระดับจุด A </td>
                                                            <td> <input type="text" id="A"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ระดับจุด B </td>
                                                            <td> <input type="text" id="B"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>ระยะทางจาก A ถึง B </td>
                                                            <td> <input type="text" id="lenght"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"><div id="slope" style="padding-top:2em;"></div></td>
                                                        </tr>
                                                    </table> -->
                                                    <form class="form_cal">
                                                        <table width=100% class="modal-cal">
                                                            <tr style="margin-bottom: 200px;">
                                                                <td width="30%">ระดับจุด A</td>
                                                                <td ><input type="number" name="A" id="A" ></td>
                                                                <td> เมตร </td>
                                                            </tr>
                                                            <tr>
                                                                <td>ระดับจุด B </td>
                                                                <td> <input type="number"name="B" id="B"></td>
                                                                <td> เมตร </td>
                                                            </tr>
                                                            <tr>
                                                                <td>ระยะทางจาก A ถึง B </td>
                                                                <td> <input type="number" name="lenght" id="lenght"></td>
                                                                <td> เมตร </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="2">
                                                                    <br><br><br>
                                                                    <button class="btn btn-outline-primary btn-lg btn-block" type="button" onclick="answer.value=((parseFloat(A.value) - parseFloat(B.value))/parseFloat(lenght.value));"> <font style="font-family: 'Mitr';">คำนวณความชัน </font></button><br>
                                                                    <br>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>ความลาดชันท้องน้ำ </td>
                                                                <td><input type="number" class="answer" name="answer" ></td>
                                                            </tr>
                                                        </table>
                                                        <br><br><br>
                                                     </form>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{--
                                    <p><a target="_blank" href="{{ asset('images/ref_advice/1_7.jpg') }}">รายละเอียดเชิงรูปภาพ</a></p>
                                    --}}

                                </div>
                            </div>
                        </div>
                        <div class="chatbox__footer">
                        </div>
                    </div>

                    <div class="chatbox__support18 chatbox-infomation">
                        
                        <div class="chatbox__header">
                            <div class="chatbox__image--header">
                                <button class="btn-close" id="closeTab">X</button>
                            </div>
                            <div class="chatbox__content--header">
                            </div>
                        </div>
                        <div class="chatbox__messages">
                        <div class="user-img"><img src="{{ asset('images/chat_bot_web.png') }}" /></div>
                            <div>
                                <div class="messages__item messages__item--visitor">
 
                                <p>วิธีการ</p>
                                <p>{{$methodAdviceF500}} </p>
                                {{--
                                    
                                <p>รายละเอียดเชิงรูปภาพ</p>
                                <p><a href="{{ asset('images/ref_advice/exsample1.jpg') }}"><img src="{{ asset('images/image_info.png') }} " /></a></p>      

                                    --}}


                                </div>
                            </div>
                        </div>
                        <div class="chatbox__footer">
                        </div>
                    </div>

                    <div class="chatbox_support_admin chatbox-infomation">
                        
                        <div class="chatbox__header">
                            <div class="chatbox__image--header">
                                <button class="btn-close" id="closeTab">X</button>
                            </div>
                            <div class="chatbox__content--header">
                            </div>
                        </div>
                        <div class="chatbox__messages">
                        <div class="user-img"><img src="{{ asset('images/chat_bot_web.png') }}" /></div>
                            <div>
                                <div class="messages__item messages__item--visitor">
                                   <p>คุยกับน้องผ่าน line ได้นะคะด้วยการเพิ่มน้องเป็นเพือนผ่าน line id: @188hzruo</p>
                                   <p>หรือผ่าน QRCode</p>
                                   <p><img src="{{ asset('images/qrcode/ninaqrcode.png') }}" height=150 width=150></p>
                                </div>
                            </div>
                        </div>
                        <div class="chatbox__footer">
                        </div>
                    </div>

                    <div class="chatbox__button_pix chatbox_button_admin">
                        <button ><img src="{{ asset('images/chat_bot_web.png') }}" /></button>
                    </div>
                </div>

            </div>
                   
    </div>
@endsection