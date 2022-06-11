const backToTopButton = document.querySelector('.js-btt');
const dates = document.querySelectorAll('.js-date');


window.addEventListener('scroll', () => {

    scrollIndicator();

    if (window.scrollY > 1200) {
        backToTopButton.classList.add('visible');
    } else {
        backToTopButton.classList.remove('visible');
    }

    dates.forEach(date => {
        const rect = date.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            const urlDate = window.location.hash.substr(1);
            if (date.id != urlDate) {
                window.history.replaceState(null, null, `#${date.id}`);
            }
            return;
        }
    });


});

backToTopButton.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});

function scrollIndicator() {
    let winScroll = document.body.scrollTop || document.documentElement.scrollTop;
    let height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
    let scrolled = (winScroll / height) * 100;
    const scrollIndicator = document.getElementById("js-scroll_indicator");
    const navbar = document.querySelector('.js-navbar');

    if (window.scrollY > 100) {
        scrollIndicator.style.cssText = `
            position: fixed;
            top: calc(${navbar.offsetHeight}px);
            height: 4px;
            z-index: 1;
            width: ${scrolled}%;
            animation: bar-enter .3s ease-in-out forwards;
        `;
    } else {
        scrollIndicator.style.cssText = `
            width: 0%;
        `;
    }
}

const audio = document.querySelector('.js-audio');

const audioDurationToDates = {
    0: 708,
    20: 867,
    29: 900,
    33: 1000,
    42: 1023,
    60: 1100,
    69: 1200,
    87: 1204,
    100: 1300,
    107: 1400,
    113: 1419,
    124: 1421,
    130: 1521,
    136: 1446,
    151: 1500,
    163: 1600,
    169: 1790,
    187: 1800,
    198: 1863,
    202: 1874,
    209: 1879,
    217: 1897,
    232: 1900,
    238: 1966,
    251: 1969,
    258: 1979,
    266: 1983,
    276: 2000,
    284: 2001
};

audio.addEventListener('timeupdate', () => {
    const currentTime = Math.floor(audio.currentTime);
    const date = audioDurationToDates[currentTime];
    if (date) {
        const el = document.getElementById(date);
        if (el) {
            el.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    }
});
