<?php
$navbar_classes = "navbar--open js-fixed";
include "./includes/components/navbar.php";
?>

<main>

    <h1>Notre équipe.</h1>

    <div class="cols">
        <div class="col">
            <div class="member">
                <div class="member__avatar">
                    <img src="https://cdn.arnocellarier.fr/s/iut/msm/assets/member%20border.svg" class="member__border">
                    <img class="member__photo" src="<?= i('team/arno.jpg') ?>" alt="Arno Cellarier">
                </div>
                <span class="member__name">Arno Cellarier.</span>
                <span class="member__role">Chef de Projet</span>
                <ul class="member__roles">
                    <li>Chef de l'équipe </li>
                    <li>Designer du wireframing</li>
                    <li>Développeur et designer du site principal</li>
                    <li>Création de la base de données</li>
                </ul>
                <div class="member__links">
                    <a href="mailto:msm@arnocellarier.fr">msm@arnocellarier.fr</a></li>
                    <a href="https://www.linkedin.com/in/arno-cellarier/" target="_blank">Linkedin</a>
                </div>
            </div>

            <div class="member">
                <div class="member__avatar">
                    <img src="https://cdn.arnocellarier.fr/s/iut/msm/assets/member%20border.svg" class="member__border">
                    <img class="member__photo" src="<?= i('team/gabriel.jpg') ?>" alt="Gabriel François">
                </div>
                <span class="member__name">Gabriel François.</span>
                <span class="member__role">Développeur et chargé de contenu</span>
                <ul class="member__roles">
                    <li>Développeur du site </li>
                    <li>En charge de la Bêta-Test</li>
                    <li>En charge des recherches des textes en architecture et biodiversité </li>
                    <li>En charge des des images </li>
                </ul>
                <div class="member__links">
                    <a href="mailto:gfrancois2003+unesco@gmail.com">gfrancois2003+unesco@gmail.com</a>
                    <a href="https://www.linkedin.com/in/gabriel-fran%C3%A7ois-855988222/" target="_blank">Linkedin</a>
                </div>
            </div>

            <div class="member">
                <div class="member__avatar">
                    <img src="https://cdn.arnocellarier.fr/s/iut/msm/assets/member%20border.svg" class="member__border">
                    <img class="member__photo" src="<?= i('team/christopher.jpg') ?>" alt="Christopher Beaurain">
                </div>
                <span class="member__name">Christopher Beaurain.</span>
                <span class="member__role">Ancien Chef de Projet</span>
                <ul class="member__roles">
                    <li>Développeur et designer du site </li>
                    <li>Designer du wireframing </li>
                    <li>Community manager </li>
                </ul>
                <div class="member__links">
                    <a href="https://www.linkedin.com/in/christopher-beaurain-a464b0173/" target="_blank">Linkedin</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="member">
                <div class="member__avatar">
                    <img src="https://cdn.arnocellarier.fr/s/iut/msm/assets/member%20border.svg" class="member__border">
                    <img class="member__photo" src="<?= i('team/yael.png') ?>" alt="Yaël Coëffier">
                </div>
                <span class="member__name">Yaël Coëffier.</span>
                <span class="member__role">Développeur et Traducteur</span>
                <ul class="member__roles">
                    <li>En charge des traductions du site </li>
                    <li>Traducteur anglais </li>
                    <li>Community manager </li>
                    <li>Développeur du site </li>
                    <li>Designer du site </li>
                    <li>Gestion de la base de données </li>
                </ul>
                <div class="member__links">
                    <a href="mailto:yael.coeffier+unesco@gmail.com"> yael.coeffier+unesco@gmail.com</a>
                    <a href="https://www.linkedin.com/in/ya%C3%ABl-co%C3%ABffier-12a633227/" target="_blank">Linkedin</a>
                </div>
            </div>

            <div class="member">
                <div class="member__avatar">
                    <img src="https://cdn.arnocellarier.fr/s/iut/msm/assets/member%20border.svg" class="member__border">
                    <img class="member__photo" src="<?= i('team/clement.jpg') ?>" alt="Clément De Simon">
                </div>
                <span class="member__name">Clément De Simon.</span>
                <span class="member__role">Développeur et chargé de contenu</span>
                <ul class="member__roles">
                    <li>Développeur du site </li>
                    <li>En charge des recherches des textes en histoire </li>
                    <li>Gestion de la base de données </li>
                </ul>
                <div class="member__links">
                    <a href="mailto:clement.desimon+unesco@gmail.com">clement.desimon+unesco@gmail.com</a>
                    <a href="https://www.linkedin.com/in/cl%C3%A9ment-de-simon-71b632227/" target="_blank">Linkedin</a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include "./includes/components/footer.php"; ?>