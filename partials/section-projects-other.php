<?php
    
    $category = 'Personal Projects';
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

<h2><?php echo $category; ?></h2>

<?php if ($query->have_posts()): ?>
    <?php while($query->have_posts()): ?>

        <?php
            $project = $query->the_post();
            $project_ID = $project->ID;
        ?>

        <div class="personal-project">
            <a href="<?php echo get_the_permalink($project_ID); ?>">
                <?php echo get_the_title($project_ID); ?>
            </a>
        </div>

    <?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_query(); ?>