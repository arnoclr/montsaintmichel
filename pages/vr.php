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
    const BASE_URL = "https://cdn.arnocellarier.fr/s/iut/msm/vv/";
    const IMAGES_NUMBER = 361;
    const mainImg = document.querySelector('.js-vr-3D-img');
    const IMAGES_GAP = 30; // nombre d'images entre 2 lieux

    // preload images
    const images = [];
    for (let i = 1; i <= IMAGES_NUMBER; i++) {
        const img = new Image();
        img.src = BASE_URL + `photo (${i}).webp`;
        images.push(img);
    }

    const sleep = (milliseconds) => {
        return new Promise(resolve => setTimeout(resolve, milliseconds))
    }

    let currentLocation = 0;

    const switchLocation = async (increment) => {
        for (let i = 0; i <= IMAGES_GAP; i++) {
            let r = i/IMAGES_GAP;
            let diffToMiddle = Math.abs(r - 0.5) * 2.3;
            let ms = (1000/IMAGES_GAP /2) * ((diffToMiddle + 0.5)**2);
            await sleep(ms);
            let photoId = currentLocation*IMAGES_GAP + (i * increment) + 1;
            console.log(photoId);
            mainImg.src = BASE_URL + `photo (${photoId}).webp`;
        }
        currentLocation += increment;
    }
</script>