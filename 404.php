<!-- Page d'erreur 404 -->
 <?php
  $coord_description = get_theme_mod('coord_description', '');
  $background_404 = get_theme_mod('background_404', '');
  $couleur_404 = get_theme_mod('couleur_404', '');
  $titre_404 = get_theme_mod('titre_404', 'Erreur 404');
  $message_404 = get_theme_mod('message_404', 'La page que vous cherchez n\'existe pas.');
 ?>
<?php get_header(); ?>
<section class="erreur" style="background-image: url(<?= $background_404 ?>) ; color: <?= $couleur_404; ?>">
  <div class="erreur__contenu">
    <h1 class="erreur__titre"><?= $titre_404; ?></h1>
    <p class="erreur__message"><?= $message_404 ?></p>
    <a class="erreur__btn" href="<?php echo home_url(); ?>" style="background-color: <?= $couleur_404; ?>">Retour à l'accueil</a>
    <div class="erreur__nav">
    <?php wp_nav_menu(array(
      'menu' => 'erreur',
      'container' => false,
      )); ?>
    </div>
  </div>
</section>
<?php get_footer(); ?>