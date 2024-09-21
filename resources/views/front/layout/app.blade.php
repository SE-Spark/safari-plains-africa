<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Safari Plain Africa</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

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
    @vite(['resources/css/app.css','resources/js/app.js'])
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
       .img-fluid.mono{
           width: 50% !important;
       }
   }

   @media (min-width: 1400px) {
       .img-fluid {
           height: 290px !important;
           width: 100% !important;
       }
       .img-fluid.mono{
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

</style>
</head>

<body>

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