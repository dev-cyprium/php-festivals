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
      $korisnici = safeQuery($conn, "select k.id, k.email, k.korisnicko_ime from korisnici k where id_role<>1", []);
    ?>
    <select id="korisnik-select">
      <option value='0'>Izaberite</option>
      <?php foreach($korisnici as $korisnik): ?>
        <option value='<?= $korisnik->id ?>'><?=$korisnik->email ?> (<?= $korisnik->korisnicko_ime ?>)</option>
      <?php endforeach ?>
    </select>
    <form action='/admin_edit' method='post' class='form' data-validator-namespace="login">
      <input type='hidden' id='korID' name='kodID' />


      <div class='form__group'>
        <input
          type='text'
          class="form__control disabled"
          placeholder='Email'
          data-validator-name='email'
          name='email'
          id='email'
          disabled
        />
        <span class='form__errors'>
        </span>
      </div>

      <div class='form__group'>
        <input
          type='text'
          class="form__control disabled"
          name='kor-ime'
          id='kor-ime'
          data-validator-name='not-empty'
          placeholder="Korisničko ime"
          disabled
        />
        <span class='form__errors'>
        </span>
      </div>

      <div class='form__group'>
        <input
          class='form__control disabled'
          placeholder='Lozinka'
          name='lozinka'
          id='lozinka'
          disabled
        />
        <span class='form__errors'></span>
      </div>

      <button id='izmeni' name='festival-edit' class='form__submit disabled form__submit--primary' disabled>
        Izmeni
      </button>
      <button id='obrisi' name='festival-obrisi' class='form__submit disabled form__submit--delete' disabled>
        Obriši
      </button>
    </form>
  </div>
</div>