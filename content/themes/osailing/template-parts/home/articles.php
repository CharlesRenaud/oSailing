    <section class="articles" id="articles">

    <?php

    // Boucle custom

    // 1. On définit nos paramètres
    // par défaut, le tri est par 'date'
    // par défaut, l'ordre est 'DESC'

    $args = [
      'post-type' => 'post', // On va chercher des articles
      'posts_per_page' => 3, // Nombre d'articles à récupérer
      'order' => 'ASC' // 123, abc
    ];

    // 2. On instancie la classe WP_Query -> objet $wpqueryArticles
    $wpqueryArticles = new WP_Query($args);

    ?>
      
<?php if ($wpqueryArticles->have_posts()): while ($wpqueryArticles->have_posts()) : $wpqueryArticles->the_post(); ?>
    <article class="article">
        <img src="<?php the_post_thumbnail_url(); ?>" alt="" class="article__img">
        <div class="article__content">
          <h2 class="article__content__title">
            <?php the_title(); ?>
          </h2>
          <p class="article__content__text">
            <?php the_excerpt(); ?>
          </p>
          <a href="<?php the_permalink(); ?>" class="button">Lire la suite</a>
        </div>
    </article>
  <?php endwhile; endif; ?>   
      
    </section>