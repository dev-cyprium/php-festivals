<header>
    <nav>
        <ul>
        <?php foreach(fetchLinks($conn) as $link): ?>
            <li>
                <a class='<?= $route['route'] == $link->name ? "active" : "" ?>' href='<?= "/" . $link->name ?>'>
                <?= $link->labela ?>
                </a>
            </li>
        <?php endforeach ?>
        </ul>
    </nav>
</header>