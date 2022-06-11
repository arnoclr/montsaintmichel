<?php
$quizz->id = "quizz__" . md5($quizz->question);
?>

<div class="games_container">
    <div class="game_wrap">
        <div class="game_label__info">Ludique</div>
        <a href="/aubert">
            <div class="game_img-wrap">
                <img src="https://i.imgur.com/AXscBDQ.png" alt="Aubert">
            </div>
            <div class="game_label game_label_aubert">
                <p class="game_label_title">Vas-y Aubert !</p>
                <p class="game_label_small">Aidez Aubert à réaliser le maximum de points.</p>
            </div>
        </a>
    </div>

    <div class="game_wrap">
        <div class="game_label__info">Histoire</div>
        <?php if (isset($_open_quiz_btn) && $_open_quiz_btn) : ?>
            <a href="/quiz?seed=<?= rand(0, 99999) ?>&from=index">

                <div class="game_img-wrap">
                    <img src="https://i.imgur.com/IjgXJYrl.jpg" alt="Aubert">
                </div>
                <div class="game_label game_label_quiz">
                    <p class="game_label_title">Quiz sur le Mont-Saint-Michel</p>
                    <p class="game_label_small">Répondez à des questions intéressantes sur son histoire.</p>
                </div>
            </a>
        <?php endif; ?>
    </div>
</div>