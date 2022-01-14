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
});