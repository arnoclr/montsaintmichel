<?php
include "./includes/components/navbar.php";

$topPosts = getOrCache("flickr.photos.search.baiemontsaintmichel", 60 * 24, function () {
    $query = @file_get_contents("https://www.flickr.com/services/rest/?method=flickr.photos.search&api_key=fc6f7621fe47f79722ee89b615eb792c&text=Baie+Mont+Saint+Michel&license=10,9,7,5,4,3,2,1&format=json&nojsoncallback=1&extras=url_l,url_o,description,owner_name");
    $json = json_decode($query);

    $photos = $json->photos->photo;

    $res = [];

    if (!is_countable($photos) || count($photos) == 0) {
        return $res;
    }

    for ($i = 0; $i < min(5, count($photos)); $i++) {
        $filtered = (object) [
            "thumbnail" => $photos[$i]->url_l,
            "display" => $photos[$i]->url_o,
            "caption" => $photos[$i]->title . " - " . $photos[$i]->description->_content,
            "owner" => $photos[$i]->ownername,
        ];

        $res[] = $filtered;
    }

    return $res;
});
?>

<main>
    <div class="remerciements">
        <div>
        <h1>Remerciements</h1>
        <p>Pour réaliser ce projet nous avons fortement été aidé par des personnes exterieure à notre équipe, que cela soit pour les voix que nous avons pu utiliser ou les dessins affichés, et même pour valider notre nouvelle Charte Graphique. Nous aimerions donc prendre un temps pour les remercier de leurs participations:</p>
        </div>

        <div>
            <h2> Traducteurs </h2>
            <ul>
                <li></li>
            </ul>
        </div>

        <div>
            <h2> Voix Off </h2>
            <ul>
                <li> Pierre-Alain de Garrigues</li>
                <li> Ciel </li>
            </ul>
        </div>

        <div>
            <h2> Dessinateurs</h2>
            <ul>
                <li>Fengry (Aurore Remy)</li>
                <li>Tamasukee</li>
            </ul>
        </div>

        <div>
            <h2> Charte Graphique </h2>
            <ul>
                <li>Gaëlle Charpentier</li>
            </ul>
        </div>

        <div>
            <h2> Bêta-Testeur </h2>
            <p>Merci a tous ceux qui ont prit le temps de participer à la bêta-test de notre site, vos conseils ont été d'une aide precieuse pour l'améliorer</p>
        </div>

        <div>
            <h2> Professeurs </h2>
            <ul>
                <li>David Cessy</li>
                <li>Tewfik Ettayeb</li>
                <li>Yann Reby</li>

            </ul>
        </div>
    </div>
</main>
<?php include "./includes/components/footer.php"; ?>