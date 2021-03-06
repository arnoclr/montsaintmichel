<?php
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

<div class="top_img">
    <div class="top_img__navbar">
        <?php $navbar_classes = "navbar--white";
        include "./includes/components/navbar.php"; ?>
    </div>
    <img class="img_bay_top" src="<?= i('activites/baie.png', 'medium') ?>" alt="Vue satelitte de la baie du Mont-Saint-Michel">
    <a class="button_map" href="/map">
        <svg class="map-logo" xmlns="http://www.w3.org/2000/svg" height="48" width="48">
            <path d="M9.65 38.35V28.15H13.05V34.95H19.85V38.35ZM9.65 19.85V9.65H19.85V13.05H13.05V19.85ZM28.15 38.35V34.95H34.95V28.15H38.35V38.35ZM34.95 19.85V13.05H28.15V9.65H38.35V19.85Z" />
        </svg> </a>
</div>

<main>
    <div>

        <div class="page_presentation">
            <h1> Découvrir la baie du mont-saint-Michel </h1>
            <p>Entre Granville et Cancale, la baie du Mont Saint-Michel est le terrain des plus grandes marées d'Europe. Elles permettent chaque année d'admirer le Mont entouré d'eau. La baie c'est aussi un site naturel d'exception. La baie du Mont Saint-Michel est un site touristique incontournable dans la Manche. </p>
        </div>

        <div class="picture_gallery">
            <div class="picture_gallery_img">
                <img src="<?= i('activites/Mt_ST_michel_07.JPG', 'medium') ?>" height=100% width=auto>
                <div class="img_legend" style="top:50%; left:50%;">
                    <div>
                        <i class="material-icons-sharp">search</i>
                    </div>
                    <p>petit phoque se baignant dans la baie</p>
                </div>
            </div>
            <div class="picture_gallery_img">
                <img src="<?= i('activites/IMG_7181.jpg', 'medium') ?>" height=100% width=auto>
                <div class="img_legend" style="top:20%; left:15%;">
                    <div>
                        <i class="material-icons-sharp">search</i>
                    </div>
                    <p>Photo d'algue poussant à même le sable</p>
                </div>
            </div>
            <div class="picture_gallery_img">
                <img src="<?= i('activites/649c3c3c1f3a0dd3b775b45859aeb24d.jpg', 'medium') ?>" height=100% width=auto>
                <div class="img_legend" style="top:75%; left:5%;">
                    <div>
                        <i class="material-icons-sharp">search</i>
                    </div>
                    <p>Photo de mouton broutant des algues dans la baie</p>
                </div>
            </div>
        </div>

        <div class="picture_advice">
            <img src="<?= i('activites/island-4420629_1920.jpg', 'large') ?>">
            <div>
                <h2>conseils photo</h2>
                <div class="picture_advice_legend">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 525.153 525.153" style="enable-background:new 0 0 525.153 525.153;" xml:space="preserve">
                        <g>
                            <path fill=var(--svg-color) d="M137.502,103.586L94.527,60.852L60.852,94.527l42.734,42.712L137.502,103.586z M71.596,238.704H0v47.745h71.596V238.704z
		        M286.449,1.203h-47.745v70.414h47.745V1.203z M464.3,94.527l-33.675-33.675l-42.712,42.734l33.654,33.654L464.3,94.527z
		        M387.672,421.566l42.691,42.975l33.675-33.675l-42.953-42.712L387.672,421.566z M453.557,238.704v47.745h71.596v-47.745H453.557z
		        M262.576,119.341c-79.014,0-143.235,64.222-143.235,143.235s64.222,143.235,143.235,143.235s143.235-64.222,143.235-143.235
		        S341.59,119.341,262.576,119.341z M238.704,523.949h47.745v-70.414h-47.745V523.949z M60.852,430.625L94.527,464.3l42.712-42.975
		        l-33.654-33.654L60.852,430.625z" />
                        </g>
                    </svg>
                    <p>Attendez le bon moment de la journée, et profitez de la météo pour prendre des photos uniques. Les nuages ou le brouillard peuvent donner des effets sympas.</p>

                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="561px" height="561px" viewBox="0 0 561 561" style="enable-background:new 0 0 561 561;" xml:space="preserve">
                        <g>
                            <g id="landscape">
                                <path fill=var(--svg-color) d="M331.5,127.5L234.6,255l73.95,96.9l-40.8,30.6C224.4,326.4,153,229.5,153,229.5L0,433.5h561L331.5,127.5z" />
                            </g>
                        </g>
                    </svg>
                    <p>Eloignez vous un maxium du Mont, afin d’avoir un cadre large et de bien montrer l’etendue de la baie.</p>

                    <svg width="13px" height="22px" viewBox="0 0 13 22" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>directions_walk</title>
                        <desc>Created with Sketch.</desc>
                        <g id="Icons" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Rounded" transform="translate(-209.000000, -3123.000000)">
                                <g id="Maps" transform="translate(100.000000, 3068.000000)">
                                    <g id="-Round-/-Maps-/-directions_walk" transform="translate(103.000000, 54.000000)">
                                        <g>
                                            <polygon id="Path" points="0 0 24 0 24 24 0 24"></polygon>
                                            <path fill=var(--svg-color) d="M13.5,5.5 C14.6,5.5 15.5,4.6 15.5,3.5 C15.5,2.4 14.6,1.5 13.5,1.5 C12.4,1.5 11.5,2.4 11.5,3.5 C11.5,4.6 12.4,5.5 13.5,5.5 Z M9.8,8.9 L7.24,21.81 C7.11,22.42 7.59,23 8.22,23 L8.3,23 C8.77,23 9.17,22.68 9.28,22.22 L10.9,15 L13,17 L13,22 C13,22.55 13.45,23 14,23 C14.55,23 15,22.55 15,22 L15,16.36 C15,15.81 14.78,15.29 14.38,14.91 L12.9,13.5 L13.5,10.5 C14.57,11.74 16.12,12.63 17.86,12.91 C18.46,13 19,12.52 19,11.91 C19,11.42 18.64,11.01 18.15,10.93 C16.63,10.68 15.37,9.78 14.7,8.6 L13.7,7 C13.14,6.11 12.02,5.75 11.05,6.16 L7.22,7.78 C6.48,8.1 6,8.82 6,9.63 L6,12 C6,12.55 6.45,13 7,13 C7.55,13 8,12.55 8,12 L8,9.6 L9.8,8.9 Z" id="🔹-Icon-Color" fill="#1D1D1D"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                    <p>En manque d’originalité ? Parcourez la baie et prenez en photo les animaux, ou les plantes qui s’y trouvent. Il n’y a pas que le Mont-Saint-Michel à photographier !</p>
                </div>
            </div>
        </div>

        <div class="flickrgallery">
            <?php foreach ($topPosts as $post) : ?>
                <div class="flickrpost">
                    <p class="owner"><?= $post->owner ?></p>
                    <a target="_blank" href="<?= $post->display ?>">
                        <img src="<?= $post->thumbnail ?> " height="375">
                    </a>
                    <p class="caption"><?= $post->caption ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <?php

        $quizz = (object) [
            "question" => "Combien y a-t-il d’espèces animales et végétales dans la baie ?",
            "answers" => ["145", "265", "1540", "480"],
            "correct_answer" => "480",
            "read_more" => "",
            "read_more_summary" => "La baie regorge d'espèces animales et végétales. Il y a 480 espèces différentes que vous pouvez voir au Mont-Saint-Michel.",
            "image" => "https://i.imgur.com/7Ey6qjL.png"
        ];

        $_open_quiz_btn = true; ?>
        <div class="main-padding quiz-wrapper">
            <?php include "./includes/components/quizz.php"; ?>
        </div>
    </div>
</main>

<?php include "./includes/components/footer.php"; ?>