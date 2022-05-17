<?php
include "./includes/components/navbar.php";
?>

<link rel="stylesheet" href="../../src/styles/pages/activites/discover.css">

<!-- TODO: retirer après finalisation de la page -->
<div class="hl-disclaimer">
    <i class="material-icons-sharp">error</i>
    <span>Désolé, cette page est encore en construction.</span>
</div>
<style>
    .hl-disclaimer {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px var(--padding);
        background-color: #ffd600;
        font-family: Noto Sans, Arial, sans-serif;
        color: #000;
    }
</style>
<!-- fin disclaimer -->

<main>
    <div>
        <img class="baie_haut" src="<?= i('activites\baie.png', 'medium') ?>" alt="">
        <a href="/map">
            <div class="button_map">
                <button>click on</button>
            </div>
        </a>
    </div>
</main>

<?php include "./includes/components/footer.php"; ?>