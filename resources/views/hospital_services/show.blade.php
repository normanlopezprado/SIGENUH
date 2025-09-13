
    <h1>{{ $hospital_service->name }}</h1>
    <p><strong>Abrev.:</strong> {{ $hospital_service->abbreviation }}</p>
    <p><strong>Categoría:</strong> {{ $hospital_service->category }}</p>
    <p><strong>Estado:</strong> {{ $hospital_service->status ? 'Activo' : 'Inactivo' }}</p>
    <p>{{ $hospital_service->description }}</p>

    <a href="{{ route('hospital-services.index') }}" class="btn btn-secondary">Volver</a>

