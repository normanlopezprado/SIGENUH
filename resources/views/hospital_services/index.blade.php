@extends('partials.layouts.master')

@section('title', 'sigenuh')

@section('sub-title', 'Servicios')
@section('pagetitle', 'Inicio')
@section('buttonTitle', 'Share')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/libs/air-datepicker/air-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/@yaireo/tagify/tagify.css') }}">
@endsection

@section('content')

    <div class="row g-4">
        <div class="col-12">
            <div class="card mb-0 h-100">
                <a href="{{ route('hospital-services.create') }}" class="btn btn-primary">Nuevo</a>
                <table class="data-table-basic table-hover align-middle table table-nowrap w-100">
                    <thead class="bg-light bg-opacity-30">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Abrev.</th>
                        <th>Categoría</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($services as $s)
                        <tr>
                            <td>{{ $s->id }}</td>
                            <td><a href="{{ route('hospital-services.show', $s) }}">{{ $s->name }}</a></td>
                            <td>{{ $s->abbreviation }}</td>
                            <td>{{ $s->category }}</td>
                            <td>{{ $s->status ? 'Activo' : 'Inactivo' }}</td>
                            <td class="d-flex gap-2">
                                <a class="btn btn-sm btn-warning" href="{{ route('hospital-services.edit', $s) }}">Editar</a>
                                <form method="POST" action="{{ route('hospital-services.destroy', $s) }}">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6">Sin registros</td></tr>
                    @endforelse
                    </tbody>
                </table>

            </div>
        </div>


    </div>

    @include('partials.social-share-modal')

@endsection

@section('js')

    <!-- Datatable js -->
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    <!-- Datatable init -->
    <script src="{{ asset('assets/js/table/datatable.init.js') }}"></script>
    <!-- App js -->
    <script type="module" src="{{ asset('assets/js/app.js') }}"></script>

@endsection




