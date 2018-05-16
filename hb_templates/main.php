<?php
$config = crypterio_config();
$image = get_theme_mod( 'logo', get_template_directory_uri() . "/assets/images/tmp/{$config['layout']}/logo_default.svg" );

$menu_args = array(
	'depth'        => 3,
	'container'    => false,
	'items_wrap'   => '%3$s',
	'fallback_cb'  => false,
	'stm_megamenu' => true
);

$menu_args['theme_location'] = 'crypterio-primary_menu';

?>


<div class="stm-header stm-header__hb" id="stm_stm_hb_settings">

    <div class="stm-header__row_color stm-header__row_color_center elements_in_row_2">
        <div class="container">
            <div class="stm-header__row stm-header__row_center">
                <div class="stm-header__cell stm-header__cell_left">
                    <div class="stm-header__element object235 stm-header__element_">
                        <div class="stm-logo">
                            <a href="<?php echo esc_url(home_url('/')) ?>" title="<?php esc_html_e('Home page', 'crypterio'); ?>">
                                <img src="<?php echo esc_url($image); ?>" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="stm-header__cell stm-header__cell_right">
                    <div class="stm-header__element object258 stm-header__element_default">

                        <div class="stm-navigation heading_font stm-navigation__default stm-navigation__default stm-navigation__none stm-navigation__ main_menu_nav">

                            <ul>
                                <?php wp_nav_menu($menu_args); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>