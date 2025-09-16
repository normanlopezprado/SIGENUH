{{-- master_auth.blade.php  file  --}}
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <title>@yield('title', ' SIGENU - Sistema de gestión nutricional hospitalaria')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Norman López Prado - 1490-07-6356" name="author">
    <link rel="shortcut icon" href="{{ asset('assets/images/16650.png') }}">">

    <meta property="og:locale" content="es_ES">
    <meta property="og:type" content="article">
    <script>
        window.DEFAULT_VALUES = window.DEFAULT_VALUES || {};
        window.DEFAULT_VALUES.AUTH_LAYOUT = true;
    </script>
    @yield('css')
</head>

<body>
    @include('partials.header')
    @include('partials.sidebar')
    @include('partials.preloader')

    <!-- end page title -->

    @yield('content')

    @include('partials.vendor-scripts')

    @yield('js')

</body>

</html>
