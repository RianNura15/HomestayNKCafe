<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/logo.png')}}" rel="icon">
    <link rel="icon" type="image/png" href="{{asset('admin/img/logo.png')}}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('pelanggan/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('pelanggan/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('pelanggan/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('pelanggan/css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('pelanggan/js/simple-database/style.css')}}">
</head>

<body>
    @yield('content')
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('pelanggan/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('pelanggan/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('pelanggan/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('pelanggan/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('pelanggan/js/simple-database/simple-database.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('pelanggan/js/main.js')}}"></script>
    <script defer src="{{asset('pelanggan/js/activePage.js')}}"></script>
    <script src="{{asset('admin/extensions/sweetalert2.js')}}"></script>
    <script src="{{asset('admin/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
      // Simple Datatable
      let table1 = document.querySelector('#table1');
      let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    @include('admin.layouts.notif')
</body>

</html>