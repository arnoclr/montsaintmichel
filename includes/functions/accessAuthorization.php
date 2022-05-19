<?php

$nextDay = time() + (24 * 60 * 60);

$secret = '@nzfieoa67Cznuoicxzo';

// die("?expires_at=$nextDay&signature=" . hash_hmac('sha256', $nextDay, $secret));

if (isset($_GET['expires_at']) && isset($_GET['signature'])) {
    $expires_at = $_GET['expires_at'];
    $signature = $_GET['signature'];

    $signature_calculated = hash_hmac('sha256', $expires_at, $secret);

    if ($signature_calculated == $signature) {
        if (time() < $expires_at) {
            $_SESSION['tester'] = true;
        }
    }
}

if (!(isset($_SESSION['tester']) && $_SESSION['tester'])) {
    die("lien invalide, vous allez être redirigé dans 5 secondes. Si vous n'êtes pas redirigé, cliquez <a href='https://arnocellarier.fr/iyou37'>ici</a><meta http-equiv='refresh' content='5; url=https://arnocellarier.fr/iyou37'>");
}