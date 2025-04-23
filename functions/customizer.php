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
    /////////////////////////////////////////////////// début du champ coord_description
    // Ajout de la description
    $wp_customize->add_setting('coord_description', array(
      'default' => __('Description du site Web', 'theme_4w4'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    // Ajout du contrôle de la description du site
    $wp_customize->add_control('coord_description', array(
      'label' => __('Description', 'theme_4w4'),
      'section' => 'coord_section',
      'type' => 'textarea',
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
      'sanitize_callback' => 'esc_url_raw',
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
    /////////////////////////////////////////////////// début du champ hero_background
    // Ajout du carrousel photos
    for ($k = 0; $k<3 ; $k++){
      $wp_customize->add_setting('hero_background' . $k, array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
      ));
      // Ajout du contrôle du carrousel photos
      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background' . $k, array(
          'label' => __('Image en arrière-plan ' . ($k+1), 'theme_4w4'),
          'section' => 'hero_section',
      )));
    }
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