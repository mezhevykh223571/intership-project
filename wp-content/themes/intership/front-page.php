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
                                        <?php the_post_thumbnail() ?>
                                        <div class="top-text">
                                            <h3><?php echo get_post_meta($post_id, 'header', true); ?></h3>
                                            <p><?php echo get_post_meta($post_id, 'caption', true); ?></p>
                                            <a href="<?php echo get_post_meta($post_id, 'btn-link', true); ?>"><?php echo get_post_meta($post_id, 'btn-text', true); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                } else {
                    ?>
                    <div class="progress -top-section-progress" style="display: none">
                        <div class="progress-bar">
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="progress -top-section-progress">
                    <div class="progress-bar">
                    </div>
                </div>
            </section>

            <section class="intro">
                <div class="container">
                    <div class="caption">
                        <h3>INTRODUCING</h3>
                        <p>Our Members</p>
                    </div>

                    <div class="pag-wrap">
                        <div class="pagination">
                            <span class="pag-left"></span>
                            <span class="pag-right"></span>
                        </div>
                    </div>

                    <div class="card-section">

                        <?php echo do_shortcode('[featured-content design="design-5" limit="3"]'); ?>
                    </div>
                </div>
            </section>

            <section class="site-carousel">
                <div class="container">
                    <div class="site-carousel-wrapper">
                        <div class="site-carousel-wrap">
                            <div class="flex-wrap">
                                <div class="front-left-col">
                                    <div class="caption">
                                        <h3>UPCOMING</h3>
                                        <p>Consert</p>
                                    </div>
                                </div>
                                <div class="front-right-col">
                                    <div class="caption">
                                        <h3>LATEST</h3>
                                        <p>Videos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pag-wrap">
                            <div class="pagination">
                                <span class="pag-left"></span>
                                <span class="pag-right"></span>
                            </div>
                        </div>
                        <?php
                        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                        $args = array(
                            'post_type' => 'consert',
                            'posts_per_page' => '1',
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
                        <div class="flex-wrap">
                            <div class="front-left-col">
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
                                        <a href="<?php echo get_post_meta($post_id, 'btn-link', true); ?>"
                                           class="purchase-btn -purchase-btn-ticket">purchase
                                            Ticket</a>
                                    </div>
                                </div>
                            </div>

                            <div class="front-right-col">
                                <div class="latest-video-wrapper">
                                    <?php
                                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                                    $args = array(
                                        'post_type' => 'video',
                                        'posts_per_page' => '1',
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
                                            <iframe width="560" height="315"
                                                    src="<?php echo get_post_meta($post_id, 'video', true); ?>?rel=0&amp;controls=0&amp;showinfo=0"
                                                    frameborder="0" allow="autoplay; encrypted-media"
                                                    allowfullscreen></iframe>
                                        <?php }
                                    } else {
                                        // no posts found
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="progress -progress-event">
                            <div class="progress-bar" style="margin-left: 22px; width: 20.35%;"></div>
                        </div>
                    </div>

                </div>
            </section>

            <section class="our-founder">
                <div class="container">
                    <div class="bg-wrapper">
                        <div class="bg-text">
                            <h3>Our Founder staying in our hearts</h3>
                            <p>1982 cantus Start jurny and now it‘s top class Rock Band in the California.</p>
                            <a href="#">Learn more</a>
                        </div>
                    </div>
                </div>
            </section>

            <section class="song-section">
                <div class="container">
                    <div class="site-carousel-wrapper">
                        <div class="site-carousel-caption caption-padding">
                            <div class="flex-wrap">
                                <div class="front-left-col">
                                    <div class="caption">
                                        <h3>Popular</h3>
                                        <p>Songs</p>
                                    </div>
                                </div>
                                <div class="front-right-col">
                                    <div class="caption">
                                        <h3>Instagram</h3>
                                        <p>Feed</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex-wrap">
                            <div class="front-left-col">
                                <div class="sc-media-player-wrapper">
                                    <iframe width="770" height="166" scrolling="no" frameborder="no" allow="autoplay"
                                            src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/325272566&amp;color=%23ff5500&amp;hide_related=false&amp;show_comments=true&amp;show_user=false&amp;show_reposts=false&amp;show_teaser=false"></iframe>
                                </div>
                                <div id="ads_box" class="playlist">
                                    <div class="playlist-block">
                                        <ul>
                                            <li>01. <?php echo get_theme_mod("song"); ?></li>
                                            <li>02. <?php echo get_theme_mod("song2"); ?></li>
                                            <li>03. <?php echo get_theme_mod("song3"); ?></li>
                                            <li>04. <?php echo get_theme_mod("song4"); ?></li>
                                        </ul>
                                    </div>
                                    <div class="playlist-block">
                                        <ul>
                                            <li>05. <?php echo get_theme_mod("song5"); ?></li>
                                            <li>06. <?php echo get_theme_mod("song6"); ?></li>
                                            <li>07. <?php echo get_theme_mod("song7"); ?></li>
                                            <li>08. <?php echo get_theme_mod("song8"); ?></li>
                                        </ul>
                                    </div>
                                    <div class="playlist-block">
                                        <ul>
                                            <li>09. <?php echo get_theme_mod("song9"); ?></li>
                                            <li>10. <?php echo get_theme_mod("song10"); ?></li>
                                            <li>11. <?php echo get_theme_mod("song11"); ?></li>
                                            <li>12. <?php echo get_theme_mod("song12"); ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="front-right-col">
                                <?php dynamic_sidebar('insta-plugin'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="download-app">
                <div class="container">
                    <div class="bg-wrapper">
                        <div class="bg-text">
                            <h3>Download Our Official Apps</h3>
                            <p>Never stop listening. Take your playlists and likes wherever you go.</p>
                            <div class="download-btn">
                                <a href="#"><img
                                            src="<?php echo get_stylesheet_directory_uri() . '/img/home/download-ios.png' ?>"></a>
                                <a href="#"><img
                                            src="<?php echo get_stylesheet_directory_uri() . '/img/home/download-android.png' ?>"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
