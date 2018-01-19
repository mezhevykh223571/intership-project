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
                <div class="container">
                    <div id="content">
                        <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'ourmembers',
                    'posts_per_page' => '5',
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
                        <a href="<?php echo get_permalink($post->ID); ?>"><?php the_post_thumbnail(); ?></a>
                        <h3><span><?php the_title() ?></span></h3>
                        <p><?php echo get_post_meta($post_id, 'facebook', true); ?></p>
                        <p><?php echo get_post_meta($post_id, 'twitter', true); ?></p>
                        <p><?php echo get_post_meta($post_id, 'googleplus', true); ?></p>
                        <?php
                    }
                    /* Restore original Post Data */
                    //wp_reset_postdata();
                } else {
                    // no posts found
                }
                ?>
                    </div>
                    <button type="button" id="load-more" data-page="<?php echo $paged ?>">Load more</button>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_sidebar();
get_footer();
