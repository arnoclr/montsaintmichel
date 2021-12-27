<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@dev</title>

    <link rel="stylesheet" href="/src/styles/app.css?v=<?= md5(filemtime($_SERVER['DOCUMENT_ROOT'] . '/src/styles/app.css')) ?>">
    <script src="/src/scripts/app.js?v=<?= md5(filemtime($_SERVER['DOCUMENT_ROOT'] . '/src/scripts/app.js')) ?>" defer></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Sharp&family=Ibarra+Real+Nova&family=Montserrat:wght@700&family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>