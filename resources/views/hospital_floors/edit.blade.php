@if(session('success'))
    <div class="alert alert-success mt-2">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul class="mb-0">
            @foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('hospital-floors.update') }}">
    @csrf

    <div class="mb-2">
        <label class="form-check">
            <input type="checkbox" id="checkAll" class="form-check-input">
            <span class="form-check-label">Seleccionar todos</span>
        </label>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2">
        @foreach($niveles as $n)
            <div class="col">
                <label class="form-check d-flex align-items-center gap-2 border rounded p-2">
                    <input
                        type="checkbox"
                        name="niveles[]"
                        class="form-check-input nivel-item"
                        value="{{ $n->id }}"
                        @checked(in_array($n->id, old('niveles', $seleccionados)))
                    >
                    <span>
            <strong>{{ $n->name }}</strong>
            @if(!empty($n->description))<br><small class="text-muted">{{ $n->description }}</small>@endif
          </span>
                </label>
            </div>
        @endforeach
    </div>

    <div class="mt-3 d-flex gap-2">
        <button class="btn btn-primary">Guardar asignación</button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const checkAll = document.getElementById('checkAll');
            const items = document.querySelectorAll('.nivel-item');

            checkAll?.addEventListener('change', (e) => {
                items.forEach(el => el.checked = e.target.checked);
            });
        });
    </script>
@endpush
