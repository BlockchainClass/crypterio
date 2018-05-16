<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>

<?php
$logo = intval(stm_hb_get_option('logo', false, $hb));

if(empty($logo)) {
	$config = crypterio_config();
	$logo = get_theme_mod( 'logo' , get_template_directory_uri() . "/assets/images/tmp/{$config['layout']}/logo_default.svg");
}

$wrapper_classes = array('stm_mobile__header');

if (!empty($logo) and is_int($logo)) {
	$logo = stm_hb_get_image_url($logo);
}

if(!empty(get_theme_mod( 'dark_logo' ))) $logo = get_theme_mod( 'dark_logo' );

?>

<div class="stm-header__overlay"></div>

<div class="<?php echo esc_attr(implode(' ', $wrapper_classes)) ?>">
    <div class="container">
        <div class="stm_flex stm_flex_center stm_flex_last stm_flex_nowrap">
            <?php if (!empty($logo)): ?>
                <div class="stm_mobile__logo">
                    <a href="<?php echo esc_url(home_url('/')); ?>"
                       title="<?php esc_html_e('Home', 'crypterio'); ?>">
                        <img src="<?php echo esc_url($logo); ?>"
                             alt="<?php esc_html_e('Site Logo', 'crypterio'); ?>"/>
                    </a>
                </div>
            <?php endif; ?>
            <div class="stm_mobile__switcher stm_flex_last js_trigger__click"
                 data-element=".stm-header, .stm-header__overlay"
                 data-toggle="false">
                <span class="stm_hb_mbc"></span>
                <span class="stm_hb_mbc"></span>
                <span class="stm_hb_mbc"></span>
            </div>
        </div>
    </div>
</div>