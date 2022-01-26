<div class="navbar <?= $navbar_classes ?? '' ?>">
    <div class="navbar__links">
        <a href="#" class="navbar__links-link">A faire sur place</a>
        <a href="#" class="navbar__links-link">Le village</a>
        <a href="#" class="navbar__links-link" data-menu="menu-histoire">Histoire</a>
        <a href="#" class="navbar__links-link">Architecture</a>
    </div>
    <div class="navbar__locale">
        <i class="material-icons-sharp js-open-locale-selector">translate</i>
        <ul id="js-locale-selector" class="locale-selector">
            <li class="locale-selector__region">
                <a href="<?= $_SERVER['REQUEST_URI'] ?>?hl=fr" class="locale-selector__clickable">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/c3/Flag_of_France.svg" alt="French flag" class="locale-selector__region-flag">
                    <span class="locale-selector__region-name">Français</span>
                </a>
            </li>
            <li class="locale-selector__region">
                <a href="<?= $_SERVER['REQUEST_URI'] ?>?hl=en" class="locale-selector__clickable">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg" alt="British flag" class="locale-selector__region-flag">
                    <span class="locale-selector__region-name">English</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<script>
var localeSelector = document.getElementById('js-locale-selector');
var localeBtn = document.querySelector('.js-open-locale-selector');
var isLocaleSelectorOpen = false;

localeBtn.addEventListener('click', e => {
    e.preventDefault();
    localeSelector.classList.add('js-open');
    setTimeout(() => {
        isLocaleSelectorOpen = true;
    }, 200);
});

document.addEventListener('click', e => {
    var isClickInsideElement = localeSelector.contains(e.target);
    if (!isClickInsideElement && isLocaleSelectorOpen) {
        localeSelector.classList.remove('js-open');
        isLocaleSelectorOpen = false;
    }
});
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

    .navbar__locale {
        position: relative;
    }

    .navbar__locale i {
        cursor: pointer;
    }

    .navbar--white .navbar__links-link {
        color: #fff;
    }

    .navbar--white .navbar__locale i {
        color: #fff;
        cursor: pointer;
    }

    .locale-selector {
        margin: 0;
        padding: 0;
        position: absolute;
        top: 0;
        right: 0;
        background-color: #fff;
        list-style: none;
        border-radius: 2px;
        transform-origin: top right;
        transform: scale(0);
        transition: transform .2s ease;
        box-shadow: 0 1px 1px 0 rgba(0,0,0,0.14), 0 2px 1px -1px rgba(0,0,0,0.12), 0 1px 3px 0 rgba(0,0,0,0.20);
    }

    .locale-selector.js-open {
        transform: scale(1);
    }

    .locale-selector.js-open .locale-selector__region {
        animation: delayed-fadein .2s ease-in-out .15s forwards;
    }

    @keyframes delayed-fadein {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .locale-selector__region {
        padding: 8px 16px;
        display: flex;
        align-items: center;
        gap: 12px;
        cursor: pointer;
        opacity: 0;
        transition: opacity .2s ease;
    }

    .locale-selector__clickable {
        display: contents;
        text-decoration: none;
    }

    .locale-selector__region:hover {
        background-color: #f5f5f5;
    }

    .locale-selector__region-flag {
        width: 22px;
        height: auto;
    }

    .locale-selector__region-name {
        font: 400 18px Noto Sans, sans-serif;
        color: #000;
    }
</style>