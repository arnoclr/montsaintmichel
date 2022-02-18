<?php include "../includes/head.php"; ?>

<main class="vr">
    <img class="vr__3D js-vr-3D-img" src="https://cdn.arnocellarier.fr/s/iut/msm/vv/photo (1).webp" alt="Vue en 3D du Mont-Saint-Michel issue de Google Earth">

    <div class="vr__modal">
        <h2 id="js-vr-modal-name" class="vr__modal-title">Chapelle Saint-Aubert</h2>
        <p id="js-vr-modal-desc">La chapelle Saint-Aubert est une chapelle catholique. Elle est située sur une excroissance rocheuse à l'extrémité nord-ouest du Mont-Saint-Michel.</p>

        <div id="js-vr-modal-images" class="vrslider">
        </div>
    </div>
</main>

<a id="js-hashlink" style="display: none;" href=""></a>

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
    user-select: none;
    -webkit-user-drag: none;
    pointer-events: none;
}

.vr__modal {
    position: fixed;
    padding: 22px;
    top: 32px;
    right: 32px;
    width: 33%;
    min-width: 380px;
    max-width: calc(100% - 64px);
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    opacity: 0;
    transform: scale(0);
    transform-origin: 80% 20%;
    transition: transform .3s cubic-bezier(.72,.06,.56,1.15), opacity .3s ease;
}

.vr__modal.show {
    transform: scale(1);
    opacity: 1;
}

.vr__modal-title {
    font: 500 22px Montserrat, sans-serif;
}

.vrslider {
    margin-top: 22px;
    display: flex;
    align-items: center;
    height: 320px;
    width: 100%;
    overflow-x: scroll;
    border-radius: 6px;
}

.vrslider__img {
    height: 100%;
    width: auto;
}
</style>

