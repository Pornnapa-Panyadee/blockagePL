<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blockage::CMFightflood</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mitr|Prompt" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.css')}}">

        
</head>
<body>
    <div class="dashboard-main-wrapper">
       
        @include('includes.head_framework') 
        <div id="app">

            @yield('content')
        
        </div>
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
      
                <div class="container-fluid dashboard-content" style="margin-bottom:-40px;">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- icon fontawesome solid  -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <!-- <div class="card-header"> -->
                                    <!-- <img src="{{ asset('images/framework/banner.png') }}" width="100%">  -->
                                    <!-- <h3 class="card-title">กิจกรรมการพัฒนาระบบข้อมูลของสิ่งกีดขวางทางน้ำในลำน้ำคูคลองและถนนในจังหวัดเชียงใหม่ </h3> --> 
                                <!-- </div> -->
                                <div class="card-body" >
                                    
                                    <div class="row">
                                        <div class="col-xs-9 col-sm-9 col-md-9">
                                            <a href="{{ asset('/detail')}}">
                                                <img src="{{ asset('images/framework/banner1.png') }}" width="100%" > 
                                            </a>
                                            <br>  <br>
                                            <div style="background-color:#0f719e; padding: 10px; ">
                                                <div class="row">
                                                    <div class="col-xs-6 col-sm-6 col-md-6" style="padding: 10px; ">
                                                        <img src="{{ asset('images/framework/system.png') }}" width="100%">
                                                    </div>
                                                    <div class="col-xs-3 col-sm-3 col-md-3" style="padding: 20px; ">
                                                        <center>
                                                            <a href="{{ asset('/chiangmai')}}">
                                                            <img src="{{ asset('images/framework/cnxq.png') }}" width="100%"></a> 
                                                        </center>
                                                    </div>
                                                    <div class="col-xs-3 col-sm-3 col-md-3" style="padding: 20px; ">
                                                        <center>
                                                            <a href="{{ asset('https://blockage.crflood.com/')}}">
                                                            <img src="{{ asset('images/framework/cnr.png') }}" width="100%"></a> 
                                                        </center>
                                                    </div>
                                                </div>

                                            </div>
                                                
                                        </div>    
                                        <div class="col-xs-3 col-sm-3 col-md-3">
                                            <center>
                                                <a href="{{ asset('/pdf/Book_Water-Guide-2.pdf')}}">
                                                <img src="{{ asset('images/framework/manual.png') }}" width="80%"> </a>
                                            </center>
                                            <br>
                                            <center>
                                                <a class="nav-link" href="{{ route('login') }}">
                                                <img src="{{ asset('images/framework/survey.png') }}" width="85%"> </a>
                                            </center>
                                            <br>
                                            <center>
                                                <a class="nav-link" href="{{ route('register') }}">
                                                <img src="{{ asset('images/framework/user1.png') }}" width="85%"> </a>
                                            </center>
                                            <br>
                                            <!-- <iframe width="420" height="300" src="https://www.youtube.com/embed/zov80bbHAcg?autoplay=1">
                                            </iframe> -->
                                            <!-- <video width="100%" height="240" controls>
                                                <source src="movie.mp4" type="video/mp4">
                                                <source src="movie.ogg" type="video/ogg">
                                                Your browser does not support the video tag.
                                            </video> -->
                                            <iframe width="100%" height="313" 
                                                src="https://www.youtube.com/embed/zov80bbHAcg?autoplay=1&mute=1" frameborder="0" allowfullscreen>
                                            </iframe>
                                            
                                        </div>   
                                    </div>                          
                                  
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end icon fontawesome solid  -->
                            <!-- ============================================================== -->
                            
                        </div>
                    </div>
                    
                </div>
                @include('includes.foot')
      
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->

       
    </div>
    
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> 
    <script src="{{ asset('/js/data-table.js') }}"></script> 
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script> 
    

</body>
</html>
