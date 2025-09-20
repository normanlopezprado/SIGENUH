<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <title>@yield('SIGENUH', ' Sistema de gestión nutricional hospitalaria')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Norman López Prado - 1490-07-6356" name="author">
    <link rel="shortcut icon" href="{{ asset('assets/images/16650.png') }}">">

    <meta property="og:locale" content="es_ES">
    <meta property="og:type" content="article">

    @include('partials.datatable-css')
    @yield('css')
    @include('partials.head-css')
</head>

<body>

    @include('partials.header')
    @include('partials.sidebar')
    @include('partials.preloader')


    <main class="app-wrapper">
        <div class="app-container">

            @include('partials.breadcrumb')

            <!-- end page title -->

            @yield('content')
            @include('partials.bottom-wrapper')
            @include('partials.datatable-script')
            @yield('js')
    @stack('scripts')
</body>

</html>
