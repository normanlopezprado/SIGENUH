<div class="container">
    <h1>Crear Cama</h1>

    <form action="{{ route('beds.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="code" class="form-label">Código</label>
            <input type="text" name="code" id="code" class="form-control" value="{{ old('code') }}" required>
            @error('code') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-control">
                <option value="Disponible" {{ old('status') == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                <option value="Ocupada" {{ old('status') == 'Ocupada' ? 'selected' : '' }}>Ocupada</option>
            </select>
            @error('status') <div class="text-danger">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notas</label>
            <textarea name="notes" id="notes" class="form-control">{{ old('notes') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Servicio del piso (del hospital seleccionado)</label>
            <select name="hospital_floor_service_id" class="form-control" required>
                <option value="">— Seleccione —</option>
                @foreach($hfs as $row)
                    @php
                        $nivel = $row->hospitalFloor?->nivel?->name ?? 'Nivel';
                        $serv  = $row->service?->name ?? 'Servicio';
                    @endphp
                    <option value="{{ $row->id }}" @selected(old('hospital_floor_service_id')===$row->id)>
                        {{ $nivel }} — {{ $serv }}
                    </option>
                @endforeach
            </select>
            @error('hospital_floor_service_id')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-success">💾 Guardar</button>
        <a href="{{ route('beds.index') }}" class="btn btn-secondary">⬅️ Volver</a>
    </form>
</div>
