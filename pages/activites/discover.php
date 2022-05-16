<?php
include "./includes/components/navbar.php"; 
?>

<link rel="stylesheet" href="../../src/styles/preview.css">
<link rel="stylesheet" href="../../src/styles/pages/activites/activites.css">

<div class="architecture">

    <h1>Découvrir la baie</h1>

    <div class="card__media-content">
        <p class="card__media-text">
        <?php //t("discover.p.description")?>
        Entre Granville et Cancale, la baie du Mont Saint-Michel est le terrain des plus grandes marées d'Europe. Elles permettent chaque année d'admirer le Mont entouré d'eau. La baie c'est aussi un site naturel d'exception. La baie du Mont Saint-Michel est un site touristique incontournable dans la Manche.
        </p>
    </div>
    <br>
    <img loading="lazy" src="./static/img/@640__19b3ce97feafdcc738ac14a5b03feb512a97920b6fede8b98e5d609db6e724c0.webp" class="card__media-img">
    <br><br>

    <h2> Quelques photo prise dans la baie </h2>
    <br>
    
    <img src="<?= i('../../src/img/activites/Mont_st_michel_aerial.jpg', 'medium') ?>" alt="">

    <div class="card__media-content">
        <p class="card__media-text">
        <?php //t("discover.p.img1")?>
        Photo aérienne de la baie du Mont Saint Michel, avec en haut à gauche, l'ile de Tombelaine
        </p>
    </div>
    <br>
    <hr>
    <br>
    <img src="<?= i('../../src/img/activites/island-4420629_1920.jpg', 'medium') ?>" alt="">

    <div class="card__media-content">
        <p class="card__media-text">
        <?php //t("discover.p.img2")?>
        Photo des prés salé un matin brumeux, avec le Mont Saint Michel a moitié visible
        </p>
    </div>
    <br>
    <hr>
    <br>
    <img src="<?= i('../../src/img/activites/balade-walk-guide-deutsche-english-anglais-1024x624.jpg', 'medium') ?>" alt="">

    <div class="card__media-content">
        <p class="card__media-text">
        <?php //t("discover.p.img2")?>
        Randonneur marchant dans la baie a marée basse
        </p>
    </div>
    <br>
    <h2> la Baie, lieu de vie incroyable</h2>

    <div class="card__media-content">
        <p class="card__media-text">
        <?php //t("discover.p.faune")?>
        La Baie du Mont Saint Michel abrite une faune et une flore incroyablement vaste, et il ne tient qu'à vous de partir à la chasse de ces petites merveilles de la nature. Ne serait-ce pas le moment d'organiser un concours de photo ?
        </p>
    </div>
    <br> <br>
    <img src="<?= i('../../src/img/activites/Mt_ST_michel_07.JPG', 'medium') ?>" alt="">

    <div class="card__media-content">
        <p class="card__media-text">
        <?php //t("discover.p.phoque")?>
        Petit phoque dans se baignant dans la baie
        </p>
    </div>
    <br>
    <hr>
    <br>
    <img src="<?= i('../../src/img/activites/IMG_7181.jpg', 'medium') ?>" alt="">

    <div class="card__media-content">
        <p class="card__media-text">
        <?php //t("discover.p.algue")?>
        Photo d'algue poussant à même le sable
        </p>
    </div>
    <br>
    <hr>
    <br>

    <img src="<?= i('../../src/img/activites/649c3c3c1f3a0dd3b775b45859aeb24d.jpg', 'medium') ?>" alt="">

    <div class="card__media-content">
        <p class="card__media-text">
        <?php //t("discover.p.mouton")?>
        Mouton broutant dans les pré salé, ce qui à pour effet de donner un petit goût salé subtile a leur viande, typique du Mont Saint Michel
        </p>
    </div>
    <br>
    <h2> Et pourquoi pas commencer votre découverte maintenant ? </h2>
    <div class="card__media-content">
        <p class="card__media-text">
        <?php //t("discover.p.visite")?>
        Grace à notre visite virtuelle, débutez dès maintenant votre aventure dans la baie, en la contemplant, depuis votre siège
        </p>
    </div>
        <br>
        <a id="skip-content" href="/visite-virtuelle" class="btn btn--primary btn--large"><?= t('index.hero.visit') ?></a>
        <br><br><br><br>



</div>

<?php include "./includes/components/footer.php"; ?>