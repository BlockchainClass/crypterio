<?php
require_once(get_template_directory() . '/inc/admin/product_registration/admin.php');

add_action('init', 'crypterio_customizer_options');


function crypterio_customizer_options() {

	$crypterio_settings_imported = get_option('crypterio_settings_imported', '');


	if(empty($crypterio_settings_imported)) {
		global $wp_filesystem;
		if ( empty( $wp_filesystem ) ) {
			require_once ABSPATH . '/wp-admin/includes/file.php';
			WP_Filesystem();
		}

		$options_file = get_template_directory() . '/inc/admin/theme_mods.json';
		$default = get_option('theme_mods_crypterio', array());


		if ( file_exists( $options_file ) ) {
			$encode_options = $wp_filesystem->get_contents( $options_file );
			$import_options = json_decode( $encode_options, true );

			foreach ( $import_options as $key => $value ) {
				update_option( $key, $value );

				if(empty($default[$key])) {
					$default[$key] = $value;
				}
			}
		}

		update_option('theme_mods_crypterio', $default);
		update_option('crypterio_settings_imported', 'imported');
	}
}