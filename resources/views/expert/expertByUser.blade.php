@extends('layouts.app_bloker')

@section('content')
    <div class="dashboard-main-wrapper">
        @include('includes.head')
        @include('includes.header')
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">ข้อมูลสภาพปัญหาและแนวทางการแก้ไขปัญหาเบื้องต้นของตำแหน่งสิ่งกีดขวาง พื้นที่ลุ่มน้ำแม่จาง จังหวัดลำปาง</h2>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="dashboard-short-list">
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- basic table  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                
                            <div class="card" >
                                <h5 class="card-header">แนวทางการแก้ไขปัญหา</h5>
                                <div class="card-body">
                                    <div >
                                        <div class="tab">
                                            <button class="tablinks active" onclick="openCity(event, 'All')">ทั้งหมด</button>
                                            <button class="tablinks" onclick="openCity(event, 'Success')">พิจารณาเรียบร้อย</button>
                                            <button class="tablinks" onclick="openCity(event, 'Doing')">กำลังรอพิจารณา</button>
                                            
                                        </div>

                                        <div id="All" class="tabcontent">
                                            <div id="tableData">   
                                                <div class="card-body" style="overflow-x:auto;">
                                                    <table class="table_bg table-striped table-bordered first" width=95% align="center">
                                                    <!-- <table class="table_bg " width="100%" > -->
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" width="2%;">#</th>
                                                                <th scope="col" width="10%;">รหัส</th>
                                                                <th scope="col" width="20%;">ลำน้ำ</th>
                                                                <th scope="col" width="15%;">ที่ตั้ง</th>
                                                                <th scope="col" width="10%;">วันที่สำรวจ</th>
                                                                <th scope="col" width="10%;">สถานะ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php for($i = 0;$i < count($data);$i++){?>
                                                                <tr align="center">
                                                                    <td >{{$i+1}}</td>
                                                                    <td data-label="รหัส">{{$data[$i]->blk_code}}</td>
                                                                    <td align="left" data-label="ลำน้ำ">{{$data[$i]->river_name}}, {{$data[$i]->river_main}} </td>
                                                                    <td align="left" data-label="หมู่บ้าน">{{$data[$i]->blk_village}} ต.{{$data[$i]->blk_tumbol}} อ.{{$data[$i]->blk_district}}</td>
                                                                    <td data-label="วันที่สำรวจ">{{$data[$i]->created_at}}</td>
                                                                    <?php if($data[$i]->status_approve==0){ ?> 
                                                                        <td ><button type="button" class="btn btn-offline" >กำลังรอพิจารณา</button>  </td>   
                                                                    <?php }else { ?> 
                                                                        <td ><button type="button" class="btn btn-success" >พิจารณาเรียบร้อย</button>  </td>   
                                                                    <?php } ?>
                                                                                                    
                                                                </tr>
                                                            <?php }?>
                                                            
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="Success" class="tabcontent" style="display:none">
                                            <div id="tableData">   
                                                <div class="card-body" style="overflow-x:auto;">
                                                    <table class="table_bg table-striped table-bordered first" width=95% align="center">
                                                    <!-- <table class="table_bg " width="100%" > -->
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" width="2%;">#</th>
                                                                <th scope="col" width="10%;">รหัส</th>
                                                                <th scope="col" width="20%;">ลำน้ำ</th>
                                                                <th scope="col" width="15%;">ที่ตั้ง</th>
                                                                <th scope="col" width="10%;">วันที่สำรวจ</th>
                                                                <th>รายงาน</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $c=0;
                                                                for($i = 0;$i < count($data);$i++){
                                                                    if($data[$i]->status_approve==1){ ?>
                                                                    <tr align="center">
                                                                        <td >{{$c+1}}</td>
                                                                        <td data-label="รหัส">{{$data[$i]->blk_code}}</td>
                                                                        <td align="left" data-label="ลำน้ำ">{{$data[$i]->river_name}}, {{$data[$i]->river_main}} </td>
                                                                        <td align="left" data-label="หมู่บ้าน">{{$data[$i]->blk_village}} ต.{{$data[$i]->blk_tumbol}} อ.{{$data[$i]->blk_district}}</td>
                                                                        <td data-label="วันที่สำรวจ">{{$data[$i]->created_at}}</td>
                                                                        <td data-label="" align="center">
                                                                                <div class="btn-group ml-auto">
                                                                                    <a href='{{ asset('/report/pdf/') }}/{{$data[$i]->blk_id}}' target="_blank">  <button class="btn btn-outline-primary waves-effect" title="รายงาน" ><i class="fas fa-eye"></i> </button> </a>
                                                                                </div>
                                                                        </td>                          
                                                                    </tr>
                                                            <?php  $c++; } }?>
                                                            
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="Doing" class="tabcontent" style="display:none">
                                            <div id="tableData">   
                                                <div class="card-body" style="overflow-x:auto;">
                                                    <table class="table_bg table-striped table-bordered first" width=95% align="center">
                                                    <!-- <table class="table_bg " width="100%" > -->
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" width="2%;">#</th>
                                                                <th scope="col" width="10%;">รหัส</th>
                                                                <th scope="col" width="20%;">ลำน้ำ</th>
                                                                <th scope="col" width="15%;">ที่ตั้ง</th>
                                                                <th scope="col" width="10%;">วันที่สำรวจ</th>
                                                                <th>รายงาน</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $c=0;
                                                                for($i = 0;$i < count($data);$i++){
                                                                    if($data[$i]->status_approve==0){ ?>
                                                                        <tr align="center">
                                                                            <td >{{$i+1}}</td>
                                                                            <td data-label="รหัส">{{$data[$i]->blk_code}}</td>
                                                                            <td align="left" data-label="ลำน้ำ">{{$data[$i]->river_name}}, {{$data[$i]->river_main}} </td>
                                                                            <td align="left" data-label="หมู่บ้าน">{{$data[$i]->blk_village}} ต.{{$data[$i]->blk_tumbol}} อ.{{$data[$i]->blk_district}}</td>
                                                                            <td data-label="วันที่สำรวจ">{{$data[$i]->created_at}}</td>
                                                                            <td data-label="" align="center">
                                                                                <div class="btn-group ml-auto">
                                                                                    <a href='{{ asset('/reportSurvey/pdf/') }}/{{$data[$i]->blk_id}}' target="_blank">  <button class="btn btn-outline-primary waves-effect" title="รายงาน" ><i class="fas fa-eye"></i> </button> </a>
                                                                                </div>
                                                                            </td>  
                                                                                                            
                                                                        </tr>
                                                            <?php $c++;} }?>
                                                            
                                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end basic table  -->
                        <!-- ============================================================== -->
                    </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->


    </div>
    <script>
        function openCity(evt, action) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(action).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>

@endsection
