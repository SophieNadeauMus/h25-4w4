<?php
  /**
   * Template Name: Pays
   */
?>
<?php get_header(); ?>
<section class="pays">
  <div class="pays__intro">
   <p><?php the_field('description_pays'); ?></p>
  </div>
  <div class="pays__liste">
    <?php pays_liste(); ?>
  </div>
</section>
<?php get_footer(); ?>