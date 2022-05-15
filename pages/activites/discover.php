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

    <h1>Découvrir la baie</h1>

</div>

<?php include "./includes/components/footer.php"; ?>