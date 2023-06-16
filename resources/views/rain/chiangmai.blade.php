<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IDF Curves::CMFightflood</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mitr|Prompt" rel="stylesheet">
    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myCss.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.css') }}">
    <style>
        #container {
            height: 700px; 
            width: 100%; 
            margin: 0 auto; 
        }
        .loading {
            margin-top: 10em;
            text-align: center;
            color: gray;
        }
        #text{
            margin-left: 10px;
        }
        @media only screen and (max-width:600px) {
            #container {
                height: 500px; 
                width: 100%; 
                margin: 0 auto; 
            }
        }
    </style>
    <script src="{{ asset('js/rain/highmap.js') }}"></script>
    <script src="{{ asset('js/rain/chiangmai.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    /* Style the input field */
        #myInput {
            padding: 10px;
            margin-top: -6px;
            border: 0;
            border-radius: 0;
        }
    </style>

     
</head>
<body>

    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
                <nav class="navbar navbar-expand-lg bg-white fixed-top">
                    <a class="navbar-brand" href="{{ url('/idf/chiangmai') }}">Intensity-Duration-Frequency Curves (IDF Curves)</a>
                   
                </nav>
        </div>
        <div class="container-fluid dashboard-content" style="margin-bottom:-40px;">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <!-- ============================================================== -->
                    <!-- icon fontawesome solid  -->
                    <!-- ============================================================== -->
                    <div class="card">
                           
                            <div class="card-header">
                                <h3 class="card-title">กราฟความเข้มฝน-ช่วงเวลา-ความถี่การเกิด (IDF curves) ของจังหวัดเชียงใหม่ </h3>
                                
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12" align="center">
                                    <h5 class="card-subtitle" style="margin-left:20px;"> กดที่ชื่ออำเภอในแผนที่หรือสืบค้น (ค้นหา อำเภอ) เพื่อแสดงรูป IDF curve รายอำเภอ </h5>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 col-6" >
                                    <br>
                                    <div class="dropdown" >
                                
                                        <button class="btn btn-dark dropdown-toggle" type="button" data-toggle="dropdown" style="margin = 5px;">ค้นหา อำเภอ
                                            <span class="caret"></span>
                                        </button>
                                            <ul class="dropdown-menu">
                                                <input class="selectpicker" id="myInput" type="text" placeholder="ค้นหา..">
                                                <li id="text" ><a href="{{ url('/idf/chiangmai/เชียงดาว') }}">เชียงดาว</a></li>
                                                <li id="text" ><a href="{{ url('/idf/chiangmai/เมืองเชียงใหม่') }}">เมืองเชียงใหม่</a></li>
                                                <li id="text" ><a href="{{ url('/idf/chiangmai/เวียงแหง') }}">เวียงแหง</a></li>
                                                <li id="text"><a href="{{ url('/idf/chiangmai/แม่แจ่ม') }}">แม่แจ่ม</li>
                                                <li id="text"><a href="{{ url('/idf/chiangmai/แม่แตง') }}">แม่แตง</a></li>
                                                
                                                <li id="text"><a href="{{ url('/idf/chiangmai/แม่ริม') }}">แม่ริม</a></li>
                                                <li id="text"><a href="{{ url('/idf/chiangmai/แม่วาง') }}">แม่วาง</a></li>
                                                <li id="text"><a href="{{ url('/idf/chiangmai/แม่ออน') }}">แม่ออน</a></li>
                                                <li id="text" ><a href="{{ url('/idf/chiangmai/แม่อาย') }}">แม่อาย</a></li>
                                                <li id="text"><a href="{{ url('/idf/chiangmai/ไชยปราการ') }}">ไชยปราการ</a></li>

                                                <li id="text"><a href="{{ url('/idf/chiangmai/กัลยานิวัฒนา') }}">กัลยานิวัฒนา</a></li>
                                                <li id="text"><a href="{{ url('/idf/chiangmai/จอมทอง') }}">จอมทอง</a></li>
                                                <li id="text"><a href="{{ url('/idf/chiangmai/ดอยเต่า') }}">ดอยเต่า</a></li>
                                                <li id="text"><a href="{{ url('/idf/chiangmai/ดอยสะเก็ด') }}">ดอยสะเก็ด</a></li>
                                                <li id="text"><a href="{{ url('/idf/chiangmai/ดอยหล่อ') }}">ดอยหล่อ</a></li>
                                                
                                                <li id="text"><a href="{{ url('/idf/chiangmai/ฝาง') }}">ฝาง</a></li>
                                                <li id="text"><a href="{{ url('/idf/chiangmai/พร้าว') }}">พร้าว</a></li>
                                                <li id="text"><a href="{{ url('/idf/chiangmai/สะเมิง') }}">สะเมิง</a></li>
                                                <li id="text"><a href="{{ url('/idf/chiangmai/สันกำแพง') }}">สันกำแพง</a></li>
                                                <li id="text"><a href="{{ url('/idf/chiangmai/สันทราย') }}">สันทราย</a></li>

                                                <li id="text"><a href="{{ url('/idf/chiangmai/สันป่าตอง') }}">สันป่าตอง</a></li>
                                                <li id="text"><a href="{{ url('/idf/chiangmai/สารภี') }}">สารภี</a></li>
                                                <li id="text"><a href="{{ url('/idf/chiangmai/หางดง') }}">หางดง</a></li>
                                                <li id="text" ><a href="{{ url('/idf/chiangmai/ออมก๋อย') }}">ออมก๋อย</a></li>
                                                <li id="text" ><a href="{{ url('/idf/chiangmai/ฮอด') }}">ฮอด</a></li>
                                            </ul>
                                    </div>
                                </div>
                            </div>
                        
                        <div class="card-body" >
                            <div class="row justify-content-center" >
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div id="container"></div>  
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

        <div class="footer">
                <div class="row justify-content-md-center" align="center">
                    <div class="col-md-8" style="margin-top: 10px;">
                       <a href="https://www.eng.cmu.ac.th/site/?tag=cendim">
                            <img src="{{ asset('images/logo/footer/cendim.jpg') }}" width="15%">
                            ศูนย์วิจัยด้านการจัดการภัยพิบัติทางธรรมชาติ มหาวิทยาลัยเชียงใหม่ (CENDiM)
                       </a>
                    </div>
                
                </div>        
        </div>
  
    </div>


