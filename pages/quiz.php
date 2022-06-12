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
    array_push($questions, $array[random_int(0,count($array)-1)]);
    // dd($array);
}

// dd($questions);

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
        <div class="quiz__results" id="quiz__results">
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

<!-- <script src="../src/scripts/app.js"></script> -->
<script>
    const navbar = document.querySelector('.js-navbar');
    const quizBox = document.querySelector(".js-quiz-box");
    const nextBtns = document.querySelectorAll(".js-next-qst");
    const quizProgress = document.getElementById("js-quiz-progress");
    const quizProgressAside = document.querySelector(".quiz-progress");
    const quizProgressAsideOpen = document.querySelector(".quiz-progress--open");
    const quizProgressBar = document.getElementById("js-quiz-progress");

    const textarea = document.querySelector(".js-ta");
    const seed = <?= $seed ?>;
    const copyBtn = document.querySelector(".js-copy");
    const questId = document.querySelectorAll(".js-quizz");

    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {
            quizProgressAside.style.cssText = `
                position: sticky;
                top: calc(${navbar.offsetHeight}px);
                height: 0px;
                z-index: 1;
            `;

            quizProgressBar.style.cssText = `
                width: 100%;
                max-width: 100%;
                animation: bar-enter .3s ease-in-out forwards;
            `;
            
        } else {
            quizProgressAside.style.cssText = ``;
            quizProgressBar.style.cssText = ``;
        }
    });
    

    function processScores() {
        let resultsString = '';
        let correctAnswers = 0;
        let total = 0;
        let correctQuestions = [];

        // document.querySelectorAll('.js-quizz').forEach(quizz => {
        questId.forEach(quizz => {
            if (quizz.classList.contains('js-correct')) {
                resultsString += "✅";
                correctAnswers++;
                correctQuestions.push(1);


                sessionStorage.setItem("correctAnswers", correctAnswers);
            } else {
                resultsString += "❌";
                correctQuestions.push(0);
            }
            total++;
        })
        sessionStorage.setItem("correctQuestions", JSON.stringify(correctQuestions));

        WriteScore(correctAnswers, total, resultsString);
        if (correctAnswers / total >= 1) {
            runFunctionXTimes(createEmoji, "👑", 350, 50)
        } else if (correctAnswers / total >= 0.7) {
            runFunctionXTimes(createEmoji, "😃", 350, 20)
        }
    }

    function ScoreReload() {
        let correctAnswers = sessionStorage.getItem("correctAnswers");
        let correctQuestions = JSON.parse(sessionStorage.getItem("correctQuestions"));
        let total = correctQuestions.length;
        let resultsString = '';

        for (let i = 0; i < total; i++) {
            if (correctQuestions[i] == 1) {
                resultsString += "✅";
            } else {
                resultsString += "❌";
            }
        }
        WriteScore(correctAnswers, total, resultsString);
    }
        
    function WriteScore(correctAnswers, total, resultsString) {
        
        document.querySelector('.js-score').innerHTML = `${correctAnswers}/${total}`;
        document.querySelector('.js-streak').innerHTML = resultsString;

        document.querySelector('.js-rtext').innerHTML = 
              correctAnswers / total >= 1
            ? "Vous connaissez le Mont-Saint-Michel sur le bout des doigts ! N'hésitez pas à partager ce score avec vos amis !" 
            : correctAnswers / total >= 0.7
            ? "Félicitations ! Vous semblez bien connaître le Mont-Saint-Michel. Partagez ce score avec vos amis !"
            : correctAnswers / total >= 0.5
            ? "Ce n'est pas mal ! Vous connaissez le Mont-Saint-Michel, mais vous pouvez en faire mieux."
            : correctAnswers / total < 0.5
            ? "Aïe ... Continuez à parcourir notre site pour trouver vos réponses."
            : "";


        textarea.innerHTML = `Quiz sur le Mont-Saint-Michel\n${correctAnswers}/${total} ${resultsString}\n\nhttps://arnocellarier.fr/tlei62?seed=${seed}`;
    }

    function createEmoji(emojiString) {
        const emoji = document.createElement('div');
        emoji.classList.add('emoji');

        emoji.style.left = Math.random() * 95 + "vw";
        emoji.style.animationDuration = Math.random() * 2 + 5 + "s";
        emoji.style.fontSize = Math.random() * 30 + 40 + "px";

        emoji.innerText = emojiString;

        document.body.appendChild(emoji);

        setTimeout(() => {
            emoji.remove();
        }, 7000);
    }

    function runFunctionXTimes(callback, param, interval, repeatTimes) {
    let repeated = 0;
    const intervalTask = setInterval(doTask, interval)

        function doTask() {
            if ( repeated < repeatTimes ) {
                callback(param)
                repeated += 1
            } else {
                clearInterval(intervalTask)
            }
        }
    }


    sessionStorage.setItem("quizId", seed);

    if (!parseInt(sessionStorage.questionId)) {
        sessionStorage.questionId = 0;
    }

    document.addEventListener("DOMContentLoaded", function() {
        if (sessionStorage.questionId && sessionStorage.quizProgress && sessionStorage.quizId && (!sessionStorage.correctAnswers || sessionStorage.correctAnswers == 0)) {
            quizProgress.value = sessionStorage.quizProgress;
            document.getElementById(questId[sessionStorage.questionId].id).scrollIntoView({
                block: "end",
                inline: "nearest"
            });
        }

        if (sessionStorage.correctQuestions) {
            quizProgress.value = sessionStorage.quizProgress;
            document.getElementById("quiz__results").scrollIntoView({
                block: "end",
                inline: "nearest"
            });
            ScoreReload();
        }
    });

    // sessionStorage.clear(); // ((((((((((((((((((((((((((((((((((((((((((((((((((((((()))))))))))))))))))))))))))))))))))))))))))))))))))))))

    copyBtn.addEventListener('click', () => {
        textarea.focus();
        textarea.select();
        document.execCommand('copy');
        
        fancyAlert("Copié dans le presse-papier", "done", "copy");
    });

    nextBtns.forEach(function(btn) {
        btn.addEventListener("click", function() {
            quizBox.scrollBy({
                top: 0,
                left: window.innerWidth,
                behavior: "smooth"
            });
            quizProgress.value = quizProgress.value + 1;
            sessionStorage.setItem("quizProgress", quizProgress.value);

            sessionStorage.setItem("questionId", parseInt(sessionStorage.questionId)+ 1);

            if (parseInt(sessionStorage.questionId) >= quizProgress.max) {
                processScores();
            }
        });
    });
</script>

<?php include "./includes/components/footer.php"; ?>