<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">  
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" data-navigate-track>
    @livewireStyles
    @yield('styles')
    <style>
        table tr:first-child td input,
        table tr:first-child td select{
            font-size: 10px;
            min-width: 100px;
        }
        tr td{            
            font-size: 12px;
        }
        tr td:last-child {
            min-width: 150px;
        }
        tr td:last-child .flex div{
            width:60px;
            float:left;
        }
    </style>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
    
    @include('layouts.includes.topbar')
    @include('layouts.includes.sidebar')
    <main id="main" class="main">
        {{$slot}}
    </main>
    @include('layouts.includes.footer')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" data-navigate-once></script>                     
    <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}" data-navigate-once></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" data-navigate-once></script>
    <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}" data-navigate-once></script>
    <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}" data-navigate-once></script>
    <script src="{{asset('assets/vendor/quill/quill.min.js')}}" data-navigate-once></script>
    <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}" data-navigate-once></script>    
    <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"data-navigate-track></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}" data-navigate-once></script>
    <script src="{{asset('assets/js/main.js')}}" ></script>
    
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js" data-navigate-once></script> -->
  
    @livewireScripts
    @yield('scripts')
    {{--  @livewire('wire-elements-modal')
    @livewire('livewire-ui-modal')  --}}
    @stack('scripts')
</body>

</html>