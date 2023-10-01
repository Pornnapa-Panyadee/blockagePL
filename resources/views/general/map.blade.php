<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Blockage::Mae Jang Basin</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mitr|Prompt" rel="stylesheet">
    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
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
			  height: 750px;
			  display: block;
              margin: auto;
              text-align: left;
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
        #ref.img{
                width: 100%;
            }

        
        @media only screen and (max-width:480px) {
            #map{
                height: 450px;
            }
            #ref.img{
                width: 50%;
            }
            #example2.table{
                font-size: 2vw;
            }
        }
        * {box-sizing: border-box}
         /* Style tab links */
        .tablink {
            background-color: #ccc;
            color: white;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            font-size: 17px;
            width: 25%;
        }

        .tablink:hover {
            background-color: #000;
        }

        /* Style the tab content (and add height:100% for full page content) */
        .tabcontent {
            display: none;
            padding: 100px 20px;
            display: none;
            padding: 20px 20px;
            border: 2px solid #ccc;
            border-top: none;
            width: 100%;
        }

        #sum {background-color: #fff;border: 1px solid #ccc;}
        #phase1 {background-color:  #fff;border: 1px solid #ccc;}
        #Contact {background-color:  #fff;border: 1px solid #ccc;}


    </style>
        
</head>
<body>
    <div class="dashboard-main-wrapper">
        @include('includes.headmenu')
      
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        
                <div class="container-fluid dashboard-content">
                    
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                    <div class="card-header"> 
                                        <h2 class="pageheader-title">แผนที่แสดงตำแหน่งการกีดขวางทางน้ำจำแนกตามระดับความเสี่ยง พื้นที่ลุ่มน้ำแม่จาง จังหวัดลำปาง</h2>
                                    </div>
                                <div class="card-body">
                                        {{-- @include('form.map') --}}
                                        <div class="row">
                                            <div class="col-xs-10 col-sm-10 col-md-10">
                                                    <div id="map" style="width: 100%; " align="center"></div>
                                            </div>
                                            <div class="col-xs-2 col-sm-2 col-md-2" align=center>
                                                <img class="ref" src="{{ asset('images/logo/descreption_pin4.png') }}" width=80% >
                                            </div>
                                        </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="row">
                                    <!-- ============================================================== -->
                                    <!-- basic table  -->
                                    <!-- ============================================================== -->
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <font style="font-size: 1vw">ตารางแสดงจำนวนจุดกีดขวางทางน้ำ จำแนกตามระดับความเสี่ยงจากการกีดขวางทางน้ำ</font>
                                            </div>
                                            
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="table-responsive" align="center">
                                                        <table id="example2" class="table table-striped table-bordered" style="width:70%" >
                                                            <thead >
                                                                <tr style="text-align: center">
                                                                    <td> <b>อำเภอ </b></td>
                                                                    <td > <b>ระดับการกีดขวางน้อย</b></td>
                                                                    <th>amp</th>
                                                                    <td><b>ระดับการกีดขวางปานกลาง</b></td>
                                                                    <td><b>ระดับการกีดขวางมาก</b></td>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>--</td>
                                                                    <td align="center">{{$ampL1}}</td>
                                                                    <td>รวมอำเภอทั้งหมด</td>
                                                                    <td align="center">{{$ampL2}}</td>
                                                                    <td align="center">{{$ampL3}}</td>
                                                                </tr>
                                                                <?php for($i=0;$i<count($amp_data);$i++){?>
                                                                    <tr>
                                                                        <td >{{ $amp_data[$i]['amp']}}</td>
                                                                        <td align="center">{{ $amp_data[$i]['level1']}}</td>
                                                                        <td >อำเภอ</td>
                                                                        <td align="center" >{{ $amp_data[$i]['level2']}}</td>
                                                                        <td align="center">{{ $amp_data[$i]['level3']}}</td>
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
        <!-- end main wrapper -->
        <!-- ============================================================== -->

        @include('includes.foot')
    </div>

    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> 
    <script src="{{ asset('/js/data-table.js') }}"></script> 
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script> 
   
   
    <script src="{{ asset('js/chooseLocation_table.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/L.Control.Layers.Tree.css')}}" crossorigin=""/>
    <script src="{{ asset('/js/L.Control.Layers.Tree.js')}}"></script>                                                                    

    <script>

        {//--- Layer Declarations
                var stations1 = new L.LayerGroup();
                var stations2 = new L.LayerGroup();
                var stations3 = new L.LayerGroup();
                var stations4 = new L.LayerGroup();

                var borders = new L.LayerGroup();
                
        }		

        {//---- Basemap Load
                
            var mbAttr = 'Mae Jang Basin ',
            mbUrl = 'https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoidmFucGFueWEiLCJhIjoiY2loZWl5ZnJ4MGxnNHRwbHp5bmY4ZnNxOCJ9.IooQB0jYS_4QZvIq7gkjeQ';
            osm = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                maxZoom: 20,subdomains:['mt0','mt1','mt2','mt3'], attribution: mbAttr });
            osmBw = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
                    maxZoom: 20,subdomains:['mt0','mt1','mt2','mt3'], attribution: mbAttr });

        }
        //----------------- การแสดงผลเริ่มต้น 
        {//--------borders, stations, rivers, 
                var x=18.290015; 
                var y=99.656525;
                    
                    var map = L.map('map', {
                    center: [x,y],
                    zoom: 10,
                    layers: [borders,stations1,stations2,stations3,stations4,osm]
                    // layers: [borders,stations1,stations2,stations3,osm]
                });

                var runLayer = omnivore.kml('{{ asset('kml/bound_maejangbasin.kml') }}')
                            .on('ready', function() {
                            this.setStyle({
                            fillOpacity: 0,
                            color: "#994F3E",
                            weight: 3
                            });
                }).addTo(borders); 
            

                var lavel1 = L.icon({
                        iconUrl: '{{ asset('images/logo/pin1.png') }}',
                        iconRetinaUrl:'{{ asset('images/logo/pin1.png') }}',
                        iconSize: [22, 22],
                        iconAnchor: [15, 10],
                        popupAnchor: [0, 0]
                    });
                var lavel2 = L.icon({
                        iconUrl: '{{ asset('images/logo/pin2.png') }}',
                        iconRetinaUrl:'{{ asset('images/logo/pin2.png') }}',
                        iconSize: [24, 24],
                        iconAnchor: [15, 20],
                        popupAnchor: [0, 0]
                    });
                var lavel3 = L.icon({
                        iconUrl: '{{ asset('images/logo/pin3.png') }}',
                        iconRetinaUrl:'{{ asset('images/logo/pin3.png') }}',
                        iconSize: [26, 26],
                        iconAnchor: [10, 20],
                        popupAnchor: [0, 0]
                    });
                
                
                var ref = L.icon({
                        iconUrl: '{{ asset('images/logo/descreption_pin3.png') }}',
                        iconRetinaUrl:'{{ asset('images/logo/descreption_pin3.png') }}',
                        iconSize: [150, 220],
                        iconAnchor: [25, 35],
                        popupAnchor: [0, 0]
                });
            
                
                
                
                // var amp=["ฝาง","ไชยปราการ","แม่อาย"];
                var amp=["เมืองลำปาง","เกาะคา","แม่ทะ","แม่เมาะ"];
                function addPin(ampName,i){
                    $.getJSON("{{ asset('form/getDamage') }}/"+amp[i], 
                        function (data){
                            for (i=0;i<data.length;i++){
                                
                                var lo =data[i].geometry.coordinates+ '';;
                                var x=lo.split(',')[1];
                                var y=lo.split(',')[0];
                            
                            // alert (x);
                            var text ="<font style=\"font-family: 'Mitr';\" size=\"3\"COLOR=#1AA90A > รหัส :<a href='{{ asset('/report/pdf') }}/"+data[i].blk_id+"' > " + data[i].blk_code + "</font><br>";
                            
                                text1 = "<font style=\"font-family: 'Mitr';\" size=\"2\"COLOR=#466DF3 > ลำน้ำ : "+ data[i].river+ "</font><br>";
                                text2 = "<font style=\"font-family: 'Mitr';\" size=\"2\"COLOR=#466DF3 >ที่ตั้ง : "+ data[i].location +" ต."+ data[i].tambol +" อ."+ data[i].district +"</font><br>";
                                text3 = "<br><table align=\"center\"><tr><td width=50%><a href='{{ asset('/report/pdf') }}/"+data[i].blk_id+"' target=\"_blank\"> " + "<button class=\"btn btn-sm btn-outline-light\"><i class=\"fas fa-eye\"></i> รายงาน</button> </a></td> <td  width=2s%></td><td  width=48%><a href='{{ asset('/report/photo') }}/"+data[i].blk_id+"' target=\"_blank\"> " + "<button class=\"btn btn-sm btn-outline-light\"><i class=\"fas fa-images\"></i> ภาพประกอบ</button> </a></td></tr></table>";
                                                    
                            if(data[i].level=="น้อย"){
                                    L.marker([x,y],{icon: lavel1}).addTo(ampName).bindPopup(text+text1+text2+text3);
                            }else if(data[i].level=="ปานกลาง"){
                                    L.marker([x,y],{icon: lavel2}).addTo(ampName).bindPopup(text+text1+text2+text3);
                            }else if(data[i].level=="มาก"){
                                    L.marker([x,y],{icon: lavel3}).addTo(ampName).bindPopup(text+text1+text2+text3);
                            }
                            }//end for
                        }
                                            
                    );
                    
                }

                addPin(stations1,0);
                addPin(stations2,1);
                addPin(stations3,2);
                addPin(stations4,3);                

        }

        //   L.marker([20.050,99.2485],{icon: ref}).addTo(stations10);

        {//------- Base Map Option		
            var baseTree = {
                label: 'BaseLayers',
                noShow: true,
                children: [  {label: ' แผนที่ภูมิประเทศ (Streets)', layer: osm},
                            {label: ' แผนที่ภาพถ่ายผ่านดาวเทียม (Satellite)', layer: osmBw},
                        ]
            };


            var border = {
                label: 'border',
                noShow: true,
                selectAllCheckbox: true,
                children: [  {label: ' ขอบเขตอำเภอ', layer: borders,}
                ]
                
                // selectAllCheckbox: true,
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
          

            var ctl = L.control.layers.tree(baseTree,overlays,border,
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
            // ctl=L.control.layers(baseLayers, border).addTo(map).collapseTree().expandSelected();

            ctl.addTo(map).collapseTree().expandSelected();
            // ctl.setOverlayTree(border).collapseTree().expandSelected();
            // ctl.setOverlayTree(overlays).collapseTree().expandSelected();
            // 
        }


                
                                
                
    </script>


    <script>
        function openPage(pageName,elmnt,color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(pageName).style.display = "block";
                elmnt.style.backgroundColor = color;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

</body>
</html>
