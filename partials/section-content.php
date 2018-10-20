<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="container container-sm">
        <div class="row">
            <div class="col-12">
                <div class="project-title">
                    <h1 class="animated fadeInLeft delay-1"><?php the_title(); ?></h1>
                    <label><div class="animated fadeInDown delay-2"><?php the_time('Y'); ?></div></label>
                </div>
            </div>
        </div>
    </div>
    <div class="project-content animated fadeIn delay-3">
        <?php the_content(); ?>
    </div>
</article>