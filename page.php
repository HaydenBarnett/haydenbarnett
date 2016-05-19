<?php get_header(); ?>

    <?php while ( have_posts() ) : the_post(); ?>

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

    <?php endwhile; ?>

<?php get_footer(); ?>