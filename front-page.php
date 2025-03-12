  <?php get_header(); ?>
  <?php 
    $hero_courriel = get_theme_mod('hero_courriel', '');
    $hero_couleur = get_theme_mod('hero_couleur', '');
    $hero_auteur = get_theme_mod('hero_auteur', 'Default Title'); 
    $hero_background = get_theme_mod('hero_background', '');
  ?>
  <section class="hero" style="background-image: url(<?= $hero_background ?>) ; color: <?= $hero_couleur; ?>">
    <div class="hero__contenu global">
      <h1 class="hero__titre">Club de voyage</h1>
      <p class="hero__description">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, molestias! Maxime quam consequatur facere tempora, nobis culpa blanditiis esse dolor eius veritatis, recusandae suscipit voluptatum est, aliquid tempore voluptatem voluptatibus.
      </p>
      <p class="hero__courriel">
        <a href="#">
          <?= $hero_courriel; ?>
        </a>
      </p>
      <p class="hero__adresse">
        3800 rue Sherbrooke Est, Montréal (Québec) H1X 2A2
      </p>
      <p class="hero__telephone">
        514 254-7131
      </p>
      <p class="hero__auteur">Auteur : <?= $hero_auteur; ?></p>
      <button class="hero__bouton">
        S'INSCRIRE
      </button>
      <div class="hero__icone">
        <?php get_template_part('gabarits/icone-sociaux'); ?>
      </div>
    </div>
  </section>
  <?php get_template_part('gabarits/inscription'); ?>
  <section class="populaire">
    <div class="global">
      <?php if (have_posts()) : while (have_posts()) : the_post();
        if(in_category("galerie")) {
          the_content();
        } else { ?>
        <?php get_template_part( 'gabarits/carte' ); ?>
      <?php } ?>
      <?php endwhile; endif; ?>
    </div>
  </section>
  <?php get_footer(); ?>
</body>
</html>