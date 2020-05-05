<?php $__env->startSection('content'); ?>

<?php
    global $wpdb;

    $query = "SELECT p.ID, p.post_title, (SELECT SUBSTRING(SUBSTRING_INDEX(SUBSTRING_INDEX(meta_value,';',2),':',-1), 2, LENGTH(SUBSTRING_INDEX(SUBSTRING_INDEX(meta_value,';',2),':',-1)) - 2) FROM wp_postmeta WHERE post_id=p.ID and meta_key='modele') as modele,
    (SELECT meta_value FROM wp_postmeta WHERE post_id=p.ID and meta_key='type') as type
    FROM wp_posts as p
    WHERE p.post_status='publish'
    HAVING type='offre'
    LIMIT 20";

    $offers = $wpdb->get_results($query);

    $query = "SELECT p.ID, p.post_title, (SELECT SUBSTRING(SUBSTRING_INDEX(SUBSTRING_INDEX(meta_value,';',2),':',-1), 2, LENGTH(SUBSTRING_INDEX(SUBSTRING_INDEX(meta_value,';',2),':',-1)) - 2) FROM wp_postmeta WHERE post_id=p.ID and meta_key='modele') as modele,
    (SELECT meta_value FROM wp_postmeta WHERE post_id=p.ID and meta_key='type') as type
    FROM wp_posts as p
    WHERE p.post_status='publish'
    HAVING type='demande'
    LIMIT 20";

    $demandes = $wpdb->get_results($query);
?>

<?php
  $sticky_posts = get_option('sticky_posts');
  $sticky = implode(",", $sticky_posts);
?>

<section class="onOne">
    <h1 style="cursor:pointer">
      <span>À la une</span>
      <a href="/blog"><span id="articleList">Voir tout ></span></a>
    </h1>
    <article>
        <div id="left">
            <div class="pictureLeft" style="background-image: url(<?= get_the_post_thumbnail_url($sticky_posts[0]) ?>)"></div>
            <div id="leftContent">
                <a href="<?= get_permalink($sticky_posts[0]) ?>"><h2 class="truncationTitle"><?= get_the_title($sticky_posts[0]) ?></h2></a>
                <p class="truncation"><?= get_the_excerpt($sticky_posts[0]) ?></p>
            </div>
        </div>
        <div id="right">
          <?php foreach($sticky_posts as $key => $sticky): if($key !== 0): ?>
            <div class="rightContent">
                <div class="pictureRight" style="background-image: url(<?= get_the_post_thumbnail_url($sticky_posts[0]) ?>)"></div>
                <div class="presentation">
                    <h2 class="truncationTitle"><a href="<?= get_permalink($sticky_posts[0]) ?>"><?= get_the_title($sticky) ?></a></h2>
                    <p class="truncation"><?= get_the_excerpt($sticky) ?></p>
                </div>
            </div>
          <?php endif; endforeach; ?>
        </div>
    </article>
</section>

<section id="popularBrands">
  <h2>Marques populaires<a href="/marques"><span>Voir tout ></span></a></h2>
  <div id="brandContainer">
    <?php
      $query = "SELECT distinct(p.ID), p.post_title, pm.meta_key, pm.meta_value FROM wp_posts as p
                LEFT JOIN wp_postmeta as pm ON pm.post_id = p.ID
                WHERE p.post_status='publish'
                AND p.post_type='marques'
                HAVING meta_key = 'sticky' AND meta_value = '1'
                ORDER BY post_title ASC
                LIMIT 6";

      $brands = $wpdb->get_results($query);
    ?>
      <?php foreach($brands as $brand) :?>
        <a href="<?php echo get_permalink($brand->ID) ?>">
          <div class="brands">
            <img src="<?= get_field("sticky_picture", $brand->ID) ?>" alt="<?= $brand->post_title ?>" width="177" height="239" />
            <p><?php echo get_the_title($brand->ID) ?></p>
          </div>
        </a>
      <?php endforeach ; ?>
  </div>
</section>

<section class="market">
    <article class="offers">
        <h2>Dernières offres<a href="/annonces/?type=offres"><span>Voir tout ></span></a></h2>
        <div class="offersContainer">
        <?php foreach($offers as $offer): ?>
          <?php
            $model = get_field("modele", $offer->ID);
            $post = get_post($offer->ID);
            $image = get_field("picture_1", $offer->ID);
          ?>
          <a href="<?= get_permalink($offer->ID) ?>" class="clean">
            <div class="offer">
                  <div class="offerPicture">
                      <img height="108" width="142" src="<?= $image["url"]; ?>" alt="<?= $model[0]->post_title ?>">
                  </div>
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
    <article id="requests">
        <h2>Dernières demandes<a href="/annonces/?type=demandes"><span>Voir tout ></span></a></h2>
        <div id="requestContainer">
        <?php foreach($demandes as $demande): ?>
          <?php
            $model = get_field("modele", $demande->ID);
            $post = get_post($demande->ID);
          ?>
            <div class="requestContent">
                <h3 class="brand"><?= $model[0]->post_title ?></h3>
                <h4><?= get_the_title($offer->ID); ?></h4>
                <p class="descriptionRequest"><?= helper_description(get_field("description", $offer->ID)); ?></p>
                <p class="location"><?= get_field("city", $offer->ID); ?><span class="date">Publiée le <?=  date('d/m/y', strtotime($post->post_date)) ?></span></p>
            </div>
            <hr class="test">
          <?php endforeach; ?>
        </div>

        <?php
          $query = "SELECT p.ID, p.post_title, pm.meta_key, pm.meta_value FROM wp_posts as p
          LEFT JOIN wp_postmeta as pm ON pm.post_id = p.ID
          WHERE p.post_status='publish'
          AND p.post_type='event'
          HAVING pm.meta_key= 'date_fin'
          AND meta_value >= '" . date("Ymd") . "'";

          $events = $wpdb->get_results($query);
        ?>

        <div id="events">
            <div class="slideshow">
                <h2>Évènements</h2>
                <div class="btn-bar">
                    <p id="prev" onclick="plusSlides(-1)"><img src="<?= App\asset_path('images/img_index/arrowRight.png'); ?>" alt="flèche" id="arrow" style="transform:rotate(180deg)" /></p>
                    <p id="next" onclick="plusSlides(+1)"><img src="<?= App\asset_path('images/img_index/arrowRight.png'); ?>" alt="flèche" id="arrow" /></p>
                </div>
                <div class="slideshow-container" id="slide">
                  <?php foreach($events as $key => $event): ?>
                    <p class="mySlides<?php if($key === 0): echo " active"; endif; ?>" id="indice-<?= $key + 1 ?>" >
                      <img src="<?= get_field("photo", $event->ID) ?>" id="event1" />
                    </p>
                  <?php endforeach; ?>
                </div>

                  <?php foreach($events as $key => $event): ?>
                    <p class="changep"<?php if($key === 1): ?> id="absent" <?php endif; ?><?php if($key > 1): ?> id="absent2" <?php endif; ?>>
                      <a href="<?= get_field("link", $event->ID) ?>" target="_blank">
                        <span class="red">Du <?= get_field("date_debut", $event->ID) ?> au <?= get_field("date_fin", $event->ID) ?></span><br>
                        <span class="titleEvent"><?= get_the_title($event->ID) ?></span><br>
                        <span class="location"><?= get_field("lieu", $event->ID) ?></span>
                      </a>
                    </p>
                  <?php endforeach; ?>
            </div>
        </div>
    </article>
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
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>