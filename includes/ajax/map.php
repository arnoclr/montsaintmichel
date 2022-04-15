<?php

$action = $_GET["action"];
$response = [];

switch ($action) {
    case "all":
        $results = $pdo->query("SELECT id, nom, note, lat, lng, photos FROM lieux");
        $response["places"] = $results->fetchAll();
        break;
    
    default:
        # code...
        break;
}

header('Content-Type: application/json');
echo json_encode($response);