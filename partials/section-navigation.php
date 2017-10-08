<?php
    
    $next = get_next_post();
    $previous = get_previous_post();

?>

<section id="navigation">
    <div class="container-sm">

        <div class="half text-left">
            <?php if (!empty( $next )): ?>
                <label>Previous</label>
                <a href="<?php echo get_the_permalink($next->ID); ?>">
                    <?php echo get_the_title($next->ID); ?>
                </a>
            <?php else: ?>
                &nbsp;
            <?php endif; ?>
        </div>

        <div class="half text-right">
            <?php if (!empty( $previous )): ?>
                <label>Next</label>
                <a href="<?php echo get_the_permalink($previous->ID); ?>">
                    <?php echo get_the_title($previous->ID); ?>
                </a>
            <?php else: ?>
                &nbsp;
            <?php endif; ?>
        </div>

    </div>
</section>