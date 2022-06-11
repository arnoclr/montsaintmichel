<?php
$centuryStart = 700;
$centuryEnd = 2000;

$frise = [];

for ($i = $centuryStart; $i <= $centuryEnd; $i += 100) {
    $frise[$i] = [];
}

$langFrise = in_array(lang(), ['en', 'fr', 'ar']) ? lang() : 'en';

$tsv = file_get_contents("src/data/frise.$langFrise.tsv");
$lines = explode("\n", $tsv);
// ignore first line
array_shift($lines);

foreach ($lines as $line) {
    $arr = explode("\t", $line);
    $year = $arr[0];
    $century = floor($year / 100) * 100;

    $imgNumber = count($arr) - 2;
    $images = array_slice($arr, 2, $imgNumber);
    $imagesJSON = [];

    foreach ($images as $image) {
        if (strpos($image, 'http') !== false) {
            $data = explode('|', $image);
            $imagesJSON[] = [
                'src' => preg_replace('/.jpg|.png/', 'h.jpg', $data[0]),
                'attr' => isset($data[1]) ? $data[1] : null
            ];
        }
    }

    $frise[$century][] = (object) [
        'year' => $year,
        'text' => $arr[1],
        'images' => json_encode($imagesJSON)
    ];
}
?>

<?php
$navbar_classes = "navbar--open navbar--open-black navbar--white";
$selector_classes = "locale-selector--black";
$region_name = "locale-selector__region-name--black";
$selector_region = "locale-selector__region--black";
include "./includes/components/navbar.php";
?>

<div id="js-scroll_indicator"></div>
<main class="frise">

    <div class="frise__timeline frise__timeline--content js-content-scroller">

        <?php foreach ($frise as $century => $events) : ?>
            <div class="frise__content">
                <span id="<?= $century ?>" class="frise__content-century"><?= $century ?></span>
                <div class="frise__content-details">
                    <?php foreach ($events as $event) : ?>
                        <div class="frise__content-text">
                            <span id="<?= $event->year ?>" class="frise__content-date js-date"><?= $event->year ?></span>
                            <p><?= $event->text ?></p>
                        </div>
                        <div class="image-carousel" data-images='<?= $event->images ?>'></div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <button title="Revenir en haut" class="back-to-top js-btt"><i class="material-icons-sharp">arrow_upward</i></button>

</main>

<div class="frise__audio">
    <img src="https://upload.wikimedia.org/wikipedia/commons/c/c3/Flag_of_France.svg" alt="French flag" class="frise__audio-flag">
    <div class="frise__audio-text">
        <span class="frise__audio-title">Les dates clés du Mont Saint-Michel</span>
        <span class="frise__audio-author">Pierre-Alain de Garrigues</span>
    </div>
    <audio class="frise__audio-player js-audio" controls>
        <source src="https://cdn.arnocellarier.fr/s/iut/msm/mp3/rep_dates_cles.mp3" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
</div>

<?php include "./includes/components/footer.php"; ?>