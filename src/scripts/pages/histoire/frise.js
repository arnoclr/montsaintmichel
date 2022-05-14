const backToTopButton = document.querySelector('.js-btt');
const dates = document.querySelectorAll('.js-date');

window.addEventListener('scroll', () => {
    if (window.scrollY > 1200) {
        backToTopButton.classList.add('visible');
    } else {
        backToTopButton.classList.remove('visible');
    }

    dates.forEach(date => {
        const rect = date.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            window.history.replaceState(null, null, `#${date.id}`);
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
