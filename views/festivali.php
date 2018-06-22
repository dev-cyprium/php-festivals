<div class="festivali">
  <form class='form'>
    <input id='search-festivals' class='form__control' type='search' placeholder='Pretraži festivale...' />
  </form>
  <div class="festivali__wrap">
    <h1>Svi festivali</h1>
    <div class='festivali__list'>
      <?php
        $count = safeQuery($conn, "select count(*) as num from festivali", [], true)->num;
        $festivali = safeQuery($conn, "select * from festivali limit 1,".PAGINATION, []);
        $pages = ceil($count / PAGINATION);
      ?>
      <?php foreach($festivali as $festival): ?>
        <div class='festival'>
          <figure class='festival__slika'>
            <img src='<?= $festival->putanja ?>' />
            <figcaption>
              <h2><?= $festival->naziv ?></h2>
              <h3><i class="far fa-calendar-alt"></i>
                <?= festivalPrettyDate($festival->datum) ?></h3>
              <h3><i class="fas fa-users"></i> 12 000</h3>
            </figcaption>
          </figure>
          <p><?= $festival->opis ?></p>
        </div>
      <?php endforeach ?>
    </div>
  </div>
  <div class='pagination'>
    <?php
      for($i=1; $i<=$pages; $i++):?>
        <a href='#'><?= $i ?></a>
      <?php endfor ?>
  </div>
</div>