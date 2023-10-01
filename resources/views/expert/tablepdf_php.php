<!DOCTYPE html>
<html>
<head>
    <title>Blockage PDF</title>
    <style>
		@font-face{
		font-family:  'THSarabunNew';
		font-style: normal;
		font-weight: normal;
		src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
		}
	    @font-face{
		font-family:  'THSarabunNew';
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
			font-size:15px;
		}
		.m-b-md {
			/* margin-bottom: 2px; */
        }  
        .table{
            width:100%;
            /* margin-bottom:1rem; */
            background-color:transparent;
            border-collapse: collapse;
        }
        thead,th{
            /* font-weight: bold; */
            font-size:18px;
        }
        
        td {
            
            border: 1px black solid;
        }
        .rotate {
            text-align: center;
            white-space: normal;
            vertical-align: middle;
            width: 1.5em;
            }
        .rotate div {
            -moz-transform: rotate(-90.0deg);  /* FF3.5+ */
            -o-transform: rotate(-90.0deg);  /* Opera 10.5 */
        -webkit-transform: rotate(-90.0deg);  /* Saf3.1+, Chrome */
                margin-left:-10px;
                margin-right: -10px;
                margin-top: -10px;
                text-align: left;
        }

        .checkmark{
            display:inline-block;
            content: '';
            width: 3px;
            height: 10px;
            border: solid #000;
            border-width: 0 1px 1px 0;
            transform: rotate(40deg);
            margin-left: 10px;
        }
        td.test1 {
                margin-top:5px;
                margin-left: 3px;
                margin-bottom: 5px;
            }
        td.test2 {
                padding-left: 5px;
                padding-right: 5px;
                word-wrap:break-word;
                text-align: left;
            }
        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height: 1cm;
            color:#000;
            text-align: right;
            line-height: 1.5cm;
            content: counter(page);
        }
        .text_report{
            font-size: 70px;
        }
        .text_report1{
            font-size: 42px;
            margin-bottom: -20px;
        }
        .text_report2{
            font-size: 60px;
            margin: 100px 0 -20px 0;
        }
        .text_report3{
            font-size: 30px;
            margin: 150px 0 -160px 0;
        }
        .text_report4{
            font-size: 24px;
            margin: 160px 0 -160px 0;
        }
        .text_report5{
            font-size: 56px;
            margin: 130px 0 0 0;
        }
        .text_report6{
            font-size: 18px;
            font-weight: bold;
        }
        .page-break {
            page-break-after: always;
        }
	</style>
