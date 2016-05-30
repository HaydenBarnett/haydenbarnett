<?php
    
    $next = get_next_post();
    $previous = get_previous_post();

?>

<section id="navigation">
    <div class="container">

        <div class="row">

            <?php if (!empty( $next )): ?>

                <?php if (empty($previous)): ?>
                    <div class="col-sm-12">
                <?php else: ?>
                    <div class="col-sm-4">
                <?php endif; ?>
                    
                    <?php 
                        $colour = get_field('colour', $next->ID);
                        $year = get_field('year', $next->ID);
                        $full = get_field('use_full_size_image', $next->ID);
                        if ($full) :
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id($next->ID), 'full' );
                        else :
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id($next->ID), 'medium' );
                        endif;
                    ?>

                    <h6>Previous</h6>

                    <a href="<?php echo get_the_permalink($next->ID); ?>" class="tile" style="background-image: url(<?php echo $image[0]; ?>); background-color: <?php echo $colour; ?>">
                        <?php $rgb = hex2rgb($colour); ?>
                        <div class="tile-inner" style="background-color: rgba(<?php echo $rgb['red']; ?>, <?php echo $rgb['green']; ?>, <?php echo $rgb['blue']; ?>, 0.5);">
                            <div class="tile-info">
                                <h2><?php echo get_the_title($next->ID); ?></h2>
                                <?php $tags = get_the_terms($next->ID, 'project-tags'); ?>
                                <ul>
                                    <?php if ($tags): ?>
                                        <?php foreach ($tags as $tag) : ?>
                                            <li><?php echo $tag->name; ?></li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                                <div class="year">
                                    <?php if ($year): ?>
                                        <span><?php echo $year; ?></span>
                                    <?php else: ?>
                                        <span><?php the_time('Y'); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="tile-background" style="background-image: url(<?php echo $image[0]; ?>);"></div>
                    </a>

                </div>

            <?php endif ?>

            <?php if (!empty( $previous )): ?>

                <?php if (empty($next)): ?>
                    <div class="col-sm-12">
                <?php else: ?>
                    <div class="col-sm-8">
                <?php endif; ?>
                    
                    <?php 
                        $colour = get_field('colour', $previous->ID); 
                        $year = get_field('year', $previous->ID);
                        $full = get_field('use_full_size_image', $previous->ID);
                        if ($full) :
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id($previous->ID), 'full' );
                        else :
                            $image = wp_get_attachment_image_src( get_post_thumbnail_id($previous->ID), 'medium' );
                        endif;
                    ?>

                    <h6>Next</h6>

                    <a href="<?php echo get_the_permalink($previous->ID); ?>" class="tile" style="background-image: url(<?php echo $image[0]; ?>); background-color: <?php echo $colour; ?>">
                        <?php $rgb = hex2rgb($colour); ?>
                        <div class="tile-inner" style="background-color: rgba(<?php echo $rgb['red']; ?>, <?php echo $rgb['green']; ?>, <?php echo $rgb['blue']; ?>, 0.5);">
                            <div class="tile-info">
                                <h2><?php echo get_the_title($previous->ID); ?></h2>
                                <?php $tags = get_the_terms($previous->ID, 'project-tags'); ?>
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

            <?php endif; ?>

        </div>

    </div>
    
</section>