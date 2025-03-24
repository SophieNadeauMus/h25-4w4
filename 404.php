<!-- Page d'erreur 404 -->
 <?php
  $coord_description = get_theme_mod('coord_description', '');
 ?>
<?php get_header(); ?>
<section class="erreur global">
  <div class="erreur__contenu">
    <h1>Erreur 404</h1>
    <h5>La page que vous cherchez n'existe pas.</h5>
  </div>
  <div class="erreur__nav">
    <p>Voici quelques liens utiles pour vous aider: </p>
    <?php wp_nav_menu(array(
      'menu' => 'erreur',
      'container' => false,
    )); ?>
  </div>
  <div class="erreur__description">
    <h6>À propos de notre site</h6>
    <p><?= $coord_description; ?></p>
  </div>
</section>
<?php get_footer(); ?>