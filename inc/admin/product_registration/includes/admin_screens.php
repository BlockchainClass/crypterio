<?php
//Register scripts and styles for admin pages
function crypterio_startup_styles()
{
	wp_enqueue_style('stm-startup_css', get_template_directory_uri() . '/inc/admin/product_registration/assets/css/style.css', null, 1.0, 'all');
}
add_action('admin_enqueue_scripts', 'crypterio_startup_styles');

//Register Startup page in admin menu
function crypterio_register_startup_screen()
{
	$theme = crypterio_get_theme_info();
	$theme_name = $theme['name'];
	$theme_name_sanitized = 'my-crypterio';

	// Work around for theme check.
	$stm_admin_menu_page_creation_method = 'add' . '_menu_page';
	$stm_admin_submenu_page_creation_method = 'add' . '_submenu_page';

	if (!defined('ENVATO_HOSTED_SITE')) {
		/*Item Registration*/
		$stm_admin_menu_page_creation_method(
			$theme_name,
			esc_html__('Crypterio', 'crypterio'),
			'manage_options',
			$theme_name_sanitized,
			'crypterio_theme_admin_page_functions',
			get_template_directory_uri() . '/assets/admin/images/icon.png',
			'2.1111111111'
		);

		/*My crypterio*/
		$stm_admin_submenu_page_creation_method(
			$theme_name_sanitized,
			esc_html__('My crypterio', 'crypterio'),
			esc_html__('My crypterio', 'crypterio'),
			'manage_options',
			'my-crypterio',
			'crypterio_theme_admin_page_functions'
		);

		/*Demo Import*/
		$stm_admin_submenu_page_creation_method(
			$theme_name_sanitized,
			esc_html__('Demo import', 'crypterio'),
			esc_html__('Demo import', 'crypterio'),
			'manage_options',
			$theme_name_sanitized . '-demos',
			'crypterio_theme_admin_install_demo_page'
		);

		/*System status*/
		$stm_admin_submenu_page_creation_method(
			$theme_name_sanitized,
			esc_html__('System status', 'crypterio'),
			esc_html__('System status', 'crypterio'),
			'manage_options',
			$theme_name_sanitized . '-system-status',
			'crypterio_theme_admin_system_status_page'
		);

		/*Support page*/
		$stm_admin_submenu_page_creation_method(
			$theme_name_sanitized,
			esc_html__('Support', 'crypterio'),
			esc_html__('Support', 'crypterio'),
			'manage_options',
			$theme_name_sanitized . '-support',
			'crypterio_theme_admin_support_page'
		);
	} else {
		/*Demo Import*/
		$stm_admin_menu_page_creation_method(
			$theme_name,
			esc_html__('Crypterio', 'crypterio'),
			'manage_options',
			$theme_name_sanitized,
			'crypterio_theme_admin_install_demo_page',
			get_template_directory_uri() . '/includes/admin/product_registration/assets/img/icon.png',
			'2.1111111111'
		);
	}

}

add_action('admin_menu', 'crypterio_register_startup_screen', 20);

function crypterio_startup_templates($path)
{
	$path = 'inc/admin/product_registration/screens/' . $path . '.php';

	$located = locate_template($path);

	if ($located) {
		load_template($located);
	}
}

//Startup screen menu page welcome
function crypterio_theme_admin_page_functions()
{
	crypterio_startup_templates('startup');
}

/*Support Screen*/
function crypterio_theme_admin_support_page()
{
	crypterio_startup_templates('support');
}

/*Install Plugins*/
function crypterio_theme_admin_plugins_page()
{
	crypterio_startup_templates('plugins');
}

/*Install Demo*/
function crypterio_theme_admin_install_demo_page()
{
	crypterio_startup_templates('install_demo');
}

/*System status*/
function crypterio_theme_admin_system_status_page()
{
	crypterio_startup_templates('system_status');
}

//Admin tabs
function crypterio_get_admin_tabs($screen = 'welcome')
{
	$theme = crypterio_get_theme_info();
	$creds = stm_get_creds();
	$theme_name = $theme['name'];
	$theme_name_sanitized = 'stm-admin';
	if (empty($screen)) {
		$screen = $theme_name_sanitized;
	}
	?>
    <div class="clearfix">
        <div class="stm_theme_info">
            <div class="stm_theme_version"><?php echo substr($theme['v'], 0, 3); ?></div>
        </div>
    </div>
	<?php $notice = get_site_transient('stm_auth_notice');
	if( !empty($creds['t']) && !empty($notice) ): ?>
		<div class="stm-admin-message"><strong>Theme Registration Error:</strong> <?php echo crypterio_sanitize_text_field($notice); ?></div>
	<?php endif; ?>
    <h2 class="nav-tab-wrapper">
		<?php if (!defined('ENVATO_HOSTED_SITE')): ?>
            <a href="<?php echo esc_url_raw(admin_url('admin.php?page=my-crypterio')); ?>"
               class="<?php echo ('welcome' === $screen) ? 'nav-tab-active' : ''; ?> nav-tab"><?php esc_attr_e('Product Registration', 'crypterio'); ?></a>

            <a href="<?php echo esc_url_raw(admin_url('admin.php?page=my-crypterio-demos')); ?>"
               class="<?php echo ('demos' === $screen) ? 'nav-tab-active' : ''; ?> nav-tab"><?php esc_attr_e('Install Demos', 'crypterio'); ?></a>

            <a href="<?php echo esc_url_raw(admin_url('admin.php?page=tgmpa-install-plugins')); ?>"
               class="<?php echo ('plugins' === $screen) ? 'nav-tab-active' : ''; ?> nav-tab"><?php esc_attr_e('Plugins', 'crypterio'); ?></a>

            <a href="<?php echo esc_url_raw(admin_url('customize.php')); ?>"
               class="nav-tab"><?php esc_attr_e('Theme Options', 'crypterio'); ?></a>

            <a href="<?php echo esc_url_raw(admin_url('admin.php?page=my-crypterio-support')); ?>"
               class="<?php echo ('support' === $screen) ? 'nav-tab-active' : ''; ?> nav-tab"><?php esc_attr_e('Support', 'crypterio'); ?></a>

            <a href="<?php echo esc_url_raw(admin_url('admin.php?page=my-crypterio-system-status')); ?>"
               class="<?php echo ('system-status' === $screen) ? 'nav-tab-active' : ''; ?> nav-tab"><?php esc_attr_e('System Status', 'crypterio'); ?></a>
		<?php else: ?>
            <a href="<?php echo esc_url_raw(admin_url('admin.php?page=my-crypterio')); ?>"
               class="<?php echo ('demos' === $screen) ? 'nav-tab-active' : ''; ?> nav-tab"><?php esc_attr_e('Install Demos', 'crypterio'); ?></a>

            <a href="<?php echo esc_url_raw(admin_url('admin.php?page=tgmpa-install-plugins')); ?>"
               class="<?php echo ('plugins' === $screen) ? 'nav-tab-active' : ''; ?> nav-tab"><?php esc_attr_e('Plugins', 'crypterio'); ?></a>

            <a href="<?php echo esc_url_raw(admin_url('admin.php?page=crypterio-theme-options')); ?>"
               class="nav-tab"><?php esc_attr_e('Theme Options', 'crypterio'); ?></a>
		<?php endif; ?>
    </h2>
	<?php
}