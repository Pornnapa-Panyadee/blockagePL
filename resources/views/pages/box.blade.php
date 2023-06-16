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
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dataTables.bootstrap4.css')}}">


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet-src.js" crossorigin=""></script>
    <!--link rel="stylesheet" href="../../Leaflet/dist/leaflet.css" crossorigin=""/>
    <script src="../../Leaflet/dist/leaflet-src.js" crossorigin=""></script-->

    <!-- <style type="text/css">
        html, body { width: 100%; height: 100%; margin: 0; }
        #map { width: 100%; height: 100%; }
    </style> -->
    <style type="text/css">
        html, body, #map {
            height: 100%;
            width: 100%;
        }
    	#map{
			  font-family: Mitr, sans-serif;
			  height: 700px;
			  display: block;
              margin: auto;
              text-align:left;
              font-size:14px;
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
    <!-- <div id="map"></div> -->
    <div class="dashboard-main-wrapper">
        @include('includes.headmenu') 
       <!-- <div id="app">@yield('content')</div> -->
    
        <div id="map"></div>
        @include('includes.foot')
    </div>


        
    <link rel="stylesheet" href="{{ asset('css/L.Control.Layers.Tree.css')}}" crossorigin=""/>
    <script src="{{ asset('/js/L.Control.Layers.Tree.js')}}"></script>
    <!-- <script src="{{asset('js/jquery-1.9.1.min.js')}}"></script>  -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script> 
    <script src="{{ asset('/js/data-table.js') }}"></script> 
    <script src="{{ asset('/js/jquery.dataTables.min.js') }}"></script> 
    <script src="{{ asset('/js/dataTables.bootstrap4.min.js') }}"></script> 

    <script type="text/javascript">

        var stations1 = new L.LayerGroup();
        var stations2 = new L.LayerGroup();
        var stations3 = new L.LayerGroup();
        var stations4 = new L.LayerGroup();
        var stations5 = new L.LayerGroup();
        var stations6 = new L.LayerGroup();
        var stations7 = new L.LayerGroup();
        var stations8 = new L.LayerGroup();
        var stations9 = new L.LayerGroup();
        var stations10 = new L.LayerGroup();    
        
        var x = 20.15755 ;
        var y = 99.9995964;

        osm = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                                    maxZoom: 20,
                                    subdomains:['mt0','mt1','mt2','mt3']
                                });
        osmBw = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
                                    maxZoom: 20,
                                    subdomains:['mt0','mt1','mt2','mt3']
                                });

        var map = L.map('map', {
            layers: [osm,stations1,stations2,stations3,stations4,stations5,stations6,stations7,stations8,stations9,stations10],
            center: [x,y],
            zoom: 9,
        });

  
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
           
        var amp=["เชียงของ","เชียงแสน","เวียงแก่น","เวียงชัย","เวียงเชียงรุ้ง","แม่จัน","แม่สาย","แม่ฟ้าหลวง","ดอยหลวง","เมืองเชียงราย"];
        
        function addPin(ampName,i,mo){
            $.getJSON("{{ asset('form/getDamage') }}/"+amp[i], 
                function (data){
						 for (i=0;i<data.length;i++){
                            // for (i=0;i<1;i++){
                            
                            var lo =data[i].geometry.coordinates+ '';;
							var x=lo.split(',')[1];
                            var y=lo.split(',')[0];
                           
                           // alert (x);
                           var text ="<font style=\"font-family: 'Mitr';\" size=\"3\"COLOR=#1AA90A > รหัส :<a href='{{ asset('/report/pdf') }}/"+data[i].blk_id+"' target=\"_blank\"> " + data[i].blk_code + "</font><br>";
                        
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
            addPin(stations5,4,mo);
            addPin(stations6,5,mo);
            addPin(stations7,6,mo);
            addPin(stations8,7,mo);
            addPin(stations9,8,mo);
            addPin(stations10,9,mo);

     
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
                { label:" "+amp[4],layer: stations5,},
                { label:" "+amp[5],layer: stations6,},
                { label:" "+amp[6],layer: stations7,},
                { label:" "+amp[7],layer: stations8,},
                { label:" "+amp[8],layer: stations9,},
                { label:" "+amp[9],layer: stations10},
            ]
        };

        var ctl = L.control.layers.tree(baseTree, null,
            {
                // namedToggle: true,
                // collapseAll: 'Collapse all',
                // expandAll: 'Expand all',
                // collapsed: false,
                collapsed: false,
                collapseAll: '',
                expandAll: '',
            }
            );
    

        ctl.addTo(map).collapseTree().expandSelected();

        ctl.setOverlayTree(overlays).collapseTree().expandSelected();

        
        // L.control.layers(baseTree, overlays).addTo(map).collapseTree().expandSelected();


    </script>
</body>
</html>
