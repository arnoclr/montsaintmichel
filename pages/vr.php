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

    // preload images
    const images = [];
    for (let i = 1; i <= IMAGES_NUMBER; i++) {
        const img = new Image();
        img.src = BASE_URL + `photo (${i}).webp`;
        images.push(img);
    }

    var i = 0;
    var slidesToPass = 30;
    var stopNextSlide;

    const nextSlide = () => {
        mainImg.src = images[i].src;
        i++;
        slidesToPass--;

        if(slidesToPass == 0) {
            slidesToPass = 30;
            clearInterval(stopNextSlide);
        }
    }

    const nextLocation = () => {
        stopNextSlide = setInterval(nextSlide, 1000/24);
    }
</script>