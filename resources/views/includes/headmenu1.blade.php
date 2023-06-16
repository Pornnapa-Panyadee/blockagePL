<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <style>
        font.mm-1{
            font-size: 25px;
        }
    </style> -->
    
</head>
<body>

<!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
                <nav class="navbar navbar-expand-xl bg-white fixed-top">
                    <a class="navbar-brand" href="{{ url('/') }}">Chiang Mai Stream Blockages</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="navbar-toggler-icon"> <img src="{{ asset('images/logo/bar.png') }}" width="100%"> </div>
                    </button>
                    <div class="collapse navbar-collapse " id="navbarSupportedContent">
                        <ul class="navbar-nav mx-auto navbar-right-top" >
                            <li class="nav-item" style="width: 60%">    </li>
                             <li class="nav-item dropdown " style="padding-bottom:-20px;">
                                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ข้อมูลสิ่งกีดขวางทางน้ำ</a>
                                <div class="dropdown-menu dropdown-menu-right" style="padding:20px 0 20px ; background-color:#b3d6ff ; font-size:16px;"  >
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
                                    <a class="dropdown-item" href="{{ asset('/pdf/flood-preparedness.pdf')}}">คู่มือสถานการณ์น้ำท่วม</a>
                                    
                                    <a class="dropdown-item" href="{{ asset('/pdf/flood-manage.pdf')}}">การบริหารจัดการน้ำท่วม</a>
                                    <a class="dropdown-item" href="{{ asset('/pdf/flood-protect.pdf')}}">การป้องกันน้ำไหลเข้าบ้าน</a>
                                    <a class="dropdown-item" href="{{ asset('/pdf/flood-structures.pdf')}}">โครงสร้างป้องกันน้ำท่วม</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown ">
                                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">เกี่ยวกับโครงการ</a>
                                <div class="dropdown-menu dropdown-menu-right" style="padding:20px 0 20px ; background-color:#b3d6ff ; font-size:16px;"  >
                                    <a class="dropdown-item" href="{{ asset('/projectInfomation')}}">ที่มาโครงการ</a>
                                    
                                    <a class="dropdown-item" href="#">ภาพกิจกรรม</a>
                                </div>
                            </li>
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
                                <!-- @guest
                                    <li class="nav-item" align="right">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                        
                                    @endif
                                    @else
                                        <li class="nav-item dropdown nav-user">
                                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user mr-2"></i></a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                    <div class="nav-user-info">
                                                            <h6 class="mb-0 text-white nav-user-name"> {{ Auth::user()->name }}</h6>
                                                            
                                                    </div>
                                                    
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();"><i class="fas fa-power-off mr-2"></i>
                                                        {{ __('Logout') }}
                                                    </a>
                
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </div>
                                        </li>
                                @endguest
                            {{-- </li> --}} -->