<?php
$quizz->id = "quizz__" . md5($quizz->question);
?>

<div class="quizz js-quizz" id="<?= $quizz->id ?>">
    <div class="quizz__content">
        <h3 class="quizz__content-question"><?= $quizz->question ?></h3>
        <div class="quizz__content-answers">
            <?php 
            $answers = $quizz->answers;
            shuffle($answers);
            foreach($answers as $answer): ?>
                <button data-correct="<?= $quizz->correct_answer == $answer ? '1' : '0' ?>" class="quizz__content-answers-btn js-quizz-button"><?= $answer ?></button>
            <?php endforeach; ?>
        </div>
        <div class="quizz__content-readmore js-quizz-answer">
            <p class="quizz__content-readmore-summary"><?= $quizz->read_more_summary ?></p>
            <a href="<?= $quizz->read_more ?>" class=" btn">En savoir plus</a>
        </div>
    </div>
    <img src="/image.php?url=<?= $quizz->image ?>&size=small" alt="" class="quizz__image">
</div>