<footer class="footer">

    <div class="footer__col-wrap">
        <div class="footer__col col1">
            <h3 class="footer_section"><?= t('footer.title.link') ?></h3>
            <div class="footer__links">
                <a href="/remerciements" class="footer__col-link"><?= t('footer.project.thanks') ?></a>
                <a href="/equipe" class="footer__col-link"><?= t('footer.project.team') ?></a>
                <a href="https://www.unesco.org" target="_blank" class="footer__col-link"><?= t('footer.project.website') ?></a>
                <a href="https://www.univ-gustave-eiffel.fr/" target="_blank" class="footer__col-link"><?= t('footer.project.eiffel') ?></a>
                <a href="/legal" class="footer__col-link"><?= t('footer.project.about') ?> - <?= t('footer.project.policy') ?></a>
            </div>
        </div>
        <div class="footer__col col2">
            <h3 class="footer_section"><?= t('footer.title.other') ?></h3>
            <div class="footer__links">
                <a href="https://beta.yaelcoeffier.com/" target="_blank" class="footer__col-link">COËFFIER Yaël</a>
                <a href="https://arnocellarier.fr/?utm_source=MSM_BUT1" target="_blank" class="footer__col-link">CELLARIER Arno</a>
                <a href="https://www.linkedin.com/in/cl%C3%A9ment-de-simon-71b632227/" target="_blank" class="footer__col-link">DE SIMON Clément</a>
                <a href="https://www.linkedin.com/in/christopher-beaurain-a464b0173/" target="_blank" class="footer__col-link">BEAURAIN Christopher</a>
                <a href="https://www.linkedin.com/in/gabriel-fran%C3%A7ois-855988222/" target="_blank" class="footer__col-link">FRANÇOIS Gabriel</a>
            </div>
        </div>
    </div>

    <div class="bar"></div>

    <div class="footer__row">
        <h3 class="footer_section footer__row-title"><?= t('footer.title.partners') ?></h3>
        <div class="partnersflex">
            <div class="img_row">
                <a href="http://idea.univ-paris-est.fr/fr" target="_blank"><img src="../../src/img/partners/idea.png" class="noir" alt="idea" height="80"></a>
                <a href="https://www.univ-gustave-eiffel.fr/" target="_blank"><img src="../../src/img/partners/gustave_eiffel.png" alt="Université Gustave Eiffel" height="80"></a>
                <img src="../../src/img/partners/mcn_logo.png" alt="Médiation Culturelle Numérique" height="80">
                <a href="https://anr.fr/" target="_blank"><img src="../../src/img/partners/anr_logo.png" alt="Agence nationale de la Recherche" height="80"></a>
                <a href="https://www.icomos.org/" target="_blank"><img src="../../src/img/partners/icomos.png" alt="ICOMOS" height="100" width="90"></a>
                <a href="https://en.unesco.org/forum" target="_blank"><img src="../../src/img/partners/forum.png" class="noir" alt="Forum Unesco" height="120"></a>
                <a href="https://www.unesco.org" target="_blank"><img src="../../src/img/partners/unesco.png" alt="UNESCO" height="80"></a>
            </div>
        </div>
    </div>

    <p class="copyright__footer">Copyright &copy; 2022 ⋅ <?= t('footer.copyright.text') ?></p>
</footer>