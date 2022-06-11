<?php
$json = file_get_contents("src/scripts/quiz.json");

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

// mise en cache de 12 heures
$lang = lang();
$articles = getOrCache("index.articles.$lang", 60 * 12, function () use ($lang) {
    return parseXML("https://news.google.com/rss/topics/CAAqIggKIhxDQkFTRHdvSkwyMHZNREZ3T0dnMkVnSm1jaWdBUAE?hl=$lang");
})
?>

<div class="hero">
    <div class="hero__navbar">
        <?php $navbar_classes = "navbar--white";
        include "./includes/components/navbar.php"; ?>
    </div>
    <video id="main-video" class="hero__banner" poster="https://i.imgur.com/33UIruK.webp" loop autoplay muted></video>
    <div class="hero__content">
        <h1 class="hero__content-title"><?= t('index.hero.title') ?></h1>
        <div class="hero__content-cta">
            <a id="skip-content" href="/visite-virtuelle" class="btn btn--primary btn--large"><?= t('index.hero.visit') ?></a>
        </div>
    </div>
    <small class="hero__attribution">&copy; <a target="_blank" href="https://www.mathieurivrin.com/?utm_source=BUT_INFO_MSM_UNESCO">Mathieu Rivrin</a> • <a target="_blank" href="https://youtu.be/Ay38geQlMDQ"><?= t('index.hero.video.source') ?></a></small>
    <div class="hero__shadow"></div>
</div>

<!-- Vidéo de présentation du Mont-Saint-Michel -->
<script>
    const videos = [
        "https://i.imgur.com/xPQR4yw.mp4",
        "https://i.imgur.com/33UIruK.mp4"
    ];

    let source = document.createElement("source");
    source.src = videos[window.innerWidth > 720 ? 1 : 0];
    source.type = "video/mp4";

    document.getElementById("main-video").appendChild(source);
</script>

<!-- Activités phares -->
<?php include "./includes/components/activitiesRow.php"; ?>

<!-- Différents jeux -->
<div class="main-padding Games">
    <h1 class="articles__title Games-h1"><?= t('index.games.title') ?></h1>
    <?php include "./includes/components/games.php"; ?>
</div>

<div style="height: 64px;"></div>

<!-- Galerie d'images mouvantes -->
<div class="collections">
    <h1 class="articles__title collection-h1"><?= t('index.collection.title') ?></h1>
    <?php include "./includes/components/collections.php"; ?>
</div>

<!-- Petite partie du Quiz -->
<div class="main-padding quiz-wrapper">
    <?php include "./includes/components/quizz.php"; ?>
</div>

<!-- Dernières actualités -->
<div class="articles">
    <h1 class="articles__title"><?= t('index.articles.title') ?></h1>
    <div class="articles__grid">
        <?php foreach ($articles as $key => $activity) : ?>
            <?php $activity->label = timeAgo(strtotime($activity->pubDate)) ?>
            <?php include "./includes/components/card.php"; ?>
        <?php endforeach; ?>
    </div>
</div>

<?php include "./includes/components/footer.php"; ?>