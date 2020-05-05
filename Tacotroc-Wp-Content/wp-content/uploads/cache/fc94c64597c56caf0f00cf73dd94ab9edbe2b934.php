<?php
  $brands = getModelsAlpha();
?>
<?php $__env->startSection('content'); ?>
  <p class="path" style="cursor:pointer">
    <span onclick="window.location.href='/'">Accueil</span>
    <span class="pathImg"><img src="<?= App\asset_path('images/img_research/Base.png'); ?>" alt="bouton partager" id="share" /></span>
    <span class="pathelt">Toutes les marques</span>
  </p>

    <section id="allBrands">
        <article id="BrandsByLetters">
            <h1>Toutes les marques</h1>
            <p id="letters">
              <?php foreach($brands as $key => $brand): ?>
                <?php if(count($brand) > 0): ?>
                  <a href="#letter<?= ucfirst($key) ?>"><span class="letterSpan"><?= ucfirst($key) ?></span></a>
                <?php endif; ?>
              <?php endforeach; ?>
            </p>

            <?php foreach($brands as $key => $brand): ?>
              <?php if(count($brand) > 0): ?>
                <?php $nk = 0; ?>
                <h2 id="letter<?= ucfirst($key) ?>"><?= ucfirst($key) ?></h2>
                <div class="flexUl">
                  <?php for($i=0;$i<ceil(count($brand)/1);$i++): ?>
                    <ul>
                      <?php for($n=0;$n<1;$n++): ?>
                        <li>
                          <a href="<?= get_permalink($brand[$nk]->id) ?>">
                              <span><?= $brand[$nk]->title ?></span>
                          </a>
                        </li>
                        <?php $nk++; ?>
                      <?php endfor; ?>
                    </ul>
                  <?php endfor; ?>
              </div>
              <?php endif; ?>
            <?php endforeach; ?>
        </article>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>