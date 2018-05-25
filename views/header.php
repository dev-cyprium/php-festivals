<header>
    <nav>
        <ul>
        <?php foreach(fetchLinks($conn) as $link): ?>
            <li>
                <a class='<?= $active_name == $link->name ? "active" : "" ?>' href='<?= "/" . $link->name ?>'>
                <?= $link->labela ?>
                </a>
            </li>
        <?php endforeach ?>
        </ul>
    </nav>
</header>