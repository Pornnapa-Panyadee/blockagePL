@extends('layouts.app_bloker')

@section('content')
    <div class="dashboard-main-wrapper">
        @include('includes.head')
        @include('includes.header')
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">ข้อมูลสำรวจรายละเอียดการกีดขวางทางน้ำ</h2>
                            <h5>สำรวจโดย {{ Auth::user()->name }}</h5>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <div class="dashboard-short-list">
                    <div class="row justify-content-center">
                            <!-- ============================================================== -->
                            <div class="col-xl-11 col-lg-11 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                        <?php  date_default_timezone_set('Asia/Bangkok');?>
                                <div class="card-header drag-handle">
                                    <div class="row">
                                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                                                <h5 > รายละเอียดแบบสำรวจ  </h5>
                                            </div>            
                                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12" align="right">
                                                <div class="btn-group ml-auto">
                                                    <a href="{{ asset('/newblockage') }}"> <button class="btn btn-outline-primary waves-effect">
                                                    <i class="fas fa-plus-circle"></i>  เพิ่มข้อมูลการกีดขวางทางน้ำ</button></a>
                                                    &nbsp;&nbsp;
                                                    <a href="{{ url('/') }}"><button class="btn btn-outline-primary waves-effect" >
                                                    <i class="fa fa-home"></i> หน้าแรก</button></a>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                                                  
                                <div id="tableData">   
                                    <div class="card-body" style="overflow-x:auto;">
                                        <table class="table_bg table-striped table-bordered first" width=95% align="center">
                                        <!-- <table class="table_bg " width="100%" > -->
                                            <thead>
                                                <tr>
                                                    <th scope="col" width="2%;">#</th>
                                                    <th scope="col" width="7%;">รหัส</th>
                                                    <th scope="col" width="20%;">ลำน้ำ</th>
                                                    <th scope="col" width="8%;">หมู่บ้าน</th>
                                                    <th scope="col" width="4%;">ตำบล</th>
                                                    <th scope="col" width="4%;">อำเภอ</th>
                                                    <th scope="col" width="8%;">วันที่เก็บข้อมูล</th>
                                                    <th scope="col" width="8%;">ผู้สำรวจ</th>
                                                    <th scope="col" ></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for($i = 0;$i < count($data);$i++){ 
                                                    date_default_timezone_set('asia/bangkok');
                                                    //dd(new DateTime());                                                    
                                                    $dateT=date_format($data[$i]->created_at,"d/m/Y H:i");
                                                ?>
                                                    <tr >
                                                        <th scope="row" data-label="ลำดับ">{{$i+1}}</th>
                                                        <td data-label="รหัส">{{$data[$i]->blk_code}}</td>
                                                        <td data-label="ลำน้ำ">{{$data[$i]->River->river_name}}, {{$data[$i]->River->river_main}} </td>
                                                        <td data-label="หมู่บ้าน">{{$data[$i]->blockageLocation->blk_village}} </td>
                                                        <td data-label="ตำบล"> ต.{{$data[$i]->blockageLocation->blk_tumbol}} </td>
                                                        <td data-label="อำเภอ">อ.{{$data[$i]->blockageLocation->blk_district}}</td>
                                                        <td data-label="วันที่เก็บข้อมูล" align="center">{{$data[$i]->survey_date}}</td>
                                                        <td data-label="ผู้สำรวจ" align="center">{{$data[$i]->blk_user_name}}</td>
                                                        <td data-label="" align="center">
                                                            <div class="btn-group ml-auto">
                                                                <a href='{{ asset('/reportblockage/pdf') }}/{{$data[$i]->blk_id}}' target="_blank"> <button class="btn btn-outline-primary waves-effect" title="รายละเอียด" ><i class="fas fa-eye"></i> </button> </a>&nbsp;
                                                                <a href='{{ asset('/editblockage') }}/{{$data[$i]->blk_id}}' target="_blank">  <button class="btn btn-outline-info waves-effect" title="แก้ไข"><i class="fas fa-edit"></i> </button> </a>&nbsp;
                                                                <a href='{{ asset('/form/uploadimage') }}/{{$data[$i]->blk_id}}' target="_blank">  <button class="btn btn-outline-success waves-effect" title="เพิ่มรูปถ่าย" ><i class="fas fa-images"></i> </button> </a>&nbsp;
                                                                <a href='{{ asset('/delete/') }}/{{$data[$i]->blk_id}}'>  <button class="btn btn-outline-secondary waves-effect" title="ลบ" onclick="delFunction()"><i class="fas fa-trash"></i> </button> </a>
                                                            </div>
                                                        </td>                                   
                                                    </tr>
                                                <?php }?>
                                                
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end basic table -->
                            <!-- ============================================================== -->
                </div>
            </div>
        </div>
    </div>
  

@endsection

