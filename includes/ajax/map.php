<?php

$action = $_GET["action"];
$response = [];

switch ($action) {
    case "all":
        $results = $pdo->query("SELECT id, nom, note, lat, lng, photos FROM lieux");
        $response["places"] = $results->fetchAll();
        break;

    case "details":
        $id = $_GET["id"];
        $req = $pdo->prepare("SELECT * FROM lieux WHERE id = ? LIMIT 1");
        $req->execute([$id]);
        $response = $req->fetch();
        $response->description = t($response->description);
        $response->photos = explode("\n", $response->photos);
        break;
    
    default:
        # code...
        break;
}

header('Content-Type: application/json');
echo json_encode($response);