<?php

// global vars
$basepath = ""; // ex: "/app"
$request = $_SERVER['REQUEST_URI'];
$request = explode('?', $request)[0];
$request = str_replace($basepath, '', $request);

define('ROOT', __DIR__);

// database
try {
    $pdo = new PDO('sqlite:' . dirname(__FILE__) . '/data.sqlite');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
} catch (Exception $e) {
    die("database error");
}

// load all files in functions folder
$functions = glob(dirname(__FILE__) . '/includes/functions/*.php');
foreach ($functions as $function) {
    require_once $function;
}

// generate canonical link of the requested page

const CANONICAL_QUERY_STRINGS = ['seed'];

$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$url = $protocol . $_SERVER['HTTP_HOST'] . $request;
$queryStrings = explode('&', $_SERVER['QUERY_STRING']);
$canonicalQueryStrings = [];

foreach ($queryStrings as $key => $queryString) {
    $queryString = explode('=', $queryString);
    if (in_array($queryString[0], CANONICAL_QUERY_STRINGS)) {
        $canonicalQueryStrings[] = $queryString[0] . '=' . $queryString[1];
    }
}

$canonical = $url . "?hl=" . lang() . (sizeof($canonicalQueryStrings) > 0 ? "&" . implode('&', $canonicalQueryStrings) : '');

function loadAsset($page, $type)
{
    global $basepath;
    if ($type == 'css' && file_exists("src/styles/pages/" . $page . ".css")) {
        return "<link rel=\"stylesheet\" href=\"$basepath/src/styles/pages/" . $page . ".css?v=" . md5_file("src/styles/pages/" . $page . ".css") . "\">";
    }
    if ($type == 'js' && file_exists("src/scripts/pages/" . $page . ".js")) {
        return "<script src=\"$basepath/src/scripts/pages/" . $page . ".js?v=" . md5_file("src/scripts/pages/" . $page . ".js") . "\" defer></script>";
    }
    return "";
}

function loadPage($page, $with_head = true)
{
    global $basepath, $og, $canonical;
    $path =  "pages" . DIRECTORY_SEPARATOR . $page . ".php";
    $headPath = "pages" . DIRECTORY_SEPARATOR . $page . ".head.php";
    if (file_exists($path)) {
        if ($with_head) {
            $appendHead = loadAsset($page, 'css');
            $externalHeadFile = file_exists($headPath) ? $headPath : false;
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
    case "/":
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
    case "/remerciements":
        $og = (object) [
            "title" => t('credits.og.title'),
            "description" => t('credits.og.description'),
        ];
        loadPage("remerciement");
        break;
    case "/equipe":
        $og = (object) [
            "title" => t('team.og.title'),
            "description" => t('team.og.description'),
        ];
        loadPage("team");
        break;
    case "/histoire":
        $og = (object) [
            "title" => t('nutshell.og.title'),
            "description" => t('nutshell.og.description'),
        ];
        loadPage("histoire/en-bref");
        break;
    case "/histoire/frise":
        $og = (object) [
            "title" => t('frise.og.title'),
            "description" => t('frise.og.description'),
        ];
        loadPage("histoire/frise");
        break;
    case "/architecture":
        $og = (object) [
            "title" => t('archi.og.title'),
            "description" => t('archi.og.description'),
        ];
        loadPage("architecture/architecture");
        break;
    case "/bons-plans":
        $og = (object) [
            "title" => t('bonsplans.og.title'),
            "description" => t('bonsplans.og.description'),
        ];
        loadPage("activites/bon-plan");
        break;
    case "/a-faire":
        $og = (object) [
            "title" => t('afaire.og.title'),
            "description" => t('afaire.og.description'),
        ];
        loadPage("activites/a-faire");
        break;
    case "/decouvrir-la-baie":
        $og = (object) [
            "title" => t('discover.og.title'),
            "description" => t('discover.og.description'),
        ];
        loadPage("activites/discover");
        break;
    case "/quiz":
        $og = (object) [
            "title" => t('quiz.og.title'),
            "description" => t('quiz.og.description'),
        ];
        loadPage("quiz");
        break;
    case "/map":
        $og = (object) [
            "title" => t('map.og.title'),
            "description" => t('map.og.description'),
        ];
        loadPage("map");
        break;
    case "/aubert":
        $og = (object) [
            "title" => t('dino.og.title'),
            "description" => t('dino.og.description'),
        ];
        loadPage("dino/aubert");
        break;
    case "/legal":
        $og = (object) [
            "title" => "Mentions légales",
            "description" => "Informations légales sur le site",
        ];
        loadPage("legal");
        break;
    case "/ajax/map":
        include "includes/ajax/map.php";
        break;
    case "/ajax/linkPreview":
        include "includes/ajax/linkPreview.php";
        break;
    case "/ajax/search":
        include "includes/ajax/search.php";
        break;
    case "/ajax/horairesTrain":
        include "includes/ajax/horairesTrain.php";
        break;
    default:
        // retourner le fichier par défaut
        return false;
}
