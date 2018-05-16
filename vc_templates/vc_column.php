<?php
if (!defined('ABSPATH')) {
	die('-1');
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_id
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$el_class = $el_id = $width = $css = $offset = $css_animation = '';
$output = '';
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);

$width = wpb_translateColumnWidthToSpan($width);
$width = vc_column_offset_class_merge($offset, $width);

$css_classes = array(
	$this->getExtraClass($el_class) . $this->getCSSAnimation($css_animation),
	'wpb_column',
	'vc_column_container',
	$width,
);

if (vc_shortcode_custom_css_has_property($css, array(
	'border',
	'background',
))) {
	$css_classes[] = 'vc_col-has-fill';
}

$wrapper_attributes = array();

$css_class = preg_replace('/\s+/', ' ', apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode(' ', array_filter($css_classes)), $this->settings['base'], $atts));
$wrapper_attributes[] = 'class="' . esc_attr(trim($css_class)) . '"';
if (!empty($el_id)) {
	$wrapper_attributes[] = 'id="' . esc_attr($el_id) . '"';
}
if (!empty($stretch)) {
	$wrapper_attributes[] = 'data-stretch="' . $stretch . '"';
}


?>

<div <?php echo implode(' ', $wrapper_attributes); ?>>
    <div class="vc_column-inner <?php echo esc_attr(trim(vc_shortcode_custom_css_class($css))); ?>">
        <div class="wpb_wrapper">
            <?php if(!empty($wave_pulse) and $wave_pulse == 'enable'): ?>
                <div class="stm_wave_pulse stm_wave_pulse_1"></div>
                <div class="stm_wave_pulse stm_wave_pulse_2"></div>
                <div class="stm_wave_pulse stm_wave_pulse_3"></div>
                <div class="stm_wave_pulse stm_wave_pulse_4"></div>
            <?php endif; ?>
			<?php echo wpb_js_remove_wpautop($content); ?>
        </div>
    </div>
</div>