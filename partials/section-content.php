<?php
    $colour = get_field('colour');
    $sidebar_content = get_field('sidebar_content');
    $full = get_field('use_full_size_image');
    if ($full) :
        $image = wp_get_attachment_image_src( get_post_thumbnail_id($project_ID), 'full' );
    else :
        $image = wp_get_attachment_image_src( get_post_thumbnail_id($project_ID), 'medium' );
    endif;
?>

<section id="banner">
    <div class="banner-gradient"></div>
    <div class="banner-image" style="background-image:url('<?php echo $image[0]; ?>');"></div>
</section>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div id="sidebar">
                    <div class="sidebar-nav clearfix">
                        <div class="left"><?php next_post_link( '%link', _x( '&lt', 'Next', 'haydenbarnett' ) . '' ); ?></div>
                        <div class="right"><?php previous_post_link( '%link', ''. _x( '&gt;', 'Previous', 'haydenbarnett' ) ); ?></div>
                    </div>
                    <div class="sidebar-title animated fadeIn">
                        <h3><?php the_title(); ?></h3>
                    </div>
                    <div class="sidebar-content animated fadeIn">
                        <?php echo $sidebar_content; ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div id="gallery">
                    <div class="gallery-content animated fadeIn">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>