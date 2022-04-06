<?php

// global vars
$basepath = "."; // ex: "/app"
$request = $_SERVER['REQUEST_URI'];
$request = explode('?', $request)[0];
$request = str_replace($basepath, '', $request);

// database
try {
    $pdo = new PDO('sqlite:'.dirname(__FILE__).'/data.sqlite');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
} catch(Exception $e) {
    die("database error");
}

function t($translation_id) {
    global $pdo;
    $stmt = $pdo->prepare('SELECT * FROM traductions WHERE id = :id LIMIT 1');
    $stmt->execute([':id' => $translation_id]);
    // TODO: retourner dans la langue chioisie par l'utilisateur / ou la langue par défaut du navigateur
    return $stmt->fetch()->fr;
}

// var_dump(t("sirene.lochet.desc"));

function loadAssets($page) {
    global $basepath;
    if (file_exists("src/styles/pages/" . $page . ".css")) {
        echo "<link rel=\"stylesheet\" href=\"$basepath/src/styles/pages/" . $page . ".css?v=" . md5(filemtime("src/styles/pages/" . $page . ".css")) . "\">";
    }
    if (file_exists("src/scripts/pages/" . $page . ".js")) {
        echo "<script src=\"$basepath/src/scripts/pages/" . $page . ".js?v=" . md5(filemtime("src/scripts/pages/" . $page . ".js")) . "\" defer></script>";
    }
}

function loadPage($page, $with_head = true) {
    global $basepath;
    $path =  "pages" . DIRECTORY_SEPARATOR . $page . ".php";
    if (file_exists($path)) {
        if ($with_head) {
            include "includes/head.php";
        }
        loadAssets($page);
        include($path);
    }
}

switch ($request) {
    case "/" :
        loadPage("index");
        break;
    case "/vr":
        loadPage("vr");
        break;
    case "/histoire":
        loadPage("histoire/en-bref");
        break;
    case "/architecture":
        loadPage("architecture/architecture");
        break;
    case "/quiz":
        loadPage("quiz");
        break;
    default:
        // retourner le fichier par défaut
        return false;
}