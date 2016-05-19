<?php get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

        <section id="intro">

            <div class="container">

                <div class="row">

                    <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">

                        <div class="front-page-title">
                            <?php the_content(); ?>
                        </div>

                        <div class="featured-projects-link">
                            <a href="#projects">Featured Projects<br><span class="icon">&darr;</span></a>
                        </div>

                    </div>

                </div>

            </div>

        </section>

        <section id="projects">
            <div class="container">
                <div class="row">

                    <?php if (have_rows('projects')) : ?>
                        <?php while (have_rows('projects')) : the_row(); ?>

                            <?php
                                $project_ID = get_sub_field('project');
                                $width = get_sub_field('width');
                                $colour = get_field('colour', $project_ID);
                                if ($width === 'large' || $width === 'medium'):
                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id($project_ID), 'medium' );
                                else :
                                    $image = wp_get_attachment_image_src( get_post_thumbnail_id($project_ID), 'thumbnail' );
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
                                            <?php if ($tags): ?>
                                                <ul>
                                                    <?php foreach ($tags as $tag) : ?>
                                                        <li><?php echo $tag->name; ?></li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                        <div class="icon">&rarrhk;</div>
                                    </div>
                                    <div class="tile-background" style="background-image: url(<?php echo $image[0]; ?>);"></div>
                                </a>
                            </div>

                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>
        </section>

    <?php endwhile; ?>

<?php get_footer(); ?>