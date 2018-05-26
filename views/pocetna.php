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
    <div id="acc-tabs" class='tabs'>
        <div class='tab active'>
            <i class="fas fa-user"></i>
        </div>
        <div class='tab'>
            <i class="fas fa-users"></i>
        </div>
    </div>
    <div class="tab-content" data-tab='1'>
        <h1>Festivian za korisnike</h1>
        <ul>
            <li>
                <i class='fas fa-star'></i>
                Pretražite najaktuelnije festivale u Srbiji
            </li>
            <li>
                <i class='fas fa-star'></i>
                Rezervišite karte po 20% jeftinijoj ceni
            </li>
            <li>
                <i class='fas fa-star'></i>
                Proverite utiske i ocene festiavla
            </li>
        </ul>
    </div>
    <div class="tab-content" data-tab='2'>
        <h1>Festivian za organizatore</h1>
        <ul>
            <li>
                <i class='fas fa-star'></i>
                Organizujte vaš festival uz pomoć naših volontera
            </li>
            <li>
                <i class='fas fa-star'></i>
                Marketing preko naše platforme uključen u ponudu
            </li>
            <li>
                <i class='fas fa-star'></i>
                Ostavite planiranje na nama
            </li>
        </ul>
    </div>
</div>
<div class='thoughts-slider'>
    <blockquote>
        <p>"Rad za Festivian platformom je bio pun pogodak. Brzo organizovanje, odličan
        sistem naplate i sve na jednom mestu. Sve pohvale!"</p>
        <span>-Belgrade Beer Fest</span>
    </blockquote>
    
</div>
<div class='bg-wrap'>
    <div class='contact-form'>
        <h1>Pišite nam</h1>
        <form action="/pocetna" method="POST">
            <input type='text' placeholder='Mail' />
            <textarea placeholder='Poruka'>
            </textarea>
            <button>Posašalji</button>
        </form>
    </div>
</div>