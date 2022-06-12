<main class="vr">
    <button onclick="window.history.back();" title="Retour" class="vr__back-button"><span class="material-icons-sharp">arrow_back</span></button>

    <aside class="vr__loader" style="display: none;">
        <i class="loader medium white"></i>
    </aside>

    <video class="vr__3D js-video" poster="https://cdn.arnocellarier.fr/s/iut/msm/vv/1080/photo%20(1).webp" autoplay muted disablepictureinpicture>
        <source class="js-source" src="" type="video/mp4">
    </video>

    <div class="vr__modal">
        <div class="vr__modal-header">
            <button class="vr__modal-header-button material-icons-sharp hide-on-large" onclick="switchLocation(-1);">
                arrow_back
            </button>
            <h2 id="js-vr-modal-name" class="vr__modal-header-title">Appuyez pour commencer</h2>
            <span id="js-vr-modal-progress" class="vr__modal-header-progress"></span>
            <button class="vr__modal-header-button material-icons-sharp hide-on-large" onclick="switchLocation(1);">
                arrow_forward
            </button>
        </div>
        <p id="js-vr-modal-desc">La chapelle Saint-Aubert est une chapelle catholique. Elle est située sur une
            excroissance rocheuse à l'extrémité nord-ouest du Mont-Saint-Michel.</p>

        <div id="js-vr-modal-images" class="vrslider js-draggable">
        </div>
    </div>

    <div class="vr__buttons hide-on-small">
        <button class="vr__buttons-button material-icons-sharp" onclick="switchLocation(-1);" title="Naviguer vers l'endroit précédent">navigate_before
        </button>
        <button id="skip-content" class="vr__buttons-button material-icons-sharp" onclick="switchLocation(1);" title="Naviguer vers l'endroit suivant">navigate_next
        </button>
    </div>

    <a href="javascript:alert('Images &copy; Google Earth Studio. Landsat / Copernicus, Data SIO, NOAA, U.S. Navy, NGA, GEBCO, TerraMetrics');" class="vr__attribution">&copy; Google Earth :: informations</a>
</main>

