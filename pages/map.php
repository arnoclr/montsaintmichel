<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" integrity="sha256-BPfK9M5v34c2XP6p0cxVz1mUQLst0gTLk0mlc7kuodA=" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js" integrity="sha256-yDc0eil8GjWFKqN1OSzHSVCiuGghTosZCcRje4tj7iQ=" crossorigin="anonymous"></script>

<button onclick="window.history.back();" title="Retour" class="map-back-button"><span class="material-icons-sharp">arrow_back</span></button>
<div id="map"></div>
<div class="map-modal"></div>
<button class="map-cta btn btn--primary btn--large"><?= t('map.route.btn') ?></button>

<script>
    var map = L.map('map', {zoomControl: false}).setView([
        <?= isset($_GET['lat']) ? htmlspecialchars($_GET['lat']) : 48.6360 ?>,
        <?= isset($_GET['lng']) ? htmlspecialchars($_GET['lng']) : -1.5116 ?>
    ], <?= isset($_GET['zoom']) ? htmlspecialchars($_GET['zoom']) : 18 ?>);

    var mapModal = document.querySelector(".map-modal");
    var openedPlaceId = <?= isset($_GET['place']) ? htmlspecialchars($_GET['place']) : "null" ?>;
    var isOnMobile = window.innerWidth < 768;

    L.control.zoom({
        position: 'topright'
    }).addTo(map);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    function writeUrl() {
        const zoom = map.getZoom()
        const pos = map.getCenter()
        var url = '/map?zoom=' + zoom + '&lat=' + pos.lat + '&lng=' + pos.lng
        if (openedPlaceId) {
            url += '&place=' + openedPlaceId
        }
        window.history.replaceState({}, document.title, url)
    }

    function htmlModal(data) {
        html = `<div class="map-modal__images">`
        data.photos.forEach(photo => {
            html += `<img class="map-modal__image" src="${photo}" alt="">`
        })
        html += `</div>
        <h1 class="map-modal__title">${data.nom}</h1>
        <div class="map-modal__review-box">
            <span class="map-modal__review-note">${data.note}</span>
            <div class="map-modal__stars">
                <div class="map-modal__stars-row">
                    <i class="material-icons-sharp map-modal__star">star</i>
                    <i class="material-icons-sharp map-modal__star">star</i>
                    <i class="material-icons-sharp map-modal__star">star</i>
                    <i class="material-icons-sharp map-modal__star">star</i>
                    <i class="material-icons-sharp map-modal__star">star</i>
                </div>
                <div class="map-modal__stars-row map-modal__stars-row--filled" style="width: ${data.note * 20}%">
                    <i class="material-icons-sharp map-modal__star map-modal__star--filled">star</i>
                    <i class="material-icons-sharp map-modal__star map-modal__star--filled">star</i>
                    <i class="material-icons-sharp map-modal__star map-modal__star--filled">star</i>
                    <i class="material-icons-sharp map-modal__star map-modal__star--filled">star</i>
                    <i class="material-icons-sharp map-modal__star map-modal__star--filled">star</i>
                </div>
            </div>
        </div>
        <p class="map-modal__description">${data.description}</p>
        <div class="map-modal__buttons">`

        if (data.vvid) {
            html += `<a href="/visite-virtuelle?step=${data.vvid}" class="map-modal__btn-vv btn btn--primary"><?= t('map.place.3d.btn') ?></a>`
        }

        html += `<a target="_blank" href="https://www.google.com/maps/search/?api=1&query=${data.lat},${data.lng}" class="map-modal__btn-web btn"><?= t('map.place.map.btn') ?></a>
        </div>
        <br><small class="map-modal__notice"><?= t('map.modal.notice') ?></small>
        `
        return html
    }

    async function loadPlaceDetails(id) {
        var res = await fetch('/ajax/map?action=details&id=' + id)
        var data = await res.json()
        return data;
    }

    function setMapView(id, event) {
        let pixelPosition = map.latLngToLayerPoint(event.target.getLatLng());
        if (isOnMobile) {
            pixelPosition.y += (window.innerHeight - 340) / 2
        } else {
            pixelPosition.x -= 350 / 2
        }
        let latLng = map.layerPointToLatLng(pixelPosition);
        map.panTo(latLng);
    }

    async function openPlace(id, event) {
        openedPlaceId = id;
        setMapView(id, event);
        var data = await loadPlaceDetails(id)
        mapModal.innerHTML = htmlModal(data)
        mapModal.classList.add('map-modal--open')
    }

    function closePlace() {
        openedPlaceId = null;
        mapModal.classList.remove('map-modal--open')
        writeUrl()
    }

    map.on('moveend', writeUrl);
    map.on('zoomend', writeUrl);
    map.on('click', () => {
        closePlace()
    });

    window.addEventListener('resize', () => {
        isOnMobile = window.innerWidth < 768;
    })

    if (openedPlaceId) {
        loadPlaceDetails(openedPlaceId).then(data => {
            openPlace(openedPlaceId, {
                target: {
                    getLatLng: () => {
                        return L.latLng(data.lat, data.lng)
                    }
                }
            })
        })
    }

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