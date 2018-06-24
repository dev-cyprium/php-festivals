<header>
    <nav>
        <ul>
        <?php foreach(fetchLinks($conn) as $link): ?>
          <?php if(userLogged()  && $link->hide_logged == 1)  continue ?>
          <?php if(!userLogged() && $link->hide_logged == 2)  continue ?>
          <?php if(!adminLogged() && $link->hide_logged == 3) continue ?>
          <?php if($link->visible != 1) continue ?>
            <li>
                <?php if($link->name == 'dokumentacija'): ?>
                    <a href='/dokumentacija.pdf' target='_blank'>Dokumentacija</a>
                <?php else: ?>
                <a 
                    class='<?= $route['route'] == $link->name ? "active" : "" ?>' 
                    href='<?= "/" . $link->name ?>'
                    target='<?= $link->target_blank == 1 ? "_blank" : "_self" ?>'
                >
                        <?= $link->labela ?>
                </a>
                <?php endif ?>
            </li>
        <?php endforeach ?>
        </ul>
    </nav>
</header>