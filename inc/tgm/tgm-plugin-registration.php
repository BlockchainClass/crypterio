<?php

require_once CRYPTERIO_INC_PATH . '/tgm/tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'crypterio_require_plugins' );

function crypterio_require_plugins($return = false) {
	$plugins_path = get_template_directory() . '/inc/tgm/plugins';
	$plugins      = array(
		'stm-configurations' => array(
			'name' => 'STM Configurations',
			'slug' => 'stm-configurations',
			'source' => get_package( 'stm-configurations', 'zip' ),
			'required' => true,
			'version' => '1.3',
			'external_url' => 'https://stylemixthemes.com/'
		),
		'pearl-header-builder' => array(
			'name'     => 'Pearl Header Builder',
			'slug'     => 'pearl-header-builder',
			'required' => true
		),
		'js_composer' => array(
			'name'         => 'WPBakery Visual Composer',
			'slug'         => 'js_composer',
			'source'       => $plugins_path . '/js_composer.zip',
			'required'     => true,
			'external_url' => 'http://vc.wpbakery.com',
			'version'      => '5.4.5'
		),
		'revslider' => array(
			'name'         => 'Revolution Slider',
			'slug'         => 'revslider',
			'source'       => $plugins_path . '/revslider.zip',
			'required'     => true,
			'external_url' => 'http://www.themepunch.com/revolution/',
			'version'      => '5.4.6.4'
		),
		'virtual_coin_widgets' => array(
			'name'         => 'Virtual Coin Widgets',
			'slug'         => 'virtual_coin_widgets',
			'source'       => $plugins_path . '/virtual_coin_widgets.zip',
			'required'     => true,
			'external_url' => 'https://codecanyon.net/user/runcoders',
			'version'      => '1.2.2'
		),
		'breadcrumb-navxt' => array(
			'name'     => 'Breadcrumb NavXT',
			'slug'     => 'breadcrumb-navxt',
			'required' => false
		),
		'contact-form-7' => array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false
		),
		'woocommerce' => array(
			'name'      => 'WooCommerce',
			'slug'      => 'woocommerce',
			'required'  => false
		),
		'mailchimp-for-wp' => array(
			'name'     => 'MailChimp for WordPress Lite',
			'slug'     => 'mailchimp-for-wp',
			'required' => false
		),
		'instagram-feed' => array(
			'name'     => 'Instagram Feed',
			'slug'     => 'instagram-feed',
			'required' => false
		),
		'recent-tweets-widget' => array(
			'name'     => 'Recent Tweets Widget',
			'slug'     => 'recent-tweets-widget',
			'required' => false
		),
		'amp' => array(
			'name'     => 'AMP',
			'slug'     => 'amp',
			'required' => false
		)
	);

	if($return) {
		return $plugins;
	} else {
		$config = array(
			'is_automatic' => true
		);

		tgmpa($plugins, $config);
	}

}