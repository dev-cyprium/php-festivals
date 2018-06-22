<?php if(!adminLogged()) redirect("/") ?>

<div class='site-form site-form--admin_edit'>
  <a href="admin">Novi Festival</a>
  <a href='admin_edit'>Edituj Festival</a>
  <h1 class='site-form__title'>Edituj festival</h1>
  <div class='site-form__wrap'>
    <?php
      $festivali = safeQuery($conn, "select * from festivali", []);
    ?>
    <select id="fetival-select">
      <option value='0'>Izaberite</option>
      <?php foreach($festivali as $fest): ?>
        <option value='<?= $fest->id ?>'><?=$fest->naziv?></option>
      <?php endforeach ?>
    </select>
    <form action='/admin_edit' enctype='multipart/form-data' method='post' class='form' data-validator-namespace="login">

      <div class='form__group'>
        <input
          type='text'
          class="form__control disabled"
          placeholder='Naziv festivala'
          data-validator-name='not-empty'
          name='naziv'
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
          disabled
        ></textarea>
        <span class='form__errors'></span>
      </div>

      <div class='form__group'>
        <input
          type='file'
          class='form__control disabled'
          placeholder='Description'
          data-validator-name='not-empty'
          name='slika'
          disabled
        />
        <span class='form__errors'>
          <?php if(isset($errors)): ?>
            <?= implode(", ", $errors) ?>
          <?php endif ?>
        </span>
      </div>

      <button name='festival-submit' class='form__submit disabled form__submit--primary' disabled>
        Izmeni
      </button>
    </form>
  </div>
</div>