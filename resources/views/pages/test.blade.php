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
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.css')}}">
     <!-- leaflet -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" crossorigin=""/>
    <script src='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.2.0/leaflet-omnivore.min.js'></script>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet-src.js" crossorigin=""></script>
    

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <style type="text/css">
        html, body, #map {
            height: 100%;
            width: 100vw;
        }
    	#map{

			  font-family: Mitr, sans-serif;
			  height: 700px;
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
        select{
            width: 100%;
            height: 40px;
        }
        button.btn {
            width: 100%;
        }
        @media only screen and (max-width:480px) {
            #map{
                height: 450px;
                font-size: 14px;
            }
            table{
                font-size: 2vw;
            }
            select{
            width: 100%;
            height: 40px;
            }
            button.btn{
            width: 100%;
            }
            .btn-sm{
                font-size: 2vw;
            }
          
            
        }

    </style>
    <style>
        .button {
            background-color: #5969ff; /* Green */
            border: none;
            color: white;
            text-align: top;
            text-decoration: none;
            display: inline-block;
            margin: 4px 2px;
            /* cursor: pointer; */
            height:28px;
        }
        .button1 {padding: -10px;}
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
                                    <h3 class="card-title">การพัฒนาระบบข้อมูลสารสนเทศของสิ่งกีดขวางทางน้ำในลำน้ำคูคลองและถนนที่มีปัญหาการกีดขวางทางน้ำในพื้นที่จังหวัดเชียงใหม่</h3>
                                </div>
                                <div class="card-body">
                                        {{-- @include('form.map') --}}
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div id="map" style="width: 100%; height: 700px" align="center"></div>
                                                <div align="right"><img  src="{{ asset('images/logo/pin_ref.png') }}" width=40%></div>
                                        </div>
                                           
                                        
                                  
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end icon fontawesome solid  -->
                            <!-- ============================================================== -->
                         
                        </div>
                    </div>

                     <!-- ============================================================== -->
                                            <!-- basic table  -->
                                            <!-- ============================================================== -->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="card">
                                                     <div class="card-header">
                                                        <h3 class="card-title">ตารางแสดงข้อมูลสิ่งกีดขวางทางน้ำในลำน้ำคูคลองและถนน  </h3>                                                       
                                                        
                                                            
                                                    </div>
                                                    <div class="card-body">
                                                        <form id="amp" name="amp" action="/#tableData" method="get">

                                                            <table align="right" width=40%>
                                                                <tr>
                                                                    <td style="padding-left:20px;">
                                                                        <h4 class="card-title">
                                                                        <select id='blk_district' name='blk_district' style="height:2.8em; width:80%" required>
                                                                            <option value='0'>- - เลือกอำเภอ - -</option>
                                                                            @foreach($districtData['data'] as $village)
                                                                            <option value='{{ $village->vill_district }}'>{{ $village->vill_district  }}</option>
                                                                            @endforeach
                                        
                                                                        </select></h4>
                                                                    </td>
                                                                    <td >
                                                                        <h4 class="card-title">
                                                                            <select id="blk_tumbol" name="blk_tumbol" style="height:2.8em;width:90%"  required>
                                                                                <option value='0'>-- เลือกตำบล --</option>
                                                                            </select>
                                                                        </h4>
                                                                    </td>
                                                                    <td>
                                                                        <h4 class="card-title">    
                                                                            <button type="submit"  class="btn btn-outline-primary waves-effect" > ค้นหา </button>
                                                                        </h4>
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </form>
                                                        <div id="tableData">
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table class="table table-striped table-bordered first" width=90% align="center">
                                                                        <thead>
                                                                            <tr>
                                                                                <th>#</th>
                                                                                <th>รหัส</th>
                                                                                <th>ลำน้ำ</th>
                                                                                <th>หมู่บ้าน</th>
                                                                                <th>ตำบล</th>
                                                                                <th>อำเภอ</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php for($i = 0;$i < count($data);$i++){?>
                                                                                <tr align="center">
                                                                                    <td >{{$i+1}}</td>
                                                                                    <td data-label="รหัส"> <a href='{{ asset('/report/pdf/') }}/{{$data[$i]->blk_id}}' > {{$data[$i]->blk_code}} </a></td>
                                                                                    <td align="left" data-label="ลำน้ำ">{{$data[$i]->river_name}}, {{$data[$i]->river_main}} </td>
                                                                                    <td align="left" data-label="หมู่บ้าน">{{$data[$i]->blk_village}} </td>
                                                                                    <td align="left" data-label="ตำบล">ต.{{$data[$i]->blk_tumbol}}</td>
                                                                                    <td data-label="อำเภอ">อ.{{$data[$i]->blk_district}}</td>
                                                                        
                                                                                    
                                                                                    <td data-label="">
                                                                                            {{-- <div class="btn-group ml-auto">
                                                                                            
                                                                                                <a href='{{ asset('/reportBlockage') }}/{{$data[$i]->blk_id}}' > <button class="btn btn-sm btn-outline-light"><i class="fas fa-eye"></i>  รายละเอียด</button> </a>
                                                                                        </div> --}}
                                                                                            <div class="btn-group ml-auto">
                                                                                            <a href='{{ asset('/report/pdf/') }}/{{$data[$i]->blk_id}}' >  <button class="btn btn-sm btn-outline-light"><i class="fas fa-edit"></i> รายงาน</button> </a>
                                                                                                
                                                                                            </div>
                                                                                    </td>
                                                                                    </td>                                   
                                                                                </tr>
                                                                            <?php }?>
                                                                        
                                                                        </tbody>
                                                                    
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- ============================================================== -->
                                            <!-- end basic table  -->
                                            <!-- ============================================================== -->
                </div>

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end main wrapper -->
        <!-- ============================================================== -->


    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main-js.js') }}"></script>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> 
    <script src="{{ asset('/js/data-table.js') }}"></script> 
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script> 
   
   
    <script src="{{ asset('js/chooseLocation_table.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/L.Control.Layers.Tree.css')}}" crossorigin=""/>
    <script src="{{ asset('/js/L.Control.Layers.Tree.js')}}"></script>
    
   
    <script src="{{ asset('js/chooseLocation.js') }}"></script>

    <!-- <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main-js.js') }}"></script>
    <script src="{{ asset('js/leaflet.js') }}"></script>
    <script src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('/js/data-table.js') }}"></script> 
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script> 
    <script src="{{ asset('js/SliderControl.js') }}"></script> -->

    <script type="text/javascript">

        var stations1 = new L.LayerGroup();
        var stations2 = new L.LayerGroup();
        var stations3 = new L.LayerGroup();
        // var stations4 = new L.LayerGroup();
        // var stations5 = new L.LayerGroup();
        // var stations6 = new L.LayerGroup();
        // var stations7 = new L.LayerGroup();
        // var stations8 = new L.LayerGroup();
        // var stations9 = new L.LayerGroup();
        // var stations10 = new L.LayerGroup();    
        // var stations11 = new L.LayerGroup();  
        // var stations12 = new L.LayerGroup();  
        var borders = new L.LayerGroup();
        
        var x = 18.782687 ; 
        var y = 98.993518 ;

        var mbAttr = 'CMFightFlood ',
           mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoidmFucGFueWEiLCJhIjoiY2loZWl5ZnJ4MGxnNHRwbHp5bmY4ZnNxOCJ9.IooQB0jYS_4QZvIq7gkjeQ';
                                                                          
        osm = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                                    maxZoom: 20,
                                    subdomains:['mt0','mt1','mt2','mt3'], attribution: mbAttr
                                });
        osmBw = L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
                                    maxZoom: 20,
                                    subdomains:['mt0','mt1','mt2','mt3'], attribution: mbAttr
                                });
    //    layers: [borders,osm,stations1,stations2,stations3,stations4,stations5,stations6,stations7,stations8,stations9,stations10,stations11,stations12],
        var map = L.map('map', {
            layers: [borders,osm,stations1,stations2,stations3],
            center: [x,y],
            zoom: 8,
        });

        var runLayer = omnivore.kml('{{ asset('kml/CM_bound-25-amphoe.kml') }}')
						.on('ready', function() {
						this.setStyle({
                            fillOpacity: 0,
                            color: "#994F3E",
                            weight: 2
						});
			}).addTo(borders); 
  
        var pin = L.icon({
                    iconUrl: '{{ asset('images/logo/pin.png') }}',
                    iconRetinaUrl:'{{ asset('images/logo/pin.png') }}',
                    iconSize: [20, 36],
                    iconAnchor: [5, 30],
                     popupAnchor: [0, 0]
                 });

        var pinMO = L.icon({
                    iconUrl: '{{ asset('images/logo/pin.png') }}',
                    iconRetinaUrl:'{{ asset('images/logo/pin.png') }}',
                    iconSize: [10, 16],
                    iconAnchor: [5, 30],
                     popupAnchor: [0, 0]
                 });
        var pin_s = L.icon({
                    iconUrl: '{{ asset('images/logo/pin_survey.png') }}',
                    iconRetinaUrl:'{{ asset('images/logo/pin_survey.png') }}',
                    iconSize: [20, 36],
                    iconAnchor: [5, 30],
                     popupAnchor: [0, 0]
                 });

        var pinMO_s = L.icon({
                    iconUrl: '{{ asset('images/logo/pin_survey.png') }}',
                    iconRetinaUrl:'{{ asset('images/logo/pin_survey.png') }}',
                    iconSize: [10, 16],
                    iconAnchor: [5, 30],
                     popupAnchor: [0, 0]
                 });
        var pinoff = L.icon({
                    iconUrl: '{{ asset('images/logo/pinoffline.png') }}',
                    iconRetinaUrl:'{{ asset('images/logo/pinoffline.png') }}',
                    iconSize: [20, 36],
                    iconAnchor: [5, 30],
                     popupAnchor: [0, 0]
                 });

        var pinMOoff = L.icon({
                    iconUrl: '{{ asset('images/logo/pinoffline.png') }}',
                    iconRetinaUrl:'{{ asset('images/pinoffline/pin.png') }}',
                    iconSize: [10, 16],
                    iconAnchor: [5, 30],
                     popupAnchor: [0, 0]
                 });
           
        // var amp=["ฝาง","ไชยปราการ","แม่อาย","เมืองเชียงใหม่","หางดง","สารภี","สันกำแพง","สันป่าตอง","ดอยหล่อ","แม่ริม","สันทราย","ดอยสะเก็ด","แม่ออน","แม่วาง","สะเมิง"];
        var amp=["1","0","2"]
        
        function addPin(ampName,k,mo){
            $.getJSON("{{ asset('form/getDamage_admin') }}/"+amp[k], 
                function (data){
						 for (i=0;i<data.length;i++){
                            // for (i=0;i<1;i++){
                            
                            var lo =data[i].geometry.coordinates+ '';;
							var x=lo.split(',')[1];
                            var y=lo.split(',')[0];
                           
                           // alert (x);
                           var text ="<font style=\"font-family: 'Mitr';\" size=\"3\"COLOR=#1AA90A > รหัส :<a href='{{ asset('/report/pdf')}}/" +data[i].blk_id+"' target=\"_blank\"> " + data[i].blk_code + "</font><br>";
                        
                            text1 = "<font style=\"font-family: 'Mitr';\" size=\"2\"COLOR=#466DF3 > ลำน้ำ : "+ data[i].river+ "</font><br>";
                            text2 = "<font style=\"font-family: 'Mitr';\" size=\"2\"COLOR=#466DF3 >ที่ตั้ง : "+ data[i].location +" ต."+ data[i].tambol +" อ."+ data[i].district +"</font><br>";
                            text3 = "<br><table align=\"center\"><tr><td width=47%><a href='{{ asset('/report/pdf') }}/"+data[i].blk_id+"' target=\"_blank\"> " + "<button class=\"btn btn-sm btn-outline-light\"><i class=\"fas fa-eye\"></i> รายงาน</button> </a></td> <td  width=6%></td><td  width=47%><a href='{{ asset('/report/photo') }}/"+data[i].blk_id+"' target=\"_blank\"> " + "<button class=\"btn btn-sm btn-outline-light\"><i class=\"fas fa-images\"></i> ภาพประกอบ</button> </a></td></tr></table>";
                            
                            // text3 = "<a href='{{ asset('/report/pdf') }}/"+data[i].blk_id+"' target=\"_blank\"> " + "<i class=\"fas fa-eye\"></i> รายงาน</a>";
                            // text3="fff";
                            // alert(mo);
                            if(mo==0){
                                if(data[i].pin_status=="2"){
                                    L.marker([x,y],{icon: pinMO}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                                }else if (data[i].pin_status=="1"){
                                    L.marker([x,y],{icon: pinMO_s}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                                }else{
                                    L.marker([x,y],{icon: pinMOoff}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                                }
                                
                            }else{
                                if(data[i].pin_status=="2"){
                                    L.marker([x,y],{icon: pin}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                                }else if(data[i].pin_status=="1"){
                                    L.marker([x,y],{icon: pin_s}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                                }else{
                                    L.marker([x,y],{icon: pinoff}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                                }
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
            
            addPin(stations1,0,mo);
            addPin(stations2,1,mo);
            addPin(stations3,2,mo);
            // addPin(stations4,3,mo);
            // addPin(stations5,4,mo);
            // addPin(stations6,5,mo);
            // addPin(stations7,6,mo);
            // addPin(stations8,7,mo);
            // addPin(stations9,8,mo);
            // addPin(stations10,9,mo);
            // addPin(stations11,10,mo);
            // addPin(stations12,11,mo);

     
        var baseTree = {
            label: 'BaseLayers',
            noShow: true,
            children: [  {label: ' แผนที่ภูมิประเทศ (Streets)', layer: osm},
                         {label: ' แผนที่ภาพถ่ายผ่านดาวเทียม (Satellite)', layer: osmBw},
                     ]
        };
        var overlays = {
            label: ' สถานะ',
            selectAllCheckbox: true,
            children: [
                { label:" สำรวจจากผู้เชี่ยวชาญ",layer: stations3,},
                { label:" พิจารณาเรียบร้อย",layer: stations1,},
                { label:" กำลังรอการพิจารณา",layer: stations2,},
                // { label:" "+amp[2],layer: stations3,},
                // { label:" "+amp[3],layer: stations4,},
                // { label:" "+amp[4],layer: stations5,},
                // { label:" "+amp[5],layer: stations6,},
                // { label:" "+amp[6],layer: stations7,},
                // { label:" "+amp[7],layer: stations8,},
                // { label:" "+amp[8],layer: stations9,},
                // { label:" "+amp[9],layer: stations10},
                // { label:" "+amp[10],layer: stations11},
                // { label:" "+amp[12],layer: stations12}
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
