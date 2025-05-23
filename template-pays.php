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
      <div class="pays__intro__evt">
        <h2>Événement à venir : </h2>
        <p><?php the_field('date_evt'); ?></p>
        <p><?php the_field('heure_evt'); ?></p>
        <p><?php the_field('conferencier_evt'); ?></p>
        <p><?php the_field('coord_evt'); ?></p>
      </div>
    </div>
  </div>
  <div class="pays__vague">
    <?php genere_vague(''); ?>
  </div>
  <div class="pays__liste">
    <div class="pays__liste__contenu">
      <?php pays_liste(); ?>
      <h2 class="pays__liste__titre"></h2>
      <div class="destination__list" data-method=search></div>
    </div>
  </div>
</section>
<?php get_footer(); ?>