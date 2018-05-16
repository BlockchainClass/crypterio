<?php

$crypterio_config = crypterio_config();

if (function_exists('vc_set_default_editor_post_types')) {
	vc_set_default_editor_post_types(array(
		'page',
		'post',
		'stm_vc_sidebar',
		'stm_careers',
		'stm_service',
		'stm_staff',
		'stm_works',
		'stm_event',
		'stm_portfolio',
	));
}

add_action('vc_before_init', 'crypterio_vc_set_as_theme');

if (!function_exists('crypterio_vc_set_as_theme')) {
	function crypterio_vc_set_as_theme()
	{
		vc_set_as_theme(true);
	}

	if (function_exists('vc_add_params')) {

		vc_add_params('vc_btn',
			array(
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__('Show content in lightbox', 'pearl'),
					'param_name' => 'stm_popup_iframe',
				),
			)
		);
	}
}

if (is_admin()) {
	if (!function_exists('crypterio_vc_remove_teaser_metabox')) {
		function crypterio_vc_remove_teaser_metabox()
		{
			$post_types = get_post_types('', 'names');
			foreach ($post_types as $post_type) {
				remove_meta_box('vc_teaser', $post_type, 'side');
			}
		}

		add_action('do_meta_boxes', 'crypterio_vc_remove_teaser_metabox');
	}
}

if (!function_exists('crypterio_vc_google_fonts')) {
	function crypterio_vc_google_fonts($fonts)
	{
		$fonts[] = (object)array(
			'font_family' => 'Poppins',
			'font_styles' => '300,regular,500,600,700',
			'font_types'  => '300 light:300:normal,400 regular:400:normal,500 medium:500:normal,600 semi-bold:600:normal,700 bold:700:normal'
		);
		return $fonts;
	}
}

add_filter('vc_google_fonts_get_fonts_filter', 'crypterio_vc_google_fonts', 10, 1);

add_action('vc_after_init', 'crypterio_update_existing_shortcode');

if (!function_exists('crypterio_update_existing_shortcode')) {
	function crypterio_update_existing_shortcode()
	{
		if (function_exists('vc_add_params')) {
			vc_add_params('vc_column', array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Stretch column', 'crypterio'),
					'param_name' => 'stretch',
					'value'      => array(
						__('Default', 'crypterio')                  => '',
						__('Stretch out to the left', 'crypterio')  => 'left',
						__('Stretch out to the right', 'crypterio') => 'right',
					),
					'std'        => '',
					'weight'     => 1
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Enable wave pulse', 'crypterio'),
					'param_name' => 'wave_pulse',
					'value'      => array(
						__('Disable', 'crypterio') => 'disable',
						__('Enable', 'crypterio')  => 'enable',
					),
					'std'        => 'disable',
					'weight'     => 1
				)
			));
		}
	}
}

add_action('admin_init', 'crypterio_update_existing_shortcodes');

if (!function_exists('crypterio_update_existing_shortcodes')) {
	function crypterio_update_existing_shortcodes()
	{

		if (function_exists('vc_add_params')) {

			vc_add_params('vc_gallery', array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Gallery type', 'crypterio'),
					'param_name' => 'type',
					'value'      => array(
						__('Image grid', 'crypterio')     => 'image_grid',
						__('Slick slider', 'crypterio')   => 'slick_slider',
						__('Slick slider 2', 'crypterio') => 'slick_slider_2',
						__('Image full', 'crypterio')     => 'image_full'
					)
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Thumbnail size', 'crypterio'),
					'param_name' => 'thumbnail_size',
					'dependency' => array(
						'element' => 'type',
						'value'   => array('slick_slider_2')
					),
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			));

			vc_add_params('vc_cta', array(
				array(
					'type'       => 'checkbox',
					'heading'    => __('Particles background', 'crypterio'),
					'param_name' => 'particles',
					'value'      => array(
						esc_html__('Yes', 'crypterio') => 'yes'
					),
				),
			));

			vc_add_params('vc_row', array(
				array(
					'type'       => 'checkbox',
					'heading'    => __('Particles background', 'crypterio'),
					'param_name' => 'particles',
					'value'      => array(
						esc_html__('Yes', 'crypterio') => 'yes'
					),
				),
			));

			vc_add_params('vc_column_inner', array(
				array(
					'type'        => 'column_offset',
					'heading'     => esc_html__('Responsiveness', 'crypterio'),
					'param_name'  => 'offset',
					'group'       => esc_html__('Width & Responsiveness', 'crypterio'),
					'description' => esc_html__('Adjust column for different screen sizes. Control width, offset and visibility settings.', 'crypterio')
				)
			));

			vc_add_params('vc_separator', array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Type', 'crypterio'),
					'param_name' => 'type',
					'value'      => array(
						esc_html__('Type 1', 'crypterio') => 'type_1',
						esc_html__('Type 2', 'crypterio') => 'type_2'
					)
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				),
			));

			vc_add_params('vc_video', array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Style', 'crypterio'),
					'param_name' => 'style',
					'value'      => array(
						esc_html__('Style 1', 'crypterio') => 'style_1',
						esc_html__('Style 2', 'crypterio') => 'style_2'
					),
					'std'        => 'style_1'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Subtitle', 'crypterio'),
					'param_name' => 'subtitle',
					'dependency' => array(
						'element' => 'style',
						'value'   => array('style_2'),
					),
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Video Width', 'crypterio'),
					'param_name' => 'size',
					'dependency' => array(
						'element' => 'style',
						'value'   => array('style_1'),
					),
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Video Height', 'crypterio'),
					'param_name' => 'height_size',
					'dependency' => array(
						'element' => 'style',
						'value'   => array('style_1'),
					),
				),
				array(
					'type'       => 'attach_image',
					'heading'    => esc_html__('Preview Image', 'crypterio'),
					'param_name' => 'image',
					'dependency' => array(
						'element' => 'style',
						'value'   => array('style_1'),
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Image Size', 'crypterio'),
					'param_name'  => 'img_size',
					'description' => esc_html__('Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "projects_gallery" size.', 'crypterio'),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array('style_1'),
					),
				),
			));

			vc_add_params('vc_wp_pages', array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			));

			vc_add_params('vc_custom_heading', array(
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__('Icon', 'crypterio'),
					'param_name' => 'icon',
					'value'      => '',
					'weight'     => 1
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Icon Size (px)', 'crypterio'),
					'param_name' => 'icon_size',
					'value'      => '',
					'weight'     => 1
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Icon - Position', 'crypterio'),
					'param_name' => 'icon_pos',
					'value'      => array(
						esc_html__('Left', 'crypterio')   => '',
						esc_html__('Right', 'crypterio')  => 'right',
						esc_html__('Top', 'crypterio')    => 'top',
						esc_html__('Bottom', 'crypterio') => 'bottom'
					),
					'weight'     => 1
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__('Subtitle', 'crypterio'),
					'param_name' => 'subtitle',
					'weight'     => 1
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__('Subtitle - Color', 'crypterio'),
					'param_name' => 'subtitle_color',
					'weight'     => 1
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Stripe - Position', 'crypterio'),
					'param_name' => 'stripe_pos',
					'value'      => array(
						esc_html__('Bottom', 'crypterio')                     => 'bottom',
						esc_html__('Top', 'crypterio')                        => 'top',
						esc_html__('Between Title and Subtitle', 'crypterio') => 'between',
						esc_html__('Hide', 'crypterio')                       => 'hide'
					),
					'weight'     => 1,
					'std'        => 'hide'
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Font weight', 'crypterio'),
					'param_name' => 'stm_title_font_weight',
					'value'      => array(
						esc_html__('Select', 'crypterio')    => '',
						esc_html__('Thin', 'crypterio')      => 100,
						esc_html__('Light', 'crypterio')     => 300,
						esc_html__('Regular', 'crypterio')   => 400,
						esc_html__('Medium', 'crypterio')    => 500,
						esc_html__('Semi-bold', 'crypterio') => 600,
						esc_html__('Bold', 'crypterio')      => 700,
						esc_html__('Black', 'crypterio')     => 900
					),
					'weight'     => 1
				)
			));

			vc_add_params('vc_basic_grid', array(
				array(
					'type'             => 'dropdown',
					'heading'          => esc_html__('Gap', 'crypterio'),
					'param_name'       => 'gap',
					'value'            => array(
						esc_html__('0px', 'crypterio')  => '0',
						esc_html__('1px', 'crypterio')  => '1',
						esc_html__('2px', 'crypterio')  => '2',
						esc_html__('3px', 'crypterio')  => '3',
						esc_html__('4px', 'crypterio')  => '4',
						esc_html__('5px', 'crypterio')  => '5',
						esc_html__('10px', 'crypterio') => '10',
						esc_html__('15px', 'crypterio') => '15',
						esc_html__('20px', 'crypterio') => '20',
						esc_html__('25px', 'crypterio') => '25',
						esc_html__('30px', 'crypterio') => '30',
						esc_html__('35px', 'crypterio') => '35',
						esc_html__('40px', 'crypterio') => '40',
						esc_html__('45px', 'crypterio') => '45',
						esc_html__('50px', 'crypterio') => '50',
						esc_html__('55px', 'crypterio') => '55',
						esc_html__('60px', 'crypterio') => '60',
					),
					'std'              => '30',
					'description'      => esc_html__('Select gap between grid elements.', 'crypterio'),
					'edit_field_class' => 'vc_col-sm-6 vc_column',
				)
			));

			vc_add_params('vc_btn', array(
				array(
					'type'               => 'dropdown',
					'heading'            => esc_html__('Color', 'crypterio'),
					'param_name'         => 'color',
					'description'        => esc_html__('Select button color.', 'crypterio'),
					'param_holder_class' => 'vc_colored-dropdown vc_btn3-colored-dropdown',
					'value'              => array(
							esc_html__('Theme Style 1', 'crypterio')     => 'theme_style_1',
							esc_html__('Theme Style 2', 'crypterio')     => 'theme_style_2',
							esc_html__('Theme Style 3', 'crypterio')     => 'theme_style_3',
							esc_html__('Theme Style 4', 'crypterio')     => 'theme_style_4',
							esc_html__('Classic Link', 'crypterio')      => 'link',
							esc_html__('Classic Grey', 'crypterio')      => 'default',
							esc_html__('Classic Blue', 'crypterio')      => 'primary',
							esc_html__('Classic Turquoise', 'crypterio') => 'info',
							esc_html__('Classic Green', 'crypterio')     => 'success',
							esc_html__('Classic Orange', 'crypterio')    => 'warning',
							esc_html__('Classic Red', 'crypterio')       => 'danger',
							esc_html__('Classic Black', 'crypterio')     => 'inverse',
						) + getVcShared('colors-dashed'),
					'std'                => 'grey',
					'dependency'         => array(
						'element'            => 'style',
						'value_not_equal_to' => array('custom', 'outline-custom'),
					),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => __('Background On hover', 'crypterio'),
					'param_name'       => 'custom_background_on_hover',
					'description'      => __('Select custom background color for your element on hover.', 'crypterio'),
					'edit_field_class' => 'vc_col-sm-4',
					'dependency'       => array(
						'element' => 'style',
						'value'   => array('custom'),
					),
				),
				array(
					'type'             => 'colorpicker',
					'heading'          => __('Icon Color', 'crypterio'),
					'param_name'       => 'custom_icon_color',
					'description'      => __('Select custom color for icon.', 'crypterio'),
					'edit_field_class' => 'vc_col-sm-4',
					'dependency'       => array(
						'element' => 'style',
						'value'   => array('custom'),
					),
				),
			));

		}

	}
}

