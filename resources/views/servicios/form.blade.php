    <div class="row g-4">
        <div class="col-12 col-lg-6">
            <div class="card h-100 mb-0">
                <div class="card-header">
                    <h5 class="card-title mb-0">Servicio</h5>
                </div>
                <div class="card-body">
                        <div class="col g-1">
                            <div class="col-md-12 form-floating form-label">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del servicio" value="{{ old('name', $service->name) }}" required>
                                <label for="name" class="form-label">Nombre del servicio</label>
                                @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-12 form-floating form-label">
                                <input type="text" class="form-control form-control-icon" id="abbreviation" name="abbreviation" placeholder="Nombre del servicio" value="{{ old('abbreviation', $service->abbreviation) }}">
                                <label for="abbreviation" class="form-label">Abreviatura</label>

                            </div>
                            <div class="col-md-12 form-floating form-label">
                                <input type="text" class="form-control form-control-icon" id="category" name="category" placeholder="Hombres / Mujeres / Menores" value="{{ old('category', $service->category) }}" required>
                                <label for="category" class="form-label">Hombres / Mujeres / Menores</label>

                            </div>
                            <div class="col-md-12 form-label">
                                <label for="description" class="form-label">Descripción</label>
                                <textarea name="description" id="description" class="form-control form-control-icon" rows="3">{{ old('description', $service->description) }}</textarea>
                            </div>
                        </div>
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('servicios.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
