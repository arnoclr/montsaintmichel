document.addEventListener('DOMContentLoaded', () => {
    // initialiser les menus

    // trouver les boutons qui activent les menus
    const menubtns = document.querySelectorAll('[data-menu]');

    menubtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.menu;
            openMenu(id);
        });
    })

    // éléments qui ferment les menus
    const closebtns = document.querySelectorAll('[data-menu-close]');

    closebtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.menuClose;
            closeMenu(id);
        });
    })

    function openMenu(id) {
        const menu = document.getElementById(id);
        menu.classList.add('open');
    }

    function closeMenu(id) {
        const menu = document.getElementById(id);
        menu.classList.remove('open');
    }

    // quizz
    const allQuizz = document.querySelectorAll('.js-quizz');

    allQuizz.forEach(quizz => {
        const buttons = quizz.querySelectorAll('.js-quizz-button');
        const image = quizz.querySelector('img.js-blur');

        buttons.forEach(button => {
            button.addEventListener('click', e => {
                e.preventDefault();
                const correct = button.dataset.correct;
                image.classList.remove('js-blur');
                image.src = image.dataset.src;

                if (correct == "1") {
                    console.log(correct);
                } else {
                    // add a incorrect class if answer is wrong
                    button.classList.add('incorrect');
                }

                // add correct label to good answer
                buttons.forEach(button2 => {
                    button2.setAttribute('aria-disabled', 'true');
                    if (button2.dataset.correct == "1") {
                        button2.classList.add('correct');
                    }
                });

                // show detailed answer
                const answer = quizz.querySelector('.js-quizz-answer');
                answer.classList.add('open')
            });
        });
    });

    const navbar = document.querySelector('.js-navbar');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 100) {
            navbar.classList.add('navbar--open');
        } else {
            navbar.classList.remove('navbar--open');
        }
    });

    // images caroussel
    document.querySelectorAll('.image-carousel').forEach(carousel => {
        let currentImage = 0;
        const images = JSON.parse(carousel.dataset.images);
        console.log(images);

        const img = new Image();
        img.src = images[currentImage].src;
        carousel.appendChild(img);

        const attributionSpan = document.createElement('span');
        carousel.appendChild(attributionSpan);

        attributionSpan.innerText = images[currentImage].attr || '';

        if (images.length > 1) {
            const prev = document.createElement('button');
            const next = document.createElement('button');

            prev.classList.add('image-carousel__button', 'material-icons-sharp', 'image-carousel__button--prev');
            next.classList.add('image-carousel__button', 'material-icons-sharp', 'image-carousel__button--next');

            prev.innerText = 'chevron_left';
            next.innerText = 'chevron_right';

            carousel.appendChild(prev);
            carousel.appendChild(next);

            function changeImage(direction) {
                currentImage += direction;
                if (currentImage < 0) {
                    currentImage = images.length - 1;
                }
                if (currentImage > images.length - 1) {
                    currentImage = 0;
                }
                img.src = images[currentImage].src;
                attributionSpan.innerText = images[currentImage].attr || '';
            }

            prev.addEventListener('click', () => {
                changeImage(-1);
            });

            next.addEventListener('click', () => {
                changeImage(1);
            });
        }
    });
});