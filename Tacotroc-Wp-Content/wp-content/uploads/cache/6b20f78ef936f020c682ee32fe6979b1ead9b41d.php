<?php
    global $wpdb;

    // Pagination
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = (20 * $page) - 20;
    $offset = $offset < 0 ? 0 : $offset;
    $terms = isset($_GET['terms']) ? implode(",", explode("-",$_GET['terms'])) : null;


    $q = isset($_GET['q']) ? $_GET['q'] : '';
    $type = isset($_GET['type']) ? $_GET['type'] : 'offres';

    // Terms
    if($terms !== null){
      $query = "SELECT p.ID, p.post_title, (SELECT SUBSTRING(SUBSTRING_INDEX(SUBSTRING_INDEX(meta_value,';',2),':',-1), 2, LENGTH(SUBSTRING_INDEX(SUBSTRING_INDEX(meta_value,';',2),':',-1)) - 2) FROM wp_postmeta WHERE post_id=p.ID and meta_key='modele') as modele, (SELECT meta_value FROM wp_postmeta WHERE post_id=p.ID and meta_key='type') as type FROM wp_posts as p WHERE p.post_status='publish' AND p.post_type='".$type."' AND p.ID IN (SELECT object_id FROM wp_term_relationships WHERE term_taxonomy_id IN (".$terms.")) HAVING modele IN (SELECT ID FROM wp_posts WHERE wp_posts.`post_type`='modeles' AND post_name like '".$q."%' AND post_status='publish') LIMIT 20 OFFSET ".$offset." ";

      $offers = $wpdb->get_results($query);

      // Results
      $query = "SELECT p.ID, p.post_title, (SELECT SUBSTRING(SUBSTRING_INDEX(SUBSTRING_INDEX(meta_value,';',2),':',-1), 2, LENGTH(SUBSTRING_INDEX(SUBSTRING_INDEX(meta_value,';',2),':',-1)) - 2) FROM wp_postmeta WHERE post_id=p.ID and meta_key='modele') as modele, (SELECT meta_value FROM wp_postmeta WHERE post_id=p.ID and meta_key='type') as type FROM wp_posts as p WHERE p.post_status='publish' AND p.post_type='".$type."' AND p.ID IN (SELECT object_id FROM wp_term_relationships WHERE term_taxonomy_id IN (".$terms.")) HAVING modele IN (SELECT ID FROM wp_posts WHERE wp_posts.`post_type`='modeles' AND post_name like '".$q."%' AND post_status='publish')";
    } else {
      $query = "SELECT p.ID, p.post_title, (SELECT SUBSTRING(SUBSTRING_INDEX(SUBSTRING_INDEX(meta_value,';',2),':',-1), 2, LENGTH(SUBSTRING_INDEX(SUBSTRING_INDEX(meta_value,';',2),':',-1)) - 2) FROM wp_postmeta WHERE post_id=p.ID and meta_key='modele') as modele, (SELECT meta_value FROM wp_postmeta WHERE post_id=p.ID and meta_key='type') as type FROM wp_posts as p WHERE p.post_status='publish' AND p.post_type='".$type."' HAVING modele IN (SELECT ID FROM wp_posts WHERE wp_posts.`post_type`='modeles' AND post_name like '".$q."%' AND post_status='publish') LIMIT 20 OFFSET ".$offset." ";

      $offers = $wpdb->get_results($query);

      // Results
      $query = "SELECT p.ID, p.post_title, (SELECT SUBSTRING(SUBSTRING_INDEX(SUBSTRING_INDEX(meta_value,';',2),':',-1), 2, LENGTH(SUBSTRING_INDEX(SUBSTRING_INDEX(meta_value,';',2),':',-1)) - 2) FROM wp_postmeta WHERE post_id=p.ID and meta_key='modele') as modele, (SELECT meta_value FROM wp_postmeta WHERE post_id=p.ID and meta_key='type') as type FROM wp_posts as p WHERE p.post_status='publish' AND p.post_type='".$type."' HAVING modele IN (SELECT ID FROM wp_posts WHERE wp_posts.`post_type`='modeles' AND post_name like '".$q."%' AND post_status='publish')";
    }

    $nbResults = $wpdb->get_results($query);
    $nbResults = count($nbResults);

  ?>

<article <?php post_class() ?>>
<main>

<p class="path" style="cursor:pointer"><span onclick="window.location.href='index.phtml'">Accueil </span><span class="pathImg"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Base.png" alt="triangle" id="triangle" /></span><span onclick="window.location.href='brand.phtml'">Marque</span><span class="pathImg"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Base.png" alt="triangle" id="triangle" /></span><span class="pathelt"><?php the_title() ?></span></p>

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

