<div class="event">
    <div class="event__text">
        <h2 class="event__text-title"><?= $event->title ?></h2>
        <p class="event__text-details"><?= $event->text ?></p>
        <a href="<?= $event->link ?>" class="btn btn--large btn--white">Découvrir</a>
    </div>
</div>

<style>
    .event {
        position: relative;
        padding: 12px var(--padding);
        background-image: url("/image.php?url=<?= $event->image ?>&size=xlarge");
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .event__text {
        color: #fff;
        padding-bottom: 22px;
    }

    .event__text-title {
        font: 400 42px Ibarra Real Nova, serif;
        text-transform: uppercase;
        margin-bottom: 8px;
    }

    .event__text-details {
        font: 400 16px Noto Sans, sans-serif;
        margin-bottom: 48px;
        color: #fff;
    }

    @media screen and (min-width: 800px) {
        .event__text {
            width: 50%;
        }
    }
</style>