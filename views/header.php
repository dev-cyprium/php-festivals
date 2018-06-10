<header>
    <nav>
        <ul>
        <?php foreach(fetchLinks($conn) as $link): ?>
            <li>
                <a 
                    class='<?= $route['route'] == $link->name ? "active" : "" ?>' 
                    href='<?= "/" . $link->name ?>'
                    target='<?= $link->target_blank == 1 ? "_blank" : "_self" ?>'
                >
                        <?= $link->labela ?>
                </a>
            </li>
        <?php endforeach ?>
        </ul>
    </nav>
</header>