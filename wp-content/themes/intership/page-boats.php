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
            <section class="feature-section feature-section-page">
                <div class="container">
                    <div id="content">
                        <div class="feature-images">
                            <div class="grid">
                                <div class="grid-sizer col-xs-12 col-sm-6 col-md-6 col-lg-6"></div>
                                <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                $args = array(
                                    'post_type' => 'boats',
                                    'posts_per_page' => '4',
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
                                        <div class="grid-item col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                            <div class="grid-item-content">
                                                <div class="image-wrapper">
                                                    <div>
                                                        <a href="<?php echo get_permalink($post->ID); ?>"><?php the_post_thumbnail(); ?></a>
                                                    </div>
                                                    <div class="background-text">
                                                        <div class="image-label">
                                                            <p>€ <?php echo get_post_meta($post_id, 'money', true); ?> / day</p>
                                                        </div>
                                                        <div class="text-label">
                                                            <h3><?php echo get_post_meta($post_id, 'boatname', true); ?></h3>
                                                            <span class="location-icon"></span>
                                                            <p><?php echo get_post_meta($post_id, 'locality', true); ?>, <?php echo get_post_meta($post_id, 'country', true); ?></p>
                                                            <span class="people-icon"></span>
                                                            <p><?php echo get_post_meta($post_id, 'count', true); ?>
                                                                Berths</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                /* Restore original Post Data */
                                //wp_reset_postdata();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" id="featureLoadMore" data-page="<?php echo $paged ?>">Load more</button>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
