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
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    @livewireStyles
    @yield('styles')
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body>
    <noscript>
        This page needs JavaScript activated to work.
        <style>
            div {
                display: none;
            }
        </style>
    </noscript>
    <div id="app">
        <div class="loader" style="position:fixed;top: 30%; left:45%">
            <div class="spinner-grow" style="width: 50px; height: 50px;" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        <main class="d-none">
            <div class="container-fluid">
                <div class="row justify-content-end default">
                    <div class="col-md-8 d-md-block d-none">
                        <div class="d-flex align-items-center justify-content-center vh-100">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <div class="d-flex align-items-center">
                                        <!-- <img src="{{asset('logo.jpeg')}}" style="width:100px;"> -->
                                        <span class="d-none d-lg-block" style="color: #801213;font-size:20px;">Safari Plains Africa</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12 p-0">
                        {{$slot}}
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" data-navigate-once></script>
    <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
    <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
    @livewireScripts
    @yield('scripts')
    @stack('scripts')
    <script>
        $(document).ready(function() {
            $('.loader').fadeOut(1000, function() {
                $('.loader').remove();
                $('main').removeClass('d-none');
            });
        });
    </script>
</body>

</html>