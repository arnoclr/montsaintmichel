<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css" integrity="sha256-BPfK9M5v34c2XP6p0cxVz1mUQLst0gTLk0mlc7kuodA=" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js" integrity="sha256-yDc0eil8GjWFKqN1OSzHSVCiuGghTosZCcRje4tj7iQ=" crossorigin="anonymous"></script>

<button onclick="window.history.back();" title="Retour" class="map-back-button"><span class="material-icons-sharp">arrow_back</span></button>
<div id="map"></div>
<div class="map-modal"></div>
<button class="map-cta btn btn--primary btn--large"><?= t('map.route.btn') ?></button>

<div class="bottom-sheat js-itinerary-modal">
    <div class="empty-state">
        <p>Combien d'heures avez vous pour visiter le Mont ?</p>
        <select class="js-itinerary-select">
            <option value="" disabled selected hidden>Choisissez le nombre d'heures</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
        </select>
    </div>
</div>

<script>
    let map = L.map('map', {zoomControl: false}).setView([
        <?= isset($_GET['lat']) ? htmlspecialchars($_GET['lat']) : 48.6360 ?>,
        <?= isset($_GET['lng']) ? htmlspecialchars($_GET['lng']) : -1.5116 ?>
    ], <?= isset($_GET['zoom']) ? htmlspecialchars($_GET['zoom']) : 18 ?>);

    const mapModal = document.querySelector(".map-modal");
    const itineraryModal = document.querySelector(".js-itinerary-modal");
    const itineraryCTA = document.querySelector(".map-cta");
    const itinerarySelect = document.querySelector(".js-itinerary-select");

    let openedPlaceId = <?= isset($_GET['place']) ? htmlspecialchars($_GET['place']) : "null" ?>;
    let isOnMobile = window.innerWidth < 768;

    const symbols = {
        "attraction": "attractions",
        "nature": "park",
        "restaurant": "restaurant",
        "visite": "tour",
        "monument": "castle"
    }

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

    function itineraryPlaceDetails(place) {
        html = `<details class="itinerary-place">
            <summary>
                <div class="it__summary">
                    <div class="it__summary-text">
                        <i class="material-icons-sharp">${symbols[place.type]}</i>
                        <span>${place.nom}</span>
                    </div>
                    <span>est. ${place.duree_moyenne} min.</span>
                </div>
            </summary>
            <div class="itinerary-place__content">`
                
                html += `<div class="it__photos">`
                    place.photos.forEach(photo => {
                    html += `<img height="120" src="${photo}" alt="">`
                })
                html += `</div>`
                
                if (place.note) {
                    html += `<div class="it__review">
                        <span class="map-modal__review-note">${place.note}</span>
                        <div class="map-modal__stars">
                            <div class="map-modal__stars-row">
                                <i class="material-icons-sharp map-modal__star">star</i>
                                <i class="material-icons-sharp map-modal__star">star</i>
                                <i class="material-icons-sharp map-modal__star">star</i>
                                <i class="material-icons-sharp map-modal__star">star</i>
                                <i class="material-icons-sharp map-modal__star">star</i>
                            </div>
                            <div class="map-modal__stars-row map-modal__stars-row--filled" style="width: ${place.note * 20}%">
                                <i class="material-icons-sharp map-modal__star map-modal__star--filled">star</i>
                                <i class="material-icons-sharp map-modal__star map-modal__star--filled">star</i>
                                <i class="material-icons-sharp map-modal__star map-modal__star--filled">star</i>
                                <i class="material-icons-sharp map-modal__star map-modal__star--filled">star</i>
                                <i class="material-icons-sharp map-modal__star map-modal__star--filled">star</i>
                            </div>
                        </div>
                    </div>`
                }

                html += `<p class="it__desc">${place.description}</p>`

                if (place.pour == "enfants") {
                    html += `<p class="it__icon-table">
                        <i class="material-icons-sharp">escalator_warning</i>
                        <span>Adapté pour les enfants</span>
                    </p>`
                }

                if (place.horaires) {
                    html += `<div class="it__icon-table">
                        <i class="material-icons-sharp">access_time</i>
                        <span>${place.horaires.replaceAll('\n', '<br>')}</span>
                    </div>`
                }
                
            html += `</div>
        </details>`
        return html;
    }

    function itineraryPlacesHTML(places) {
        html = "";

        places.forEach(place => {
            html += itineraryPlaceDetails(place)
        })

        return html;
    }

    async function loadItinerary(duration) {
        itineraryModal.innerHTML = `<div style="display: grid; place-items: center; width: 100%; height: 100%;"><i class="loader medium"></i></div>`;

        const req = await fetch("/ajax/map?action=itinerary&h=" + new Date().getHours() + "&duree=" + duration);
        const places = await req.json();

        const html = itineraryPlacesHTML(places);
        itineraryModal.innerHTML = html;
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
        itineraryModal.classList.remove('bottom-sheat--open')
    });

    window.addEventListener('resize', () => {
        isOnMobile = window.innerWidth < 768;
    })

    itineraryCTA.addEventListener('click', () => {
        itineraryModal.classList.add('bottom-sheat--open')
    })

    itinerarySelect.addEventListener('change', () => {
        loadItinerary(itinerarySelect.value * 60)
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