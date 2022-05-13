<?php
$centuryStart = 700;
$centuryEnd = 2000;

$frise = [];

for ($i = $centuryStart; $i <= $centuryEnd; $i += 100) {
    $frise[$i] = [];
}

$tsv = file_get_contents('src/data/frise.tsv');
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

<?php $navbar_classes = "navbar--open navbar--open-black navbar--white"; include "./includes/components/navbar.php"; ?>

<main class="frise">

    <div class="frise__timeline frise__timeline--content js-content-scroller">

        <?php foreach ($frise as $century => $events): ?>
            <div class="frise__content">
                <span class="frise__content-century"><?= $century ?></span>
                <div class="frise__content-details">
                    <?php foreach ($events as $event): ?>
                        <div class="frise__content-text">
                            <span class="frise__content-date"><?= $event->year ?></span>
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

<?php include "./includes/components/footer.php"; ?>