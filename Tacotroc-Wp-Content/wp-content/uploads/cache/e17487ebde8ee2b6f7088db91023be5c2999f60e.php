<article <?php post_class() ?>>
<main>

<p class="path" style="cursor:pointer"><span onclick="window.location.href='index.phtml'">Accueil </span><span class="pathImg"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Base.png" alt="triangle" id="triangle" /></span><span onclick="window.location.href='brand.phtml'">Peugeot</span><span class="pathImg"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Base.png" alt="triangle" id="triangle" /></span><span class="pathelt"><?php the_title() ?></span></p>

<section id="presentationModel">
    <div id="picture201"><img src="<?php the_field("cover") ?>" alt="<?php echo the_title() ?>" /></div>
    <div id="historyDiv">
        <h1><?php the_title() ?></h1>
        <p id="date201"><?php the_field("date") ?></p>
        <p id="history"><?php the_field("texte") ?></p>
    </div>
    <div id="pictureContent">

        <div class="picture" id="picture1">
            <p id="photoNumber">+6</p>
            <img src="<?php the_field("galerie_2"); ?>" class="mainPicture" alt="miniature" id="car1" />
            <p class="title">Photos</p>
        </div>

        <?php if(the_field("video")){
            ?>
        <div class="picture" id="picture2">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini2.png" class="mainPicture" alt="miniature" id="car2" />

            <p class="title">Vidéo</p>
        </div>
            <?php
        }
        ?>
        <?php if(the_field("modele_3d")){
            ?>
            <div class="picture" id="picture3">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini3.png" class="mainPicture" alt="miniature" id="car3" />
            <p class="title">360°</p>
        </div>
            <?php
        }
        ?>
       
    </div>

</section>

<p id="menuOffer2"><a href="#"><span id="activeOffer">Offres</span></a><a href="#"><span>Demandes</span></a><a href="#"><span>Échanges</span></a></p>
<h2 id="mobileh2">Offres Peugeot 201</h2>
<p id="modelDate2">année 1930</p>
<p class="filterhr2" onclick="showFilter()"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/filter.png" alt="picto filrer" class="filter" />Filtrer</p>

