    <div class="row g-4">
        <div class="col-12 col-lg-6">
            <div class="card h-100 mb-0">
                <div class="card-header">
                    <h5 class="card-title mb-0">Servicios</h5>
                </div>
                <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nombre</label>
                                    <input type="text" class="form-control form-control-icon" id="name" name="name" value="{{ old('name', $nivel->name) }}" required>
                                    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('niveles.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
