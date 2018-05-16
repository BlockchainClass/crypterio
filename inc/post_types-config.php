<?php

$defaultPostTypesOptions = array(
    'stm_event'     => array(
        'title'        => get_theme_mod( 'post_type_events_title', esc_html__( 'Event', 'crypterio' ) ),
        'plural_title' => get_theme_mod( 'post_type_events_plural', esc_html__( 'Events', 'crypterio' ) ),
        'all_items'    => get_theme_mod( 'post_type_events_all_items', esc_html__( 'All Events', 'crypterio' ) ),
        'rewrite'      => get_theme_mod( 'post_type_events_rewrite', 'events' ),
        'icon'         => get_theme_mod( 'post_type_events_icon', 'dashicons-calendar-alt' ),
        'supports'     => array( 'title', 'thumbnail', 'editor', 'excerpt' )
    ),
    'event_member'  => array(
        'title'                 => get_theme_mod( 'post_type_events_title', esc_html__( 'Member', 'crypterio' ) ),
        'exclude_from_search'   => true,
        'publicly_queryable'    => false,
        'show_in_menu'          => 'edit.php?post_type=stm_event',
        'supports'              => array( 'title', 'editor' )
    ),
	'stm_service'     => array(
		'title'        => get_theme_mod( 'post_type_services_title', esc_html__( 'Service', 'crypterio' ) ),
		'plural_title' => get_theme_mod( 'post_type_services_plural', esc_html__( 'Services', 'crypterio' ) ),
		'all_items'    => get_theme_mod( 'post_type_services_all_items', esc_html__( 'All Services', 'crypterio' ) ),
		'rewrite'      => get_theme_mod( 'post_type_services_rewrite', 'services' ),
		'icon'         => get_theme_mod( 'post_type_services_icon', 'dashicons-clipboard' ),
		'supports'     => array( 'title', 'thumbnail', 'editor', 'excerpt' )
	),
	'stm_careers'     => array(
		'title'        => get_theme_mod( 'post_type_careers_title', esc_html__( 'Vacancy', 'crypterio' ) ),
		'plural_title' => get_theme_mod( 'post_type_careers_plural', esc_html__( 'Vacancies', 'crypterio' ) ),
		'all_items'    => get_theme_mod( 'post_type_careers_all_items', esc_html__( 'All Vacancies', 'crypterio' ) ),
		'rewrite'      => get_theme_mod( 'post_type_careers_rewrite', 'careers_archive' ),
		'icon'         => get_theme_mod( 'post_type_careers_icon', 'dashicons-id' ),
		'supports'     => array( 'title', 'editor' )
	),
	'stm_staff'       => array(
		'title'               => get_theme_mod( 'post_type_staff_title', esc_html__( 'Staff', 'crypterio' ) ),
		'plural_title'        => get_theme_mod( 'post_type_staff_plural', esc_html__( 'Staff', 'crypterio' ) ),
		'all_items'           => get_theme_mod( 'post_type_staff_all_items', esc_html__( 'All Staff', 'crypterio' ) ),
		'rewrite'             => get_theme_mod( 'post_type_staff_rewrite', 'staff' ),
		'icon'                => get_theme_mod( 'post_type_careers_icon', 'dashicons-groups' ),
		'supports'            => array( 'title', 'excerpt', 'editor', 'thumbnail' )
	),
	'stm_works'       => array(
		'title'               => get_theme_mod( 'post_type_works_title', esc_html__( 'Work', 'crypterio' ) ),
		'plural_title'        => get_theme_mod( 'post_type_works_plural', esc_html__( 'Works', 'crypterio' ) ),
		'all_items'           => get_theme_mod( 'post_type_works_all_items', esc_html__( 'All Works', 'crypterio' ) ),
		'rewrite'             => get_theme_mod( 'post_type_works_rewrite', 'works' ),
		'icon'                => get_theme_mod( 'post_type_works_icon', 'dashicons-portfolio' ),
		'supports'            => array( 'title', 'excerpt', 'editor', 'thumbnail' )
	),
	'stm_testimonials' => array(
		'title'               => get_theme_mod( 'post_type_testimonials_title', esc_html__( 'Testimonial', 'crypterio' ) ),
		'plural_title'        => get_theme_mod( 'post_type_testimonials_plural', esc_html__( 'Testimonials', 'crypterio' ) ),
		'all_items'           => get_theme_mod( 'post_type_testimonials_all_items', esc_html__( 'All Testimonials', 'crypterio' ) ),
		'rewrite'             => get_theme_mod( 'post_type_testimonials_rewrite', 'testimonials' ),
		'icon'                => get_theme_mod( 'post_type_services_icon', 'dashicons-testimonial' ),
		'supports'            => array( 'title', 'excerpt', 'thumbnail' ),
		'exclude_from_search' => true,
		'publicly_queryable'  => false
	),
	'stm_vc_sidebar'  => array(
		'title'               => esc_html__( 'VC Sidebar', 'crypterio' ),
		'plural_title'        => esc_html__( 'VC Sidebars', 'crypterio' ),
		'all_items'           => esc_html__( 'All Sidebars', 'crypterio' ),
		'rewrite'             => 'vc_sidebar',
		'icon'                => 'dashicons-schedule',
		'supports'            => array( 'title', 'editor' ),
		'exclude_from_search' => true,
		'publicly_queryable'  => false
	),
    'stm_portfolio'     => array(
        'title'        => get_theme_mod( 'post_type_portfolio_title', esc_html__( 'Portfolio', 'crypterio' ) ),
        'plural_title' => get_theme_mod( 'post_type_portfolio_plural', esc_html__( 'Portfolio', 'crypterio' ) ),
        'all_items'    => get_theme_mod( 'post_type_portfolio_all_items', esc_html__( 'All Portfolio', 'crypterio' ) ),
        'rewrite'      => get_theme_mod( 'post_type_portfolio_rewrite', 'portfolio' ),
        'icon'         => get_theme_mod( 'post_type_portfolio_icon', 'dashicons-portfolio' ),
        'supports'     => array( 'title', 'thumbnail', 'editor', 'excerpt' )
    ),
);

