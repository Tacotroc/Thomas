<?php $__env->startSection('content'); ?>
<?php
  $model = get_field("modele", $post->ID);

  if(isset($model[0]->ID)){
    $brand = get_field("marque", $model[0]->ID);
  }

  $picture_1 = get_field("picture_1", $post->ID);
  $picture_2 = get_field("picture_2", $post->ID);
  $picture_3 = get_field("picture_3", $post->ID);

  $status = offerHasOpen($post->ID);
?>
<section id="announcementContent">
    <article id="announcementLeft">
        <div id="announcePicture">
            <?php if(!empty($picture_1)): ?><img src="<?= $picture_1["sizes"]["large"] ?>" /><?php endif; ?>
            <?php if(!empty($picture_2)): ?><img src="<?= $picture_2["sizes"]["large"] ?>" /><?php endif; ?>
            <?php if(!empty($picture_3)): ?><img src="<?= $picture_3["sizes"]["large"] ?>" /><?php endif; ?>
        </div>

        <div id="announcementInfo">
            <p id="saveAndShare"><a href="#"><img src="<?= App\asset_path('images/img_announcement/share.png'); ?>" alt="bouton partager" id="share" /><span>Partager</span></a></p>
            <div class="offerContent">
                <h3 class="brand">
                  <?= isset($brand[0]->post_title) ? $brand[0]->post_title : '' ?>
                  <span class="price">
                    <?php if($status) : ?>
                      <?= get_field("prix", $post->ID); ?><?= !empty(get_field("prix", $post->ID)) ? "€ HT" : "" ?>
                    <?php else: ?>
                      <span class="sold">Vendu</span>
                    <?php endif; ?>
                  </span>
                </h3>
                <h4><?= get_the_title() ?></h4>
                <!-- <p class="description"></p> -->
                <p class="location">Publiée le <?=  date('d/m/y', strtotime($post->post_date))?></p>
            </div>
        </div>

        <div id="criteres">
            <h2>Critères</h2>
            <div>
                <p>Marque</p>
                <?php if(isset($brand[0]->post_title)): ?>
                  <p><a href="<?= get_permalink($brand[0]->ID) ?>"><?= $brand[0]->post_title ?></a></p>
                <?php else: ?>
                  <p>Inconnue</p>
                <?php endif; ?>
            </div>
            <div>
                <p>Modèle</p>
                <?php if(isset($model[0]->post_title)): ?>
                  <p><a href="<?= get_permalink($model[0]->ID) ?>"><?= $model[0]->post_title ?></a></p>
                <?php else: ?>
                  <p>Inconnu</p>
                <?php endif; ?>
            </div>
            <div>
                <p>Année modèle</p>
                <p><?= get_field("year_model", $post->ID); ?></p>
            </div>
            <div>
                <p>État</p>
                <p><?= get_field("etat", $post->ID); ?></p>
            </div>
        </div>

        <div id="description">
            <h2>Description</h2>
            <p><?= get_field("description", $post->ID); ?></p>
        </div>

        <div id="localisation">
            <div id="LocalisationContent">
                <h2>Localisation</h2>
                <p><?= get_field("ville", $post->ID); ?> (FRANCE)</p>
            </div>
        </div>
    </article>
    <article id="announcementRight">
        <div id="contact">
            <h2>Contacter le vendeur</h2>
            <p><button type="button" onClick="window.location.href='mailto:contact@tacotroc.com'">Envoyer un message</button></p>
        </div>

        <?php if($status && get_field("type", $post->ID) === "offre" ) : ?>
          <div id="transaction">
              <h2 id="secured"><span>Transaction sécurisée</span><img src="<?= App\asset_path('images/img_announcement/ruban.png'); ?>" alt="ruban" id="ruban" /></h2>
              <p id="transactionContent"></p>
              <p id="buy">
                <a href="/paiement/?annoucement=<?= get_the_ID() ?>">
                <button type="button">Acheter en ligne</button>
                </a>
              </p>
          </div>
        <?php endif; ?>
    </article>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>