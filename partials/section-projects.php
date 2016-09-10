<?php
    $frontpage = get_option('page_on_front');
?>

<section id="projects">
    <div class="container">
        <div class="row">

            <?php if (have_rows('projects', $frontpage)) : ?>
                <?php while (have_rows('projects', $frontpage)) : the_row(); ?>

                    <?php
                        $project_ID = get_sub_field('project');
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

                    <?php if ($width === 'large'): ?>
                        <div class="col-md-12">
                    <?php elseif ($width === 'medium'): ?>
                        <div class="col-md-8 col-sm-6">
                    <?php elseif ($width === 'small'): ?>
                        <div class="col-md-4 col-sm-6">
                    <?php endif; ?>
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

        </div>
    </div>
</section>