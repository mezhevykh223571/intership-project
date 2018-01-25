<?php
/**
 * Handles Featured Content Post Setting Metabox HTML
 *
 * @package WP Featured Content and Slider
 * @since 1.0.0
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $post;

// Getting saved values
//$featured_icon 	= get_post_meta( $post->ID, 'wpfcas_slide_icon', true );
//$read_more_link = get_post_meta( $post->ID, 'wpfcas_slide_link', true );

$instrument = get_post_meta( $post->ID, 'instrument', true );
$facebook = get_post_meta( $post->ID, 'facebook', true );
$twitter = get_post_meta( $post->ID, 'twitter', true );
$googleplus = get_post_meta( $post->ID, 'googleplus', true );
$facebookLink = get_post_meta( $post->ID, 'facebook-link', true );
$twitterLink = get_post_meta( $post->ID, 'twitter-link', true );
$googleplusLink = get_post_meta( $post->ID, 'googleplus-link', true );
echo '<p><input id="instrument" name="instrument" type="text" value="' . $instrument . '"><label for="instrument"> - Instrument</label></p>';
echo '<p><input id="facebook-link" name="facebook-link" type="text" value="' . $facebookLink .'"><label for="facebook-link"> - Facebook Link</label></p>';
echo '<p><input id="facebook" name="facebook" type="text" value="' . $facebook . '"><label for="facebook"> - Facebook Followers</label></p>';
echo '<p><input id="twitter-link" name="twitter-link" type="text" value="' . $twitterLink . '"><label for="twitter-link"> - Twitter Link</label></p>';
echo '<p><input id="twitter" name="twitter" type="text" value="' . $twitter . '"><label for="twitter"> - Twitter Followers</label></p>';
echo '<p><input id="googleplus-link" name="googleplus-link" type="text" value="' . $googleplusLink .'"><label for="googleplus-link"> - Google+ Link</label></p>';
echo '<p><input id="googleplus" name="googleplus" type="text" value="' . $googleplus .'"><label for="googleplus"> - Google+ Followers</label></p>';
?>

<table class="form-table wpfcas-post-sett-table">
	<tbody>

		<tr valign="top">
			<td>

			</td>
		</tr>
	</tbody>
</table><!-- end .wtwp-tstmnl-table -->