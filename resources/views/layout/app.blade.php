<!doctype html>

<html>

<head>

   @include('include.head')

</head>

<body>

<div class="container">

   <header class="row">

       @include('include.header')

   </header>

   <div id="main" class="row">

           @yield('content')

   </div>

   <footer class="row">

       @include('include.footer')
       @include('include.scripts')

   </footer>

</div>

</body>

</html>
