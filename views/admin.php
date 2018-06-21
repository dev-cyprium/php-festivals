<?php if(!adminLogged()) redirect("/") ?>

<?php if(isset($_POST['festival-submit'])) {
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
    $noviNaziv = time() . "_" . $naziv;
    $putanja = PROJECT_ROOT . "/public/assets/images/" . $noviNaziv;

    if(move_uploaded_file($tmp, $putanja)) {
      
    }
  }


  var_dump($slika);
/*
  $toInsert = insertValidate(getFestivalParams(), getFestivalValidations(),
    'festivalTransform', ["putanja" => $putanja]);
  insert($conn, $toInsert);
*/

}?>

<div class='site-form'>
  <h1 class='site-form__title'>Novi festival</h1>
  <div class='site-form__wrap'>
    <form action='/admin' enctype='multipart/form-data' method='post' class='form' data-validator-namespace="login">

      <div class='form__group'>
        <input
          type='text'
          class="form__control <?= hasError($error, 'email', 'form-error')  ?>"
          placeholder='Naziv festivala'
          data-validator-name='not-empty'
          name='naziv'
        />
        <span class='form__errors'>
          <?= hasError($error, 'email', $error['email']) ?>
        </span>
      </div>

      <div class='form__group'>
        <input
          type='text'
          class="form__control date-input"
          name='datum'
          data-validator-name='not-empty'
          placeholder="Datum odrzavanja"
        />
        <span class='form__errors'></span>
      </div>

      <div class='form__group'>
        <textarea
          class='form__control'
          placeholder='Description'
          data-validator-name='not-empty'
          name='opis'
        ></textarea>
        <span class='form__errors'></span>
      </div>

      <div class='form__group'>
        <input
            type='file'
            class='form__control'
            placeholder='Description'
            data-validator-name='not-empty'
            name='slika'
        />
        <span class='form__errors'></span>
      </div>

      <button name='festival-submit' class='form__submit form__submit--primary'>
        Postavi
      </button>
    </form>
  </div>
</div>