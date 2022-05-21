<?php
include "./includes/components/navbar.php";

$context = stream_context_create(
    array(
        "http" => array(
            "header" => "User-Agent: " . $_SERVER['HTTP_USER_AGENT']
        )
    )
);

$instaQuery = file_get_contents("https://www.instagram.com/explore/tags/baiemontsaintmichel/?__a=1", false, $context);
$instaJSON = json_decode($instaQuery);

$topPostsApi = $instaJSON->graphql->hashtag->edge_hashtag_to_top_posts->edges;

$topPosts = [];

for ($i = 0; $i < min(5, count($topPostsApi)); $i++) {
    $filtered = (object) [
        "thumbnail" => $topPostsApi[$i]->node->thumbnail_src,
        "display" => $topPostsApi[$i]->node->display_url,
        "caption" => $topPostsApi[$i]->node->edge_media_to_caption->edges[0]->node->text,
    ];

    $topPosts[] = $filtered;
}
?>

<!-- TODO: retirer après finalisation de la page -->
<div class="hl-disclaimer">
    <i class="material-icons-sharp">error</i>
    <span>Désolé, cette page est encore en construction.</span>
</div>
<style>
    .hl-disclaimer {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px var(--padding);
        background-color: #ffd600;
        font-family: Noto Sans, Arial, sans-serif;
        color: #000;
    }
</style>
<!-- fin disclaimer -->

<main>
<div>
    <div class="top_img">
        <img class="img_bay_top" src="<?= i('activites/baie.png', 'medium') ?>" alt="">
        <a class="button_map" href="/map">
        <svg class="map-logo" xmlns="http://www.w3.org/2000/svg" height="48" width="48"><path d="M9.65 38.35V28.15H13.05V34.95H19.85V38.35ZM9.65 19.85V9.65H19.85V13.05H13.05V19.85ZM28.15 38.35V34.95H34.95V28.15H38.35V38.35ZM34.95 19.85V13.05H28.15V9.65H38.35V19.85Z"/></svg>        </a>
    </div>

    <div class="page_presentation">
        <h1> Découvrir la baie du mont-saint-Michel </h1>
        <p>Entre Granville et Cancale, la baie du Mont Saint-Michel est le terrain des plus grandes marées d'Europe. Elles permettent chaque année d'admirer le Mont entouré d'eau. La baie c'est aussi un site naturel d'exception. La baie du Mont Saint-Michel est un site touristique incontournable dans la Manche. </p>
    </div>

    <div class="picture_gallery">
        <div class="picture_gallery_img">
            <img src="<?=i('activites/Mt_ST_michel_07.JPG', 'medium') ?>" height=100% width=auto>
            <div class="img_legend">
                <div>
                    <i class="material-icons-sharp">search</i>
                </div>
                <p>petit phoque se baignant dans la baie</p>
            </div>
        </div>
        <div class="picture_gallery_img">
            <img src="<?=i('activites/IMG_7181.jpg', 'medium') ?>" height=100% width=auto>
            <div class="img_legend">
                <div>
                    <i class="material-icons-sharp">search</i>
                </div>
                <p>Photo d'algue poussant à même le sable</p>
            </div>
        </div>
        <div class="picture_gallery_img">
            <img src="<?=i('activites/649c3c3c1f3a0dd3b775b45859aeb24d.jpg', 'medium') ?>" height=100% width=auto>
            <div class="img_legend">
                <div>
                    <i class="material-icons-sharp">search</i>
                </div>
                <p>Photo de mouton broutant des algues dans la baie</p>
            </div>
        </div>
    </div>

    <div>
        <img>
        <div>
            <h2>conseils photo</h2>
            <div>
                <img>
                <p>Attendez le bon moment de la journée, et profitez de la météo pour prendre des photos uniques. Les nuages ou le brouillard peuvent donner des effets sympas.</p>
            </div>

            <div>
                <img>
                <p>Eloignez vous un maxium du Mont, afin d’avoir un cadre large et de bien montrer l’etendue de la baie.</p>
            </div>

            <div>
                <img>
                <p>En manque d’originalité ? Parcourez la baie et prenez en photo les animaux, ou les plantes qui s’y trouvent. Il n’y a pas que le Mont-Saint-Michel à photographier !</p>
            </div>
        </div>
    </div>

    <?php foreach ($topPosts as $post): ?>
        <div>
            <img src="<?= $post->thumbnail ?>">
            <p><?= $post->caption ?></p>
        </div>
    <?php endforeach; ?>
</div>
</main>

<?php include "./includes/components/footer.php"; ?>