<?php

add_action('init', 'crypterio_moduleVC_pricing_table');

function crypterio_moduleVC_pricing_table()
{
	vc_map(array(
		'name'   => esc_html__('Crypterio Pricing Tables', 'crypterio'),
		'base'   => 'stm_pricing_tables',
		'icon'   => 'stm_icon_box',
		'description' => esc_html__('Table with prices', 'crypterio'),
		'category' =>array(
			esc_html__('Content', 'crypterio'),
		),
		'params' => array(
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Title', 'crypterio'),
				'param_name' => 'title'
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Prefix', 'crypterio'),
				'param_name' => 'price_prefix'
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Price', 'crypterio'),
				'param_name' => 'price'
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Separator', 'crypterio'),
				'param_name' => 'price_separator'
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Postfix', 'crypterio'),
				'param_name' => 'price_postfix'
			),
			array(
				'type'       => 'vc_link',
				'heading'    => esc_html__('Button', 'crypterio'),
				'param_name' => 'button'
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Label Text', 'crypterio'),
				'param_name' => 'label_text'
			),
			array(
				'type'       => 'textarea_html',
				'heading'    => esc_html__('Text', 'crypterio'),
				'param_name' => 'content'
			),
			vc_map_add_css_animation(),
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__('Css', 'crypterio'),
				'param_name' => 'css',
				'group'      => esc_html__('Design options', 'crypterio')
			)
		)
	));
}

if (class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_Stm_Pricing_Tables extends WPBakeryShortCode
	{
	}
}