foreach ( $defaultPostTypesOptions as $post_type => $data ) {
	$args = array();

	if ( ! empty( $data['plural_title'] ) ) {
		$args['pluralTitle'] = $data['plural_title'];
	}
	if ( ! empty( $data['all_items'] ) ) {
		$args['all_items'] = $data['all_items'];
	}
	if ( ! empty( $data['icon'] ) ) {
		$args['menu_icon'] = $data['icon'];
	}
	if ( ! empty( $data['rewrite'] ) ) {
		$args['rewrite'] = array( 'slug' => $data['rewrite'] );
	}
	if ( ! empty( $data['supports'] ) ) {
		$args['supports'] = $data['supports'];
	}
	if ( ! empty( $data['exclude_from_search'] ) ) {
		$args['exclude_from_search'] = $data['exclude_from_search'];
	}
	if ( ! empty( $data['publicly_queryable'] ) ) {
		$args['publicly_queryable'] = $data['publicly_queryable'];
	}
	if ( ! empty( $data['show_in_menu'] ) ) {
		$args['show_in_menu'] = $data['show_in_menu'];
	}
	STM_PostType::registerPostType( $post_type, esc_html( $data['title'] ), $args );
}

STM_PostType::addTaxonomy( 'stm_testimonials_category', esc_html__( 'Categories', 'crypterio' ), 'stm_testimonials' );
STM_PostType::addTaxonomy( 'stm_event_category', __( 'Categories', 'crypterio' ), 'stm_event' );
STM_PostType::addTaxonomy( 'stm_service_category', __( 'Categories', 'crypterio' ), 'stm_service' );
STM_PostType::addTaxonomy( 'stm_works_category', esc_html__( 'Categories', 'crypterio' ), 'stm_works' );
STM_PostType::addTaxonomy( 'stm_staff_category', esc_html__( 'Categories', 'crypterio' ), 'stm_staff' );
STM_PostType::addTaxonomy( 'stm_portfolio_category', __( 'Categories', 'crypterio' ), 'stm_portfolio' );

