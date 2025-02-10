  <?php get_header(); ?>
  <h1>------ INDEX.PHP ------</h1>
  <section class="populaire">
    <div class="global">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
            <h2><?php the_title(); ?></h2>
            <div><?php echo wp_trim_words(get_the_content(), 10); ?></div>
        </article>
    <?php endwhile; endif; ?>
    </div>
  </section>
  <footer></footer>
  <?php get_footer(); ?>
</body>
</html>