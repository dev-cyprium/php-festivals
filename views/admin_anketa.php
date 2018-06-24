<?php if(!adminLogged()) redirect("/") ?>

<div class='site-form'>
  <?php include_once 'admin/admin_nav.php' ?>
  <h1 class='site-form__title'>Edituj festival</h1>
  <div class='site-form__wrap'>
    <?php
      $upit = "select f.naziv, count(*) as broj_glasova from glasanja g
               join festivali f on g.id_festival = f.id
               group by f.naziv
               order by broj_glasova desc
               limit 5";

      $stats = safeQuery($conn, $upit, []);
    ?>
    <table class='vote-table'>
      <thead>
        <tr>
          <th>Ime festivala</th>
          <th>Broj glasova</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($stats as $s): ?>
          <tr>
            <td><?= $s->naziv ?></td>
            <td><?= $s->broj_glasova ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>