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
  function categorie_par_destination($cat_a_retirer = null) {
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
   * Génère une ou plusieurs vagues svg
   */
  function genere_vague($couleur) { ?>
    <svg style="top:10px" class="vague" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="<?= $couleur ?>" fill-opacity="1" d="M0,192L80,213.3C160,235,320,277,480,256C640,235,800,149,960,117.3C1120,85,1280,107,1360,117.3L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
  <?php }