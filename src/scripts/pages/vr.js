const videos = {
    "1": [
        "https://i.imgur.com/DMYmFJD.mp4",
        "https://i.imgur.com/klAVGkb.mp4",
        "https://i.imgur.com/uspzUc4.mp4",
        "https://i.imgur.com/bKLtpUD.mp4",
        "https://i.imgur.com/olKMSi5.mp4",
        "https://i.imgur.com/NUAt9mH.mp4",
        "https://i.imgur.com/3tVqriy.mp4",
        "https://i.imgur.com/kOgH8r7.mp4",
        "https://i.imgur.com/fVdPvwJ.mp4",
        "https://i.imgur.com/nOYoqjh.mp4",
        "https://i.imgur.com/g9Olyp3.mp4",
        "https://i.imgur.com/Eip24fK.mp4"
    ],
    "-1": [
        "https://i.imgur.com/Gn0griF.mp4",
        "https://i.imgur.com/Vag1fWT.mp4",
        "https://i.imgur.com/UhKH3IO.mp4",
        "https://i.imgur.com/Q66dDUz.mp4",
        "https://i.imgur.com/KYdIIwU.mp4",
        "https://i.imgur.com/vxNqQGo.mp4",
        "https://i.imgur.com/jJO7ot4.mp4",
        "https://i.imgur.com/doZrSTd.mp4",
        "https://i.imgur.com/OXYaMvB.mp4",
        "https://i.imgur.com/u19lgZU.mp4",
        "https://i.imgur.com/fbhRXuL.mp4",
        "https://i.imgur.com/cSMMa6E.mp4"
    ]
};

const video = document.querySelector('.js-video');
const source = document.querySelector('.js-source');
const modal = document.querySelector('.vr__modal');
const loader = document.querySelector('.vr__loader');

let currentLocation = 0;
let inAnimation = false;
let videoLoaded = false;

const updateModalUI = (locId) => {
    locId--;
    document.getElementById("js-vr-modal-name").innerText = LOCATIONS[locId].name;
    document.getElementById("js-vr-modal-desc").innerText = LOCATIONS[locId].desc;
    imagesHTML = "";
    for (let i = 0; i < LOCATIONS[locId].images.length; i++) {
        imagesHTML += `<img class="vrslider__img" src="${LOCATIONS[locId].images[i]}" alt="${LOCATIONS[locId].name}">`;
    }
    document.getElementById("js-vr-modal-images").innerHTML = imagesHTML;
    document.getElementById("js-vr-modal-progress").innerText = `${locId + 1}/${LOCATIONS.length}`;
};

const switchLocation = async (increment) => {
    if (inAnimation) return;

    loaderFadeIn();

    inAnimation = true;
    modal.classList.remove('show');
    const step = currentLocation + increment;
    window.history.replaceState({}, document.title, `?step=${step}`);

    currentLocation += increment;

    if (currentLocation > 0 && currentLocation <= LOCATIONS.length) {
        updateModalUI(currentLocation);
    }

    const url = videos[increment][currentLocation - Math.max(0, increment)];

    var xhr = new XMLHttpRequest();
    xhr.open("GET", url, true);
    xhr.responseType = "arraybuffer";

    xhr.onload = function (oEvent) {

        var blob = new Blob([oEvent.target.response], { type: "video/mp4" });

        video.src = URL.createObjectURL(blob);

        video.play();

        loaderFadeOut();
    };

    // xhr.onprogress = function (oEvent) {
    //     if (oEvent.lengthComputable) {
    //         var percentComplete = oEvent.loaded / oEvent.total;
    //         console.log(percentComplete);
    //     }
    // };

    xhr.send();
};

const getPosterFor = (locId) => {
    return `https://cdn.arnocellarier.fr/s/iut/msm/vv/1080/photo%20(${1 + locId * 90}).webp`;
};

const loaderFadeIn = () => {
    loader.classList.add('show');
    loader.style.display = 'grid';
    setTimeout(() => {
        loader.style.display = 'grid';
    }, 200);
};

const loaderFadeOut = () => {
    loader.classList.remove('show');
    setTimeout(() => {
        loader.style.display = 'none';
    }, 200);
};

video.addEventListener('ended', () => {
    inAnimation = false;
    source.src = "";
    video.load();

    if (currentLocation <= LOCATIONS.length) {
        modal.classList.add('show');
    }
}, false);

video.addEventListener('loadeddata', function () {
    video.poster = getPosterFor(currentLocation);
}, false);

document.addEventListener('keydown', (e) => {
    if (e.keyCode === 37) {
        switchLocation(-1);
    } else if (e.keyCode === 39) {
        switchLocation(1);
    }
});

document.addEventListener('DOMContentLoaded', () => {
    // prévenir que la visite consomme beaucoup de données
    var connection = navigator.connection || navigator.mozConnection || navigator.webkitConnection;
    const lotOfDataMessage = "Attention, la visite virtuelle peut consommer beaucoup de données, des frais de connexion peuvent s'appliquer. \n\nTaille estimée : 40 Mo. \n\nVoulez-vous continuer ?";

    if (connection) {
        if (connection.type === 'cellular' || connection.saveData) {
            if (localStorage.getItem('vr__data_confirmed') != 1 && !confirm(lotOfDataMessage)) {
                return history.back();
            } else {
                localStorage.setItem('vr__data_confirmed', 1);
            }
        }
    }

    const urlParams = new URLSearchParams(window.location.search);
    var step = urlParams.get('step') || 1;

    if (step < 1 || step > LOCATIONS.length) {
        step = 1;
    }

    currentLocation = parseInt(step) - 1;
    video.poster = getPosterFor(currentLocation);
    switchLocation(1);
    updateModalUI(currentLocation);
    modal.classList.add('show');
});