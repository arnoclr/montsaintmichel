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
    case "itinerary":
        $h = intval($_GET['h'] ?? date('H'));
        $places = [];

        // si on est a midi ou le soir, proposer un seul restaurant
        if (($h >= 11 && $h <= 14) || ($h >= 18 && $h <= 21)) {
            $restaurant = $pdo->query("SELECT * FROM lieux WHERE type = 'restaurant' ORDER BY RANDOM() LIMIT 1")->fetch();
            $restaurant->photos = explode("\n", $restaurant->photos);
            $places[] = $restaurant;
        }

        // trouver des activites triées par budget et qui correspondent au profil demandé, hors restaurant
        // tant que la durée n'est pas dépassée, ajouter de nouveaux lieux
        $duree = intval($_GET["duree"]);
        $computedDuree = 0;

        while ($computedDuree < $duree) {
            $notin = "0";
            foreach ($places as $place) {
                $notin .= "," . $place->id;
            }

            $req = $pdo->prepare("SELECT * FROM lieux WHERE id NOT IN ($notin) AND duree_moyenne < $duree AND type != 'restaurant' AND type != 'hotel' ORDER BY RANDOM() LIMIT 1");
            $req->execute();
            $place = $req->fetch();

            if ($place) {
                $place->photos = explode("\n", $place->photos);
                $places[] = $place;
                $computedDuree += $place->duree_moyenne;
            } else {
                break;
            }
        }

        $response = $places;
        
    
    default:
        # code...
        break;
}

header('Content-Type: application/json');
echo json_encode($response);