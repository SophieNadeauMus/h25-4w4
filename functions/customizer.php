<!-- L'ensemble des éléments du customizer -->
<?php
  function theme_4w4_customize_register($wp_customize) {
    // Le code pour ajouter des sections, des réglages et des contrôles ira ici.
    //////////////////////////////////////////////////// DÉBUT DE LA ZONE HERO
    // Création d'une nouvelle section dans le customizer
    $wp_customize->add_section('hero_section', array(
      'title' => __('Section hero', 'theme_4w4'),
      'priority' => 30,
    ));

    /////////////////////////////////////////////////// début du champ hero_courriel
    // Ajout de l'adresse courriel
    $wp_customize->add_setting('hero_courriel', array(
      'default' => __('info@cmaisonneuve.qc.ca', 'theme_4w4'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    // Ajout du contrôle de l'adresse courriel
    $wp_customize->add_control('hero_courriel', array(
      'label' => __('Adresse courriel', 'theme_4w4'),
      'section' => 'hero_section',
      'type' => 'text',
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
    // Ajout de l'image d'arrière-plan
    $wp_customize->add_setting('hero_background', array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    // Ajout du contrôle de l'image d'arrière-plan
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background', array(
        'label' => __('Image en arrière-plan', 'theme_4w4'),
        'section' => 'hero_section',
    )));
    
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
    /////////////////////////////////////////// ajout du contrôle de la mission
    $wp_customize->add_control('footer_mission', array(
      'label' => __('Mission', 'theme_4w4'),
      'section' => 'footer_section',
      'type' => 'text',
    ));
    /////////////////////////////////////////////////// début du champ footer_adresse
    // Ajout de l'adresse
    $wp_customize->add_setting('footer_adresse', array(
      'default' => __('3800 rue Sherbrooke Est, Montréal (Québec) H1X 2A2', 'theme_4w4'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    // Ajout du contrôle de l'adresse
    $wp_customize->add_control('footer_adresse', array(
      'label' => __('Adresse', 'theme_4w4'),
      'section' => 'footer_section',
      'type' => 'text',
    ));
    /////////////////////////////////////////////////// début du champ footer_telephone
    // Ajout du numéro de téléphone
    $wp_customize->add_setting('footer_telephone', array(
      'default' => __('514 254-7131', 'theme_4w4'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    // Ajout du contrôle du numéro de téléphone
    $wp_customize->add_control('footer_telephone', array(
      'label' => __('Téléphone', 'theme_4w4'),
      'section' => 'footer_section',
      'type' => 'text',
    ));
  }

  add_action('customize_register', 'theme_4w4_customize_register');
?>