<div id="carouselPic">
  <img src="<?= App\asset_path('images/img_model/croix.png'); ?>" alt="croix" id="croix" />
  <div class="slideshow">
      <div class="btn-bar">
          <p id="prev" onclick="plusSlide(-1)"><img src="<?= App\asset_path('images/img_index/arrowRight.png'); ?>" alt="flèche" id="arrow" style="transform:rotate(180deg)" /></p>
          <p id="next" onclick="plusSlide(+1)"><img src="<?= App\asset_path('images/img_index/arrowRight.png'); ?>" alt="flèche" id="arrow" /></p>
      </div>
      <div class=" slideshow-container" id="slide">
          <p class="mySlides active" id="indice-1"> <img src="<?= App\asset_path('images/img_index/event.png'); ?>" alt="photo d'événement" id="event1" /></p>
          <p class="mySlides" id="indice-2"><img src="<?= App\asset_path('images/img_index/mini2.png'); ?>" alt="photo d'événement" id="event1" /></p>
          <p class="mySlides" id="indice-3"><img src="<?= App\asset_path('images/img_index/event.png'); ?>" alt="photo d'événement" id="event1" /></p>
          <p class="mySlides" id="indice-4"><img src="<?= App\asset_path('images/img_index/mini2.png'); ?>" alt="photo d'événement" id="event1" /></p>
          <p class="mySlides" id="indice-5"><img src="<?= App\asset_path('images/img_index/event.png'); ?>" alt="photo d'événement" id="event1" /></p>
      </div>
  </div>
</div>

<script>
    var slideIndex = 1;
    function plusSlides(n) {
      showSlides((slideIndex += n));
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let paragraph = document.getElementsByClassName("changep");

      if (n > slides.length && n > paragraph.length) {
        slideIndex = 1;
      }
      if (n < 1) {
        slideIndex = slides.length;
        slideIndex = paragraph.length;
      }
      for (i = 0; i < slides.length; i++) {
        slides[i].classList.remove("active");
      }

      for (i = 0; i < paragraph.length; i++) {
        paragraph[i].style.display = "none";
      }

      slides[slideIndex - 1].classList.toggle("active");

      paragraph[slideIndex - 1].style.display = "block";
    }

    function plusSlide(n) {
      showSlide((slideIndex += n));
    }

    function showSlide(n) {
      let i;
      let slide = document.getElementsByClassName("mySlides");

      if (n > slide.length) {
        slideIndex = 1;
      }
      if (n < 1) {
        slideIndex = slide.length;
      }
      for (i = 0; i < slide.length; i++) {
        slide[i].classList.remove("active");
      }

      slide[slideIndex - 1].classList.toggle("active");
    }
  </script>

<section id="OffersModel">
    <div id="recentOffers">
        <p id="menuOffer">
          <a href="?type=offre"><span class="activeOffer" id="firstSpan">Offres</span></a>
          <a href="?type=demande"><span id="secondSpan">Demandes</span></a>
          <a href="?type=echange"><span id="thirdSpan">Échanges</span></a>
        </p>

        <article class="offers" id="lastOffers">
          <h2>Dernières Offres Peugeot 201</h2>
          <div class="offersContainer">
            <?php foreach($offers as $offer): ?>
            <?php
              $model = get_field("modele", $offer->ID);
              $post = get_post($offer->ID);
              $image = get_field("picture_1", $offer->ID);
            ?>
            <a href="<?= get_permalink($offer->ID) ?>" class="clean">
              <div class="offer">
                    <div class="offerPicture" style="background-image: url(<?= $image["url"]; ?>)"></div>
                    <div class="offerContent">
                        <h3 class="brand"><?= $model[0]->post_title ?><span class="price"><?= get_field("prix", $offer->ID); ?>€</span></h3>
                        <h4><?= get_the_title($offer->ID); ?></h4>
                        <p class="description"><?= helper_description(get_field("description", $offer->ID)); ?></p>
                        <p class="location"><?= get_field("city", $offer->ID); ?><span class="date">Publiée le <?=  date('d/m/y', strtotime($post->post_date))?></span></p>
                    </div>
                </div>
              </a>
              <hr>
            <?php endforeach; ?>
          </div>

        </article>
    </div>

    <article class="filterResults">
      <p class="filterhr"><img src="<?= App\asset_path('images/img_research/hr.png'); ?>" alt="ligne" class="hr" />Filtrer</p>
      <p class="filterp">Pour filtrer nos annonces par type de pièces détachées, merci d'utiliser les filtres ci-dessous :</p>

      <?php
        $termsSidebar = get_terms(array(
          'taxonomy' => 'category_piece',
          'hide_empty' => false,
          'parent' => 0
        ));

        foreach($termsSidebar as $sub){ ?>
          <p class="ultitle main_filters" style="cursor:pointer"><?= $sub->name ?><span class="arrow"><img src="<?= App\asset_path('images/img_research/arrow-down.png'); ?>" alt="flèche vers le bas" id="arrowResearch" /></span></p>
          <?php
          $termsSubSub = get_terms(array(
            'taxonomy' => 'category_piece',
            'hide_empty' => false,
            'parent' => $sub->term_id
          ));

          echo '<ul id="researchUl" class="researchUl">';
          foreach($termsSubSub as $subsub){
            ?>
              <li><input type="checkbox" id="term_<?= $subsub->term_id ?>" /><label for="term_<?= $subsub->term_id ?>"><?= $subsub->name ?></label></li>
            <?php
          }
          echo '</ul>';
        }
      ?>
    </article>
</section>
</main>
</article>
