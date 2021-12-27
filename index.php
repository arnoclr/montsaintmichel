<?php include "includes/head.php"; ?>

<link rel="stylesheet" href="/src/styles/pages/index.css?v=<?= md5(filemtime($_SERVER['DOCUMENT_ROOT'] . '/src/styles/pages/index.css')) ?>">

<div class="hero">
    <div class="hero__navbar">
        <?php $navbar_classes = "navbar--white"; include "includes/components/navbar.php"; ?>
    </div>
    <img class="hero__banner" src="/image.php?url=index__couverture.jpg&size=large" alt="Photo d'ensemble du Mont-Saint-Michel">
    <div class="hero__content">
        <h1 class="hero__content-title">Bienvenue au Mont-Saint-Michel</h1>
        <div class="hero__content-cta">
            <div class="btn btn--primary btn--large">Démarrer la visite</div>
        </div>
    </div>
    <div class="hero__shadow"></div>
</div>

<?php include "includes/components/covid.php"; ?>
