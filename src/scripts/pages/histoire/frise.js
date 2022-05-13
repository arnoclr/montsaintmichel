const backToTopButton = document.querySelector('.js-btt');

window.addEventListener('scroll', () => {
    if (window.scrollY > 1200) {
        backToTopButton.classList.add('visible');
    } else {
        backToTopButton.classList.remove('visible');
    }
});

backToTopButton.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
});