<?php
include "./includes/components/navbar.php"; 


function tags($url)
{
    $tags = array();

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    $contents = curl_exec($ch);
    curl_close($ch);

    if (empty($contents)) {
        return $tags;
    }

    if (preg_match_all('/<meta([^>]+)content="([^>]+)>/', $contents, $matches)) {
        $doc = new DOMDocument();
        $doc->loadHTML('<?xml encoding="utf-8" ?>' . implode($matches[0]));
        $tags = array();
        foreach ($doc->getElementsByTagName('meta') as $metaTag) {
            if ($metaTag->getAttribute('name') != "") {
                $tags[$metaTag->getAttribute('name')] = $metaTag->getAttribute('content');
            } elseif ($metaTag->getAttribute('property') != "") {
                $tags[$metaTag->getAttribute('property')] = $metaTag->getAttribute('content');
            }
        }
    }
    return $tags;
}

function lien($link_desc) {
    global $pdo;
    $link = $pdo->prepare('SELECT * FROM preview_links WHERE desc = :desc LIMIT 1');
    $link->execute([':desc' => $link_desc]);
    return $link->fetch()->lien ?? '';
}

// function card($link_desc) {
//     include "./includes/components/preview.php";
// }

function card_load($link_desc) {
    echo ''?>

    <div class="card">

    <div class="nav">
        <div class="favico">
            <img src="http://www.google.com/s2/favicons?domain=<?= lien($link_desc) ?>">
        </div>

        <div class="link">
            <a href="<?= lien($link_desc) ?>" target="_blank" class="link_a">
                <p class="card-title"><?= tags( lien($link_desc) )['og:title'] ?></p>
            </a>
            <p class="card-url"><?= substr(dirname( lien($link_desc) ), 8, -5) ?></p>
        </div>
    </div>

    <a href="<?= lien($link_desc) ?>" target="_blank" class="link-a-img">
        <img src="<?= tags( lien($link_desc) )['og:image'] ?>" class="card-img-top">
    </a>

    </div>
    <script src="../../src/scripts/preview.js"></script>

    <?php
}
// require "./includes/components/preview.php";

?>

<link rel="stylesheet" href="../../src/styles/preview.css">
<link rel="stylesheet" href="../../src/styles/pages/activites/activites.css">

<div class="architecture">
    
    <h2>Activités principales à faire en famille</h2><br>

    <!-- ---- Train Marin ---- -->
    <h3>Le train marin</h3>

    <img src="../../src/img/activites/train_marin.jpg" alt="">
    <p>Au départ de Cherrueix, le Train Marin vous permet de découvrir de façon unique les richesses de l’exceptionnelle Baie du Mont Saint-Michel. Les jours et horaires des visites sont rythmés par les marées. Nos « chauffeurs-guides » vous emmènent jusqu’à 5 kilomètres du rivage pour une visite commentée de 2 heures. Vous y découvrirez les pêches traditionnelles et le métier de mytiliculteur (éleveur de moules).</p>
    <h5 class="txt-title">Horaires d'ouverture: (irrégulières)</h5>
    <?php

        $json = file_get_contents("src/scripts/horaires.json");
        $data = json_decode($json, true);

        $month = date("F");
        $day = date("d");
        $schedule = "Fermé";
        $dayweek;

        if (isset($data[$month])) {
            foreach ($data[$month] as $key => $values) {
                if ($values['day'] == $day) {
                    $schedule = $values['schedule'];
                    $dayweek = $values['dayweek'];
                }
            }
        }
        echo '<p class="">' . $dayweek . ' '.$day.' '.$month.' : '. $schedule . '</p>';

    ?>
    <br><br><br>

    <!-- ---- Balade à cheval de la baie. Le centre équestre la Tanière ---- -->
    <h3>Balade à cheval de la baie : Le centre équestre la Tanière</h3>

    <img src="../../src/img/activites/balade-cheval.jpeg" alt="">
    <p>Découvrir le Mont Saint Michel à cheval est un privilège inoubliable et unique qui ne s’adresse pas uniquement aux cavaliers confirmés. Débutants, enfants, de nombreuses formules sont proposées pour que chacun puisse profiter d’une découverte originale.

Pour les enfants, des sorties à poney de 30mn à 1h00 sont proposées par le centre équestre la tanière au plus près du Mont saint Michel

Des sorties d’1h30 sont possibles pour découvrir la nature du Mont Saint Michel pour les débutants, en longeant les rives du Couesnon.</p>

    <h5 class="txt-title">Horaires d'ouverture:</h5>

    <table class="tbl-header">
        <tr class="tr-header">
            <th></th>
            <th>Lundi au Vendredi</th>
            <th>Samedi</th>
            <th>Dimanche</th>
        </tr>
        <tr class="tr">
            <td>
                <p class="txt-bold">Le centre équestre la Tanière</p>
            </td>
            <td>
                <p class="txt">9h00 - 20h00<br></p>
            </td>
            <td>
                <p class="txt">10h00-19h00<br></p>
            </td>
            <td>
                <p class="txt">Fermé<br></p>
            </td>
        </tr>
    </table></br>

    <!-- ---- Vol en ULM Autogire ---- -->
    <h3>Vol en ULM Autogire</h3>

    <img src="../../src/img/activites/ulm.jpg" alt="">
    <p>Quoi de mieux, pour découvrir un panorama unique au monde, que de le contempler depuis le ciel. Au travers d'une vitre d'un avion, c'est déjà beaucoup, mais il y a l'extrême dans l'extase qui en met plein la vue. C'est le vol en chute libre.

Et c'est vous qui touchez du doigt, dans les airs, cette merveille de l'Occident qui se dresse au coeur d'une immense baie envahie par les plus grandes marées d'Europe : le Mont Saint Michel !</p>

    <h5 class="txt-title">Horaires d'ouverture:</h5>

    <table class="tbl-header">
        <tr class="tr-header">
            <th></th>
            <th>Lundi au Vendredi</th>
            <th>Samedi</th>
            <th>Dimanche</th>
        </tr>
        <tr class="tr">
            <td>
                <p class="txt-bold">Vol en ULM Autogire</p>
            </td>
            <td>
                <p class="txt">7h00 - 22h00<br></p>
            </td>
            <td>
                <p class="txt">7h00 - 22h00<br></p>
            </td>
            <td>
                <p class="txt">7h00 - 22h00<br></p>
            </td>
        </tr>
    </table></br>
    
</div>

<?php include "./includes/components/footer.php"; ?>