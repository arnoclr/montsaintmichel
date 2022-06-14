<main class="vr">
    <button onclick="window.history.back();" title="Retour" class="vr__back-button"><span class="material-icons-sharp">arrow_back</span></button>

    <aside class="vr__loader" style="display: none;">
        <i class="loader medium white"></i>
    </aside>

    <video title="Ouvrir le panorama StreetView" class="vr__3D js-video" poster="https://cdn.arnocellarier.fr/s/iut/msm/vv/1080/photo%20(1).webp" muted disablepictureinpicture>
        <source class="js-source" src="" type="video/mp4">
    </video>

    <iframe class="vr__streetview hidden js-streetview" src="" style="border: 0; display: none" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <button style="display: none;" class="vr__exitstreetview js-exit-streetview">
        <i class="material-icons-sharp">close</i>
        <span>Fermer</span>
    </button>

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
        <button class="vr__buttons-button js-prev material-icons-sharp" onclick="switchLocation(-1);" title="Naviguer vers l'endroit précédent">navigate_before
        </button>
        <button id="skip-content" class="vr__buttons-button js-next material-icons-sharp" onclick="switchLocation(1);" title="Naviguer vers l'endroit suivant">navigate_next
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
            "streetView": "https://www.google.com/maps/embed?pb=!4v1655199198389!6m8!1m7!1sfYLCIDSlpNYrHZU2EuFRsA!2m2!1d48.63636001862245!2d-1.513309367291583!3f36.37683932549768!4f15.767057166896592!5f1.1924812503605782"
        },
        {
            "name": `<?= t('vr.step2.name') ?>`,
            "lat": `48,63554655`,
            "lng": `-1,512917574`,
            "height": `19`,
            "desc": `<?= t('vr.step2.desc') ?>`,
            "images": ["https://cdn.pixabay.com/photo/2016/04/09/12/05/tower-1317954_1280.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Tour_St._Gabriel.jpg/1280px-Tour_St._Gabriel.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/8/8e/2017-04_Mont_Saint-Michel_tour_Gabriel.jpg/1280px-2017-04_Mont_Saint-Michel_tour_Gabriel.jpg"],
            "link": `http://www.le-mont-saint-michel.org/livre44.htm`,
            "streetView": "https://www.google.com/maps/embed?pb=!4v1655199148806!6m8!1m7!1sKuzr8f0TKrQWqO6vbL-h1Q!2m2!1d48.6355481340211!2d-1.512753979157253!3f309.32094940965123!4f-0.4121877540006409!5f0.4000000000000002"
        },
        {
            "name": `<?= t('vr.step3.name') ?>`,
            "lat": `48,63509581`,
            "lng": `-1,511279047`,
            "height": `19`,
            "desc": `<?= t('vr.step3.desc') ?>`,
            "images": ["https://i.imgur.com/WZuF4AD.jpg"],
            "link": `https://www.ouest-france.fr/normandie/avranches-50300/le-mont-saint-michel-un-pont-levis-tout-neuf-la-porte-du-roy-1746751`,
            "streetView": "https://www.google.com/maps/embed?pb=!4v1655199082953!6m8!1m7!1sLKgRx2jHNZw5S3L4vjr9bA!2m2!1d48.6349107403755!2d-1.511300663438078!3f357.5877745610605!4f18.23381824175752!5f1.1924812503605782"
        },
        {
            "name": `<?= t('vr.step4.name') ?>`,
            "lat": `48,63611116`,
            "lng": `-1,5096371`,
            "height": `21`,
            "desc": `<?= t('vr.step4.desc') ?>`,
            "images": ["https://i.imgur.com/T2vkXcf.jpg", "https://i.imgur.com/54N1TDN.jpg"],
            "link": `https://www.messortiesculture.com/abbaye-du-mont-saint-michel-la-bastille-des-mers-et-ses-cachots-4310`,
            "streetView": "https://www.google.com/maps/embed?pb=!4v1655199040068!6m8!1m7!1sNVDYfnNeoQsCm1ieorGrTA!2m2!1d48.63610979203278!2d-1.509590452260568!3f307.90401326111896!4f17.64794725134395!5f0.4000000000000002"
        },
        {
            "name": `<?= t('vr.step5.name') ?>`,
            "lat": `48,63615858`,
            "lng": `-1,510067564`,
            "height": `20`,
            "desc": `<?= t('vr.step5.desc') ?>`,
            "images": ["https://live.staticflickr.com/2211/32769440562_46208920fd_b.jpg", "https://i.imgur.com/sNmv7Xx.jpg", "https://i.imgur.com/IFj7XDC.jpg"],
            "link": `https://fr.wikipedia.org/wiki/%C3%89glise_Saint-Pierre_du_Mont-Saint-Michel`,
            "streetView": "https://www.google.com/maps/embed?pb=!4v1655198947246!6m8!1m7!1sEUCgkf1hjO1iKPNTOfbX9w!2m2!1d48.63618023139998!2d-1.510049960007308!3f198.13104756962224!4f10.148395186332621!5f0.4000000000000002"
        },
        {
            "name": `<?= t('vr.step6.name') ?>`,
            "lat": `48,63630773`,
            "lng": `-1,510221788`,
            "height": `19`,
            "desc": `<?= t('vr.step6.desc') ?>`,
            "images": ["https://upload.wikimedia.org/wikipedia/commons/thumb/5/50/Stone_houses_of_the_medieval_town_%28village%29_%2832080778114%29.jpg/1024px-Stone_houses_of_the_medieval_town_%28village%29_%2832080778114%29.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/f/f2/Museum_at_the_Logis_Tiphaine_Raguenel_-_rear_facade.JPG/1024px-Museum_at_the_Logis_Tiphaine_Raguenel_-_rear_facade.JPG", "https://upload.wikimedia.org/wikipedia/commons/thumb/2/22/Museum_at_the_Logis_Tiphaine_Raguenel_%28Mont-Saint-Michel%29_01.JPG/1024px-Museum_at_the_Logis_Tiphaine_Raguenel_%28Mont-Saint-Michel%29_01.JPG", "https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/Face_est_du_logis_Tiphaine_Raguenel_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg/1024px-Face_est_du_logis_Tiphaine_Raguenel_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Wiki.Vojvodina_X_%C5%BDitni_magacin_i_kotarka_195.jpg/1024px-Wiki.Vojvodina_X_%C5%BDitni_magacin_i_kotarka_195.jpg"],
            "link": `https://www.ot-montsaintmichel.com/patrimoine-culturel/logis-tiphaine/`,
            "streetView": "https://www.google.com/maps/embed?pb=!4v1655198877723!6m8!1m7!1sqqKP3L6kLTdYol2ZJWa3uw!2m2!1d48.63632178042539!2d-1.510066494526569!3f237.00469931493086!4f29.91013027779158!5f1.1924812503605782"
        },
        {
            "name": `<?= t('vr.step7.name') ?>`,
            "lat": `48,63661125`,
            "lng": `-1,510553091`,
            "height": `19`,
            "desc": `<?= t('vr.step7.desc') ?>`,
            "images": ["https://i.imgur.com/Yarx89G.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/0/09/Jardins_de_la_Croix_de_J%C3%A9rusalem_%28Le_Mont-Saint-Michel%29.jpg/682px-Jardins_de_la_Croix_de_J%C3%A9rusalem_%28Le_Mont-Saint-Michel%29.jpg", ],
            "link": ``,
            "streetView": "https://www.google.com/maps/embed?pb=!4v1655198814344!6m8!1m7!1szAhFXyhYJts_PHTP2TDEIw!2m2!1d48.6365379958815!2d-1.510325359555935!3f260.4970568504929!4f16.288947022564955!5f1.1924812503605782"
        },
        {
            "name": `<?= t('vr.step8.name') ?>`,
            "lat": `48,63687937`,
            "lng": `-1,510398999`,
            "height": `19`,
            "desc": `<?= t('vr.step8.desc') ?>`,
            "images": ["https://i.imgur.com/J5Swk7c.jpg", "https://upload.wikimedia.org/wikipedia/commons/thumb/1/16/Touristes_sur_la_Tour_du_Nord_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg/1024px-Touristes_sur_la_Tour_du_Nord_%28Le_Mont-Saint-Michel%2C_Manche%2C_France%29.jpg", "https://i0.wp.com/www.histoire-normandie.fr/wp-content/uploads/2018/05/laurid-31.jpg?ssl=1"],
            "link": `https://www.ot-montsaintmichel.com/je-decouvre/visiter-le-mont-saint-michel/je-visite-le-mont-saint-michel/le-village-et-les-remparts/ https://fr.wikipedia.org/wiki/Fortifications_du_Mont-Saint-Michel#Tour_Nord`,
            "streetView": "https://www.google.com/maps/embed?pb=!4v1655198749714!6m8!1m7!1sa11B6gQyapDB0vKC_7yLcA!2m2!1d48.6368388088701!2d-1.510407887100996!3f183.58109413419112!4f-8.18370535041339!5f1.1924812503605782"
        },
        {
            "name": `<?= t('vr.step9.name') ?>`,
            "lat": `48,63639035`,
            "lng": `-1,511547215`,
            "height": ``,
            "desc": `<?= t('vr.step9.desc') ?>`,
            "images": ["https://i.imgur.com/NPr1Lzb.jpg", "https://i.imgur.com/44g0CZH.jpg"],
            "link": `https://www.wikimanche.fr/Statue_de_saint_Michel_terrassant_le_dragon`,
            "streetView": "https://www.google.com/maps/embed?pb=!4v1655198599660!6m8!1m7!1sCAoSLEFGMVFpcFB5dVJNdElScE5XX0thb3FaTXlyMTQ2UVFuOGFNdU1QcjQ1X2dy!2m2!1d48.63577069999999!2d-1.512163!3f59.20082683829788!4f21.887854296426212!5f0.4010512882036798"
        },
        {
            "name": `<?= t('vr.step10.name') ?>`,
            "lat": `48,63640318`,
            "lng": `-1,511631965`,
            "height": `19`,
            "desc": `<?= t('vr.step10.desc') ?>`,
            "images": ["https://i.imgur.com/27fyXk9.jpg", "https://i.imgur.com/9ajPNUG.jpg"],
            "link": `https://www.pariscityvision.com/fr/europe/france/mont-saint-michel/merveille`,
            "streetView": "https://www.google.com/maps/embed?pb=!4v1655198483573!6m8!1m7!1sCAoSLEFGMVFpcE9sWjA5cU8tNUVyaTA4M1dLcmozN2xHVFdabEhLT2htRVRMZTdF!2m2!1d48.6359799!2d-1.5115523!3f69.20784354507654!4f24.377020844885635!5f0.7820865974627469"
        },
        {
            "name": `<?= t('vr.step11.name') ?>`,
            "lat": `48,63626862`,
            "lng": `-1,511620593`,
            "height": `19`,
            "desc": `<?= t('vr.step11.desc') ?>`,
            "images": ["https://i.imgur.com/sz9svj4.jpg", "https://i.imgur.com/vCEwWmG.jpg", "https://cdn.pixabay.com/photo/2015/04/15/11/28/mont-saint-michel-723647_1280.jpg", "https://live.staticflickr.com/65535/50273953286_767c02547b_b.jpg"],
            "link": `https://fr.wikipedia.org/wiki/Abbaye_du_Mont-Saint-Michel#Clo%C3%AEtre_(1225-1228)`,
            "streetView": "https://www.google.com/maps/embed?pb=!4v1655196650107!6m8!1m7!1sCAoSLEFGMVFpcE16amdQaC1DSlJ3T09jQzExeFZYUmtidzBER1V0ZlZiMWdadl9Z!2m2!1d48.6363023!2d-1.5116045!3f154.03811312029706!4f-6.97678046824106!5f0.7820865974627469"
        },
    ]
</script>