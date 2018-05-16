<?php
$atts = vc_map_get_attributes($this->getShortcode(), $atts);
extract($atts);
$css_class = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($css, ' '));
wp_enqueue_script('stm_moment', get_template_directory_uri() . '/assets/js/moment.js');

wp_enqueue_script('chartjs', get_template_directory_uri() . '/assets/js/chartjs.js');
wp_enqueue_script('stm_crypto_chart', get_template_directory_uri() . '/assets/js/vc/crypto_chart.js');


$classes = array(
    'stm_crypto_chart'
);
$all_currencies = crypterio_get_cmc_data();
$current_currency = $all_currencies[$cur_names];
$colors = array(
    'btc' => array(
        'fill' => !empty($btc_fill_color) ? $btc_fill_color : 'rgba(0,0,0,0)',
        'border' => $btc_border_color
    ),
    'usd' => array(
        'fill' => !empty($usd_fill_color) ? $usd_fill_color : 'rgba(0,0,0,0)',
        'border' => $usd_border_color
    )
);
$decimals = array(
    'btc' => $btc_decimals,
    'usd' => $usd_decimals
);
$inverted = !empty($inverse);
if ($inverted) {
    $classes[] = 'contrast';
}
?>

<div class="<?php echo implode(' ', $classes); ?>"
     data-id="<?php echo esc_attr($current_currency['id']); ?>"
     data-symbol="<?php echo esc_attr($current_currency['symbol']); ?>"
     data-colors="<?php echo esc_attr(json_encode($colors)); ?>"
     data-cache-expiration="<?php echo esc_attr($transient); ?>"
     data-decimals="<?php echo esc_attr(json_encode($decimals)); ?>"
     data-period="<?php echo esc_attr($period); ?>"
     data-contrast="<?php echo esc_attr(json_encode($inverted)); ?>"
     data-name="<?php echo esc_attr($current_currency['name']); ?>">
    <div class="stm_crypto_chart__legend">
        <?php echo wp_kses_post($current_currency['name']); ?>
    </div>

    <canvas width="1200" height="<?php echo intval($height); ?>"></canvas>
</div>