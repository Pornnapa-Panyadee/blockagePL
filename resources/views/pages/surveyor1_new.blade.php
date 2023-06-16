<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blockage::CMFightflood</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mitr|Prompt" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.css')}}">

    <!-- leaflet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" crossorigin=""/>
    <script src='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.2.0/leaflet-omnivore.min.js'></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet-src.js" crossorigin=""></script>
 

    <style>
        .btn1 {
            font-size: 10px;
            padding: 9px 10px;
        }
        .btn-lg  {
            font-size: 10px;
            padding: 0px 10px;
        }

    </style>
    <style type="text/css">
        
    	#map{
			  font-family: Mitr, sans-serif;
			  height: 900px;
			  display: block;
              margin: auto;
              text-align: left;
              font-size: 14px;
			}
		#map.table {
		    font-family: 'Mitr', sans-serif;
		    width: 100%;
		}#map.tr {
		    padding: 15px;
		    text-align: right;
		}#map.td {
		    padding: 15px;
		    text-align: right;
        }
        
        
        @media only screen and (max-width:480px) {
            #map{
                height: 450px;
                font-size: 14px;
            }     
            
        }

    </style>
        
</head>
<body>
    <div class="dashboard-main-wrapper">
        @include('includes.head')
        @include('includes.header')
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
                <div class="container-fluid dashboard-content">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- ============================================================== -->
                            <!-- icon fontawesome solid  -->
                            <!-- ============================================================== -->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">ระบบข้อมูลของสิ่งกีดขวางทางน้ำในลำน้ำคูคลองและถนน  และวิธีการแก้ไขปัญหาการกีดขวางทางน้ำแต่ละแห่งในพื้นที่ของจังหวัดเชียงใหม่</h3>
                                </div>
                                <div class="card-body">
                                        {{-- @include('form.map') --}}
                                    <div class="row">
                                        <div class="col-xs-5 col-sm-12 col-md-5">
                                                <div id="map" style="width: 100%;" align="center"></div>
                                                
                                        </div> 
                                        <div class="col-xs-7 col-sm-12 col-md-7">
                                            <div class="card-header">
                                                <table>
                                                    <tr>
                                                        <td rowspan="3"  width="20%"><img src="{{ asset('images/icon/survey.png') }}"  width="90%"></td>
                                                        <td ><h3 class="card-subtitle"> ผู้สำรวจ  : {{$username}} {{$lastname}}</h3></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3 class="card-subtitle"> ตำเเหน่ง  : {{$position}}</h3></td>
                                                    </tr>
                                                    <tr>
                                                        <td><h3 class="card-subtitle"> หน่วยงาน : {{$department}}  </h3></td>
                                                    </tr>
                                                
                                                
                                                </table>
                                            </div>
                                            <br>
                                            <div class="table-responsive">
                                                <table class="table_approve table-striped table-bordered first" >
                                                    <thead>
                                                        <tr>
                                                            <th width=2%>#</th>
                                                            <th>รหัส</th>
                                                            <th>ลำน้ำ</th>
                                                            <th>หมู่บ้าน</th>
                                                            <th>ตำบล</th>
                                                            <th>อำเภอ</th>
                                                            <th>สถานะ</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php for($i = 0;$i < count($data);$i++){?>
                                                            <tr align="center">
                                                                <td >{{$i+1}}</td>
                                                                <td data-label="รหัส"> {{$data[$i]->blk_code}}</td>
                                                                <!-- <td data-label="รหัส"> <a href='{{ asset('/report/pdf/') }}/{{$data[$i]->blk_id}}' > {{$data[$i]->blk_code}} </a></td> -->
                                                                <td align="left" data-label="ลำน้ำ">{{$data[$i]->river_name}}, {{$data[$i]->river_main}} </td>
                                                                <td align="left" data-label="หมู่บ้าน">{{$data[$i]->blk_village}} </td>
                                                                <td align="left" data-label="ตำบล">{{$data[$i]->blk_tumbol}}</td>
                                                                <td data-label="อำเภอ">{{$data[$i]->blk_district}}</td>
                                                                <?php if($data[$i]->status_approve==0){ ?> 
                                                                    <td ><button type="button" class="btn1 btn-warning" >กำลังพิจารณา</button>  </td>   
                                                                <?php }else { ?> 
                                                                    <td ><button type="button" class="btn1 btn-success" >พิจารณาเรียบร้อย</button>  </td>   
                                                                <?php } ?>
                                                                                    
                                                            </tr>
                                                        <?php }?>
                                                    </tbody>
                                                </table>
                                            </div>
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
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->


    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> 
    <script src="{{ asset('/js/data-table.js') }}"></script> 
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script> 
   
   
    <script src="{{ asset('js/chooseLocation_table.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/L.Control.Layers.Tree.css')}}" crossorigin=""/>
    <script src="{{ asset('/js/L.Control.Layers.Tree.js')}}"></script>


    <script type="text/javascript">

        var stations1 = new L.LayerGroup();
        var stations2 = new L.LayerGroup();
        var borders = new L.LayerGroup();
        
        var x = 18.787920;
        var y = 98.985711;

        var mbAttr = 'CRFlood ',
           mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoidmFucGFueWEiLCJhIjoiY2loZWl5ZnJ4MGxnNHRwbHp5bmY4ZnNxOCJ9.IooQB0jYS_4QZvIq7gkjeQ';
                                                                          
        osm = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                                    maxZoom: 20,
                                    subdomains:['mt0','mt1','mt2','mt3'], attribution: mbAttr
                                });
        osmBw = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
                                    maxZoom: 20,
                                    subdomains:['mt0','mt1','mt2','mt3'], attribution: mbAttr
                                });

        var map = L.map('map', {
            layers: [borders,osm,stations1,stations2],
            center: [x,y],
            zoom: 10,
        });
  
        var pin0 = L.icon({
                    iconUrl: '{{ asset('images/logo/pin0.png') }}',
                    iconRetinaUrl:'{{ asset('images/logo/pin0.png') }}',
                    iconSize: [23, 36],
                    iconAnchor: [5, 30],
                     popupAnchor: [0, 0]
                 });

        var pin0MO = L.icon({
                    iconUrl: '{{ asset('images/logo/pin0.png') }}',
                    iconRetinaUrl:'{{ asset('images/logo/pin0.png') }}',
                    iconSize: [10, 16],
                    iconAnchor: [5, 30],
                     popupAnchor: [0, 0]
                 });
        var pin1 = L.icon({
                    iconUrl: '{{ asset('images/logo/pin01.png') }}',
                    iconRetinaUrl:'{{ asset('images/logo/pin01.png') }}',
                    iconSize: [23, 36],
                    iconAnchor: [5, 30],
                     popupAnchor: [0, 0]
                 });
        var pin1MO = L.icon({
                    iconUrl: '{{ asset('images/logo/pin01.png') }}',
                    iconRetinaUrl:'{{ asset('images/logo/pin01.png') }}',
                    iconSize: [10, 16],
                    iconAnchor: [5, 30],
                     popupAnchor: [0, 0]
                 });
           
        function addPin(mo){
            $.getJSON("{{ asset('form/getMapByUser') }}", 
                function (data){
						 for (i=0;i<data.length;i++){
                            var lo =data[i].geometry.coordinates+ '';
							var x=lo.split(',')[1];
                            var y=lo.split(',')[0];
                            var text ="<font style=\"font-family: 'Mitr';\" size=\"3\"COLOR=#1AA90A > รหัส :<a href='{{ asset('/report/pdf')}}/" +data[i].blk_id+"' target=\"_blank\"> " + data[i].blk_code + "</font><br>";
                        
                            if(data[i].status_approve==0){
                                text1 = "<font style=\"font-family: 'Mitr';\" size=\"2\"COLOR=#466DF3 > ลำน้ำ : "+ data[i].river+ "</font><br>";
                                text2 = "<font style=\"font-family: 'Mitr';\" size=\"2\"COLOR=#466DF3 >ที่ตั้ง : "+ data[i].location +" ต."+ data[i].tambol +" อ."+ data[i].district +"</font><br>";
                                text3 = "<br><button type=\"button\" class=\"btn1 btn-warning btn-lg btn-block\" >กำลังตรวจสอบ</button> ";
                                if(mo==0){ L.marker([x,y],{icon: pin0MO}).addTo(stations1).bindPopup(text+text1+text2+text3); }
                                else{ L.marker([x,y],{icon: pin0}).addTo(stations1).bindPopup(text+text1+text2+text3);}
                            }else{
                                text1 = "<font style=\"font-family: 'Mitr';\" size=\"2\"COLOR=#466DF3 > ลำน้ำ : "+ data[i].river+ "</font><br>";
                                text2 = "<font style=\"font-family: 'Mitr';\" size=\"2\"COLOR=#466DF3 >ที่ตั้ง : "+ data[i].location +" ต."+ data[i].tambol +" อ."+ data[i].district +"</font><br>";
                                text3 = "<br><table align=\"center\"><tr><td width=47%><a href='{{ asset('/report/pdf') }}/"+data[i].blk_id+"' target=\"_blank\"> " + "<button class=\"btn btn-sm btn-outline-light\"><i class=\"fas fa-eye\"></i> รายงาน</button> </a></td> <td  width=6%></td><td  width=47%><a href='{{ asset('/report/photo') }}/"+data[i].blk_id+"' target=\"_blank\"> " + "<button class=\"btn btn-sm btn-outline-light\"><i class=\"fas fa-images\"></i> ภาพประกอบ</button> </a></td></tr></table>";
                                if(mo==0){ L.marker([x,y],{icon: pin1MO}).addTo(stations2).bindPopup(text+text1+text2+text3); }
                                else{ L.marker([x,y],{icon: pin1}).addTo(stations2).bindPopup(text+text1+text2+text3);}
                            }
						}//end for
					}	
				);
                
        }
            var mx = window.matchMedia("(max-width: 700px)");
            // x=x.matches;
            
            if(mx.matches){
                mo=0;
                // alert(x.matches);
            }else{
                mo=1;
            }
            
            addPin(mo);
     
        var baseTree = {
            label: 'BaseLayers',
            noShow: true,
            children: [  {label: ' แผนที่ภูมิประเทศ (Streets)', layer: osm},
                         {label: ' แผนที่ภาพถ่ายผ่านดาวเทียม (Satellite)', layer: osmBw},
                     ]
        };
        var overlays = {
            label: '  สถานะ',
            selectAllCheckbox: true,
            children: [
                { label:" กำลังพิจารณา ",layer: stations1,},
                { label:" พิจารณาเรียบร้อย",layer: stations2,}
            ]
        };

        var ctl = L.control.layers.tree(baseTree, null,
            // {
            //     // namedToggle: true,
            //     // collapseAll: 'Collapse all',
            //     // expandAll: 'Expand all',
            //     // collapsed: false,
            //     collapsed: false,
            //     collapseAll: '',
            //     expandAll: '',
            // }
            );
    

        ctl.addTo(map).collapseTree().expandSelected();

        ctl.setOverlayTree(overlays).collapseTree().expandSelected();

        
        // L.control.layers(baseTree, overlays).addTo(map).collapseTree().expandSelected();


    </script>

</body>
</html>
