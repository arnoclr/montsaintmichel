<?php
$activities = [
    (object) [
        'title' => t('index.activities.abbey.main'),
        'label' => t('index.activities.abbey.label'),
        'image' => i('activites/abbaye.jpg', 'large')
    ],
    (object) [
        'title' => t('index.activities.bay.main'),
        'label' => t('index.activities.bay.label'),
        'image' => i('activites/baie.jpg', 'medium')
    ],
    (object) [
        'title' => t('index.activities.train.main'),
        'label' => t('index.activities.train.label'),
        'image' => i('activites/train_marin.jpg', 'medium')
    ]
];

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
$articles = getOrCache("index.articles.$lang", 60 * 12, function() use ($lang) {
    return parseXML("https://news.google.com/rss/topics/CAAqIggKIhxDQkFTRHdvSkwyMHZNREZ3T0dnMkVnSm1jaWdBUAE?hl=$lang");
})
?>

<div class="hero">
    <div class="hero__navbar">
        <?php $navbar_classes = "navbar--white"; include "./includes/components/navbar.php"; ?>
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

<div class="activities">
    <h1 class="activities__title"><?= t('index.activities.title') ?></h1>
    <div class="activities__grid">
        <?php foreach ($activities as $key => $activity): ?>
            <?php include "./includes/components/card.php"; ?>
        <?php endforeach; ?>
    </div>
</div>

<div style="height: 64px;"></div>

<div class="main-padding">
    <?php include "./includes/components/quizz.php"; ?>
</div>

<div class="articles">
    <h1 class="articles__title"><?= t('index.articles.title') ?></h1>
    <div class="articles__grid">
        <?php foreach ($articles as $key => $activity): ?>
            <?php $activity->label = timeAgo(strtotime($activity->pubDate)) ?>
            <?php include "./includes/components/card.php"; ?>
        <?php endforeach; ?>
    </div>
</div>

<?php include "./includes/components/footer.php"; ?>
