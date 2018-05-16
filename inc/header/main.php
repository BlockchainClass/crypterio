<?php
add_filter('stm_hb_elements', 'crypterio_hb_elements', 100);

function crypterio_hb_elements($elements) {
	$elements[] = array(
		'label' => 'Cryptodata',
		'type' => 'text',
		'icon' => 'crypto',
		'view_template' => 'crypto',
		'settings_template' => 'hb_templates/modals/crypto'
	);
	return $elements;
}