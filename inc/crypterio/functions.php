<?php

require_once CRYPTERIO_INC_PATH . '/crypterio/graph.php';
require_once CRYPTERIO_INC_PATH . '/crypterio/converter.php';


function crypterio_get_cmc_data($data = 'cmc')
{
	$datas = get_option('vcw_data', array());
	if(!empty($datas)) $datas = unserialize($datas);

	if (!empty($datas)) {
		if (!empty($datas[$data])) {
			$datas = $datas[$data];
		}
	}

	if($data == 'cmc') {
		$cmc = array();
		foreach($datas as $data) {
			$key = $data['name'];
			$cmc[$key] = $data;
		}
		$datas = $cmc;
	}

	return $datas;
}

function crypterio_get_crypto_data($name) {
	$cryptos = crypterio_get_cmc_data();
	if(!empty($cryptos) and !empty($cryptos[$name])) {
		return $cryptos[$name];
	}

	return array();
}

function crypterio_get_user_crypto() {
	$currencies = array();

	$crypto = get_theme_mod('crypto');
	if(!empty($crypto)) {
		$currencies = array_filter(explode(', ', $crypto));
	}

	return apply_filters('crypterio_get_user_crypto', $currencies);
}

function crypterio_price_view($price, $symbol = '', $position = 'left', $th_sep = ',', $float_sep = '.', $float = 2) {
	if(empty($symbol)) $symbol = '$';
	$price = number_format($price, $float, $float_sep, $th_sep);
	$price = ($position == 'left') ? $symbol . $price : $price . $symbol;
	return sanitize_text_field($price);
}

function crypterio_get_format() {
	return 'price_usd';
}