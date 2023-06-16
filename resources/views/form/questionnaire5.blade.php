@extends('layouts.app_photo')

@section('content')
    <div class="dashboard-main-wrapper">
        @include('includes.head')
        @include('includes.header')
        <div class="dashboard-wrapper">
            <div class="row" style="padding:30px;">
                <h4 ><a href="{{ asset('/blocker') }}">รายละเอียดแบบสำรวจ </a> &raquo;  เพิ่มรูปภาพ {{$data[0]->blk_code}}</h4>
            </div>
            <div class="flex-center position-ref full-height">
                <div class="content" >
                     <div class="card border-3 border-top border-top-primary">
                        <div class="card-header"> 
                            <h2> รูปภาพประกอบ : {{$data[0]->blk_code}} </h2>
                        </div>
                        <div class="title m-b-md form-group" style="margin: 0 10px;">   
                            <br>
                            <div class="alert alert-primary" ><h4>รูปภาพสำรวจตำแหน่งจุดกีดขวางทางน้ำ</h4></div>          
                            <div class="row">
                                <?php for($i=0;$i<count($data[0]->photo);$i++){?>
                                    <div style="margin:10px;">
                                        <img src="{{asset($data[0]->photo[$i]->thumbnail_name)}}" style="width:100%" > 
                                           
                                        <div align="right">
                                            {{$data[0]->photo[$i]->photo_id }}
                                            <a href='{{ asset('/photoremove') }}/{{$data[0]->photo[$i]->photo_id}}'  >
                                            <button class="btn btn-outline-secondary waves-effect" title="ลบ"  onclick="myFunction()" >
                                                <i class="fas fa-trash"></i>
                                            </button>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?> 
                            </div>

                            <br>
                            <div class="alert alert-primary" ><h4>เพิ่มรูปภาพประกอบจุดกีดขวางทางน้ำ</h4></div>  
                            
                            <div class="form-group">
                            <form action="{{ route('form.Qnaire5.uploadImage') }}" method="post" enctype="multipart/form-data" onsubmit="return confirm('บันทึกข้อมูล !!');">
                                {{ csrf_field() }}
                                <input type="hidden" id="blk_id" name="blk_id" value="{{$data[0]->blk_id}}">
                                <h5><input type="file" id="photo_type_bld" name="photo_type_bld[]" multiple /> </h5>
                                <hr>
                                <button type="submit" class="butsummit">บันทึกข้อมูล</button>
                            </form>
                            </div>
                            <!-- <div id="image_preview_bld"></div> -->

                        </div>
                    </div>
                </div>
            </div>
         
                   
    </div>
@endsection