<div class="navbar <?= $navbar_classes ?? '' ?>">
    <div class="navbar__links">
        <a href="#" class="navbar__links-link">A faire sur place</a>
        <a href="#" class="navbar__links-link">Le village</a>
        <a href="#" class="navbar__links-link" data-menu="menu-histoire">Histoire</a>
        <a href="#" class="navbar__links-link">Architecture</a>
    </div>
    <div class="navbar__locale">
        <i class="material-icons-sharp">translate</i>
    </div>
</div>

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

    .navbar--white .navbar__locale i {
        color: #fff;
    }
</style>