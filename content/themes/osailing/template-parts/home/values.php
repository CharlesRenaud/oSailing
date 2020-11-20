<?php

$args = [
  'tag' => 'escales'
];

$wpqueryEscales = new WP_Query($args);

$args = [
  'tag' => 'semaines-en-mer'
];

$wpquerySemaines = new WP_Query($args);

$args = [
  'tag' => 'rencontres'
];

$wpqueryRencontres = new WP_Query($args);

// https://developer.wordpress.org/reference/classes/wp_query/#properties
$nb_escales = $wpqueryEscales->found_posts;
$nb_semaines = $wpquerySemaines->found_posts;
$nb_rencontres = $wpqueryRencontres->found_posts;

?>

    <section class="values" id="values">
      <div class="values__list">
        <div class="value">
          <h3 class="value__title">Escales</h3>
          <p class="value__content"><?php echo $nb_escales; ?></p>
        </div>
        <div class="value">
          <h3 class="value__title">Semaines en mer</h3>
          <p class="value__content"><?php echo $nb_semaines; ?></p>
        </div>
        <div class="value">
          <h3 class="value__title">Rencontres</h3>
          <p class="value__content"><?php echo $nb_rencontres; ?></p>
        </div>
      </div>

<?php

$args = [
  'pagename' => 'a-propos'
];

$wpqueryApropos = new WP_Query($args);

?>

<?php if ($wpqueryApropos->have_posts()): while ($wpqueryApropos->have_posts()): $wpqueryApropos->the_post(); ?>
      <div class="values__text">
        <?php the_content(); ?>
      </div>
<?php endwhile; endif; ?>
    </section>