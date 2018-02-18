<?php get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part('partials/section', 'content'); ?>

        <?php get_template_part('partials/section', 'projects'); ?>

        <?php edit_post_link('edit'); ?>

    <?php endwhile; ?>

<?php get_footer(); ?>