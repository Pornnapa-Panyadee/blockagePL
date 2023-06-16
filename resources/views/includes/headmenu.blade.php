
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mitr|Prompt" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
        
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
                <nav class="navbar navbar-expand-lg bg-white fixed-top">
                    <a class="navbar-brand" href="{{ url('/chiangmai') }}">Chiang Mai Stream Blockages</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="navbar-toggler-icon"> <img src="{{ asset('images/logo/bar.png') }}" width="100%"> </div>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto navbar-right-top" >
                            <li class="nav-item" style="width: 30%">    </li>
                             <li class="nav-item dropdown " style="padding-bottom:-20px;">
                                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ข้อมูลสิ่งกีดขวางทางน้ำ</a>
                                <div class="dropdown-menu dropdown-menu-right" style="padding:20px 0 20px ; background-color:#b3d6ff ;"  >
                                    <a class="dropdown-item" href="{{ asset('/reports/map')}}">แผนที่ตำแหน่งสิ่งกีดขวางตามความเสี่ยง</a>
                                    <a class="dropdown-item" href="{{ asset('/chart?amp=รวม')}}">กราฟแสดงการจำแนกสภาพปัญหา</a>
                                    <a class="dropdown-item" href="{{ asset('/reports/summary')}}">รายงานสภาพและแนวทางการแก้ไขปัญหา</a>
                                    <a class="dropdown-item" href="{{ asset('/reports/problem')}}">ตารางรายงานสาเหตุและสภาพปัญหา</a>
                                    <a class="dropdown-item" href="{{ asset('/reports/solution')}}">ตารางรายงานแนวทางการแก้ไขปัญหา</a>
                                </div>
                            </li>

                             <li class="nav-item dropdown " style="padding-bottom:-20px;">
                                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">คลังความรู้ </a>
                                <div class="dropdown-menu dropdown-menu-right" style="padding:20px 0 20px ; background-color:#b3d6ff ; font-size:16px;"  >
                                    <!-- <a class="dropdown-item" href="https://www.landslide-chiangrai.net/">แผนที่ความเสี่ยงดินถล่มเชิงพลวัต </a> -->
                                    <a class="dropdown-item" href="{{ asset('/idf/chiangmai')}}" target=\"_blank\">IDF curves รายอำเภอ (จ.เชียงใหม่) </a>
                                    <a class="dropdown-item" href="{{ asset('/ddf/chiangmai')}}" target=\"_blank\">DDF curves รายอำเภอ (จ.เชียงใหม่) </a>
                                    <a class="dropdown-item" href="{{ asset('/pdf/flood-preparedness.pdf')}}">คู่มือสถานการณ์น้ำท่วม</a>
                                    
                                    <a class="dropdown-item" href="{{ asset('/pdf/flood-manage.pdf')}}">การบริหารจัดการน้ำท่วม</a>
                                    <a class="dropdown-item" href="{{ asset('/pdf/flood-protect.pdf')}}">การป้องกันน้ำไหลเข้าบ้าน</a>
                                    <a class="dropdown-item" href="{{ asset('/pdf/flood-structures.pdf')}}">โครงสร้างป้องกันน้ำท่วม</a>
                                    <a class="dropdown-item" href="{{ asset('/pdf/flood_drainage.pdf')}}">การออกแบบระบบระบายน้ำฝน</a>
                                    <a class="dropdown-item" href="{{ asset('/pdf/คู่มือwebsiteสำหรับผู้ใช้งานทั่วไป_draf 1-03-22.pdf')}}" target=\"_blank\">คู่มือการใช้งานเว็บไซต์</a>
                                    <a class="dropdown-item" href="{{ asset('/pdf/คู่มือline botสำหรับผู้ใช้งานทั่วไป_draf 1-03-22.pdf')}}" target=\"_blank\">คู่มือการใช้งานระบบช่วยสนับสนุนข้อมูล (Line)</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown ">
                                <a class="nav-link nav-user-img" href="{{ asset('/projectInfomation')}}" >เกี่ยวกับโครงการ</a>
                               
                            </li>
                            <!-- <li class="nav-item dropdown ">
                                <a class="nav-link nav-user-img" href="{{ asset('/projectInfomation')}}" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">เกี่ยวกับโครงการ</a>
                                <div class="dropdown-menu dropdown-menu-right" style="padding:20px 0 20px ; background-color:#b3d6ff ; font-size:16px;"  >
                                    <a class="dropdown-item" href="{{ asset('/projectInfomation')}}">ที่มาโครงการ</a>
                                </div>
                            </li> -->
                            <li class="nav-item dropdown ">
                                <a class="nav-link nav-user-img" href="{{ asset('/contact')}}" >ติดต่อเรา</a>
                               
                            </li>

                            <li class="nav-item" >
                                <a class="nav-link" href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                             </li>
                                   
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- ============================================================== -->
            <!-- end navbar -->
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="{{ asset('js/main-js.js') }}"></script>

</body>
</html>

         
