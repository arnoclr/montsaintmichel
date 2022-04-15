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
        'title' => t('index.activities.abbey.main'),
        'label' => t('index.activities.abbey.label'),
        'image' => 'activites/abbaye.jpg',
        'size' => 'large'
    ],
    (object) [
        'title' => t('index.activities.bay.main'),
        'label' => t('index.activities.bay.label'),
        'image' => 'activites/baie.jpg',
        'size' => 'medium'
    ],
    (object) [
        'title' => t('index.activities.train.main'),
        'label' => t('index.activities.train.label'),
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
$json = file_get_contents("$basepath/src/scripts/quiz.json");

// select random key of json object
$key = array_rand(json_decode($json, true));
$data = json_decode($json)->$key;

// get random entry of object
$data = $data[array_rand($data)];
$data->o[] = $data->a;

$quizz = (object) [
    "question" => $data->q,
    "answers" => $data->o,
    "correct_answer" => $data->a,
    "read_more" => $data->l,
    "read_more_summary" => $data->d,
    "image" => $data->i
];

$_open_quiz_btn = true;
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
