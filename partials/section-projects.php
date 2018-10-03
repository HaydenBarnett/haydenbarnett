<?php
    $category = 'Featured Projects';
    $category_slug = sanitize_title($category);

    $query = new WP_Query( array( 
        'post_type' => 'project',
        'posts_per_page' => -1,
        'tax_query' => array(
            array (
                'taxonomy' => 'project-categories',
                'field' => 'slug',
                'terms' => $category_slug,
            )
        ),
    ));

    $i = 0;
?>

<section id="projects">

    <div class="container-lg">
        <label class="animated fadeInUp delay-2"><?php echo $category; ?></label>
    </div>

    <div class="container-lg">

        <?php if ($query->have_posts()): ?>
            <?php while($query->have_posts()): ?>

                <div class="third">

                    <?php
                        $project = $query->the_post();
                        $project_ID = $project->ID;
                        $logo_ID = get_field('logo');

                        $colour = get_field('colour', $project_ID);
                        $full = get_field('use_full_size_image', $project_ID);
                        $logo = wp_get_attachment_image_src( $logo_ID, 'full' );
                        $i++;
                        
                        if ($full):
                            $background_image = wp_get_attachment_image_src( get_post_thumbnail_id($project_ID), 'full' );
                        else:
                            $background_image = wp_get_attachment_image_src( get_post_thumbnail_id($project_ID), 'medium' );
                        endif;
                    ?>

                    <div class="project-tile-wrapper animated fadeInLeft delay-<?php echo $i; ?>">
                        <a href="<?php echo get_the_permalink($project_ID); ?>" class="project-tile">
                            <div class="project-tile-date"><?php the_time('Y'); ?></div>
                            <div class="project-tile-image js-tilt" data-tilt style="background-image: url(<?php echo $background_image[0]; ?>);">
                                <div class="project-tile-logo" style="background-image: url(<?php echo $logo[0]; ?>);"></div>
                            </div>
                            <div class="project-tile-info">
                                <h2><span><?php echo get_the_title($project_ID); ?></span></h2>
                            </div>
                        </a>
                    </div>

                </div>

            <?php endwhile; ?>
        <?php endif; ?>

        <?php wp_reset_query(); ?>

    </div>
</section>