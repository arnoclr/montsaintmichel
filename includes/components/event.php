<div class="event" style="background-image: url('<?= i($event->image, "xlarge") ?>');">
    <div class="event__text">
        <h2 class="event__text-title"><?= $event->title ?></h2>
        <p class="event__text-details"><?= $event->text ?></p>
        <a href="<?= $event->link ?>" class="btn btn--large btn--white"><?=t('index.event.discover') ?></a>
    </div>
</div>