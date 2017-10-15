<?php
    
    $category_1 = 'Featured Projects';
    $category_2 = 'Other Work';
    $category_3 = 'Personal Projects';

    $category_1_slug = sanitize_title($category_1);
    $category_2_slug = sanitize_title($category_2);
    $category_3_slug = sanitize_title($category_3);

    $i = 0;

?>


<?php
    $query = new WP_Query( array( 
        'post_type' => 'project',
        'posts_per_page' => -1,
        'tax_query' => array(
            array (
                'taxonomy' => 'project-categories',
                'field' => 'slug',
                'terms' => $category_1_slug,
            )
        ),
    ));
?>

<section id="projects">

    <div class="container-lg">
        <label class="animated fadeInUp delay-2"><?php echo $category_1; ?></label>
    </div>

    <div class="container-lg">

        <?php if ($query->have_posts()): ?>
            <?php while($query->have_posts()): ?>

                <div class="half">

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
                            <div class="project-tile-image" style="background-image: url(<?php echo $background_image[0]; ?>);<?php if ($colour): ?>background-color: <?php echo $colour; endif; ?>">
                                <div class="project-tile-logo" style="background-image: url(<?php echo $logo[0]; ?>);"></div>
                                <div class="project-tile-background" style="background-image: url(<?php echo $background_image[0]; ?>);"></div>
                            </div>
                            <div class="project-tile-info">
                                <h2><?php echo get_the_title($project_ID); ?></h2>
                            </div>
                        </a>
                    </div>

                </div>

            <?php endwhile; ?>
        <?php endif; ?>

        <?php wp_reset_query(); ?>

    </div>
</section>

<?php get_template_part('partials/section', 'hello'); ?>

<section id="personal">
    <div class="container-sm">

        <div class="half">

            <?php
                $query = new WP_Query( array( 
                    'post_type' => 'project',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array (
                            'taxonomy' => 'project-categories',
                            'field' => 'slug',
                            'terms' => $category_2_slug
                        )
                    ),
                ));
            ?>

            <h2><?php echo $category_2; ?></h2>

            <?php if ($query->have_posts()): ?>
                <?php while($query->have_posts()): ?>

                    <?php
                        $project = $query->the_post();
                        $project_ID = $project->ID;
                    ?>

                    <div class="personal-project">
                        <a href="<?php echo get_the_permalink($project_ID); ?>">
                            <?php echo get_the_title($project_ID); ?>
                        </a>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

            <?php wp_reset_query(); ?>

        </div>

        <div class="half">

            <?php
                $query = new WP_Query( array( 
                    'post_type' => 'project',
                    'posts_per_page' => -1,
                    'tax_query' => array(
                        array (
                            'taxonomy' => 'project-categories',
                            'field' => 'slug',
                            'terms' => $category_3_slug
                        )
                    ),
                ));
            ?>

            <h2><?php echo $category_3; ?></h2>

            <?php if ($query->have_posts()): ?>
                <?php while($query->have_posts()): ?>

                    <?php
                        $project = $query->the_post();
                        $project_ID = $project->ID;
                    ?>

                    <div class="personal-project">
                        <a href="<?php echo get_the_permalink($project_ID); ?>">
                            <?php echo get_the_title($project_ID); ?>
                        </a>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

            <?php wp_reset_query(); ?>

        </div>

    </div>
</section>