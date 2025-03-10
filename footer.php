<?php 
  $footer_adresse = get_theme_mod('footer_adresse', ''); 
  $footer_telephone = get_theme_mod('footer_telephone', ''); 
  $footer_courriel = get_theme_mod('footer_courriel', ''); 
?>
<footer>
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
          <?= 
            $footer_adresse . "<br>" .
            $footer_telephone . "<br>" .
            $footer_courriel; 
          ?>
        </div>
        <div class="piedpage__s1__adresse__recherche">
          <?php get_search_form(); ?>
        </div>
      </div>
      <div class="piedpage__s1__description">
        <h5>Mission du club</h5>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae voluptate earum, perspiciatis sequi fuga debitis accusamus culpa voluptatem aliquam aut voluptatum, deserunt necessitatibus magnam similique iste officiis consequuntur sit nam.
      </div>
    </section>
    <section class="piedpage__s2">
      <div class="piedpage__s2__sociaux">
        <?php get_template_part('gabarits/icone-sociaux'); ?>
      </div>
      <div class="piedpage__s2__principal">
        <?php wp_nav_menu(array(
          "menu" => "principal",
          "container" => "nav",
        )); ?>
      </div>
    </section>
    <section class="piedpage__s3"></section>
  </div>
</footer>
<?php wp_footer() ?>