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

<div class="architecture">

    <h1><?= t("archi.h1") ?></h1>

    <p><?= t("archi.p.intro") ?><br><br>

    <figure>
        <img src="<?= i('archi/Vue_Sur_Le_Mont-Saint-Michel.jpg', 'medium') ?>" alt="Mont-Saint-Michel">
        <figcaption>
            <?= t("archi.figcaption.msm") ?> / &#169; Wikicommons -
            <a href="https://commons.wikimedia.org/wiki/User:Gzen92" target="_blank">Gzen92</a>
        </figcaption>
    </figure>

    </p>

    <p><?= t("archi.p.abbey") ?>

    <figure>
        <img src="<?= i('archi/Chapelle_Saint-Etienne.jpg', 'medium') ?>" alt="La Chapelle Saint-Etienne">
        <figcaption>
            <?= t("archi.figcaption.stetienne") ?> / &#169; Wikicommons -
            <a href="https://commons.wikimedia.org/wiki/User:Gzen92" target="_blank">Gzen92</a>
        </figcaption>
    </figure>

    </p>


    <!-- ----- LA MERVEILLE ----- -->
    <h2><?= t("archi.h2.wonder") ?></h2>

    <p><?= t("archi.p.wonder") ?></p>

    <figure>
        <img src="<?= i('archi/merveille.jpg', 'medium') ?>" alt="La Merveille du Mont-Saint-Michel">
        <figcaption>
            <?= t("archi.figcaption.wonder") ?> / Émile Sagot (1805-1888)
        </figcaption>
    </figure>

    <p><?= t("archi.p2.wonder") ?></p>
    
    <figure>
        <img src="<?= i('archi/voutes_sur_croisee_ogives.jpg', 'medium') ?>" alt="La Chapelle Saint-Etienne">
        <figcaption>
            <?= t("archi.figcaption.ribbed") ?> / &#169; Wikicommons - Guillaume Piolle
        </figcaption>
    </figure>

    <p><?= t("archi.p3.wonder") ?></p>


    <!-- ----- NOTRE-DAME SOUS TERRE ----- -->
    <h2><?= t("archi.h2.ndst") ?></h2>

    <p><?= t("archi.p.ndst") ?></p>

    <figure>
        <img src="<?= i('archi/Notre-Dame_sous_Terre.jpg', 'medium') ?>" alt="Notre-Dame sous Terre">
        <figcaption>
            <?= t("archi.figcaption.ndst") ?> / &#169; Wikicommons -
            <a href="https://commons.wikimedia.org/wiki/User:Ptyx" target="_blank">Ptyx</a>
        </figcaption>
    </figure>


    <!-- ----- LE VILLAGE ----- -->
    <h2><?= t("archi.h2.village") ?></h2>

    <p><?= t("archi.p.village") ?></p>

    <figure>
        <img src="<?= i('archi/porte_entree.jpg', 'medium') ?>" alt="Porte d'entrée du Mont-Saint-Michel">
        <figcaption> <?= t("archi.figcaption.door") ?> / &#169; Wikicommons - Nono vlf </figcaption>
    </figure>

    <p><?= t("archi.p2.village") ?></p>

    
    <!-- ----- LA SALLE DES HÔTES ----- -->
    <h2><?= t("archi.h2.room") ?></h2>

    <p><?= t("archi.p.room") ?></p>

    <figure>
        <img src="<?= i('archi/Salle_des_Hotes.jpg', 'medium') ?>" alt="Salle des Hôtes du Mont-Saint-Michel">
        <figcaption>
            <?= t("archi.figcaption.room") ?> / &#169; Wikicommons -
            <a href="https://commons.wikimedia.org/wiki/User:Ptyx" target="_blank">Ptyx</a>
        </figcaption>
    </figure>

    <p class="end"><?= t("archi.p2.room") ?></p></p>

</div>

<?php include "./includes/components/footer.php"; ?>