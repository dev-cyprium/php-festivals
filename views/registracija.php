<div class='site-form'>
  <h1 class='site-form__title'>Registracija</h1>
  <?php
    if(isset($_POST['register-submit'])) {
      echo "Poslato";
    }
  ?>
  <div class='site-form__wrap'>
    <form action='/registracija' method='post' class='form' data-validator-namespace="login">
      
      <div class='form__group'>
        <input 
          type='text' 
          class="form__control" 
          placeholder='Email' 
          data-validator-name='mail'  
        />
        <span class='form__errors'></span>
      </div>

      <div class='form__group'>
        <input 
          type='text' 
          class="form__control" 
          placeholder='Ime i prezime' 
          data-validator-name='ime'  
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
        />
        <span class='form__errors'></span>
      </div>
      <div class='form__group'>
        <input 
          type='password' 
          class="form__control" 
          placeholder='Lozinka ponovow' 
          data-validator-same-as='#lozinka'
        />
        <span class='form__errors'></span>
      </div>
      <button name='register-submit' class='form__submit form__submit--primary'>
        Registruj se
      </button>
    </form>
    <p>Imas nalog? <a href='/prijava'>Prijavi se</a></p>
  </div>
</div>