if ( ! function_exists( 'stm_post_types_init' ) ) {
	function stm_post_types_init() {

		// Default Values
		$metabox_header_inverse = get_theme_mod( 'metabox_header_inverse', false );
		$metabox_disable_title_box = get_theme_mod( 'metabox_disable_title_box', false );
		$metabox_enable_transparent = get_theme_mod( 'metabox_enable_transparent', false );
		$metabox_title_box_title_color = get_theme_mod( 'metabox_title_box_title_color' );
		$metabox_title_box_title_line_color = get_theme_mod( 'metabox_title_box_title_line_color' );
        $metabox_title_box_title_bg_color = get_theme_mod( 'metabox_title_box_title_bg_color' );
		$metabox_title_box_bg_image = get_theme_mod( 'metabox_title_box_bg_image' );
		$metabox_title_box_bg_position = get_theme_mod( 'metabox_title_box_bg_position' );
		$metabox_title_box_bg_size = get_theme_mod( 'metabox_title_box_bg_size' );
		$metabox_title_box_bg_repeat = get_theme_mod( 'metabox_title_box_bg_repeat', 'no-repeat' );
		$metabox_disable_title = get_theme_mod( 'metabox_disable_title', false );
		$metabox_disable_breadcrumbs = get_theme_mod( 'metabox_disable_breadcrumbs', false );
		$metabox_enable_header_transparent = get_theme_mod( 'metabox_enable_header_transparent', false );
		$metabox_content_bg_transparent = get_theme_mod( 'metabox_content_bg_transparent', false );
		$metabox_footer_copyright_border_t = get_theme_mod( 'metabox_footer_copyright_border_t', false );

		STM_PostType::addMetaBox( 'page_setup', esc_html__( 'Page Setup', 'crypterio' ), array( 'page', 'post', 'stm_event', 'stm_service', 'stm_careers', 'stm_staff', 'stm_works', 'stm_portfolio', 'product' ), '', '', '', array(
			'fields' => array(
				'separator_header_options' => array(
					'label' => esc_html__( 'Header Options', 'crypterio' ),
					'type'  => 'separator'
				),
				'header_inverse'=> array(
					'label' => esc_html__( 'Style - Inverse', 'crypterio' ),
					'type'  => 'checkbox',
					'default' => $metabox_header_inverse
				),
				'separator_title_box_options' => array(
					'label' => esc_html__( 'Title Box Options', 'crypterio' ),
					'type'  => 'separator'
				),
				'disable_title_box' => array(
					'label' => esc_html__( 'Disable Title Box', 'crypterio' ),
					'type'  => 'checkbox',
					'default' => $metabox_disable_title_box
				),
				'enable_transparent' => array(
					'label' => esc_html__( 'Enable Transparent', 'crypterio' ),
					'type'  => 'checkbox',
					'default' => $metabox_enable_transparent
				),
				'title_box_title_color' => array(
					'label' => esc_html__( 'Title Color', 'crypterio' ),
					'type'  => 'color_picker',
					'default' => $metabox_title_box_title_color
				),
				'title_box_title_line_color' => array(
					'label' => esc_html__( 'Title Line Color', 'crypterio' ),
					'type'  => 'color_picker',
					'default' => $metabox_title_box_title_line_color
				),
                'title_box_title_bg_color' => array(
                    'label' => esc_html__( 'Title Background Color', 'crypterio' ),
                    'type'  => 'color_picker',
                    'default' => $metabox_title_box_title_bg_color
                ),
				'title_box_bg_image' => array(
					'label' => esc_html__( 'Background Image', 'crypterio' ),
					'type'  => 'image',
					'default' => $metabox_title_box_bg_image
				),
				'title_box_bg_position' => array(
					'label' => esc_html__( 'Background Position', 'crypterio' ),
					'type'  => 'text',
					'default' => $metabox_title_box_bg_position
				),
				'title_box_bg_size' => array(
					'label' => esc_html__( 'Background Size', 'crypterio' ),
					'type'  => 'text',
					'default' => $metabox_title_box_bg_size
				),
				'title_box_bg_repeat' => array(
					'label'   => esc_html__( 'Background Repeat', 'crypterio' ),
					'type'    => 'select',
					'options' => array(
						'repeat'    => esc_html__( 'Repeat', 'crypterio' ),
						'no-repeat' => esc_html__( 'No Repeat', 'crypterio' ),
						'repeat-x'  => esc_html__( 'Repeat-X', 'crypterio' ),
						'repeat-y'  => esc_html__( 'Repeat-Y', 'crypterio' )
					),
					'default' => $metabox_title_box_bg_repeat
				),
				'disable_title' => array(
					'label' => esc_html__( 'Disable Title', 'crypterio' ),
					'type'  => 'checkbox',
					'default' => $metabox_disable_title
				),
				'disable_breadcrumbs' => array(
					'label' => esc_html__( 'Disable Breadcrumbs', 'crypterio' ),
					'type'  => 'checkbox',
					'default' => $metabox_disable_breadcrumbs
				),
				'enable_header_transparent' => array(
					'label' => esc_html__( 'Enable Header Transparent', 'crypterio' ),
					'type'  => 'checkbox',
					'default' => $metabox_enable_header_transparent
				),
				'separator_content_options' => array(
					'label' => esc_html__( 'Content Options', 'crypterio' ),
					'type'  => 'separator'
				),
				'content_bg_transparent'=> array(
					'label' => esc_html__( 'Background - Transparent (Work only with "Boxed Mode")', 'crypterio' ),
					'type'  => 'checkbox',
					'default' => $metabox_content_bg_transparent
				),
				'separator_footer_options' => array(
					'label' => esc_html__( 'Footer Options', 'crypterio' ),
					'type'  => 'separator'
				),
				'separator_footer_copyright_border_t' => array(
					'label' => esc_html__( 'Border Top - Hide', 'crypterio' ),
					'type'  => 'checkbox',
					'default' => $metabox_footer_copyright_border_t
				)
			)
		) );

		$testimonials_info = array(
			'testimonial_position' => array(
				'label' => esc_html__( 'Position', 'crypterio' ),
				'type'  => 'text'
			),
			'testimonial_company' => array(
				'label' => esc_html__( 'Company', 'crypterio' ),
				'type'  => 'text'
			),
			'testimonial_bg_img' => array(
				'label' => esc_html__( 'Background Image', 'crypterio' ),
				'type'  => 'image'
			)
		);

		STM_PostType::addMetaBox( 'testimonials_info', esc_html__( 'Information', 'crypterio' ), array( 'stm_testimonials' ), '', '', '', array(
			'fields' => $testimonials_info
		) );

		STM_PostType::addMetaBox( 'careers_information', esc_html__( 'Information', 'crypterio' ), array( 'stm_careers' ), '', '', '', array(
			'fields' => array(
				'department'   => array(
					'label' => esc_html__( 'Department', 'crypterio' ),
					'type'  => 'text'
				),
				'location'     => array(
					'label' => esc_html__( 'Location', 'crypterio' ),
					'type'  => 'text'
				),
				'education'    => array(
					'label' => esc_html__( 'Education', 'crypterio' ),
					'type'  => 'text'
				),
				'compensation' => array(
					'label' => esc_html__( 'Compensation', 'crypterio' ),
					'type'  => 'text'
				),
				'contact_link' => array(
					'label' => esc_html__( 'Contact Us Link', 'crypterio' ),
					'type'  => 'text'
				),
			)
		) );

		STM_PostType::addMetaBox( 'staff_information', esc_html__( 'Information', 'crypterio' ), array( 'stm_staff' ), '', '', '', array(
			'fields' => array(
				'department'  => array(
					'label' => esc_html__( 'Department', 'crypterio' ),
					'type'  => 'text'
				),
				'address'  => array(
					'label' => esc_html__( 'Address', 'crypterio' ),
					'type'  => 'text'
				),
				'phone'       => array(
					'label' => esc_html__( 'Phone', 'crypterio' ),
					'type'  => 'text'
				),
				'skype'       => array(
					'label' => esc_html__( 'Skype', 'crypterio' ),
					'type'  => 'text'
				),
				'email'       => array(
					'label' => esc_html__( 'Email', 'crypterio' ),
					'type'  => 'text'
				),
				'facebook'    => array(
					'label' => esc_html__( 'Facebook', 'crypterio' ),
					'type'  => 'text'
				),
				'twitter'     => array(
					'label' => esc_html__( 'Twitter', 'crypterio' ),
					'type'  => 'text'
				),
				'google_plus' => array(
					'label' => esc_html__( 'Google+', 'crypterio' ),
					'type'  => 'text'
				),
				'linkedin'    => array(
					'label' => esc_html__( 'Linkedin', 'crypterio' ),
					'type'  => 'text'
				),
			)
		) );

        STM_PostType::addMetaBox( 'event_member_contact_info', esc_html__( 'Contact Info', 'crypterio' ), array( 'event_member' ), '', '', '', array(
            'fields' => array(
                'name'   => array(
                    'label' => esc_html__( 'Name', 'crypterio' ),
                    'type'  => 'text'
                ),
                'email'   => array(
                    'label' => esc_html__( 'Email', 'crypterio' ),
                    'type'  => 'text'
                ),
                'phone'   => array(
                    'label' => esc_html__( 'Phone', 'crypterio' ),
                    'type'  => 'text'
                ),
                'company'   => array(
                    'label' => esc_html__( 'Company', 'crypterio' ),
                    'type'  => 'text'
                ),
                'memberId'   => array(
                    'label' => esc_html__( 'Member ID', 'crypterio' ),
                    'type'  => 'text'
                )
            )
        ) );

        STM_PostType::addMetaBox( 'portfolio_information', esc_html__( 'Portfolio image size', 'crypterio' ), array( 'stm_portfolio' ), '', '', '', array(
            'fields' => array(
                'stm_portfolio_column' => array(
                    'label'   => esc_html__( 'Size', 'crypterio' ),
                    'type'    => 'select',
                    'options' => array(
                        'default'    => esc_html__( 'Default', 'crypterio' ),
                        'wide' => esc_html__( 'Wide', 'crypterio' ),
                        'long'  => esc_html__( 'High', 'crypterio' )
                    ),
                )
            )
        ) );

		STM_PostType::addMetaBox( 'service_information', esc_html__( 'Information', 'crypterio' ), array( 'stm_service' ), '', '', '', array(
			'fields' => array(
				'service_label' => array(
					'label' => esc_html__( 'Label', 'crypterio' ),
					'type'  => 'text'
				),
				'service_cost' => array(
					'label' => esc_html__( 'Cost', 'crypterio' ),
					'type'  => 'text'
				)
			)
		) );

	}
}

add_action( 'init', 'stm_post_types_init' );