/*
Template Name: Herozi - Admin & Dashboard Template
Author: SRBThemes
Contact: sup.srbthemes@gmail.com
File: Leaflet-maps File
*/

// Function to initialize maps
function initializeMap(mapId, coords) {
    const map = L.map(mapId).setView(coords, 13);
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    return map;
}

// Initialize maps
const latInput = document.getElementById('latitude');
const lngInput = document.getElementById('longitude');
const map1 = initializeMap('leaflet_map', [14.856713, -91.512105]);

(function () {
    if (!map1) return;

    var currentMarker = null;
    var latInput = document.getElementById('latitude');
    var lngInput = document.getElementById('longitude');

    // Función para actualizar inputs
    function updateInputs(lat, lng) {
        if (latInput) latInput.value = lat.toFixed(6);
        if (lngInput) lngInput.value = lng.toFixed(6);
    }

    // --- función para mover marcador y mapa ---
    function moveMarkerTo(lat, lng, zoom) {
        if (currentMarker) {
            map1.removeLayer(currentMarker);
        }
        currentMarker = L.marker([lat, lng], { draggable: true }).addTo(map1);
        updateInputs(lat, lng);

        currentMarker.bindPopup(
            "Lat: " + lat.toFixed(6) + "<br>Lng: " + lng.toFixed(6)
        ).openPopup();

        currentMarker.on('dragend', function (ev) {
            var pos = ev.target.getLatLng();
            updateInputs(pos.lat, pos.lng);
            currentMarker.setPopupContent(
                "Lat: " + pos.lat.toFixed(6) + "<br>Lng: " + pos.lng.toFixed(6)
            ).openPopup();
        });

        if (zoom) {
            map1.setView([lat, lng], zoom);
        } else {
            map1.panTo([lat, lng]);
        }
    }

    // --- Al cargar: ¿hay valores en inputs? ---
    (function initFromInputs() {
        var lat = parseFloat(latInput && latInput.value);
        var lng = parseFloat(lngInput && lngInput.value);

        if (!isNaN(lat) && !isNaN(lng)) {
            // Si hay valores → centrar ahí
            moveMarkerTo(lat, lng, 16); // 16 = zoom inicial, ajusta a gusto
        } else {
            // Si no hay valores → se queda en coordenada inicial del map1
            console.log("Inputs vacíos, se usa la posición inicial del mapa.");
        }
    })();

    // --- Click en el mapa: crear/mover marcador ---
    map1.on('click', function (e) {
        moveMarkerTo(e.latlng.lat, e.latlng.lng);
    });
})();

// Custom icon setup
const LeafIcon = L.Icon.extend({
    options: {
        shadowUrl: 'https://leafletjs.com/examples/custom-icons/leaf-shadow.png',
        iconSize: [38, 95],
        shadowSize: [50, 64],
        iconAnchor: [22, 94],
        shadowAnchor: [4, 62],
        popupAnchor: [-3, -76]
    }
});

const icons = {
    green: new LeafIcon({ iconUrl: 'https://leafletjs.com/examples/custom-icons/leaf-green.png' }),
    red: new LeafIcon({ iconUrl: 'https://leafletjs.com/examples/custom-icons/leaf-red.png' }),
    orange: new LeafIcon({ iconUrl: 'https://leafletjs.com/examples/custom-icons/leaf-orange.png' })
};


