<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IDF Curves::CMFIghtflood</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mitr|Prompt" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myCss.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.css') }}">
    <style>
        #container {
        height: 800px; 
        width: 100%; 
        margin: 0 auto; 
        }
        .loading {
            margin-top: 10em;
            text-align: center;
            color: gray;
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
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding: 100px 0 5px 0; /* Location of the box */
           
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: hidden ; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.85); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 32%;
            /* max-width: 700px; */
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 60%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content, #caption {  
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)} 
            to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
            from {transform:scale(0)} 
            to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 50px;
            right: 50px;
            color: #fff;
            font-size: 70px;
            font-weight: bold;
            transition: 0.9s;
        }

        .close:hover,
        .close:focus {
            color: #fff;
            text-decoration: none;
            cursor: pointer;
        }
        #text{
            margin-left: 10px;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
            .close {
                position: absolute;
                top: 70px;
                right: 10px;
                color: #fff;
                font-size: 30px;
                font-weight: bold;
                transition: 0.9s;
            }
            .modal-content {
                margin: auto;
                display: block;
                width: 80%;
                /* max-width: 700px; */
            }
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
                                <h3 class="card-title">กราฟความเข้มของฝน (IDF curves) ของอำเภอ{{$amp}}  </h3>
                                
                            </div>
                            <div class="row" style="margin-left:20px; margin-top:-10px;" >
                                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-6 col-6">
                                    <h5 class="card-subtitle"><a href="{{ asset('/idf/chiangmai') }}">จังหวัดเชียงใหม่ </a> &raquo; อำเภอ{{$amp}} </h5>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-4 col-4">
                                    <br>
                                    <div class="dropdown" >
                                        <button class="btn btn-dark dropdown-toggle" type="button" data-toggle="dropdown" style="margin= 5px;">ค้นหา อำเภอ
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
                                <!-- grid column -->
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <?php if($has_file==1){ ?>
                                            <!-- .card -->
                                                <div class="card card-figure">
                                                    <!-- .card-figure -->
                                                    <figure class="figure">
                                                        <!-- .figure-img -->
                                                        <div class="figure-attachment">
                                                            <img src="{{ asset($amp_name)}}" id="myImg" class="img-fluid" width="60%"> 
                                                        </div>
                                                        <div id="myModal" class="modal">
                                                            <span class="close">&times;</span>
                                                            <img class="modal-content" id="img01" width="60%">
                                                            <div id="caption"></div>
                                                        </div>
                                                        <!-- /.figure-img -->
                                                        <figcaption class="figure-caption">
                                                            <ul class="list-inline d-flex text-muted mb-0">
                                                                <li class="list-inline-item text-truncate mr-auto"> อำเภอ{{$amp}} </li>
                                                                <li class="list-inline-item">
                                                                        ดาวน์โหลด<a href="{{ asset($amp_name)}}" download>  <span><i class="fas fa-download "></i></span></a>
                                                                </li>
                                                            </ul>
                                                        </figcaption>
                                                    </figure>
                                                    <!-- /.card-figure -->
                                                </div>
                                            <!-- /.card -->
                                        <?php }else{ ?>
                                            <!-- .card -->
                                                <div class="card card-figure">
                                                    <!-- .card-figure -->
                                                    <figure class="figure">
                                                        <center><h3><br>อยู่ระหว่างดำเนินการ <br>  <br> หรือ <br> <br> เลือกใช้กราฟของอำเภอใกล้เคียง<br></h3></center>
                                                    </figure>
                                                    <!-- /.card-figure -->
                                                </div>
                                            <!-- /.card -->
                                        
                                        <?php } ?>
                                        
                                        </div>
                                        <!-- /grid column -->
                                    </div>  
                                  
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end icon fontawesome solid  -->
                    <!-- ============================================================== -->
                    <br><BR><BR>
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
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $(".dropdown-menu li").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById("myImg");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
            img.onclick = function(){
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
            modal.style.display = "none";
        }
    </script>


</body>
</html>