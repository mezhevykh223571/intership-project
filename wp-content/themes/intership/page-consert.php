<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nava
 */

get_header(); ?>

    <div class="header-page"></div>
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section class="explore-section explore-section-page">
                <div class="page-thumb">
                    <?php the_post_thumbnail('category-thumb'); ?>
                </div>
                <div class="caption center-title">
                    <h3><?php the_title() ?></h3>
                </div>
                <div class="container">
                    <div class="content-page-members">
                        <?php
                        $args = array(
                            'post_type' => 'consert',
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
                        <div class="event-block">
                            <div class="event-img">
                                <div class="event-img-wrapper">
                                    <?php the_post_thumbnail(); ?>
                                </div>
                                <div class="event-imd-date">
                                    <?php echo get_post_meta($post_id, 'event-day', true); ?>
                                </div>
                            </div>
                            <div class="event-ticket">
                                <h3><?php echo get_the_title($post_id) ?></h3>
                                <p><span>Location</span>
                                    : <?php echo get_post_meta($post_id, 'location', true); ?></p>
                                <p><span>Date</span>
                                    : <?php echo get_post_meta($post_id, 'date', true); ?></p>
                                <p><span>Time</span>
                                    : <?php echo get_post_meta($post_id, 'time', true); ?></p>
                                <p><span>Price</span> :
                                    $<?php echo get_post_meta($post_id, 'price', true); ?></p>
                                <?php }
                                } else {
                                    // no posts found
                                }
                                ?>
                                <a href="<?php echo get_post_meta($post_id, 'btn-link', true); ?>" class="purchase-btn -purchase-btn-ticket">purchase
                                    Ticket</a>
                            </div>
                        </div>
                    </div>

            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();