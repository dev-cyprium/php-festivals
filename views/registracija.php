<?php if(userLogged()) {
    redirect("/");
} ?>
<div class='site-form'>
  <h1 class='site-form__title'>Registracija</h1>
  <?php
    if(isset($_POST['register-submit'])) {
      try { 
        $toInsert = insertValidate(getUserParams(), getUserValidations(), 'userTransform');
        if($id = insert($conn, $toInsert)) {
            $query = "select k.*, r.naziv from korisnici k join role r on korisnici.id_role = r.id where k.id=:id";
            $user = safeQuery($conn, $query, ["id" => $id], true);
            $_SESSION['user'] = $user;
        } else {
            $error['email'] = 'Mail adresa je vec zauzeta';
        }
      } catch(Exception $e) {
        echo $e->getMessage();
      }
    }
  ?>
  <div class='site-form__wrap'>
    <form action='/registracija' method='post' class='form' data-validator-namespace="login">
      
      <div class='form__group'>
        <input 
          type='text' 
          class="form__control <?= hasError($error, 'email', 'form-error')  ?>"
          placeholder='Email' 
          data-validator-name='mail'  
          name='email'
        />
        <span class='form__errors'>
            <?= hasError($error, 'email', $error['email']) ?>
        </span>
      </div>

      <div class='form__group'>
        <input 
          type='text' 
          class="form__control" 
          placeholder='Ime i prezime' 
          data-validator-name='ime'  
          name='imeprezime'
        />
        <span class='form__errors'></span>
      </div>

      <div class='form__group'>
        <input 
          id='lozinka'
          type='password' 
          class="form__control" 
          placeholder='Lozinka' 
          data-validator-name='lozinka'
          name='lozinka'
        />
        <span class='form__errors'></span>
      </div>
      <div class='form__group'>
        <input 
          type='password' 
          class="form__control" 
          placeholder='Lozinka ponovo' 
          data-validator-same-as='#lozinka'
        />
        <span class='form__errors'></span>
      </div>
      <button name='register-submit' class='form__submit form__submit--primary'>
        Registruj se
      </button>
    </form>
    <p>Imaš nalog? <a href='/prijava'>Prijavi se</a></p>
  </div>
</div>

