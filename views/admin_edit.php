<?php if(!adminLogged()) redirect("/") ?>

<?php
  if(isset($_POST['festival-obrisi'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM festivali WHERE id=:id";
    safeQuery($conn, $query, ["id" => $id], true);
  }


  if(isset($_POST['festival-edit'])) {
    $id = $_POST['festID'];

    if(isset($_FILES['slika']) && $_FILES['slika']['size'] > 0) {
      $slika = $_FILES['slika'];
      $type  = $slika['type'];
      $size  = $slika['size'];
      $naziv = $slika['name'];
      $tmp   = $slika['tmp_name'];

      $validTypes = [
        "image/jpeg",
        "image/jpg"
      ];
      $errors = [];

      if(!in_array($type, $validTypes)) {
        $errors[] = "Slika nije u dobrom formatu, mora biti (mora biti jpg ili jpeg)";
      }

      if($size > 4000000) {
        $errors[] = "Slika mora biti manja od 4MB";
      }

      if(empty($errors)) {
        // TODO: Obrisi staru
        $noviNaziv = time() . "_" . $naziv;
        $putanja = PROJECT_ROOT . "/public/assets/images/" . $noviNaziv;
        resize_image($tmp, 450, 'resize_image_by_width');
        $webPutanja = "/assets/images/" . $noviNaziv;

        if(move_uploaded_file($tmp, $putanja)) {
          $toUpdate = insertValidate(getFestivalParams(), getFestivalValidations(),
            'festivalTransform', ["putanja" => $webPutanja]);
          update($conn, $toUpdate, $id);
        }
      }
    } else {
      $toUpdate = insertValidate(getFestivalParams(), getFestivalValidations(),
        'festivalTransform', []);
      update($conn, $toUpdate, $id);
    }
  }
?>

<div class='site-form site-form--admin_edit'>
  <?php include_once 'admin/admin_nav.php' ?>
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