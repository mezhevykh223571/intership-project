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
                    <?php the_post_thumbnail( 'category-thumb' ); ?>
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
                                <div class="card">
                                    <div class="card-img">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                    <div class="card-caption">
                                        <p><?php echo get_the_title($post_id) ?></p>
                                        <p><?php echo get_post_meta($post_id, 'instrument', true); ?></p>
                                        <div class="soc-network">
                                            <ul>
                                                <li><a href="#"><i
                                                            class="facebook"></i><?php echo get_post_meta($post_id, 'facebook', true); ?>
                                                    </a></li>
                                                <li><a href="#"><i
                                                            class="twitter"></i><?php echo get_post_meta($post_id, 'twitter', true); ?>
                                                    </a></li>
                                                <li><a href="#"><i
                                                            class="google-plus"></i><?php echo get_post_meta($post_id, 'googleplus', true); ?>
                                                    </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                /* Restore original Post Data */
                                //wp_reset_postdata();
                            }
                        }
                        ?>

            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();