<?php
    $image = wp_get_attachment_image_src( get_post_thumbnail_id($project_ID), 'medium' );
    $colour = get_field('colour');
?>

<section id="banner">
    <div class="banner-gradient"></div>
    <div class="banner-image" style="background-image:url('<?php echo $image[0]; ?>');"></div>
</section>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="page-title">
                    <h1><?php the_title(); ?></h1>
                </div>
                <div class="page-content">
                    <?php the_content(); ?>
                </div>

            </div>

        </div>

    </div>

</section>