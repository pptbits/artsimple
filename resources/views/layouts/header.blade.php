<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no">
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="robot" content="index, follow" />
    <meta name="generator" content="Brackets">
    <meta name='copyright' content='Orange Technology Solution co.,ltd.'>
    <meta name='designer' content='Kamonluk'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <title>@yield('title')</title>

    <link type="image/ico" rel="icon" href="images/DSPM Logo.png">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <!--JS-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous">
    </script>
    <script src="{{ asset('owlcarousel/js/jquery.min.js') }}"></script>

    <!--FONT-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Mitr:wght@300;400;500;600&family=Poppins:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <!--ICON-->
    <link rel="stylesheet" href="{{ asset('fontawesome/all.min.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!--FANCY APP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>

    <!--Owl Carousel-->
    <link rel="stylesheet" href="{{ asset('owlcarousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/css/owl.theme.default.min.css') }}">
    <script src="{{ asset('owlcarousel/js/owl.carousel.min.js') }}"></script>
    <!--Virtual-select-->
    <link href="{{ asset('dist/virtual-select.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('dist/virtual-select.min.js') }}"></script>
    <!--dataTable-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dTable/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dTable/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('dTable/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <script src="{{ asset('dTable/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dTable/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dTable/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dTable/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dTable/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dTable/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('dTable/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- Sweertalert -->
    <link rel="stylesheet" type="text/css" href="{{ asset('owlcarousel/css/sweetalert2.min.css') }}">
    <script src="{{ asset('owlcarousel/js/sweetalert2.min.js') }}"></script>
    <!--Animation-->
    <script src="{{ asset('js/wow.min.js') }}"></script>

    <script>
        new WOW().init();
    </script>

    @include('layouts.stylesheet')
</head>

<body>
    @include('layouts.inc_navbar')
