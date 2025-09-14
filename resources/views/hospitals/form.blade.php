
<div class="mb-3">
  <label class="form-label">Nombre</label>
  <input type="text" name="name" class="form-control" required
         value="{{ old('name', $hospital->name ?? '') }}">
@error('name')<div class="text-danger">{{ $message }}</div>@enderror
</div>

<div class="mb-3">
    <label class="form-label">Descripción</label>
    <textarea name="description" class="form-control" rows="3">{{ old('description', $hospital->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label class="form-label">Dirección</label>
    <input type="text" name="address" class="form-control"
           value="{{ old('address', $hospital->address ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Correo electrónico</label>
    <input type="email" name="email" class="form-control"
           value="{{ old('email', $hospital->email ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Teléfono</label>
    <input type="text" name="phone" class="form-control"
           value="{{ old('phone', $hospital->phone ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Logo (jpg, png, webp | máx 2MB)</label>
    <input type="file" name="logo" class="form-control" accept=".jpg,.jpeg,.png,.webp">
    @if(!empty($hospital?->logo_url))
        <div class="mt-2">
            <img src="{{ $hospital->logo_url }}" alt="logo" style="height:60px">
        </div>
    @endif
</div>
<div class="mb-3">
    <label class="form-label">Icon (ico, png, webp | máx 2MB)</label>
    <input type="file" name="icon" class="form-control" accept=".ico,.png,.webp">
    @if(!empty($hospital?->icon_url))
        <div class="mt-2">
            <img src="{{ $hospital->icon_url }}" alt="icon" style="height:32px">
        </div>
    @endif
</div>

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Latitud</label>
        <input type="number" step="any" name="latitude" id="latitude" class="form-control"
               value="{{ old('latitude', $hospital->latitude ?? '') }}">
    </div>
    <div class="col-md-6">
        <label class="form-label">Longitud</label>
        <input type="number" step="any" name="longitude" id="longitude" class="form-control"
               value="{{ old('longitude', $hospital->longitude ?? '') }}">
    </div>
</div>

{{-- Mapa Leaflet --}}
<div class="mt-3">
    <div class="col-12 col-lg-6">
        <div class="card mb-0 h-100">
            <div class="card-header">
                <h5 class="card-title mb-0">Mapa</h5>
            </div>
            <div class="card-body">
                <div class="w-100 min-h-320px" id="leaflet_map"></div>
            </div>
        </div>
    </div>
</div>

<button class="btn btn-primary mt-3">Guardar</button>
<a href="{{ route('hospitals.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
@section('js')

    <!-- leaflet-map js -->
    <script src="{{ asset('assets/libs/leaflet/leaflet.js') }}"></script>

    <!-- leaflet-map init -->
    <script src="{{ asset('assets/js/maps/leaflet-map.init.js') }}"></script>

@endsection


