<div id="center">
    <div id="hero-title">
        <h1>
            Festivian
        </h1>
        <p>
            Pronađite bilo koji festival u Srbiji.
            Brzo, lako i jednostavno!
        </p>
        <p>
            Planirajte unapred i rezervišite karte 
            već danas!
        </p>
        <a href='#' class='btn-pretraizi'>Počni pretragu</a>
    </div>
    <div id='map'>
        <?= file_get_contents(PROJECT_ROOT . "/public/assets/images/serbia.svg"); ?>
    </div>
</div>
<div class='bg-wrap'>
    <div id="acc-tabs">
        <div class='tab active'>
            <i class="fas fa-user"></i>
        </div>
        <div class='tab'>
            <i class="fas fa-users"></i>
        </div>
    </div>
    <div id="tab-content">
    </div>
</div>