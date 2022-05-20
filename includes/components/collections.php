<?php

// Mont-Saint-Michel
$images_gallerie = [
    "Balade à Cheval sur la Baie du Mont-Saint-Michel" => "https://i.imgur.com/c3XjfOXl.jpg",
    "Couloir de l'Abbaye du Mont-Saint-Michel" => "https://i.imgur.com/uTqLjJXl.jpg",
    "Dessins des Cryptes du Mont-Saint-Michel" => "https://i.imgur.com/q9m6G0g.png",
    "Intérieur de l'Abbaye du Mont-Saint-Michel" => "https://i.imgur.com/NfUII9il.jpg",
    "Cabine extérieure du Mont-Saint-Michel" => "https://i.imgur.com/XqRFtdfl.jpg",
    "Deux anciennes bombardes du Mont-Saint-Michel" => "https://i.imgur.com/TQwi7ejl.jpg",
    "Vue aérienne du Mont-Saint-Michel" => "https://i.imgur.com/WGfpCOPl.jpg",
    "Mont-Saint-Michel" => "https://i.imgur.com/kN9dCewl.jpg",
    "Aperçu de la flèche du Mont-Saint-Michel" => "https://i.imgur.com/ibLaiGMl.jpg",
    "Ancien dessin du Mont-Saint-Michel" => "https://i.imgur.com/n5F2wjk.png",
    "Ancien dessin du Mont-Saint-Michel" => "https://i.imgur.com/u7B9ciIl.jpg",
    "Chambre d'un musée du Mont-Saint-Michel" => "https://i.imgur.com/8YKUkVZl.jpg",
    "Marche de moines du Mont-Saint-Michel" => "https://i.imgur.com/zgGWSSXl.jpg",
    "Prière général de moines du Mont-Saint-Michel" => "https://i.imgur.com/3J4JT9Gl.jpg",
    "Photographie d'un homme tenant un fer à repasser au Mont-Saint-Michel" => "https://i.imgur.com/s3FVBiOl.jpg",
    "Ancien réfectoire du Mont-Saint-Michel" => "https://i.imgur.com/SegycCUl.jpg",
    "Repas de soeurs du Mont-Saint-Michel" => "https://i.imgur.com/0IxUTZVl.jpg",
    "Grande prière au Mont-Saint-Michel" => "https://i.imgur.com/YtJBOfE.png",
    "Prière de deux moines au Mont-Saint-Michel" => "https://i.imgur.com/J34a5VYl.jpg",
    "Repas de moines au Mont-Saint-Michel" => "https://i.imgur.com/8qgUm2G.png",
    "Peinture de l'Archange Saint-Michel" => "https://i.imgur.com/IS5hIB9.png",
    "Ancienne sculpture au Mont-Saint-Michel" => "https://i.imgur.com/2DI3msi.png",
    "Ancienne sculpture au Mont-Saint-Michel" => "https://i.imgur.com/3joZ6hx.png",
    "Sculpture de Saint-Michel" => "https://i.imgur.com/dipA501.png",
    "Dame qui prie au Mont-Saint-Michel" => "https://i.imgur.com/1Eub0h8l.jpg",
    "Le Train Marin du Mont-Saint-Michel" => "https://i.imgur.com/zuvyNJql.jpg",
    "Vitraux de la nef du Mont-Saint-Michel" => "https://i.imgur.com/GCmbFGPl.jpg",
];
?>

<div class="modal-wrapper" id="modal-wrapper"></div>
<div class="modal" id="modal">
    <div class="modal-inner">
        <img src="" alt="">
        <div class="modal-bar"></div>
        <span class="caption"></span>
    </div>
</div>

<div class="collection__img-wrap js-collection__img-wrap">
    <?php foreach ($images_gallerie as $key => $value) : ?>
        <div class="collection__img-item">
            <img class="imgs" src="<?= $value ?>" alt="<?= $key ?>" loading="lazy">
        </div>
    <?php endforeach; ?>
</div>
