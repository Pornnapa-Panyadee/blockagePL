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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.css')}}">
    <!-- leaflet -->
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    {{-- <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" type="text/css"> --}}
    
        
</head>
<body>
    <div class="dashboard-main-wrapper">
       
        @include('includes.headmenu') 
   
        {{-- @guest
                                
        @if (Route::has('login'))
            @include('includes.headmenu')         
        @endif
           @include('includes.head')
           @include('includes.header')
        @else
               
        @endguest --}}
        {{-- @include('includes.header') --}}
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
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col" >ชื่อ</th>
                                            <th scope="col" >นามสกุล</th>
                                            <th scope="col" >ตำเเหน่ง</th>
                                            <th scope="col" >หน่วยงาน/สังกัด</th>
                                            <th scope="col" >เบอร์ติดต่อ</th>
                                            <th scope="col" >อีเมล</th>
                                            <th scope="col" >วันที่สมัคร</th>
                                            <th scope="col"> ยืนยัน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userRegisterJson as $userRegister)
                                        <tr>
                                            <td style="text-align:center;">{{ $userRegister['name'] }}</td>
                                            <td style="text-align:center;">{{ $userRegister['LName'] }}</td>
                                            <td style="text-align:center;">{{ $userRegister['Position'] }}</td>
                                            <td style="text-align:center;">{{ $userRegister['Department'] }}</td>
                                            <td style="text-align:center;">{{ $userRegister['Tel'] }}</td>
                                            <td style="text-align:center;">{{ $userRegister['email'] }}</td>
                                            <td style="text-align:center;">{{ $userRegister['created_at'] }}</td>
                                            <td style="text-align:center;">
                                                <form method="get" action="/testing/emailsendperuser/{{$userRegister['email']}}">
                                                    <button class="btn btn-primary">Verify</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <br>
                                <div class="verfly-all-users">
                                    <div class="form-group">
                                        <form method="get" action="/testing/emailsend">
                                            <button class="btn btn-primary" type="submit">Verify All</button>
                                        </form>
                                    </div>
                                </div>

                                <br>
                                <hr>
                                <div class="container">
                                    <h4 text-align="center">รายละเอียดการยืนยันสมาชิก</h4>
                                </div>

                                {{-- User verified --}}
                                <div class="container">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col" >ชื่อ</th>
                                                <th scope="col" >นามสกุล</th>
                                                <th scope="col" >ตำเเหน่ง</th>
                                                <th scope="col" >หน่วยงาน/สังกัด</th>
                                                <th scope="col" >เบอร์ติดต่อ</th>
                                                <th scope="col" >อีเมล</th>
                                                <th scope="col" >วันที่สมัคร</th>
                                                <th scope="col" >สถานะการยืนยัน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($userReportVerifiedJsosn as $userVerified)
                                            <tr>
                                                <td style="text-align:center;">{{ $userVerified['name'] }}</td>
                                                <td style="text-align:center;">{{ $userVerified['LName'] }}</td>
                                                <td style="text-align:center;">{{ $userVerified['Position'] }}</td>
                                                <td style="text-align:center;">{{ $userVerified['Department'] }}</td>
                                                <td style="text-align:center;">{{ $userVerified['Tel'] }}</td>
                                                <td style="text-align:center;">{{ $userVerified['email'] }}</td>
                                                <td style="text-align:center;">{{ $userVerified['created_at'] }}</td>
                                                <td style="text-align:center;">{{ $userVerified['verify'] }}</td>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>


                                {{-- END --}}
      

                                
                            </div>
            
     
                        </div>
                    </div>
                    
                </div>
                @include('includes.foot')
      
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->

       
    </div>
    
 
</body>
</html>
