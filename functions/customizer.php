<?php
  function theme_4w4_customize_register($wp_customize) {
    // Le code pour ajouter des sections, des réglages et des contrôles ira ici.
    //////////////////////////////////////////////////// DÉBUT DE LA ZONE DE COORDONNÉES
    // Création d'une nouvelle section dans le customizer
    $wp_customize->add_section('coord_section', array(
      'title' => __('Coordonnées', 'theme_4w4'),
      'priority' => 30,
    ));

    /////////////////////////////////////////////////// début du champ coord_courriel
    // Ajout de l'adresse courriel
    $wp_customize->add_setting('coord_courriel', array(
      'default' => __('info@cmaisonneuve.qc.ca', 'theme_4w4'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    // Ajout du contrôle de l'adresse courriel
    $wp_customize->add_control('coord_courriel', array(
      'label' => __('Adresse courriel', 'theme_4w4'),
      'section' => 'coord_section',
      'type' => 'text',
    ));
    /////////////////////////////////////////////////// début du champ coord_adresse
    // Ajout de l'adresse
    $wp_customize->add_setting('coord_adresse', array(
      'default' => __('3800 rue Sherbrooke Est, Montréal (Québec) H1X 2A2', 'theme_4w4'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    // Ajout du contrôle de l'adresse
    $wp_customize->add_control('coord_adresse', array(
      'label' => __('Adresse', 'theme_4w4'),
      'section' => 'coord_section',
      'type' => 'textarea',
    ));
    /////////////////////////////////////////////////// début du champ coord_telephone
    // Ajout du numéro de téléphone
    $wp_customize->add_setting('coord_telephone', array(
      'default' => __('514 254-7131', 'theme_4w4'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    // Ajout du contrôle du numéro de téléphone
    $wp_customize->add_control('coord_telephone', array(
      'label' => __('Téléphone', 'theme_4w4'),
      'section' => 'coord_section',
      'type' => 'text',
    ));

    //////////////////////////////////////////////////// DÉBUT DE LA ZONE HERO
    $wp_customize->add_section('hero_section', array(
      'title' => __('Section hero', 'theme_4w4'),
      'priority' => 30,
    ));

    /////////////////////////////////////////////////// début du champ hero_couleur
    // Ajout de la couleur du texte
    $wp_customize->add_setting('hero_couleur', array(
      'default' => '',
      'sanitize_callback' => 'sanitize_hex_color',
    ));
    // Ajout du contrôle de la couleur du texte
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'hero_couleur', array(
        'label' => __('Couleur du texte', 'theme_4w4'),
        'section' => 'hero_section',
    )));
    /////////////////////////////////////////////////// début du champ hero_auteur
    // Ajout de l'auteur
    $wp_customize->add_setting('hero_auteur', array(
      'default' => __('Sophie Nadeau', 'theme_4w4'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    // Ajout du contrôle de l'auteur
    $wp_customize->add_control('hero_auteur', array(
      'label' => __('Auteur', 'theme_4w4'),
      'section' => 'hero_section',
      'type' => 'text',
    ));
    /////////////////////////////////////////////////// début du champ hero_background_nombre
    // Ajout du nombre d'images pour le carrousel
    $wp_customize->add_setting('hero_background_nombre', array(
      'default' => 3,
      'sanitize_callback' => 'absint',
    ));
    // Ajout du contrôle du nombre d'images pour le carrousel
    $wp_customize->add_control('hero_background_nombre', array(
      'label' => __('Nombre d\'images pour le carrousel', 'theme_4w4'),
      'section' => 'hero_section',
      'type' => 'number',
      'input_attrs' => array(
        'min' => 1,
        'max' => 10,
      ),
    ));

    $max_images = 10; // Nombre maximum d'images

    /////////////////////////////////////////////////// début du champ hero_background
    // Ajout du carrousel photos
    for ($k = 0; $k < $max_images ; $k++){
      $wp_customize->add_setting('hero_background' . $k, array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
      ));
      // Ajout du contrôle du carrousel photos
      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background' . $k, array(
          'label' => __('Image en arrière-plan ' . ($k+1), 'theme_4w4'),
          'section' => 'hero_section',
          'active_callback' => function() use ($k) {
            return get_theme_mod('hero_background_nombre') > $k;
          },
      )));
      /////////////////////////////////////////////////// début du champ hero_titre
      // Ajout du titre
      $wp_customize->add_setting("hero_titre_$k", array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
      ));
      // Ajout du contrôle du titre
      $wp_customize->add_control("hero_titre_$k", array(
        'label' => __('Titre de l’image ' . ($k + 1), 'theme_4w4'),
        'section' => 'hero_section',
        'type' => 'text',
        'active_callback' => function() use ($k) {
          return get_theme_mod('hero_background_nombre') > $k;
        },
      ));
      /////////////////////////////////////////////////// début du champ hero_description
      // Ajout de la description
      $wp_customize->add_setting("hero_description_$k", array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field'
      ));
      // Ajout du contrôle de la description du site
      $wp_customize->add_control("hero_description_$k", array(
        'label' => __('Description de l’image ' . ($k + 1), 'theme_4w4'),
        'section' => 'hero_section',
        'type' => 'textarea',
        'active_callback' => function() use ($k) {
          return get_theme_mod('hero_background_nombre') > $k;
        },
      ));
    } // Fin de la boucle pour le carrousel d'images
    //////////////////////////////////////////////////// DÉBUT DE LA ZONE FOOTER
    $wp_customize->add_section('footer_section', array(
      'title' => __('Footer', 'theme_4w4'),
      'priority' => 30,
    ));

    /////////////////////////////////////////////////// début du champ footer_mission
    // Ajout de la mission
    $wp_customize->add_setting('footer_mission', array(
      'default' => __('', 'theme_4w4'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    // Ajout du contrôle de la mission
    $wp_customize->add_control('footer_mission', array(
      'label' => __('Mission', 'theme_4w4'),
      'section' => 'footer_section',
      'type' => 'textarea',
    ));
    /////////////////////////////////////////////////// début du champ footer_couleur
    // Ajout de la couleur de fond
    $wp_customize->add_setting('footer_couleur', array(
      'default' => 'bisque',
      'sanitize_callback' => 'esc_url_raw',
    ));
    // Ajout du contrôle de la couleur du texte
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_couleur', array(
        'label' => __('Couleur de fond', 'theme_4w4'),
        'section' => 'footer_section',
    )));
    /////////////////////////////////////////////////// début du champ footer_destination
    // Ajout de la destination pour afficher l'image dans le footer
    $wp_customize->add_setting('footer_destination', array(
      'default' => '',
      'sanitize_callback' => 'absint'
    ));
    $wp_customize->add_control('footer_destination', array(
      'label' => __('Sélectionner une destination', 'theme_4w4'),
      'section' => 'footer_section',
      'type' => 'select',
      'choices' => recuperer_destinations(),
    ));
    //////////////////////////////////////////////////// DÉBUT DE LA ZONE DES ICONES SOCIAUX
    $wp_customize->add_section('sociaux_section', array(
      'title' => __('Icônes sociaux', 'theme_4w4'),
      'priority' => 30,
    ));
    
    /////////////////////////////////////////////////// début du champ sociaux_icones_nombre
    // Ajout du nombre d'images pour les icônes
    $wp_customize->add_setting('sociaux_icones_nombre', array(
      'default' => 0,
      'sanitize_callback' => 'absint',
    ));
    // Ajout du contrôle du nombre d'images pour les icônes
    $wp_customize->add_control('sociaux_icones_nombre', array(
      'label' => __('Nombre d\'icônes sociaux', 'theme_4w4'),
      'section' => 'sociaux_section',
      'type' => 'number',
      'input_attrs' => array(
        'min' => 1,
        'max' => 10,
      ),
    ));

    $max_icones = 10; // Nombre maximum d'icônes

    /////////////////////////////////////////////////// début du champ sociaux_icones
    // Ajout du carrousel photos
    for ($k = 0; $k < $max_icones ; $k++) {
      // Image de l'icône
      $wp_customize->add_setting("sociaux_icones_$k", array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
      ));
      $wp_customize->add_control("sociaux_icones_$k", array(
        'label' => __('Icône ' . ($k+1), 'theme_4w4'),
        'section' => 'sociaux_section',
        'type' => 'text',
        'input_attrs' => array(
          'placeholder' => 'facebook, instagram, linkedin...',
        ),

        'active_callback' => function() use ($k) {
          return get_theme_mod('sociaux_icones_nombre') > $k;
        },
      ));

      // Lien de l'icône
      $wp_customize->add_setting("sociaux_icones_lien_$k", array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
      ));
      $wp_customize->add_control("sociaux_icones_lien_$k", array(
        'label' => __('Lien pour l\'icône ' . ($k+1), 'theme_4w4'),
        'section' => 'sociaux_section',
        'type' => 'url',
        'active_callback' => function() use ($k) {
          return get_theme_mod('sociaux_icones_nombre') > $k;
        },
      ));
    }
    //////////////////////////////////////////////////// DÉBUT DE LA ZONE ERREUR 404
    $wp_customize->add_section('section_404', array(
      'title' => __('Erreur 404', 'theme_4w4'),
      'priority' => 30,
    ));

    /////////////////////////////////////////////////// début du champ background_404
    // Ajout de l'image d'arrière-plan
    $wp_customize->add_setting('background_404', array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    // Ajout du contrôle de l'image d'arrière-plan
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'background_404', array(
        'label' => __('Image en arrière-plan', 'theme_4w4'),
        'section' => 'section_404',
    )));
    /////////////////////////////////////////////////// début du champ couleur_404
    // Ajout de la couleur du texte
    $wp_customize->add_setting('couleur_404', array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    // Ajout du contrôle de la couleur du texte
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'couleur_404', array(
        'label' => __('Couleur du texte', 'theme_4w4'),
        'section' => 'section_404',
    )));
    /////////////////////////////////////////////////// début du champ titre_404
    // Ajout du titre
    $wp_customize->add_setting('titre_404', array(
      'default' => __('Erreur 404', 'theme_4w4'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    // Ajout du contrôle du titre
    $wp_customize->add_control('titre_404', array(
      'label' => __('Titre', 'theme_4w4'),
      'section' => 'section_404',
      'type' => 'text',
    ));
    /////////////////////////////////////////////////// début du champ message_404
    // Ajout du message
    $wp_customize->add_setting('message_404', array(
      'default' => __('La page que vous recherchez n\'existe pas.', 'theme_4w4'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    // Ajout du contrôle du message
    $wp_customize->add_control('message_404', array(
      'label' => __('Message', 'theme_4w4'),
      'section' => 'section_404',
      'type' => 'textarea',
    ));
  }

  add_action('customize_register', 'theme_4w4_customize_register');