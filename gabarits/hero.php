<!-- Section hero contenant les infos du site et l'image d'arrière-plan -->
<?php 
  $coord_description = get_theme_mod('coord_description', '');
  $coord_courriel = get_theme_mod('coord_courriel', '');
  $coord_adresse = get_theme_mod('coord_adresse', '');
  $coord_telephone = get_theme_mod('coord_telephone', '');
  $hero_couleur = get_theme_mod('hero_couleur', '');
  $hero_auteur = get_theme_mod('hero_auteur', 'Default Title'); 
  for ($k = 0; $k < 3; $k++) {
    $hero_background[$k] = get_theme_mod('hero_background' . $k, '');
  }
?>
<section class="hero" style="color: <?= $hero_couleur; ?>">
  <?php for ($k = 0; $k < 3; $k++) : ?>
    <div class="hero__carrousel" style="background-image: url(<?= $hero_background[$k] ?>);"></div> 
  <?php endfor; ?>
  <div class="hero__radio">
    <?php for ($k = 0; $k < 3; $k++) : ?>
      <input class="hero__radio__input" data-id_radio="<?= $k ?>" type="radio" id="radio<?= $k ?>" name="carrousel">
      <label for="radio<?= $k ?>" class="hero__radio__label"></label>
    <?php endfor; ?>
  </div>
  <div class="hero__contenu global">
    <div class="hero__animation">
      <h1 class="hero__titre"><?php bloginfo('name'); ?></h1>
      <p class="hero__description"><?= $coord_description; ?></p>
    </div>
    <div class="hero__animation">
      <h1 class="hero__titre">Lorem ipsum dolor</h1>
      <p class="hero__description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facilis accusamus quisquam iusto tempore non, nobis aliquam est maiores, error numquam molestias id nulla eveniet totam ipsa sunt vitae sequi nam?</p>
    </div>
    <div class="hero__animation">
      <h1 class="hero__titre">sadrftgyhj</h1>
      <p class="hero__description">zzzzzzzzzzzzzzzzz</p>
    </div>
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
    <!-- <button class="hero__bouton" type="submit">
      S'INSCRIRE
    </button> -->
    <div class="hero__icone">
      <?php get_template_part('gabarits/icone-sociaux'); ?>
    </div>
  </div>
</section>