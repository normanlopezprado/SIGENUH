
<div class="mb-3">
  <label class="form-label">Nombre</label>
  <input type="text" name="name" class="form-control" required
         value="{{ old('name', $service->name) }}">
@error('name')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">Abreviatura</label>
    <input type="text" name="abbreviation" class="form-control"
           value="{{ old('abbreviation', $service->abbreviation) }}">
</div>

<div class="mb-3">
    <label class="form-label">Categoría</label>
    <input type="text" name="category" class="form-control"
           value="{{ old('category', $service->category) }}">
</div>

<div class="mb-3">
    <label class="form-label">Descripción</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $service->description) }}</textarea>
</div>

<div class="mb-3 form-check">
    <input type="hidden" name="status" value="0">
    <input type="checkbox" name="status" class="form-check-input" value="1"
        {{ old('status', $service->status) ? 'checked' : '' }}>
    <label class="form-check-label">Activo</label>
</div>

<button class="btn btn-primary">Guardar</button>
<a href="{{ route('hospital-services.index') }}" class="btn btn-secondary">Cancelar</a>
