<?php


// function lien($link_desc) {
//     global $pdo;
//     $link = $pdo->prepare('SELECT * FROM preview_links WHERE desc = :desc LIMIT 1');
//     $link->execute([':desc' => $link_desc]);
//     return $link->fetch()->lien ?? '';
// }

// function card($link_desc) {
//     include "./includes/components/preview_card.php";
// }

?>

<!-- <link rel="stylesheet" href="../../src/styles/preview.css"> -->

<!-- < ?= card('barrel vaults') ?>
sdfsdfsdf -->
<!-- < ?= card($link_desc) ?> -->

<!-- <div class="card">

    <div class="nav">
        <div class="favico">
            <img src="http://www.google.com/s2/favicons?domain=< ?= lien($link_desc) ?>">
        </div>

        <div class="link">
            <a href="< ?= lien($link_desc) ?>" target="_blank" class="link_a">
                <p class="card-title"><?= tags( lien($link_desc) )['og:title'] ?></p>
            </a>
            <p class="card-url">< ?= substr(dirname( lien($link_desc) ), 8, -5) ?></p>
        </div>
    </div>

    <a href="< ?= lien($link_desc) ?>" target="_blank" class="link-a-img">
        <img src="< ?= tags( lien($link_desc) )['og:image'] ?>" class="card-img-top">
    </a>

</div>
<script src="../../src/scripts/preview.js"></script> -->