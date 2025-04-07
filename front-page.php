  <?php get_header(); ?>
  <?php get_template_part('gabarits/hero'); ?>
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
  <!-- //////////////////////////////////////////////////// section rest-api -->
  <section class="global">
    <?php categories_liste("destination"); ?>
    <h2 class="destination__titre">Articles de la catégorie</h2>
    <div class="destination__list"></div>
  </section>
  <?php get_footer(); ?>
</body>
</html>