<script src= "{{ asset('js/app.js') }}"></script> 
<script>
        var data = [
            ['cm-cd', 1],
            ['cm-mu', 1],
            ['cm-wh', 1],
            ['cm-mj',1],
            ['cm-mt',1],

            ['cm-mr',1],
            ['cm-mw',1],
            ['cm-mo',1],
            ['cm-ma',1],
            ['cm-cp',1],
            
            ['cm-kw',1],
            ['cm-ct',1],
            ['cm-dt',1],
            ['cm-ds',1],
            ['cm-dl',1],

            ['cm-fg',1],
            ['cm-ph',1],
            ['cm-sm',1],
            ['cm-sk',1],
            ['cm-ss',1],

            ['cm-st',1],
            ['cm-sp',1],
            ['cm-hd',1],
            ['cm-ok',1],
            ['cm-ht',1]


            
        ];

        // Create the chart
        Highcharts.mapChart('container', {
            chart: {
                map: 'countries/th/th-all',
                style: {
                    fontFamily: 'Mitr'
                },
                transform: 'translate(10,3) scale(0.95)',
            },

            title: {
                enabled: false,
                // text: 'กราฟความเข้มฝน-ช่วงเวลา-ความถี่การเกิด (IDF curve) ของจังหวัดเชียงใหม่'
            },
            subtitle: {
                // text: 'กดที่ชื่ออำเภอในแผนที่หรือสืบค้น เพื่อแสดงรูป IDF curve รายอำเภอ'
            },

            
            drilldown: {
                activeAxisLabelStyle: {
                    cursor: 'default',
                    color: '#3E576F',
                    fontWeight: 'normal',
                    textDecoration: 'none'
                },
                activeDataLabelStyle: {
                    cursor: 'default',
                    color: '#3E576F',
                    fontWeight: 'normal',
                    textDecoration: 'none'
                }
            },

            series: [{
                data: data,
                name: 'อำเภอ',
                states: {
                    hover: {
                        color: '#0033cc'
                    }
                },
                // dataLabels: {
                //     enabled: true,
                //     format: '{point.name}'
                // }
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    formatter: function () {
                        if (this.point.value) {
                            return this.point.name;
                        }
                    }
                    
                },
                tooltip: {
                    headerFormat: '',
                    pointFormat: '{point.name}'
                }
            }]
        });
    </script>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".dropdown-menu li").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>


</body>
</html>