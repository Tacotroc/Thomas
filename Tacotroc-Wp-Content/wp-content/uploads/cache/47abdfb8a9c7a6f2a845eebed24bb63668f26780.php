<?php $__env->startSection('content'); ?>
  <div class="p404_content">
    <h1>La page que vous recherchez </br> semble introuvable.</h1>
    <img src="<?= App\asset_path('images/404.png'); ?>" />
    <a href="/">Retour à la Page d’accueil</a>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>