<section id="OffersModel">
    <div id="recentOffers">
        <p id="menuOffer"><span class="activeOffer" id="firstSpan" onclick="showOffers()">Offres</span><span id="secondSpan" onclick="showRequests()">Demandes</span><span id="thirdSpan" onclick="showExchanges()">Échanges</span></p>

        <p id="modelDate">année 1930</p>
        <article class="offers" id="lastOffers">
            <h2>Dernières Offres Peugeot 201</h2>
            <div class="offersContainer">
                <div class="offer" onclick="window.location.href='announcement.phtml'">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini4.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 201<span class="price">20€</span></h3>
                        <h4>Colonne de direction</h4>
                        <p class="description">vend colonne complète avec neiman et levier de vitesse pour 204 Peugeot de mai 1969,bon état</p>
                        <p class="location">Lille 59000<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <hr>
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini5.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 201<span class="price">20€</span></h3>
                        <h4>Poignée de maintien intérieur</h4>
                        <p class="description">Poignée de maintien intérieur ( avec crochet pour cintre )Prix a l'unité</p>
                        <p class="location">Lille 59000<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <hr>
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini6.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 201<span class="price">20€</span></h3>
                        <h4>Rétroviseur ancien</h4>
                        <p class="description">Vend rétro vintage pour voiture de collection</p>
                        <p class="location">Lille 59000<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <hr>
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini7.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 201<span class="price">20€</span></h3>
                        <h4>Support moteur boite ancien…</h4>
                        <p class="description">bonjour je vends ce support moteur ou boite ancien vieille voiture neuf depoque jamais monté tres bon etat a voir pour le model envois possible vintage ancienne collection</p>
                        <p class="location">Lille 59000<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <hr>
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini9.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 201<span class="price">20€</span></h3>
                        <h4>Siège voiture de sport anciennen</h4>
                        <p class="description">Siège en cuir de voiture de sport ancienne en excellent état !</p>
                        <p class="location">Lille 59000<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <hr>
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini8.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 201<span class="price">20€</span></h3>
                        <h4>Lots de filtres a huile pour BMW NSU collection</h4>
                        <p class="description">Lot de 4 filtres a huile neufs pour voiture BMW 600 et 700, NSU. toujours dans leurs boite d'origine. port en plus</p>
                        <p class="location">Lille 59000<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <div class="switchers">
                    <a href="#">
                        <div class="rect"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Left_Arrow.png" alt="flèche gauche" id="arrowRight" /></div>
                    </a>
                    <a href="#">
                        <div class="num">1</div>
                    </a>
                    <a href="#">
                        <div class="num">2</div>
                    </a>
                    <a href="#">
                        <div class="num" id="active">3</div>
                    </a>
                    <a href="#">
                        <div class="num">4</div>
                    </a>
                    <a href="#">
                        <div class="num">...</div>
                    </a>
                    <a href="#">
                        <div class="num">20</div>
                    </a>
                    <a href="#">
                        <div class="rect"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Right_Arrow.png" alt="flèche droite" id="arrowRight" /></div>
                    </a>
                </div>
            </div>
        </article>
        <article class="offers" id="requests">
            <h2>Dernières demandes Peugeot 201</h2>
            <div class="offersContainer">
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini4.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 204<span class="price">20€</span></h3>
                        <h4>Baie de pare brise</h4>
                        <p class="description">Recherche Grille d'aération et de ventilation pour Peugeot 204 304
                            à venir chercher sur Avion à côté de Lens </p>
                        <p class="location">Lens<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <hr>
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini5.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 204<span class="price">20€</span></h3>
                        <h4>Rétroviseur ancien chromé</h4>
                        <p class="description">Recherche rétroviseur pour une peugeot 204</p>
                        <p class="location">Lille 59000<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <hr>
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini4.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 204<span class="price">20€</span></h3>
                        <h4>Baie de pare brise</h4>
                        <p class="description">Recherche Grille d'aération et de ventilation pour Peugeot 204 304
                            à venir chercher sur Avion à côté de Lens </p>
                        <p class="location">Lens<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <hr>
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini5.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 204<span class="price">20€</span></h3>
                        <h4>Rétroviseur ancien chromé</h4>
                        <p class="description">Recherche rétroviseur pour une peugeot 204</p>
                        <p class="location">Lille 59000<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <hr>
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini4.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 204<span class="price">20€</span></h3>
                        <h4>Baie de pare brise</h4>
                        <p class="description">Recherche Grille d'aération et de ventilation pour Peugeot 204 304
                            à venir chercher sur Avion à côté de Lens </p>
                        <p class="location">Lens<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <hr>
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini5.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 204<span class="price">20€</span></h3>
                        <h4>Rétroviseur ancien chromé</h4>
                        <p class="description">Recherche rétroviseur pour une peugeot 204</p>
                        <p class="location">Lille 59000<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <div class="switchers">
                    <a href="#">
                        <div class="rect"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Left_Arrow.png" alt="flèche gauche" id="arrowRight" /></div>
                    </a>
                    <a href="#">
                        <div class="num">1</div>
                    </a>
                    <a href="#">
                        <div class="num">2</div>
                    </a>
                    <a href="#">
                        <div class="num" id="active">3</div>
                    </a>
                    <a href="#">
                        <div class="num">4</div>
                    </a>
                    <a href="#">
                        <div class="num">...</div>
                    </a>
                    <a href="#">
                        <div class="num">20</div>
                    </a>
                    <a href="#">
                        <div class="rect"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Right_Arrow.png" alt="flèche droite" id="arrowRight" /></div>
                    </a>
                </div>
            </div>
        </article>
        <article class="offers" id="exchanges">
            <h2>Dernières demandes d'échange Peugeot 201</h2>
            <div class="offersContainer">
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini4.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 204<span class="price">20€</span></h3>
                        <h4>Colonne de direction</h4>
                        <p class="description">vend colonne complète avec neiman et levier de vitesse pour 204 Peugeot de mai 1969,bon état</p>
                        <p class="location">Lille 59000<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <hr>
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini5.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 204<span class="price">20€</span></h3>
                        <h4>Poignée de maintien intérieur</h4>
                        <p class="description">Poignée de maintien intérieur ( avec crochet pour cintre )Prix a l'unité</p>
                        <p class="location">Lille 59000<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <hr>
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini6.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 204<span class="price">20€</span></h3>
                        <h4>Rétroviseur ancien</h4>
                        <p class="description">Vend rétro vintage pour voiture de collection</p>
                        <p class="location">Lille 59000<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <hr>
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini7.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 204<span class="price">20€</span></h3>
                        <h4>Support moteur boite ancien…</h4>
                        <p class="description">bonjour je vends ce support moteur ou boite ancien vieille voiture neuf depoque jamais monté tres bon etat a voir pour le model envois possible vintage ancienne collection</p>
                        <p class="location">Lille 59000<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <hr>
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini9.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 204<span class="price">20€</span></h3>
                        <h4>Siège voiture de sport anciennen</h4>
                        <p class="description">Siège en cuir de voiture de sport ancienne en excellent état !</p>
                        <p class="location">Lille 59000<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <hr>
                <div class="offer">
                    <div class="offerPicture">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/mini8.png" alt="colonne de direction">
                    </div>
                    <div class="offerContent">
                        <h3 class="brand">Peugeot 204<span class="price">20€</span></h3>
                        <h4>Lots de filtres a huile pour BMW NSU collection</h4>
                        <p class="description">Lot de 4 filtres a huile neufs pour voiture BMW 600 et 700, NSU. toujours dans leurs boite d'origine. port en plus</p>
                        <p class="location">Lille 59000<span class="date">Jul 20, 2018 </span></p>
                    </div>
                </div>
                <div class="switchers">
                    <a href="#">
                        <div class="rect"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Left_Arrow.png" alt="flèche gauche" id="arrowRight" /></div>
                    </a>
                    <a href="#">
                        <div class="num">1</div>
                    </a>
                    <a href="#">
                        <div class="num">2</div>
                    </a>
                    <a href="#">
                        <div class="num" id="active">3</div>
                    </a>
                    <a href="#">
                        <div class="num">4</div>
                    </a>
                    <a href="#">
                        <div class="num">...</div>
                    </a>
                    <a href="#">
                        <div class="num">20</div>
                    </a>
                    <a href="#">
                        <div class="rect"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Right_Arrow.png" alt="flèche droite" id="arrowRight" /></div>
                    </a>
                </div>
            </div>
        </article>
    </div>
    <div class="filterResults">
        <p class="filterhr"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/hr.png" alt="ligne" class="hr" />Filtrer</p>
        <p class="filterp">Pour filtrer nos annonces par type de pièces détachées, merci d'utiliser les filtres ci-dessous :</p>

        <p class="ultitle" id="modelP">Modèles<span class="arrow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-down.png" alt="flèche vers le bas" id="arrowModelTest" /></span></p>

        <ul id="modelUl" style="display:none">
            <li><input type="checkbox" id="checkModel1" /><label for="checkModel1">1930</label></li>
            <li><input type="checkbox" id="checkModel2" /><label for="checkModel2">CL 1930</label></li>
            <li><input type="checkbox" id="checkModel3" /><label for="checkModel3">1933</label></li>
            <li><input type="checkbox" id="checkModel4" /><label for="checkModel4">B 1933</label></li>
            <li><input type="checkbox" id="checkModel5" /><label for="checkModel5">Coupé 1931</label></li>
            <li><input type="checkbox" id="checkModel6" /><label for="checkModel6">MA6Y 1936</label></li>
        </ul>

        <p class="ultitle" id="cableP">Câbles<span class="arrow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-down.png" alt="flèche vers le bas" id="arrowCable" /></span></p>

        <ul id="cablesUl" style="display:none">
            <li><input type="checkbox" id="checkCable1" /><label for="checkCable1">Accélérateur</label></li>
            <li><input type="checkbox" id="checkCable2" /><label for="checkCable2">Starter</label></li>
            <li><input type="checkbox" id="checkCable3" /><label for="checkCable3">Capot et hayon</label></li>
            <li><input type="checkbox" id="checkCable4" /><label for="checkCable4">Embrayage</label></li>
            <li><input type="checkbox" id="checkCable5" /><label for="checkCable5">Capot et hayon</label></li>
            <li><input type="checkbox" id="checkCable6" /><label for="checkCable6">Commande de chauffage</label></li>
        </ul>

        <p class="ultitle">Carrosserie<span class="arrow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-down.png" alt="flèche vers le bas" /></span></p>

        <p class="ultitle">Electricité<span class="arrow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-down.png" alt="flèche vers le bas" /></span></p>

        <p class="ultitle">Intérieur<span class="arrow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-down.png" alt="flèche vers le bas" /></span></p>

        <p class="ultitle">Transmission<span class="arrow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-down.png" alt="flèche vers le bas" /></span></p>

        <p class="ultitle">Mécanique<span class="arrow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-down.png" alt="flèche vers le bas" /></span></p>

        <p class="ultitle">Accessoires<span class="arrow"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow-down.png" alt="flèche vers le bas" /></span></p>



    </div>

</section>
</main>
</article>
