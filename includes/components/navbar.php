<div class="navbar <?= $navbar_classes ?? '' ?>">
    <div class="navbar__links">
        <a href="/map?from=navbar" class="navbar__links-link"><?= t('navbar.tab.onSite') ?></a>
        <a href="#" class="navbar__links-link"><?= t('navbar.tab.village') ?></a>
        <a href="#" class="navbar__links-link" data-menu="menu-histoire"><?= t('navbar.tab.history') ?></a>
        <a href="#" class="navbar__links-link"><?= t('navbar.tab.architecture') ?></a>
    </div>
    <div class="navbar__locale">
        <i class="material-icons-sharp js-open-locale-selector">translate</i>
        <ul id="js-locale-selector" class="locale-selector">
            <li class="locale-selector__region">
                <a href="<?= swicthLangTo('fr') ?>" class="locale-selector__clickable">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/c/c3/Flag_of_France.svg" alt="French flag" class="locale-selector__region-flag">
                    <span class="locale-selector__region-name">Français</span>
                </a>
            </li>
            <li class="locale-selector__region">
                <a href="<?= swicthLangTo('en') ?>" class="locale-selector__clickable">
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
            'title' => t('navbar.history.nutshell'),
            'link' => '/histoire/en-bref',
            'image' => 'menu/histoire/en_bref.png'
        ],
        (object) [
            'title' => t('navbar.history.beginning'),
            'link' => '/histoire/frise#date=',
            'image' => 'menu/histoire/les_debuts.png'
        ],
        (object) [
            'title' => t('navbar.history.peak'),
            'link' => '/histoire/frise#date=',
            'image' => 'menu/histoire/apogee.png'
        ],
        (object) [
            'title' => t('navbar.history.100war'),
            'link' => '/histoire/frise#date=',
            'image' => 'menu/histoire/guerre_100_ans.png'
        ],
        (object) [
            'title' => t('navbar.history.revolution'),
            'link' => '/histoire/frise#date=',
            'image' => 'menu/histoire/revolution_fr.png'
        ],
        (object) [
            'title' => t('navbar.history.worldWars'),
            'link' => '/histoire/frise#date=',
            'image' => 'menu/histoire/1gm.png'
        ],
        (object) [
            'title' => t('navbar.history.20century'),
            'link' => '/histoire/frise#date=',
            'image' => 'menu/histoire/ajd.png'
        ],
    ],
];

include dirname(__DIR__) . '/components/menu.php'; ?>