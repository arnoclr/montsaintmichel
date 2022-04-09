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