<?php include "./includes/components/navbar.php"; ?>

<main class="frise">

    <div class="frise__header">
        <ul class="frise__timeline frise__timeline--date js-date-scroller">
            <li class="frise__timeline-date frise__timeline-date--active">700</li>
            <li class="frise__timeline-date">800</li>
            <li class="frise__timeline-date">900</li>
            <li class="frise__timeline-date">1000</li>
            <li class="frise__timeline-date">1100</li>
            <li class="frise__timeline-date">1200</li>
            <li class="frise__timeline-date">1300</li>
            <li class="frise__timeline-date">1400</li>
            <li class="frise__timeline-date">1500</li>
            <li class="frise__timeline-date">1600</li>
            <li class="frise__timeline-date">1700</li>
            <li class="frise__timeline-date">1800</li>
            <li class="frise__timeline-date">1900</li>
            <li class="frise__timeline-date">2000</li>
        </ul>
        <div class="frise__timeline-line"></div>
    </div>

    <div class="frise__timeline frise__timeline--content js-content-scroller">
        <?php for ($i = 0; $i < 10; $i++) : ?>
            <div class="frise__content">
                <?php for ($j = 0; $j < 10; $j++) : ?>
                    <span class="frise__content-date">708</span>
                    <div class="frise__content-card">
                        <div class="image-carousel frise__content-card-img" data-images='[{"src": "https://i.imgur.com/58Iltu3.jpg", "attr": "some copyright"}, {"src": "https://i.imgur.com/SDxoNPY.png"}]'></div>
                        <div class="frise__content-card-text">
                            <h3>Un titre</h3>
                            <p>l’évêque Aubert fait ériger sur ce Mont un Sanctuaire, en l’honneur de l’Archange Saint-Michel (qui, d’après la légende, lui serait apparu et lui aurait ordonné de le faire). Le crâne de l’abbé Aubert repose aujourd’hui dans la basilique d'Avranches. Ce sanctuaire avait en fait la forme d’une petite grotte, qui ne peut contenir qu’une centaine de fidèles.</p>
                        </div>
                    </div>
                <?php endfor; ?>
                <div class="frise__content-next">
                    <span>Scrollez pour voir le siècle suivant</span>
                </div>
            </div>
        <?php endfor; ?>
    </div>
        
</main>