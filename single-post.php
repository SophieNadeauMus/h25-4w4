  <?php get_header(); ?>
  <section class="populaire">
    <div class="global">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
          <div class="image__avant">
            <?php 
              if (has_post_thumbnail()) {
              the_post_thumbnail('large'); } 
              else {
                $default_image_url = get_template_directory_uri() . '/images/default.png';
                echo '<img src="' . $default_image_url . '" alt="Image de voyage"" />';
              }
            ?>
          </div>
          <p>Publié par <?php the_author(); ?> le <?php the_time('j F Y'); ?></p>
          <h2><?php the_title(); ?></h2>
          <?php the_category(); ?>
          <div><?php the_content(); ?></div>
          <p>Température maximum: <?php the_field('temperature_maximum') ?>&#176;C</p>
          <p>Température minimum: <?php the_field('temperature_minimum') ?>&#176;C</p>
          <p>Température moyenne: <?php the_field('temperature_moyenne') ?>&#176;C</p>
        </article>
      <?php endwhile; endif; ?>
    </div>
  </section>
  <?php get_footer(); ?>
</body>
</html>