if (function_exists('vc_map')) {
	add_action('init', 'crypterio_vc_elements');
}

if (!function_exists('crypterio_vc_elements')) {
	function crypterio_vc_elements()
	{

		$project_categories_array = get_terms('project_category');
		$project_categories = array(
			esc_html__('All', 'crypterio') => 'all'
		);
		if ($project_categories_array && !is_wp_error($project_categories_array)) {
			foreach ($project_categories_array as $cat) {
				$project_categories[$cat->name] = $cat->slug;
			}
		}

		$testimonial_categories_array = get_terms('stm_testimonials_category');
		$testimonial_categories = array(
			esc_html__('All', 'crypterio') => 'all'
		);
		if ($testimonial_categories_array && !is_wp_error($testimonial_categories_array)) {
			foreach ($testimonial_categories_array as $cat) {
				$testimonial_categories[$cat->name] = $cat->slug;
			}
		}

		$staff_categories_array = get_terms('stm_staff_category');
		$staff_categories = array(
			esc_html__('All', 'crypterio') => 'all'
		);
		if ($staff_categories_array && !is_wp_error($staff_categories_array)) {
			foreach ($staff_categories_array as $cat) {
				$staff_categories[$cat->name] = $cat->slug;
			}
		}

		$event_categories_array = get_terms('stm_event_category');
		$event_categories = array(
			esc_html__('All', 'crypterio') => 'all'
		);
		if ($event_categories_array && !is_wp_error($event_categories_array)) {
			foreach ($event_categories_array as $cat) {
				$event_categories[$cat->name] = $cat->slug;
			}
		}

		$service_category_array = get_terms('stm_service_category');
		$service_category = array(
			esc_html__('All', 'crypterio') => 'all'
		);
		if ($service_category_array && !is_wp_error($service_category_array)) {
			foreach ($service_category_array as $cat) {
				$service_category[$cat->name] = $cat->slug;
			}
		}

		$portfolio_categories_array = get_terms('stm_portfolio_category');
		$portfolio_categories = array(
			esc_html__('All', 'crypterio') => 'all'
		);
		if ($portfolio_categories_array && !is_wp_error($portfolio_categories_array)) {
			foreach ($portfolio_categories_array as $cat) {
				$portfolio_categories[$cat->name] = $cat->slug;
			}
		}

		vc_map(array(
			'name'                    => esc_html__('Company History', 'crypterio'),
			'base'                    => 'stm_company_history',
			'as_parent'               => array('only' => 'stm_company_history_item'),
			'show_settings_on_create' => false,
			'category'                => esc_html__('STM', 'crypterio'),
			'params'                  => array(
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Title', 'crypterio'),
					'param_name' => 'title'
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			),
			'js_view'                 => 'VcColumnView'
		));

		vc_map(array(
			'name'     => esc_html__('Item', 'crypterio'),
			'base'     => 'stm_company_history_item',
			'as_child' => array('only' => 'stm_company_history'),
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Year', 'crypterio'),
					'param_name' => 'year'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Title', 'crypterio'),
					'param_name' => 'title'
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__('Description', 'crypterio'),
					'param_name' => 'description'
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Our Partner', 'crypterio'),
			'base'     => 'stm_partner',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Style', 'crypterio'),
					'param_name' => 'style',
					'value'      => array(
						esc_html__('Style 1', 'crypterio') => 'style_1',
						esc_html__('Style 2', 'crypterio') => 'style_2'
					),
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Title', 'crypterio'),
					'param_name' => 'title'
				),
				array(
					'type'       => 'attach_image',
					'heading'    => esc_html__('Logo', 'crypterio'),
					'param_name' => 'logo'
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__('Position', 'crypterio'),
					'param_name' => 'position',
					'dependency' => array(
						'element' => 'style',
						'value'   => array('style_2')
					)
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Image Size', 'crypterio'),
					'param_name'  => 'img_size',
					'description' => esc_html__('Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "default" size.', 'crypterio')
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__('Description', 'crypterio'),
					'param_name' => 'description'
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__('Link', 'crypterio'),
					'param_name' => 'link'
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Contacts', 'crypterio'),
			'base'     => 'stm_contacts_widget',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Style', 'crypterio'),
					'param_name' => 'style',
					'value'      => array(
						esc_html__('Style 1', 'crypterio') => 'style_1',
						esc_html__('Style 2', 'crypterio') => 'style_2',
						esc_html__('Style 3', 'crypterio') => 'style_3',
						esc_html__('Style 4', 'crypterio') => 'style_4'
					),
				),
				array(
					'type'       => 'textfield',
					'holder'     => 'div',
					'heading'    => esc_html__('Title', 'crypterio'),
					'param_name' => 'title',
					'dependency' => array('element' => 'style', 'value' => array('style_1', 'style_4'))
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__('Address', 'crypterio'),
					'param_name' => 'address',
					'dependency' => array('element' => 'style', 'value' => array('style_1', 'style_3', 'style_4'))
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Phone', 'crypterio'),
					'param_name' => 'phone',
					'dependency' => array('element' => 'style', 'value' => array('style_1', 'style_2', 'style_4'))
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Phone Two', 'crypterio'),
					'param_name' => 'phone_two',
					'dependency' => array('element' => 'style', 'value' => array('style_4'))
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Fax', 'crypterio'),
					'param_name' => 'fax',
					'dependency' => array('element' => 'style', 'value' => array('style_4'))
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__('Phone', 'crypterio'),
					'param_name' => 'phones',
					'dependency' => array('element' => 'style', 'value' => array('style_3'))
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Email', 'crypterio'),
					'param_name' => 'email'
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__('Schedule', 'crypterio'),
					'param_name' => 'schedule',
					'dependency' => array('element' => 'style', 'value' => array('style_3', 'style_4'))
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Facebook', 'crypterio'),
					'param_name' => 'facebook',
					'dependency' => array('element' => 'style', 'value' => array('style_1', 'style_4'))
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Twitter', 'crypterio'),
					'param_name' => 'twitter',
					'dependency' => array('element' => 'style', 'value' => array('style_1', 'style_4'))
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Linkedin', 'crypterio'),
					'param_name' => 'linkedin',
					'dependency' => array('element' => 'style', 'value' => array('style_1', 'style_4'))
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Google+', 'crypterio'),
					'param_name' => 'google_plus',
					'dependency' => array('element' => 'style', 'value' => array('style_1', 'style_4'))
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Skype', 'crypterio'),
					'param_name' => 'skype',
					'dependency' => array('element' => 'style', 'value' => array('style_1', 'style_4'))
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Extra class name', 'crypterio'),
					'param_name'  => 'class',
					'value'       => '',
					'description' => esc_html__('If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'crypterio')
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		$stm_info_box = array(
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'heading'    => esc_html__('Title', 'crypterio'),
				'param_name' => 'title'
			),
			array(
				'type'       => 'attach_image',
				'heading'    => esc_html__('Image', 'crypterio'),
				'param_name' => 'image',
				'dependency' => array(
					'element' => 'style',
					'value'   => array('style_1', 'style_2', 'style_3', 'style_4')
				)
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Image Size', 'crypterio'),
				'param_name'  => 'vc_image_size',
				'dependency'  => array(
					'element' => 'style',
					'value'   => array('style_1', 'style_2', 'style_3', 'style_4')
				),
				'description' => esc_html__('Example: Text - full, large, medium, Number - 340x200', 'crypterio'),
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Align Center', 'crypterio'),
				'param_name' => 'align_center',
				'value'      => array(
					esc_html__('Yes', 'crypterio') => 'yes'
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Style', 'crypterio'),
				'param_name' => 'style',
				'value'      => array(
					esc_html__('Style 1', 'crypterio') => 'style_1',
					esc_html__('Style 2', 'crypterio') => 'style_2',
					esc_html__('Style 3', 'crypterio') => 'style_3',
					esc_html__('Style 4', 'crypterio') => 'style_4',
					esc_html__('Style 5', 'crypterio') => 'style_5',
					esc_html__('Style 6', 'crypterio') => 'style_6'
				),
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__('Title Icon', 'crypterio'),
				'param_name' => 'title_icon',
				'value'      => '',
				'dependency' => array(
					'element' => 'style',
					'value'   => array('style_3', 'style_6')
				)
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Icon - Size', 'crypterio'),
				'param_name'  => 'title_icon_size',
				'description' => esc_html__('Enter icon size in "px"', 'crypterio'),
				'dependency'  => array(
					'element' => 'style',
					'value'   => array('style_6')
				)
			),
			array(
				'type'       => 'textarea_html',
				'heading'    => esc_html__('Text', 'crypterio'),
				'param_name' => 'content'
			),
			array(
				'type'       => 'vc_link',
				'heading'    => esc_html__('Link', 'crypterio'),
				'param_name' => 'link'
			),
			array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__('Link Icon', 'crypterio'),
				'param_name' => 'icon',
				'value'      => '',
				'dependency' => array(
					'element' => 'style',
					'value'   => array('style_1', 'style_2', 'style_3', 'style_5', 'style_6')
				)
			),
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__('Css', 'crypterio'),
				'param_name' => 'css',
				'group'      => esc_html__('Design options', 'crypterio')
			)
		);

		if (stm_check_layout('layout_15')) {
			$stm_info_box[] = array(
				'type'       => 'iconpicker',
				'heading'    => esc_html__('Icon', 'crypterio'),
				'param_name' => 'icon_l15',
				'value'      => '',
			);
		}

		vc_map(array(
			'name'     => esc_html__('Info Box', 'crypterio'),
			'base'     => 'stm_info_box',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => $stm_info_box
		));

		vc_map(array(
			'name'     => esc_html__('Icon Box', 'crypterio'),
			'base'     => 'stm_icon_box',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Style', 'crypterio'),
					'param_name' => 'box_style',
					'value'      => array(
						esc_html__('Style 1', 'crypterio') => 'style_1',
						esc_html__('Style 2', 'crypterio') => 'style_2',
						esc_html__('Style 3', 'crypterio') => 'style_3',
						esc_html__('Style 4', 'crypterio') => 'style_4'
					)
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Items align', 'crypterio'),
					'param_name' => 'item_align',
					'value'      => array(
						esc_html__('Left', 'crypterio')   => 'left',
						esc_html__('Center', 'crypterio') => 'center',
						esc_html__('Right', 'crypterio')  => 'right',
					)
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Alignment', 'crypterio'),
					'param_name' => 'alignment',
					'value'      => array(
						esc_html__('Left', 'crypterio')   => 'left',
						esc_html__('Right', 'crypterio')  => 'right',
						esc_html__('Center', 'crypterio') => 'center'
					),
					'dependency' => array('element' => 'box_style', 'value' => array('style_2', 'style_4'))
				),
				array(
					'type'       => 'textarea',
					'holder'     => 'div',
					'heading'    => esc_html__('Title', 'crypterio'),
					'param_name' => 'title',
					'dependency' => array('element' => 'box_style', 'value' => array('style_1', 'style_2', 'style_4'))
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title - Font size', 'crypterio'),
					'param_name'  => 'title_font_size',
					'description' => esc_html__('Enter font size in px', 'crypterio'),
					'dependency'  => array('element' => 'box_style', 'value' => array('style_1', 'style_2'))
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title - Line Height', 'crypterio'),
					'param_name'  => 'title_line_height',
					'description' => esc_html__('Enter line-height in px', 'crypterio'),
					'dependency'  => array('element' => 'box_style', 'value' => array('style_1', 'style_2'))
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Title - Color', 'crypterio'),
					'param_name' => 'title_color',
					'value'      => array(
						esc_html__('Base', 'crypterio')      => 'base',
						esc_html__('Secondary', 'crypterio') => 'secondary',
						esc_html__('Third', 'crypterio')     => 'third',
						esc_html__('Custom', 'crypterio')    => 'custom'
					),
					'dependency' => array('element' => 'box_style', 'value' => array('style_1', 'style_2', 'style_4'))
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__('Title - Color Custom', 'crypterio'),
					'param_name' => 'title_color_custom',
					'dependency' => array('element' => 'title_color', 'value' => 'custom')
				),
				array(
					'type'       => 'checkbox',
					'heading'    => '',
					'param_name' => 'hide_title_line',
					'value'      => array(
						esc_html__('Hide Title Line', 'crypterio') => 'hide_title_line'
					),
					'dependency' => array('element' => 'box_style', 'value' => array('style_1', 'style_2'))
				),
				array(
					'type'       => 'checkbox',
					'heading'    => '',
					'param_name' => 'enable_hexagon',
					'value'      => array(
						esc_html__('Enable Hexagon', 'crypterio') => 'enable'
					),
					'dependency' => array('element' => 'box_style', 'value' => 'style_1')
				),
				array(
					'type'       => 'checkbox',
					'heading'    => '',
					'param_name' => 'enable_hexagon_animation',
					'value'      => array(
						esc_html__('Enable Hexagon Hover Animation', 'crypterio') => 'enable'
					),
					'dependency' => array('element' => 'box_style', 'value' => 'style_1')
				),
				array(
					'type'       => 'checkbox',
					'heading'    => '',
					'param_name' => 'v_align_middle',
					'value'      => array(
						esc_html__('Vertical Middle Align', 'crypterio') => 'enable'
					),
					'dependency' => array('element' => 'box_style', 'value' => 'style_1')
				),
				array(
					'type'       => 'checkbox',
					'heading'    => '',
					'param_name' => 'add_link',
					'value'      => array(
						esc_html__('Add link', 'crypterio') => 'enable'
					)
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__('Button link', 'crypterio'),
					'param_name' => 'link',
					'dependency' => array('element' => 'add_link', 'value' => 'enable')
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__('Icon', 'crypterio'),
					'param_name' => 'icon',
					'value'      => ''
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Icon - Position', 'crypterio'),
					'param_name' => 'style',
					'value'      => array(
						esc_html__('Icon Top', 'crypterio')              => 'icon_top',
						esc_html__('Icon Top Transparent', 'crypterio')  => 'icon_top_transparent',
						esc_html__('Icon Left', 'crypterio')             => 'icon_left',
						esc_html__('Icon Left Transparent', 'crypterio') => 'icon_left_transparent'
					),
					'dependency' => array('element' => 'box_style', 'value' => 'style_1')
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Icon Size', 'crypterio'),
					'param_name'  => 'icon_size',
					'value'       => '65',
					'description' => esc_html__('Enter icon size in px', 'crypterio')
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Icon - Line Height', 'crypterio'),
					'param_name'  => 'icon_line_height',
					'description' => esc_html__('Enter line-height in px', 'crypterio'),
					'dependency'  => array('element' => 'box_style', 'value' => array('style_3', 'style_4'))
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Icon - Color', 'crypterio'),
					'param_name' => 'icon_color',
					'value'      => array(
						esc_html__('Default', 'crypterio')   => 'default',
						esc_html__('Base', 'crypterio')      => 'base',
						esc_html__('Secondary', 'crypterio') => 'secondary',
						esc_html__('Third', 'crypterio')     => 'third',
						esc_html__('Custom', 'crypterio')    => 'custom'
					)
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__('Icon - Color Custom', 'crypterio'),
					'param_name' => 'icon_color_custom',
					'dependency' => array('element' => 'icon_color', 'value' => 'custom')
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Icon - Background Color', 'crypterio'),
					'param_name' => 'icon_bg_color',
					'value'      => array(
						esc_html__('Base', 'crypterio')      => 'base_bg',
						esc_html__('Secondary', 'crypterio') => 'secondary_bg',
						esc_html__('Third', 'crypterio')     => 'third_bg',
						esc_html__('Custom', 'crypterio')    => 'custom',
						esc_html__('None', 'crypterio')      => 'none'
					),
					'dependency' => array('element' => 'box_style', 'value' => array('style_1'))
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__('Icon - Color Custom', 'crypterio'),
					'param_name' => 'icon_bg_color_custom',
					'dependency' => array('element' => 'icon_bg_color', 'value' => 'custom')
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Icon - Border Color', 'crypterio'),
					'param_name' => 'icon_border_color',
					'value'      => array(
						esc_html__('Base', 'crypterio')      => 'base',
						esc_html__('Secondary', 'crypterio') => 'secondary',
						esc_html__('Third', 'crypterio')     => 'third',
						esc_html__('Custom', 'crypterio')    => 'custom'
					),
					'dependency' => array('element' => 'box_style', 'value' => array('style_3'))
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__('Icon - Border Custom', 'crypterio'),
					'param_name' => 'icon_border_color_custom',
					'dependency' => array('element' => 'icon_border_color', 'value' => 'custom')
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Icon Height', 'crypterio'),
					'param_name'  => 'icon_height',
					'value'       => '65',
					'description' => esc_html__('Enter icon height in px', 'crypterio'),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array('icon_top', 'icon_top_transparent')
					)
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Icon Width', 'crypterio'),
					'param_name'  => 'icon_width',
					'value'       => '50',
					'description' => esc_html__('Enter icon width in px', 'crypterio'),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array('icon_left', 'icon_left_transparent')
					)
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Icon Wrapper Width', 'crypterio'),
					'param_name'  => 'icon_width_wr',
					'value'       => '',
					'description' => esc_html__('Enter icon wrapper width in px', 'crypterio'),
					'dependency'  => array(
						'element' => 'box_style',
						'value'   => array('style_2')
					)
				),
				array(
					'type'       => 'textarea_html',
					'heading'    => esc_html__('Text', 'crypterio'),
					'param_name' => 'content',
					'dependency' => array('element' => 'box_style', 'value' => array('style_1', 'style_3', 'style_4'))
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		$vc_stat_counter = array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Style', 'crypterio'),
				'param_name' => 'stat_counter_style',
				'value'      => array(
					esc_html__('Style 1', 'crypterio') => 'style_1',
					esc_html__('Style 2', 'crypterio') => 'style_2',
					esc_html__('Style 3', 'crypterio') => 'style_3'
				),
			),
			array(
				'type'       => 'textfield',
				'holder'     => 'div',
				'heading'    => esc_html__('Title', 'crypterio'),
				'param_name' => 'title',
				'dependency' => array('element' => 'stat_counter_style', 'value' => array('style_1', 'style_3'))
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Counter Value', 'crypterio'),
				'param_name' => 'counter_value',
				'value'      => '1000'
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Counter Value Prefix', 'crypterio'),
				'param_name' => 'counter_value_pre',
				'value'      => ''
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Counter Value Suffix', 'crypterio'),
				'param_name' => 'counter_value_suf',
				'value'      => ''
			),
			array(
				'type'       => 'textarea',
				'heading'    => esc_html__('Description', 'crypterio'),
				'param_name' => 'description',
				'weight'     => 1,
				'dependency' => array('element' => 'stat_counter_style', 'value' => array('style_2', 'style_3'))
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Duration', 'crypterio'),
				'param_name' => 'duration',
				'value'      => '2.5'
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Alignment', 'crypterio'),
				'param_name' => 'alignment',
				'value'      => array(
					esc_html__('Left', 'crypterio')   => 'left',
					esc_html__('Right', 'crypterio')  => 'right',
					esc_html__('Center', 'crypterio') => 'center'
				)
			),
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__('Css', 'crypterio'),
				'param_name' => 'css',
				'group'      => esc_html__('Design options', 'crypterio')
			)
		);

		if (stm_check_layout('layout_16')) {
			$vc_stat_counter[] = array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Style', 'crypterio'),
				'param_name' => 'stats_style',
				'value'      => array(
					esc_html__('Style 1', 'crypterio') => 'style_1',
					esc_html__('Style 2', 'crypterio') => 'style_2'
				),
			);
			$vc_stat_counter[] = array(
				'type'       => 'colorpicker',
				'heading'    => esc_html__('Color', 'crypterio'),
				'param_name' => 'color',
				'dependency' => array('element' => 'stats_style', 'value' => array('style_2'))
			);
		}

		vc_map(array(
			'name'     => esc_html__('Stats Counter', 'crypterio'),
			'base'     => 'stm_stats_counter',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => $vc_stat_counter
		));

		vc_map(array(
			'name'     => esc_html__('Testimonials', 'crypterio'),
			'base'     => 'stm_testimonials',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Count', 'crypterio'),
					'param_name' => 'count',
					'value'      => 1
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Testimonials Per Row', 'crypterio'),
					'param_name' => 'per_row',
					'value'      => array(
						1 => 1,
						2 => 2,
						3 => 3,
					),
					'dependency' => array('element' => 'style', 'value' => array('style_1', 'style_2'))
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Style', 'crypterio'),
					'param_name' => 'style',
					'value'      => array(
						esc_html__('Style 1', 'crypterio') => 'style_1',
						esc_html__('Style 2', 'crypterio') => 'style_2',
						esc_html__('Style 3', 'crypterio') => 'style_3'
					)
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Category', 'crypterio'),
					'param_name' => 'category',
					'value'      => $testimonial_categories
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Navigation', 'crypterio'),
					'param_name' => 'navigation_type',
					'value'      => array(
						esc_html__('Arrows', 'crypterio')  => 'arrows',
						esc_html__('Bullets', 'crypterio') => 'bullets'
					)
				),
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__('Slider autoplay', 'crypterio'),
					'param_name'  => 'autoplay',
					'description' => esc_html__('Enable autoplay mode.', 'crypterio'),
					'value'       => array(
						esc_html__('Yes', 'crypterio') => 'yes'
					),
					'group'       => esc_html__('Carousel', 'crypterio'),
					'dependency'  => array('element' => 'style', 'value' => 'style_3')
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Autoplay Timeout', 'crypterio'),
					'param_name'  => 'timeout',
					'value'       => '5000',
					'description' => esc_html__('Autoplay interval timeout (in ms).', 'crypterio'),
					'dependency'  => array(
						'element' => 'autoplay',
						'value'   => array('yes'),
					),
					'group'       => esc_html__('Carousel', 'crypterio'),
				),
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__('Slider loop', 'crypterio'),
					'param_name'  => 'loop',
					'description' => esc_html__('Enable slider loop mode.', 'crypterio'),
					'value'       => array(
						esc_html__('Yes', 'crypterio') => 'yes'
					),
					'group'       => esc_html__('Carousel', 'crypterio'),
					'dependency'  => array('element' => 'style', 'value' => 'style_3')
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Smart Speed', 'crypterio'),
					'param_name' => 'smart_speed',
					'value'      => '250',
					'group'      => esc_html__('Carousel', 'crypterio'),
					'dependency' => array('element' => 'style', 'value' => 'style_3')
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Spacing', 'crypterio'),
			'base'     => 'stm_spacing',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Large Screen', 'crypterio'),
					'admin_label' => true,
					'param_name'  => 'lg_spacing'
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Medium Screen', 'crypterio'),
					'admin_label' => true,
					'param_name'  => 'md_spacing'
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Small Screen', 'crypterio'),
					'admin_label' => true,
					'param_name'  => 'sm_spacing'
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Extra Small Screen', 'crypterio'),
					'admin_label' => true,
					'param_name'  => 'xs_spacing'
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Quote', 'crypterio'),
			'base'     => 'stm_quote',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__('Quote', 'crypterio'),
					'param_name' => 'quote'
				),
				array(
					'type'       => 'attach_image',
					'heading'    => esc_html__('Author Image', 'crypterio'),
					'param_name' => 'image'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Author Name', 'crypterio'),
					'param_name' => 'author_name'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Author Status', 'crypterio'),
					'param_name' => 'author_status'
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Box Color', 'crypterio'),
					'param_name' => 'box_color',
					'value'      => array(
						esc_html__('Base', 'crypterio')      => 'base',
						esc_html__('Secondary', 'crypterio') => 'secondary',
						esc_html__('Third', 'crypterio')     => 'third',
						esc_html__('Custom', 'crypterio')    => 'custom'
					)
				),
				array(
					'type'       => 'colorpicker',
					'heading'    => esc_html__('Title - Color Custom', 'crypterio'),
					'param_name' => 'box_color_custom',
					'dependency' => array('element' => 'box_color', 'value' => 'custom')
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Testimonials Carousel', 'crypterio'),
			'base'     => 'stm_testimonials_carousel',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Style', 'crypterio'),
					'param_name' => 'style',
					'value'      => array(
						esc_html__('Style 1', 'crypterio') => 'style_1',
						esc_html__('Style 2', 'crypterio') => 'style_2',
						esc_html__('Style 3', 'crypterio') => 'style_3'
					)
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Category', 'crypterio'),
					'param_name' => 'category',
					'value'      => $testimonial_categories
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Count', 'crypterio'),
					'param_name' => 'count',
					'value'      => 2
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Photo - Size', 'crypterio'),
					'param_name'  => 'thumb_size',
					'description' => esc_html__('Enter photo size 350x250', 'crypterio'),
					'value'       => '',
					'dependency'  => array('element' => 'style', 'value' => 'style_1')
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Testimonials Per Row', 'crypterio'),
					'param_name' => 'per_row',
					'value'      => array(
						1 => 1,
						2 => 2,
						3 => 3,
					)
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__('Carousel autoplay', 'crypterio'),
					'param_name' => 'autoplay_carousel',
					'value'      => array(
						esc_html__('Yes', 'crypterio') => 'yes'
					)
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__('Disable Carousel', 'crypterio'),
					'param_name' => 'disable_carousel',
					'value'      => array(
						esc_html__('Yes', 'crypterio') => 'yes'
					)
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__('Hide Carousel Arrows', 'crypterio'),
					'param_name' => 'disable_carousel_arrows',
					'value'      => array(
						esc_html__('Yes', 'crypterio') => 'yes'
					)
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__('Link', 'crypterio'),
					'param_name' => 'link'
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		if (stm_check_layout('layout_17')) {
			vc_map(array(
				'name'     => esc_html__('Testimonials Pager', 'crypterio'),
				'base'     => 'stm_testimonials_pager',
				'category' => esc_html__('STM', 'crypterio'),
				'params'   => array(
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Category', 'crypterio'),
						'param_name' => 'category',
						'value'      => $testimonial_categories
					),
					array(
						'type'       => 'dropdown',
						'heading'    => esc_html__('Count', 'crypterio'),
						'param_name' => 'count',
						'value'      => array(
							3 => 3,
							4 => 4,
						)
					),
					array(
						'type'       => 'css_editor',
						'heading'    => esc_html__('Css', 'crypterio'),
						'param_name' => 'css',
						'group'      => esc_html__('Design options', 'crypterio')
					)
				)
			));
		}

		vc_map(array(
			'name'     => esc_html__('Contact', 'crypterio'),
			'base'     => 'stm_contact',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Style', 'crypterio'),
					'param_name' => 'style',
					'value'      => array(
						esc_html__('Style 1', 'crypterio') => 'style_1',
						esc_html__('Style 2', 'crypterio') => 'style_2'
					),
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Name', 'crypterio'),
					'param_name' => 'name'
				),
				array(
					'type'       => 'attach_image',
					'heading'    => esc_html__('Image', 'crypterio'),
					'param_name' => 'image'
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Image Size', 'crypterio'),
					'param_name'  => 'image_size',
					'description' => esc_html__('Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "default" size.', 'crypterio')
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Job', 'crypterio'),
					'param_name' => 'job'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Phone', 'crypterio'),
					'param_name' => 'phone',
					'dependency' => array('element' => 'style', 'value' => array('style_2'))
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Phone Two', 'crypterio'),
					'param_name' => 'phone_two',
					'dependency' => array('element' => 'style', 'value' => array('style_2'))
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Email', 'crypterio'),
					'param_name' => 'email'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Skype', 'crypterio'),
					'param_name' => 'skype'
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		$stm_sidebars_array = get_posts(array('post_type' => 'stm_vc_sidebar', 'posts_per_page' => -1));
		$stm_sidebars = array(esc_html__('Select', 'crypterio') => 0);
		if ($stm_sidebars_array && !is_wp_error($stm_sidebars_array)) {
			foreach ($stm_sidebars_array as $val) {
				$stm_sidebars[get_the_title($val)] = $val->ID;
			}
		}

		vc_map(array(
			'name'     => esc_html__('STM Sidebar', 'crypterio'),
			'base'     => 'stm_sidebar',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Code', 'crypterio'),
					'param_name' => 'sidebar',
					'value'      => $stm_sidebars
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		vc_map(array(
			"name"      => esc_html__('Animation Block', 'crypterio'),
			"base"      => 'stm_animation_block',
			"class"     => 'animation_block',
			"as_parent" => array('except' => 'stm_animation_block'),
			"category"  => esc_html__('STM', 'crypterio'),
			"params"    => array(
				array(
					"type"       => "stm_animator",
					"class"      => "",
					"heading"    => esc_html__("Animation", 'crypterio'),
					"param_name" => "animation",
					"value"      => ""
				),
				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Animation Duration (s)", 'crypterio'),
					"param_name"  => "animation_duration",
					"value"       => 3,
					"description" => esc_html__("How long the animation effect should last. Decides the speed of effect.", 'crypterio'),
				),
				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Animation Delay (s)", 'crypterio'),
					"param_name"  => "animation_delay",
					"value"       => 0,
					"description" => esc_html__("Delays the animation effect for seconds you enter above.", 'crypterio'),
				),
				array(
					"type"        => "textfield",
					"heading"     => esc_html__("Viewport Position (%)", 'crypterio'),
					"param_name"  => "viewport_position",
					"value"       => "90",
					"description" => esc_html__("The area of screen from top where animation effects will start working.", 'crypterio'),
				)
			),
			"js_view"   => 'VcColumnView'
		));

		vc_map(array(
			'name'     => esc_html__('Image Carousel', 'crypterio'),
			'base'     => 'stm_image_carousel',
			'icon'     => 'stm_image_carousel',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'attach_images',
					'heading'    => esc_html__('Images', 'crypterio'),
					'param_name' => 'images'
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__('Enable Opacity', 'crypterio'),
					'param_name' => 'grayscale',
					'value'      => array(
						esc_html__('Yes', 'crypterio') => 'yes'
					)
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__('Centered Items', 'crypterio'),
					'param_name' => 'h_centered',
					'value'      => array(
						esc_html__('Yes', 'crypterio') => 'yes'
					)
				),
				array(
					'type'        => 'exploded_textarea_safe',
					'heading'     => __('Custom links', 'crypterio'),
					'param_name'  => 'custom_links',
					'description' => __('Enter links for each slide (Note: divide links with linebreaks (Enter)).', 'crypterio'),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Image size', 'crypterio'),
					'param_name'  => 'img_size',
					'value'       => 'thumbnail',
					'description' => esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use default size.', 'crypterio'),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Extra class name', 'crypterio'),
					'param_name'  => 'el_class',
					'description' => esc_html__('Style particular content element differently - add a class name and refer to it in custom CSS.', 'crypterio')
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Style', 'crypterio'),
					'param_name' => 'style',
					'value'      => array(
						esc_html__('Style 1', 'crypterio') => 'style_1',
						esc_html__('Style 2', 'crypterio') => 'style_2'
					),
					'group'      => esc_html__('Carousel', 'crypterio')
				),
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__('Slider autoplay', 'crypterio'),
					'param_name'  => 'autoplay',
					'description' => esc_html__('Enable autoplay mode.', 'crypterio'),
					'value'       => array(
						esc_html__('Yes', 'crypterio') => 'yes'
					),
					'group'       => esc_html__('Carousel', 'crypterio')
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Autoplay Timeout', 'crypterio'),
					'param_name'  => 'timeout',
					'value'       => '5000',
					'description' => esc_html__('Autoplay interval timeout (in ms).', 'crypterio'),
					'dependency'  => array(
						'element' => 'autoplay',
						'value'   => array('yes'),
					),
					'group'       => esc_html__('Carousel', 'crypterio'),
				),
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__('Slider loop', 'crypterio'),
					'param_name'  => 'loop',
					'description' => esc_html__('Enable slider loop mode.', 'crypterio'),
					'value'       => array(
						esc_html__('Yes', 'crypterio') => 'yes'
					),
					'group'       => esc_html__('Carousel', 'crypterio'),
				),
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__('Slider navigation', 'crypterio'),
					'param_name'  => 'nav',
					'description' => esc_html__('Enable previous and next arrows.', 'crypterio'),
					'value'       => array(
						esc_html__('Yes', 'crypterio') => 'yes'
					),
					'dependency'  => array(
						'element' => 'style',
						'value'   => array('style_2'),
					),
					'group'       => esc_html__('Carousel', 'crypterio'),
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Smart Speed', 'crypterio'),
					'param_name' => 'smart_speed',
					'value'      => '250',
					'group'      => esc_html__('Carousel', 'crypterio'),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Items', 'crypterio'),
					'param_name'  => 'items',
					'value'       => '6',
					'description' => esc_html__('The number of items you want to see on the screen.', 'crypterio'),
					'group'       => esc_html__('Carousel', 'crypterio'),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Items (Small Desktop)', 'crypterio'),
					'param_name'  => 'items_small_desktop',
					'value'       => '5',
					'description' => esc_html__('Number of items the carousel will display. Default: at <980px - 3 items.', 'crypterio'),
					'group'       => esc_html__('Carousel', 'crypterio'),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Items (Tablet)', 'crypterio'),
					'param_name'  => 'items_tablet',
					'value'       => '4',
					'description' => esc_html__('Number of items the carousel will display. Default: at <768px - 2 items.', 'crypterio'),
					'group'       => esc_html__('Carousel', 'crypterio'),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Items (Mobile)', 'crypterio'),
					'param_name'  => 'items_mobile',
					'value'       => '1',
					'description' => esc_html__('Number of items the carousel will display. Default: at <479px - 1 item.', 'crypterio'),
					'group'       => esc_html__('Carousel', 'crypterio'),
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		$news_map = array(
			array(
				'type'       => 'loop',
				'heading'    => esc_html__('Query', 'crypterio'),
				'param_name' => 'loop',
				'value'      => 'size:4|post_type:post',
				'settings'   => array(
					'size' => array('hidden' => false, 'value' => 4)
				),
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Posts Per Row', 'crypterio'),
				'param_name' => 'posts_per_row',
				'value'      => array(
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4
				),
				'std'        => 4
			),
			array(
				'type'       => 'checkbox',
				'param_name' => 'disable_preview_image',
				'value'      => array(
					esc_html__('Disable Preview Image', 'crypterio') => 'disable'
				)
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Image Size', 'crypterio'),
				'param_name'  => 'img_size',
				'description' => esc_html__('Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use default size.', 'crypterio')
			),
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__('Css', 'crypterio'),
				'param_name' => 'css',
				'group'      => esc_html__('Design options', 'crypterio')
			)
		);

		vc_map(array(
			'name'     => esc_html__('News', 'crypterio'),
			'base'     => 'stm_news',
			'icon'     => 'stm_news',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => $news_map
		));

		$crypterio_config = crypterio_config();

		vc_map(array(
			'name'     => esc_html__('Vacancies', 'crypterio'),
			'base'     => 'stm_vacancies',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css'
				)
			)
		));

		$vc_staff = array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Category', 'crypterio'),
				'param_name' => 'category',
				'value'      => $staff_categories
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Style', 'crypterio'),
				'param_name' => 'style',
				'value'      => array(
					esc_html__('List', 'crypterio')     => 'list',
					esc_html__('Grid', 'crypterio')     => 'grid',
					esc_html__('Carousel', 'crypterio') => 'carousel',
					esc_html__('Team', 'crypterio') => 'team',
					esc_html__('Advisors', 'crypterio') => 'advisors',
				)
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Grid View', 'crypterio'),
				'param_name' => 'grid_view',
				'value'      => array(
					esc_html__('Default', 'crypterio') => 'default',
					esc_html__('Short', 'crypterio')   => 'short'
				),
				'dependency' => array(
					'element' => 'style',
					'value'   => array('grid')
				)
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Staff Per Row', 'crypterio'),
				'param_name' => 'per_row',
				'value'      => array(
					2 => 2,
					3 => 3,
					4 => 4,
				),
				'dependency' => array(
					'element' => 'style',
					'value'   => array('grid')
				)
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Count', 'crypterio'),
				'param_name' => 'count',
				'value'      => 6
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Staff Per Row', 'crypterio'),
				'param_name' => 'slides_to_show',
				'value'      => array(
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
					5 => 5
				),
				'dependency' => array(
					'element' => 'style',
					'value'   => array('carousel')
				)
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Carousel - Show Arrows', 'crypterio'),
				'param_name' => 'carousel_arrows',
				'value'      => array(esc_html__('Yes', 'crypterio') => 'yes'),
				'std'        => 'yes',
				'dependency' => array(
					'element' => 'style',
					'value'   => array('carousel')
				)
			),
			array(
				'type'       => 'checkbox',
				'heading'    => esc_html__('Custom link in list', 'crypterio'),
				'param_name' => 'show_custom_link',
				'value'      => array(esc_html__('Yes', 'crypterio') => 'yes'),
				'std'        => 'yes',
				'dependency' => array(
					'element' => 'grid_view',
					'value'   => array('short')
				)
			),
			array(
				'type'       => 'vc_link',
				'heading'    => esc_html__('Link', 'crypterio'),
				'param_name' => 'link',
				'dependency' => array('element' => 'show_custom_link', 'value' => 'yes'),
				'group'      => esc_html__('Custom link', 'crypterio')
			),
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__('Subtitle', 'crypterio'),
				'param_name' => 'link_text',
				'weight'     => 1,
				'dependency' => array('element' => 'show_custom_link', 'value' => 'yes'),
				'group'      => esc_html__('Custom link', 'crypterio')
			),
			array(
				'type'       => 'css_editor',
				'heading'    => esc_html__('Css', 'crypterio'),
				'param_name' => 'css',
				'group'      => esc_html__('Design options', 'crypterio')
			)
		);

		vc_map(array(
			'name'     => esc_html__('Staff List', 'crypterio'),
			'base'     => 'stm_staff_list',
			'icon'     => 'stm_staff_list',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => $vc_staff
		));

		vc_map(array(
			'name'     => esc_html__('Details', 'crypterio'),
			'base'     => 'stm_post_details',
			'category' => esc_html__('STM Post Partials', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css'
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Bottom Info', 'crypterio'),
			'base'     => 'stm_post_bottom',
			'category' => esc_html__('STM Post Partials', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css'
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('About Author', 'crypterio'),
			'base'     => 'stm_post_about_author',
			'category' => esc_html__('STM Post Partials', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Comments', 'crypterio'),
			'base'     => 'stm_post_comments',
			'category' => esc_html__('STM Post Partials', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Events', 'crypterio'),
			'base'     => 'stm_events',
			'icon'     => 'stm_events',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Filter Events', 'crypterio'),
					'param_name' => 'events_filter',
					'value'      => array(
						esc_html__('Upcoming Events', 'crypterio') => 'upcoming',
						esc_html__('Past Events', 'crypterio')     => 'past',
						esc_html__('All Events', 'crypterio')      => 'all',
					),
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Category', 'crypterio'),
					'param_name' => 'category',
					'value'      => $event_categories
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Style', 'crypterio'),
					'param_name' => 'event_style',
					'value'      => array(
						esc_html__('Grid', 'crypterio')    => 'grid',
						esc_html__('Classic', 'crypterio') => 'classic',
						esc_html__('Modern', 'crypterio')  => 'modern',
						esc_html__('Widget', 'crypterio')  => 'widget',
						esc_html__('Tiles', 'crypterio')   => 'tiles',
					),
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Number Posts', 'crypterio'),
					'param_name' => 'posts_per_page',
					'value'      => 12
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Posts Per Row', 'crypterio'),
					'param_name' => 'posts_per_row',
					'dependency' => array(
						'element' => 'event_style',
						'value'   => array('grid')
					),
					'value'      => array(
						4 => 4,
						3 => 3,
						2 => 2,
						1 => 1
					),
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Image size', 'crypterio'),
					'param_name'  => 'img_size',
					'dependency'  => array(
						'element' => 'event_style',
						'value'   => array('grid', 'classic')
					),
					'value'       => '',
					'description' => esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use default size.', 'crypterio'),
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__('Show Pagination', 'crypterio'),
					'param_name' => 'pagination_enable',
					'dependency' => array(
						'element' => 'event_style',
						'value'   => array('grid', 'classic')
					),
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__('Show Load More Button', 'crypterio'),
					'param_name' => 'load_more_enable',
					'dependency' => array(
						'element' => 'event_style',
						'value'   => array('modern')
					),
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Events Information', 'crypterio'),
			'base'     => 'stm_events_information',
			'icon'     => 'stm_events',
			'category' => esc_html__('STM Post Partials', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Events Form Box', 'crypterio'),
			'base'     => 'stm_events_form',
			'icon'     => 'stm_events',
			'category' => esc_html__('STM Post Partials', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('(STM) Event Map', 'crypterio'),
			'base'     => 'stm_events_map',
			'category' => esc_html__('STM Post Partials', 'crypterio'),
			'params'   => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Map - Height', 'crypterio'),
					'param_name'  => 'map_height',
					'value'       => '290px',
					'description' => esc_html__('Enter map height in px', 'crypterio')
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Map - Zoom', 'crypterio'),
					'param_name'  => 'zoom',
					'description' => esc_html__('Enter map height in px', 'crypterio')
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				),
			)
		));

		vc_map(array(
			'name'                    => esc_html__('Event Lesson', 'crypterio'),
			'base'                    => 'stm_event_lesson',
			'category'                => esc_html__('STM', 'crypterio'),
			"as_parent"               => array('only' => 'stm_event_lessons'),
			"is_container"            => true,
			"content_element"         => true,
			"show_settings_on_create" => false,
			'params'                  => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Date Format', 'crypterio'),
					'param_name' => 'stm_event_lesson_date_format',
					'value'      => array(
						date('D, F j, Y') => 'D, F j, Y',
						date('F j, Y')    => 'F j, Y',
						date('Y-m-d')     => 'Y-m-d',
						date('m/d/Y')     => 'm/d/Y',
						date('d/m/Y')     => 'd/m/Y',
					)
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Time Format', 'crypterio'),
					'param_name' => 'stm_event_lesson_time_format',
					'value'      => array(
						date('g:i A') => 'g:i A',
						date('g:i a') => 'g:i a',
						date('H:i')   => 'H:i',
					)
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design Options', 'crypterio'),
				)
			),
			"js_view"                 => 'VcColumnView'
		));

		$speakers = get_posts(array(
			'posts_per_page' => -1,
			'post_type'      => 'stm_staff'
		));

		$speakers_data = array();

		if (!empty($speakers)) {
			foreach ($speakers as $speaker) {
				$speakers_data[] = array('label' => $speaker->post_title, 'value' => $speaker->ID);
			}
		}

		vc_map(array(
			"name"            => esc_html__('Event Lessons', 'crypterio'),
			"base"            => "stm_event_lessons",
			"content_element" => true,
			"as_child"        => array('only' => 'stm_event_lesson'),
			"params"          => array(
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Title', 'crypterio'),
					'param_name' => 'stm_event_lesson_title',
				),
				array(
					'type'       => 'stm_datepicker_vc',
					'heading'    => __('Date', 'crypterio'),
					'param_name' => 'datepicker',
					'holder'     => 'div'
				),
				array(
					'type'       => 'param_group',
					'heading'    => esc_html__('Lessons Info', 'crypterio'),
					'param_name' => 'heading',
					'value'      => urlencode(json_encode(array(
						array(
							'label' => esc_html__('Field 1', 'crypterio'),
							'value' => ''
						),
						array(
							'label' => esc_html__('Field 2', 'crypterio'),
							'value' => ''
						)
					))),
					'params'     => array(
						array(
							'type'       => 'stm_timepicker_vc',
							'heading'    => __('Time start', 'crypterio'),
							'param_name' => 'timepicker_start',
							'holder'     => 'div'
						),
						array(
							'type'       => 'stm_timepicker_vc',
							'heading'    => __('Time end', 'crypterio'),
							'param_name' => 'timepicker_end',
							'holder'     => 'div'
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Location', 'crypterio'),
							'param_name' => 'location'
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Title', 'crypterio'),
							'param_name' => 'title'
						),
						array(
							'type'       => 'textarea',
							'heading'    => esc_html__('Description', 'crypterio'),
							'param_name' => 'description'
						),
						array(
							'type'       => 'autocomplete',
							'heading'    => __('Select speakers', 'crypterio'),
							'param_name' => 'lesson_speakers',
							'settings'   => array(
								'multiple'       => true,
								'sortable'       => true,
								'min_length'     => 1,
								'no_hide'        => true,
								'unique_values'  => true,
								'display_inline' => true,
								'values'         => $speakers_data
							)
						),
					)
				)
			)
		));

		vc_map(array(
			'name'     => __('Countdown', 'crypterio'),
			'base'     => 'stm_countdown',
			'icon'     => 'stm_countdown',
			'category' => __('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'stm_countdown_vc',
					'heading'    => __('Count to date', 'crypterio'),
					'param_name' => 'countdown',
					'holder'     => 'div'
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__('Description', 'crypterio'),
					'param_name' => 'countdown_description',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Link for download', 'crypterio'),
					'param_name' => 'download_link',
				),
				array(
					'type'       => 'css_editor',
					'heading'    => __('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => __('Design options', 'crypterio')
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Services', 'crypterio'),
			'base'     => 'stm_services',
			'icon'     => 'stm_services',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Number Posts', 'crypterio'),
					'param_name' => 'posts_per_page',
					'value'      => 12
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Posts Per Row', 'crypterio'),
					'param_name' => 'posts_per_row',
					'value'      => array(
						4 => 4,
						3 => 3,
						2 => 2,
						1 => 1
					),
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Category', 'crypterio'),
					'param_name' => 'category',
					'value'      => $service_category
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Image size', 'crypterio'),
					'param_name'  => 'img_size',
					'value'       => '',
					'description' => esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use default size.', 'crypterio'),
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Charts', 'crypterio'),
			'base'     => 'stm_charts',
			'icon'     => 'stm_charts',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Design', 'crypterio'),
					'param_name' => 'design',
					'value'      => array(
						esc_html__('Line', 'crypterio')   => 'line',
						esc_html__('Bar', 'crypterio')    => 'bar',
						esc_html__('Circle', 'crypterio') => 'circle',
						esc_html__('Pie', 'crypterio')    => 'pie',
					),
				),
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__('Show legend?', 'crypterio'),
					'param_name'  => 'legend',
					'description' => esc_html__('If checked, chart will have legend.', 'crypterio'),
					'value'       => array(esc_html__('Yes', 'crypterio') => 'yes'),
					'std'         => 'yes',
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Legend Position', 'crypterio'),
					'param_name' => 'legend_position',
					'value'      => array(
						esc_html__('Bottom', 'crypterio') => 'bottom',
						esc_html__('Right', 'crypterio')  => 'right',
					),
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Width (px)', 'crypterio'),
					'param_name' => 'width',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Height (px)', 'crypterio'),
					'param_name' => 'height',
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__('X-axis values', 'crypterio'),
					'param_name' => 'x_values',
					'value'      => 'JAN; FEB; MAR; APR; MAY; JUN; JUL; AUG',
					'dependency' => array(
						'element' => 'design',
						'value'   => array('line', 'bar')
					),
				),
				array(
					'type'       => 'param_group',
					'heading'    => esc_html__('Values', 'crypterio'),
					'param_name' => 'values',
					'dependency' => array(
						'element' => 'design',
						'value'   => array('line', 'bar')
					),
					'value'      => urlencode(json_encode(array(
						array(
							'title'    => esc_html__('One', 'crypterio'),
							'y_values' => '10; 15; 20; 25; 27; 25; 23; 25',
							'color'    => '#fe6c61',
						),
						array(
							'title'    => esc_html__('Two', 'crypterio'),
							'y_values' => '25; 18; 16; 17; 20; 25; 30; 35',
							'color'    => '#5472d2'
						)
					))),
					'params'     => array(
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__('Title', 'crypterio'),
							'param_name'  => 'title',
							'description' => esc_html__('Enter title for chart dataset.', 'crypterio'),
							'admin_label' => true,
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Y-axis values', 'crypterio'),
							'param_name' => 'y_values'
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__('Color', 'crypterio'),
							'param_name' => 'color'
						)
					),
					'callbacks'  => array(
						'after_add' => 'vcChartParamAfterAddCallback',
					),
				),
				array(
					'type'       => 'param_group',
					'heading'    => esc_html__('Values', 'crypterio'),
					'param_name' => 'values_circle',
					'dependency' => array(
						'element' => 'design',
						'value'   => array('circle', 'pie')
					),
					'value'      => urlencode(json_encode(array(
						array(
							'title' => esc_html__('One', 'crypterio'),
							'value' => '40',
							'color' => '#fe6c61',
						),
						array(
							'title' => esc_html__('Two', 'crypterio'),
							'value' => '30',
							'color' => '#5472d2'
						),
						array(
							'title' => esc_html__('Three', 'crypterio'),
							'value' => '40',
							'color' => '#8d6dc4'
						)
					))),
					'params'     => array(
						array(
							'type'        => 'textfield',
							'heading'     => esc_html__('Title', 'crypterio'),
							'param_name'  => 'title',
							'description' => esc_html__('Enter title for chart dataset.', 'crypterio'),
							'admin_label' => true,
						),
						array(
							'type'       => 'textfield',
							'heading'    => esc_html__('Value', 'crypterio'),
							'param_name' => 'value'
						),
						array(
							'type'       => 'colorpicker',
							'heading'    => esc_html__('Color', 'crypterio'),
							'param_name' => 'color'
						)
					),
					'callbacks'  => array(
						'after_add' => 'vcChartParamAfterAddCallback',
					),
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Portfolio', 'crypterio'),
			'base'     => 'stm_portfolio',
			'icon'     => 'stm_portfolio',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Category', 'crypterio'),
					'param_name' => 'category',
					'value'      => $portfolio_categories
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Number Posts', 'crypterio'),
					'param_name' => 'posts_per_page',
					'value'      => 12
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__('Show Load More Button', 'crypterio'),
					'param_name' => 'load_more_enable'
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Portfolio Post Pagination', 'crypterio'),
			'base'     => 'stm_portfolio_pagination',
			'icon'     => 'stm_portfolio',
			'category' => esc_html__('STM Post Partials', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Style', 'crypterio'),
					'param_name' => 'style',
					'value'      => array(
						esc_html__('Style 1', 'crypterio') => 'style_1',
						esc_html__('Style 2', 'crypterio') => 'style_2',
						esc_html__('Style 3', 'crypterio') => 'style_3'
					),
				),
				array(
					'type'        => 'checkbox',
					'heading'     => esc_html__('Show Button', 'crypterio'),
					'param_name'  => 'show_button',
					'description' => esc_html__('Button for link to the archive page.', 'crypterio'),
					'value'       => array(
						esc_html__('Yes', 'crypterio') => 'yes'
					)
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__('Button link', 'crypterio'),
					'param_name' => 'link',
					'dependency' => array('element' => 'show_button', 'value' => 'yes')
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Portfolio Information', 'crypterio'),
			'base'     => 'stm_portfolio_information',
			'icon'     => 'stm_portfolio',
			'category' => esc_html__('STM Post Partials', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Client', 'crypterio'),
					'param_name' => 'portfolio_client',
					'value'      => ''
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Date', 'crypterio'),
					'param_name' => 'portfolio_date',
					'value'      => ''
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Services', 'crypterio'),
					'param_name' => 'portfolio_services',
					'value'      => ''
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__('Website', 'crypterio'),
					'param_name' => 'link'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Role', 'crypterio'),
					'param_name' => 'portfolio_role',
					'value'      => ''
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Facebook', 'crypterio'),
					'param_name' => 'facebook'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Twitter', 'crypterio'),
					'param_name' => 'twitter'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Instagram', 'crypterio'),
					'param_name' => 'instagram'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Google+', 'crypterio'),
					'param_name' => 'google_plus'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Youtube', 'crypterio'),
					'param_name' => 'youtube'
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Style', 'crypterio'),
					'param_name' => 'style',
					'value'      => array(
						esc_html__('Style 1', 'crypterio') => 'style_1',
						esc_html__('Style 2', 'crypterio') => 'style_2'
					),
					'group'      => esc_html__('Style settings', 'crypterio')
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Posts Per Row', 'crypterio'),
					'param_name' => 'posts_per_row',
					'value'      => array(
						4 => 4,
						3 => 3,
						2 => 2,
						1 => 1
					),
					'group'      => esc_html__('Style settings', 'crypterio')
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Alignment', 'crypterio'),
					'param_name' => 'alignment',
					'value'      => array(
						esc_html__('Left', 'crypterio')   => 'left',
						esc_html__('Right', 'crypterio')  => 'right',
						esc_html__('Center', 'crypterio') => 'center'
					),
					'group'      => esc_html__('Style settings', 'crypterio')
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__('Show Title Icons', 'crypterio'),
					'param_name' => 'show_title_icons',
					'value'      => array(
						esc_html__('Yes', 'crypterio') => 'yes'
					),
					'group'      => esc_html__('Style settings', 'crypterio')
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => esc_html__('Design options', 'crypterio')
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('About Vacancy', 'crypterio'),
			'base'     => 'stm_about_vacancy',
			'category' => esc_html__('STM Vacancy Partials', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css',
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Vacancy Bottom', 'crypterio'),
			'base'     => 'stm_vacancy_bottom',
			'category' => esc_html__('STM Vacancy Partials', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css'
				)
			)
		));

		vc_map(array(
			'name'     => esc_html__('Staff Bottom', 'crypterio'),
			'base'     => 'stm_staff_bottom',
			'category' => esc_html__('STM Staff Partials', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__('Css', 'crypterio'),
					'param_name' => 'css'
				)
			)
		));

		$works_categories = get_terms('stm_works_category');
		$works_categories_arr = array();

		if (!empty($works_categories) && !is_wp_error($works_categories)) {
			foreach ($works_categories as $works_category) {
				$works_categories_arr[] = array('label' => $works_category->name, 'value' => $works_category->slug);
			}
		}

		$stm_works = array(
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Style', 'crypterio'),
				'param_name' => 'style',
				'value'      => array(
					esc_html__('Grid', 'crypterio')             => 'grid',
					esc_html__('Grid with filter', 'crypterio') => 'grid_with_filter'
				)
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('View Style', 'crypterio'),
				'param_name' => 'grid_style',
				'value'      => array(
					esc_html__('Style 1', 'crypterio') => 'style_1',
					esc_html__('Style 2', 'crypterio') => 'style_2'
				),
				'dependency' => array('element' => 'style', 'value' => 'grid')
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('View Style', 'crypterio'),
				'param_name' => 'grid_with_filter_style',
				'value'      => array(
					esc_html__('Style 1', 'crypterio') => 'style_1',
					esc_html__('Style 2', 'crypterio') => 'style_2'
				),
				'dependency' => array('element' => 'style', 'value' => 'grid_with_filter')
			),
			array(
				'type'        => 'autocomplete',
				'heading'     => __('Include Category', 'crypterio'),
				'param_name'  => 'works_categories',
				'description' => __('Add Category. If not added show all category', 'crypterio'),
				'settings'    => array(
					'multiple'       => true,
					'sortable'       => true,
					'min_length'     => 1,
					'no_hide'        => true,
					'unique_values'  => true,
					'display_inline' => true,
					'values'         => $works_categories_arr
				),
				'dependency'  => array('element' => 'style', 'value' => 'grid_with_filter')
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Count', 'crypterio'),
				'param_name'  => 'works_count',
				'value'       => '',
				'description' => esc_html__('The number of items you want to see on the screen.', 'crypterio'),
				'dependency'  => array('element' => 'style', 'value' => 'grid')
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Count', 'crypterio'),
				'param_name'  => 'works_count_visible',
				'value'       => '',
				'description' => esc_html__('The number of items you want to see on the screen.', 'crypterio'),
				'dependency'  => array('element' => 'style', 'value' => 'grid_with_filter')
			),
		);

		if (stm_check_layout('layout_17')) {
			$stm_works[] = array(
				'type'       => 'dropdown',
				'heading'    => esc_html__('Enable different grid tiles', 'crypterio'),
				'param_name' => 'cols',
				'value'      => array(
					__('Yes', 'crypterio') => 'yes',
					__('No', 'crypterio')  => 'no',
				),
				'dependency' => array('element' => 'grid_style', 'value' => 'style_2')
			);
		}

		$stm_works[] = array(
			'type'       => 'dropdown',
			'heading'    => esc_html__('Cols', 'crypterio'),
			'param_name' => 'cols',
			'value'      => array(
				4 => 4,
				3 => 3,
				2 => 2,
				1 => 1,
			)
		);

		$stm_works[] = array(
			'type'        => 'textfield',
			'heading'     => esc_html__('Image size', 'crypterio'),
			'param_name'  => 'img_size',
			'value'       => '',
			'description' => esc_html__('Enter image size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use default size.', 'crypterio'),
		);

		$stm_works[] = array(
			'type'       => 'css_editor',
			'heading'    => esc_html__('Css', 'crypterio'),
			'param_name' => 'css',
			'group'      => esc_html__('Design options', 'crypterio')
		);

		vc_map(array(
			'name'     => esc_html__('Our Works', 'crypterio'),
			'base'     => 'stm_works',
			'category' => esc_html__('STM', 'crypterio'),
			'params'   => $stm_works
		));

		vc_map(array(
			'name'     => __('Services With Tabs', 'crypterio'),
			'base'     => 'stm_services_tabs',
			'category' => __('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'        => 'textfield',
					'heading'     => __('Items Count', 'crypterio'),
					'param_name'  => 'items_count',
					'description' => __('The number of items you want to see on the screen.', 'crypterio')
				),
				array(
					'type'        => 'textfield',
					'heading'     => __('Extra class name', 'crypterio'),
					'param_name'  => 'el_class',
					'description' => __('Style particular content element differently - add a class name and refer to it in custom CSS.', 'crypterio')
				),
				array(
					'type'       => 'css_editor',
					'heading'    => __('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => __('Design options', 'crypterio')
				)
			)
		));

		vc_map(array(
			'name'     => __('ICO Countdown', 'crypterio'),
			'base'     => 'stm_ico_countdown',
			'category' => __('STM', 'crypterio'),
			'params'   => array(
				array(
					'type'       => 'textfield',
					'heading'    => __('Title', 'crypterio'),
					'param_name' => 'title',
				),
				array(
					'type'       => 'stm_countdown_vc',
					'heading'    => __('Count to date', 'crypterio'),
					'param_name' => 'countdown',
					'holder'     => 'div'
				),
				array(
					'type'       => 'stm_countdown_vc',
					'heading'    => __('Softcap end date', 'crypterio'),
					'param_name' => 'softcap_countdown',
					'holder'     => 'div'
				),
				array(
					'type'       => 'attach_image',
					'heading'    => esc_html__('Background Image', 'crypterio'),
					'param_name' => 'ico_bg_image'
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__('Token Buy Button', 'crypterio'),
					'param_name' => 'link',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Sale tokens price (number format)', 'crypterio'),
					'param_name' => 'price_num',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Sale tokens price 1', 'crypterio'),
					'param_name' => 'price_1',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Sale tokens price label 1', 'crypterio'),
					'param_name' => 'price_label_1',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Sale tokens price 2', 'crypterio'),
					'param_name' => 'price_2',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Sale tokens price label 2', 'crypterio'),
					'param_name' => 'price_label_2',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Softcap price (number format)', 'crypterio'),
					'param_name' => 'softcap',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Softcap label', 'crypterio'),
					'param_name' => 'softcap_label',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Softcap label 2', 'crypterio'),
					'param_name' => 'softcap_label_2',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Hardcap price (number format)', 'crypterio'),
					'param_name' => 'hardcap',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Hardcap label', 'crypterio'),
					'param_name' => 'hardcap_label',
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Hardcap label 2', 'crypterio'),
					'param_name' => 'hardcap_label_2',
				),
				array(
					'type'       => 'attach_images',
					'heading'    => esc_html__('Payments', 'crypterio'),
					'param_name' => 'payments'
				),
				array(
					'type' => 'exploded_textarea_safe',
					'heading' => __( 'Custom links', 'js_composer' ),
					'param_name' => 'custom_links',
					'description' => __( 'Enter links for each payment (Note: divide links with linebreaks (Enter)).', 'js_composer' ),
					'dependency' => array(
						'element' => 'onclick',
						'value' => array( 'payments' ),
					),
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Show popup', 'crypterio'),
					'param_name' => 'show_popup',
					'value'      => array(
						esc_html__('Hide', 'crypterio') => 'hide',
						esc_html__('Show', 'crypterio') => 'show',
					),
					'group'      => __('Popup', 'crypterio'),
					'std'        => 'hide'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Popup Title', 'crypterio'),
					'param_name' => 'popup_title',
					'group'      => __('Popup', 'crypterio'),
					'dependency' => array(
						'element' => 'show_popup',
						'value' => array( 'show' ),
					),
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__('Contract address', 'crypterio'),
					'param_name' => 'popup_address',
					'group'      => __('Popup', 'crypterio'),
					'dependency' => array(
						'element' => 'show_popup',
						'value' => array( 'show' ),
					),
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__('Popup description', 'crypterio'),
					'param_name' => 'popup_desc',
					'group'      => __('Popup', 'crypterio'),
					'dependency' => array(
						'element' => 'show_popup',
						'value' => array( 'show' ),
					),
				),
				array(
					'type'       => 'vc_link',
					'heading'    => esc_html__('Popup link', 'crypterio'),
					'param_name' => 'popup_link',
					'group'      => __('Popup', 'crypterio'),
					'dependency' => array(
						'element' => 'show_popup',
						'value' => array( 'show' ),
					),
				),
				array(
					'type'       => 'css_editor',
					'heading'    => __('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => __('Design options', 'crypterio')
				)
			)
		));

		$cats = array();

		$categories = get_categories(array('hide_empty' => false));
		if(!empty($categories) and !is_wp_error($categories)) {
			foreach($categories as $category) {
				$cats[] = array('label' => $category->name, 'value' => $category->term_id);
			}
		}

		vc_map(array(
			'name'   => esc_html__('Crypterio Timeline', 'crypterio'),
			'base'   => 'stm_posttimeline',
			'icon'   => 'stmicon-marquee',
			'description' => esc_html__('Posts in timeline style', 'crypterio'),
			'category' =>array(
				esc_html__('Content', 'crypterio'),
			),
			'params' => array(
				array(
					'type'       => 'autocomplete',
					'heading'    => __('Check taxonomy to show posts', 'crypterio'),
					'param_name' => 'categories',
					'settings'   => array(
						'multiple'       => true,
						'sortable'       => true,
						'min_length'     => 1,
						'no_hide'        => true,
						'unique_values'  => true,
						'display_inline' => true,
						'values'         => $cats
					)
				),
				array(
					'type'       => 'iconpicker',
					'heading'    => esc_html__('Icon', 'crypterio'),
					'param_name' => 'icon',
					'value'      => '',
					'weight'     => 1
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Title length', 'crypterio'),
					'param_name'  => 'length',
					'std'         => '40'
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Number of posts to show', 'crypterio'),
					'param_name'  => 'posts_per_page',
					'std'         => '-1'
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__('Show year', 'crypterio'),
					'param_name' => 'show_year',
					'std' => 'true'
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__('Show title', 'crypterio'),
					'param_name' => 'show_title',
					'std' => 'true'
				),
				array(
					'type'       => 'checkbox',
					'heading'    => esc_html__('Show link', 'crypterio'),
					'param_name' => 'show_link',
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__('Image Size', 'crypterio'),
					'param_name'  => 'image_size',
					'std'         => '255x255',
					'description' => esc_html__('Enter image size in pixels: 200x100 (Width x Height).', 'crypterio')
				),
				vc_map_add_css_animation(),
				array(
					'type'       => 'css_editor',
					'heading'    => __('Css', 'crypterio'),
					'param_name' => 'css',
					'group'      => __('Design options', 'crypterio')
				)
			)
		));


		vc_map( array(
			'name'                    => esc_html__( 'Google Map', 'crypterio' ),
			'base'                    => 'stm_gmap',
			'icon'                    => 'stm_gmap',
			'as_parent'               => array( 'only' => 'stm_gmap_address' ),
			'show_settings_on_create' => true,
			'js_view'                 => 'VcColumnView',
			'category'                => esc_html__( 'STM', 'crypterio' ),
			'params'                  => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Map Height', 'crypterio' ),
					'param_name'  => 'map_height',
					'value'       => '733px',
					'description' => esc_html__( 'Enter map height in px', 'crypterio' )
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Map Zoom', 'crypterio' ),
					'param_name' => 'map_zoom',
					'value'      => 18
				),
				array(
					'type'       => 'attach_image',
					'heading'    => esc_html__( 'Marker Image', 'crypterio' ),
					'param_name' => 'marker'
				),
				array(
					'type'       => 'checkbox',
					'param_name' => 'disable_mouse_whell',
					'value'      => array(
						esc_html__( 'Disable map zoom on mouse wheel scroll', 'crypterio' ) => 'disable'
					)
				),
				array(
					'type'       => 'textarea_raw_html',
					'heading'    => esc_html__( 'Style Code', 'crypterio' ),
					'param_name' => 'gmap_style',
					'group'      => esc_html__('Map Style', 'crypterio')
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Extra class name', 'crypterio' ),
					'param_name'  => 'el_class',
					'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'crypterio' )
				),
				array(
					'type'       => 'css_editor',
					'heading'    => esc_html__( 'Css', 'crypterio' ),
					'param_name' => 'css',
					'group'      => esc_html__( 'Design options', 'crypterio' )
				)
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Address', 'crypterio' ),
			'base'     => 'stm_gmap_address',
			'icon'     => 'stm_gmap_address',
			'as_child' => array( 'only' => 'stm_gmap' ),
			'category' => esc_html__( 'STM', 'crypterio' ),
			'params'   => array(
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Title', 'crypterio' ),
					'admin_label' => true,
					'param_name'  => 'title'
				),
				array(
					'type'       => 'textarea',
					'heading'    => esc_html__( 'Address', 'crypterio' ),
					'param_name' => 'address'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Phone', 'crypterio' ),
					'param_name' => 'phone'
				),
				array(
					'type'       => 'textfield',
					'heading'    => esc_html__( 'Email', 'crypterio' ),
					'param_name' => 'email'
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Latitude', 'crypterio' ),
					'param_name'  => 'lat',
					'description' => wp_kses( __( '<a href="http://www.latlong.net/convert-address-to-lat-long.html">Here is a tool</a> where you can find Latitude & Longitude of your location', 'crypterio' ), array( 'a' => array( 'href' => array() ) ) )
				),
				array(
					'type'        => 'textfield',
					'heading'     => esc_html__( 'Longitude', 'crypterio' ),
					'param_name'  => 'lng',
					'description' => wp_kses( __( '<a href="http://www.latlong.net/convert-address-to-lat-long.html">Here is a tool</a> where you can find Latitude & Longitude of your location', 'crypterio' ), array( 'a' => array( 'href' => array() ) ) )
				),
			)
		) );

		vc_map( array(
			'name'     => esc_html__( 'Bitcoin.com Widgets', 'crypterio' ),
			'base'     => 'stm_bitcoin_widgets',
			'icon'     => 'stm_bitcoin_widgets',
			'category' => esc_html__( 'STM', 'crypterio' ),
			'params'   => array(
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Type', 'crypterio'),
					'param_name' => 'type',
					'value'      => array(
						esc_html__('Bitcoin Price Chart Widget', 'crypterio') => 'btcwdgt-chart',
					),
					'std'        => 'btcwdgt-chart'
				),
				array(
					'type'       => 'dropdown',
					'heading'    => esc_html__('Style', 'crypterio'),
					'param_name' => 'type',
					'value'      => array(
						esc_html__('Dark', 'crypterio') => 'dark',
						esc_html__('Light', 'crypterio') => 'light',
					),
					'std'        => 'dark'
				),
			)
		) );

	}
}

