<?php include "../includes/head.php"; ?>

<main class="vr">
    <img class="vr__3D js-vr-3D-img" src="https://cdn.arnocellarier.fr/s/iut/msm/vv/photo (1).webp" alt="Vue en 3D du Mont-Saint-Michel issue de Google Earth">
</main>

<style>
.vr {
    height: 100vh;
    width: 100vw;
}

.vr__3D {
    object-fit: cover;
    object-position: center;
    width: 100%;
    height: 100%;
}
</style>

<script>
    const BASE_URL = "https://cdn.arnocellarier.fr/s/iut/msm/vv/1080/";
    const IMAGES_GAP = 90; // nombre d'images entre 2 lieux
    const IMAGES_NUMBER = 12 * IMAGES_GAP + 1; // nombre d'images total
    const mainImg = document.querySelector('.js-vr-3D-img');

    // preload images
    const preloadSetOfImages = (from, to) => {
        for (let i = from; i <= to; i++) {
            let l = document.createElement('link')
            l.rel = 'preload'
            l.as = 'image'
            l.href = BASE_URL + `photo (${i}).webp`
            document.head.appendChild(l)
        }
    }

    preloadSetOfImages(1, 31);

    const sleep = (milliseconds) => {
        return new Promise(resolve => setTimeout(resolve, milliseconds))
    }

    let currentLocation = 0;
    let inAnimation = false;

    const switchLocation = async (increment) => {
        if (inAnimation) return;
        if (currentLocation + increment < 0) return;
        if (currentLocation + increment >= IMAGES_NUMBER) return;

        inAnimation = true;
        for (let i = 0; i <= IMAGES_GAP; i++) {
            let r = i/IMAGES_GAP;
            let diffToMiddle = Math.abs(r - 0.5) * 2.3;
            let ms = (1000/IMAGES_GAP /6) * ((diffToMiddle + 0.5)**6);
            await sleep(ms);
            let photoId = currentLocation*IMAGES_GAP + (i * increment) + 1;
            mainImg.src = BASE_URL + `photo (${photoId}).webp`;
        }

        currentLocation += increment;
        inAnimation = false;

        preloadSetOfImages(currentLocation * IMAGES_GAP, (currentLocation + 1) * IMAGES_GAP);
    }
    
    document.addEventListener('keydown', (e) => {
        if (e.keyCode === 37) {
            switchLocation(-1);
        } else if (e.keyCode === 39) {
            switchLocation(1);
        }
    });
</script>