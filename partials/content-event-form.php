<?php
$stm_event_count = get_post_meta(get_the_ID(), 'stm_event_count', true);
$event_attended = get_post_meta(get_the_ID(), 'event_attended', true);
if ($event_attended == '') {
	$event_attended = 0;
}
?>

    <div class="event-members-box-table bordered">
        <div class="event-members-box-table-row text-right">
			<?php
			// Date
			$stm_event_date_start = get_post_meta(get_the_ID(), 'stm_event_date_start', true);
			$stm_event_date_end = get_post_meta(get_the_ID(), 'stm_event_date_end', true);

			// Date Format
			if (!empty($stm_event_date_start) and !empty($stm_event_date_end)) {
				$event_month_start = date_i18n('n', $stm_event_date_start);
				$event_month_end = date_i18n('n', $stm_event_date_end);
				$event_day_start = date_i18n('j', $stm_event_date_start);
				$event_day_end = date_i18n('j', $stm_event_date_end);
				$event_year_start = date_i18n('Y', $stm_event_date_end);
				$event_year_end = date_i18n('Y', $stm_event_date_end);
			}

			// Time - Number
			$stm_event_time_end = get_post_meta(get_the_ID(), 'stm_event_time_end', true);
			$stm_event_time_start = get_post_meta(get_the_ID(), 'stm_event_time_start', true);

			// Venue
			$stm_event_venue = get_post_meta(get_the_ID(), 'stm_event_venue', true);


			stm_display_event_calendar();
			?>


            <div class="event_joining_count_box">
				<?php
				$stm_event_date_end = get_post_meta(get_the_ID(), 'stm_event_date_end', true);
				$today = date("Ymd");
				?>
				<?php if (date_i18n('Ymd', $stm_event_date_end) < $today) : ?>
                    <div class="event_joining">
                    <span class="vc_general disabled vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-outline vc_btn3-color-theme_style_4">
                        <?php esc_html_e('past event', 'crypterio'); ?>
                    </span>
                    </div>
				<?php elseif ($event_attended < $stm_event_count || $stm_event_count == '') : ?>
                    <div class="event_joining">
                        <a href="#event-form-box"
                           class="vc_general scroll_to_event_form show_event_list_form vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-outline vc_btn3-color-theme_style_4">
							<?php esc_html_e('i am going', 'crypterio'); ?>
                        </a>
                    </div>
				<?php else : ?>
                    <div class="event_joining">
                <span class="vc_general disabled vc_btn3 vc_btn3-size-md vc_btn3-shape-square vc_btn3-style-outline vc_btn3-color-theme_style_4">
                    <?php esc_html_e('fully booked', 'crypterio'); ?>
                </span>
                    </div>
				<?php endif; ?>
                <div class="event_joining_count">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                    <span class="event-attended-count"><?php echo esc_html($event_attended); ?></span>
                </div>
            </div>
        </div>
    </div>

    <?php if(function_exists('stm_display_events_form')) {
		stm_display_events_form();
	} ?>


<?php if ($event_terms_conditions = get_theme_mod('event_terms_conditions', wp_kses(__("I agree with the all additional <a href='http://stylemixthemes.com/' target='_blank'>Terms and Conditions</a>", 'crypterio'), array('a' => array('href' => array(), 'target' => array()))))): ?>
	<?php wp_enqueue_script('stm_grecaptcha'); ?>
<?php endif; ?>