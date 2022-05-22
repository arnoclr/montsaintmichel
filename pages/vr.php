<main class="vr">
    <button onclick="window.history.back();" title="Retour" class="vr__back-button"><span class="material-icons-sharp">arrow_back</span></button>

    <aside class="vr__loader" style="display: none;">
        <i class="loader medium white"></i>
    </aside>

    <video class="vr__3D js-video" poster="https://cdn.arnocellarier.fr/s/iut/msm/vv/1080/photo%20(1).webp" autoplay muted disablepictureinpicture>
        <source class="js-source" src="" type="video/mp4">
    </video>

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

        <div id="js-vr-modal-images" class="vrslider js-draggable">
        </div>
    </div>

    <div class="vr__buttons hide-on-small">
        <button class="vr__buttons-button material-icons-sharp" onclick="switchLocation(-1);"
                title="Naviguer vers l'endroit précédent">navigate_before
        </button>
        <button id="skip-content" class="vr__buttons-button material-icons-sharp" onclick="switchLocation(1);"
                title="Naviguer vers l'endroit suivant">navigate_next
        </button>
    </div>

    <a href="javascript:alert('Images &copy; Google Earth Studio. Landsat / Copernicus, Data SIO, NOAA, U.S. Navy, NGA, GEBCO, TerraMetrics');"
       class="vr__attribution">&copy; Google Earth :: informations</a>
</main>