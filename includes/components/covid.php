<div class="covid">
    <div class="covid__icon">
        <i class="material-icons-sharp">coronavirus</i>
    </div>
    <div class="covid__content">
        <h3 class="covid__content-title">Informations COVID-19</h3>
        <p class="covid__content-text">En application des mesures gouvernementales de lutte contre la propagation de la COVID19, le pass sanitaire est obligatoire pour accéder à l’abbaye et aux restaurants pour toutes les personnes de  plus de 12 ans et 2 mois. A compter du 29 novembre 2021 la durée de validité des tests PCR et antigéniques sera de 24h.</p>
    </div>
</div>

<style>
    .covid {
        background-color: #CF4845;
        padding: 22px var(--padding) 22px 0;
        display: grid;
        grid-template-columns: var(--padding) 1fr;
    }

    .covid__icon {
        position: relative;
    }

    .covid__icon i {
        position: absolute;
        top: 16px;
        right: 16px;
        color: #fff;
    }

    .covid__content-title {
        font: 700 18px Montserrat, sans-serif;
        text-transform: uppercase;
        color: #fff;
    }

    .covid__content-text {
        font: 400 14px Noto Sans, sans-serif;
        color: #fff;
    }
</style>