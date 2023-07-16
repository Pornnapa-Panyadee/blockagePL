<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Blockage::Mae Jang Basin</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mitr|Prompt" rel="stylesheet">
    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/myCss.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashmix.min.css') }}">
    
    <!-- <link rel="stylesheet" href="{{ asset('css/style_chat.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/popupInfo.css') }}">
    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Mitr', sans-serif;

        }
        .describe_text{
            font-size: 16px;
            font-weight: bold;
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
            font-size: 16px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        input[data-readonly] {
            pointer-events: none;
        }
        .table thead th , .table th{
            text-align: left;
        }

        .on-next-action{
            z-index: 9999;

        }
 
        .textbox{
            background: rgba(255,255,255,0.1);
            border: none;
            width: 70%;
            font-size: 16px;
            padding: 1px;
            background-color: #e8eeef;
            color: #3042fa;
            box-shadow: 0 1px 0 rgb(0 0 0 / 3%) inset;
        }
        .modal-cal{
            font-family: 'Mitr';
            font-size: 20;
            font-weight: bold;
            margin-top: 60px;
            padding: 2px 20px;
            text-align: left;
            color:#000;
        }.answer{
            color:#3042fa;
            font-size: 20;
            font-weight: bold;
        }input[type="number"]{
            padding: 2px 20px;
            color:#3042fa;
        }.form_cal{
            margin: 10px auto;
            padding: 10px 20px;
            background: #ceeaf3;
            border-radius: 8px;
        }
        @media screen and (max-width: 870px){
            th,td{
                width: 100%;
                display:block;
            }
            .text_location{
                text-align: left;
            }
            .location{
                display: inline-block;
            }
            .loc_damage{
                margin-left: 20px;
                padding-left: 20px;
            }
            .nav-link {
                font-weight: 200;
            }
            li {
                font-size: 9px;
                text-align: left;
                padding: 2px;
                margin: 1px;
                color: #000000;
            }
        }
        
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ asset('js/proj4js.js') }}"></script>
    <script src="{{ asset('js/EPSG32647.js') }}"></script>
    <script src="{{ asset('js/utmlatlong.js') }}"></script>
    

</head>
<body onload="initProj4js()">
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <script src="{{ asset('js/jquery-1.9.1.min.js') }}"></script>
    <script src= "{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main-js.js') }}"></script>
    
    
    <script src="{{ asset('js/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/jquery.ui.touch-punch.min.js') }}"></script>

    <script src="{{ asset('js/Chat.js') }}"></script>
    <script src="{{ asset('js/app_chat.js') }}"></script>
    <script src="{{ asset('js/popupInfo.js') }}"></script>
    <script src="{{ asset('js/shortable-nestable/Sortable.min.js') }}"></script>
    <script src="{{ asset('js/shortable-nestable/sort-nest.js') }}"></script>
    <script src="{{ asset('js/shortable-nestable/jquery.nestable.js') }}"></script>
    <script src="{{ asset('js/location.js') }}"></script>
    <script src="{{ asset('js/showhide.js') }}"></script>
    <script src="{{ asset('js/chooseLocation.js') }}"></script>
    <script src="{{ asset('js/validateNewForm.js') }}"></script>
    <script src="{{ asset('js/dashmix.core.min.js') }}"></script>
    <script src="{{ asset('js/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/be_forms_wizard.min.js') }}"></script>
    <script src= "{{ asset('js/imagePreview.js') }}"></script>
    <!-- thai date -->
    <script src= "{{ asset('js/bootstrap-datepicker-thai/css/datepicker.css') }}"></script>
    <script src= "{{ asset('js/bootstrap-datepicker-thai/js/bootstrap-datepicker.js') }}"></script>
    <script src= "{{ asset('js/bootstrap-datepicker-thai/js/bootstrap-datepicker-thai.js') }}"></script>
    <script src= "{{ asset('js/bootstrap-datepicker-thai/js/locales/bootstrap-datepicker.th.js') }}"></script>

    <script>
            $(document).ready(function(){
            $("select").change(function(){
                $(this).find("option:selected").each(function(){
                    var optionValue = $(this).attr("value");
                    if(optionValue){
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else{
                        $(".box").hide();
                    }
                });
            }).change();
        });
            
    </script>

    <script>
        $(function(){
            $("#survey_date").datepicker({
                language:'th-th',
                format:'dd-mm-yyyy',
                autoclose: true
            });
        });
    </script>
    <script>
        function calculate(a) 
        {
            const slope = Math.floor((a-9)/2); 
            return slope
        }

        var picker = new Pikaday({ 
            field: document.getElementById('A') ,
            yearRange:[1900,2020],
            onSelect: function(a) {
                let a = calculate(a);
                document.getElementById('slope').innerHTML = "Slope: "+a ;
            }                        
        });
    </script>
    

</body>
</html>