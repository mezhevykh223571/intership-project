<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package intership
 */

?>

    <section class="subscribe">
        <div class="subscribe-form">
            <input type="text" placeholder="subscribe newsletter">
            <button></button>
        </div>
    </section>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <div class="footer-menu">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'menu-1',
                'menu_id'        => 'primary-menu',
            ) );
            ?>
        </div>
        <div class="copyring-text">
            Copyright © 2009–2016 <span>cantus</span> © their respective owners. Shipped from Salem, Mass. USA.
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
