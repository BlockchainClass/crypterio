<?php

$crypterio_config = crypterio_config();

function stm_check_layout($layout)
{
	$crypterio_config = crypterio_config();
	if ($crypterio_config['layout'] == $layout) {
		return true;
	} else {
		return false;
	}
}

$socials = array(
	'facebook'      => esc_html__('Facebook', 'crypterio'),
	'twitter'       => esc_html__('Twitter', 'crypterio'),
	'instagram'     => esc_html__('Instagram', 'crypterio'),
	'google-plus'   => esc_html__('Google+', 'crypterio'),
	'vimeo'         => esc_html__('Vimeo', 'crypterio'),
	'linkedin'      => esc_html__('Linkedin', 'crypterio'),
	'behance'       => esc_html__('Behance', 'crypterio'),
	'dribbble'      => esc_html__('Dribbble', 'crypterio'),
	'flickr'        => esc_html__('Flickr', 'crypterio'),
	'github'        => esc_html__('Git', 'crypterio'),
	'pinterest'     => esc_html__('Pinterest', 'crypterio'),
	'yahoo'         => esc_html__('Yahoo', 'crypterio'),
	'delicious'     => esc_html__('Delicious', 'crypterio'),
	'dropbox'       => esc_html__('Dropbox', 'crypterio'),
	'reddit'        => esc_html__('Reddit', 'crypterio'),
	'soundcloud'    => esc_html__('Soundcloud', 'crypterio'),
	'google'        => esc_html__('Google', 'crypterio'),
	'skype'         => esc_html__('Skype', 'crypterio'),
	'youtube'       => esc_html__('Youtube', 'crypterio'),
	'youtube-play'  => esc_html__('Youtube Play', 'crypterio'),
	'tumblr'        => esc_html__('Tumblr', 'crypterio'),
	'whatsapp'      => esc_html__('Whatsapp', 'crypterio'),
	'odnoklassniki' => esc_html__('Odnoklassniki', 'crypterio'),
	'vk'            => esc_html__('Vk', 'crypterio'),
	'xing'          => esc_html__('Xing', 'crypterio'),
);

STM_Customizer::setPanels(array(
	'site_settings'            => array(
		'title'    => esc_html__('Site Settings', 'crypterio'),
		'priority' => 10
	),
	'cryptocurrency'               => array(
		'title'    => esc_html__('Cryptocurrencies', 'crypterio'),
		'priority' => 20
	),
	'footer'                   => array(
		'title'    => esc_html__('Footer', 'crypterio'),
		'priority' => 50
	),
	'post_types'               => array(
		'title'    => esc_html__('Post Types', 'crypterio'),
		'priority' => 60
	),
	'typography'               => array(
		'title'    => esc_html__('Typography', 'crypterio'),
		'priority' => 70
	),
	'metaboxes_default_values' => array(
		'title'    => esc_html__('Default Settings', 'crypterio'),
		'priority' => 71
	)
));

STM_Customizer::setSection('title_tagline', array(
	'title'    => esc_html__('Logo &amp; Title', 'crypterio'),
	'panel'    => 'site_settings',
	'priority' => 10,
	'fields'   => array(
		'title_tag_separator_1' => array(
			'type' => 'stm-separator'
		),
		'logo'                  => array(
			'label' => esc_html__('Logo', 'crypterio'),
			'type'  => 'image'
		),
		'dark_logo'             => array(
			'label' => esc_html__('Mobile Logo', 'crypterio'),
			'type'  => 'image'
		),
		'logo_width'            => array(
			'label'  => esc_html__('Width', 'crypterio'),
			'type'   => 'stm-attr',
			'mode'   => 'width',
			'units'  => 'px',
			'output' => '.top_nav_wr .top_nav .logo a img'
		),
		'logo_height'           => array(
			'label'  => esc_html__('Height', 'crypterio'),
			'type'   => 'stm-attr',
			'mode'   => 'height',
			'units'  => 'px',
			'output' => '.top_nav_wr .top_nav .logo a img'
		),
		'logo_margin_top'       => array(
			'label'  => esc_html__('Margin Top', 'crypterio'),
			'type'   => 'stm-attr',
			'mode'   => 'margin-top',
			'units'  => 'px',
			'output' => '.header_top .logo a',
		),
		'logo_margin_bottom'    => array(
			'label'  => esc_html__('Margin Bottom', 'crypterio'),
			'type'   => 'stm-attr',
			'mode'   => 'margin-bottom',
			'units'  => 'px',
			'output' => '.top_nav_wr .top_nav .logo a'
		),
		'title_tag_separator_2' => array(
			'type' => 'stm-separator'
		)
	)
));

