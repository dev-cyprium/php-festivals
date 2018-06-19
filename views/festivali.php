<div class="festivali">
  <form class='form'>
    <input class='form__control' type='search' placeholder='Pretraži festivale...' />
  </form>
  <div class="festivali__wrap">
    <h1>Svi festivali</h1>
    <div class='festivali__list'>
      <div class='festival'>
        <figure class='festival__slika'>
          <img src='assets/images/beer-fest.jpg' alt='bf' />
          <figcaption>
            <h2>Naslov</h2>
            <h3><i class="far fa-calendar-alt"></i>
               12 / 12 / 2016</h3>
            <h3><i class="fas fa-users"></i> 12 000</h3>
          </figcaption>
        </figure>
      </div>

      <div class='festival'>
        <figure class='festival__slika'>
          <img src='assets/images/beer-fest.jpg' alt='bf' />
          <figcaption>
            <h2>Naslov</h2>
            <h3><i class="far fa-calendar-alt"></i>
              12 / 12 / 2016</h3>
            <h3><i class="fas fa-users"></i> 12 000</h3>
          </figcaption>
        </figure>
      </div>

      <div class='festival'>
        <figure class='festival__slika'>
          <img src='assets/images/beer-fest.jpg' alt='bf' />
          <figcaption>
            <h2>Naslov</h2>
            <h3><i class="far fa-calendar-alt"></i>
              12 / 12 / 2016</h3>
            <h3><i class="fas fa-users"></i> 12 000</h3>
          </figcaption>
        </figure>
      </div>

      <div class='festival'>
        <figure class='festival__slika'>
          <img src='assets/images/beer-fest.jpg' alt='bf' />
          <figcaption>
            <h2>Naslov</h2>
            <h3><i class="far fa-calendar-alt"></i>
              12 / 12 / 2016</h3>
            <h3><i class="fas fa-users"></i> 12 000</h3>
          </figcaption>
        </figure>
      </div>

      <div class='festival'>
        <figure class='festival__slika'>
          <img src='assets/images/beer-fest.jpg' alt='bf' />
          <figcaption>
            <h2>Naslov</h2>
            <h3><i class="far fa-calendar-alt"></i>
              12 / 12 / 2016</h3>
            <h3><i class="fas fa-users"></i> 12 000</h3>
          </figcaption>
        </figure>
      </div>

      <div class='festival'>
        <figure class='festival__slika'>
          <img src='assets/images/beer-fest.jpg' alt='bf' />
          <figcaption>
            <h2>Naslov</h2>
            <h3><i class="far fa-calendar-alt"></i>
              12 / 12 / 2016</h3>
            <h3><i class="fas fa-users"></i> 12 000</h3>
          </figcaption>
        </figure>
      </div>

    </div>
    <div class='pagination'>
      <?php
        for($i=1; $i<=5; $i++):?>
          <a href='#'><?= $i ?></a>
      <?php endfor ?>
    </div>
  </div>

</div>