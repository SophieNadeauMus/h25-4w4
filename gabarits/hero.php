<!-- Section hero contenant les infos du site et l'image d'arrière-plan -->
<?php 
    $coord_courriel = get_theme_mod('coord_courriel', '');
    $coord_adresse = get_theme_mod('coord_adresse', '');
    $coord_telephone = get_theme_mod('coord_telephone', '');
    $hero_couleur = get_theme_mod('hero_couleur', '');
    $hero_auteur = get_theme_mod('hero_auteur', 'Default Title'); 
    $hero_background = get_theme_mod('hero_background', '');
?>
<section class="hero" style="background-image: url(<?= $hero_background ?>) ; color: <?= $hero_couleur; ?>">
  <div class="hero__contenu global">
    <h1 class="hero__titre">Club de voyage</h1>
    <p class="hero__description">
    Mondo voyage est votre destination en ligne idéale pour planifier et réserver tous vos voyages. Que vous soyez à la recherche de vacances reposantes sur une plage tropicale, d'une aventure en montagne ou d'une escapade culturelle, notre site vous offre tout ce dont vous avez besoin pour faire de votre prochain voyage une expérience inoubliable.    </p>
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