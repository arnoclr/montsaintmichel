<?php
include "./includes/components/navbar.php";
?>

<link rel="stylesheet" href="./src/styles/pages/dino/dino.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<input id="copyInp" type="text" />
<div class="dinogame">
    <h1 class="aubert">Vas-y Aubert !</h1>
    <div class="game-container">

        <div class="game">
            <canvas id="canvasFence" width="800" height="300"></canvas>
            <canvas id="canvasSheep" width="800" height="300"></canvas>
            <canvas id="canvas" width="800" height="300"></canvas>
            <div id="score"></div>
            <div id="play">
                <span class="material-symbols-outlined" id="play_icon">play_circle</span>
                <p id="play_p">Lancer ?</p>
            </div>
            <div id="share">
                <span class="material-symbols-outlined" id="share_icon">share</span>
                <p id="share_p">Partager</p>
            </div>
            <div id="highscore">
                <p class="highscore_p"></p>
            </div>
        </div>

    </div>
</div>

<script src="./src/scripts/pages/dino/dino.js"></script>

<?php include "./includes/components/footer.php"; ?>