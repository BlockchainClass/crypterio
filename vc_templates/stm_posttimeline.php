<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$classes = array('stm_posttimeline');
$classes[] = 'stm_posttimeline_style_1';
$classes[] = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '));
$classes[] = $this->getCSSAnimation($css_animation);

$atts['classes'] = $classes;

$dates = $posts = array();

$q_args = array(
	'posts_per_page' => '-1',
	'post_status'    => 'any',
	'order'          => 'ASC'
);

if (!empty($categories)) {
	$categories = explode(',', $categories);
	if (is_array($categories)) {
		$q_args['category__in'] = $categories;
	}
}

$q = new WP_Query($q_args);

$icon = (!empty($icon)) ? $icon : 'stmicon-zzz';

if ($q->have_posts()) {
	while ($q->have_posts()) {
		$q->the_post();
		$year = get_the_date('Y');
		$month = get_the_date('n');
		$title = (blockchain_check_string($show_title)) ? get_the_title() : '';
		$id = get_the_ID();
		$url = get_the_permalink($id);
		$excerpt = get_the_excerpt($id);

		$image_id = get_post_thumbnail_id($id);

		$image = wpb_getImageBySize( array(
			'attach_id'  => get_post_thumbnail_id($id),
			'thumb_size' => $image_size,
		) );
		$image = $image['thumbnail'];

		$key = $year . '__' . $month;

		if (empty($posts[$key])) $posts[$key] = array();

		if (empty($dates[$key])) $dates[$key] = array(
			'month' => get_the_date('F'),
			'year'  => get_the_date('Y'),
		);

		$posts[$key][] = array(
			'id'      => $id,
			'title'   => $title,
			'image'   => $image,
			'icon'    => $icon,
			'year'    => (blockchain_check_string($show_year)) ? $year : '',
			'excerpt' => $excerpt,
			'url'     => $url
		);
	}

	wp_reset_postdata();
}

if (!empty($posts)): ?>

	<div class="<?php echo esc_attr(implode(' ', $classes)); ?>">
		<?php $counter = 0;
		foreach ($posts as $date => $post_data):
			if (empty($dates[$date])) continue;
			$counter++;
			$bg_image = '';
			?>
			<div class="stm_posttimeline__single heading_font">

				<div class="stm_posttimeline__posts">
					<?php foreach ($post_data as $post):
						if(!empty($post['image'])) $bg_image = $post['image'];
						?>
						<div  class="stm_posttimeline__post no_deco">
							<div class="stm_posttimeline__post_inner">
                                <?php if(!blockchain_check_string($show_link)): ?>
								    <span class="mtc"><?php echo sanitize_text_field($post['title']); ?></span>
                                <?php else: ?>
                                    <a href="<?php echo esc_url($post['url']); ?>"
                                       title="<?php echo sanitize_text_field($post['title']); ?>"
                                       class="mtc stm_post_title">
                                        <?php echo sanitize_text_field($post['title']); ?>
                                    </a>
                                <?php endif; ?>
								<?php echo sanitize_text_field($post['excerpt']); ?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>

				<?php
				if(!empty($bg_image)) {
					$bg_image = "style='background-image:url(\"{$bg_image}\")'";
				}
				?>

				<div class="stm_posttimeline__icon tbc" <?php echo sanitize_text_field($bg_image); ?>>
					<?php if ($counter == count($posts)): ?>
						<svg width="80px" height="150px" viewBox="0 0 200 300">
							<line x1="100" x2="100"
								  y1="40" y2="9999"
								  stroke="#fff"
								  stroke-width="15"
								  stroke-linecap="round"
								  stroke-dasharray="1, 50"/>
						</svg>
					<?php endif; ?>
					<?php if(empty($bg_image)): ?>
						<i class="<?php echo esc_attr($post['icon']); ?>"></i>
					<?php endif; ?>
				</div>

				<div class="stm_posttimeline__date">
					<div class="stm_posttimeline__date_inner">
						<span class="month"><?php echo esc_attr($dates[$date]['month']); ?></span>
						<span class="year"><?php echo esc_attr($dates[$date]['year']); ?></span>
					</div>
				</div>

			</div>
		<?php endforeach; ?>
	</div>
<?php endif;