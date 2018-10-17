<?php
    
    $category = 'Other Work';
    $category_slug = sanitize_title($category);

?>

<?php
    $query = new WP_Query( array( 
        'post_type' => 'project',
        'posts_per_page' => -1,
        'tax_query' => array(
            array (
                'taxonomy' => 'project-categories',
                'field' => 'slug',
                'terms' => $category_slug
            )
        ),
    ));
?>

<?php if ($query->have_posts()): ?>
    <?php while($query->have_posts()): ?>

        <?php
            $project = $query->the_post();
            $project_ID = $project->ID;
        ?>
        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
            <div class="personal-project">
                <a href="<?php echo get_the_permalink($project_ID); ?>">
                    <?php echo get_the_title($project_ID); ?>
                </a>
            </div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_query(); ?>