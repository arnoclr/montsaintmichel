<main class="vr">
    <button onclick="window.history.back();" title="Retour" class="vr__back-button"><span class="material-icons-sharp">arrow_back</span></button>
    <img class="vr__3D js-vr-3D-img" src="https://cdn.arnocellarier.fr/s/iut/msm/vv/1080/photo (1).webp"
         alt="Vue en 3D du Mont-Saint-Michel issue de Google Earth">

    <div class="vr__modal">
        <div class="vr__modal-header">
            <button class="vr__modal-header-button material-icons-sharp hide-on-large" onclick="switchLocation(-1);">
                arrow_back
            </button>
            <h2 id="js-vr-modal-name" class="vr__modal-header-title">Appuyez pour commencer</h2>
            <span id="js-vr-modal-progress" class="vr__modal-header-progress"></span>
            <button class="vr__modal-header-button material-icons-sharp hide-on-large" onclick="switchLocation(1);">
                arrow_forward
            </button>
        </div>
        <p id="js-vr-modal-desc">La chapelle Saint-Aubert est une chapelle catholique. Elle est située sur une
            excroissance rocheuse à l'extrémité nord-ouest du Mont-Saint-Michel.</p>

        <div id="js-vr-modal-images" class="vrslider">
        </div>
    </div>

    <div class="vr__buttons hide-on-small">
        <button class="vr__buttons-button material-icons-sharp" onclick="switchLocation(-1);"
                title="Naviguer vers l'endroit précédent">navigate_before
        </button>
        <button class="vr__buttons-button material-icons-sharp" onclick="switchLocation(1);"
                title="Naviguer vers l'endroit suivant">navigate_next
        </button>
    </div>

    <a href="javascript:alert('Images &copy; Google Earth Studio. Landsat / Copernicus, Data SIO, NOAA, U.S. Navy, NGA, GEBCO, TerraMetrics');"
       class="vr__attribution">&copy; Google Earth :: informations</a>
</main>

<a id="js-hashlink" style="display: none;" href=""></a>