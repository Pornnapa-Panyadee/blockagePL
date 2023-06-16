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
                                <div class="card-body" >
                                    <div class="text-center">
                                        <h3><b>แพลตฟอร์มระบบสารสนเทศสิ่งกีดขวางทางน้ำพร้อมรองรับข้อเสนอแนะจากผู้เชี่ยวชาญ</b></h3><hr>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <p>
                                                ปัญหาน้ำท่วมเป็นภัยพิบัติที่เกิดขึ้นเป็นประจำและสร้างความเสียหายกับชีวิตและทรัพย์สินของประชาชน โดยปัญหาหนึ่งที่พบมากและต้องรีบดำเนินการแก้ไข 
                                                คือปัญหาการกีดขวางทางน้ำ การถูกบุกรุกของลำน้ำคูคลอง ถนนขวางทางน้ำ ทำให้ลำน้ำขาดศักยภาพการระบาย โดยปัญหานี้จะเพิ่มและรุนแรงมากขึ้นเมื่อ
                                                มีการขยายตัวของชุมชนเมืองอย่างรวดเร็ว ในแต่ละปีทางภาครัฐต้องใช้งบประมาณจำนวนมากในการบรรเทาปัญหาน้ำท่วมจากการกีดขวางทางน้ำ 
                                                ซึ่งเป็นการแก้ไขปัญหาเฉพาะหน้าไม่มีความยั่งยืน การแก้ไขปัญหาดังกล่าวให้ได้ผลที่ดีและมีประสิทธิภาพจำเป็นจะต้องใช้องค์ความรู้ด้านวิชาการร่วมกับ
                                                องค์ความรู้ของชุมชน มีเครื่องมือช่วยการวางแผนในการแก้ปัญหาอย่างเป็นระบบต่อเนื่องกันตลอดทั้งลำน้ำ 
                                            </p>
                                            <p>
                                                ด้วยเหตุนี้ ทางมหาวิทยาลัยเชียงใหม่ จึงได้ทำการพัฒนาแพลตฟอร์มระบบสารสนเทศข้อมูลสิ่งกีดขวางทางน้ำพร้อมระบบรองรับข้อเสนอแนะวิธีการแก้ไขปัญหาการกีดขวางทางน้ำจากผู้เชี่ยวชาญ 
                                                มาเป็นเครื่องมือในการช่วยแก้ไขปัญหาการกีดขวางทางน้ำในพื้นที่ได้อย่างสะดวกและถูกหลักวิชาการ โดยแบ่งการทำงานออกเป็น 3 ระบบย่อย ดังต่อไปนี้
                                            </p>
                                            <p>
                                                <b>1. ระบบนำเสนอข้อมูลสิ่งกีดขวางทางน้ำในพื้นที่ที่ได้ทำการสำรวจแล้วและมีข้อเสนอแนะแนวทางแก้ไขปัญหาจากผู้เชี่ยวชาญ โดยแสดงในรูปแบบเว็บไซต์</b>
                                                <br>
                                                เป็นระบบที่นำข้อมูลสิ่งกีดขวางทางน้ำและข้อเสนอแนะแนวทางแก้ไขปัญหาจากผู้เชี่ยวชาญที่ได้ทำการสำรวจ วิเคราะห์ และบันทึกลงในฐานข้อมูลขึ้นมาแสดงในรูปแบบต่าง ๆ อาทิเช่น 
                                                แผนที่แสดงพิกัดตำแหน่ง ตาราง กราฟ และรายงานงานสรุป เพื่อให้ผู้ใช้งานสามารถนำข้อมูลไปบูรณาการในการแก้ปัญหาสิ่งกีดขวางทางน้ำได้อย่างมีประสิทธิภาพ 
                                                โดยสามารถเข้าใช้งานได้ที่เว็บไซต์
                                            </p>
                                            <p>
                                                <b>2.ระบบแบบสำรวจออนไลน์สำหรับบันทึกข้อมูลสิ่งกีดขวางทางน้ำและรองรับข้อเสนอแนะจากผู้เชี่ยวชาญ สำหรับพื้นที่ที่ต้องการจะเก็บข้อมูลกีดขวางทางน้ำเพิ่มเติม</b>
                                                <br>
                                                โดยผู้ทำการสำรวจลงพื้นที่กรอกข้อมูลตามแบบฟอร์มการสำรวจข้อมูลสิ่งกีดขวางทางน้ำออนไลน์ประกอบด้วย <br>
                                                -	พิกัดที่ตั้งของตำแหน่งและชื่อลำน้ำที่เกิดการกีดขวางทางน้ำ <br>
                                                -	ลักษณะทั่วไป ได้แก่ พิกัดของช่วงลำน้ำที่เกิดปัญหา, หน้าตัดและความยาวของช่วงลำน้ำที่เกิดปัญหา  และสภาพการดาดผิวของลำน้ำ<br>
                                                -	ลักษณะของความเสียหาย ระดับความรุนแรง และความถี่ที่เกิด<br>
                                                -	สาเหตุการกีดขวางลำน้ำที่เกิดจากธรรมชาติและมนุษย์ <br>
                                                -	รูปถ่ายที่ตำแหน่งการกีดขวางทางน้ำ<br>
                                                - อื่นๆ<br>
                                                เมื่อผู้สำรวจตกลงส่งแบบสำรวจที่มีข้อมูลครบถ้วนเข้าไปเก็บในระบบแล้ว ทางผู้เชี่ยวชาญจะทำการวิเคราะห์ข้อมูลและออกแบบทางวิศวกรรม 
                                                พร้อมเสนอแนะรูปแบบแนวทางแก้ไขปัญหากีดขวางทางน้ำดังกล่าว ผ่านทางระบบในแพล็ตฟอร์ม 
                                            </p>
                                            <p>
                                                <b>3.ระบบสนับสนุนให้ความช่วยเหลือในการใช้งานแบบสำรวจและแสดงผลข้อมูลสิ่งกีดขวางทางน้ำผ่านแอปพลิเคชันไลน์ในรูปแบบแชทบอท (Line-Chatbot) ในชื่อ NIAN-CNX (เนียร์ ซีเอ็นเอ็กซ์)</b>
                                                <br>
                                                เป็นการนำเทคโนโลยีที่ทันสมัยมาปรับใช้เพื่อเปิดประสบการณ์ใหม่ให้กับผู้ใช้งานแพล็ตฟอร์มนี้ โดยเทคโนโลยีดังกล่าวจะมีปฏิสัมพันธ์กับผู้ใช้งานเสมือนเป็นผู้ช่วยส่วนตัว คอยสนับสนุนข้อมูล อำนวยความสะดวก 
                                                และให้บริการต่าง ๆ กับผู้ใช้งาน ได้แก่ การค้นหาข้อมูลสิ่งกีดขวางทางน้ำ โดยแสดงข้อมูลที่สอดคล้องกับตำแหน่งพิกัดที่อยู่ของผู้ใช้งาน การสนับสนุนช่วยเหลือในการสำรวจสิ่งกีดขวางทางน้ำ 
                                                การให้ข้อมูลสนับสนุน บริการติดต่อสอบถามเจ้าหน้าที่ และบริการสนับสนุนด้านอื่น ๆ
                                                <br>
                                                การเข้าใช้งาน ผู้ช่วยงานทั่วไปสามารถเข้าใช้งานระบบสนับสนุนด้วยการเข้าไปที่แอปพลิเคชันไลน์ และทำการเพิ่มเพื่อนโดยสามารถสแกน QR Code โดยระบบจะแสดงข้อความทักทาย และแนะนำการใช้งาน 
                                                พร้อมทั้งแสดงเมนูหลัก โดยระบบจะแสดงข้อมูล 3 หัวข้อ ดังนี้ ข้อมูลสิ่งกีดขวางทางน้ำในจังหวัดเชียงใหม่ที่ทำแล้วเสร็จ, การสำรวจสิ่งกีดขวางทางน้ำเพิ่มเติม และข้อมูลสนับสนุนต่างๆ 
                                            </p>
                                            <p>
                                                <i>ผู้ใช้งานแพล็ตฟอร์มนี้สามารถศึกษาเพิ่มเติมจาก คู่มือ แพลตฟอร์มระบบสารสนเทศสิ่งกีดขวางทางน้ำพร้อมรองรับข้อเสนอแนะจากผู้เชี่ยวชาญ ที่ได้จัดทำขึ้นอย่างละเอียดโดยมหาวิทยาลัยเชียงใหม่
                                                    และหวังเป็นอย่างยิ่งว่า แพลตฟอร์มที่ถูกพัฒนาขึ้นนี้จะสามารถนำไปเป็นเครื่องมือสำคัญในกำหนดรูปแบบของการวางแผนแก้ไขปัญหาการกีดขวางทางน้ำได้อย่างมีประสิทธิภาพ 
                                                    ด้วยกระบวนการการมีส่วนร่วมของชุมชน และลงมือปฏิบัติการแก้ไขปัญหาโดยหน่วยงานราชการ องค์กรปกครองส่วนท้องถิ่น องค์กร มูลนิธิ และชุมชน
                                                </i>
                                            </p>
                                        </div>
                                    </div>
                                    <br><Br>
                                    <div class="row justify-content-end text-right">
                                        <div class="col-4">
                                            <span>จัดทำโดย</span> <br>
                                            <span>-	ศูนย์วิชาการเพื่อสนับสนุนด้านการบริหารจัดการน้ำ มช.</span><br>
                                            <span>-	ศูนย์วิจัยด้านการจัดการภัยพิบัติทางธรรมชาติ คณะวิศวกรรมศาสตร์ มช.</span>
                                        </div>
                                        <div class="col-1"></div>
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
