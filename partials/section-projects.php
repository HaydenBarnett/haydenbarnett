<?php
    $query = new WP_Query( array( 
        'post_type' => 'project',
        'posts_per_page' => -1
    ));
?>

<section id="projects">
    <div class="container-fluid">
        <div class="row">

            <?php if ($query->have_posts()): ?>
                <?php while($query->have_posts()): ?>

                    <?php
                        $project = $query->the_post();
                        $project_ID = $project->ID;
                        $width = get_sub_field('width');
                        $colour = get_field('colour', $project_ID);
                        $year = get_field('year', $project_ID);
                        $full = get_field('use_full_size_image', $project_ID);
                        if ($full):
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id($project_ID), 'full' );
                        else:
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id($project_ID), 'medium' );
                        endif;
                    ?>

                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <a href="<?php echo get_the_permalink($project_ID); ?>" class="tile" style="background-image: url(<?php echo $image[0]; ?>); background-color: <?php echo $colour; ?>">
                            <?php $rgb = hex2rgb($colour); ?>
                            <div class="tile-inner" style="background-color: rgba(<?php echo $rgb['red']; ?>, <?php echo $rgb['green']; ?>, <?php echo $rgb['blue']; ?>, 0.5);">
                                <div class="tile-info">
                                    <h2><?php echo get_the_title($project_ID); ?></h2>
                                    <?php $tags = get_the_terms($project_ID, 'project-tags'); ?>
                                    <ul>
                                        <?php if ($tags): ?>
                                            <?php foreach ($tags as $tag) : ?>
                                                <li><?php echo $tag->name; ?></li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <div class="year">
                                    <?php if ($year): ?>
                                        <span><?php echo $year; ?></span>
                                    <?php else: ?>
                                        <span><?php the_time('Y'); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="tile-background" style="background-image: url(<?php echo $image[0]; ?>);"></div>
                        </a>
                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

            <?php wp_reset_query(); ?>

        </div>
    </div>
</section>