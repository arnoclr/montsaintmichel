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
                'src' => $data[0],
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

<?php include "./includes/components/navbar.php"; ?>

<main class="frise">

    <div class="frise__header">
        <ul class="frise__timeline frise__timeline--date js-date-scroller">
            <?php for ($i = $centuryStart; $i <= $centuryEnd; $i += 100): ?>
                <li class="frise__timeline-date <?= $i == $centuryStart ? 'frise__timeline-date--active' : '' ?>"><?= $i ?></li>
            <?php endfor; ?>
        </ul>
        <div class="frise__timeline-line"></div>
    </div>

    <div class="frise__timeline frise__timeline--content js-content-scroller">

        <?php foreach ($frise as $century => $events): ?>
            <div class="frise__content">
                <?php foreach ($events as $event): ?>
                    <span class="frise__content-date"><?= $event->year ?></span>
                    <div class="frise__content-card">
                        <div class="image-carousel frise__content-card-img" data-images='<?= $event->images ?>'></div>
                        <div class="frise__content-card-text">
                            <p><?= $event->text ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div class="frise__content-next">
                    <span>Scrollez pour voir le siècle suivant</span>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
        
</main>