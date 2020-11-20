<?php

get_header();
if (have_posts()): while (have_posts()): the_post();
    get_template_part('template-parts/home/intro');
endwhile; endif;
get_template_part('template-parts/home/articles');
get_template_part('template-parts/home/values');
get_sidebar();
get_footer();