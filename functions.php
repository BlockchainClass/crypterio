<?php

// Product Registration
if (is_admin()) {
	require_once(get_template_directory() . '/inc/admin/admin.php');
	require_once(get_template_directory() . '/inc/megamenu_config.php');
}

$theme_info = wp_get_theme();
define('CRYPTERIO_THEME_VERSION', (WP_DEBUG) ? time() : $theme_info->get('Version'));
define('CRYPTERIO_INC_PATH', get_template_directory() . '/inc');
define('CRYPTERIO_CUSTOMIZER_PATH', get_template_directory() . '/inc/customizer');
define('CRYPTERIO_CUSTOMIZER_URI', get_template_directory_uri() . '/inc/customizer');

// Theme Config
require_once(CRYPTERIO_INC_PATH . '/theme-config.php');

/*Crypterio Header*/
require_once(CRYPTERIO_INC_PATH . '/crypterio/functions.php');
require_once(CRYPTERIO_INC_PATH . '/header/main.php');

if (!isset($content_width)) {
	$content_width = 1120;
}

add_action('after_setup_theme', 'crypterio_theme_setup');

if (!function_exists('crypterio_theme_setup')) {

	function crypterio_theme_setup()
	{

		load_theme_textdomain('crypterio', get_template_directory() . '/languages');

		add_image_size('crypterio-image-350x204-croped', 350, 204, true);
		if (stm_check_layout('layout_16')) {
			add_image_size('crypterio-image-350x250-croped', 350, 250, array('center', 'top'));
		} else {
			add_image_size('crypterio-image-350x250-croped', 350, 250, true);
		}
		add_image_size('crypterio-image-1110x550-croped', 1110, 550, true);
		add_image_size('crypterio-image-50x50-croped', 50, 50, true);
		add_image_size('crypterio-image-320x320-croped', 320, 320, true);
		add_image_size('crypterio-image-255x182-croped', 255, 182, true);
		add_image_size('crypterio-image-350x195-croped', 350, 195, true);

		add_theme_support('post-thumbnails');
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('woocommerce');
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		));

		register_nav_menus(
			array(
				'crypterio-primary_menu'   => esc_html__('Top Menu', 'crypterio'),
				'crypterio-sidebar_menu_1' => esc_html__('Sidebar Menu 1', 'crypterio'),
				'crypterio-sidebar_menu_2' => esc_html__('Sidebar Menu 2', 'crypterio'),
				'crypterio-sidebar_menu_3' => esc_html__('Sidebar Menu 3', 'crypterio'),
			)
		);

	}

}

