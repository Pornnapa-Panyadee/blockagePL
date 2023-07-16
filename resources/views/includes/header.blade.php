<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mitr|Prompt" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
</head>
<body>
 <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
                <div class="menu-list">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="d-xl-none d-lg-none" href="#"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav flex-column">
                                <li class="nav-divider">
                                    เมนู
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/') }}"  aria-expanded="false"><i class="fa fa-home fa-fw"></i>หน้าแรก</a>
                                    
                                </li>

                                {{-- <li class="nav-item ">
                                    <a class="nav-link " href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>บทความ / คู่มือ <span class="badge badge-success">6</span></a>
                                    <div id="submenu-1" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/floodpreparedness') }}">คู่มือสถานการณ์น้ำท่วม</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/floodmanage') }}">การบริหารจัดการน้ำท่วม </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/floodprotect') }}">การป้องกันน้ำไหลเข้าบ้าน </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ url('/floodstructures') }}">โครงสร้างป้องกันน้ำท่วม </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li> --}}
                                <!-- <li class="nav-item ">
                                    <a class="nav-link " href="{{ url('/report') }}"><i class="fa fa-fw fa-user-circle"></i>รายงานสรุป <span class="badge badge-success">6</span></a>
                                </li> -->
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ asset('login') }}" aria-expanded="false" ><i class="fab fa-fw fa-wpforms"></i>ข้อมูลสำรวจสิ่งกีดขวางทางน้ำ</a>
                                    <!-- <div id="submenu-4" class="collapse submenu" >
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                
                                                     <a class="nav-link" href="{{ asset('login') }}">ข้อมูลสำรวจรายละเอียดการกีดขวางทางน้ำ</a>
                                                
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ asset('/expert') }}">ข้อเสนอแนะโดยผู้เชี่ยวชาญ</a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                    <a class="nav-link" href="#">admin</a>
                                            </li> --}}
                                           
                                        </ul>
                                    </div> -->
                                </li>

                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ asset('/expert') }}" aria-expanded="false"><i class="fa fa-graduation-cap"></i>ข้อเสนอแนะโดยผู้เชี่ยวชาญ</a>
                                    <!-- <div id="submenu-4" class="collapse submenu" >
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                
                                                     <a class="nav-link" href="{{ asset('login') }}">ข้อมูลสำรวจรายละเอียดการกีดขวางทางน้ำ</a>
                                                
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ asset('/expert') }}">ข้อเสนอแนะโดยผู้เชี่ยวชาญ</a>
                                            </li>
                                            {{-- <li class="nav-item">
                                                    <a class="nav-link" href="#">admin</a>
                                            </li> --}}
                                           
                                        </ul>
                                    </div> -->
                                </li>
                                {{-- <li class="nav-item ">
                                    <a class="nav-link " href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i> เกี่ยวกับโครงการ <span class="badge badge-success">6</span></a>
                                    <div id="submenu-5" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ asset('/projectinfomation')}}">ที่มาโครงการ</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">ภาพกิจกรรม </a>
                                            </li>
                                        
                                        </ul>
                                    </div>
                                </li> --}}
                                <!-- <li class="nav-item ">
                                    <a class="nav-link" href="{{ asset('/Contact')}}"  aria-expanded="false"><i class="fab fa-fw fa-wpforms"></i>ติดต่อ</a>
                                    
                                </li> -->
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ url('/usersverify') }}"  aria-expanded="false"><i class="fa fa-fw fa-user-circle"></i>การจัดการผู้ใช้งาน</a> 
                                </li>   
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2"></i> {{ __('ออกจากระบบ') }}
                                    </a>
                                    
                                </li>                     
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end left sidebar -->
            <!-- ============================================================== -->
    </body>
</html>