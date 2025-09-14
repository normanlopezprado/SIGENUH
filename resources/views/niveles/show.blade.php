
    <h1>{{ $nivel->name }}</h1>
    <p><strong>Estado:</strong> {{ $nivel->status ? 'Activo' : 'Inactivo' }}</p>
    <p>{{ $nivel->description }}</p>

    <a href="{{ route('niveles.index') }}" class="btn btn-secondary mt-2">Volver</a>
