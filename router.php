<?php

// global vars
$basepath = "."; // ex: "/app"
$request = $_SERVER['REQUEST_URI'];
$request = explode('?', $request)[0];
$request = str_replace($basepath, '', $request);

define('ROOT', __DIR__);

// database
try {
    $pdo = new PDO('sqlite:'.dirname(__FILE__).'/data.sqlite');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
} catch(Exception $e) {
    die("database error");
}

// load all files in functions folder
$functions = glob(dirname(__FILE__).'/includes/functions/*.php');
foreach ($functions as $function) {
    require_once $function;
}

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
    global $basepath, $og;
    $path =  "pages" . DIRECTORY_SEPARATOR . $page . ".php";
    if (file_exists($path)) {
        if ($with_head) {
            include "includes/head.php";
        }
        loadAssets($page);
        include($path);
        if ($with_head) {
            include "includes/endbody.php";
        }
    }
}

switch ($request) {
    case "/" :
        $og = (object) [
            "title" => t('index.og.title'),
            "description" => t('index.og.description'),
            "image" => "https://i.makeagif.com/media/4-23-2022/l8bRjC.gif"
        ];
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
    case "/map":
        loadPage("map");
        break;
    case "/ajax/map":
        include "includes/ajax/map.php";
        break;
    default:
        // retourner le fichier par défaut
        return false;
}