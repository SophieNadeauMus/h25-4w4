<?php
  /**
   * Template Name: Pays
   */
?>
<?php get_header(); ?>
<section class="pays">
  <div class="pays__intro">
    <div class="pays__intro__contenu">
      <p><?php the_field('description_pays'); ?></p>
    </div>
  </div>
  <div class="pays__liste">
    <?php pays_liste(); ?>
    <h2 class="pays__liste__titre"></h2>
    <div class="destination__list" data-method=search></div>
  </div>
</section>
<?php get_footer(); ?>