STM_Customizer::setSection('static_front_page', array(
	'title' => esc_html__('Static Front Page', 'crypterio'),
	'panel' => 'site_settings'
));

$crypterio_config = crypterio_config();
$skin_arr = array(
	'skin_default' => esc_html__('Default', 'crypterio'),
	'skin_custom'  => esc_html__('Custom Colors', 'crypterio'),
);

$site_settings = array(
	'site_skin'                 => array(
		'label'   => esc_html__('Skin', 'crypterio'),
		'type'    => 'stm-select',
		'choices' => $skin_arr
	),
	'site_skin_base_color'      => array(
		'label'   => esc_html__('Custom Base Color', 'crypterio'),
		'type'    => 'color',
		'default' => '#002e5b'
	),
	'site_skin_secondary_color' => array(
		'label'   => esc_html__('Custom Secondary Color', 'crypterio'),
		'type'    => 'color',
		'default' => '#6c98e1'
	),
	'site_skin_third_color'     => array(
		'label'   => esc_html__('Custom Third Color', 'crypterio'),
		'type'    => 'color',
		'default' => '#fde428'
	),
	'frontend_customizer'       => array(
		'label'   => esc_html__('Frontend Customizer', 'crypterio'),
		'type'    => 'stm-checkbox',
		'default' => false
	),
	'site_boxed'                => array(
		'label'   => esc_html__('Enable Boxed Layout', 'crypterio'),
		'type'    => 'stm-checkbox',
		'default' => false
	),
	'enable_preloader'          => array(
		'label'   => esc_html__('Enable Preloader', 'crypterio'),
		'type'    => 'stm-checkbox',
		'default' => true
	),
	'bg_image'                  => array(
		'label'   => esc_html__('Background Image', 'crypterio'),
		'type'    => 'stm-bg',
		'choices' => array(
			'bg_img_1' => 'prev_img_1',
			'bg_img_2' => 'prev_img_2',
			'bg_img_3' => 'prev_img_3',
			'bg_img_4' => 'prev_img_4',
			'bg_img_5' => 'prev_img_5',
		)
	),
	'custom_bg_image'           => array(
		'label' => esc_html__('Custom Bg Image', 'crypterio'),
		'type'  => 'image'
	),
);

STM_Customizer::setSection('site_settings', array(
	'title'  => esc_html__('Style &amp; Settings', 'crypterio'),
	'panel'  => 'site_settings',
	'fields' => $site_settings
));

STM_Customizer::setSection('cryptocurrencies', array(
	'title'    => esc_html__('Cryptocurrencies', 'crypterio'),
	'priority' => 20,
	'fields'   => array(
		'crypto' => array(
			'label'       => '',
			'type'        => 'stm-crypto',
			'description' => esc_html__('Enter cryptocurrency name', 'crypterio')
		)
	)
));

