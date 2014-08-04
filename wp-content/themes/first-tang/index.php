<?php get_header(); ?>

<?php while (have_posts()) : the_post() ?>

    <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
    <p><?php the_excerpt(); ?></p>

        <?php endwhile; ?>
    <?php wp_list_categories() ?>
    <?php get_footer(); ?>