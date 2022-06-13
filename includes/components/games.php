<?php
$games = [
    (object) [
        "name" => t('index.games.aubert.title'),
        "text" => t('index.games.aubert.small'),
        "category" => t('index.games.aubert.label'),
        "link" => "/aubert",
        "banner" => i('games/banner aubert.png'),
        "logo" => i('games/logo aubert.png'),
    ],
    (object) [
        "name" => t('index.games.quiz.title'),
        "text" => t('index.games.quiz.small'),
        "category" => t('index.games.quiz.label'),
        "link" => "/quiz?seed=" . rand(0, 99999) . "&from=game_container",
        "banner" => i('games/banner quiz.png'),
        "logo" => i('games/logo quiz.png'),
    ],
    (object) [
        "name" => "GeoGuessr",
        "text" => "Vous attérissez sur le Mont et vous devez trouver où vous êtes !",
        "category" => "Réaliste",
        "link" => "https://www.geoguessr.com/maps/62a78139611055080ed910c4/play",
        "banner" => i('games/banner geoguessr.png'),
        "logo" => i('games/logo geoguessr.png'),
    ]
];

shuffle($games);
?>

<div class="games">
    <?php foreach ($games as $game) : ?>
        <a class="game-card" href="<?= $game->link ?>">
            <img src="<?= $game->banner ?>" alt="<?= $game->text ?>" class="game-card__banner">
            <div class="game-card__details">
                <img src="<?= $game->logo ?>" alt="Logo <?= $game->name ?>" class="game-card__logo">
                <div class="game-card__text">
                    <span class="game-card__category"><?= $game->category ?></span>
                    <span class="game-card__title"><?= $game->name ?></span>
                    <small class="game-card__desc"><?= $game->text ?></small>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>