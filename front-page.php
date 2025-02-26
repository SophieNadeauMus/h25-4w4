  <?php get_header(); ?>
  <section class="hero">
    <div class="hero__contenu global">
      <h1 class="hero__titre">Club de voyage</h1>
      <p class="hero__description">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia, molestias! Maxime quam consequatur facere tempora, nobis culpa blanditiis esse dolor eius veritatis, recusandae suscipit voluptatum est, aliquid tempore voluptatem voluptatibus.
      </p>
      <p class="hero__courriel">
        <a href="#">info@cmaisonneuve.qc.ca</a>
      </p>
      <p class="hero__adresse">
        3800 rue Sherbrooke Est, Montréal (Québec) H1X 2A2
      </p>
      <p class="hero__telephone">
        514 254-7131
      </p>
      <button class="hero__bouton">
        S'INSCRIRE
      </button>
      <div class="hero__icone">
        <img src="https://s2.svgbox.net/social.svg?ic=facebook&color=000000" width="20" height="20">
        <img src="https://s2.svgbox.net/social.svg?ic=linkedin&color=000000" width="20" height="20">
        <img src="https://s2.svgbox.net/social.svg?ic=wordpress&color=000000" width="20" height="20">
        <img src="https://s2.svgbox.net/social.svg?ic=snapchat&color=000000" width="20" height="20">
      </div>
    </div>
  </section>
  <section class="inscription global">
    <form class="inscription__form" action="">
      <div class="inscription__form--champ">
        <label for="nom">Nom</label>
      <input type="text" id="nom" name="nom" placeholder="Écrivez votre nom">
      </div>
      <div class="inscription__form--champ">
        <label for="prenom">Prénom</label>
        <input type="text" id="prenom" name="prenom" placeholder="Écrivez votre prénom">
      </div>
      <div class="inscription__form--champ">
        <label for="courriel">Courriel</label>
        <input type="text" id="courriel" name="courriel" placeholder="Écrivez votre courriel">
      </div>
      <div class="inscription__form--champ">
        <label for="telephone">Téléphone</label>
        <input type="text" id="telephone" name="telephone" placeholder="Écrivez votre téléphone">
      </div>
      <input type="submit" value="S'INSCRIRE">
    </form>
  </section>
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