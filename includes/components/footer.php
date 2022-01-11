<footer class="footer">
    <div class="footer__col">
        <img width="80" height="80" src="/image.php?url=logos/logo_mont_saint_michel.png&as=png" alt="Logo mont saint michel">
        <p class="footer__col-text">Projet étudiant, BUT Informatique, en partenariat avec le Forum UNESCO.</p>
    </div>
    <div class="footer__col footer__col--links">
        <a href="/conditions-d-utilisation" class="footer__col-link">Conditions d'utilisation</a>
        <a href="/a-propos" class="footer__col-link">A propos</a>
        <a href="#" class="footer__col-link">Site UNESCO</a>
        <a href="//univ-gustave-eiffel.fr" class="footer__col-link">Université Gustave Eiffel</a>
    </div>
    <div class="footer__col">
        <h3 class="footer__col-title">Nos partenaires</h3>
        <div class="partnersgrid">
            
        </div>
    </div>
</footer>

<style>
    .footer {
        padding: 48px var(--padding) 32px var(--padding);
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 32px;
        background-color: #eee;
    }

    .footer__col-title {
        font: 400 28px Ibarra Real Nova, serif;
        text-transform: uppercase;
        margin-top: 0;
    }

    .footer__col--links {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .footer__col-link {
        width: fit-content;
        text-decoration: none;
        font: 400 16px Noto Sans, sans-serif;
        color: #515151;
        border-bottom: 2px dotted transparent;
    }

    .footer__col-link:hover {
        border-bottom: 2px dotted #515151;
    }
</style>