<script>
    const BASE_URL = "https://cdn.arnocellarier.fr/s/iut/msm/vv/1080/";
    const IMAGES_GAP = 90; // nombre d'images entre 2 lieux
    const IMAGES_NUMBER = 12 * IMAGES_GAP + 1; // nombre d'images total
    const mainImg = document.querySelector('.js-vr-3D-img');

    const LOCATIONS = [
        {
            "name": "Chapelle Saint-Aubert",
            "lat": "48,63653966",
            "lng": "-1,513198375",
            "height": "19",
            "desc": "La chapelle Saint-Aubert est une chapelle catholique. Elle est située sur une excroissance rocheuse à l'extrémité nord-ouest du Mont-Saint-Michel.",
            "images": ["https://upload.wikimedia.org/wikipedia/commons/c/cc/Chapelle_Saint-Aubert%2C_Mont_Saint-Michel_%28juillet_2015%29.JPG"],
            "link": "https://fr.wikipedia.org/wiki/Chapelle_Saint-Aubert_du_Mont-Saint-Michel",
        },
        {
            "name": "La Tour Gabriel",
            "lat": "48,63554655",
            "lng": "-1,512917574",
            "height": "19",
            "desc": "Cette tour était à l'époque utilisée pour défendre l'abbaye. Elle dispose à l'intérieur de ses murs larges et épais de multiples canons afin de protéger le côté ouest de l'abbaye.",
            "images": ["https://cdn.pixabay.com/photo/2016/04/09/12/05/tower-1317954_1280.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Tour_St._Gabriel.jpg/1280px-Tour_St._Gabriel.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8e/2017-04_Mont_Saint-Michel_tour_Gabriel.jpg/1280px-2017-04_Mont_Saint-Michel_tour_Gabriel.jpg"],
            "link": "http://www.le-mont-saint-michel.org/livre44.htm",
        },
        {
            "name": "Entrée du village",
            "lat": "48,63509581",
            "lng": "-1,511279047",
            "height": "19",
            "desc": "La porte d’entrée principale du Mont est la plus ancienne porte construite connue à ce jour. Elle était protégée par un pont-levis. La porte du roi est accompagnée par la porte du boulevard et la porte de l’avancée.",
            "images": [],
            "link": "https://www.ouest-france.fr/normandie/avranches-50300/le-mont-saint-michel-un-pont-levis-tout-neuf-la-porte-du-roy-1746751",
        },
        {
            "name": "Les Cachots",
            "lat": "48,63611116",
            "lng": "-1,5096371",
            "height": "21",
            "desc": "Le Mont-Saint-Michel a servi de prison pendant un moment, ces cachots lui permettant de déporter des prisoniers. Louis XI qui fait installer cage de bois et de fer suspendue sous une voûte.",
            "images": [],
            "link": "https://www.messortiesculture.com/abbaye-du-mont-saint-michel-la-bastille-des-mers-et-ses-cachots-4310",
        },
        {
            "name": "Église Saint-Pierre du Mont-Saint-Michel",
            "lat": "48,63615858",
            "lng": "-1,510067564",
            "height": "20",
            "desc": "L'église Saint-Pierre est un édifice catholique. Elle se situe à mi-chemin de la Grand'rue et s'appuie à l'ouest contre le rocher.",
            "images": ["https://live.staticflickr.com/2211/32769440562_46208920fd_b.jpg"],
            "link": "https://fr.wikipedia.org/wiki/%C3%89glise_Saint-Pierre_du_Mont-Saint-Michel",
        },
        {
            "name": "Logis Tiphaine",
            "lat": "48,63630773",
            "lng": "-1,510221788",
            "height": "19",
            "desc": "Cette demeure historique montre la vie d'un chevalier du Moyen-Âge, avec son équipements, son mobilier, le cabinet d'astrologie de Tiphaine de Raguenel et l'armure du chevalier Bertrand Du Guesclin.",
            "images": ["https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Stone_houses_of_the_medieval_town_%28village%29_%2832080778114%29.jpg/1024px-Stone_houses_of_the_medieval_town_%28village%29_%2832080778114%29.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Museum_at_the_Logis_Tiphaine_Raguenel_-_rear_facade.JPG/1024px-Museum_at_the_Logis_Tiphaine_Raguenel_-_rear_facade.JPG", "https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Museum_at_the_Logis_Tiphaine_Raguenel_%28Mont-Saint-Michel%29_01.JPG/1024px-Museum_at_the_Logis_Tiphaine_Raguenel_%28Mont-Saint-Michel%29_01.JPG", "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Face_est_du_logis_Tiphaine_Raguenel_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg/1024px-Face_est_du_logis_Tiphaine_Raguenel_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Wiki.Vojvodina_X_%C5%BDitni_magacin_i_kotarka_195.jpg/1024px-Wiki.Vojvodina_X_%C5%BDitni_magacin_i_kotarka_195.jpg"],
            "link": "https://www.ot-montsaintmichel.com/patrimoine-culturel/logis-tiphaine/",
        },
        {
            "name": "Jardins de la Croix de Jérusalem",
            "lat": "48,63661125",
            "lng": "-1,510553091",
            "height": "19",
            "desc": "Un jardin.",
            "images": ["https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Jardins_de_la_Croix_de_J%C3%A9rusalem_%28Le_Mont-Saint-Michel%29.jpg/682px-Jardins_de_la_Croix_de_J%C3%A9rusalem_%28Le_Mont-Saint-Michel%29.jpg"],
            "link": "",
        },
        {
            "name": "Tour du Nord",
            "lat": "48,63687937",
            "lng": "-1,510398999",
            "height": "19",
            "desc": "Cette tour élevée sur un éperon rocheux, est la plus grande tour défensive de l'abbaye. Elle a été construite ainsi afin d'impressioner les éventuels ennemis. ",
            "images": ["https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Touristes_sur_la_Tour_du_Nord_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg/1024px-Touristes_sur_la_Tour_du_Nord_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg", "https://i0.wp.com/www.histoire-normandie.fr/wp-content/uploads/2018/05/laurid-31.jpg?ssl=1"],
            "link": "https://www.ot-montsaintmichel.com/je-decouvre/visiter-le-mont-saint-michel/je-visite-le-mont-saint-michel/le-village-et-les-remparts/ https://fr.wikipedia.org/wiki/Fortifications_du_Mont-Saint-Michel#Tour_Nord",
        },
        {
            "name": "La flèche et la statue dorée",
            "lat": "48,63639035",
            "lng": "-1,511547215",
            "height": "",
            "desc": "L’archange Michel était respecté par sa bravoure et son commandement. Une légende raconte qu’il affronta Satan sous forme de dragon au Mont ce qui le rendit inoubliable. De ce fait, lorsqu’une personne voulait se protéger de démons, elle faisait appel à Saint-Michel. Par la suite, l’archange Saint-Michel aurait demandé à l'évêque Aubert, de marquer ce lieu devenu sacré en construisant une église sur ce Mont. C’est ainsi que le Mont-Saint-Michel prit son nom, et qu’il repose tout en haut du Mont, au sommet de la Merveille sous forme d'une statue dorée. ",
            "images": [],
            "link": "https://www.wikimanche.fr/Statue_de_saint_Michel_terrassant_le_dragon",
        },
        {
            "name": "La merveille",
            "lat": "48,63640318",
            "lng": "-1,511631965",
            "height": "19",
            "desc": "L'église de la Merveille est le bâtiment le plus haut de l'abbaye. Elle a été construite pas Philippe Auguste après la guerre opposant le Roi d'Angleterre et le Roi de France.",
            "images": [],
            "link": "https://www.pariscityvision.com/fr/europe/france/mont-saint-michel/merveille",
        },
        {
            "name": "Cloître de l'abbaye",
            "lat": "48,63626862",
            "lng": "-1,511620593",
            "height": "19",
            "desc": "Situé au sommet de la Merveille, le cloître de l'abbaye est un jardin entouré de voutes en forme d'un quadrilatère irrégulier. Elle représente un symbole religieux très fort puisqu'elle se trouve donc proche des cieux et donc de Dieu. Son rôle est donc symbolique.",
            "images": ["https://cdn.pixabay.com/photo/2015/04/15/11/28/mont-saint-michel-723647_1280.jpg", "https://live.staticflickr.com/65535/50273953286_767c02547b_b.jpg"],
            "link": "https://fr.wikipedia.org/wiki/Abbaye_du_Mont-Saint-Michel#Clo%C3%AEtre_(1225-1228)",
        }
    ]

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

    preloadSetOfImages(1, IMAGES_GAP + 1);

    const sleep = (milliseconds) => {
        return new Promise(resolve => setTimeout(resolve, milliseconds))
    }

    let currentLocation = 0;
    let inAnimation = false;
    const modal = document.querySelector('.vr__modal');
    const hashlink = document.getElementById('js-hashlink');

    const updateModalUI = (locId) => {
        locId--
        document.getElementById("js-vr-modal-name").innerText = LOCATIONS[locId].name
        document.getElementById("js-vr-modal-desc").innerText = LOCATIONS[locId].desc
        imagesHTML = ""
        for (let i = 0; i < LOCATIONS[locId].images.length; i++) {
            imagesHTML += `<img class="vrslider__img" src="${LOCATIONS[locId].images[i]}" alt="${LOCATIONS[locId].name}">`
        }
        document.getElementById("js-vr-modal-images").innerHTML = imagesHTML
    } 

    const switchLocation = async (increment) => {
        if (inAnimation) return;
        if (currentLocation + increment < 0) return;
        if (currentLocation + increment >= IMAGES_NUMBER) return;

        inAnimation = true;
        modal.classList.remove('show');
        hashlink.href = `#${currentLocation + increment}`;
        hashlink.click();

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

        updateModalUI(currentLocation);
        modal.classList.add('show');

        preloadSetOfImages(currentLocation * IMAGES_GAP, (currentLocation + 1) * IMAGES_GAP);
    }
    
    document.addEventListener('keydown', (e) => {
        if (e.keyCode === 37) {
            switchLocation(-1);
        } else if (e.keyCode === 39) {
            switchLocation(1);
        }
    });

    document.addEventListener('DOMContentLoaded', () => {
        // detecter si on est sur une page avec un hash
        if (window.location.hash) {
            let hash = window.location.hash.substring(1);
            currentLocation = parseInt(hash);
            switchLocation(0);
            updateModalUI(currentLocation);
            modal.classList.add('show');
        }
    });
</script>