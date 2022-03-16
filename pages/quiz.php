<?php include "../includes/head.php"; ?>
<?php include "../includes/components/navbar.php"; ?>

<style>
.quiz-box {
    display: flex;
    overflow-x: hidden;
    scroll-snap-type: x mandatory;
    margin-bottom: 64px;
}

.quiz-box__section {
    min-width: 100%;
    display: grid;
    place-items: center;
    scroll-snap-align: start;
    scroll-snap-stop: always;
}
</style>

<main class="quiz-box js-quiz-box">
    <?php

    $_next_qst_btn = true;

    // récupérer les questions du json
    $json = file_get_contents("../src/scripts/quiz.json");

    // selectionner 2 questions pour chaque catégorie
    $data = json_decode($json);
    $questions = [];
    foreach ($data as $key => $array) {
        shuffle($array);
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
            "read_more" => "https://fr.wikipedia.org/wiki/Mont-Saint-Michel",
            "read_more_summary" => "La flèche de Mont-Saint-Michel est une flèche de la ville de Mont-Saint-Michel, en France. Elle a été posée par le préfet de la région de l'Aquitaine, Philippe de la Rochefoucauld, en 1891.",
            "image" => "quizz/fleche.jpg"
        ];

        ?>

        <div class="quiz-box__section">
            <?php include "../includes/components/quizz.php"; ?>
        </div>

        <?php
    }
    ?>
</main>

<script>
    const quizBox = document.querySelector(".js-quiz-box");
    const nextBtns = document.querySelectorAll(".js-next-qst");

    nextBtns.forEach(function(btn) {
        btn.addEventListener("click", function() {
            quizBox.scrollBy({
                top: 0,
                left: window.innerWidth,
                behavior: "smooth"
            });
        });
    });
</script>

<?php include "../includes/components/footer.php"; ?>