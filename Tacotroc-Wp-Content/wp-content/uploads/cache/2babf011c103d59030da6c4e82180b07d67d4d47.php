<?php $__env->startSection('content'); ?>

<section id="popularBrands">

      <h2>Marques populaires<a href="/marques"><span>Voir tout ></span></a></h2>
      <div id="brandContainer">
      <?php $loop = new WP_Query( array( 'post_type' => 'marques', 'posts_per_page' => 6) ); ?>

          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <a href="<?php echo get_permalink() ?>">
              <div class="brands">
                <img src="<?php echo the_post_thumbnail_url() ?>" alt="voiture citroën" id="citroën" />
                <p><?php echo the_title() ?></p>
              </div>
            </a>
          <?php endwhile ; ?>
      </div>
  </section>

<section id="popularBrands">

      <h2>modeles populaires<a href="#"><span onclick="window.location.href='allBrands.phtml'">Voir tout ></span></a></h2>
      <div id="brandContainer">
      <?php $loop = new WP_Query( array( 'post_type' => 'modeles', 'posts_per_page' => 5) ); ?>

          <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <a href="<?php echo get_permalink() ?>">
              <div class="brands">
                <img src="<?php echo the_post_thumbnail_url() ?>" alt="voiture citroën" id="citroën" />
                <p><?php echo the_title() ?></p>
              </div>
            </a>
          <?php endwhile ; ?>
      </div>
  </section>
  <?php while(have_posts()): ?> <?php the_post() ?>
    <?php echo $__env->make('partials.content-'.get_post_type(), array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php endwhile; ?>
  <?php echo get_the_posts_navigation(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>