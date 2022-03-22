<a href="<?= $activity->link ?? '#' ?>" class="activity-card" style="grid-area: g<?= $key ?>;">
    <div class="activity-card__media">
        <img loading="lazy" src="<?= $basepath ?>/image.php?url=<?= $activity->image ?>&size=<?= $activity->size ?>" alt="<?= $activity->title ?>" class="activity-card__media-img">
    </div>
    <div class="activity-card__shadow"></div>
    <div class="activity-card__text">
        <span class="activity-card__text-label"><?= $activity->label ?></span>
        <h2 class="activity-card__text-title"><?= $activity->title ?></h2>
    </div>
</a>