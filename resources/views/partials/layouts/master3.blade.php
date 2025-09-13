<!DOCTYPE html>
<html lang="es" class="h-100">

<head>
    <meta charset="utf-8">
    <title>@yield('SIGENUH', ' Sistema de gestión nutricional hospitalaria')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Proyecto de graduación para el hospital regional de occidente">
    <link rel="shortcut icon" href="{{ asset('assets/images/Favicon1.png') }}">
    <meta property="og:locale" content="es_ES">

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

            @yield('js')

</body>

</html>