if (!function_exists('crypterio_register_default_sidebars')) {
	function crypterio_register_default_sidebars()
	{
		register_sidebar(array(
			'id'            => 'crypterio-right-sidebar',
			'name'          => esc_html__('Right Sidebar', 'crypterio'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h5 class="widget_title">',
			'after_title'   => '</h5>',
		));

		register_sidebar(array(
			'id'            => 'crypterio-left-sidebar',
			'name'          => esc_html__('Left Sidebar', 'crypterio'),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h5 class="widget_title">',
			'after_title'   => '</h5>',
		));

		register_sidebar(
			array(
				'id'            => 'crypterio-shop',
				'name'          => esc_html__('Shop Sidebar', 'crypterio'),
				'before_widget' => '<aside id="%1$s" class="widget %2$s shop_widgets">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h5 class="widget_title">',
				'after_title'   => '</h5>',
			)
		);
		// Register Footer Sidebars

		for ($footer = 1; $footer < 5; $footer++) {
			register_sidebar(array(
				'id'            => 'crypterio-footer-' . $footer,
				'name'          => esc_html__('Footer ', 'crypterio') . $footer,
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h4 class="widget_title no_stripe">',
				'after_title'   => '</h4>',
			));
		}
	}
}

add_action('widgets_init', 'crypterio_register_default_sidebars', 50);

if (!function_exists('_wp_render_title_tag')) {
	function crypterio_render_title()
	{
		?>
        <title><?php wp_title('|', true, 'right'); ?></title>
		<?php
	}

	add_action('wp_head', 'crypterio_render_title');
}

add_action('wp_enqueue_scripts', 'crypterio_load_theme_scripts_and_styles');

if (!function_exists('crypterio_load_theme_scripts_and_styles')) {
	function crypterio_load_theme_scripts_and_styles()
	{

		if (!is_admin()) {

			$crypterio_config = crypterio_config();
			$google_api_key = get_theme_mod('google_api_key', false);

			/* Register Styles */
			wp_register_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', null, CRYPTERIO_THEME_VERSION, 'all');
			wp_register_style('crypterio-style', get_stylesheet_uri(), null, CRYPTERIO_THEME_VERSION, 'all');
			wp_register_style('crypterio-layout', get_template_directory_uri() . '/assets/css/' . $crypterio_config['layout'] . '/main.css', null, CRYPTERIO_THEME_VERSION, 'all');
			wp_register_style('crypterio-shared', get_template_directory_uri() . '/assets/css/shared/main.css', null, CRYPTERIO_THEME_VERSION, 'all');
			wp_register_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', null, CRYPTERIO_THEME_VERSION, 'all');
			wp_register_style('select2', get_template_directory_uri() . '/assets/css/select2.min.css', null, CRYPTERIO_THEME_VERSION, 'all');
			wp_register_style('owl.carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css', null, CRYPTERIO_THEME_VERSION, 'all');
			wp_register_style('slick', get_template_directory_uri() . '/assets/css/slick.css', null, CRYPTERIO_THEME_VERSION, 'all');
			wp_register_style('fancybox', get_template_directory_uri() . '/assets/css/jquery.fancybox.css', null, CRYPTERIO_THEME_VERSION, 'all');
			wp_register_style('flipclock', get_template_directory_uri() . '/assets/css/flipclock.css', null, CRYPTERIO_THEME_VERSION, 'all');
			wp_register_style('crypterio-frontend_customizer', get_template_directory_uri() . '/assets/css/frontend_customizer.css', null, CRYPTERIO_THEME_VERSION, 'all');
			wp_register_style('crypterio-animate.min.css', get_template_directory_uri() . '/assets/css/animate.min.css', null, CRYPTERIO_THEME_VERSION, 'all');
			wp_register_style('crypterio-default-font', crypterio_fonts_url(), array(), CRYPTERIO_THEME_VERSION, 'all');

			/* Register Scripts */
			wp_register_script('stm_grecaptcha', 'https://www.google.com/recaptcha/api.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('smoothscroll', get_template_directory_uri() . '/assets/js/smoothscroll.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('countdown', get_template_directory_uri() . '/assets/js/jquery.countdown.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('countUp', get_template_directory_uri() . '/assets/js/countUp.min.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('select2', get_template_directory_uri() . '/assets/js/select2.min.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.pack.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('flipclock', get_template_directory_uri() . '/assets/js/flipclock.min.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('owl.carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('jquery.appear', get_template_directory_uri() . '/assets/js/jquery.appear.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('jquery.tablesorter', get_template_directory_uri() . '/assets/js/jquery.tablesorter.min.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('crypterio-custom', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('particles', get_template_directory_uri() . '/assets/js/particles.min.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('Chart', get_template_directory_uri() . '/assets/js/Chart.min.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			if (!empty($google_api_key)) {
				wp_register_script('gmap', 'https://maps.googleapis.com/maps/api/js?key=' . $google_api_key, array('jquery'), CRYPTERIO_THEME_VERSION, true);
			} else {
				wp_register_script('gmap', 'https://maps.googleapis.com/maps/api/js?sensor=false', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			}
			wp_register_script('isotope', get_template_directory_uri() . '/assets/js/isotope.pkgd.min.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('packery', get_template_directory_uri() . '/assets/js/packery-mode.pkgd.min.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('imagesloaded', get_template_directory_uri() . '/assets/js/imagesloaded.pkgd.min.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('jquery.cookie', get_template_directory_uri() . '/assets/js/jquery.cookie.min.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('fullPage', get_template_directory_uri() . '/assets/js/jquery.fullPage.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
			wp_register_script('simplemarquee', get_template_directory_uri() . '/assets/js/jquery.simplemarquee.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);

			/* Enqueue Styles */
			wp_enqueue_style('bootstrap');
			wp_enqueue_style('font-awesome');
			wp_enqueue_style('crypterio-style');
			wp_enqueue_style('crypterio-layout');
			wp_enqueue_style('crypterio-shared');
			wp_enqueue_style('select2');
			wp_enqueue_style('crypterio-default-font');

			$crypterio_config = crypterio_config();

			if (get_theme_mod('site_skin') && get_theme_mod('site_skin') != 'skin_default' && get_theme_mod('site_skin') != 'skin_custom') {
				wp_enqueue_style('crypterio-' . get_theme_mod('site_skin'));
			}

			/* Enqueue Scripts */
			if (is_singular() && comments_open() && get_option('thread_comments')) {
				wp_enqueue_script('comment-reply');
			}
			wp_enqueue_script('bootstrap');
			wp_enqueue_script('select2');
			wp_enqueue_script('simplemarquee');
			wp_enqueue_script('crypterio-custom');

			if (get_theme_mod('frontend_customizer')) {
				wp_enqueue_style('crypterio-frontend_customizer');
				wp_enqueue_script('jquery.cookie');
			}

			$upload_dir = wp_upload_dir();
			$stm_upload_dir = $upload_dir['baseurl'] . '/stm_uploads';
			$skin = get_theme_mod('site_skin', 'skin_default');
			$current_style = get_option('stm_custom_style', '4');
			update_option('stm_custom_style', $current_style + 1);

			if ($skin == 'skin_custom' and is_dir($upload_dir['basedir'] . '/stm_uploads')) {
				wp_enqueue_style('stm-skin-custom-generated', $stm_upload_dir . '/skin-custom.css', null, get_option('stm_custom_style', '4'), 'all');
			}

			if(!defined('STM_HB_VER')) {
				wp_enqueue_style('stm-header_builder', get_template_directory_uri() . '/assets/css/header/main.css', null, get_option('stm_custom_style', '4'), 'all');
			}
		}

	}
}

if (!function_exists('crypterio_admin_styles')) {
	function crypterio_admin_styles()
	{
		wp_enqueue_style('crypterio-admin', get_template_directory_uri() . '/assets/css/admin.css', null, CRYPTERIO_THEME_VERSION, 'all');
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_style('crypterio-jquery.fonticonpicker', get_template_directory_uri() . '/assets/css/jquery.fonticonpicker.min.css', array(), CRYPTERIO_THEME_VERSION, 'all');
		wp_enqueue_style('crypterio-jquery.fonticonpicker.bootstrap.min.css', get_template_directory_uri() . '/assets/css/jquery.fonticonpicker.bootstrap.min.css', array(), CRYPTERIO_THEME_VERSION, 'all');
		wp_enqueue_script('jquery.fonticonpicker', get_template_directory_uri() . '/assets/js/jquery.fonticonpicker.min.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
		wp_enqueue_style('crypterio-font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', null, CRYPTERIO_THEME_VERSION, 'all');
		wp_enqueue_script('stm-theme-multiselect', get_template_directory_uri() . '/assets/js/jquery.multi-select.js', array('jquery'), CRYPTERIO_THEME_VERSION, true);
	}
}

add_action('admin_enqueue_scripts', 'crypterio_admin_styles');

if (!function_exists('crypterio_fonts_url')) {
	function crypterio_fonts_url()
	{

		$crypterio_config = crypterio_config();

		$font_families = array();

		if ($crypterio_config['fonts']) {
			foreach ($crypterio_config['fonts'] as $crypterio_font) {
				$font_families[] = $crypterio_font;
			}
		}

		if ($font_families) {
			$query_args = array(
				'family' => urlencode(implode('|', $font_families))
			);

			$fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
		} else {
			$fonts_url = '';
		}

		return esc_url_raw($fonts_url);
	}
}

if (!function_exists('crypterio_excerpt_more')) {
	function crypterio_excerpt_more($more)
	{
		return '';
	}
}

add_filter('excerpt_more', 'crypterio_excerpt_more');

add_action('wp_head', 'crypterio_ajaxurl');

if (!function_exists('crypterio_ajaxurl')) {
	function crypterio_ajaxurl()
	{
		?>
        <script type="text/javascript">
            var ajaxurl = '<?php echo esc_url(admin_url('admin-ajax.php')); ?>';
        </script>
		<?php
	}
}

if (!function_exists('crypterio_body_class')) {
	function crypterio_body_class($classes)
	{
		global $post;
		global $wp_customize;

		if (isset($wp_customize)) {
			$classes[] = 'customizer_page';
		}

		$crypterio_config = crypterio_config();
		if ($crypterio_config['layout']) {
			$classes[] = 'site_' . $crypterio_config['layout'];
		}

		if ($crypterio_config['layout'] == 'layout_13') {
			$classes[] = 'stm_top_bar_' . get_theme_mod('top_bar_style', 'style_1');
		}

		$classes[] = get_theme_mod('color_skin');
		$classes[] = crypterio_get_header_style();
		if (get_theme_mod('sticky_menu')) {
			$classes[] = 'sticky_menu';
		}

		if (stm_check_layout('layout_17')) {
			$user_agent = getenv("HTTP_USER_AGENT");

			if (strpos($user_agent, "Win") !== FALSE)
				$classes[] = "stm_windows";
            elseif (strpos($user_agent, "Mac") !== FALSE)
				$classes[] = "stm_mac";
		}

		if (get_theme_mod('site_boxed')) {
			$classes[] = 'boxed_layout';
			if (get_theme_mod('bg_image')) {
				$classes[] = get_theme_mod('bg_image');
			}
			if (get_theme_mod('custom_bg_image')) {
				$classes[] = 'custom_bg_image';
			}

			if (!is_404() and !empty($post)) {
				$content_bg_transparent = get_post_meta($post->ID, 'content_bg_transparent', true);
				if ($content_bg_transparent) {
					$classes[] = 'content_bg_transparent';
				}
			}
		}

		if (!is_404() and !empty($post)) {
			if (!empty($post->ID) && get_post_meta($post->ID, 'enable_header_transparent', true)) {
				$classes[] = 'header_transparent';
			}

			$header_inverse = get_post_meta($post->ID, 'header_inverse', true);
			if ($header_inverse) {
				$classes[] = 'header_inverse';
			}

			$title_box_bg_image = get_post_meta($post->ID, 'title_box_bg_image', true);
			if (!empty($title_box_bg_image)) {
				$classes[] = 'title_box_image_added';
			}
		}

		$mobile_grid = get_theme_mod('mobile_grid');

		if ($mobile_grid == 'landscape') {
			$classes[] = 'mobile_grid_landscape';
		}

		return $classes;
	}
}

add_filter('body_class', 'crypterio_body_class');

require_once(CRYPTERIO_CUSTOMIZER_PATH . '/customizer.class.php');
require_once(CRYPTERIO_INC_PATH . '/extras.php');
require_once(CRYPTERIO_INC_PATH . '/tgm/tgm-plugin-registration.php');
if (class_exists('WPBakeryShortCodesContainer')) {
	require_once(CRYPTERIO_INC_PATH . '/visual_composer.php');
}
if (class_exists('STM_PostType')) {
	require_once CRYPTERIO_INC_PATH . '/post_types-config.php';
}
if (class_exists('WooCommerce')) {
	require_once(CRYPTERIO_INC_PATH . '/woocommerce_configuration.php');
}
/*
 *  Load Custom Styles
 */
require_once CRYPTERIO_INC_PATH . '/print_styles.php';

if (stm_check_layout('layout_14') or stm_check_layout('layout_16') or stm_check_layout('layout_18')) {
	require_once(CRYPTERIO_INC_PATH . '/widgets/socials.php');
	require_once(CRYPTERIO_INC_PATH . '/widgets/contacts.php');
}

// Header Switcher
if (function_exists('icl_object_id')) {
	function crypterio_topbar_lang()
	{
		$languages = icl_get_languages('skip_missing=0&orderby=code');

		if (!empty($languages)) : ?>

            <div id="lang_sel">
                <ul>
                    <li>
						<?php foreach ($languages

						as $l) : ?>
						<?php if ($l['active']) : ?>
                        <a href="#" class="lang_sel_sel"><?php echo icl_disp_language($l['translated_name']); ?></a>
                        <ul>
							<?php endif; ?>
							<?php endforeach; ?>

							<?php foreach ($languages as $l) : ?>
								<?php if (!$l['active']) : ?>
                                    <li>
                                        <a href="<?php echo esc_url($l['url']); ?>"><?php echo icl_disp_language($l['translated_name']); ?></a>
                                    </li>
								<?php endif; ?>
							<?php endforeach; ?>
                        </ul>
                    </li>
                </ul>
            </div>

		<?php endif; ?>

		<?php
	}
}

function crypterio_get_image_url($id, $size = 'full')
{
	$url = '';
	if (!empty($id)) {
		$image = wp_get_attachment_image_src($id, $size, false);
		if (!empty($image[0])) {
			$url = $image[0];
		}
	}

	return $url;
}