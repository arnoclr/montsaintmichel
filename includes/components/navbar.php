<div class="navbar <?= $navbar_classes ?? '' ?>">
    <div class="navbar__links">
        <a href="#" class="navbar__links-link">A faire sur place</a>
        <a href="#" class="navbar__links-link">Le village</a>
        <a href="#" class="navbar__links-link">Histoire</a>
        <a href="#" class="navbar__links-link">Architecture</a>
    </div>
    <div class="navbar__locale">
        <i class="material-icons-sharp">translate</i>
    </div>
</div>

<style>
    .navbar {
        width: 100%;
        display: flex;
        justify-content: space-between;
        padding: 48px var(--padding);
    }

    .navbar__links {
        width: 100%;
        display: flex;
        align-items: flex-start;
        gap: var(--padding);
    }

    .navbar__links-link {
        text-decoration: none;
        font: 400 18px Noto Sans, sans-serif;
        color: #000;
    }

    .navbar--white .navbar__links-link {
        color: #fff;
    }

    .navbar--white .navbar__locale i {
        color: #fff;
    }
</style>