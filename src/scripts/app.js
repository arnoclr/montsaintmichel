class DraggableScrollArea {
    isGrabbed = false;
    constructor(element) {
        this.element = element;
        this.element.classList.add('draggable-area');
        this.element.addEventListener('mousedown', this.onMouseDown);
        this.element.addEventListener('mousemove', this.onMouseMove);
        this.element.addEventListener('mouseup', this.onMouseUp);
        this.element.addEventListener('mouseleave', this.onMouseUp);
    }
    forwards = () => {
        this.changeStep(1);
    };
    backwards = () => {
        this.changeStep(-1);
    };
    changeStep = (direction) => {
        this.element.scrollLeft += this.element.clientWidth / 1.5 * direction;
        this.element.scrollTop += this.element.clientHeight / 1.5 * direction;
    };
    onMouseDown = () => {
        this.element.classList.add('grabbing');
        this.isGrabbed = true;
    };
    onMouseMove = (event) => {
        if (!this.isGrabbed) return;
        this.element.scrollLeft = this.element.scrollLeft - event.movementX;
        this.element.scrollTop = this.element.scrollTop - event.movementY;
    };
    onMouseUp = () => {
        this.element.classList.remove('grabbing');
        this.isGrabbed = false;
    };
}

function debounce(callback, delay) {
    var timer;
    return function () {
        var args = arguments;
        var context = this;
        clearTimeout(timer);
        timer = setTimeout(function () {
            callback.apply(context, args);
        }, delay);
    };
}

