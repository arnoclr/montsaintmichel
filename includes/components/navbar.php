<div class="navbar <?= $navbar_classes ?? '' ?>">
    <div class="navbar__links">
        <a href="#" class="navbar__links-link">A faire sur place</a>
        <a href="#" class="navbar__links-link">Le village</a>
        <a href="#" class="navbar__links-link" data-menu="menu-histoire">Histoire</a>
        <a href="#" class="navbar__links-link">Architecture</a>
    </div>
    <div class="navbar__locale">
        <i class="material-icons-sharp">translate</i>
        <form method="get" id="language-select">
            <select name="hl" onchange="handleLangChange();">
                <option value="fr" <?= (isset($_GET['hl']) && $_GET['hl'] == 'fr') ? 'selected' : '' ?>>Français</option>
                <option value="en" <?= (isset($_GET['hl']) && $_GET['hl'] == 'en') ? 'selected' : '' ?>>Anglais</option>
            </select>
        </form>
    </div>
</div>

<script>
function handleLangChange() {
    const languageForm = document.getElementById('language-select');
    languageForm.submit();
}
</script>

<?php 

$menu = (object) [
    'id' => 'menu-histoire',
    'items' => [
        (object) [
            'title' => 'En bref',
            'link' => '/histoire/en-bref',
            'image' => 'menu/histoire/en_bref.png'
        ],
        (object) [
            'title' => 'Les débuts',
            'link' => '/histoire/frise#date=',
            'image' => 'menu/histoire/les_debuts.png'
        ],
        (object) [
            'title' => 'Son apogée',
            'link' => '/histoire/frise#date=',
            'image' => 'menu/histoire/apogee.png'
        ],
        (object) [
            'title' => 'La guerre de 100 ans',
            'link' => '/histoire/frise#date=',
            'image' => 'menu/histoire/guerre_100_ans.png'
        ],
        (object) [
            'title' => 'La révolution française',
            'link' => '/histoire/frise#date=',
            'image' => 'menu/histoire/revolution_fr.png'
        ],
        (object) [
            'title' => 'Première et seconde guerre mondiale',
            'link' => '/histoire/frise#date=',
            'image' => 'menu/histoire/1gm.png'
        ],
        (object) [
            'title' => "De la fin du XXe siècle à aujourd'hui",
            'link' => '/histoire/frise#date=',
            'image' => 'menu/histoire/ajd.png'
        ],
    ],
];

include dirname(__DIR__) . '/components/menu.php'; ?>

<style>
    .navbar {
        width: 100%;
        display: flex;
        justify-content: space-between;
        padding: 48px var(--padding);
    }

    .navbar__links {
        width: 100%;
        display: flex;
        align-items: flex-start;
        gap: var(--padding);
    }

    .navbar__links-link {
        text-decoration: none;
        font: 400 18px Noto Sans, sans-serif;
        color: #000;
    }

    .navbar--white .navbar__links-link {
        color: #fff;
    }

    .navbar--white .navbar__locale {
        position: relative;
    }

    .navbar--white .navbar__locale i {
        color: #fff;
    }

    #language-select {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        opacity: 0;
        cursor: pointer;
        text-indent: 5px;
    }

    #language-select option {
        font-size: 24px;
        background-color: #eee;
    }
</style>