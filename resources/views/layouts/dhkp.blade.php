<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
    content="Admin Panel Daftar Himpunan Ketetapan & Pembayaran PBB P2 Desa Bululawang Kecamatan Bululawang Kabupaten Malang Provinsi Jawa Timur">
    <meta name="keywords"
    content="admin bululawang, desa bululawang, bululawang, malang">
    <meta name="author" content="kkm">
    <link rel="icon" href="{{ URL::asset('favicon.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ URL::asset('favicon.png') }}" type="image/x-icon" />

    <title>DHKP</title>

    <style type="text/css">
        .modal-long {
            width: 160% !important;
            right: 50%;
            left: 50%;
            transform: translate(-50%, 0%);
        }

        th {
            font-size: 85%;
        }

        td {
            font-size: 85%;
        }

        #marker {
            display: none;
            position: relative;
            max-height: 20px;
            max-width: 20px;
            text-decoration: none;
        }

        #maps {
            width: 2000px;
            height: auto;
            display: block;
        }
    </style>

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.css') }}">
    <!-- ico-font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icofont.css') }}">
    <!-- Themify icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themify.css') }}">
    <!-- Flag icon -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flag-icon.css') }}">
    <!-- Owl css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owlcarousel.css') }}">
    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- Responsive css -->
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}"> -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('lib/datatables/DataTables-1.10.23/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/Bootstrap-4-4.1.1/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/datatables/FixedColumns-3.3.2/css/fixedColumns.bootstrap4.min.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('lib/datatables/jQuery-3.3.1/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ URL::asset('lib/datatables/DataTables-1.10.23/js/jquery.dataTables.min.js') }}"></script>    
    <script src="{{ URL::asset('lib/datatables/Bootstrap-4-4.1.1/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('lib/datatables/DataTables-1.10.23/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('lib/datatables/FixedColumns-3.3.2/js/dataTables.fixedColumns.min.js') }}"></script>  

    <script src="https://cdn.datatables.net/plug-ins/1.10.22/sorting/currency.js"></script>    

    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAPOaletGS0Eee99yIbin7DBSW0E98En-vv-OWGO6rAPPGVTV-pRQwzr8YoR4BxPkjepmWwMhqiCUA2A"
    type="text/javascript"></script>

    

</head>

<body onload="load()">
    <!-- Loader starts -->
    <div class="loader-wrapper">
        <div class="loader bg-white">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </div>
    <!-- Loader ends -->

    <!--page-wrapper Start-->
    <div class="page-wrapper">

        <!--Page Header Start-->
        @include('partials.header')
        <!--Page Header Ends-->

        <!--Page Body wrapper Start-->
        <div class="page-body-wrapper">

            <!--Page Sidebar Start-->
            @include('partials.sidebar')
            <!--Page Sidebar Ends-->


            @yield('content')


        </div>
        <!--Page Body wrapper Ends-->
    </div>
    <!--page-wrapper Ends-->

    <!-- latest jquery-->
    <!-- Bootstrap js-->
    <!-- owlcarousel js-->
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <!-- Sidebar jquery-->    
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <!-- Theme js-->
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <!-- Counter js-->
    <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>


</body>

</html>