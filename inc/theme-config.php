<?php
//add_action('init', 'crypterio_change_layout');

function crypterio_change_layout()
{
    update_option('crypterio_layout', 'counselor');
}

if (!function_exists('crypterio_config')) {
    function crypterio_config()
    {

        $config = array();
        $crypterio_layout = get_option('crypterio_layout');

        $config['layout'] = ((!empty($crypterio_layout)) ? $crypterio_layout : 'default');
        $config['fonts'] = '';

        switch ($config['layout']) {
            case "ico" :
                $config['fonts'] = array(
                    'roboto' => 'Roboto:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic',
                    'roboto_slab' => 'Roboto Slab:400,500,300,600,700&subset=latin,latin-ext,devanagari'
                );

                $config['primary_font_family'] = 'Roboto';
                $config['primary_font_size'] = 14;
                $config['primary_font_classes'] = 'body,
					body .vc_general.vc_btn3 small,
					.default_widgets .widget.widget_nav_menu ul li .children li,
					.default_widgets .widget.widget_categories ul li .children li,
					.default_widgets .widget.widget_product_categories ul li .children li,
					.stm_sidebar .widget.widget_nav_menu ul li .children li,
					.stm_sidebar .widget.widget_categories ul li .children li,
					.stm_sidebar .widget.widget_product_categories ul li .children li,
					.shop_widgets .widget.widget_nav_menu ul li .children li,
					.shop_widgets .widget.widget_categories ul li .children li,
					.shop_widgets .widget.widget_product_categories ul li .children li,
					.stm_crypto_converter .vcw.vcw-converter .vcw-input .vcw-currency';

                $config['secondary_font_family'] = 'Roboto Slab';
                $config['secondary_font_classes'] = 'h1, .h1,
					h2, .h2,
					h3, .h3,
					h4, .h4,
					h5, .h5,
					h6, .h6,
					.top_nav .top_nav_wrapper > ul,
					.top_nav .icon_text strong,
					.stm_testimonials .item .testimonial-info .testimonial-text .name,
					.stats_counter .counter_title,
					.stm_contact .stm_contact_info .stm_contact_job,
					.vacancy_table_wr .vacancy_table thead th,
					.testimonials_carousel .testimonial .info .position,
					.testimonials_carousel .testimonial .info .company,
					.stm_gmap_wrapper .gmap_addresses .addresses .item .title,
					.company_history > ul > li .year,
					.stm_contacts_widget,
					.stm_works_wr.grid .stm_works .item .item_wr .title,
					.stm_works_wr.grid_with_filter .stm_works .item .info .title,
					body .vc_general.vc_btn3,
					.crypterio-rev-title,
					.crypterio-rev-title-2,
					.crypterio-rev-title-3,
					.crypterio-rev-text,
					body .vc_tta-container .vc_tta.vc_general.vc_tta-tabs.theme_style .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a,
					strong, b,
					.button,
					.woocommerce a.button,
					.woocommerce button.button,
					.woocommerce input.button,
					.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
					.woocommerce input.button.alt,
					.request_callback p,
					ul.comment-list .comment .comment-author,
					.page-numbers .page-numbers,
					#footer .footer_widgets .widget.widget_recent_entries ul li a,
					.default_widgets .widget.widget_nav_menu ul li,
					.default_widgets .widget.widget_categories ul li,
					.default_widgets .widget.widget_product_categories ul li,
					.stm_sidebar .widget.widget_nav_menu ul li, .stm_sidebar .widget.widget_categories ul li,
					.stm_sidebar .widget.widget_product_categories ul li,
					.shop_widgets .widget.widget_nav_menu ul li,
					.shop_widgets .widget.widget_categories ul li,
					.shop_widgets .widget.widget_product_categories ul li,
					.default_widgets .widget.widget_recent_entries ul li a,
					.stm_sidebar .widget.widget_recent_entries ul li a,
					.shop_widgets .widget.widget_recent_entries ul li a,
					.staff_bottom_wr .staff_bottom .infos .info,
					.woocommerce .widget_price_filter .price_slider_amount .button,
					.woocommerce ul.product_list_widget li .product-title,
					.woocommerce ul.products li.product .price,
					.woocommerce a.added_to_cart,
					.woocommerce div.product .woocommerce-tabs ul.tabs li a,
					.woocommerce div.product form.cart .variations label,
					.woocommerce table.shop_table th,
					.woocommerce-cart table.cart th.product-name a,
					.woocommerce-cart table.cart td.product-name a,
					.woocommerce-cart table.cart th .amount,
					.woocommerce-cart table.cart td .amount,
					.stm_services .item .item_wr .content .read_more,
					.staff_list ul li .staff_info .staff_department,
					.stm_partner.style_2 .stm_partner_content .position,
					.staff_carousel_item .staff_department,
					body.header_style_5 .header_top .info-text strong,
					.stm_services_tabs .services_categories ul li a,
					.stm_services_tabs .service_tab_item .service_name,
					.stm_services_tabs .service_tab_item .service_cost,
					.stm_works_wr.grid_2.style_1 .stm_works .item .item_wr .title,
					.stm_works_wr.grid_2.style_2 .stm_works .item .item_wr .title,
					.stm_works_wr.grid_with_filter.style_1 .stm_works .item .item_wr .title,
					.stm_works_wr.grid_with_filter.style_2 .stm_works .item .item_wr .title,
					body.header_style_7 .side_nav .main_menu_nav > li > a,
					body.header_style_7 .side_nav .main_menu_nav > li ul li a,
					body.header_style_5 .header_top .info-text b,
					.stm-header .stm-dropdown_style_1,
					.stm_ico_countdown__button,
					.stm_contacts_widget.style_4';

                $config['base_color'] = '#1d1e20';
                $config['secondary_color'] = '#ffaa00';
                $config['third_color'] = '#0048a8';


                $config['base_rgb_color'] = array(
                    'rgb' => '38, 17, 0',
                    'alpha' => array('0.9', '0.75', '0.5', '0.25', '0.21')
                );
                $config['secondary_rgb_color'] = array(
                    'rgb' => '255, 48, 38',
                    'alpha' => array('0.9')
                );
                $config['third_rgb_color'] = array(
                    'rgb' => '255, 196, 12',
                    'alpha' => array('0.5')
                );
            case 'advisor':
                $config['primary_font_family'] = 'Source Sans Pro';
                $config['primary_font_size'] = 14;
                $config['primary_font_classes'] = 'body,
					body .vc_general.vc_btn3 small,
					.default_widgets .widget.widget_nav_menu ul li .children li,
					.default_widgets .widget.widget_categories ul li .children li,
					.default_widgets .widget.widget_product_categories ul li .children li,
					.stm_sidebar .widget.widget_nav_menu ul li .children li,
					.stm_sidebar .widget.widget_categories ul li .children li,
					.stm_sidebar .widget.widget_product_categories ul li .children li,
					.shop_widgets .widget.widget_nav_menu ul li .children li,
					.shop_widgets .widget.widget_categories ul li .children li,
					.shop_widgets .widget.widget_product_categories ul li .children li,
					body.header_style_4 .header_top .icon_text .text strong';

                $config['secondary_font_family'] = 'Poppins';
                $config['secondary_font_classes'] = 'h1, .h1,
					h2, .h2,
					h3, .h3,
					h4, .h4,
					h5, .h5,
					h6, .h6,
					.top_nav .top_nav_wrapper > ul,
					.top_nav .icon_text strong,
					.stm_testimonials .item .testimonial-info .testimonial-text .name,
					.stats_counter .counter_title,
					.stm_contact .stm_contact_info .stm_contact_job,
					.vacancy_table_wr .vacancy_table thead th,
					.testimonials_carousel .testimonial .info .position,
					.testimonials_carousel .testimonial .info .company,
					.stm_gmap_wrapper .gmap_addresses .addresses .item .title,
					.company_history > ul > li .year,
					.stm_contacts_widget,
					.stm_works_wr.grid .stm_works .item .item_wr .title,
					.stm_works_wr.grid_with_filter .stm_works .item .info .title,
					body .vc_general.vc_btn3,
					.consulting-rev-title,
					.consulting-rev-title-2,
					.consulting-rev-title-3,
					.consulting-rev-text,
					body .vc_tta-container .vc_tta.vc_general.vc_tta-tabs.theme_style .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a,
					strong, b,
					.button,
					.woocommerce a.button,
					.woocommerce button.button,
					.woocommerce input.button,
					.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
					.woocommerce input.button.alt,
					.request_callback p,
					ul.comment-list .comment .comment-author,
					.page-numbers .page-numbers,
					#footer .footer_widgets .widget.widget_recent_entries ul li a,
					.default_widgets .widget.widget_nav_menu ul li,
					.default_widgets .widget.widget_categories ul li,
					.default_widgets .widget.widget_product_categories ul li,
					.stm_sidebar .widget.widget_nav_menu ul li, .stm_sidebar .widget.widget_categories ul li,
					.stm_sidebar .widget.widget_product_categories ul li,
					.shop_widgets .widget.widget_nav_menu ul li,
					.shop_widgets .widget.widget_categories ul li,
					.shop_widgets .widget.widget_product_categories ul li,
					.default_widgets .widget.widget_recent_entries ul li a,
					.stm_sidebar .widget.widget_recent_entries ul li a,
					.shop_widgets .widget.widget_recent_entries ul li a,
					.staff_bottom_wr .staff_bottom .infos .info,
					.woocommerce .widget_price_filter .price_slider_amount .button,
					.woocommerce ul.product_list_widget li .product-title,
					.woocommerce ul.products li.product .price,
					.woocommerce a.added_to_cart,
					.woocommerce div.product .woocommerce-tabs ul.tabs li a,
					.woocommerce div.product form.cart .variations label,
					.woocommerce table.shop_table th,
					.woocommerce-cart table.cart th.product-name a,
					.woocommerce-cart table.cart td.product-name a,
					.woocommerce-cart table.cart th .amount,
					.woocommerce-cart table.cart td .amount,
					.stm_services .item .item_wr .content .read_more,
					.staff_list ul li .staff_info .staff_department,
					.stm_partner.style_2 .stm_partner_content .position,
					.wpb_text_column ul li,
					.comment-body .comment-text ul li,
					body.header_style_4 .header_top .icon_text.big .text strong,
					.info_box .read_more,
					.stm_services_tabs .service_tab_item .service_name,
					.stm_services_tabs .services_categories ul li a,
					.stm_services_tabs .service_tab_item .service_cost,
					.vc_custom_heading .subtitle,
					.stm_gmap_wrapper .gmap_addresses .addresses .item .title,
					.info_box h4,
					.testimonials_carousel.style_2 .item .testimonial-info .testimonial-text .name,
					.staff_carousel_item .staff_department,
					body.header_style_5 .header_top .info-text strong,
					.stm_works_wr.grid_2.style_1 .stm_works .item .item_wr .title,
					.stm_works_wr.grid_2.style_2 .stm_works .item .item_wr .title,
					.stm_works_wr.grid_with_filter.style_1 .stm_works .item .item_wr .title,
					.stm_works_wr.grid_with_filter.style_2 .stm_works .item .item_wr .title,
					body.header_style_7 .side_nav .main_menu_nav > li > a,
					body.header_style_7 .side_nav .main_menu_nav > li ul li a,
					body.header_style_5 .header_top .info-text b,
					heading_font';

                $config['fonts'] = array(
                    'open_sans' => 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic',
                    'montserrat' => 'Montserrat:400,700'
                );

                $config['base_color'] = '#001040';
                $config['secondary_color'] = '#ffa200';
                $config['third_color'] = '#ffa200';


                $config['base_rgb_color'] = array(
                    'rgb' => '0, 16, 64',
                    'alpha' => array('0.25', '0.21', '0.9', '0.75', '0.5', '0.8', '0.85', '0.7')
                );
                $config['secondary_rgb_color'] = array(
                    'rgb' => '255, 162, 0',
                    'alpha' => ''
                );
                $config['third_rgb_color'] = array(
                    'rgb' => '255, 162, 0',
                    'alpha' => ''
                );

                break;
			case 'corporate':
				$config['primary_font_family'] = 'Open Sans';
				$config['primary_font_size'] = 14;
				$config['primary_font_classes'] = 'body,
					body .vc_general.vc_btn3 small,
					.default_widgets .widget.widget_nav_menu ul li .children li,
					.default_widgets .widget.widget_categories ul li .children li,
					.default_widgets .widget.widget_product_categories ul li .children li,
					.stm_sidebar .widget.widget_nav_menu ul li .children li,
					.stm_sidebar .widget.widget_categories ul li .children li,
					.stm_sidebar .widget.widget_product_categories ul li .children li,
					.shop_widgets .widget.widget_nav_menu ul li .children li,
					.shop_widgets .widget.widget_categories ul li .children li,
					.shop_widgets .widget.widget_product_categories ul li .children li,
					body.header_style_4 .header_top .icon_text .text strong,
					.stm-header.stm-header__hb .stm-cart_style_1 .cart_rounded';

				$config['secondary_font_family'] = 'Montserrat';
				$config['secondary_font_classes'] = 'h1, .h1,
					h2, .h2,
					h3, .h3,
					h4, .h4,
					h5, .h5,
					h6, .h6,
					.top_nav .top_nav_wrapper > ul,
					.top_nav .icon_text strong,
					.stm_testimonials .item .testimonial-info .testimonial-text .name,
					.stats_counter .counter_title,
					.stm_contact .stm_contact_info .stm_contact_job,
					.vacancy_table_wr .vacancy_table thead th,
					.testimonials_carousel .testimonial .info .position,
					.testimonials_carousel .testimonial .info .company,
					.stm_gmap_wrapper .gmap_addresses .addresses .item .title,
					.company_history > ul > li .year,
					.stm_contacts_widget,
					.stm_works_wr.grid .stm_works .item .item_wr .title,
					.stm_works_wr.grid_with_filter .stm_works .item .info .title,
					body .vc_general.vc_btn3,
					.consulting-rev-title,
					.consulting-rev-title-2,
					.consulting-rev-title-3,
					.consulting-rev-text,
					body .vc_tta-container .vc_tta.vc_general.vc_tta-tabs.theme_style .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a,
					strong, b,
					.button,
					.woocommerce a.button,
					.woocommerce button.button,
					.woocommerce input.button,
					.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
					.woocommerce input.button.alt,
					.request_callback p,
					ul.comment-list .comment .comment-author,
					.page-numbers .page-numbers,
					#footer .footer_widgets .widget.widget_recent_entries ul li a,
					.default_widgets .widget.widget_nav_menu ul li,
					.default_widgets .widget.widget_categories ul li,
					.default_widgets .widget.widget_product_categories ul li,
					.stm_sidebar .widget.widget_nav_menu ul li, .stm_sidebar .widget.widget_categories ul li,
					.stm_sidebar .widget.widget_product_categories ul li,
					.shop_widgets .widget.widget_nav_menu ul li,
					.shop_widgets .widget.widget_categories ul li,
					.shop_widgets .widget.widget_product_categories ul li,
					.default_widgets .widget.widget_recent_entries ul li a,
					.stm_sidebar .widget.widget_recent_entries ul li a,
					.shop_widgets .widget.widget_recent_entries ul li a,
					.staff_bottom_wr .staff_bottom .infos .info,
					.woocommerce .widget_price_filter .price_slider_amount .button,
					.woocommerce ul.product_list_widget li .product-title,
					.woocommerce ul.products li.product .price,
					.woocommerce a.added_to_cart,
					.woocommerce div.product .woocommerce-tabs ul.tabs li a,
					.woocommerce div.product form.cart .variations label,
					.woocommerce table.shop_table th,
					.woocommerce-cart table.cart th.product-name a,
					.woocommerce-cart table.cart td.product-name a,
					.woocommerce-cart table.cart th .amount,
					.woocommerce-cart table.cart td .amount,
					.stm_services .item .item_wr .content .read_more,
					.staff_list ul li .staff_info .staff_department,
					.stm_partner.style_2 .stm_partner_content .position,
					.wpb_text_column ul li,
					.comment-body .comment-text ul li,
					body.header_style_4 .header_top .icon_text.big .text strong,
					.info_box .read_more,
					.stm_services_tabs .service_tab_item .service_name,
					.stm_services_tabs .services_categories ul li a,
					.stm_services_tabs .service_tab_item .service_cost,
					.vc_custom_heading .subtitle,
					.stm_gmap_wrapper .gmap_addresses .addresses .item .title,
					.info_box h4,
					.testimonials_carousel.style_2 .item .testimonial-info .testimonial-text .name,
					.staff_carousel_item .staff_department,
					body.header_style_5 .header_top .info-text strong,
					.stm_works_wr.grid_2.style_1 .stm_works .item .item_wr .title,
					.stm_works_wr.grid_2.style_2 .stm_works .item .item_wr .title,
					.stm_works_wr.grid_with_filter.style_1 .stm_works .item .item_wr .title,
					.stm_works_wr.grid_with_filter.style_2 .stm_works .item .item_wr .title,
					body.header_style_7 .side_nav .main_menu_nav > li > a,
					body.header_style_7 .side_nav .main_menu_nav > li ul li a,
					body.header_style_5 .header_top .info-text b,
					.pcw-box,
					.pcw.pcw-table.pcw-basic table thead tr th,
					.heading_font';

				$config['fonts'] = array(
					'open_sans' => 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic',
					'montserrat' => 'Montserrat:400,600,700'
				);

				$config['base_color'] = '#17181d';
				$config['secondary_color'] = '#38e569';
				$config['third_color'] = '#3baae2';


				$config['base_rgb_color'] = array(
					'rgb' => '23, 24, 29',
					'alpha' => array('0.25', '0.21', '0.9', '0.75', '0.5', '0.8', '0.85', '0.7')
				);
				$config['secondary_rgb_color'] = array(
					'rgb' => '56, 229, 105',
					'alpha' => ''
				);
				$config['third_rgb_color'] = array(
					'rgb' => '59, 170, 226',
					'alpha' => ''
				);

				break;
            default:
                $config['fonts'] = array(
                    'open_sans' => 'Open Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,latin-ext,cyrillic',
                    'mukta_malar' => 'Mukta Malar:400,500,300,600,700&subset=latin,latin-ext,devanagari'
                );

                $config['primary_font_family'] = 'Open Sans';
                $config['primary_font_size'] = 14;
                $config['primary_font_classes'] = 'body,
					body .vc_general.vc_btn3 small,
					.default_widgets .widget.widget_nav_menu ul li .children li,
					.default_widgets .widget.widget_categories ul li .children li,
					.default_widgets .widget.widget_product_categories ul li .children li,
					.stm_sidebar .widget.widget_nav_menu ul li .children li,
					.stm_sidebar .widget.widget_categories ul li .children li,
					.stm_sidebar .widget.widget_product_categories ul li .children li,
					.shop_widgets .widget.widget_nav_menu ul li .children li,
					.shop_widgets .widget.widget_categories ul li .children li,
					.shop_widgets .widget.widget_product_categories ul li .children li,
					.stm_crypto_converter .vcw.vcw-converter .vcw-input .vcw-currency';

                $config['secondary_font_family'] = 'Mukta Malar';
                $config['secondary_font_classes'] = 'h1, .h1,
					h2, .h2,
					h3, .h3,
					h4, .h4,
					h5, .h5,
					h6, .h6,
					.top_nav .top_nav_wrapper > ul,
					.top_nav .icon_text strong,
					.stm_testimonials .item .testimonial-info .testimonial-text .name,
					.stats_counter .counter_title,
					.stm_contact .stm_contact_info .stm_contact_job,
					.vacancy_table_wr .vacancy_table thead th,
					.testimonials_carousel .testimonial .info .position,
					.testimonials_carousel .testimonial .info .company,
					.stm_gmap_wrapper .gmap_addresses .addresses .item .title,
					.company_history > ul > li .year,
					.stm_contacts_widget,
					.stm_works_wr.grid .stm_works .item .item_wr .title,
					.stm_works_wr.grid_with_filter .stm_works .item .info .title,
					body .vc_general.vc_btn3,
					.crypterio-rev-title,
					.crypterio-rev-title-2,
					.crypterio-rev-title-3,
					.crypterio-rev-text,
					body .vc_tta-container .vc_tta.vc_general.vc_tta-tabs.theme_style .vc_tta-tabs-container .vc_tta-tabs-list .vc_tta-tab a,
					strong, b,
					.button,
					.woocommerce a.button,
					.woocommerce button.button,
					.woocommerce input.button,
					.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
					.woocommerce input.button.alt,
					.request_callback p,
					ul.comment-list .comment .comment-author,
					.page-numbers .page-numbers,
					#footer .footer_widgets .widget.widget_recent_entries ul li a,
					.default_widgets .widget.widget_nav_menu ul li,
					.default_widgets .widget.widget_categories ul li,
					.default_widgets .widget.widget_product_categories ul li,
					.stm_sidebar .widget.widget_nav_menu ul li, .stm_sidebar .widget.widget_categories ul li,
					.stm_sidebar .widget.widget_product_categories ul li,
					.shop_widgets .widget.widget_nav_menu ul li,
					.shop_widgets .widget.widget_categories ul li,
					.shop_widgets .widget.widget_product_categories ul li,
					.default_widgets .widget.widget_recent_entries ul li a,
					.stm_sidebar .widget.widget_recent_entries ul li a,
					.shop_widgets .widget.widget_recent_entries ul li a,
					.staff_bottom_wr .staff_bottom .infos .info,
					.woocommerce .widget_price_filter .price_slider_amount .button,
					.woocommerce ul.product_list_widget li .product-title,
					.woocommerce ul.products li.product .price,
					.woocommerce a.added_to_cart,
					.woocommerce div.product .woocommerce-tabs ul.tabs li a,
					.woocommerce div.product form.cart .variations label,
					.woocommerce table.shop_table th,
					.woocommerce-cart table.cart th.product-name a,
					.woocommerce-cart table.cart td.product-name a,
					.woocommerce-cart table.cart th .amount,
					.woocommerce-cart table.cart td .amount,
					.stm_services .item .item_wr .content .read_more,
					.staff_list ul li .staff_info .staff_department,
					.stm_partner.style_2 .stm_partner_content .position,
					.staff_carousel_item .staff_department,
					body.header_style_5 .header_top .info-text strong,
					.stm_services_tabs .services_categories ul li a,
					.stm_services_tabs .service_tab_item .service_name,
					.stm_services_tabs .service_tab_item .service_cost,
					.stm_works_wr.grid_2.style_1 .stm_works .item .item_wr .title,
					.stm_works_wr.grid_2.style_2 .stm_works .item .item_wr .title,
					.stm_works_wr.grid_with_filter.style_1 .stm_works .item .item_wr .title,
					.stm_works_wr.grid_with_filter.style_2 .stm_works .item .item_wr .title,
					body.header_style_7 .side_nav .main_menu_nav > li > a,
					body.header_style_7 .side_nav .main_menu_nav > li ul li a,
					body.header_style_5 .header_top .info-text b,
					.stm-header__hb .stm-navigation,
					.stm_contacts_widget.style_4';

                $config['base_color'] = '#261100';
                $config['secondary_color'] = '#ff3026';
                $config['third_color'] = '#ffc40c';


                $config['base_rgb_color'] = array(
                    'rgb' => '38, 17, 0',
                    'alpha' => array('0.9', '0.75', '0.5', '0.25', '0.21')
                );
                $config['secondary_rgb_color'] = array(
                    'rgb' => '255, 48, 38',
                    'alpha' => array('0.9')
                );
                $config['third_rgb_color'] = array(
                    'rgb' => '255, 196, 12',
                    'alpha' => array('0.5')
                );
        }

        return $config;
    }
}


function crypterio_layout_plugins($layout = 'default', $get_layouts = false)
{
	$required = array(
		'stm-configurations',
		'pearl-header-builder',
		'js_composer',
		'virtual_coin_widgets',
	);
	$plugins = array(
		'default' => array(
			'breadcrumb-navxt',
			'mailchimp-for-wp',
			'contact-form-7',
			'revslider'
		),
        'advisor' => array(
            'breadcrumb-navxt',
            'mailchimp-for-wp',
			'contact-form-7',
            'revslider'
        ),
        'ico' => array(
            'mailchimp-for-wp',
            'revslider'
        ),
		'corporate' => array(
			'mailchimp-for-wp',
			'contact-form-7',
			'revslider',
			'instagram-feed',
			'recent-tweets-widget',
			'woocommerce'
		),
		'counselor' => array(
			'mailchimp-for-wp',
			'contact-form-7',
			'revslider',
		),
	);

	if ($get_layouts) return $plugins;

	return array_merge($required, $plugins[$layout]);
}