if (class_exists('WPBakeryShortCodesContainer')) {
	class WPBakeryShortCode_Stm_Company_History extends WPBakeryShortCodesContainer
	{
	}

	class WPBakeryShortCode_Stm_Event_Lesson extends WPBakeryShortCodesContainer
	{
	}

	class WPBakeryShortCode_Stm_Animation_Block extends WPBakeryShortCodesContainer
	{
	}

	class WPBakeryShortCode_Stm_Gmap extends WPBakeryShortCodesContainer {
	}

}

if (class_exists('WPBakeryShortCode')) {
	class WPBakeryShortCode_Stm_Bitcoin_Widgets extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Gmap_Address extends WPBakeryShortCode {
	}

	class WPBakeryShortCode_Stm_Company_History_Item extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Partner extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Contacts_Widget extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Info_Box extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Icon_Box extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Posts extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Stats_Counter extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Testimonials extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Contact extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Sidebar extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Testimonials_Carousel extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Image_Carousel extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_News extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Vacancies extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Staff_List extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Post_Details extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Post_Bottom extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Post_About_Author extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Post_Comments extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Events_Information extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Events_Form extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Events extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Events_Map extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Event_Lessons extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Services extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Charts extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Portfolio extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Portfolio_Pagination extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Portfolio_Information extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_About_Vacancy extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Vacancy_Bottom extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Staff_Bottom extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Works extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Countdown extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Services_Tabs extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Quote extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Spacing extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Ico_Countdown extends WPBakeryShortCode
	{
	}

	class WPBakeryShortCode_Stm_Posttimeline extends WPBakeryShortCode
	{
	}

}

