<!-- code source : arnocellarier.fr/lmek26 -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="DadZ_kmxdyRFZStLpLDKvKVpTsL_x9_2n3Y1_2i_rbA" />
    <title><?= isset($og) ? $og->title : t('og.title') ?></title>

    <?php if (isset($og)) : ?>
        <meta property="og:title" content="<?= $og->title ?>">
        <?php if (isset($og->description)) : ?>
            <meta property="og:description" content="<?= $og->description ?>">
        <?php endif; ?>
        <?php if (isset($og->image)) : ?>
            <meta property="og:image" content="<?= $og->image ?>">
        <?php endif; ?>
        <meta name="twitter:card" content="summary_large_image">
        <meta property="og:site_name" content="Mont-Saint-Michel UNESCO" />
        <meta property="og:locale" content="fr_FR">
        <meta property="og:locale:alternate" content="en_US">
        <meta property="og:locale:alternate" content="zh_CN">
    <?php endif; ?>
    <meta name="theme-color" content="#B94503">
    <meta name="apple-mobile-web-app-status-bar-style" content="#B94503">

    <link rel="canonical" href="<?= $canonical ?>">

    <link rel="stylesheet" href="<?= $basepath ?>/src/styles/app.css?v=<?= md5_file("./src/styles/app.css") ?>">
    <?= $appendHead ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ibarra+Real+Nova&family=Montserrat:wght@700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="shortcut icon" type="image/jpg" href="" id="js-favicon" />

    <?php if (in_array(lang(), ['ar'])) : ?>
        <style>
            html,
            body {
                direction: rtl;
            }

            .locale-selector {
                left: 0;
                right: unset;
            }

            .hero__content {
                left: unset;
                right: var(--padding);
            }

            .frise {
                padding-left: unset;
                padding-right: 22px;
            }

            .frise__content-details {
                margin-left: unset;
                margin-right: 15rem;
            }
        </style>
    <?php endif; ?>
</head>

<body>
    <ul class="accessibility-menu">
        <li>
            <a href="#skip-content">Passer directement au contenu principal</a>
        </li>
    </ul>