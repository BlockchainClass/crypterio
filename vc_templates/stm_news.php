<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '));

if (empty($loop)) {
	return;
}

$query = false;

list($loop_args, $query) = vc_build_loop_query($loop, get_the_ID());

if (!$query) {
	return;
}

$style_class = '';

if (empty($style)) {
	$style = 'style_1';
}

$config = crypterio_config();

?>

<?php if ($query->have_posts()): ?>
    <div class="stm_news <?php echo esc_attr($style_class);
	echo esc_attr($css_class); ?>">
        <ul class="news_list posts_per_row_<?php echo esc_attr($posts_per_row); ?>">
			<?php while ($query->have_posts()): $query->the_post();

				if ($config['layout'] == 'ico'):
					get_template_part('partials/news/ico');
				else:
					$post_thumbnail = wpb_getImageBySize(array(
						'attach_id'  => get_post_thumbnail_id(),
						'thumb_size' => $img_size,
					));
					$post_thumbnail = $post_thumbnail['thumbnail'];
					?>
                    <li>
                        <div class="post_inner">

							<?php if (has_post_thumbnail() && !$disable_preview_image): ?>
                                <div class="image">
                                    <a href="<?php the_permalink(); ?>">
										<?php echo html_entity_decode($post_thumbnail); ?>
                                    </a>
                                </div>
							<?php endif; ?>

                            <div class="stm_news_unit-block">
                                <div class="date">
									<?php echo get_the_date(); ?>
                                </div>
                                <h5 class="no_stripe"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            </div>
                        </div>
                    </li>
				<?php endif; ?>
			<?php endwhile; ?>
        </ul>
    </div>
<?php endif;
wp_reset_postdata(); ?>