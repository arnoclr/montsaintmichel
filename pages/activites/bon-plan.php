<?php
include "./includes/components/navbar.php";
include  './includes/components/modal.php';


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
<div class="architecture">

    <!-- ----- A table with the schedules of the activities ----- -->
    <h2>Horaires d'ouverture de l'abbaye</h2><br>
    <table class="tbl-header">
        <tr class="tr-header">
            <th></th>
            <th>Novembre à Mars</th>
            <th>Avril, mai, juin, septembre</th>
            <th>Octobre</th>
            <th>Juillet - Août</th>
        </tr>
        <tr class="tr">
            <td>
                <p class="txt-bold">Le Mont Saint Michel</p>
            </td>
            <td>
                <p class="txt-bold">Du lundi au dimanche</p>
                <p class="txt">* 10h-17h00 (17h30 pendant<br>
                                les vacances scolaires)<br>
                                * 9h30-18h00 en mars
                </p>
            </td>
            <td>
                <p class="txt-bold">Du lundi au samedi</p>
                <p class="txt">9h30-18h30</p>
                <p class="txt-bold">Le dimanche</p>
                <p class="txt">9h30-18h00</p>
            </td>
            <td>
                <p class="txt-bold">Du lundi au samedi</p>
                <p class="txt">9h30-17h30</p>
                <p class="txt-bold">Le dimanche</p>
                <p class="txt">9h30-17h00</p>
            </td>
            <td>
                <p class="txt-bold">Du lundi au dimanche</p>
                <p class="txt">9h30-19h00</p>
            </td>
        </tr>
    </table><p><br><br><br><br><br></p> 
    <!-- ----- End of the table ----- -->

    
    <img loading="lazy" src="./static/img/@1024__1c071647d838cf95615472d5b569ab3daec018c57dd1d07324052442914ab322.webp" class="card__media-img">

    <div class="card__media-content">
        <p class="card__media-text"><br>
        Haut lieu de pèlerinage du VIIIe au XVIIIe siècle, l'abbaye du Mont-Saint-Michel représente l'un des exemples les plus remarquables de l'architecture à la fois religieuse et militaire de l'époque médiévale.
        Véritable prodige d'architecture, vous y découvrirez près de 20 salles dont l'église abbatiale, le cloître entièrement restauré en 2017, le réfectoire, le promenoir des moines...
        Depuis son piteux rocheux, l'abbaye offre également un point de vue unique sur la baie du Mont-Saint-Michel et son immensité.<br>
        </p>
    </div><br>

    <!--- ----- Usefull informations ----- -->
    <h2>Informations pratiques</h2>
    <div class="card__media-content">
        <h5>- Visite libre -</h5>
        <p><b>Durée</b> : de 30 min à 1h30<br>
            <b>Tarifs 2022</b> :<br>
            - plein tarif : 11€ par personne - gratuité pour les moins de 26 ans (ressortissants de l'UE ou résidents réguliers de l'UE - hors groupes)<br>
            - tarif groupes : 9€ par personne.
        </p>
        <h5>- Visite avec audioguide -</h5>
        <p><b>Durée</b> : 1h environ.<br>
        <b>Tarifs 2022</b> : 3€ par appareil (en supplément du droit d'entrée).<br>
        Sur réservation ou sur place sous réserve de disponibilité.
        </p>
        <h5>- Parcours nocturne -</h5>
        <p>Un parcours nocturne est proposé en juillet et en août.<br>
        Tarification spécifique.
        </p>
        <h5>Pour rappel : prévoir environ 45 min / 1h entre les parkings et l’entrée de l’abbaye.<br>
        Le port du masque est fortement recommandé.</h5>
    </div><br>

    <!--- ----- Link to virtual visit ----- -->
    <h2>Avant de partir</h2>
    <p>Venez essayer la visite virtuelle pour découvrir l'abbaye du Mont Saint Michel.</p>
    <a id="skip-content" href="/visite-virtuelle" class="btn btn--primary btn--large"><?= t('index.hero.visit') ?></a>
    <br><br><br><br>
    <!--- ----- Other activities ----- -->

    <h2>Autres activités a découvir autour du Mont</h2>

    <p class="card__media-text"> Il existe aussi beaucoup d'activités autour du Mont Saint Michel, notamment des randonnées. Vous pourrez trouver ci dessous deux randonées ainsi que le site pour en savoir plus.</p>
    <div class="randonnee">
        <div class="rando">
            <h5>Le Grouin du Sud et le Prieuré Saint-Léonard</h5>
            <ul>
                <li>
                    <p>
                        <b>Durée: 3h25</b> 
                    </p>
                </li>
                <li>
                    <p> 
                        <b>Distance: 11,58km</b>
                    </p>
                </li>
                <li>
                    <p>
                        <b>Difficulté: Moyenne</b>
                    </p>
                </li>
                <li>
                    <p>
                        <b> Départ à Genêts - 50 - Manche</b>
                    </p>
                </li>
                <div class="picture_gallery">
                    <div class="picture_gallery_img"> 
                        <img class="imgs" src="<?= i('activites/carte_rando_1.png', 'small') ?>" alt="">
                    </div>
                <div class="picture_gallery_img">
                    <img class='imgs' src="<?= i('activites/Randonees/Rando1/m-mont-saint-michel-visorando-230077.jpg', 'small') ?>" alt="" height=100% width=auto>
                </div>
                <div class="picture_gallery_img">
                    <img class='imgs' src="<?= i('activites/Randonees/Rando1/m-la-pointe-du-grouin-du-sud-visorando-127396.jpg', 'small') ?>" alt="" height=100% width=auto>
                </div>
                <div class="picture_gallery_img">
                    <img class='imgs' src="<?= i('activites/Randonees/Rando1/m-un-echalier-visorando-89287.jpg', 'small') ?>" alt="" height=100% width=auto>
                </div>
            </div>
        </div>

        <div class="rando">
            <h5>De Bacilly au Bec d'Andaine par les sentiers ruraux</h5>
            <ul>
                <li>
                    <p>
                        <b>Durée: 3h10</b> 
                    </p>
                </li>
                <li>
                    <p> 
                        <b>Distance: 11,79km</b>
                    </p>
                </li>
                <li>
                    <p>
                        <b>Difficulté: Facile</b>
                    </p>
                </li>
                <li>
                    <p>
                        <b> Départ à Bacilly - 50 - Manche</b>
                    </p>
                </li>
                <div class="picture_gallery">
                    <div class="picture_gallery_img"> 
                        <img class="imgs" src="<?= i('activites/carte_rando_2.png', 'medium') ?>" alt="">
                    </div>    
                <div class="picture_gallery_img">
                    <img class='imgs' src="<?= i('activites/Randonees/Rando2/m-lever-de-soleil-sur-la-baie-du-mont-saint-michel-1-visorando-48478.jpg', 'small') ?>" alt="" height=100% width=auto>
                </div>
                <div class="picture_gallery_img">
                    <img class='imgs' src="<?= i('activites/Randonees/Rando2/m-lever-de-soleil-sur-la-baie-du-mont-saint-michel-2-visorando-48479.jpg', 'small') ?>" alt="" height=100% width=auto>
                </div>
                <div class="picture_gallery_img">
                    <img class='imgs' src="<?= i('activites/Randonees/Rando2/m-lever-de-soleil-sur-la-baie-du-mont-saint-michel-3-visorando-48480.jpg', 'small') ?>" alt="" height=100% width=auto>
                </div>
            </div>
        </div>
    </div>
    <p class="card__media-text"> Pour en savoir plus sur ces randonnées et en découvrir beaucoup d'autre, visitez le site: <a href="https://www.visorando.com/randonnee-le-mont-saint-michel.html">www.visorando.com/randonnee-le-mont-saint-michel.com</a></p>




</div>

<?php include "./includes/components/footer.php"; ?>