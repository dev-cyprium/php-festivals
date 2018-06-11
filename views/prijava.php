<div class='site-form'>
  <h1 class='site-form__title'>Prijava</h1>
  <div class='site-form__wrap'>
    <form class='form' data-validator-namespace="login">
      
      <div class='form__group'>
        <input 
          type='text' 
          class="form__control" 
          placeholder='Kor. ime ili mail' 
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
      <button class='form__submit form__submit--primary'>
        Prijavi se
      </button>
    </form>
    <p>Nemas nalog? <a href='/registracija'>Registruj se</a></p>
  </div>
</div>

