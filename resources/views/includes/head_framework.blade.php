
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Mitr|Prompt" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
        
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
                <nav class="navbar navbar-expand-lg bg-white fixed-top">
                    <a class="navbar-brand" href="{{ url('/') }}">Stream Blockages Platform</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <div class="navbar-toggler-icon"> 
                            <img src="{{ asset('images/logo/bar.png') }}" width="100%"> 
                        </div>
                        
                    </button>
                    <div> 
                        
                    </div>
                </nav>
            </div>
            <!-- ============================================================== -->
            <!-- end navbar -->
            <script src="{{ asset('js/app.js') }}"></script>
            <script src="{{ asset('js/main-js.js') }}"></script>

</body>
</html>

         
