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

                <div class="all-pages">
                    <ol>
                    <?php
                    $args = array(
                      'exclude' => '20'
                    );
                    $pages = get_pages( $args );
                    foreach ( $pages as $page ) {
                        $option = '<li><a href="' . get_page_link( $page->ID ) . '">' . $page->post_title; '</a></li>';
                        echo $option;
                    }
                    ?>
                    </ol>
                </div>
            </div>
        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