/*Add custom icons*/
add_filter('vc_iconpicker-type-fontawesome', 'crypterio_vc_custom_icons');

if (!function_exists('crypterio_vc_custom_icons')) {
	function crypterio_vc_custom_icons($fonts)
	{

		$counts = 0;
		/*Manager fonts*/
		$fonts_manager = crypterio_add_fonts_pack();
		if (!empty($fonts_manager)) {
			$fonts = $fonts + $fonts_manager;
		}

		$layout_fonts = crypterio_add_fonts_pack('stm_fonts_layout');
		if (!empty($layout_fonts)) {
			$fonts = $fonts + $layout_fonts;
		}

		return $fonts;
	}

	function crypterio_add_fonts_pack($option = 'stm_fonts')
	{

		$fonts = array();

		$custom_fonts = get_option($option);
		global $wp_filesystem;

		if (empty($wp_filesystem)) {
			require_once ABSPATH . '/wp-admin/includes/file.php';
			WP_Filesystem();
		}

		$wp_uploads = wp_upload_dir();
		$base_url = $wp_uploads['basedir'];

		if (!empty($custom_fonts)) {
			foreach ($custom_fonts as $font_name => $custom_font) {
				if ($option == 'stm_fonts_layout' && empty($custom_font['enabled'])) continue;
				$json_file = $base_url . '/' . $custom_font['folder'] . '/selection.json';
				$custom_icons_json = json_decode($wp_filesystem->get_contents($json_file), true);
				if (!empty($custom_icons_json)) {
					if (!empty($custom_icons_json['icons'])) {
						$set_name = str_replace('stmicons', 'Crypterio icons', $custom_icons_json['metadata']['name']);
						$set_prefix = $custom_icons_json['preferences']['fontPref']['prefix'];
						foreach ($custom_icons_json['icons'] as $icon) {
							$fonts[$set_name][] = array(
								$set_prefix . $icon['properties']['name'] => $set_prefix . $icon['properties']['name']
							);
						}
					}
				}
			}
		}

		return $fonts;
	}
}


$modules = array(
	'pricing_table'
);

foreach($modules as $module) {
	require_once CRYPTERIO_INC_PATH . '/vc/modules/' . $module . '.php';
}