STM_Customizer::setSection('post_type_service', array(
	'title'  => esc_html__('Services', 'crypterio'),
	'panel'  => 'post_types',
	'fields' => array(
		'post_type_services_title'     => array(
			'label'   => esc_html__('Title', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('Service', 'crypterio')
		),
		'post_type_services_plural'    => array(
			'label'   => esc_html__('Plural Title', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('Services', 'crypterio')
		),
		'post_type_services_all_items' => array(
			'label'   => esc_html__('All Items', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('All Services', 'crypterio')
		),
		'post_type_services_rewrite'   => array(
			'label'   => esc_html__('Rewrite (URL text)', 'crypterio'),
			'type'    => 'stm-text',
			'default' => 'service'
		),
		'post_type_services_icon'      => array(
			'label'   => esc_html__('Icon', 'crypterio'),
			'type'    => 'stm-text',
			'default' => 'dashicons-clipboard'
		),
	)
));

STM_Customizer::setSection('post_type_careers', array(
	'title'  => esc_html__('Vacancies', 'crypterio'),
	'panel'  => 'post_types',
	'fields' => array(
		'post_type_careers_title'     => array(
			'label'   => esc_html__('Title', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('Vacancy', 'crypterio')
		),
		'post_type_careers_plural'    => array(
			'label'   => esc_html__('Plural Title', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('Vacancies', 'crypterio')
		),
		'post_type_careers_all_items' => array(
			'label'   => esc_html__('All Items', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('All Vacancies', 'crypterio')
		),
		'post_type_careers_rewrite'   => array(
			'label'   => esc_html__('Rewrite (URL text)', 'crypterio'),
			'type'    => 'stm-text',
			'default' => 'careers_archive'
		),
		'post_type_careers_icon'      => array(
			'label'   => esc_html__('Icon', 'crypterio'),
			'type'    => 'stm-text',
			'default' => 'dashicons-id'
		),
	)
));

STM_Customizer::setSection('post_type_staff', array(
	'title'  => esc_html__('Staff', 'crypterio'),
	'panel'  => 'post_types',
	'fields' => array(
		'post_type_staff_title'     => array(
			'label'   => esc_html__('Title', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('Staff', 'crypterio')
		),
		'post_type_staff_plural'    => array(
			'label'   => esc_html__('Plural Title', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('Staff', 'crypterio')
		),
		'post_type_staff_all_items' => array(
			'label'   => esc_html__('All Items', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('All Staff', 'crypterio')
		),
		'post_type_staff_rewrite'   => array(
			'label'   => esc_html__('Rewrite (URL text)', 'crypterio'),
			'type'    => 'stm-text',
			'default' => 'staff'
		),
		'post_type_staff_icon'      => array(
			'label'   => esc_html__('Icon', 'crypterio'),
			'type'    => 'stm-text',
			'default' => 'dashicons-groups'
		),
	)
));

STM_Customizer::setSection('post_type_works', array(
	'title'  => esc_html__('Works', 'crypterio'),
	'panel'  => 'post_types',
	'fields' => array(
		'post_type_works_title'     => array(
			'label'   => esc_html__('Title', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('Work', 'crypterio')
		),
		'post_type_works_plural'    => array(
			'label'   => esc_html__('Plural Title', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('Works', 'crypterio')
		),
		'post_type_works_all_items' => array(
			'label'   => esc_html__('All Items', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('All Works', 'crypterio')
		),
		'post_type_works_rewrite'   => array(
			'label'   => esc_html__('Rewrite (URL text)', 'crypterio'),
			'type'    => 'stm-text',
			'default' => 'works'
		),
		'post_type_works_icon'      => array(
			'label'   => esc_html__('Icon', 'crypterio'),
			'type'    => 'stm-text',
			'default' => 'dashicons-portfolio'
		),
	)
));

STM_Customizer::setSection('post_type_testimonial', array(
	'title'  => esc_html__('Testimonials', 'crypterio'),
	'panel'  => 'post_types',
	'fields' => array(
		'post_type_testimonials_title'     => array(
			'label'   => esc_html__('Title', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('Testimonial', 'crypterio')
		),
		'post_type_testimonials_plural'    => array(
			'label'   => esc_html__('Plural Title', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('Testimonials', 'crypterio')
		),
		'post_type_testimonials_all_items' => array(
			'label'   => esc_html__('All Items', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('All Testimonials', 'crypterio')
		),
		'post_type_testimonials_rewrite'   => array(
			'label'   => esc_html__('Rewrite (URL text)', 'crypterio'),
			'type'    => 'stm-text',
			'default' => 'testimonials'
		),
		'post_type_testimonials_icon'      => array(
			'label'   => esc_html__('Icon', 'crypterio'),
			'type'    => 'stm-text',
			'default' => 'dashicons-testimonial'
		),
	)
));

STM_Customizer::setSection('post_type_events', array(
	'title'  => esc_html__('Events', 'crypterio'),
	'panel'  => 'post_types',
	'fields' => array(
		'post_type_events_title'     => array(
			'label'   => esc_html__('Title', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('Events', 'crypterio')
		),
		'post_type_events_plural'    => array(
			'label'   => esc_html__('Plural Title', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('Events', 'crypterio')
		),
		'post_type_events_all_items' => array(
			'label'   => esc_html__('All Items', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('All Events', 'crypterio')
		),
		'post_type_events_rewrite'   => array(
			'label'   => esc_html__('Rewrite (URL text)', 'crypterio'),
			'type'    => 'stm-text',
			'default' => 'events'
		),
		'post_type_events_icon'      => array(
			'label'   => esc_html__('Icon', 'crypterio'),
			'type'    => 'stm-text',
			'default' => 'dashicons-clipboard'
		),
	)
));

STM_Customizer::setSection('post_type_portfolio', array(
	'title'  => esc_html__('Portfolio', 'crypterio'),
	'panel'  => 'post_types',
	'fields' => array(
		'post_type_portfolio_title'     => array(
			'label'   => esc_html__('Title', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('Portfolio', 'crypterio')
		),
		'post_type_portfolio_plural'    => array(
			'label'   => esc_html__('Plural Title', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('Portfolio', 'crypterio')
		),
		'post_type_portfolio_all_items' => array(
			'label'   => esc_html__('All Items', 'crypterio'),
			'type'    => 'stm-text',
			'default' => esc_html__('All Portfolio', 'crypterio')
		),
		'post_type_portfolio_rewrite'   => array(
			'label'   => esc_html__('Rewrite (URL text)', 'crypterio'),
			'type'    => 'stm-text',
			'default' => 'portfolio'
		),
		'post_type_portfolio_icon'      => array(
			'label'   => esc_html__('Icon', 'crypterio'),
			'type'    => 'stm-text',
			'default' => 'dashicons-clipboard'
		),
	)
));

STM_Customizer::setSection('metaboxes_page_setup', array(
	'title'  => esc_html__('Page Setup', 'crypterio'),
	'panel'  => 'metaboxes_default_values',
	'fields' => array(
		'metabox_header_inverse'             => array(
			'label'   => esc_html__('Style - Inverse', 'crypterio'),
			'type'    => 'stm-checkbox',
			'default' => false
		),
		'metabox_group_sep_1'                => array(
			'type' => 'stm-separator'
		),
		'metabox_disable_title_box'          => array(
			'label'   => esc_html__('Disable Title Box', 'crypterio'),
			'type'    => 'stm-checkbox',
			'default' => false
		),
		'metabox_enable_transparent'         => array(
			'label'   => esc_html__('Enable Transparent', 'crypterio'),
			'type'    => 'stm-checkbox',
			'default' => false
		),
		'metabox_title_box_title_color'      => array(
			'label' => esc_html__('Title Color', 'crypterio'),
			'type'  => 'color'
		),
		'metabox_title_box_title_line_color' => array(
			'label' => esc_html__('Title Line Color', 'crypterio'),
			'type'  => 'color'
		),
		'metabox_title_box_bg_image'         => array(
			'label' => esc_html__('Background Image', 'crypterio'),
			'type'  => 'image'
		),
		'metabox_title_box_bg_position'      => array(
			'label' => esc_html__('Background Position', 'crypterio'),
			'type'  => 'stm-text'
		),
		'metabox_title_box_bg_size'          => array(
			'label' => esc_html__('Background Size', 'crypterio'),
			'type'  => 'stm-text'
		),
		'metabox_title_box_bg_repeat'        => array(
			'label'   => esc_html__('Background Repeat', 'crypterio'),
			'type'    => 'stm-select',
			'default' => 'no-repeat',
			'choices' => array(
				'repeat'    => esc_html__('Repeat', 'crypterio'),
				'no-repeat' => esc_html__('No Repeat', 'crypterio'),
				'repeat-x'  => esc_html__('Repeat-X', 'crypterio'),
				'repeat-y'  => esc_html__('Repeat-Y', 'crypterio')
			)
		),
		'metabox_disable_title'              => array(
			'label'   => esc_html__('Disable Title', 'crypterio'),
			'type'    => 'stm-checkbox',
			'default' => false
		),
		'metabox_disable_breadcrumbs'        => array(
			'label'   => esc_html__('Disable Breadcrumbs', 'crypterio'),
			'type'    => 'stm-checkbox',
			'default' => false
		),
		'metabox_enable_header_transparent'  => array(
			'label'   => esc_html__('Enable Header Transparent', 'crypterio'),
			'type'    => 'stm-checkbox',
			'default' => false
		),
		'metabox_content_bg_transparent'     => array(
			'label'   => esc_html__('Content Background - Transparent', 'crypterio'),
			'type'    => 'stm-checkbox',
			'default' => false
		),
		'metabox_footer_copyright_border_t'  => array(
			'label'   => esc_html__('Border Top - Hide', 'crypterio'),
			'type'    => 'stm-checkbox',
			'default' => false
		),
	)
));

$footer_layout = array(
	'footer_style'          => array(
		'label'   => esc_html__('Style', 'crypterio'),
		'type'    => 'stm-select',
		'default' => 'style_1',
		'choices' => array(
			'style_1' => esc_html__('Style 1', 'crypterio'),
			'style_2' => esc_html__('Style 2', 'crypterio')
		)
	),
	'footer_logo'           => array(
		'label' => esc_html__('Logo', 'crypterio'),
		'type'  => 'image'
	),
	'footer_logo_width'     => array(
		'label'  => esc_html__('Width', 'crypterio'),
		'type'   => 'stm-attr',
		'mode'   => 'width',
		'units'  => 'px',
		'output' => '#footer .widgets_row .footer_logo a img'
	),
	'footer_logo_height'    => array(
		'label'  => esc_html__('Height', 'crypterio'),
		'type'   => 'stm-attr',
		'mode'   => 'height',
		'units'  => 'px',
		'output' => '#footer .widgets_row .footer_logo a img'
	),
	'footer_logo_show_hide' => array(
		'label'   => esc_html__('Hide Logo', 'crypterio'),
		'type'    => 'stm-checkbox',
		'default' => false
	),
	'footer_show_hide'      => array(
		'label'   => esc_html__('Hide Footer', 'crypterio'),
		'type'    => 'stm-checkbox',
		'default' => false
	),
	'footer_break_1'        => array(
		'type' => 'stm-separator',
	),
	'footer_sidebar_count'  => array(
		'label'   => esc_html__('Additional Widget Areas', 'crypterio'),
		'type'    => 'stm-select',
		'default' => 4,
		'choices' => array(
			'disable' => esc_html__('Disable', 'crypterio'),
			1         => 1,
			2         => 2,
			3         => 3,
			4         => 4
		)
	),
	'footer_break_2'        => array(
		'type' => 'stm-separator',
	),
	'footer_text'           => array(
		'label'   => esc_html__('Footer Text', 'crypterio'),
		'type'    => 'stm-code',
		'default' => esc_html__('Fusce interdum ipsum egestas urna amet fringilla, et placerat ex venenatis. Aliquet luctus pharetra. Proin sed fringilla lectusar sit amet tellus in mollis. Proin nec egestas nibh, eget egestas urna. Phasellus sit amet vehicula nunc. In hac habitasse platea dictumst.', 'crypterio')
	),
	'footer_copyright'      => array(
		'label'       => esc_html__('Copyright', 'crypterio'),
		'placeholder' => esc_html__("Copyright &copy; 2012-2017 crypterio Theme by <a href='https://themeforest.net/item/crypterio-business-finance-wordpress-theme/14740561' target='_blank'>Stylemix Themes</a>. All rights reserved", 'crypterio'),
		'default'     => esc_html__("Copyright &copy; 2012-2017 crypterio Theme by <a href='https://themeforest.net/item/crypterio-business-finance-wordpress-theme/14740561' target='_blank'>Stylemix Themes</a>. All rights reserved", 'crypterio'),
		'type'        => 'stm-text'
	),
);

STM_Customizer::setSection('footer_layout', array(
	'title'  => esc_html__('Layout', 'crypterio'),
	'panel'  => 'footer',
	'fields' => $footer_layout
));

STM_Customizer::setSection('footer_socials', array(
	'title'  => esc_html__('Footer Socials', 'crypterio'),
	'panel'  => 'footer',
	'fields' => array(
		'footer_socials' => array(
			'type'    => 'stm-multiple-checkbox',
			'choices' => $socials
		)
	)
));

$crypterio_config['primary_font_classes'];

STM_Customizer::setSection('typography_body', array(
	'title'  => esc_html__('Body', 'crypterio'),
	'panel'  => 'typography',
	'fields' => array(
		'body_font_family'      => array(
			'label'   => esc_html__('Base Font Family', 'crypterio'),
			'type'    => 'stm-font-family',
			'output'  => $crypterio_config['primary_font_classes'],
			'default' => $crypterio_config['primary_font_family']
		),
		'secondary_font_family' => array(
			'label'   => esc_html__('Secondary Font Family', 'crypterio'),
			'type'    => 'stm-font-family',
			'output'  => $crypterio_config['secondary_font_classes'],
			'default' => $crypterio_config['secondary_font_family']
		),
		'body_font_weight'      => array(
			'label'   => esc_html__('Font Weight', 'crypterio'),
			'type'    => 'stm-font-weight',
			'output'  => 'body',
			'default' => 400
		),
		'body_font_size'        => array(
			'label'   => esc_html__('Font Size', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'body',
			'default' => $crypterio_config['primary_font_size']
		)
	)
));

STM_Customizer::setSection('typography_p', array(
	'title'  => esc_html__('Paragraph', 'crypterio'),
	'panel'  => 'typography',
	'fields' => array(
		'p_font_weight' => array(
			'label'   => esc_html__('Font Weight', 'crypterio'),
			'type'    => 'stm-font-weight',
			'output'  => 'p',
			'default' => 400
		),
		'p_font_size'   => array(
			'label'   => esc_html__('Font Size', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'p',
			'default' => 14
		),
		'p_line_height' => array(
			'label'   => esc_html__('Line Height', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'line-height',
			'units'   => 'px',
			'output'  => 'p',
			'default' => 26
		)
	)
));

STM_Customizer::setSection('typography_h1', array(
	'title'  => esc_html__('H1', 'crypterio'),
	'panel'  => 'typography',
	'fields' => array(
		'h1_font_weight'    => array(
			'label'   => esc_html__('Font Weight', 'crypterio'),
			'type'    => 'stm-font-weight',
			'output'  => 'h1, .h1',
			'default' => 900
		),
		'h1_font_size'      => array(
			'label'   => esc_html__('Font Size', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'h1, .h1',
			'default' => 54
		),
		'h1_line_height'    => array(
			'label'   => esc_html__('Line Height', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'line-height',
			'units'   => 'px',
			'output'  => 'h1, .h1',
			'default' => 60
		),
		'h1_letter_spacing'    => array(
			'label'   => esc_html__('Letter Spacing', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'letter-spacing',
			'units'   => 'px',
			'output'  => 'h1, .h1',
			'default' => 0
		),
		'h1_text_transform' => array(
			'label'   => esc_html__('Text Transform', 'crypterio'),
			'type'    => 'stm-text-transform',
			'output'  => 'h1, .h1',
			'default' => 'lowercase'
		)
	)
));

STM_Customizer::setSection('typography_h2', array(
	'title'  => esc_html__('H2', 'crypterio'),
	'panel'  => 'typography',
	'fields' => array(
		'h2_font_weight'    => array(
			'label'   => esc_html__('Font Weight', 'crypterio'),
			'type'    => 'stm-font-weight',
			'output'  => 'h2, .h2',
			'default' => 700
		),
		'h2_font_size'      => array(
			'label'   => esc_html__('Font Size', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'h2, .h2',
			'default' => 36
		),
		'h2_line_height'    => array(
			'label'   => esc_html__('Line Height', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'line-height',
			'units'   => 'px',
			'output'  => 'h2, .h2',
			'default' => 45
		),
		'h2_letter_spacing'    => array(
			'label'   => esc_html__('Letter Spacing', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'letter-spacing',
			'units'   => 'px',
			'output'  => 'h2, .h2',
			'default' => 0
		),
		'h2_text_transform' => array(
			'label'   => esc_html__('Text Transform', 'crypterio'),
			'type'    => 'stm-text-transform',
			'output'  => 'h2, .h2',
			'default' => 'lowercase'
		)
	)
));

STM_Customizer::setSection('typography_h3', array(
	'title'  => esc_html__('H3', 'crypterio'),
	'panel'  => 'typography',
	'fields' => array(
		'h3_font_weight'    => array(
			'label'   => esc_html__('Font Weight', 'crypterio'),
			'type'    => 'stm-font-weight',
			'output'  => 'h3, .h3',
			'default' => 700
		),
		'h3_font_size'      => array(
			'label'   => esc_html__('Font Size', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'h3, .h3',
			'default' => 28
		),
		'h3_line_height'    => array(
			'label'   => esc_html__('Line Height', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'line-height',
			'units'   => 'px',
			'output'  => 'h3, .h3',
			'default' => 36
		),
		'h3_letter_spacing'    => array(
			'label'   => esc_html__('Letter Spacing', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'letter-spacing',
			'units'   => 'px',
			'output'  => 'h3, .h3',
			'default' => 0
		),
		'h3_text_transform' => array(
			'label'   => esc_html__('Text Transform', 'crypterio'),
			'type'    => 'stm-text-transform',
			'output'  => 'h3, .h3',
			'default' => 'none'
		)
	)
));

STM_Customizer::setSection('typography_h4', array(
	'title'  => esc_html__('H4', 'crypterio'),
	'panel'  => 'typography',
	'fields' => array(
		'h4_font_weight'    => array(
			'label'   => esc_html__('Font Weight', 'crypterio'),
			'type'    => 'stm-font-weight',
			'output'  => 'h4, .h4',
			'default' => 700
		),
		'h4_font_size'      => array(
			'label'   => esc_html__('Font Size', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'h4, .h4',
			'default' => 20
		),
		'h4_line_height'    => array(
			'label'   => esc_html__('Line Height', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'line-height',
			'units'   => 'px',
			'output'  => 'h4, .h4',
			'default' => 28
		),
		'h4_letter_spacing'    => array(
			'label'   => esc_html__('Letter Spacing', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'letter-spacing',
			'units'   => 'px',
			'output'  => 'h4, .h4',
			'default' => 0
		),
		'h4_text_transform' => array(
			'label'   => esc_html__('Text Transform', 'crypterio'),
			'type'    => 'stm-text-transform',
			'output'  => 'h4, .h4',
			'default' => 'none'
		)
	)
));

STM_Customizer::setSection('typography_h5', array(
	'title'  => esc_html__('H5', 'crypterio'),
	'panel'  => 'typography',
	'fields' => array(
		'h5_font_weight'    => array(
			'label'   => esc_html__('Font Weight', 'crypterio'),
			'type'    => 'stm-font-weight',
			'output'  => 'h5, .h5',
			'default' => 600
		),
		'h5_font_size'      => array(
			'label'   => esc_html__('Font Size', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'h5, .h5',
			'default' => 18
		),
		'h5_line_height'    => array(
			'label'   => esc_html__('Line Height', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'line-height',
			'units'   => 'px',
			'output'  => 'h5, .h5',
			'default' => 22
		),
		'h5_letter_spacing'    => array(
			'label'   => esc_html__('Letter Spacing', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'letter-spacing',
			'units'   => 'px',
			'output'  => 'h5, .h5',
			'default' => 0
		),
		'h5_text_transform' => array(
			'label'   => esc_html__('Text Transform', 'crypterio'),
			'type'    => 'stm-text-transform',
			'output'  => 'h5, .h5',
			'default' => 'none'
		)
	)
));

STM_Customizer::setSection('typography_h6', array(
	'title'  => esc_html__('H6', 'crypterio'),
	'panel'  => 'typography',
	'fields' => array(
		'h6_font_weight'    => array(
			'label'   => esc_html__('Font Weight', 'crypterio'),
			'type'    => 'stm-font-weight',
			'output'  => 'h6, .h6',
			'default' => 600
		),
		'h6_font_size'      => array(
			'label'   => esc_html__('Font Size', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'font-size',
			'units'   => 'px',
			'output'  => 'h6, .h6',
			'default' => 16
		),
		'h6_line_height'    => array(
			'label'   => esc_html__('Line Height', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'line-height',
			'units'   => 'px',
			'output'  => 'h6, .h6',
			'default' => 20
		),
		'h6_letter_spacing'    => array(
			'label'   => esc_html__('Letter Spacing', 'crypterio'),
			'type'    => 'stm-attr',
			'mode'    => 'letter-spacing',
			'units'   => 'px',
			'output'  => 'h6, .h6',
			'default' => 0
		),
		'h6_text_transform' => array(
			'label'   => esc_html__('Text Transform', 'crypterio'),
			'type'    => 'stm-text-transform',
			'output'  => 'h6, .h6',
			'default' => 'none'
		)
	)
));

STM_Customizer::setSection('archive_pages', array(
	'title'    => esc_html__('Archive Pages', 'crypterio'),
	'priority' => 40,
	'fields'   => array(
		'blog_layout'           => array(
			'type'    => 'radio',
			'label'   => esc_html__('Layout', 'crypterio'),
			'choices' => array(
				'grid' => esc_html__('Grid View', 'crypterio'),
				'list' => esc_html__('List View', 'crypterio')
			),
			'default' => 'list'
		),
		'blog_break_1'          => array(
			'type' => 'stm-separator',
		),
		'blog_sidebar_type'     => array(
			'type'    => 'radio',
			'label'   => esc_html__('Sidebar Type', 'crypterio'),
			'choices' => array(
				'wp' => esc_html__('Wordpress Sidebars', 'crypterio'),
				'vc' => esc_html__('VC Sidebars', 'crypterio')
			),
			'default' => 'wp'
		),
		'blog_break_2'          => array(
			'type' => 'stm-separator',
		),
		'blog_wp_sidebar'       => array(
			'type'      => 'stm-post-type',
			'post_type' => 'sidebar',
			'label'     => esc_html__('Wordpress Sidebar', 'crypterio'),
			'default'   => 'crypterio-right-sidebar'
		),
		'blog_vc_sidebar'       => array(
			'type'      => 'stm-post-type',
			'post_type' => 'stm_vc_sidebar',
			'label'     => esc_html__('VC Sidebar', 'crypterio')
		),
		'blog_break_3'          => array(
			'type' => 'stm-separator',
		),
		'blog_sidebar_position' => array(
			'type'    => 'radio',
			'label'   => esc_html__('Sidebar - Position', 'crypterio'),
			'choices' => array(
				'left'  => esc_html__('Left', 'crypterio'),
				'right' => esc_html__('Right', 'crypterio')
			),
			'default' => 'right'
		),
		'blog_break_4'          => array(
			'type' => 'stm-separator',
		),
	)
));

STM_Customizer::setSection('event_pages', array(
	'title'    => esc_html__('Event Pages', 'crypterio'),
	'priority' => 40,
	'fields'   => array(
		'event_sidebar_type'     => array(
			'type'    => 'radio',
			'label'   => esc_html__('Sidebar Type', 'crypterio'),
			'choices' => array(
				'wp' => esc_html__('Wordpress Sidebars', 'crypterio'),
				'vc' => esc_html__('VC Sidebars', 'crypterio')
			),
			'default' => 'wp'
		),
		'event_break_2'          => array(
			'type' => 'stm-separator',
		),
		'event_wp_sidebar'       => array(
			'type'      => 'stm-post-type',
			'post_type' => 'sidebar',
			'label'     => esc_html__('Wordpress Sidebar', 'crypterio'),
			'default'   => 'crypterio-event'
		),
		'event_vc_sidebar'       => array(
			'type'      => 'stm-post-type',
			'post_type' => 'stm_vc_sidebar',
			'label'     => esc_html__('VC Sidebar', 'crypterio')
		),
		'event_break_3'          => array(
			'type' => 'stm-separator',
		),
		'event_terms_conditions' => array(
			'label'   => esc_html__('Terms and Conditions Page Link', 'crypterio'),
			'type'    => 'stm-text',
			'default' => ''
		),
		'event_break_5'          => array(
			'type' => 'stm-separator',
		),
	)
));

STM_Customizer::setSection('shop_pages', array(
	'title'    => esc_html__('Shop Pages', 'crypterio'),
	'priority' => 40,
	'fields'   => array(
		'shop_sidebar_type'      => array(
			'type'    => 'radio',
			'label'   => esc_html__('Sidebar Type', 'crypterio'),
			'choices' => array(
				'wp' => esc_html__('Wordpress Sidebars', 'crypterio'),
				'vc' => esc_html__('VC Sidebars', 'crypterio')
			),
			'default' => 'wp'
		),
		'shop_break_2'           => array(
			'type' => 'stm-separator',
		),
		'shop_wp_sidebar'        => array(
			'type'      => 'stm-post-type',
			'post_type' => 'sidebar',
			'label'     => esc_html__('Wordpress Sidebar', 'crypterio'),
			'default'   => 'crypterio-shop'
		),
		'shop_vc_sidebar'        => array(
			'type'      => 'stm-post-type',
			'post_type' => 'stm_vc_sidebar',
			'label'     => esc_html__('VC Sidebar', 'crypterio')
		),
		'shop_break_3'           => array(
			'type' => 'stm-separator',
		),
		'shop_sidebar_position'  => array(
			'type'    => 'radio',
			'label'   => esc_html__('Sidebar - Position', 'crypterio'),
			'choices' => array(
				'left'  => esc_html__('Left', 'crypterio'),
				'right' => esc_html__('Right', 'crypterio')
			),
			'default' => 'right'
		),
		'shop_break_4'           => array(
			'type' => 'stm-separator',
		),
		'shop_products_per_page' => array(
			'label'   => esc_html__('Products Per Page', 'crypterio'),
			'default' => 9,
			'type'    => 'stm-text'
		),
		'shop_break_5'           => array(
			'type' => 'stm-separator',
		),
	)
));

STM_Customizer::setSection('google_api_settings', array(
	'title'    => esc_html__('Google Map Api Settings', 'crypterio'),
	'panel'    => 'site_settings',
	'priority' => 300,
	'fields'   => array(
		'google_api_key' => array(
			'label'       => esc_html__('Google Map API Key', 'crypterio'),
			'type'        => 'text',
			'description' => esc_html__('Enter here the secret api key you have created on Google APIs. You can enable MAP API in Google APIs > Google Maps APIs > Google Maps JavaScript API.', 'crypterio')
		),
	)
));

$allowed_tags = array(
	'a' => array(
		'href'  => array(),
		'title' => array()
	)
);

$html = 'You can get a Google reCAPTCHA API from <a href="http://' . 'www.google.com/recaptcha/intro/" target="_blank">here</a>';

STM_Customizer::setSection('recaptcha', array(
	'title'    => esc_html__('Google Recaptcha API Settings', 'crypterio'),
	'panel'    => 'site_settings',
	'priority' => 301,
	'fields'   => array(
		'enable_recaptcha'     => array(
			'label'       => esc_html__('Recaptcha', 'crypterio'),
			'type'        => 'checkbox',
			'description' => wp_kses($html, $allowed_tags)
		),
		'recaptcha_public_key' => array(
			'label' => esc_html__('Public key', 'crypterio'),
			'type'  => 'text',
		),
		'recaptcha_secret_key' => array(
			'label' => esc_html__('Secret key', 'crypterio'),
			'type'  => 'text',
		),
	)
));

STM_Customizer::setSection('socials', array(
	'title'    => esc_html__('Socials', 'crypterio'),
	'priority' => 70,
	'fields'   => array(
		'socials' => array(
			'type'    => 'stm-socials',
			'choices' => $socials
		)
	)
));

STM_Customizer::setSection('custom_css', array(
	'title'    => esc_html__('Custom CSS', 'crypterio'),
	'priority' => 80,
	'fields'   => array(
		'custom_css' => array(
			'label'       => '',
			'type'        => 'stm-code',
			'placeholder' => ".classname {\n\tbackground: #000;\n}"
		)
	)
));