<?php

// global vars
$basepath = ""; // ex: "/app"
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

function loadAsset($page, $type) {
    global $basepath;
    if ($type == 'css' && file_exists("src/styles/pages/" . $page . ".css")) {
        return "<link rel=\"stylesheet\" href=\"$basepath/src/styles/pages/" . $page . ".css?v=" . md5_file("src/styles/pages/" . $page . ".css") . "\">";
    }
    if ($type == 'js' && file_exists("src/scripts/pages/" . $page . ".js")) {
        return "<script src=\"$basepath/src/scripts/pages/" . $page . ".js?v=" . md5_file("src/scripts/pages/" . $page . ".js") . "\" defer></script>";
    }
    return "";
}

function loadPage($page, $with_head = true) {
    global $basepath, $og;
    $path =  "pages" . DIRECTORY_SEPARATOR . $page . ".php";
    if (file_exists($path)) {
        if ($with_head) {
            $appendHead = loadAsset($page, 'css');
            include "includes/head.php";
        }
        include($path);
        if ($with_head) {
            $appendBody = loadAsset($page, 'js');
            include "includes/endbody.php";
        }
    }
}

switch ($request) {
    case "/" :
        $og = (object) [
            "title" => t('index.og.title'),
            "description" => t('index.og.description'),
            "image" => "https://i.imgur.com/L35opDg.gif"
        ];
        loadPage("index");
        break;
    case "/visite-virtuelle":
        $og = (object) [
            "title" => t('vv.og.title'),
            "description" => t('vv.og.description'),
            "image" => "https://i.imgur.com/ixsUaBg.jpg"
        ];
        loadPage("vr");
        break;
    case "/histoire":
        loadPage("histoire/en-bref");
        break;
    case "/histoire/frise":
        $og = (object) [
            "title" => "Frise chronologique",
        ];
        loadPage("histoire/frise");
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