<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blockage::CRflood</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mitr|Prompt" rel="stylesheet">
    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.css') }}">
    <!-- leaflet -->
    <link rel="stylesheet" href="https://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" type="text/css">

        
</head>
<body>
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
                            <h2 class="pageheader-title">สรุปผลแบบสำรวจการกีดขวางในแม่น้ำคูคลอง จังหวัดเชียงราย</h2>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="dashboard-short-list">
                    <div class="row">
                        
                            <!-- ============================================================== -->
                            <!-- basic table -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <br>
                                        <h5 style="padding-left:30px;"> ผลการสำรวจการกีดขวางในแม่น้ำคูคลอง </h5>
                                   
                                      
                                    <div class="card-body" style="overflow-x:auto;">
                                            
                                        <table class="table_bg" width="100%"  >
                                            <thead>
                                                <tr align="center">
                                                    <th scope="col" width="5%;">#</th>
                                                    <th scope="col" width="8%;">รหัส</th>
                                                    <th scope="col" width="12%;">ลำน้ำ</th>
                                                    <th scope="col" width="18%;">ที่ตั้ง</th>
                                                    <th scope="col" width="10%;">วันที่เก็บข้อมูล</th>
                                                    <th scope="col" width="10%;">ผู้กรอก</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php for($i = 0;$i < count($data);$i++){?>
                                                    <tr align="center">
                                                        <td >{{$i+1}}</td>
                                                        <td data-label="รหัส">{{$data[$i]->blk_code}}</td>
                                                        <td data-label="ลำน้ำ">{{$data[$i]->River->river_name}}, {{$data[$i]->River->river_main}} </td>
                                                        <td align="left" data-label="ที่ตั้ง">{{$data[$i]->blockageLocation->blk_village}} ต.{{$data[$i]->blockageLocation->blk_tumbol}} อ.{{$data[$i]->blockageLocation->blk_district}}</td>
                                                        <td data-label="วันที่เก็บข้อมูล">{{date_format($data[$i]->created_at,"Y/m/d H:i:s")}}</td>
                                                        <td data-label="ผู้กรอก">{{$data[$i]->blk_user_name}}</td>
                                                        
                                                        <td data-label="">
                                                                {{-- <div class="btn-group ml-auto">
                                                                  
                                                                    <a href='{{ asset('/reportBlockage') }}/{{$data[$i]->blk_id}}' > <button class="btn btn-sm btn-outline-light"><i class="fas fa-eye"></i>  รายละเอียด</button> </a>
                                                               </div> --}}
                                                                <div class="btn-group ml-auto">
                                                                    <a href='{{ asset('/reportBlockage') }}/{{$data[$i]->blk_id}}' > <button class="btn btn-sm btn-outline-light"><i class="fas fa-eye"></i> รายละเอียด</button> </a>
                                                                    <a href='{{ asset('/editblockage') }}/{{$data[$i]->blk_id}}' >  <button class="btn btn-sm btn-outline-light"><i class="fas fa-edit"></i> แก้ไข</button> </a>
                                                                    <a href='{{ asset('/form/questionnaire5') }}/{{$data[$i]->blk_id}}' >  <button class="btn btn-sm btn-outline-light"><i class="fas fa-images"></i> รูปถ่าย</button> </a>
                                                                    
                                                                </div>
                                                        </td>
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
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->


    </div>


<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main-js.js') }}"></script>
<script src="{{ asset('js/shortable-nestable/Sortable.min.js') }}"></script>
<script src="{{ asset('js/shortable-nestable/sort-nest.js') }}"></script>
<script src="{{ asset('js/shortable-nestable/jquery.nestable.js') }}"></script>



</body>
</html>
