<?php

if ( function_exists( 'vc_map' ) ) {
	$currencies = crypterio_get_cmc_data();
	$list = array();
	foreach ($currencies as $currency_key => $currency_val) {
		$list[] = array(
			'label' => $currency_key,
			'value' => $currency_val['name']
		) ;
	}

	vc_map(
		array(
			'name'     => esc_html__( 'Cryptocurrency converter', 'crypterio' ),
			'base'     => 'stm_crypto_converter',
			'category' => esc_html__('STM' , 'crypterio' ),
			'params'   => array(
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Title', 'crypterio'),
					'param_name' => 'title',
					'admin_label' => true
				),
				array(
					'type' => 'autocomplete',
					'heading'    => esc_html__( 'Select currency 1', 'crypterio' ),
					'param_name' => 'cur_name',
					'settings' => array(
						'sortable' => true,
						'min_length' => 1,
						'no_hide' => false,
						'unique_values' => true,
						'display_inline' => true,
						'values' => $list
					)
				),
				array(
					'type' => 'autocomplete',
					'heading'    => esc_html__( 'Select currency 2', 'crypterio' ),
					'param_name' => 'cur_name_2',
					'settings' => array(
						'sortable' => true,
						'min_length' => 1,
						'no_hide' => false,
						'unique_values' => true,
						'display_inline' => true,
						'values' => $list
					)
				)
			)
		)
	);

	class WPBakeryShortCode_Stm_Crypto_Converter extends WPBakeryShortCode {
	}
}