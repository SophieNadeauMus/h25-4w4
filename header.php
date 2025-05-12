<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Police utilisée -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  <base href="<?php echo esc_url( home_url( '/' ) ); ?>">
  <title>Club de voyage</title>
  <!-- <link rel="stylesheet" href="normalize.css"> -->
  <!-- <link rel="stylesheet" href="style.css"> -->
  <?php wp_head() ?>
</head>
</html>
<body>
  <header>
    <div class="entete">
      <figure class="entete__logo">
        <?php 
          if (function_exists('the_custom_logo')) {
            the_custom_logo();
          }; 
        ?>
      </figure>
      <input type="checkbox" id="input--toggle">
      <label for="input--toggle" class="btn--toggle">
        <img src="https://s2.svgbox.net/hero-solid.svg?ic=menu&color=000" width="32" height="32">
      </label>
      <div class="entete__navigation">
        <?php wp_nav_menu(array(
          'menu' => 'principal',
          'container' => 'nav',
          'container_class' => 'entete__menu'
        )); ?>
        <?php get_search_form(); ?>
      </div> <!-- fin entete__navigation -->
    </div>
  </header>