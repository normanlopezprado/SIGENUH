
    <h1>{{ $service->name }}</h1>
    <p><strong>Abrev.:</strong> {{ $service->abbreviation }}</p>
    <p><strong>Categoría:</strong> {{ $service->category }}</p>
    <p><strong>Estado:</strong> {{ $service->status ? 'Activo' : 'Inactivo' }}</p>
    <p>{{ $service->description }}</p>

    <a href="{{ route('servicios.index') }}" class="btn btn-secondary">Volver</a>

