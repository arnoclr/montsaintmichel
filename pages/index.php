<?php include "../includes/head.php"; ?>

<link rel="stylesheet" href="/src/styles/pages/index.css?v=<?= md5(filemtime($_SERVER['DOCUMENT_ROOT'] . '/src/styles/pages/index.css')) ?>">

<div class="hero">
    <div class="hero__navbar">
        <?php $navbar_classes = "navbar--white"; include "../includes/components/navbar.php"; ?>
    </div>
    <!-- <img class="hero__banner" src="/image.php?url=index__couverture.jpg&size=xlarge" alt="Photo d'ensemble du Mont-Saint-Michel"> -->
    <video class="hero__banner" loop autoplay muted>
        <source src="https://i.imgur.com/kd2ur78.mp4" type="video/mp4">
    </video>
    <div class="hero__content">
        <h1 class="hero__content-title">Bienvenue au Mont-Saint-Michel</h1>
        <div class="hero__content-cta">
            <a href="#" class="btn btn--primary btn--large">Démarrer la visite</a>
        </div>
    </div>
    <!-- <div class="hero__shadow"></div> -->
</div>

<?php include "../includes/components/covid.php"; ?>

<?php
$activities = [
    (object) [
        'title' => "Visite de l'abbaye",
        'label' => 'Bon plan',
        'image' => 'activites/abbaye.jpg',
        'size' => 'large'
    ],
    (object) [
        'title' => 'Découvrir la baie',
        'label' => 'Parfait pour les photographes',
        'image' => 'activites/baie.jpg',
        'size' => 'medium'
    ],
    (object) [
        'title' => 'Le train marin',
        'label' => 'à faire en famille',
        'image' => 'activites/train_marin.jpg',
        'size' => 'medium'
    ]
];
?>

<div class="activities">
    <h1 class="activities__title">Activités phares</h1>
    <div class="activities__grid">
        <?php $css = true; foreach ($activities as $key => $activity): ?>
            <?php include "../includes/components/activity_card.php"; $css = false; ?>
        <?php endforeach; ?>
    </div>
</div>

<div style="height: 64px;"></div>

<?php 

$event = (object) [
    "title" => "Marché de Noël",
    "text" => "Un marché de Noël pour aider les frères et sœurs de l'abbaye du Mont-Saint-Michel",
    "link" => "#",
    "image" => "events/marche_noel.png",
];

include "../includes/components/event.php"; ?>

<?php include "../includes/components/footer.php"; ?>
