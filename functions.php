<?php
  function theme_4w4_customize_register($wp_customize) {
    // Le code pour ajouter des sections, des réglages et des contrôles ira ici.
    // Création d'une nouvelle section dans le customizer
    $wp_customize->add_section('hero_section', array(
      'title' => __('Section hero', 'theme_4w4'),
      'priority' => 30,
    ));
    /////////////////////////////////////////// ajout de la donnée
    $wp_customize->add_setting('hero_auteur', array(
      'default' => __('Sophie Nadeau', 'theme_4w4'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    /////////////////////////////////////////// ajout du contrôle de la donnée
    $wp_customize->add_control('hero_auteur', array(
      'label' => __('Auteur', 'theme_4w4'),
      'section' => 'hero_section',
      'type' => 'text',
    ));
    /////////////////////////////////////////// ajout de la donnée de l'image d'arrière-plan
    $wp_customize->add_setting('hero_background', array(
      'default' => '',
      'sanitize_callback' => 'esc_url_raw',
    ));
    /////////////////////////////////////////// ajout du contrôle de la donnée
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background', array(
        'label' => __('Image en arrière-plan', 'theme_4w4'),
        'section' => 'hero_section',
    )));
    
    // Nouvelle section footer dans le customizer
    $wp_customize->add_section('footer_section', array(
      'title' => __('Footer', 'theme_4w4'),
      'priority' => 30,
    ));
    /////////////////////////////////////////// ajout de l'adresse
    $wp_customize->add_setting('footer_adresse', array(
      'default' => __('3800 rue Sherbrooke Est, Montréal (Québec) H1X 2A2', 'theme_4w4'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    /////////////////////////////////////////// ajout du contrôle de l'adresse
    $wp_customize->add_control('footer_adresse', array(
      'label' => __('Adresse', 'theme_4w4'),
      'section' => 'footer_section',
      'type' => 'text',
    ));
    /////////////////////////////////////////// ajout du numéro de téléphone
    $wp_customize->add_setting('footer_telephone', array(
      'default' => __('514 254-7131', 'theme_4w4'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    /////////////////////////////////////////// ajout du contrôle du numéro de téléphone
    $wp_customize->add_control('footer_telephone', array(
      'label' => __('Téléphone', 'theme_4w4'),
      'section' => 'footer_section',
      'type' => 'text',
    ));
    /////////////////////////////////////////// ajout de l'adresse courriel
    $wp_customize->add_setting('footer_courriel', array(
      'default' => __('info@cmaisonneuve.qc.ca', 'theme_4w4'),
      'sanitize_callback' => 'sanitize_text_field'
    ));
    /////////////////////////////////////////// ajout du contrôle de l'adresse courriel
    $wp_customize->add_control('footer_courriel', array(
      'label' => __('Courriel', 'theme_4w4'),
      'section' => 'footer_section',
      'type' => 'text',
    ));
  }

  add_action('customize_register', 'theme_4w4_customize_register');

  function mon_theme_supports() {
    add_theme_support('title-tag');
    add_theme_support('menus');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
      'height'      => 250,
      'width'       => 250,
      'flex-height' => true,
      'flex-width'  => true,
  ));
  }
  add_action( 'after_setup_theme', 'mon_theme_supports' );


function theme_4w4_enqueue_styles() {
wp_enqueue_style('normalize', get_template_directory_uri() . '/normalize.css');   
wp_enqueue_style('mon-style', get_stylesheet_uri()); 
} 
/*
*/
add_action('wp_enqueue_scripts', 'theme_4w4_enqueue_styles');

/**
 * Modifie la requete principale de WordPress avant qu'elle soit exécuté
 * le hook « pre_get_posts » se manifeste juste avant d'exécuter la requête principal
 * Dépendant de la condition initiale on peut filtrer un type particulier de requête
 * Dans ce cas ci nous filtrons la requête de la page d'accueil
 * @param WP_query  $query la requête principal de WP
 */
function modifie_requete_principal( $query ) {
  if ( $query->is_home() && $query->is_main_query() && ! is_admin() ) {
    $query->set( 'category_name', 'populaire' );
    $query->set( 'orderby', 'title' );
    $query->set( 'order', 'ASC' );
    }
   }
   add_action( 'pre_get_posts', 'modifie_requete_principal' );
?>