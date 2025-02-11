<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Safari Plain Africa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{asset('logo.jpeg')}}" rel="icon">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZKHBMWQB56"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-ZKHBMWQB56');
    </script>
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('front/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @media (min-width: 768px) {
            .img-fluid {
                height: 230px !important;
                width: 100% !important;
            }
        }

        @media (min-width: 1200px) {
            .img-fluid {
                height: 240px !important;
                width: 100% !important;
            }

            .img-fluid.mono {
                width: 50% !important;
            }
        }

        @media (min-width: 1400px) {
            .img-fluid {
                height: 290px !important;
                width: 100% !important;
            }

            .img-fluid.mono {
                width: 50% !important;
            }
        }

        .modal-dialog-bottom {
            /* display: flex;
    justify-content: center;
    align-items: flex-end; */
            /* min-height: 90vh; */
            margin: 0 !important;
            padding: 0 !important;
            position: absolute !important;
            bottom: 0 !important;
            top: 0 !important;
            left: auto !important;
            right: 0 !important;
            height: 100% !important;
        }

        /* .modal.fade .modal-dialog {
    transition: transform 0.3s ease-out;
}

.modal.fade.show .modal-dialog {
    transform: translateY(0);
} */
        .whatsapp-btn-float {
            background: #25d366;
            color: white;
            position: fixed;
            bottom: 20px;
            left: 20px;
            font-size: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 0;
            height: 0;
            padding: 35px;
            text-decoration: none;
            border-radius: 50%;
            animation-name: pulse;
            animation-duration: 1.5s;
            animation-timing-function: ease-out;
            animation-iteration-count: infinite;
            z-index: 100;
        }

        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(37, 211, 102, 0.5);
            }

            80% {
                box-shadow: 0 0 0 14px rgba(37, 211, 102, 0);
            }
        }

        .background-image {
            width: 100%;
            background-image: url('/front/img/enquiry.png');
            background-size: cover;
            background-position: center;
            opacity: .7;
            height: 100vh;
        }

        .custom-center {
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically if needed */
            text-align: center;
            /* Center text */
            min-height: 100vh;
            /* Full viewport height */
        }

        .btn-radio input[type="radio"] {
            display: none;
            /* Hide default radio button */
        }

        .btn-radio input[type="radio"]:checked+label {
            background-color: #0d6efd;
            color: white;
            border-color: #0d6efd;
        }

        .checked {
            background-color: #7AB730 !important;
            color: white;
            border-color: #7AB730;
        }

        .btn-radio {
            width: 100% !important;
            margin: 5px;
        }
    </style>

</head>

<body>
    <a href="https://api.whatsapp.com/send?phone=254733373221&text=Hi%21%20I%20would%20like%20more%20information%20about%20Safari%20Plains%20Africa%20."
        class="whatsapp-btn-float" target="_blank" rel="nofollow">
        <i class="fab fa-whatsapp"></i>
        <span class="d-none">Whatsapp</span>
    </a>
    @include('front.layout.topbar')
    @include('front.layout.navbar')

    {{$slot}}

    @include('front.layout.footer')
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('front/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('front/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('front/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('front/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <!-- Contact Javascript File -->
    <script src="{{asset('front/mail/jqBootstrapValidation.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('front/js/main.js')}}"></script>
</body>

</html>