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
                                    <input type="text" class="form-control form-control-icon" id="name" name="name" value="{{ old('name', $service->name) }}" required>
                                    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-6">
                                <label for="abbreviation" class="form-label">Abreviatura</label>
                                    <input type="text" class="form-control form-control-icon" id="abbreviation" name="abbreviation" value="{{ old('abbreviation', $service->abbreviation) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label">Categoría</label>
                                    <input type="text" class="form-control form-control-icon" id="category" name="category" placeholder="Hombres / Mujeres / Menores" value="{{ old('category', $service->category) }}" required>
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label">Descripción</label>
                                <div class="form-icon">
                                    <i class="ri-chat-1-line text-muted"></i>
                                    <textarea name="description" id="description" class="form-control form-control-icon" rows="3">{{ old('description', $service->description) }}</textarea>
                                </div>
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('hospital-services.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
