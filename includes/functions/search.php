<?php

$keyPages = (object) [
    "archi" => "/architecture",
    "dino" => "/aubert",
    "discover" => "/decouvrir-la-baie",
    "frise" => "/histoire/frise",
    "index" => "/",
    "map" => "/map",
    "nutshell" => "/histoire",
    "quiz" => "/quiz",
    "tips" => "/bons-plans",
    "vr" => "/visite-virtuelle",
    "vv" => "/visite-virtuelle",
];

function getPageFromSearchTerms($q)
{
    global $pdo, $keyPages;
    $terms = explode(" ", $q);
    $keys = [];
    $lang = lang();

    foreach ($terms as $term) {
        if (preg_match('/^[a-z-]{0,3}$/i', $term)) {
            continue;
        }

        $req = $pdo->prepare("SELECT * FROM traductions WHERE ${lang} LIKE ?");
        $req->execute([
            '%' . $term . '%'
        ]);
        $keys = array_merge($keys, $req->fetchAll(PDO::FETCH_COLUMN));
    }

    $filteredKeys = [];

    foreach ($keys as $key) {
        $filteredKeys[] = explode(".", $key)[0];
    }

    $relevance = array_count_values($filteredKeys);

    // order array by values
    arsort($relevance);

    // truncate array to 10 elements
    $relevance = array_slice($relevance, 0, 10);

    $response = [];

    foreach ($relevance as $key => $score) {
        $id = explode(".", $key)[0];
        if ($id && isset($keyPages->$id)) {
            $response[] = $keyPages->$id;
        }
    }

    return $response;
}

function getAutoCompletion($word)
{
    global $pdo;
    $lang = lang();
    $req = $pdo->prepare("SELECT ${lang} FROM traductions WHERE id NOT LIKE '%.keywords' AND ${lang} LIKE ? LIMIT 3");
    $req->execute([
        '%' . $word . '%'
    ]);
    $sentences = $req->fetchAll(PDO::FETCH_COLUMN);

    // start setences with the word
    $response = [];
    foreach ($sentences as $sentence) {
        $nextWords = substr($sentence, stripos($sentence, $word) + strlen($word));
        $nextWords = str_replace(".", "", $nextWords);
        $nextWords = str_replace(",", "", $nextWords);
        $nextWords = explode(" ", $nextWords);
        $nextWords = array_slice($nextWords, 0, 3);


        $nextWords = implode(" ", $nextWords);
        if (strlen($nextWords) > 2) {
            if (!in_array($nextWords, $response)) {
                $response[] = $nextWords;
            }
        }
    }

    return $response;
}
