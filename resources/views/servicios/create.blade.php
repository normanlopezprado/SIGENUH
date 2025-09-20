    @extends('partials.layouts.master2')

    @section('title', 'SIGENUH')
    @section('sub-title', 'Nuevo servicio' )
    @section('pagetitle', 'Inicio')
    @section('buttonTitle', 'Share')
    @section('modalTarget', 'shareModal')

    @section('css')
        <link rel="stylesheet" href="{{ asset('assets/libs/air-datepicker/air-datepicker.css') }}">
    @endsection


    @section('content')
        <form method="POST" action="{{ route('servicios.store') }}">
            @csrf
            @include('servicios.form', ['service' => new \App\Models\Service()])
        </form>
    @endsection
    @section('js')

        <!-- Air Datepicker js -->
        <script src="{{ asset('assets/libs/air-datepicker/air-datepicker.js') }}"></script>

        <!-- Form-layout init -->
        <script src="{{ asset('assets/js/form/form-layout.init.js') }}"></script>

        <!-- App js -->
        <script type="module" src="{{ asset('assets/js/app.js') }}"></script>
    @endsection
