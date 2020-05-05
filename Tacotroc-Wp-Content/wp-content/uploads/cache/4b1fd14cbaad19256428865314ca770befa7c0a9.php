<article <?php post_class() ?>>
  <main>
    <p class="path" style="cursor:pointer"><span onclick="window.location.href='<?php echo get_home_url() ?>'">Accueil</span><span class="pathImg"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Base.png" alt="triangle" id="triangle" /></span><span class="pathelt"><?php the_title() ?></span></p>
    <section id="peugeotSection">
        <div id="presentation">
            <div id="peugeotContent">
                <h2><?php the_title() ?></h2>
            <p><?php the_field("description") ?></p>
              </div>
            <div id="peugeotPicture">
                <img src="<?php the_field("image"); ?>" alt="affiche Peugeot" id="picture" />
            </div>
        </div>
        <div id="models">
            <h2>Modèles</h2>
            <div id="modelsContainer">
              <?php 
            $query = new WP_Query(array(
              'post_type' => 'modeles',
              'posts_per_page' => 12,
              'post_status' => 'publish'
          ));

         $brandId = get_the_ID();          
          
          while ($query->have_posts()) {
              $query->the_post();
              $post_id = get_the_ID();
              if(get_field("marque")[0]->ID === $brandId){
                  ?>
                  <a href="<?php echo get_permalink() ?>" class="model">
           
              <div class="modelpicture">
                  <img src="<?php echo the_post_thumbnail_url() ?>" alt="photo du modèle" />
              </div>
              <div class="modelnumber">
                  <p><?php the_title() ?></p>
              </div>
              </a>
          <?php
              }
           
          }
          
          wp_reset_query();
              ?>
               
            </div>
        </div>
    </section>
    <section id="Offers">
        <div id="recentOffers">
            <p id="menuOffer"><a href="#"><span id="activeOffer">Offres</span></a><a href="#"><span>Demandes</span></a><a href="#"><span>Échanges</span></a></p>
            <h2>Offres récentes Peugeot</h2>
            <article class="offers">
                <div class="offersContainer">
                    <div class="offer">
                        <div class="offerPicture">
                            <img src="assets/img/img_index/mini4.png" alt="colonne de direction">
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
                            <img src="assets/img/img_index/mini5.png" alt="colonne de direction">
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
                            <img src="assets/img/img_index/mini6.png" alt="colonne de direction">
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
                            <img src="assets/img/img_index/mini7.png" alt="colonne de direction">
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
                            <img src="assets/img/img_index/mini9.png" alt="colonne de direction">
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
                            <img src="assets/img/img_index/mini8.png" alt="colonne de direction">
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
                            <div class="rect"><img src="assets/img/img_index/Left_Arrow.png" alt="flèche gauche" id="arrowRight" /></div>
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
                            <div class="rect"><img src="assets/img/img_index/Right_Arrow.png" alt="flèche droite" id="arrowRight" /></div>
                        </a>
                    </div>
                </div>
            </article>
        </div>
        <div id="clubs">
            <p id="clubTitle"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/hr.png" alt="ligne horizontale" id="hr" />Clubs</p>
            <a href="http://leschtispistons.fr.overblog.com/" target="_blank">
                <div id="club">
                    <div id="contentClub">
                        <h2>LES CHTIS PISTONS</h2>
                        <p>62550 Pernes</p>
                    </div>

                    <div id="logoClub">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logoclub.png" alt="logo du club" />
                    </div>
                </div>
            </a>
            <a href="http://2cv-club-de-la-sensee.e-monsite.com/">
                <div id="club">
                    <div id="contentClub">
                        <h2>2CV club de la Sensée</h2>
                        <p>59247 Féchain</p>
                    </div>
                    <div id="logoClub">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/2cvclub.jpg" alt="logo du club" id="cvclub" />
                    </div>
                </div>
            </a>
            <a href="http://cardouai.fr/" target="_blank">
                <div id="club">
                    <div id="contentClub">
                        <h2>CAR Douai</h2>
                        <p>59500 Douai</p>
                    </div>
                    <div id="logoClub">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-CAR-Douai.jpg" alt="logo du club" id="autopassion" />
                    </div>
                </div>
            </a>
        </div>
    </section>
</main>



</article>
