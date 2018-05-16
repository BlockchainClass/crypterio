<div class="stm_events_tile">
    <div class="inner">
        <div class="stm_events_tiles__image">
			<?php if (has_post_thumbnail()):
				if (empty($img_size)) {
					$img_size = '455x455';
				}

				$post_thumbnail = wpb_getImageBySize(array(
					'attach_id'  => get_post_thumbnail_id(),
					'thumb_size' => $img_size,
				));

				$post_thumbnail = $post_thumbnail['thumbnail'];
				?>
                <div class="item_thumbnail">
					<?php echo crypterio_sanitize_text_field($post_thumbnail); ?>
                </div>
			<?php endif; ?>
        </div>
        <div class="stm_events_widgets">
			<?php get_template_part('partials/content-event', 'widgets'); ?>
        </div>
    </div>
</div>