@extends('partials.layouts.master2')

@section('title', 'sigenhuh')
@section('sub-title', 'Editar Hospital' )
@section('pagetitle', 'Inicio')
@section('buttonTitle', 'Share')
@section('modalTarget', 'shareModal')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/air-datepicker/air-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/leaflet/leaflet.css') }}">
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('hospitales.update', $hospital) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('hospitales.form', ['hospital' => $hospital])
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
