<div class='site-form'>
  <h1 class='site-form__title'>Prijava</h1>
  <?php
    if(isset($_POST['login-submit'])) {
      echo "Poslato";
    }
  ?>
  <div class='site-form__wrap'>
    <form action='/prijava' method='post' class='form' data-validator-namespace="login">
      
      <div class='form__group'>
        <input 
          type='text' 
          class="form__control" 
          placeholder='Mail' 
          data-validator-name='mail'  
        />
        <span class='form__errors'></span>
      </div>

      <div class='form__group'>
        <input 
          type='password' 
          class="form__control" 
          placeholder='Lozinka' 
          data-validator-name='lozinka'
        />
        <span class='form__errors'></span>
      </div>
      <button name='login-submit' class='form__submit form__submit--primary'>
        Prijavi se
      </button>
    </form>
    <p>Nemas nalog? <a href='/registracija'>Registruj se</a></p>
  </div>
</div>

