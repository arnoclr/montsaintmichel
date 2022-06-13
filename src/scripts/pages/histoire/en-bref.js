const CDN = "https://cdn.arnocellarier.fr/s/iut/msm/mp3/";

const audio = new Audio();

const navbar = document.querySelector(".js-navbar");
const main = document.querySelector("main");

function playAudioKey(key) {
    let audioState = 'question';

    audio.src = CDN + "quest_" + key + ".mp3";

    audio.play();

    audio.addEventListener("ended", () => {
        if (audioState === 'question') {
            audio.src = CDN + "rep_" + key + ".mp3";
            audio.play();
            audioState = 'answer';
        }
    });
}

let lastScrollX = 0;

const tiles = document.querySelectorAll(".ns__tile");
const unmute = document.querySelector(".unmute-btn");

let currentPlayKey = tiles[0].id;

main.addEventListener("scroll", throttle(() => {
    const scrollX = main.scrollLeft;

    if (scrollX > lastScrollX) {
        navbar.classList.remove("navbar--open");
    } else {
        navbar.classList.add("navbar--open");
    }

    lastScrollX = scrollX;
}, 150));

main.addEventListener("scroll", debounce(() => {
    // detect on what tile we are
    for (let i = 0; i < tiles.length; i++) {
        const tile = tiles[i];
        const tileRect = tile.getBoundingClientRect();

        if (tileRect.left < 200 && tileRect.right > 0) {
            const key = tile.id;
            if (key != currentPlayKey) {
                playAudioKey(key);
                currentPlayKey = key;
            }
        }
    }
}, 350));

// bind trackpad and wheel scroll
main.addEventListener("wheel", e => {
    main.scrollLeft += e.deltaY;
});

let audioEnabled = false;
document.addEventListener("click", () => {
    if (audioEnabled) return;
    playAudioKey(currentPlayKey);
    unmute.style.display = "none";
    audioEnabled = true;
});
