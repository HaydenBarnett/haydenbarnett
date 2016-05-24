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
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id($next), 'medium' );
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
                                    <li><?php the_time('Y'); ?></li>
                                </ul>
                            </div>
                            <div class="icon">&rarrhk;</div>
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
                        $image = wp_get_attachment_image_src( get_post_thumbnail_id($previous), 'large' );
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
                                    <li><?php the_time('Y'); ?></li>
                                </ul>
                            </div>
                            <div class="icon">&rarrhk;</div>
                        </div>
                        <div class="tile-background" style="background-image: url(<?php echo $image[0]; ?>);"></div>
                    </a>

                </div>

            <?php endif; ?>

        </div>

    </div>
    
</section>