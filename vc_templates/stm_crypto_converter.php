<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if(!empty($cur_name) or !empty($cur_name_2)) :

	if($cur_name) $cur_name = crypterio_get_crypto_data($cur_name);
	if($cur_name_2) $cur_name_2 = crypterio_get_crypto_data($cur_name_2);

	$short_code = '[vcw-converter ';
	if($cur_name) $short_code .= 'symbol1="'.$cur_name['symbol'].'" ';
	if($cur_name_2) $short_code .= 'symbol2="'.$cur_name_2['symbol'].'"';
	$short_code .= ']';
	?>

	<div class="stm_crypto_converter">
		<?php if(!empty($title)): ?>
			<h3><?php echo sanitize_text_field($title); ?></h3>
		<?php endif; ?>
		<?php echo do_shortcode($short_code); ?>
	</div>

<?php endif;