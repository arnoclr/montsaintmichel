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
    const scrollIndicator = document.getElementById("js-scroll_indicator")
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
