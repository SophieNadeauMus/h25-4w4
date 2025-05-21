<?php 
  $footer_mission = get_theme_mod('footer_mission', 'Notre mission');
  $footer_couleur = get_theme_mod('footer_couleur', 'bisque');
  $coord_adresse = get_theme_mod('coord_adresse', ''); 
  $coord_telephone = get_theme_mod('coord_telephone', '');
  $coord_courriel = get_theme_mod('coord_courriel', '');
?>
<?php genere_vague($footer_couleur); ?> 
<footer style="background-color:<?= $footer_couleur ?>">
  <div class="piedpage">
    <section class="piedpage__s1">
      <div class="piedpage__s1__externe">
        <h5>Liens utiles</h5>
        <?php wp_nav_menu(array(
          "menu" => "externe",
          "container" => "nav",
        )); ?>
      </div>
      <div class="piedpage__s1__adresse">
        <h5>Coordonnées</h5>
        <div class="piedpage__s1__adresse__coord">
          <p><?= $coord_adresse ?></p>
          <p><?= $coord_telephone ?></p>
          <p><?= $coord_courriel ?></p>  
        </div>
        <div class="piedpage__s1__adresse__recherche">
          <?php get_search_form(); ?>
        </div>
      </div>
      <?php afficher_image_footer(); ?>
    </section>
    <section class="piedpage__s2">
      <div class="piedpage__s2__description">
        <h5>Mission du club</h5>
        <p><?= $footer_mission; ?></p>
      </div>
    </section>
    <section class="piedpage__s3">
      <div class="piedpage__s3__principal">
        <?php wp_nav_menu(array(
          "menu" => "principal",
          "container" => "nav",
        )); ?>
      </div>
      <div class="piedpage__s3__sociaux">
        <?php generer_icones_sociaux(); ?>
      </div>
    </section>
  </div>
</footer>
<?php wp_footer() ?>