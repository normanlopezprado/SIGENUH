@extends('partials.layouts.master2')

@section('title', 'sigenhuh')
@section('sub-title', 'Editar Servicio' )
@section('pagetitle', 'Home')
@section('buttonTitle', 'Share')
@section('modalTarget', 'shareModal')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/air-datepicker/air-datepicker.css') }}">
@endsection


@section('content')
    <form method="POST" action="{{ route('hospital-services.update', $hospitalService) }}">
        @csrf
        @method('PUT')
        @include('hospital_services.form', ['service' => $hospitalService])
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