document.addEventListener('DOMContentLoaded', () => {
    // initialiser les menus

    // trouver les boutons qui activent les menus
    const menubtns = document.querySelectorAll('[data-menu]');

    menubtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.menu;
            openMenu(id);
        });
    });

    // éléments qui ferment les menus
    const closebtns = document.querySelectorAll('[data-menu-close]');

    closebtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const id = btn.dataset.menuClose;
            closeMenu(id);
        });
    });

    function openMenu(id) {
        const menu = document.getElementById(id);
        menu.classList.add('open');
    }

    function closeMenu(id) {
        const menu = document.getElementById(id);
        menu.classList.remove('open');
    }

    // barre de recherche
    const searchBarTrigger = document.querySelector('.js-search-trigger');
    const searchBar = document.querySelector('.js-search');
    const searchBarInput = document.querySelector('.js-search-input');
    const searchBarBackdrop = document.querySelector('.js-search-backdrop');
    const searchBarButton = document.querySelector('.js-search-btn');
    const searchBarDropdown = document.querySelector('.js-search-dropdown');
    const searchBarNextWord = document.querySelector('.js-search-autocompleted');
    const searchBarNextPlaceholder = document.querySelector('.js-search-placeholder');

    searchBarTrigger.addEventListener('click', () => {
        searchBar.classList.add('search--open');
        searchBarInput.focus();
        searchBarBackdrop.style.display = 'block';
    });

    function closeSearchBar() {
        searchBar.classList.remove('search--open');
        searchBarInput.blur();
        searchBarBackdrop.style.display = 'none';
    };

    searchBarBackdrop.addEventListener('click', closeSearchBar);
    searchBarButton.addEventListener('click', closeSearchBar);

    const pagesData = {
        "/": {
            title: "Accueil",
        },
        "/visite-virtuelle": {
            title: "Visite virtuelle",
            icon: "view_in_ar",
        },
        "/histoire": {
            title: "Histoire",
        },
        "/histoire/frise": {
            title: "Frise chronologique",
        },
        "/architecture": {
            title: "Architecture",
        },
        "/bons-plans": {
            title: "Bons plans",
        },
        "/decouvrir-la-baie": {
            title: "Découvrir la baie",
        },
        "/quiz": {
            title: "Quiz",
            icon: "videogame_asset",
        },
        "/map": {
            title: "Carte",
            icon: "map",
        },
    };

    searchBarInput.addEventListener('keyup', e => {
        searchBarNextPlaceholder.innerText = e.target.value;
    });

    searchBarInput.addEventListener('keyup', debounce(async function (e) {
        const value = e.target.value;

        const results = await fetch(`/ajax/search?action=search&q=${value}`);
        const pages = await results.json();

        searchBarDropdown.innerHTML = '';

        pages.forEach(path => {
            const template = `<li>
                <a href="${path}">
                    <i class="material-icons-sharp">${pagesData[path].icon || "pageview"}</i>
                    <span>${pagesData[path].title}</span>
                </a>
            </li>`;
            searchBarDropdown.innerHTML += template;
        });

        if (pages.length === 0) {
            searchBarDropdown.innerHTML = `<li>
                <span class="not-found">Aucun résultat</span>
            </li>`;
        }

        const words = value.split(' ');
        const lastWord = words[words.length - 1];

        const autoCompleteQuery = await fetch(`/ajax/search?action=autoComplete&word=${lastWord}`);
        const autoComplete = await autoCompleteQuery.json();

        searchBarNextWord.innerHTML = autoComplete[0] || '';
    }, 350));

    document.addEventListener('keydown', e => {
        if (searchBarInput === document.activeElement) {
            if (e.key === 'Tab') {
                e.preventDefault();
                searchBarInput.value = searchBarInput.value + " " + searchBarNextWord.innerText;
            }
        }

        if (searchBar.classList.contains('search--open')) {
            if (e.key === 'Escape') {
                closeSearchBar();
            }

            if (e.key === 'ArrowDown') {
                // TODO: fix focus
                e.preventDefault();
                searchBarDropdown.firstElementChild.focus();
            }
        }
    });

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
                    quizz.classList.add('js-correct');
                } else {
                    // add a incorrect class if answer is wrong
                    button.classList.add('incorrect');
                    const i = document.createElement('i');
                    i.classList.add('material-icons-sharp');
                    i.innerText = 'close';
                    button.appendChild(i);
                    quizz.classList.add('js-incorrect');
                }

                // add correct label to good answer
                buttons.forEach(button2 => {
                    button2.setAttribute('aria-disabled', 'true');
                    if (button2.dataset.correct == "1") {
                        button2.classList.add('correct');
                        const i = document.createElement('i');
                        i.classList.add('material-icons-sharp');
                        i.innerText = 'check';
                        button2.appendChild(i);
                    }
                });

                // show detailed answer
                const answer = quizz.querySelector('.js-quizz-answer');
                answer.classList.add('open');
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

                    let onloadHandler = function () {
                        img.style.height = 'auto';
                        const newHeight = img.clientHeight;
                        img.style.height = currentHeight + 'px';
                        img.style.transition = "height .3s ease-out, transform 0s ease-in-out, opacity .3s ease";
                        img.offsetWidth;
                        img.style.height = newHeight + 'px';
                        img.style.transform = `translateX(0%)`;
                        img.style.opacity = 1;
                    };

                    img.onload = function () {
                        onloadEvent = true;
                        if (timeoutEvent) {
                            onloadHandler();
                        }
                    };

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

    function getOffset(el) {
        var _x = 0;
        var _y = 0;
        while (el && !isNaN(el.offsetLeft) && !isNaN(el.offsetTop)) {
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
        card.innerHTML = `<div style="display: grid; place-items: center; width: 100%; height: 100%;"><i class="loader medium"></i></div>`;
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
                const req = await fetch("/ajax/linkPreview?url=" + a.href);
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
        });
    });

    // image gallery
    const imageGallery = document.querySelector('.js-collection__img-wrap');
    const inner = document.querySelector('.modal-inner');

    document.addEventListener('mouseover', function (event) {
        if (imageGallery !== event.target && !imageGallery.contains(event.target)) {
            imageGallery.classList.remove('pause');

        } else {
            setTimeout(() => {
                imageGallery.classList.add('pause');
            }, 50);
        }
    }, true);

    function setupModal() {
        const el = {
            wrapper: document.getElementById('modal-wrapper'),
            modal: document.getElementById('modal')
        };
        el.image = el.modal.getElementsByTagName('img')[0];
        el.caption = el.modal.getElementsByClassName('caption')[0];
        el.close = el.modal.querySelector('button.close');
        el.wrapper.addEventListener('click', () => hideModal(el));
        return el;
    }

    function showModal(el, imgSrc, caption) {
        el.modal.style.cssText = `
            visibility: visible;
        `;

        el.wrapper.style.cssText = `
            visibility: visible;
            display: block;
        `;

        el.modal.classList.add('modal_active');
        el.wrapper.classList.add('modal-wrapper_active');
        inner.classList.add('modal-inner_active');

        imgSrc.includes('.jpg') ? el.image.setAttribute('src', imgSrc.replace('l.jpg', '.jpg')) : el.image.setAttribute('src', imgSrc);
        el.caption.innerText = caption;

        if (window.innerWidth >= 800) {
            el.image.setAttribute("style", "height: 40vh;");
        } else {
            el.image.setAttribute("style", "");
        }

    }

    function hideModal(el) {
        el.modal.style.cssText = `
            visibility: hidden; 
            opacity: 0; 
            transition: all .2s ease;
        `;

        el.wrapper.style.cssText = `
            visibility: hidden; 
            opacity: 0; 
            transition: all .2s ease;
            display: none;
        `;

        el.modal.classList.remove('modal_active');
        el.wrapper.classList.remove('modal-wrapper_active');
        inner.classList.remove('modal-inner_active');
    }

    window.onload = function () {
        const modal = setupModal();
        // console.log('modal', modal);

        document.querySelectorAll('img.imgs') // Toute image possédant la classe "imgs" se verra cliquable avec un modal.
            .forEach((img) => {
                img.addEventListener('click', (e) => {
                    console.log('click', e);
                    const img = e.target,
                        src = img.getAttribute('src'),
                        caption = img.getAttribute('alt');
                    showModal(modal, src, caption);

                });
            });
    };

    document.querySelectorAll('.js-draggable').forEach(el => {
        const draggable = new DraggableScrollArea(el);
    });

    // fancy alert
    function fancyAlert(message, type) { // NE MARCHE PAS DANS QUIZ.PHP JE NE SAIS PAS POURQUOI (LE APP.JS EST PAS APPELÉ)
        const alert = document.createElement('div');
        alert.classList.add('alert');
        alert.classList.add(type);
        alert.innerText = message;
        document.body.appendChild(alert);
        // setTimeout(() => {
        //     alert.remove();
        // }, 3000);
    }
});
