<div class="flex-wrap">
    <div class="front-left-col">
        <div class="event-block">
            <div class="event-img">
                <div class="event-img-wrapper">

                </div>
                <div class="event-imd-date">
                    <?php echo get_post_meta($post_id, 'event-day', true); ?>
                </div>
            </div>
            <div class="event-ticket">
                <h3><?php echo get_the_title($post_id) ?></h3>
                <p><span>Location</span> : <?php echo get_post_meta($post_id, 'lcoation', true); ?></p>
                <p><span>Date</span> : <?php echo get_post_meta($post_id, 'date', true); ?></p>
                <p><span>Time</span> : <?php echo get_post_meta($post_id, 'time', true); ?></p>
                <p><span>Price</span> : $<?php echo get_post_meta($post_id, 'price', true); ?></p>
                <a href="#" class="purchase-btn -purchase-btn-ticket">purchase Ticket</a>
            </div>
        </div>
    </div>

    <div class="front-right-col">
        <div class="latest-video-wrapper">
            <img src="<?php echo get_stylesheet_directory_uri() . '/img/home/bg80nxtthy.png' ?>">
        </div>
    </div>
</div>