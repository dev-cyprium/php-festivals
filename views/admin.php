<?php if(!adminLogged()) redirect("/") ?>

<div class='site-form'>
  <h1 class='site-form__title'>Novi festival</h1>
  <div class='site-form__wrap'>
    <form action='/prijava' method='post' class='form' data-validator-namespace="login">

      <div class='form__group'>
        <input
          type='text'
          class="form__control <?= hasError($error, 'email', 'form-error')  ?>"
          placeholder='Naziv festivala'
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
        ></textarea>
        <span class='form__errors'></span>
      </div>
      <button name='login-submit' class='form__submit form__submit--primary'>
        Postavi
      </button>
    </form>
  </div>
</div>