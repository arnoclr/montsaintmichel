<?php

$keyPages = (object) [
    "index" => "/",
    "vv" => "/visite-virtuelle",
    "nutshell" => "/histoire",
    "frise" => "/histoire/frise",
    "archi" => "/architecture",
    "tips" => "/bons-plans",
    "discover" => "/decouvrir-la-baie",
    "quiz" => "/quiz",
    "map" => "/map",
];

function getPageFromSearchTerms($q)
{
    global $pdo, $keyPages;
    $terms = explode(" ", $q);
    $keys = [];
    $lang = lang();

    foreach ($terms as $term) {
        echo lang();
        $req = $pdo->prepare("SELECT * FROM traductions WHERE ${lang} LIKE ?");
        $req->execute([
            '%' . $term . '%'
        ]);
        $keys = array_merge($keys, $req->fetchAll(PDO::FETCH_COLUMN));
    }

    $relevance = array_count_values($keys);

    // order array by values
    arsort($relevance);

    // truncate array to 10 elements
    $relevance = array_slice($relevance, 0, 10);

    $response = [];

    foreach ($relevance as $key => $score) {
        $id = explode(".", $key)[0];
        if ($id && $keyPages->$id) {
            $response[] = $keyPages->$id;
        }
    }

    return $response;
}
