<?php
$post_thumbnail = wpb_getImageBySize(array(
	'attach_id'  => get_post_thumbnail_id(),
	'thumb_size' => '170x50',
));
$post_thumbnail = $post_thumbnail['thumbnail'];

?>

<li>
    <div class="stm_flipbox">
        <div class="stm_flipbox__front">
            <div class="inner_flip">
                <div class="stm_projects__meta">
                    <div class="inner">
                        <div class="post_inner">
							<?php if (has_post_thumbnail()): ?>
                                <div class="image">
                                    <a href="<?php the_permalink(); ?>">
										<?php echo html_entity_decode($post_thumbnail); ?>
                                    </a>
                                </div>
							<?php endif; ?>
                            <div class="stm_news_unit-block">
                                <h5 class="no_stripe"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="stm_flipbox__back">
            <div class="inner_flip">
                <div class="stm_projects__meta">
                    <div class="inner">
                        <div class="post_inner">
							<?php if (has_post_thumbnail()): ?>
                                <div class="image">
                                    <a href="<?php the_permalink(); ?>">
										<?php echo html_entity_decode($post_thumbnail); ?>
                                    </a>
                                </div>
							<?php endif; ?>
                            <div class="stm_news_unit-block">
                                <p><?php echo wp_kses_post(get_the_excerpt()); ?></p>
                                <a href="<?php the_permalink(); ?>">
									<?php esc_html_e('Learn more', 'blockchain'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>