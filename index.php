<?php get_header(); ?>

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <div class="container">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="page-title">
                                <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                            </div>

                            <div class="page-content">
                                <?php the_content(); ?>
                            </div>

                        </div>

                    </div>

                </div>

            </section>

        <?php endwhile; ?>

    <?php else: ?>

        <section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <div class="page-title">
                            <h1>Nothing found</h1>
                        </div>

                        <div class="page-content">
                            <p>Perhaps the <a href="<?php echo esc_html(home_url()); ?>">Home page</a> will have what you are searching for.</p>
                        </div>

                    </div>

                </div>

            </div>

        </section>

    <?php endif; ?>
    
<?php get_footer(); ?>