<section>
    <?php
    $args = array(
        'post_type' => 'slider',
        'orderby' => 'date',
        'order' => 'DESC',
        'paged' => $paged
    );
    // The Query
    $the_query = new WP_Query($args);
    // The Loop
    if ($the_query->have_posts()) {
    while ($the_query->have_posts()) {
    $the_query->the_post();
    $post_id = get_the_ID();
    ?>
    <div id="slider">
        <div class="wrap">
            <div class="panel">
                <div class="top-section">
                    <div class="top-text">
                        <h3><?php echo get_post_meta($post_id, 'header', true); ?></h3>
                        <p><?php echo get_post_meta($post_id, 'caption', true); ?></p>
                        <a href="<?php echo get_post_meta($post_id, 'btn-link', true); ?>"><?php echo get_post_meta($post_id, 'btn-text', true); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="progress">
        <div class="progress-bar">
        </div>
    </div>
</section>
<?php }
} else {
    // no posts found
}
?>