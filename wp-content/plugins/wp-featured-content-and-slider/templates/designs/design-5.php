<?php
    $post_ID    = get_the_ID();
    $instrument = get_post_meta($post_ID, 'instrument', true);
    $fbLink     = get_post_meta($post_ID, 'facebook-link', true);
    $fbText     = get_post_meta($post_ID, 'facebook', true);
    $twLink     = get_post_meta($post_ID, 'twitter-link', true);
    $twText     = get_post_meta($post_ID, 'twitter', true);
    $googleLink = get_post_meta($post_ID, 'googleplus-link', true);
    $googleText = get_post_meta($post_ID, 'googleplus', true);

?>
<div class="card">
    <div class="card-img">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="card-caption">
        <p><?php echo get_the_title() ?></p>
        <p><?php echo $instrument ?></p>
        <div class="soc-network">
            <ul>
                <li><a href="<?php echo $fbLink ?>"><i
                                class="facebook"></i><?php echo $fbText ?>
                    </a></li>
                <li><a href="<?php echo $twLink ?>"><i
                                class="twitter"></i><?php echo $twText ?>
                    </a></li>
                <li><a href="<?php echo $googleLink ?>"><i
                                class="google-plus"></i><?php echo $googleText ?>
                    </a></li>
            </ul>
        </div>
    </div>
</div>