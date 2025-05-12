<!-- Section hero contenant les infos du site et l'image d'arrière-plan -->
<?php 
  $coord_courriel = get_theme_mod('coord_courriel', '');
  $coord_adresse = get_theme_mod('coord_adresse', '');
  $coord_telephone = get_theme_mod('coord_telephone', '');
  $hero_couleur = get_theme_mod('hero_couleur', '');
  $hero_auteur = get_theme_mod('hero_auteur', 'Default Title');
  $hero_background = [];
  $hero_background_nombre = get_theme_mod('hero_background_nombre', 3);
  for ($k = 0; $k < $hero_background_nombre ; $k++){
    $hero_background[$k] = get_theme_mod('hero_background' . $k, '');
  }
?>
<section class="hero" style="color: <?= $hero_couleur; ?>">
  <?php for ($k = 0; $k < $hero_background_nombre; $k++) : ?>
    <?php if (!empty($hero_background[$k])) : ?>
      <div class="hero__carrousel" style="background-image: url(<?= $hero_background[$k] ?>);"></div> 
    <?php endif; ?>
  <?php endfor; ?>
  <div class="hero__radio">
    <?php for ($k = 0; $k < $hero_background_nombre; $k++) : ?>
      <input class="hero__radio__input" data-id_radio="<?= $k ?>" type="radio" id="radio<?= $k ?>" name="carrousel">
      <label for="radio<?= $k ?>" class="hero__radio__label"></label>
    <?php endfor; ?>
  </div>
  <div class="hero__contenu global">
    <?php for ($k = 0; $k < $hero_background_nombre; $k++) : 
      $titre = get_theme_mod("hero_titre_$k", '');
      $description = get_theme_mod("hero_description_$k", '');

      // Si il n’y a pas de titre, on utilise le nom du site
      if (empty($titre)) {
        $titre = get_bloginfo('name');
      }

      if (!empty($titre) || !empty($description)) : ?>
        <div class="hero__animation">
          <?php if (!empty($titre)) : ?>
            <h1 class="hero__titre"><?= esc_html($titre); ?></h1>
          <?php endif; ?>
          <?php if (!empty($description)) : ?>
            <p class="hero__description"><?= esc_html($description); ?></p>
          <?php endif; ?>
        </div>
    <?php endif; endfor; ?>

    <div class="hero__coord">
      <p class="hero__courriel">
        <a href="#">
          <?= $coord_courriel; ?>
        </a>
      </p>
      <p class="hero__adresse">
      <?= $coord_adresse; ?>
      </p>
      <p class="hero__telephone">
      <?= $coord_telephone; ?>
      </p>
      <p class="hero__auteur">Auteur : <?= $hero_auteur; ?></p>
      <div class="hero__icone">
        <?php get_template_part('gabarits/icone-sociaux'); ?>
      </div>
    </div>
  </div>
</section>