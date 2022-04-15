<?php

const COOKIE_LANG = "__hl";
const GET_LANG_PARAM = "hl";

if (isset($_GET[GET_LANG_PARAM]) && !empty($_GET[GET_LANG_PARAM])) {
    $lang = $_GET[GET_LANG_PARAM];
    setcookie(COOKIE_LANG, $lang, time() + (86400 * 365), "/"); // 1 year
} else {
    $lang = isset($_COOKIE[COOKIE_LANG]) ? $_COOKIE[COOKIE_LANG] : 'fr';
}

function t($translation_id) {
    global $pdo, $lang;
    $stmt = $pdo->prepare('SELECT * FROM traductions WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => $translation_id]);
    // TODO: retourner dans la langue chioisie par l'utilisateur / ou la langue par défaut du navigateur
    return $stmt->fetch()->$lang ?? $translation_id;
}

function swicthLangTo($lang) {
    $url = $_SERVER['REQUEST_URI'];
    $path = explode("?", $url)[0];
    $params = $_GET;
    $params[GET_LANG_PARAM] = $lang;
    return $path . "?" . http_build_query($params);
}
