<?php
    /**
   * Génére une liste de sous-catégories
   * @param string $parent_slug Le slug de la catégorie parente
   */
  function categories_liste($parent_slug) {
    // Récupérer la catégorie parente à partir de son slug
    $parent_category = get_category_by_slug($parent_slug);

    // Vérifier si la catégorie parente existe
    if ($parent_category) {
      $parent_id = $parent_category->term_id;
  
      // Récupérer les sous-catégories de "destination"
      $sous_categories = get_categories(array(
        'parent' => $parent_id, // Filtrer par le parent "destination"
        'hide_empty' => true, // Ne pas afficher les catégories vides
      ));

      // Vérifier s'il y a des sous-catégories
      if (!empty($sous_categories)) {
        echo '<ul class="categorie__ul">';
        foreach ($sous_categories as $categorie) {
          // Afficher le nom de chaque sous-catégorie
          echo '<li  data-category_id="' . esc_html($categorie->term_id) . '" class="categorie__ul__li">' . esc_html($categorie->name) . '</li>';
        }
        echo '</ul>';
      } else {
        echo 'Aucune sous-catégorie trouvée pour "destination".';
      }
    } else {
      echo 'La catégorie "' . esc_html($parent_slug) . '" n\'existe pas.';
    }
  }

  /**
   * Filtre les catégories affichées en fonction de la destination
   * 
   * @param string||null $cat_a_retirer Le slug de la catégorie à retirer 
   * @return array La liste des catégories restantes
   */
  function categorie_par_destination() {
    $categories = get_the_category();
    $categories_filtrees = array();
    $categorie_en_cours = is_category() ? get_queried_object()->slug : null;
    
    foreach ($categories as $categorie) {
      if (is_front_page() && $categorie->slug == "populaire") {
        continue;
      }
      if ($categorie_en_cours && $categorie->slug == $categorie_en_cours) {
        continue;
      }

      $categories_filtrees[] = $categorie;
    } 

    return $categories_filtrees;
  }

  /**
   * Permet de récupérer les destinations pour l'image du footer
   */
  function recuperer_destinations() {
    $choix_destinations = array();

    // Récupérer tous les articles de la catégorie "destination"
    $destination_query_args = array(
        'category_name' => 'destination',
        'posts_per_page' => -1,
        'post_status' => 'publish'
    );

    $destination_posts = get_posts($destination_query_args);

    // Ajouter chaque article dans le tableau des choix (titre de l'article => ID de l'article)
    foreach ($destination_posts as $post) {
        $choix_destinations[$post->ID] = $post->post_title;
    }

    return $choix_destinations;
  }

  function afficher_image_footer() {
    $destination_id = get_theme_mod('footer_destination');

    if ($destination_id) {
      // Récupérer le titre de l'article
      $destination_titre = get_the_title($destination_id);

      // Récupérer l'URL de l'image à la une
      $image_url = get_the_post_thumbnail_url($destination_id, 'full');

      // Ajouter une image par défaut si aucune image en vedette n'est définie
      if (!$image_url) {
          $image_url = get_template_directory_uri() . '/images/default.png'; // Image par défaut
      }

      // URL de l'article sélectionné
      $destination_url = get_permalink($destination_id);

      // Afficher l'image avec le lien
      ?>
      <div class="piedpage__s1__image">
        <h5>Destination: <?php echo esc_html($destination_titre); ?></h5>
        <a href="<?= esc_url($destination_url); ?>" target="_blank">
          <img src="<?= esc_url($image_url); ?>" alt="<?= esc_attr($destination_titre); ?>">
        </a>
      </div>
      <?php
    }
}


  /**
   * Génère la liste des icones sociaux
   */
  function generer_icones_sociaux() {
    $nombre_icones = get_theme_mod('sociaux_icones_nombre');
    
    if($nombre_icones <= 0) {
      return;
    }

    echo '<div class="icone__sociaux">';

    for ($i = 0; $i <= $nombre_icones; $i++) {
      $icone_nom = get_theme_mod('sociaux_icones_' . $i);
      $icone_lien = get_theme_mod('sociaux_icones_lien_' . $i);
      
      if ($icone_lien && $icone_nom) {
        $svg_url = "https://s2.svgbox.net/social.svg?ic=" . esc_attr($icone_nom);

        echo '<a href="' . esc_url($icone_lien) . '" target="_blank" rel="noopener noreferrer">';
        echo '<img src="' . esc_url($svg_url) . '" alt="' . esc_attr($icone_nom) . '">';
        echo '</a>';
      }
    }
    echo '</div>';
  }


  /**
   * Génère une ou plusieurs vagues svg
   */
  function genere_vague($couleur) { ?>
    <svg style="top:10px" class="vague" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="<?= $couleur ?>" fill-opacity="1" d="M0,192L80,213.3C160,235,320,277,480,256C640,235,800,149,960,117.3C1120,85,1280,107,1360,117.3L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
  <?php }