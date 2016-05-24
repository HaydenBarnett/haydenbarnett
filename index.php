<?php get_header(); ?>

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part('partials/section', 'content'); ?>

        <?php endwhile; ?>

    <?php else: ?>

        <?php get_template_part('partials/section', '404'); ?>

    <?php endif; ?>
    
<?php get_footer(); ?>