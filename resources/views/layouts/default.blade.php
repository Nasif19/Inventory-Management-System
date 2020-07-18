<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{asset('main.87c0748b313a1dda75f5.css')}}" rel="stylesheet">
    <link href="{{asset('animate.css')}}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <style type="text/css">
        .txtbox{
            border: none;
            border-bottom: 2px solid;
            background: transparent;
            padding-top: 5px;
        }
    </style>
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-header fixed-sidebar">
    <!-- <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar"> -->
    @include('includes.navbar')
    @include('includes.layout_settings')
    <div class="app-main">
        @include('includes.sidebar')
        <div class="app-main__outer">
            <div class="app-main__inner">
                @yield('content')
            </div>
            @include('includes.footer')    
        </div>
    </div>
</div>
@include('includes.appdrawer')
<script type="text/javascript" src="{{asset('assets/scripts/main.87c0748b313a1dda75f5.js')}}"></script>
</body>
</html>
