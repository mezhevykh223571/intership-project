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