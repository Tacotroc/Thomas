<!doctype html>
<html <?php echo get_language_attributes(); ?>>
  <?php echo $__env->make('partials.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <body <?php body_class() ?>>
  <?php do_action('get_header') ?>
    <div class="wrap container" role="document">
      <div class="content">
        <main class="main">
          <?php echo $__env->yieldContent('content'); ?>
        </main>
      </div>
    </div>
    <?php wp_footer() ?>
  </body>
</html>
