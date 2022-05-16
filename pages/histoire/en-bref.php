<?php include "./includes/components/navbar.php"; ?>

<div class="faq">
    <div class="faq__qst">
        <h2><?= t('nutshell.whyMsm.question') ?></h2>
        <p><?= t('nutshell.whyMsm.answer') ?></p>
    </div>

    <div class="faq__qst">
        <h2><?= t('nutshell.whenBuilt.question') ?></h2>
        <p><?= t('nutshell.whenBuilt.answer') ?></p>
        <details id="skip-content">
            <summary>
                <i class="material-icons-sharp">chevron_right</i>
                <?= t('nutshell.more') ?>
            </summary>
            <p class="faq__qst-details"><?= t('nutshell.whenBuilt.answer.more') ?></p>
        </details>
    </div>

    <div class="faq__qst">
        <h2><?= t('nutshell.whyBuilt.question') ?></h2>
        <p><?= t('nutshell.whyBuilt.answer') ?></p>
        <details>
            <summary>
                <i class="material-icons-sharp">chevron_right</i>
                <?= t('nutshell.more') ?>
            </summary>
            <p class="faq__qst-details"><?= t('nutshell.whyBuilt.answer.more') ?></p>
        </details>
    </div>

    <div class="faq__qst">
        <h2><?= t('nutshell.whoBuilt.question') ?></h2>
        <p><?= t('nutshell.whoBuilt.answer') ?></p>
        <details>
            <summary>
                <i class="material-icons-sharp">chevron_right</i>
                <?= t('nutshell.more') ?>
            </summary>
            <p class="faq__qst-details"><?= t('nutshell.whoBuilt.answer.more') ?></p>
        </details>
    </div>
    
    <div class="faq__qst">
        <h2><?= t('nutshell.whatPurpose.question') ?></h2>
        <p><?= t('nutshell.whatPurpose.answer') ?></p>
        <details>
            <summary>
                <i class="material-icons-sharp">chevron_right</i>
                <?= t('nutshell.more') ?>
            </summary>
            <p class="faq__qst-details"><?= t('nutshell.whatPurpose.answer.more') ?></p>
        </details>
    </div>

    <div class="faq__qst">
        <h2><?= t('nutshell.otherMonuments.question') ?></h2>
        <p><?= t('nutshell.whatPurpose.answer') ?></p>
        <!-- TODO: Lien vers la page wiki du Monte Gargano: 

        https://fr.wikipedia.org/wiki/Sanctuaire_de_Saint_Michel_l%27Archange

        Lien vers la page wiki de l’abbaye cistercienne d’Aubazine:

        https://fr.wikipedia.org/wiki/Abbaye_d%27Aubazine

        Lien Maps Monte Gargano: 

        https://duckduckgo.com/?q=Monte+Gargano&t=brave&ia=web&iaxm=maps

        Lien Maps Abbaye d’Aubazine:

        https://duckduckgo.com/?q=aubazine+abbaye&t=brave&ia=web&iaxm=maps -->
    </div>
    
    <div class="faq__qst">
        <h2><?= t('nutshell.howLong.question') ?></h2>
        <p><?= t('nutshell.howLong.answer') ?></p>
    </div>
</div>

<div class="feature-box">
    <div class="feature-box__text">
        <h3>Envie d'en savoir plus ?</h3>
        <p>Découvrez toute l'histoire du Mont-Saint-Michel au travers d'une frise chronologique retracant les événements marquants de l'Île.</p>
        <a href="/histoire/frise" class="btn btn--white">Voir la frise</a>
    </div>
</div>

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

<div class="discover">
    <h3>Découvrir le Mont</h3>
    <div class="discover__grid">
        <?php foreach ($activities as $key => $activity): ?>
            <?php include "./includes/components/card.php"; ?>
        <?php endforeach; ?>
    </div>
</div>

<?php include "./includes/components/footer.php"; ?>