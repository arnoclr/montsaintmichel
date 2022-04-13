<div class="hero">
    <div class="hero__navbar">
        <?php $navbar_classes = "navbar--white"; include "./includes/components/navbar.php"; ?>
    </div>
    <!-- <img class="hero__banner" src="<?= $basepath ?>/image.php?url=index__couverture.jpg&size=xlarge" alt="Photo d'ensemble du Mont-Saint-Michel"> -->
    <video class="hero__banner" loop autoplay muted>
        <source src="https://i.imgur.com/kd2ur78.mp4" type="video/mp4">
    </video>
    <div class="hero__content">
        <h1 class="hero__content-title"><?= t('index.hero.title') ?></h1>
        <div class="hero__content-cta">
            <a id="skip-content" href="/vr" class="btn btn--primary btn--large"><?= t('index.hero.visit') ?></a>
        </div>
    </div>
    <!-- <div class="hero__shadow"></div> -->
</div>

<?php include "./includes/components/covid.php"; ?>

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
    <h1 class="activities__title"><?= t('index.activities.title') ?></h1>
    <div class="activities__grid">
        <?php foreach ($activities as $key => $activity): ?>
            <?php include "./includes/components/activity_card.php"; ?>
        <?php endforeach; ?>
    </div>
</div>

<div style="height: 64px;"></div>

<?php
$quizz = (object) [
    "question" => "Comment a été posée la flèche ?",
    "answers" => [
        "En helicoptère",
        "En avion",
        "En train",
        "En bateau"
    ],
    "correct_answer" => "En helicoptère",
    "read_more" => "https://fr.wikipedia.org/wiki/Mont-Saint-Michel",
    "read_more_summary" => "La flèche de Mont-Saint-Michel est une flèche de la ville de Mont-Saint-Michel, en France. Elle a été posée par le préfet de la région de l'Aquitaine, Philippe de la Rochefoucauld, en 1891.",
    "image" => "quizz/fleche.jpg"
];
?>

<div class="main-padding">
    <?php include "./includes/components/quizz.php"; ?>
</div>

<?php 

$event = (object) [
    "title" => t('index.event.title'),
    "text" => t('index.event.desc'),
    "link" => "#",
    "image" => "events/marche_noel.png",
];

?>

<?php include "./includes/components/event.php"; ?>

<?php include "./includes/components/footer.php"; ?>
