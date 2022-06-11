<?php
$quizz->id = "quizz__" . md5($quizz->question);
?>

<div class="games_container">
    <div class="game_wrap">
        <div class="game_label__info"><?= t('index.games.aubert.label') ?></div>
        <a href="/aubert">
            <div class="game_img-wrap">
                <img src="https://i.imgur.com/AXscBDQ.png" alt="Aubert">
            </div>
            <div class="game_label game_label_aubert">
                <p class="game_label_title"><?= t('index.games.aubert.title') ?></p>
                <p class="game_label_small"><?= t('index.games.aubert.small') ?></p>
            </div>
        </a>
    </div>

    <div class="game_wrap">
        <div class="game_label__info"><?= t('index.games.quiz.label') ?></div>
        <?php if (isset($_open_quiz_btn) && $_open_quiz_btn) : ?>
            <a href="/quiz?seed=<?= rand(0, 99999) ?>&from=index">

                <div class="game_img-wrap">
                    <img src="https://i.imgur.com/IjgXJYrl.jpg" alt="Aubert">
                </div>
                <div class="game_label game_label_quiz">
                    <p class="game_label_title"><?= t('index.games.quiz.title') ?></p>
                    <p class="game_label_small"><?= t('index.games.quiz.small') ?></p>
                </div>
            </a>
        <?php endif; ?>
    </div>
</div>