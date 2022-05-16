<?php
$activities = [
    (object) [
        'title' => t('index.activities.abbey.main'),
        'label' => t('index.activities.abbey.label'),
        'image' => i('activites/abbaye.jpg', 'large'),
        'link' => '/bons-plans'
    ],
    (object) [
        'title' => t('index.activities.bay.main'),
        'label' => t('index.activities.bay.label'),
        'image' => i('activites/baie.jpg', 'medium'),
        'link' => '/decouvrir-la-baie'
    ],
    (object) [
        'title' => t('index.activities.train.main'),
        'label' => t('index.activities.train.label'),
        'image' => i('activites/train_marin.jpg', 'medium'),
        'link' => '/a-faire'
    ]
];
?>

<div class="activities">
    <h1 class="activities__title"><?= t('index.activities.title') ?></h1>
    <div class="activities__grid">
        <?php foreach ($activities as $key => $activity): ?>
            <?php include "./includes/components/card.php"; ?>
        <?php endforeach; ?>
    </div>
</div>