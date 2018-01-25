<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package intership
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <div class="page-thumb">
                <?php the_post_thumbnail( 'category-thumb' ); ?>
            </div>
            <div class="caption center-title">
                <h3><?php the_title() ?></h3>
            </div>
            <div class="container">

                <?php
                $post;
                $lastposts = get_posts($args);
                foreach ($lastposts as $post) :
                    setup_postdata($post); ?>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php
                    $text_content = get_the_content();
                    echo mb_strimwidth($text_content, 0, 180, '...');
                    ?>
                    <p><a href="<?php the_permalink(); ?>" class="go-post">Go to the post</a></p>
                <?php endforeach;
                wp_reset_postdata(); ?>

            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
