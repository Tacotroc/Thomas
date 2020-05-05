<header>
    <div id="headerContainer">
      <a href="<?php echo get_home_url() ?>" id="logo">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="logo" id="logoPicture" />
      </a>
      <form>
        <p id="searchInput">
          <input type="search" placeholder="Marque, modèle"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/loupe.png" alt="loupe" id="loupe" /><br />
          <span><input type="radio" value="1" name="options" id="radio1" checked="checked" /><label for="radio1">offres</label></span>
          <span><input type="radio" value="2" name="options" id="radio2" /><label for="radio2">Demandes</label></span>
          <span><input type="radio" value="3" name="options" id="radio3" /><label for="radio3">Echanges</label></span>
        </p>
        <p id="selectInput" onclick="showBigMenu()"><span id="changing">Toutes pièces</span><span id="searchImg"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrowDown.png" alt="flèche vers le bas" id="bottomArrow" /></span></p>

        <p id="button"><button type="button" id="search" style="cursor:pointer">Rechercher</button></p>
      </form>
      <div id="bigMenu">
        <p id="all" style="cursor:pointer" onclick="changeSelect('Toutes pièces')"><span>Toutes pièces</span></p>
        <div id="menuContainer">
          <div id="col1">
            <p style="cursor:pointer"><span onclick="changeSelect('Mécanique')">Mécanique</span></p>
            <ul>
              <li onclick="changeSelect('Alimentation')">Alimentation</li>
              <li onclick="changeSelect('Allumage')">Allumage</li>
              <li onclick="changeSelect('Câbles')">Câbles</li>
              <li onclick="changeSelect('Échappement')">Échappement</li>
              <li onclick="changeSelect('Moteur')">Moteur</li>
              <li onclick="changeSelect('Refroidissement')">Refroidissement</li>
            </ul>
            <p style="cursor:pointer"><span onclick="changeSelect('Électricité')">Électricité</span></p>
            <ul>
              <li onclick="changeSelect('Alimentation')">Alimentation</li>
              <li onclick="changeSelect('Allumage')">Allumage</li>
              <li onclick="changeSelect('Câbles')">Câbles</li>
              <li onclick="changeSelect('Échappement')">Échappement</li>
              <li onclick="changeSelect('Moteur')">Moteur</li>
              <li onclick="changeSelect('Refroidissement')">Refroidissement</li>
            </ul>
          </div>
          <div id="col2">
            <p style="cursor:pointer"><span onclick="changeSelect('Transmission')">Transmission</span></p>
            <ul>
              <li onclick="changeSelect('Arbre et axe')">Arbre et axe de boite M</li>
              <li onclick="changeSelect('Arbre de trans.')">Arbre de transmission</li>
              <li onclick="changeSelect('Boîte de vitesse')">Boîte de vitesse</li>
              <li onclick="changeSelect('Boîte mécanique')">Boîte mécanique</li>
              <li onclick="changeSelect('Butée d’embrayage')">Butée d’embrayage</li>
              <li onclick="changeSelect('Cardan')">Cardan</li>
              <li onclick="changeSelect('Carter de boite')">Carter de boite</li>
              <li onclick="changeSelect('Cloche de boite')"> Cloche de boite</li>
              <li onclick="changeSelect('Cloche de boite méc.')">Cloche de boite méca…</li>
              <li onclick="changeSelect('Convertisseur')">Convertisseur</li>
            </ul>

            <p style="cursor:pointer"><span onclick="changeSelect('Intérieur')">Intérieur</span></p>
            <ul>
              <li onclick="changeSelect('Alimentation')">Alimentation</li>
              <li onclick="changeSelect('Allumage')">Allumage</li>
              <li onclick="changeSelect('Câbles')">Câbles</li>
              <li onclick="changeSelect('Échappement')">Échappement</li>
              <li onclick="changeSelect('Moteur')">Moteur</li>
              <li onclick="changeSelect('Refroidissement')">Refroidissement</li>
            </ul>
          </div>
          <div id="col3">
            <p style="cursor:pointer" onclick="changeSelect('Chässis')"><span>Châssis</span></p>
            <ul>
              <li onclick="changeSelect('Alimentation')">Alimentation</li>
              <li onclick="changeSelect('Allumage')">Allumage</li>
              <li onclick="changeSelect('Câbles')">Câbles</li>
              <li onclick="changeSelect('Échappement')">Échappement</li>
              <li onclick="changeSelect('Moteur')">Moteur</li>
              <li onclick="changeSelect('Refroidissement')">Refroidissement</li>
            </ul>

            <p style="cursor:pointer" onclick="changeSelect('Accessoires')"> <span>Accessoires</span></p>
            <ul>
              <li onclick="changeSelect('Alimentation')">Alimentation</li>
              <li onclick="changeSelect('Allumage')">Allumage</li>
              <li onclick="changeSelect('Câbles')">Câbles</li>
              <li onclick="changeSelect('Échappement')">Échappement</li>
              <li onclick="changeSelect('Moteur')">Moteur</li>
              <li onclick="changeSelect('Refroidissement')">Refroidissement</li>
            </ul>
          </div>
          <div id="col4">
            <p style="cursor:pointer" onclick="changeSelect('Carosserie')"><span>Carosserie</span></p>
            <ul>
              <li onclick="changeSelect('Alimentation')">Alimentation</li>
              <li onclick="changeSelect('Allumage')">Allumage</li>
              <li onclick="changeSelect('Câbles')">Câbles</li>
              <li onclick="changeSelect('Échappement')">Échappement</li>
              <li onclick="changeSelect('Moteur')">Moteur</li>
              <li onclick="changeSelect('Refroidissement')">Refroidissement</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <a href="#">
      <div id="new">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Button_annonce.png" alt="bouton" id="buttonAnnonce" style="display:none" />
        <p><span id="plusNew"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/plus.png" alt="plus" id="plus" /></span><span id="textNew">Déposer une annonce</span></p>
      </div>
    </a>
  </header>