<?php $navbar_classes = "navbar--open";
include "./includes/components/navbar.php"; ?>

<main>
    <div class="ns__tile" id="pq_ca_sappelle_le_msm">
        <div class="ns__tile-text" style="width: 350px;">
            <h2 class="ns__tile-title"><?= t('nutshell.whyMsm.question') ?></h2>
            <p class="ns__tile-desc"><?= t('nutshell.whyMsm.answer') ?></p>
        </div>

        <div class="ns__tile-images" style="width: 670px;">
            <img style="top: 0; left: 0; width: 40%;" src="<?= i('nutshell/mont tombe.jpg') ?>" alt="Page d'un livre">
            <img style="bottom: 0; right: 0; width: 50%;" src="<?= i('nutshell/charlemagne.jpg') ?>" alt="Portrait de Charlemagne">
        </div>
    </div>

    <img class="ns__parallax" src="<?= i('nutshell/parallax/1783.jpg') ?>" alt="Baie du Mont Saint-Michel en 1783">

    <div class="ns__tile ns__tile--incendie" id="qd_a_t_il_ete_construit">
        <div class="ns__tile-text" style="width: 480px;">
            <h2 class="ns__tile-title"><?= t('nutshell.whenBuilt.question') ?></h2>
            <p class="ns__tile-desc"><?= t('nutshell.whenBuilt.answer') ?></p>
            <p class="ns__tile-desc"><?= t('nutshell.whenBuilt.answer.more') ?></p>
        </div>

        <div class="ns__tile-images" style="width: 1200px;">
            <img style="bottom: 0; left: 0; width: 25%;" src="<?= i('nutshell/notre dame sous terre.jpg') ?>" alt="Notre dame sous terre">
            <img style="top: 0; right: 0; width: 70%;" src="<?= i('nutshell/incendie.jpg') ?>" alt="Incendie">
        </div>
    </div>

    <div class="ns__tile" id="pq_a_t_il_ete_construit">
        <div class="ns__tile-text" style="width: 480px;">
            <h2 class="ns__tile-title"><?= t('nutshell.whyBuilt.question') ?></h2>
            <p class="ns__tile-desc"><?= t('nutshell.whyBuilt.answer') ?></p>
            <p class="ns__tile-desc"><?= t('nutshell.whyBuilt.answer.more') ?></p>
        </div>

        <div class="ns__tile-images" style="width: 1400px;">
            <img style="top: 0; left: 0; width: 20%;" src="<?= i('nutshell/archange saint michel.jpg') ?>" alt="Archange Saint Michel">
            <img style="bottom: 0; left: 22%; width: 35%;" src="<?= i('nutshell/eveque.jpg') ?>" alt="Eveque">
            <img style="top: 0; right: 18%; width: 20%;" src="<?= i('nutshell/vikings.jpg') ?>" alt="Invasion de vikings par la mer">
            <img style="bottom: 0; right: 0; width: 30%;" src="<?= i('nutshell/christianisme.jpg') ?>" alt="Representation du Christianisme en dessin">
        </div>
    </div>

    <img class="ns__parallax" src="<?= i('nutshell/parallax/christianisme.jpg') ?>" alt="Representation du Christianisme">

    <div class="ns__tile" id="par_qui_a_t_il_ete_construit">
        <div class="ns__tile-text" style="width: 480px;">
            <h2 class="ns__tile-title"><?= t('nutshell.whoBuilt.question') ?></h2>
            <p class="ns__tile-desc"><?= t('nutshell.whoBuilt.answer') ?></p>
            <p class="ns__tile-desc"><?= t('nutshell.whoBuilt.answer.more') ?></p>
        </div>

        <div class="ns__tile-images" style="width: 900px;">
            <img style="bottom: 0; left: 0; width: 45%;" src="<?= i('nutshell/construction.jpg') ?>" alt="Ouvriers en train de construire le Mont Saint-Michel">
            <img style="top: 0; left: 10%; width: 60%;" src="<?= i('nutshell/bretagne vs normandie.jpg') ?>" alt="Les bretons et les normands se disputant le Mont">
            <img style="bottom: 0; left: 48%; width: 50%;" src="<?= i('nutshell/salomon de bretagne.jpg') ?>" alt="Salomon de Bretagne">
            <img style="top: 0; right: 0; width: 25%;" src="<?= i('nutshell/raoul roi des francs.jpg') ?>" alt="Raoul roi des francs">
        </div>
    </div>

    <img class="ns__parallax" src="<?= i('nutshell/parallax/terres cotentin 1945.jpg') ?>" alt="Les terres du Cotentin en 1945">

    <div class="ns__tile ns__tile--dark" id="quel_role_rempli_t_il">
        <div class="ns__tile-text" style="width: 480px;">
            <h2 class="ns__tile-title"><?= t('nutshell.whatPurpose.question') ?></h2>
            <p class="ns__tile-desc"><?= t('nutshell.whatPurpose.answer') ?></p>
            <p class="ns__tile-desc"><?= t('nutshell.whatPurpose.answer.more') ?></p>
        </div>

        <div class="ns__tile-images" style="width: 1080px;">
            <img style="top: 0; right: 0; width: 15%;" src="<?= i('nutshell/pelerin.png') ?>" alt="Un pelerin se rendant à St Jacques de Compostelle">
            <img style="top: 50%; left: 0; width: 68%; transform: translateY(-50%);" src="<?= i('nutshell/prison.jpg') ?>" alt="Le Mont Saint-Michel servant de prison">
            <img style="bottom: 0; right: 0; width: 30%;" src="<?= i('nutshell/louis xi.jpg') ?>" alt="Portrait de Louis XI">
        </div>
    </div>

    <img class="ns__parallax" src="<?= i('nutshell/parallax/revolution fr.jpg', 'xlarge') ?>" alt="Prise de la Bastille lors de la révolution française">

    <div class="ns__tile ns__tile--colored" id="d_autres_monuments_ds_ce_style">
        <div class="ns__tile-text" style="width: 480px;">
            <h2 class="ns__tile-title"><?= t('nutshell.otherMonuments.question') ?></h2>
            <p class="ns__tile-desc"><?= t('nutshell.otherMonuments.answer') ?></p>
        </div>

        <div class="ns__tile-images" style="width: 1280px;">
            <img style="top: 0; left: 0; width: 49%;" src="<?= i('nutshell/monte garano.jpg') ?>" alt="Monte Garano">
            <img style="bottom: 0; right: 0; width: 49%;" src="<?= i('nutshell/sanctuaire garano.jpg') ?>" alt="Sanctuaire au Monte Garano">
        </div>
    </div>

    <div class="ns__tile" id="cb_de_tps_pr_le_construire">
        <div class="ns__tile-text" style="width: 480px;">
            <h2 class="ns__tile-title"><?= t('nutshell.howLong.question') ?></h2>
            <p class="ns__tile-desc"><?= t('nutshell.howLong.answer') ?></p>
        </div>

        <div class="ns__tile-images" style="width: 560px;">
            <img style="width: 100%;" src="<?= i('nutshell/dragon.jpg') ?>" alt="Combat entre l'archange St Michel et un dragon">
        </div>
    </div>

    <?php include "./includes/components/footer.php"; ?>
</main>

<aside class="left">
    <button class="arrow-btn prev" title="Section précédente">
        <i class="material-icons-sharp">arrow_back_ios_new</i>
    </button>
</aside>

<aside class="right">
    <button class="arrow-btn next" title="Section suivante">
        <i class="material-icons-sharp">arrow_forward_ios</i>
    </button>
</aside>

<div class="bottom-left">
    <button class="unmute-btn">
        <i class="material-icons-sharp">volume_off</i>
        <span>Réactiver le son</span>
    </button>

    <button class="play playing" title="mettre en pause" style="display: none;">
        <svg class="icon before" xmlns="http://www.w3.org/2000/svg" height="24" width="24">
            <path d="M8 19V5L19 12Z" />
        </svg>
        <i class="material-icons-sharp icon after">pause</i>
    </button>
</div>