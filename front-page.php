<?php get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part('partials/section', 'intro'); ?>		

        <?php get_template_part('partials/section', 'home'); ?>

    <?php endwhile; ?>

<?php get_footer(); ?>