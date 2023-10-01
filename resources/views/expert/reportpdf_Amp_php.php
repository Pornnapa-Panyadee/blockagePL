<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
     <style>
		@font-face{
		font-family:'THSarabunNew';
		font-style: normal;
		font-weight: normal;
		src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
		}
	    @font-face{
		font-family:'THSarabunNew';
		font-style: normal;
		font-weight: normal;
		src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
		}
		
		html, body {
			background-color: #fff;
			color: #000000;
			font-family: "THSarabunNew";
		}
		.position-ref {
		    position: relative;
		}
		.flex-center {
			align-items: center;
			display: flex;
			justify-content: center;
		}
		.content {
			text-align: left;
			
		}
		.title {
            font-size:16px;
            line-height: 1.2;
		}
		.m-b-md {
			/* margin-bottom: 2px; */
        }  
        .table{
            width:100%;
			/* margin-bottom:0.1rem; */
            background-color:transparent
        }
        .table td,
        .table th{
            /* padding:-.5rem; */
			/* vertical-align:top; */
			padding-top: -.3rem;
            border-top:1px solid #000000;
            line-height: 96%;
        }
        .table thead th{
            /* vertical-align:bottom; */
            border-bottom:1px solid #000000
        }
        .table td{
            height:10;
        } 
        .table .table{background-color:#f8fafc}
        .table-bordered,
        .table-bordered td,
        .table-bordered th{border:1px solid #000000}
        .table-bordered thead td,
        /* .table-bordered thead th{border-bottom-width:2px} */
        .table{border-collapse:collapse!important}
        .table-borderless tbody+tbody,
        .table-borderless td,
        .table-borderless th,
		.table-borderless thead th{border:0}
		.text-center{text-align:center!important}
        .text-right{text-align:right!important}
        html { margin-bottom: 0px}
        p.test1 {
            margin-top:5px;
            margin-left: 3px;
            margin-bottom: 5px;
        }
        p.test2 {
            margin-top:1px;
            margin-left: 3px;
            margin-bottom: 5px;
            width: 340px; 
            word-wrap:break-word;
            line-height: 0.8;
        }
        footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 2cm;

                /** Extra personal styles **/
                /* background-color: #03a9f4; */
                color:#000;
                text-align: right;
                line-height: 1.5cm;
                content: counter(page);
        }
        .page-break {
            page-break-after: always;
        }
        .customers {
            border-collapse: collapse;
            border: 4px solid #fff;
            border-color: #fff;
        }
        .text_report{
            font-size: 70px;
        }
        .text_report1{
            font-size: 42px;
            margin-bottom: -20px;
        }
        .text_report2{
            font-size: 80px;
            margin: 100px 0 -20px 0;
        }
        .text_report3{
            font-size: 30px;
            margin: 250px 0 -260px 0;
        }
        .text_report4{
            font-size: 24px;
            margin: 260px 0 -260px 0;
        }
        .text_report5{
            font-size: 60px;
            margin: 170px 0 0 0;
        }
        .text_report6{
            font-size: 18px;
            font-weight: bold;
        }
    </style>
        
</head>
<body>
    <div class="row" align="center" style=" margin-top:10px;"> 
    <!-- รายงานสรุป -->
    <div class="text_report">รายงานสรุป</div>
    <div class="text_report1">ข้อมูลสภาพปัญหาและแนวทางการแก้ไขปัญหาเบื้องต้น</div>
    <div class="text_report1">ของตำแหน่งการกีดขวางทางน้ำ</div>
    <?php if ($tumbol!="sum"){?>
        <div class="text_report2">ตำบล<?php echo $tumbol; ?></div>
        <div class="text_report1">อำเภอ<?php echo $amp; ?> จังหวัดลำปาง</div>
    <?php }else{ ?> 
        <div class="text_report5">อำเภอ<?php echo $amp; ?> จังหวัดลำปาง</div>
    <?php }?>
    <div class="text_report3"> โครงการพัฒนาระบบข้อมูลสารสนเทศของสิ่งกีดขวางทางน้ำ </div>
    <div class="text_report3"> ในลำน้ำคูคลองและถนนในพื้นที่ลุ่มน้ำแม่จาง จังหวัดลำปาง</div>
    

        </div>
    <footer>
        หมายเหตุ ข้อมูลใช้เพื่อการศึกษาวางแผน ไม่สามารถใช้อ้างอิงทางกฎหมายและคดีความ
    </footer>
    <div class="row" >
        <div class="col-xl-1 col-lg-1">
        </div>
        <!-- ============================================================== -->
        <!-- basic table -->
        <!-- ============================================================== -->
        <?php 
            function checkZero($text) {
                if($text=="0" ||$text==NULL ){
                    $num="-";
                }else{
                    $num=$text;
                 }
                    return $num;
                }
            function checkProbleLevel($text){
                if($text==NULL){
                    return "-";
                }
                else if($text=="1-30%"){
                    return "น้อย";
                }else if($text=="30-70%"){
                    return "ปานกลาง";
                }else{
                    return "มาก";
                }
            }
            function checkPlan($text,$year,$char,$budget){
                if($text==NULL){
                    return "-";
                }else if ($text=="plan"){
                    $c="อยู่ในแผน ".$year." ".$char." งบประมาณ ".$budget." บาท";
                    return $c;
                }else if($text=="received"){
                    return "ได้รับงบประมาณแล้ว".$budget."บาท ลักษณะโครงการ ".$char;
                }else if($text=="making"){
                    return "กำลังปรับปรุงหรือก่อสร้าง";
                }else{
                    return "ยังไม่มีในแผน";
                }
            }
            function checkDamage($flood,$waste,$other){
                
                if($flood=="0" && $waste=="0" && $other=="0"){
                    return "  -";
                } else if($flood!=NULL||$flood!=0){
                    return "น้ำท่วม";
                }else if($waste!=NULL||$waste!=0){
                    return "น้ำเสีย";
                }else if($other!=NULL||$other!=0){
                    return "อื่นๆ";
                }
            }
            function checklevel($flood,$waste,$other) {
                if($flood!=NULL||$flood!=0){
                    if($flood=="low"){
                        $level="น้อย";
                    }else if( $flood=="medium"){
                        $level="ปานกลาง";
                    }else if( $flood=="high") {
                        $level="มาก";
                    }else{
                        $level=NULL;
                    }
                }else if($waste!=NULL||$waste!=0){
                    if($waste=="low"){
                        $level="น้อย";
                    }else if( $waste=="medium"){
                        $level="ปานกลาง";
                    }else if( $waste=="high") {
                        $level="มาก";
                    }else{
                        $level=NULL;
                    }

                }else if($other!=NULL||$other!=0){
                    if($other=="low"){
                        $level="น้อย";
                    }else if( $other=="medium"){
                        $level="ปานกลาง";
                    }else if( $other=="high") {
                        $level="มาก";
                    }else{
                        $level=NULL;
                    }
                }
                    return $level;
            }
            function checkRisk($level,$fq){
                if($level=="มาก"){
                    $l=3;
                }else if($level=="ปานกลาง"){
                    $l=2;
                }else{
                    $l=1;
                }

                if($fq=="ทุกปี"){
                    $f=3;
                }else if($fq=="2-4 ปีครั้ง"){
                    $f=2;
                }else{
                    $f=1;
                }
                
                $cal=$l*$f;

                if($cal<3){
                    return "น้อย";
                }
                else if($cal<6){
                    return "ปานกลาง";
                }else{
                    return "มาก";
                }
            }

            function checkW($text){
                 if($text=="0" ||$text==NULL ||$text=="-"){
                        return " ";
                 }else{
                        return " ความลาดชันท้องน้ำ ".$text;
                 }
            }
            function DateTimeThai($strDate)
                            {
                                $strYear = (date("Y",strtotime($strDate))+543);
                                $strMonth= date("n",strtotime($strDate));
                                $strDay= date("j",strtotime($strDate));
                                // $strHour= date("H",strtotime($strDate));
                                // $strMinute= date("i",strtotime($strDate));
                                // $strSeconds= date("s",strtotime($strDate));
                                $strMonthCut =  Array("","มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤษจิกายน","ธันวาคม");
                                $strMonthThai=$strMonthCut[$strMonth];
                                return "$strDay $strMonthThai $strYear ";
                            }
        ?>
        
    </div>
    
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main-js.js') }}"></script>
<script src="{{ asset('js/shortable-nestable/Sortable.min.js') }}"></script>
<script src="{{ asset('js/shortable-nestable/sort-nest.js') }}"></script>
<script src="{{ asset('js/shortable-nestable/jquery.nestable.js') }}"></script>

<script src="{{ asset('js/location.js') }}"></script>
<script src="{{ asset('js/showhide.js') }}"></script>
<script src="{{ asset('js/chooseLocation.js') }}"></script>
<script src="{{ asset('js/validateNewForm.js') }}"></script>


</body>
</html>
