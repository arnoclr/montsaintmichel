<?php include "./includes/components/navbar.php"; ?>

<style>
.quiz-box {
    display: flex;
    overflow-x: hidden;
    scroll-snap-type: x mandatory;
    margin-bottom: 64px;
}

.quiz-box__section {
    min-width: 100%;
    padding: 16px var(--padding);
    display: grid;
    place-items: center;
    scroll-snap-align: start;
    scroll-snap-stop: always;
}

.quiz-progress {
    display: grid;
    place-items: center;
    height: 32px;
}

#js-quiz-progress {
    width: 90%;
    height: 8px;
    max-width: 590px;
    -webkit-appearance: none;
    appearance: none;
}

#js-quiz-progress::-webkit-progress-bar {
    background-color: #eee;
    border-radius: 2px;
    box-shadow: 0 2px 2px rgba(0, 0, 0, 0.1) inset;
}

#js-quiz-progress::-webkit-progress-value {
    background-color: var(--primary-color);
    border-radius: 2px;
}
</style>

<main class="quiz-box js-quiz-box">
    <?php

    $_next_qst_btn = true;
    $seed = isset($_GET['seed']) ? $_GET['seed'] : rand(0, 99999);

    // récupérer les questions du json
    $json = file_get_contents("src/scripts/quiz.json");

    // selectionner 2 questions pour chaque catégorie
    $data = json_decode($json);
    $questions = [];
    foreach ($data as $key => $array) {
        seededShuffle($array, $seed);
        array_push($questions, $array[0], $array[1]);
    }

    foreach ($questions as $key => $value) {
        $answers = $value->o;
        array_push($answers, $value->a);
        shuffle($answers);

        $quizz = (object) [
            "question" => $value->q,
            "answers" => $answers,
            "correct_answer" => $value->a,
            "read_more" => $value->l,
            "read_more_summary" => $value->d,
            "image" => $value->i
        ];

        ?>

        <div class="quiz-box__section">
            <?php include "./includes/components/quizz.php"; ?>
        </div>

        <?php
    }
    ?>
</main>

<aside class="quiz-progress">
    <progress id="js-quiz-progress" value="1" min="1" max="<?= count($questions) ?>"></progress>
</aside>

<script>
    const quizBox = document.querySelector(".js-quiz-box");
    const nextBtns = document.querySelectorAll(".js-next-qst");
    const quizProgress = document.getElementById("js-quiz-progress");

    nextBtns.forEach(function(btn) {
        btn.addEventListener("click", function() {
            quizBox.scrollBy({
                top: 0,
                left: window.innerWidth,
                behavior: "smooth"
            });
            quizProgress.value = quizProgress.value + 1;
        });
    });
</script>

<?php include "./includes/components/footer.php"; ?>