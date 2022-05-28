<?php

const COOKIE_LANG = "__hl";
const GET_LANG_PARAM = "hl";
const SUPPORTED_LANGAGES = ["fr", "en", "zh", "ar"];

if (isset($_GET[GET_LANG_PARAM]) && !empty($_GET[GET_LANG_PARAM])) {
    $lang = $_GET[GET_LANG_PARAM];
    setcookie(COOKIE_LANG, $lang, time() + (86400 * 365), "/"); // 1 year
} else {
    $lang = 'fr';
    $navigator_langage = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

    if (in_array($navigator_langage, SUPPORTED_LANGAGES)) {
        $lang = $navigator_langage;
    }

    if (isset($_COOKIE[COOKIE_LANG]) && !empty($_COOKIE[COOKIE_LANG])) {
        $lang = $_COOKIE[COOKIE_LANG];
    }
}

function t($translation_id) {
    global $pdo, $lang;
    $stmt = $pdo->prepare('SELECT * FROM traductions WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => $translation_id]);
    return $stmt->fetch()->$lang ?? $translation_id;
}

function lang() {
    global $lang;
    return $lang;
}

function swicthLangTo($lang) {
    $url = $_SERVER['REQUEST_URI'];
    $path = explode("?", $url)[0];
    $params = $_GET;
    $params[GET_LANG_PARAM] = $lang;
    return $path . "?" . http_build_query($params);
}
