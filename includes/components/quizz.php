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
            <div class="quizz__content-readmore-buttons">
                <a href="<?= $quizz->read_more ?>" class=" btn">En savoir plus</a>
                <?php if (isset($_next_qst_btn) && $_next_qst_btn): ?>
                    <button class="btn btn--iconright js-next-qst">Question suivante <i class="material-icons-sharp">arrow_forward</i></button>
                <?php endif; ?>
                <?php if (isset($_open_quiz_btn) && $_open_quiz_btn): ?>
                    <a class="btn btn--iconright js-next-qst" href="/quiz?seed=<?= rand(0, 99999) ?>&from=index">Plus de questions <i class="material-icons-sharp">launch</i></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <img src="<?= $quizz->image ?>" alt="" class="quizz__image">
</div>