</head>
<body>
    <div class="row" align="center" > 
    
        <div class="text_report">รายงานสรุป</div>
        <div class="text_report1">ข้อมูลสภาพปัญหาและแนวทางการ</div>
        <?php if ($tumbol!="sum"){?>
            <div class="text_report2">ตำบล<?php echo $tumbol; ?></div>
            <div class="text_report1">อำเภอ<?php echo $amp_req; ?> จังหวัดลำปาง</div>
        <?php }else{ ?> 
            <div class="text_report5">อำเภอ<?php echo $amp_req; ?> จังหวัดลำปาง</div>
        <?php }?>
        <div class="text_report3"> โครงการพัฒนาระบบข้อมูลสารสนเทศของสิ่งกีดขวางทางน้ำในลำน้ำคูคลองและถนน </div>
        <div class="text_report3"> ในพื้นที่ลุ่มน้ำแม่จาง จังหวัดลำปาง</div>
    </div>
    <footer>
        หมายเหตุ ข้อมูลใช้เพื่อการศึกษาวางแผน ไม่สามารถใช้อ้างอิงทางกฎหมายและคดีความ
    </footer>
    <div class="flex-center position-ref full-height">
            <div class="content">
                    <div class="page-break"></div>
                <div class="title m-b-md">
                   
                    <table class="table table-bordered">
                        
                        <?php 
                            function DateTimeThai($strDate)
                                {
                                    $strYear = (date("Y",strtotime($strDate))+543)-2500;
                                    $strMonth= date("n",strtotime($strDate));
                                    $strDay= date("j",strtotime($strDate));
                                    $strMonthCut =  Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
                                    $strMonthThai=$strMonthCut[$strMonth];
                                    return "$strDay $strMonthThai $strYear ";
                                }
                             function checkZero($text) {
                                        if($text=="0" ||$text==NULL  ){
                                            $num="-";
                                        }else{
                                            $num=$text;
                                        }
                                            return $num;
                                    }
                                    function checkW($text){
                                        if($text=="0" ||$text==NULL||$text=="-"  ){
                                            return " ";
                                        }else{
                                            return " ความลาดชันท้องน้ำ ".$text;
                                        }
                                    }
                                ?>
                                    <thead align="center" style="background-color:#C0C0C0" >
                                        <tr >
                                            <td rowspan="2"  width=4%>ลำดับ</td>
                                            <td rowspan="2" width=6% >รหัส</td>
                                            <td rowspan="2" width=8%>หมู่บ้าน/ตำบล<br> ชื่อลำน้ำ</td>
                                            <td colspan="2" width=16%>พิกัด</td>
                                            <td rowspan="2" width=4%>วันที่สำรวจ</td>
                                            <td rowspan="2" width=25%>สภาพปัญหาการกีดขวางทางน้ำ</td>
                                            <td rowspan="2" width=16%>ข้อมูลพื้นที่รับน้ำ</td>
                                            <td rowspan="2" width=30%>แนวทางและวิธีการแก้ไขปัญหาเบื้องต้น </td>
                                        </tr>
                                        <tr>
                                            <td> X</td>
                                            <td> Y</td>
                                        </tr>
                                    </thead>
                                <?php    
                                    if(count($data[0]['detail'])==0 || $data==null ){ ?>
                                        <tr> 
                                            <td colspan="9" align="center"> - - - ไม่มีข้อมูลสำรวจ - - - </td>
                                        </tr>
                                    <?php }else{ 
                                        for($i = 0;$i < count($data);$i++){?>                                       
                                        <?php 
                                            for($j = 0;$j < count($data[$i]['detail']);$j++){
                                                $string=$data[$i]['detail'][$j]->blk_village;
                                                $vill=explode(' ', $string);
                                                $vill=$vill[2];
    
                                                $slope=checkW($data[$i]['detail'][$j]->exp_slope);
                                                if($data[$i]['detail'][$j]->river_name=="คลองส่งน้ำจากชลประทานสองซ้ายสิบเก้าซ้าย"){
                                                    $data[$i]['detail'][$j]->river_name="คลองส่งน้ำจากชลประทาน<br>สองซ้ายสิบเก้าซ้าย";
                                                }
                                                $loc=$vill."/".$data[$i]['detail'][$j]->blk_tumbol."<br>".$data[$i]['detail'][$j]->river_name;
                                                if($data[$i]['detail'][$j]->maning==1){
                                                    $text= "เนื่องจากตำแหน่งกีดขวางทางน้ำ<br>
                                                            ของลำน้ำหรือลำเหมืองนี้ไม่สามารถ<br>
                                                            หาขนาดพื้นที่รับน้ำได้ชัดเจนและ<br>
                                                            ไม่มีข้อมูลการวัดน้ำ จึงหาอัตรา<br>
                                                            การไหลโดยใช้วิธีของ แมนนิ่ง <br>
                                                            และกำหนดให้มีน้ำไหลเต็มลำน้ำ <br>
                                                            ในช่วงต้นน้ำก่อนถึงจุดกีดขวาง";
                                                    $area=$text. "<br>โดยมีอัตราการไหลสูงสุด ".checkZero($data[$i]['detail'][$j]->exp_maxflow)."m<sup>3</sup>/s";
                                                }else{
                                                    if($data[$i]['detail'][$j]->exp_area<25){
                                                        $A  ="A = ".checkZero($data[$i]['detail'][$j]->exp_area)." km<sup>2</sup> ";
                                                        $L0 ="L0 = ".checkZero($data[$i]['detail'][$j]->exp_L0)." km ";
                                                        $H  ="H = ".checkZero($data[$i]['detail'][$j]->exp_H) ." m";
                                                        $C  ="C = ".checkZero($data[$i]['detail'][$j]->exp_C);
                                                        $tc ="tc = ".checkZero($data[$i]['detail'][$j]->exp_tc)." hr";
                                                        $I  ="I = ".checkZero($data[$i]['detail'][$j]->exp_I). " mm"; 
                                                        $rate="อัตราการไหลสูงสุด = ".checkZero($data[$i]['detail'][$j]->exp_maxflow). "m<sup>3</sup>/s";
                                                        $rp ="Return period = ".checkZero($data[$i]['detail'][$j]->exp_returnPeriod). "ปี";
                                                        $area = $A." ".$L0."<br> ".$H." ".$C." ".$tc."<br>".$rate." <br>".$rp;
                                                    }else{
                                                        $A  ="A = ".checkZero($data[$i]['detail'][$j]->exp_area)." km<sup>2</sup> ";
                                                        $rate="อัตราการไหลสูงสุด = ".checkZero($data[$i]['detail'][$j]->exp_maxflow). " m<sup>3</sup>/s";
                                                        $rp ="Return period = ".checkZero($data[$i]['detail'][$j]->exp_returnPeriod). "ปี";
                                                        $area = $A." <br>".$rate." <br>".$rp;
                                                    }
                                                }
                                             
                                                echo "<tr  align=\"center\" ><td>".($j+1)."</td>";
                                                echo "<td>".$data[$i]['detail'][$j]->blk_code."</td>";
                                                echo "<td>".$loc."</td>";
                                                
                                                echo "<td>".$data[$i]['detail'][$j]->lat_utm_start."</td>";
                                                echo "<td>".$data[$i]['detail'][$j]->lng_utm_start."</td>";
                                                echo "<td>".DateTimeThai($data[$i]['detail'][$j]->created_at)."</td>";
                                                echo "<td class=\"test2\">".$data[$i]['detail'][$j]->survey_problem."</td>";
                                                echo "<td class=\"test2\"> ".$area."</td>";
                                                echo "<td class=\"test2\">".$data[$i]['detail'][$j]->survey_solution." ".$slope."</td></tr>";
                                        
                                            } 
                                        } 
                                    } ?>
                    </table>
                    
                </div>
            </div>
    </div>

        
</body>
</html>