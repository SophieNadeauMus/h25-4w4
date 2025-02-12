<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <img src="images/logo.png" alt="Logo de Mondo voyage">
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
        <form class="recherche">
          <input type="search" placeholder="Rechercher" class="recherche__input">
          <img class="recherche__img" src="https://s2.svgbox.net/hero-outline.svg?ic=search&color=000" width="16" height="16">
        </form>
      </div> <!-- fin entete__navigation -->
    </div>
  </header>