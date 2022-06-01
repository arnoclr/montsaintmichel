<div class="navbar <?= $navbar_classes ?? '' ?> js-navbar">
    <button class="navbar__menu material-icons-sharp">menu</button>
    <div class="navbar__links">
        <a href="/" class="navbar__links-link"><?= t('navbar.tab.home') ?></a>
        <a href="/map?from=navbar" class="navbar__links-link"><?= t('navbar.tab.village') ?></a>
        <a href="#" class="navbar__links-link" data-menu="menu-histoire"><?= t('navbar.tab.history') ?></a>
        <a href="/architecture" class="navbar__links-link"><?= t('navbar.tab.architecture') ?></a>
    </div>
    <div class="navbar__icons">
        <div class="navbar__icon">
            <i class="material-icons-sharp js-open-locale-selector translation-icon">translate</i>
            <ul id="js-locale-selector" class="locale-selector <?= $selector_classes ?? '' ?>">
                <a href="<?= swicthLangTo('fr') ?>" class="locale-selector__clickable">
                    <li class="locale-selector__region <?= $selector_region ?? '' ?>">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/c3/Flag_of_France.svg" alt="French flag" class="locale-selector__region-flag">
                        <span class="locale-selector__region-name  <?= $region_name ?? '' ?>">Français</span>
                    </li>
                </a>
                <a href="<?= swicthLangTo('en') ?>" class="locale-selector__clickable">
                    <li class="locale-selector__region <?= $selector_region ?? '' ?>">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg" alt="British flag" class="locale-selector__region-flag">
                        <span class="locale-selector__region-name  <?= $region_name ?? '' ?>">English</span>
                    </li>
                </a>
                <a href="<?= swicthLangTo('ar') ?>" class="locale-selector__clickable">
                    <li class="locale-selector__region <?= $selector_region ?? '' ?>">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/0e/Flag_of_the_Arabic_language.svg" alt="Arabic flag" class="locale-selector__region-flag">
                        <span class="locale-selector__region-name  <?= $region_name ?? '' ?>">العربية</span>
                    </li>
                </a>
            </ul>
        </div>
        <div class="navbar__icon">
            <i class="material-icons-sharp js-search-trigger search-icon">search</i>
        </div>
    </div>
</div>
<aside class="js-navbar-placeholder"></aside>
<aside class="js-search search">
    <div class="search__bar">
        <div class="search__textzone">
            <input type="text" class="js-search-input search__input" placeholder="Rechercher sur le site ...">
            <span class="search__nextword">
                <span class="js-search-placeholder search__placeholder"></span>
                <span class="js-search-autocompleted search__autoword"></span>
            </span>
        </div>
        <button class="js-search-btn search__btn">
            <i class="material-icons-sharp">expand_less</i>
        </button>
    </div>
    <ul class="search__dropdown js-search-dropdown">

    </ul>
</aside>
<aside style="display: none;" class="search-backdrop js-search-backdrop"></aside>

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
            'title' => t('navbar.history.nutshell'),
            'link' => '/histoire',
            'image' => 'menu/histoire/en_bref.png'
        ],
        (object) [
            'title' => t('navbar.history.beginning'),
            'link' => '/histoire/frise',
            'image' => 'menu/histoire/les_debuts.png'
        ],
        (object) [
            'title' => t('navbar.history.peak'),
            'link' => '/histoire/frise#date=',
            'image' => 'menu/histoire/apogee.png'
        ],
        (object) [
            'title' => t('navbar.history.100war'),
            'link' => '/histoire/frise#1337',
            'image' => 'menu/histoire/guerre_100_ans.png'
        ],
        (object) [
            'title' => t('navbar.history.revolution'),
            'link' => '/histoire/frise#1789',
            'image' => 'menu/histoire/revolution_fr.png'
        ],
        (object) [
            'title' => t('navbar.history.worldWars'),
            'link' => '/histoire/frise#1914', // CES DEUX LA SONT PAREILS
            'image' => 'menu/histoire/1gm.png'
        ],
        (object) [
            'title' => t('navbar.history.20century'),
            'link' => '/histoire/frise#1914', // ^^^^^^^^^^^^^^^^^^^^^^
            'image' => 'menu/histoire/ajd.png'
        ],
    ],
];

include dirname(__DIR__) . '/components/menu.php'; ?>