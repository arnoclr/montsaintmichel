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
const playBtn = document.querySelector(".play");

let currentPlayKey = tiles[0].id;

function currentTile() {
    // detect on what tile we are
    for (let i = 0; i < tiles.length; i++) {
        const tile = tiles[i];
        const tileRect = tile.getBoundingClientRect();

        if (tileRect.left < 200 && tileRect.right > 0) {
            return tile;
        }
    }

    return null;
}

function changeTile(direction) {
    let currentTileIndex = 0;

    for (let i = 0; i < tiles.length; i++) {
        if (tiles[i] === currentTile()) {
            currentTileIndex = i;
            break;
        }
    }

    const nextTileIndex = currentTileIndex + direction;
    tiles[nextTileIndex].scrollIntoView({
        behavior: "smooth",
        block: "center"
    });
}

function setButtonToPlaying() {
    playBtn.classList.add("playing");
    audio.title = "Mettre en pause";
    audio.play();
}

function setButtonToPause() {
    playBtn.classList.remove("playing");
    audio.title = "Reprendre la lecture";
    audio.pause();
}

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
    const key = currentTile().id;
    if (key != currentPlayKey) {
        playAudioKey(key);
        setButtonToPlaying();
        currentPlayKey = key;
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
    playBtn.style.display = null;
    audioEnabled = true;
});

playBtn.addEventListener("click", e => {
    const isPlaying = !audio.paused;

    if (isPlaying) {
        setButtonToPause();
    } else {
        setButtonToPlaying();
    }
});