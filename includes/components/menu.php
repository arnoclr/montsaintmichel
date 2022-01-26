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