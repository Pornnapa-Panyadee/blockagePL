<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <link rel="stylesheet" href="{{ asset('css/myCss.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashmix.min.css') }}">
    
    <!-- <link rel="stylesheet" href="{{ asset('css/style_chat.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('css/typing.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style1.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/fontawesome-all.css') }}">
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

        .btn btn-secondary{
            z-index: 999;
        }
        .textbox{
            vertical-align:top;
            background: rgba(255,255,255,0.1);
            border: none;
            width: 70%;
            font-size: 16px;
            padding: 1px;
            background-color: #e8eeef;
            color: #3042fa;
            box-shadow: 0 1px 0 rgb(0 0 0 / 3%) inset;
        }
        input[type="text"],input[type="date"],select{
            color: #3042fa;
        }
        textarea {
            padding: 2px 0 0 10px;
            overflow: auto;
            resize: vertical;
        }
        label{
            margin-left:20px;
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
    
    <script src= "{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/location.js') }}"></script>
    <script src="{{ asset('js/showhide.js') }}"></script>
    <script src="{{ asset('js/chooseLocation.js') }}"></script>
    
    <script src="{{ asset('js/dashmix.core.min.js') }}"></script>
    <script src="{{ asset('js/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('js/be_forms_wizard.min.js') }}"></script>
    <script src= "{{ asset('js/imagePreview.js') }}"></script>
    <script src="{{ asset('js/radioAndCheckbox.js') }}"></script>
    <script src="{{ asset('js/validateNewForm.js') }}"></script>

    <!-- thai date -->
    <script src= "{{ asset('js/bootstrap-datepicker-thai/css/datepicker.css') }}"></script>
    <script src= "{{ asset('js/bootstrap-datepicker-thai/js/bootstrap-datepicker.js') }}"></script>
    <script src= "{{ asset('js/bootstrap-datepicker-thai/js/bootstrap-datepicker-thai.js') }}"></script>
    <script src= "{{ asset('js/bootstrap-datepicker-thai/js/locales/bootstrap-datepicker.th.js') }}"></script>

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
        // -- clear Sol
        document.getElementById('clear_sol').onclick = function() {
            var radio = document.querySelector('input[type=radio][name=sol_how]:checked');
            radio.checked = false;
        }
       
    </script>
     <script>
     // -- clear radio clear_result
        document.getElementById('clear_result').onclick = function() {
            var radio = document.querySelector('input[type=radio][name=result_selector]:checked');
            radio.checked = false;
        }
    </script>
     <script>
        // -- clear radio clear_proj
        document.getElementById('clear_proj').onclick = function() {
            var radio = document.querySelector('input[type=radio][name=proj_status]:checked');
            radio.checked = false;
        }
    </script>

</body>
</html>