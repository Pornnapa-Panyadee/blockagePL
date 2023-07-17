<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Blockage::Mae Jang Basin</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mitr|Prompt" rel="stylesheet">
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
        
</head>
<body>
    <div class="dashboard-main-wrapper">
       
        @include('includes.headmenu') 
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
                                <div class="card-header">
                                    <h3 class="card-title"> โครงการพัฒนาระบบข้อมูลสารสนเทศของสิ่งกีดขวางทางน้ำในลำน้ำคูคลองและถนนในพื้นที่ลุ่มน้ำแม่จาง จังหวัดลำปาง </h3>
                                    <h5>โดย การไฟฟ้าฝ่ายผลิตแห่งประเทศไทย (กฟผ.) แม่เมาะ ร่วมกับมหาวิทยาลัยเชียงใหม่</h5>                                    
                                </div>
                                <div class="card-body" >
                                    {{-- <a href="#tableData">หน้าแรก </a> --}}
                                    
                                    <div class="col-xs-12 col-sm-12 col-md-12" style="margin-bottom: 20px;">
                                        <div id="map" style="width: 100%;" align="center"></div>
                                        <br>
                                        <center><img  src="{{ asset('images/logo/manual.png') }}" width=80%></center>
                                    </div>
                                    <br><br>
                                    <!-- ============================================================== -->
                                            <!-- basic table  -->
                                            <!-- ============================================================== -->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3 class="card-title">ตารางแสดงข้อมูลสิ่งกีดขวางทางน้ำในลำน้ำคูคลองและถนน  </h3>                                                       
                                                        
                                                            
                                                    </div>
                                                    <div class="card-header">
                                                        <form id="amp" name="amp" action="/blockage/jang_basin/#tableData" method="get"> 
                                                            <div class="row justify-content-end">
                                                                <div class="col-md-3">
                                                                    <h4 class="card-title">
                                                                    <select id='blk_district' name='blk_district' >
                                                                        <?php $a=0; ?>
                                                                        <option value='0'>- - เลือกอำเภอ - -</option>
                                                                        @foreach($districtData['data'] as $village)
                                                                            <?php 
                                                                                if($village->vill_district=="ป่าแดด"){ $a=1;}
                                                                                    if($a==0){?> 
                                                                                        <option value='{{ $village->vill_district }}'> {{ $village->vill_district  }}</option>
                                                                                    <?php } ?>
                                                                        @endforeach
                                    
                                                                    </select>
                                                                    </h4>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <h4 class="card-title">
                                                                        <select id="blk_tumbol" name="blk_tumbol" >
                                                                            <option value='0'>- - เลือกตำบล - -</option>
                                                                            
                                                                        </select>
                                                                    </h4>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <button type="submit" class="btn btn-outline-dark "  style="float: right;"> ค้นหา </button>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                        </form>
                                                        

                                                    </div>
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
                                                                    
                                                                                
                                                                                <td class="btn1">
                                                                                    <div class="btn-group ml-auto">
                                                                                        <a href='{{ asset('/report/pdf/') }}/{{$data[$i]->blk_id}}' target=\"_blank\">  <button class="btn btn-sm btn-outline-light" ><i class="fas fa-eye"></i> รายงาน</button> </a>
                                                                                        <a href='{{ asset('/report/photo/') }}/{{$data[$i]->blk_id}}' target=\"_blank\">  <button class="btn btn-sm btn-outline-light"><i class="fas fa-images"></i> ภาพประกอบ</button> </a>
                                                                                        <a href='{{ asset('/map/') }}/{{$data[$i]->blk_id}}' target=\"_blank\">  <button class="btn btn-sm btn-outline-light"><i class="fas fa-map-pin"></i> ตำแหน่ง</button> </a>
                                                                                    </div>
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
                                            <!-- ============================================================== -->
                                            <!-- end basic table  -->
                                            <!-- ============================================================== -->
                                  
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
   
   
    <script src="{{ asset('js/chooseLocation_table.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/L.Control.Layers.Tree.css')}}" crossorigin=""/>
    <script src="{{ asset('/js/L.Control.Layers.Tree.js')}}"></script>

    <script type="text/javascript">

        var stations1 = new L.LayerGroup();
        var stations2 = new L.LayerGroup();
        var stations3 = new L.LayerGroup();
        var stations4 = new L.LayerGroup();
        var borders = new L.LayerGroup();
        
        // var x = 18.782687 ; 
        // var y = 98.993518 ;
        var x = {{$x}} ; 
        var y = {{$y}};
        var mbAttr = 'Mae Jang Basin',
           mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoidmFucGFueWEiLCJhIjoiY2loZWl5ZnJ4MGxnNHRwbHp5bmY4ZnNxOCJ9.IooQB0jYS_4QZvIq7gkjeQ';
                                                                          
        osm = L.tileLayer('https://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                                    maxZoom: 20,
                                    subdomains:['mt0','mt1','mt2','mt3'], attribution: mbAttr
                                });
        osmBw = L.tileLayer('https://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
                                    maxZoom: 20,
                                    subdomains:['mt0','mt1','mt2','mt3'], attribution: mbAttr
                                });

        var map = L.map('map', {
            layers: [borders,osm,stations1,stations2,stations3,stations4],
            center: [x,y],
            zoom: {{$z}},
        });

        var runLayer = omnivore.kml('{{ asset('kml/bound_maejangbasin.kml') }}')
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
                 
        var amp=["เมืองลำปาง", "เกาะคา","แม่ทะ" ,"แม่เมาะ"];

        function addPin(ampName,k,mo){
            $.getJSON("{{ asset('form/getDamage') }}/"+amp[k], 
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
                                L.marker([x,y],{icon: pinMO}).addTo(ampName).bindPopup(text+text1+text2+text3);  
                            }else{
                                L.marker([x,y],{icon: pin}).addTo(ampName).bindPopup(text+text1+text2+text3);  
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
            addPin(stations4,3,mo);
     
        var baseTree = {
            label: 'BaseLayers',
            noShow: true,
            children: [  {label: ' แผนที่ภูมิประเทศ (Streets)', layer: osm},
                         {label: ' แผนที่ภาพถ่ายผ่านดาวเทียม (Satellite)', layer: osmBw},
                     ]
        };
        var overlays = {
            label: ' อำเภอ',
            selectAllCheckbox: true,
            children: [
                { label:" "+amp[0],layer: stations1,},
                { label:" "+amp[1],layer: stations2,},
                { label:" "+amp[2],layer: stations3,},
                { label:" "+amp[3],layer: stations4,},
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
