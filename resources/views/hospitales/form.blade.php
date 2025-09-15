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
                            <input type="text" class="form-control form-control-icon" id="name" name="name" value="{{ old('name', $hospital->name) }}" required>
                            @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="description" class="form-label">Descripción</label>
                        <div class="form-icon">
                            <i class="ri-chat-1-line text-muted"></i>
                            <textarea name="description" id="description" class="form-control form-control-icon" rows="3">{{ old('description', $hospital->description) }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label">Dirección</label>
                        <div class="form-icon">
                            <i class="ri-scissors-cut-line text-muted"></i>
                            <input type="text" class="form-control form-control-icon" id="address" name="address" placeholder="Dirección" value="{{ old('address', $hospital->address) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <div class="form-icon">
                            <i class="ri-focus-line text-muted"></i>
                            <input type="email" class="form-control form-control-icon" id="email" name="email" placeholder="Correo electrónico" value="{{ old('category', $hospital->email) }}" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Teléfono</label>
                        <div class="form-icon">
                            <i class="ri-focus-line text-muted"></i>
                            <input type="text" class="form-control form-control-icon" id="phone" name="phone" placeholder="Teléfono" value="{{ old('category', $hospital->phone) }}" >
                        </div>
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
                    <div class="mt-12">
                        <div class="col-12 col-lg-12">
                            <div class="card mb-0 h-100">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Mapa</h5>
                                </div>
                                <div class="card-body">
                                    <div class="min-h-320px" id="leaflet_map"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button class="btn btn-primary mt-3">Guardar</button>
                <a href="{{ route('hospitales.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
            </div>
        </div>
    </div>
</div>




@section('js')

    <!-- leaflet-map js -->
    <script src="{{ asset('assets/libs/leaflet/leaflet.js') }}"></script>

    <!-- leaflet-map init -->
    <script src="{{ asset('assets/js/maps/leaflet-map.init.js') }}"></script>

@endsection


