<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container-sm">
        <div class="project-title">
            <h1><?php the_title(); ?></h1>
            <label><?php the_time('Y'); ?></label>
        </div>
    </div>
    <div class="project-content">
        <?php echo get_field('sidebar_content'); ?>
        <?php the_content(); ?>
    </div>
</section>