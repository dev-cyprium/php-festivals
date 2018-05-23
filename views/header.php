<header>
    <nav>
        <ul>
        <?php foreach(fetchLinks($conn) as $link): ?>
            <li><a href='#'><?= $link->labela ?></a></li>
        <?php endforeach ?>
        </ul>
    </nav>
</header>