<script>
    const LOCATIONS = [{
            "name": `<?= t('vr.step1.name') ?>`,
            "lat": `48,63653966`,
            "lng": `-1,513198375`,
            "height": `19`,
            "desc": `<?= t('vr.step1.desc') ?>`,
            "images": ["https://upload.wikimedia.org/wikipedia/commons/c/cc/Chapelle_Saint-Aubert%2C_Mont_Saint-Michel_%28juillet_2015%29.JPG"],
            "link": `https://fr.wikipedia.org/wiki/Chapelle_Saint-Aubert_du_Mont-Saint-Michel`,
        },
        {
            "name": `<?= t('vr.step2.name') ?>`,
            "lat": `48,63554655`,
            "lng": `-1,512917574`,
            "height": `19`,
            "desc": `<?= t('vr.step2.desc') ?>`,
            "images": ["https://cdn.pixabay.com/photo/2016/04/09/12/05/tower-1317954_1280.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Tour_St._Gabriel.jpg/1280px-Tour_St._Gabriel.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8e/2017-04_Mont_Saint-Michel_tour_Gabriel.jpg/1280px-2017-04_Mont_Saint-Michel_tour_Gabriel.jpg"],
            "link": `http://www.le-mont-saint-michel.org/livre44.htm`,
        },
        {
            "name": `<?= t('vr.step3.name') ?>`,
            "lat": `48,63509581`,
            "lng": `-1,511279047`,
            "height": `19`,
            "desc": `<?= t('vr.step3.desc') ?>`,
            "images": ["https://i.imgur.com/WZuF4AD.jpg"],
            "link": `https://www.ouest-france.fr/normandie/avranches-50300/le-mont-saint-michel-un-pont-levis-tout-neuf-la-porte-du-roy-1746751`,
        },
        {
            "name": `<?= t('vr.step4.name') ?>`,
            "lat": `48,63611116`,
            "lng": `-1,5096371`,
            "height": `21`,
            "desc": `<?= t('vr.step4.desc') ?>`,
            "images": ["https://i.imgur.com/T2vkXcf.jpg", "https://i.imgur.com/54N1TDN.jpg"],
            "link": `https://www.messortiesculture.com/abbaye-du-mont-saint-michel-la-bastille-des-mers-et-ses-cachots-4310`,
        },
        {
            "name": `<?= t('vr.step5.name') ?>`,
            "lat": `48,63615858`,
            "lng": `-1,510067564`,
            "height": `20`,
            "desc": `<?= t('vr.step5.desc') ?>`,
            "images": ["https://live.staticflickr.com/2211/32769440562_46208920fd_b.jpg", "https://i.imgur.com/sNmv7Xx.jpg", "https://i.imgur.com/IFj7XDC.jpg"],
            "link": `https://fr.wikipedia.org/wiki/%C3%89glise_Saint-Pierre_du_Mont-Saint-Michel`,
        },
        {
            "name": `<?= t('vr.step6.name') ?>`,
            "lat": `48,63630773`,
            "lng": `-1,510221788`,
            "height": `19`,
            "desc": `<?= t('vr.step6.desc') ?>`,
            "images": ["https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Stone_houses_of_the_medieval_town_%28village%29_%2832080778114%29.jpg/1024px-Stone_houses_of_the_medieval_town_%28village%29_%2832080778114%29.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Museum_at_the_Logis_Tiphaine_Raguenel_-_rear_facade.JPG/1024px-Museum_at_the_Logis_Tiphaine_Raguenel_-_rear_facade.JPG", "https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Museum_at_the_Logis_Tiphaine_Raguenel_%28Mont-Saint-Michel%29_01.JPG/1024px-Museum_at_the_Logis_Tiphaine_Raguenel_%28Mont-Saint-Michel%29_01.JPG", "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Face_est_du_logis_Tiphaine_Raguenel_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg/1024px-Face_est_du_logis_Tiphaine_Raguenel_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Wiki.Vojvodina_X_%C5%BDitni_magacin_i_kotarka_195.jpg/1024px-Wiki.Vojvodina_X_%C5%BDitni_magacin_i_kotarka_195.jpg"],
            "link": `https://www.ot-montsaintmichel.com/patrimoine-culturel/logis-tiphaine/`,
        },
        {
            "name": `<?= t('vr.step7.name') ?>`,
            "lat": `48,63661125`,
            "lng": `-1,510553091`,
            "height": `19`,
            "desc": `<?= t('vr.step7.desc') ?>`,
            "images": ["https://i.imgur.com/Yarx89G.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Jardins_de_la_Croix_de_J%C3%A9rusalem_%28Le_Mont-Saint-Michel%29.jpg/682px-Jardins_de_la_Croix_de_J%C3%A9rusalem_%28Le_Mont-Saint-Michel%29.jpg", ],
            "link": ``,
        },
        {
            "name": `<?= t('vr.step8.name') ?>`,
            "lat": `48,63687937`,
            "lng": `-1,510398999`,
            "height": `19`,
            "desc": `<?= t('vr.step8.desc') ?>`,
            "images": ["https://i.imgur.com/J5Swk7c.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Touristes_sur_la_Tour_du_Nord_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg/1024px-Touristes_sur_la_Tour_du_Nord_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg", "https://i0.wp.com/www.histoire-normandie.fr/wp-content/uploads/2018/05/laurid-31.jpg?ssl=1"],
            "link": `https://www.ot-montsaintmichel.com/je-decouvre/visiter-le-mont-saint-michel/je-visite-le-mont-saint-michel/le-village-et-les-remparts/ https://fr.wikipedia.org/wiki/Fortifications_du_Mont-Saint-Michel#Tour_Nord`,
        },
        {
            "name": `<?= t('vr.step9.name') ?>`,
            "lat": `48,63639035`,
            "lng": `-1,511547215`,
            "height": ``,
            "desc": `<?= t('vr.step9.desc') ?>`,
            "images": ["https://i.imgur.com/NPr1Lzb.jpg", "https://i.imgur.com/44g0CZH.jpg"],
            "link": `https://www.wikimanche.fr/Statue_de_saint_Michel_terrassant_le_dragon`,
        },
        {
            "name": `<?= t('vr.step10.name') ?>`,
            "lat": `48,63640318`,
            "lng": `-1,511631965`,
            "height": `19`,
            "desc": `<?= t('vr.step10.desc') ?>`,
            "images": ["https://i.imgur.com/27fyXk9.jpg", "https://i.imgur.com/9ajPNUG.jpg"],
            "link": `https://www.pariscityvision.com/fr/europe/france/mont-saint-michel/merveille`,
        },
        {
            "name": `<?= t('vr.step11.name') ?>`,
            "lat": `48,63626862`,
            "lng": `-1,511620593`,
            "height": `19`,
            "desc": `<?= t('vr.step11.desc') ?>`,
            "images": ["https://i.imgur.com/sz9svj4.jpg", "https://i.imgur.com/vCEwWmG.jpg", "https://cdn.pixabay.com/photo/2015/04/15/11/28/mont-saint-michel-723647_1280.jpg", "https://live.staticflickr.com/65535/50273953286_767c02547b_b.jpg"],
            "link": `https://fr.wikipedia.org/wiki/Abbaye_du_Mont-Saint-Michel#Clo%C3%AEtre_(1225-1228)`,
        }
    ]

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
    }

    const video = document.querySelector('.js-video');
    const source = document.querySelector('.js-source');
    const modal = document.querySelector('.vr__modal');
    const loader = document.querySelector('.vr__loader');

    let currentLocation = 0;
    let inAnimation = false;
    let videoLoaded = false;

    const updateModalUI = (locId) => {
        locId--
        document.getElementById("js-vr-modal-name").innerText = LOCATIONS[locId].name
        document.getElementById("js-vr-modal-desc").innerText = LOCATIONS[locId].desc
        imagesHTML = ""
        for (let i = 0; i < LOCATIONS[locId].images.length; i++) {
            imagesHTML += `<img class="vrslider__img" src="${LOCATIONS[locId].images[i]}" alt="${LOCATIONS[locId].name}">`
        }
        document.getElementById("js-vr-modal-images").innerHTML = imagesHTML
        document.getElementById("js-vr-modal-progress").innerText = `${locId + 1}/${LOCATIONS.length}`
    }

    const switchLocation = async (increment) => {
        if (inAnimation) return;

        inAnimation = true;
        modal.classList.remove('show');
        const step = currentLocation + increment;
        window.history.replaceState({}, document.title, `?step=${step}`);

        currentLocation += increment;

        if (currentLocation > 0 && currentLocation <= LOCATIONS.length) {
            updateModalUI(currentLocation);
        }

        source.src = videos[increment][currentLocation - Math.max(0, increment)];
        videoLoaded = false;
        video.load();
        video.play();

        setTimeout(() => {
            if (!videoLoaded) {
                loaderFadeIn();
            }
        }, 350);
    }

    const getPosterFor = (locId) => {
        return `https://cdn.arnocellarier.fr/s/iut/msm/vv/1080/photo%20(${1 + locId * 90}).webp`;
    }

    const loaderFadeIn = () => {
        loader.classList.add('show');
        loader.style.display = 'grid';
        setTimeout(() => {
            loader.style.display = 'grid';
        }, 200);
    }

    const loaderFadeOut = () => {
        loader.classList.remove('show');
        setTimeout(() => {
            loader.style.display = 'none';
        }, 200);
    }

    video.addEventListener('ended', () => {
        inAnimation = false;
        source.src = "";
        video.load();

        if (currentLocation <= LOCATIONS.length) {
            modal.classList.add('show');
        }
    }, false);

    video.addEventListener('loadeddata', function() {
        videoLoaded = true;
        loaderFadeOut();
        video.poster = getPosterFor(currentLocation);
    }, false);

    video.addEventListener('waiting', () => {
        if (videoLoaded) {
            setTimeout(() => {
                loaderFadeIn();
            }, 150);
        }
    })

    video.addEventListener('playing', () => {
        loaderFadeOut();
        setTimeout(() => {
            loaderFadeOut();
        }, 150);
    })

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
        const lotOfDataMessage = "Attention, la visite virtuelle peut consommer beaucoup de données, des frais de connexion peuvent s'appliquer. \n\nTaille estimée : 40 Mo. \n\nVoulez-vous continuer ?"

        if (connection) {
            if (connection.effectiveType === 'cellular') {
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
</script>