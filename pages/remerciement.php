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
    <div>
        <div>
        <h1>Remerciement</h1>
        <p>Blabla</p>
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
                <li></li>
            </ul>
        </div>

        <div>
            <h2> Dessinateurs</h2>
            <ul>
                <li></li>
            </ul>
        </div>

        <div>
            <h2> Charte Graphique </h2>
            <ul>
                <li></li>
            </ul>
        </div>

        <div>
            <h2> Bêta-Testeur </h2>
            <p></p>
        </div>

        <div>
            <h2> Professeurs </h2>
            <ul>
                <li></li>
            </ul>
        </div>
    </div>
</main>
<?php include "./includes/components/footer.php"; ?>