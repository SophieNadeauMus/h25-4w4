<?php
  /**
   * Template Name: Pays
   */
?>
<?php get_header(); ?>
<section class="pays">
  <div class="pays__intro">
    <div class="pays__intro__contenu">
      <h1><?php the_title(); ?></h1>
      <p> <?php the_content(); ?></p>
    </div>
  </div>
  <div class="pays__vague__1">
    <?php genere_vague('rouge'); ?>
  </div>
  <div class="pays__liste">
    <div class="pays__liste__contenu">
      <?php pays_liste(); ?>
      <h2 class="pays__liste__titre"></h2>
      <div class="destination__list" data-method=search></div>
    </div>
  </div>
  <div class="pays__vague__2">
    <?php genere_vague('rouge'); ?>
  </div>
</section>
<?php get_footer(); ?>