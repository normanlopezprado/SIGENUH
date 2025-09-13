
    <h1>Servicios de Hospital</h1>

    <a href="{{ route('hospital-services.create') }}" class="btn btn-primary">Nuevo</a>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
        <tr>
            <th>ID</th><th>Nombre</th><th>Abrev.</th><th>Categoría</th><th>Estado</th><th></th>
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

    {{ $services->links() }}

