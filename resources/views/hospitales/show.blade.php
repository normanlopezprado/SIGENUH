
    <h1>{{ $hospital->name }}</h1>

    @if($hospital->logo_url)
        <img src="{{ $hospital->logo_url }}" alt="logo" style="height:100px" class="mb-3">
    @endif
    @if($hospital->icon_url)
        <img src="{{ $hospital->icon_url }}" alt="icon" style="height:32px" class="mb-3">
    @endif
    <p><strong>Dirección:</strong> {{ $hospital->address }}</p>
    <p>{{ $hospital->description }}</p>

    @if(!is_null($hospital->latitude) && !is_null($hospital->longitude))
        <div id="map" style="height: 320px; border-radius: 8px;"></div>
        @push('styles')
            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css"/>
        @endpush
        @push('scripts')
            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const lat = {{ $hospital->latitude }};
                    const lng = {{ $hospital->longitude }};

                    const map = L.map('map').setView([lat, lng], 14);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19 }).addTo(map);
                    L.marker([lat, lng]).addTo(map).bindPopup(`{{ $hospital->name }}`).openPopup();
                });
            </script>
        @endpush
    @endif

    <div class="mt-3 d-flex gap-2">
        <a href="{{ route('hospitales.edit', $hospital) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('hospitales.index') }}" class="btn btn-secondary">Volver</a>
    </div>
