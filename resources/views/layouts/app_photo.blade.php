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
    </style>
    <style>
        .tab {
            overflow: hidden;
            background-color: #f2f7fb;
        }
        .tab button {
            background-color: inherit;
            color :#263544;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 20px;
            transition: 0.3s;
            font-size: 17px;
            width: 20%;
            border-radius: 10px 10px 0px 0px;
        
        }
        .tab button:hover {
            background-color: #4099ff;
        }
        .tab button.active {
            background-color: #4099ff;
        }
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border-top: 5px solid #263544;
        }
        input[type="file"] {
            display: block;
        }
        .imageThumb {
            max-height: 100px;
            border: 1px solid;
            padding: 1px;
            cursor: pointer;
        }.pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }.remove {
            display: block;
            background: #263544;
            border: 1px solid ;
            color: white;
            text-align: center;
            cursor: pointer;
        }.remove:hover {
            background: white;
            color: black;
        }
    </style>

</head>
<body >
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    
    <script src= "{{ asset('js/app.js') }}"></script>
    <script src= "{{ asset('js/imagePreview.js') }}"></script>
    <script src="{{ asset('js/remove_photo.js')}}"></script>
    <script>
      function myFunction() {
        confirm("คุณต้องการลบรูปใช่ไหม?");
      }
    </script>

   
    

</body>
</html>