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
        
        if (images.length > 0) {

            const img = new Image();
            img.src = images[currentImage].src || "https://i.imgur.com/ONaqKlp.jpg";
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
                    const currentHeight = img.clientHeight;
                    img.style.height = currentHeight + 'px';
                    img.style.transform = `translateX(${-direction * 33}%)`;
                    img.style.opacity = 0;
                    img.style.transition = "height .3s ease-out, transform .3s ease-in-out, opacity .3s ease";

                    let onloadEvent = false;
                    let timeoutEvent = false;

                    let onloadHandler = function() {
                        img.style.height = 'auto';
                        const newHeight = img.clientHeight;
                        img.style.height = currentHeight + 'px';
                        img.style.transition = "height .3s ease-out, transform 0s ease-in-out, opacity .3s ease";
                        img.offsetWidth;
                        img.style.height = newHeight + 'px';
                        img.style.transform = `translateX(0%)`;
                        img.style.opacity = 1;
                    };

                    img.onload = function() {
                        onloadEvent = true;
                        if (timeoutEvent) {
                            onloadHandler();
                        }
                    }

                    setTimeout(() => {
                        timeoutEvent = true;
                        if (onloadEvent) {
                            onloadHandler();
                        }
                    }, 300);
                    
                    img.offsetWidth;
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
        }
    });

    
    // preview liens
    const previewLinks = document.querySelectorAll("a[preview]");

    function getOffset( el ) {
        var _x = 0;
        var _y = 0;
        while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
              _x += el.offsetLeft - el.scrollLeft;
              _y += el.offsetTop - el.scrollTop;
              el = el.offsetParent;
        }
        return { top: _y, left: _x };
    }

    previewLinks.forEach(a => {
        let linkLoaded = false;
        let launch = true;

        const card = document.createElement('div');
        card.classList.add('card');
        card.innerHTML = `<div style="display: grid; place-items: center; width: 100%; height: 100%;"><i class="loader medium"></i></div>`
        a.insertAdjacentElement('afterend', card);

        a.addEventListener('mouseover', async e => {
            if (launch) {
                const linkOffset = getOffset(a);
                card.style.top = linkOffset.top + 'px';
                card.style.left = linkOffset.left + 'px';

                card.animate([
                    { opacity: 0, transform: 'translateY(10px)' },
                    { opacity: 1, transform: 'translateY(0)' },
                ], {
                    duration: 250,
                    fill: 'forwards',
                    easing: 'ease'
                });
            }

            launch = false;
            card.style.display = 'flex';
            card.classList.add('active');

            if (!linkLoaded) {
                linkLoaded = true;
                const req = await fetch("/ajax/linkPreview?url=" + a.href)
                const html = await req.text();
                card.innerHTML = html;
            }
        });

        card.addEventListener('mouseleave', e => {
            card.animate([
                { opacity: 1, transform: 'translateY(0)' },
                { opacity: 0, transform: 'translateY(10px)' },
            ], {
                duration: 250,
                fill: 'forwards',
                easing: 'ease'
            });

            setTimeout(() => {
                card.style.display = 'none';
            }, 600);

            launch = true;
        })
    })
});