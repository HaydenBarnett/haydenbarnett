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

<section id="section-featured-projects">

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="featured-projects-heading">
                    <div class="container container-sm">
                        <div class="row">
                            <div class="col-12">
                                <h4><?php echo $category; ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">

            <?php if ($query->have_posts()): ?>
                <?php while($query->have_posts()): ?>

                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">

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

                        <div class="project-tile-wrapper animated fadeIn delay-<?php echo $i; ?>">
                            <a href="<?php echo get_the_permalink($project_ID); ?>" class="project-tile">
                                <div class="project-tile-date"><?php the_time('Y'); ?></div>
                                <div class="project-tile-image js-tilt" data-tilt style="background-image: url(<?php echo $background_image[0]; ?>);">
                                    <div class="project-tile-logo" style="background-image: url(<?php echo $logo[0]; ?>);"></div>
                                </div>
                                <div class="project-tile-info">
                                    <h3><span><?php echo get_the_title($project_ID); ?></span></h3>
                                </div>
                            </a>
                        </div>

                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

            <?php wp_reset_query(); ?>
        </div>
    </div>
</section>