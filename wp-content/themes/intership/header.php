<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package intership
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'intership' ); ?></a>

	<header id="masthead" class="site-header">
<!--		<div class="site-branding">-->
<!--			--><?php
//			the_custom_logo();
//			if ( is_front_page() && is_home() ) : ?>
<!--				<h1 class="site-title"><a href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home">--><?php //bloginfo( 'name' ); ?><!--</a></h1>-->
<!--			--><?php //else : ?>
<!--				<p class="site-title"><a href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home">--><?php //bloginfo( 'name' ); ?><!--</a></p>-->
<!--			--><?php
//			endif;
//
//			$description = get_bloginfo( 'description', 'display' );
//			if ( $description || is_customize_preview() ) : ?>
<!--				<p class="site-description">--><?php //echo $description; /* WPCS: xss ok. */ ?><!--</p>-->
<!--			--><?php
//			endif; ?>
<!--		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'intership' ); ?></button>
			<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				) );
			?>
		</nav><!-- #site-navigation -->

        <div class="brand-logo">
            <a href="#">
                <img src="<?php echo get_stylesheet_directory_uri() . '/img/logo.png' ?>">
            </a>
        </div>

        <div class="right-col">
            <div class="soc-sharing">
                <ul>
                    <?php
                    if (get_theme_mod("slh_code")) { ?>
                        <li><a href="<?php echo get_theme_mod("slh_code"); ?>" class="facebook"><?php echo get_theme_mod("slh_code_text"); ?></a></li>
                    <?php }
                    if (get_theme_mod("slh_code2")) { ?>
                        <li><a href="<?php echo get_theme_mod("slh_code2"); ?>" class="twitter"><?php echo get_theme_mod("slh_code2_text"); ?></a></li>
                    <?php }
                    if (get_theme_mod("slh_code3")) { ?>
                        <li><a href="<?php echo get_theme_mod("slh_code3"); ?>" class="google-plus"><?php echo get_theme_mod("slh_code3_text"); ?></a></li>
                    <?php }
                    ?>
                </ul>
            </div>
            <a href="#" class="purchase-btn -purchase-btn-header">purchase ticket</a>
        </div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
