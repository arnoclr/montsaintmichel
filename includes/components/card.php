<a href="<?= $activity->link ?? '#' ?>" class="card" style="grid-area: g<?= $key ?>;">
    <div class="card__media">
        <img loading="lazy" src="<?= $activity->image ?>" alt="<?= $activity->title ?>" class="card__media-img">
    </div>
    <div class="card__shadow"></div>
    <div class="card__text">
        <span class="card__text-label"><?= $activity->label ?></span>
        <h2 class="card__text-title"><?= $activity->title ?></h2>
    </div>
</a>