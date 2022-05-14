<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($og) ? $og->title : t('og.title') ?></title>

    <?php if (isset($og)): ?>
        <meta property="og:title" content="<?= $og->title ?>">
        <?php if (isset($og->description)): ?>
        <meta property="og:description" content="<?= $og->description ?>">
        <?php endif; ?>
        <?php if (isset($og->image)): ?>
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

    <link rel="stylesheet" href="<?= $basepath ?>/src/styles/app.css?v=<?= md5_file("./src/styles/app.css") ?>">
    <?= $appendHead ?>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ibarra+Real+Nova&family=Montserrat:wght@700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <?php if (in_array(lang(), ['ar'])): ?>
        <style>
            html, body {
                direction: rtl;
            }
        </style>
    <?php endif; ?>

    <!-- TODO: retirer après la beta-test - Hotjar Tracking Code for https://montsaintmichel.christopherbeaurain.com/ -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:2939168,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>
</head>

<body>
    <ul class="accessibility-menu">
        <li>
            <a href="#skip-content">Passer directement au contenu principal</a>
        </li>
    </ul>