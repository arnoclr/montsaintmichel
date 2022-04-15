<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" integrity="sha256-BPfK9M5v34c2XP6p0cxVz1mUQLst0gTLk0mlc7kuodA=" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js" integrity="sha256-yDc0eil8GjWFKqN1OSzHSVCiuGghTosZCcRje4tj7iQ=" crossorigin="anonymous"></script>

<div id="map"></div>
<div class="map-modal"></div>

<script>
    var map = L.map('map').setView([
        <?= $_GET['lat'] ? htmlspecialchars($_GET['lat']) : 48.6360 ?>,
        <?= $_GET['lng'] ? htmlspecialchars($_GET['lng']) : -1.5116 ?>
    ], <?= $_GET['zoom'] ? htmlspecialchars($_GET['zoom']) : 18 ?>);

    var mapModal = document.querySelector(".map-modal");

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    function writeUrl() {
        const zoom = map.getZoom()
        const pos = map.getCenter()
        window.history.replaceState({}, document.title, '/map?zoom=' + zoom + '&lat=' + pos.lat + '&lng=' + pos.lng)
    }

    function loadPlaceDetails(id) {
        fetch('/ajax/map?action=details&id=' + id)
            .then(response => response.json())
            .then(data => {
                console.log(data)
            })
    }

    function openPlace(id, event) {
        map.setView(event.target.getLatLng(), map.getZoom())
        loadPlaceDetails(id)
        mapModal.classList.add('map-modal--open')
    }

    map.on('moveend', writeUrl);
    map.on('zoomend', writeUrl);

    fetch('/ajax/map?action=all')
    .then(res => res.json())
    .then(data => {
        data.places.forEach(place => {
            var marker = L.marker([place.lat, place.lng], {
                title: place.nom,
                riseOnHover: true
            })
                .on('click', e => { openPlace(place.id, e) })
                .addTo(map);
        });
    });
</script>