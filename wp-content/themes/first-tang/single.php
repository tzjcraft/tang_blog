<?php get_header(); ?>

<?php the_post() ?>
<p><?php the_tags(); ?></p>
<h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
<p><?php the_excerpt(); ?></p>

<?php get_footer(); ?>