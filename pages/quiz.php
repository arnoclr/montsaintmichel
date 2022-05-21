<?php

if (!in_array(lang(), ['fr'])) {
    include "./includes/components/languageDisclaimer.php";
}

$_next_qst_btn = true;
$seed = intval($_GET['seed'] ?? rand(0, 99999));

// récupérer les questions du json
$json = file_get_contents("src/scripts/quiz.json");

// selectionner 2 questions pour chaque catégorie
$data = json_decode($json);
$questions = [];
foreach ($data as $key => $array) {
    seededShuffle($array, $seed);
    array_push($questions, $array[0]);
}

include "./includes/components/navbar.php"; ?>

<aside class="quiz-progress">
    <progress id="js-quiz-progress" value="1" min="1" max="<?= count($questions) ?>"></progress>
</aside>

<main class="quiz-box js-quiz-box">
    <?php
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

    <div class="quiz-box__section">
        <div class="quiz__results">
            <span class="quiz__results-score js-score"></span>
            <span class="quiz__results-streak js-streak"></span>
            <p class="quiz__results-text js-rtext"></p>
            <textarea class="js-ta"></textarea>
            <button class="quiz__results-btn js-copy">
                <span>Copier les résultats</span>
                <i class="material-icons-sharp">content_copy</i>
            </button>
        </div>
    </div>
</main>

<script>
    const quizBox = document.querySelector(".js-quiz-box");
    const nextBtns = document.querySelectorAll(".js-next-qst");
    const quizProgress = document.getElementById("js-quiz-progress");
    const textarea = document.querySelector(".js-ta");
    const seed = <?= $seed ?>;
    const copyBtn = document.querySelector(".js-copy");

    function processScores() {
        let resultsString = '';
        let correctAnswers = 0;
        let total = 0;

        document.querySelectorAll('.js-quizz').forEach(quizz => {
            if (quizz.classList.contains('js-correct')) {
                resultsString += "✅";
                correctAnswers++;
            } else {
                resultsString += "❌";
            }
            total++;
        })

        document.querySelector('.js-score').innerHTML = `${correctAnswers}/${total}`;
        document.querySelector('.js-streak').innerHTML = resultsString;

        document.querySelector('.js-rtext').innerHTML = correctAnswers / total >= 0.7 
            ? "Félicitations ! Vous semblez bien connaître le Mont-Saint-Michel. Partagez ce score avec vos amis !"
            : "Aïe ... Continuez à parcourir notre site pour trouver vos réponses."

        textarea.innerHTML = `Quiz sur le Mont-Saint-Michel\n${correctAnswers}/${total} ${resultsString}\n\nhttps://arnocellarier.fr/tlei62?seed=${seed}`;
    }

    copyBtn.addEventListener('click', () => {
        textarea.focus();
        textarea.select();
        document.execCommand('copy');
        console.log("copy");
    });

    nextBtns.forEach(function(btn) {
        btn.addEventListener("click", function() {
            quizBox.scrollBy({
                top: 0,
                left: window.innerWidth,
                behavior: "smooth"
            });
            quizProgress.value = quizProgress.value + 1;

            if (quizProgress.value >= quizProgress.max) {
                processScores();
            }
        });
    });
</script>

<?php include "./includes/components/footer.php"; ?>