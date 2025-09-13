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
                                <div class="form-icon">
                                    <i class="ri-user-line text-muted"></i>
                                    <input type="text" class="form-control form-control-icon" id="name" name="name" value="{{ old('name', $service->name) }}" required>
                                    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="abbreviation" class="form-label">Abreviatura</label>
                                <div class="form-icon">
                                    <i class="ri-scissors-cut-line text-muted"></i>
                                    <input type="text" class="form-control form-control-icon" id="abbreviation" name="abbreviation" placeholder="Abreviatura" value="{{ old('abbreviation', $service->abbreviation) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="category" class="form-label">Categoría</label>
                                <div class="form-icon">
                                    <i class="ri-focus-line text-muted"></i>
                                    <input type="text" class="form-control form-control-icon" id="category" name="category" placeholder="Categoría" value="{{ old('category', $service->category) }}" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <label for="description" class="form-label">Descripción</label>
                                <div class="form-icon">
                                    <i class="ri-chat-1-line text-muted"></i>
                                    <textarea name="description" id="description" class="form-control form-control-icon" rows="3">{{ old('description', $service->description) }}</textarea>

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check mb-4">
                                    <input type="hidden" name="status" value="0">
                                    <input type="checkbox" id="status" name="status" class="form-check-input" value="1"
                                        {{ old('status', $service->status) ? 'checked' : '' }}>
                                    <label for="status" class="form-check-label">Activo</label>
                                </div>
                            </div>
                        </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('hospital-services.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </div>
        </div>
    </div>






