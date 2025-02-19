<footer>
  <div class="piedpage global">
    <section class="piedpage__s1">
      <div class="piedpage__s1__externe">
        <?php wp_nav_menu(array(
          "menu" => "externe",
          "container" => "nav",
        )); ?>
      </div>
      <div class="piedpage__s1__adresse">
        <div class="piedpage__s1__adresse__coord">
          Lorem ipsum dolor sit, amet consectetur adipisicing elit.
        </div>
        <div class="piedpage__s1__adresse__recherche">
          <?php get_search_form(); ?>
        </div>
      </div>
      <div class="piedpage__s1__description">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae voluptate earum, perspiciatis sequi fuga debitis accusamus culpa voluptatem aliquam aut voluptatum, deserunt necessitatibus magnam similique iste officiis consequuntur sit nam.
      </div>
    </section>
    <section class="piedpage__s2"></section>
    <section class="piedpage__s3"></section>
  </div>
</footer>
<?php wp_footer() ?>