<?php
include "./includes/components/navbar.php"; 
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
        $today = date('Y-m-d');

        echo '<div class="scheduleOpen">';
        echo '<input type="date" class="dateSchedule" id="date" name="date" value="'.$today.'" min="2022-01-01" max="9999-12-31">';
        echo '</div>';
    ?>

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
        echo '<p class="scheduleContainer">Horaires : '. $schedule . '</p>';

    ?>

    <div class="ticketing">
        <a href="https://www.decouvrirlabaie.com/tarifs-horaires-reservations/" target="_blank" class="btn">Réserver</a>
    </div><br><br>

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
    <div class="ticketing">
        <a href="http://www.club-taniere.fr/index.php/l-ecole-d-equitation-du-centre-equestre-la-taniere-au-mont-saint-michel/activites"  target="_blank" class="btn">Réserver</a>
        </br></br>
    </div>

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
    <div class="ticketing">
        <a href="https://www.sport-decouverte.com/bapteme-gyrocoptere-baie-mont-saint-michel.html?gclid=CjwKCAjws8yUBhA1EiwAi_tpEcoakw6-oJ0tbho-6cP2Txb_70oZpf3a4Od2xGj7ug48YYeLUgsMShoCJAwQAvD_BwE" target="_blank" class="btn">Réserver</a></br></br>
    </div>
    
    
    
</div>

<?php include "./includes/components/footer.php"; ?>