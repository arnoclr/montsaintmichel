<div class="activity-card" style="grid-area: g<?= $key ?>;">
    <div class="activity-card__media">
        <img loading="lazy" src="/image.php?url=<?= $activity->image ?>&size=<?= $activity->size ?>" alt="<?= $activity->title ?>" class="activity-card__media-img">
    </div>
    <div class="activity-card__shadow"></div>
    <div class="activity-card__text">
        <span class="activity-card__text-label"><?= $activity->label ?></span>
        <h2 class="activity-card__text-title"><?= $activity->title ?></h2>
    </div>
</div>

<?php if ($css): ?>
    <style>
        .activity-card {
            position: relative;
        }

        .activity-card__media {
            display: inline-flex;
            overflow: hidden;
            width: 100%;
            height: 350px;
            border-radius: 4px;
        }

        .activity-card__media-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.1);
            transition: transform .35s cubic-bezier(.31,.28,.19,.92);
            user-select: none;
        }

        .activity-card:hover .activity-card__media-img {
            transform: scale(1);
        }

        .activity-card__shadow {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0) 49.27%, rgba(0, 0, 0, 0.8) 100%);
            border-radius: 4px;
        }

        .activity-card__text {
            position: absolute;
            bottom: 0;
            left: 16px;
            color: #fff;
        }

        .activity-card__text-label {
            font: 700 11px Montserrat, sans-serif;
            text-transform: uppercase;
        }

        .activity-card__text-title {
            font: 400 28px Ibarra Real Nova, serif;
            text-transform: uppercase;
            margin-top: 8px;
        }
    </style>
<?php endif; ?>