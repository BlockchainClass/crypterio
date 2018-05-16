<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

wp_enqueue_script('flipclock');
wp_enqueue_style('flipclock');

$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '));

$attributes = '';
if (!empty($ico_bg_image)) {
	$ico_bg_image = crypterio_get_image_url($ico_bg_image);
	$attributes = "style='background-image: url(\"{$ico_bg_image}\")'";
}

$link = vc_build_link($link);
if (empty($link['target'])) {
	$link['target'] = '_self';
}

if (!empty($custom_links)) {
	$custom_links = vc_value_from_safe($custom_links);
	$custom_links = explode(',', $custom_links);
}

if (!empty($payments)) $payments = explode(',', $payments);

?>

<div class="stm_ico_countdown <?php echo esc_attr($css_class); ?>">
    <div class="stm_ico_countdown__bg" <?php echo sanitize_text_field($attributes); ?>></div>
	<?php if (!empty($title)): ?>
        <h4 class="stm_ico_countdown__title text-center">
			<?php echo esc_attr($title); ?>
        </h4>
	<?php endif; ?>

	<?php if (!empty($countdown)):
		$count = rand(0, 999999);
		?>
        <div class="countdown_box">
            <div class="clock" id="countdown_<?php echo esc_attr($count); ?>"></div>

			<?php
			$seconds_left = intval(strtotime($countdown) - strtotime(current_time('mysql')));
			$max_time = 8553600;
			if ($seconds_left > $max_time) $seconds_left = $max_time;
			?>

            <script type="text/javascript">
                var clock;

                jQuery(document).ready(function () {
                    var $ = jQuery;
                    var clock;

                    clock = $('#countdown_<?php echo esc_attr($count); ?>').FlipClock({
                        clockFace: 'DailyCounter',
                    });

                    clock.setTime(<?php echo esc_js($seconds_left); ?>);
                    clock.setCountdown(true);
                    clock.start();

                });
            </script>
        </div>
	<?php endif; ?>

	<?php if (!empty($link['url']) and !empty($link['title'])): ?>
        <a href="<?php echo esc_url($link['url']) ?>"
           target="<?php echo esc_attr($link['target']) ?>"
           class="stm_ico_countdown__button stm_ico_countdown__button__popup"
           title="<?php echo esc_attr($link['title']) ?>">
			<?php echo esc_attr($link['title']) ?>
        </a>
	<?php endif; ?>

	<?php if (!empty($price_1) or !empty($price_2)): ?>
        <div class="stm_ico_countdown__prices">
			<?php if (!empty($price_1)): ?>
                <div class="stm_ico_countdown__price stm_ico_countdown__price_1">
                    <h4><?php echo esc_attr($price_1); ?></h4>
					<?php if (!empty($price_label_1)): ?>
                        <span><?php echo esc_attr($price_label_1); ?></span>
					<?php endif; ?>
                </div>
			<?php endif; ?>
			<?php if (!empty($price_2)): ?>
                <div class="stm_ico_countdown__price stm_ico_countdown__price_2">
                    <h4><?php echo esc_attr($price_2); ?></h4>
					<?php if (!empty($price_label_2)): ?>
                        <span><?php echo esc_attr($price_label_2); ?></span>
					<?php endif; ?>
                </div>
			<?php endif; ?>
        </div>
	<?php endif; ?>

	<?php if (!empty($hardcap) and !empty($price_num)):
		$current_procent = round(($price_num * 100) / $hardcap, 2);
		$current_style = "style='width: {$current_procent}%'";
		?>
        <div class="stm_ico_countdown__progress">
            <div class="inner">
				<?php if (!empty($softcap) or !empty($softcap_label)):
					$softcap_procent = round(($softcap * 100) / $hardcap, 2);
					$softcap_style = "style='left: {$softcap_procent}%'";
					$left_time = '';
					if (!empty($softcap_countdown)) {
						$softcap_date = new DateTime($softcap_countdown);
						$now = new DateTime();
						$interval = $now->diff($softcap_date);
						if ($interval->format('%R') !== '-') {
							if ($interval->days > 1) {
								$left_time = sprintf(esc_html__('in %s days', 'crypterio'), $interval->days);
							} elseif ($interval->h > 0) {
								$left_time = sprintf(esc_html__('in just %s hours', 'crypterio'), $interval->h);
							}
						}
					}
					?>
                    <div class="stm_ico_countdown__softcap" <?php echo sanitize_text_field($softcap_style); ?>>
                        <div class="stm_ico_countdown__softcap_label">
							<?php echo sanitize_text_field($softcap_label); ?>
                        </div>
                        <div class="stm_ico_countdown__progress_holder"></div>
                        <div class="stm_ico_countdown__softcap_label_2">
							<?php echo sanitize_text_field($softcap_label_2); ?>
							<?php if (!empty($left_time)): ?>
                                <span><?php echo sanitize_text_field($left_time); ?></span>
							<?php endif; ?>
                        </div>
                    </div>

				<?php endif; ?>
                <div class="stm_ico_countdown__progress_bar">
                    <div class="stm_ico_countdown__progress_completed" <?php echo sanitize_text_field($current_style); ?>></div>
                </div>
				<?php if (!empty($hardcap) or !empty($hardcap_label)): ?>
                    <div class="stm_ico_countdown__hardcap">
                        <div class="stm_ico_countdown__hardcap_label">
							<?php echo sanitize_text_field($hardcap_label); ?>
                        </div>
                        <div class="stm_ico_countdown__progress_holder"></div>
                        <div class="stm_ico_countdown__hardcap_label_2">
							<?php echo sanitize_text_field($hardcap_label_2); ?>
                        </div>
                    </div>
				<?php endif; ?>
            </div>
        </div>
	<?php endif; ?>

	<?php if (!empty($payments) and !empty($custom_links)): ?>
        <div class="stm_ico_countdown__payments">
			<?php foreach ($payments as $key => $payment):
				$post_thumbnail = wpb_getImageBySize(array(
					'attach_id'  => $payment,
					'thumb_size' => '58x33',
				));
				$post_thumbnail = $post_thumbnail['thumbnail'];
				$href = (!empty($custom_links[$key])) ? $custom_links[$key] : '#';
				?>
                <a href="<?php echo esc_url($href); ?>" target="_blank" class="stm_ico_countdown__payment">
					<?php echo html_entity_decode($post_thumbnail); ?>
                </a>
			<?php endforeach; ?>
        </div>
	<?php endif; ?>

	<?php if (!empty($show_popup) and $show_popup == 'show'):
		$popup_link = vc_build_link($popup_link);
		if (empty($popup_link['target'])) {
			$popup_link['target'] = '_self';
		}

		?>
        <div class="stm_ico_countdown__popup_overlay"></div>
        <div class="stm_ico_countdown__popup">
            <div class="stm_ico_countdown__popup_inner">
                <div class="stm_ico_countdown__popup_close"></div>
				<?php if (!empty($popup_title)): ?>
                    <div class="stm_ico_countdown__popup_title h3">
						<?php echo sanitize_text_field($popup_title); ?>
                    </div>
				<?php endif; ?>
				<?php if (!empty($popup_address)): ?>
                    <div class="stm_ico_countdown__popup_address h5">
						<?php echo sanitize_text_field($popup_address); ?>
                    </div>
				<?php endif; ?>
				<?php if (!empty($popup_desc)): ?>
                    <p class="stm_ico_countdown__popup_desc">
						<?php echo sanitize_text_field($popup_desc); ?>
                    </p>
				<?php endif; ?>

                <div class="row">
                    <div class="col-md-6">
                        <a href="#"
                           class="stm_ico_countdown__button stm_ico_countdown__button_copy"
                           onclick="stmCopyToClipboard('.stm_ico_countdown__popup_address')">
							<?php esc_html_e('Copy address', 'crypterio'); ?>
                        </a>
                    </div>
                    <div class="col-md-6">
						<?php if (!empty($popup_link['url']) and !empty($popup_link['title'])): ?>
                            <a href="<?php echo esc_url($popup_link['url']) ?>"
                               target="<?php echo esc_attr($popup_link['target']) ?>"
                               class="stm_ico_countdown__button"
                               title="<?php echo esc_attr($popup_link['title']) ?>">
								<?php echo esc_attr($popup_link['title']) ?>
                            </a>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                var $ = jQuery;
                var selectors = '.stm_ico_countdown__popup, .stm_ico_countdown__popup_overlay';
                var closers = '.stm_ico_countdown__popup_close, .stm_ico_countdown__popup_overlay';
                $('.stm_ico_countdown__button__popup').on('click', function (e) {
                    e.preventDefault();
                    $(selectors).addClass('active');
                });
                $(closers).on('click', function () {
                    $(selectors).removeClass('active');
                });
            });
        </script>
	<?php endif; ?>

</div>