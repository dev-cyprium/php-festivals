<?php if(!adminLogged()) redirect("/") ?>

<?php

  if(isset($_POST['korisnik-edit'])) {

  }
?>

<div class='site-form site-form--korisnik_edit'>
  <?php include_once 'admin/admin_nav.php' ?>
  <h1 class='site-form__title'>Edituj Korisnike</h1>
  <div class='site-form__wrap'>
    <?php
      $korisnici = safeQuery($conn, "select k.id, k.email, k.korisnicko_ime from korisnici k", []);
    ?>
    <select id="korisnik-select">
      <option value='0'>Izaberite</option>
      <?php foreach($korisnici as $korisnik): ?>
        <option value='<?= $korisnik->id ?>'><?=$korisnik->email ?> (<?= $korisnik->korisnicko_ime ?>)</option>
      <?php endforeach ?>
    </select>
    <form action='/admin_edit' enctype='multipart/form-data' method='post' class='form' data-validator-namespace="login">
      <input type='hidden' id='festID' name='festID' />


      <div class='form__group'>
        <input
          type='text'
          class="form__control disabled"
          placeholder='Naziv festivala'
          data-validator-name='not-empty'
          name='naziv'
          id='naziv'
          disabled
        />
        <span class='form__errors'>
        </span>
      </div>

      <div class='form__group'>
        <input
          type='text'
          class="form__control date-input disabled"
          name='datum'
          id='datum'
          data-validator-name='not-empty'
          placeholder="Datum odrzavanja"
          disabled
        />
        <span class='form__errors'>
        </span>
      </div>

      <div class='form__group'>
        <textarea
          class='form__control disabled'
          placeholder='Description'
          data-validator-name='not-empty'
          name='opis'
          id='opis'
          disabled
        ></textarea>
        <span class='form__errors'></span>
      </div>

      <div class='form__group'>
        <input
          type='file'
          class='form__control disabled'
          placeholder='Description'
          name='slika'
          id='slika'
          disabled
        />
        <span class='form__errors'>
          <?php if(isset($errors)): ?>
            <?= implode(", ", $errors) ?>
          <?php endif ?>
        </span>
      </div>

      <img id='preview' />

      <button id='izmeni' name='festival-edit' class='form__submit disabled form__submit--primary' disabled>
        Izmeni
      </button>
      <button id='obrisi' name='festival-obrisi' class='form__submit disabled form__submit--delete' disabled>
        Obriši
      </button>
    </form>
  </div>
</div>