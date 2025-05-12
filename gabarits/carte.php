<?php
/**
 * Template-part carte
 */
?>
<article class="carte carte--grande">
  <!-- <figure class="carte__image">
    <img src="voyage.jpg" alt="Image de voyage">
  </figure> -->
  <div class="carte__contenu">
    <?php 
      if (has_post_thumbnail()) {
      the_post_thumbnail('thumbnail'); }
      else {
        $default_image_url = get_template_directory_uri() . '/images/default.png';
        echo '<img src="' . $default_image_url . '" alt="Image de voyage" style="width: 150px; height: 150px;" />';
      } 
    ?>
    <h4 class="carte__titre">
      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h4>
    <p class="carte__description"><?php echo wp_trim_words(get_the_content(),10, " ... " ); ?></p>
    <?php
      // Filtre les catégories affichées en fonction de la destination
      $categories_restantes = categorie_par_destination();

      if (!empty($categories_restantes)) {
          echo '<ul class="post-categories">';
          foreach ($categories_restantes as $categorie) {
            echo '<li><a href="' . esc_url(get_category_link($categorie->term_id)) . '">' . esc_html($categorie->name) . '</a></li>';
          }
          echo '</ul>';
      } 
    ?>
    <p>Température maximum: <?php the_field('temperature_maximum') ?>&#176;C</p>
  </div>
</article>