<div class="menu js-menu" id="<?= $menu->id ?>">
    <ul class="menu__list">
        <?php foreach ($menu->items as $item): ?>
            <li class="menu__list-item">
                <a href="<?= $item->link ?>">
                    <img class="menu__list-item-img" loading="lazy" src="/image.php?url=<?= $item->image ?>&size=small" alt="<?= $item->title ?>">
                    <h3 class="menu__list-item-title"><?= $item->title ?></h3>
                    <div class="menu__list-item-shadow"></div>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<div class="menu__backdrop" data-menu-close="<?= $menu->id ?>"></div>

<style>
    .menu {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        height: 320px;
        background: #000;
        z-index: 100;
        transform: translate3D(0, -100%, 0);
        transition: transform .25s cubic-bezier(.42,.1,.13,.98);
    }

    .menu__backdrop {
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 99;
        display: none;
    }

    .menu__list {
        list-style: none;
        margin: 0;
        padding: 0;
        padding-top: 22px;
        padding-bottom: 16px;
        white-space: nowrap;
        overflow-x: scroll;
        overflow-y: hidden;
        gap: 16px;
        justify-content: center;
        height: 100%;
    }

    .menu__list-item {
        margin-left: 16px;
        display: inline-block;
        flex-shrink: 0;
        position: relative;
        height: 100%;
        width: 450px;
    }

    .menu__list-item:first-child {
        margin-left: 32px;
    }

    .menu__list-item:last-child {
        margin-right: 32px;
    }

    .menu__list-item-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 2px;
    }

    .menu__list-item-shadow {
        position: absolute;
        inset: 0;
        background: rgb(0,0,0);
        background: linear-gradient(0deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0) 100%);
        border-radius: 2px;
        opacity: 1;
        transition: opacity .2s ease;
    }

    .menu__list-item:hover .menu__list-item-shadow {
        opacity: 0.5;
    }

    .menu__list-item-title {
        display: block;
        margin: 0;
        position: absolute;
        bottom: 18px;
        left: 18px;
        color: #fff;
        font: 400 36px Ibarra Real Nova, serif;
        white-space: normal;
        text-transform: uppercase;
        text-align: left;
        z-index: 101;
    }

    .menu__list::-webkit-scrollbar {
        width: 16px;
        height: 16px;
    }

    .menu__list::-webkit-scrollbar-thumb {
        background: #676767;
        border-radius: 8px;
        border: 4px solid #000;
    }

    .menu__list::-webkit-scrollbar-thumb:hover {
        background: #898989;
        border-radius: 8px;
        border: 4px solid #000;
    }

    .menu__list::-webkit-scrollbar-track {
        background: #000;
    }

    .open+.menu__backdrop {
        display: block;
    }

    .open.menu {
        transform: translate3D(0, 0, 0);
    }
</style>