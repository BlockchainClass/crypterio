<?php
if ( ! defined( 'ABSPATH' ) ) {
    die( '-1' );
}

extract( shortcode_atts( array(
    'particles' => ''
), $atts ) );


$particles_id = uniqid( 'particles_' );
/**
 * Shortcode attributes
 * @var $atts
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Cta
 */

$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
$this->buildTemplate( $atts, $content );
$containerClass = trim( 'vc_cta3-container ' . esc_attr( implode( ' ', $this->getTemplateVariable( 'container-class' ) ) ) );
$cssClass = trim( 'vc_general ' . esc_attr( implode( ' ', $this->getTemplateVariable( 'css-class' ) ) ) );
$wrapper_attributes = array();
if ( ! empty( $atts['el_id'] ) ) {
    $wrapper_attributes[] = 'id="' . esc_attr( $atts['el_id'] ) . '"';
}
?>

<?php if( $particles ) : ?>
	<?php get_template_part('partials/crypterio/particles_bg'); ?>
<?php endif; ?>

<section class="<?php echo esc_attr( $containerClass ); ?>" <?php echo implode( ' ', $wrapper_attributes ); ?>>
    <div class="<?php echo esc_attr( $cssClass ); ?>"<?php
    if ( $this->getTemplateVariable( 'inline-css' ) ) {
        echo ' style="' . esc_attr( implode( ' ', $this->getTemplateVariable( 'inline-css' ) ) ) . '"';
    }
    ?>>
        <?php echo crypterio_sanitize_text_field($this->getTemplateVariable( 'icons-top' )); ?>
        <?php echo crypterio_sanitize_text_field($this->getTemplateVariable( 'icons-left' )); ?>
        <div class="vc_cta3_content-container">
            <?php echo crypterio_sanitize_text_field($this->getTemplateVariable( 'actions-top' )); ?>
            <?php echo crypterio_sanitize_text_field($this->getTemplateVariable( 'actions-left' )); ?>
            <div class="vc_cta3-content">
                <header class="vc_cta3-content-header">
                    <?php echo crypterio_sanitize_text_field($this->getTemplateVariable( 'heading1' )); ?>
                    <?php echo crypterio_sanitize_text_field($this->getTemplateVariable( 'heading2' )); ?>
                </header>
                <?php echo crypterio_sanitize_text_field($this->getTemplateVariable( 'content' )); ?>
            </div>
            <?php echo crypterio_sanitize_text_field($this->getTemplateVariable( 'actions-bottom' )); ?>
            <?php echo crypterio_sanitize_text_field($this->getTemplateVariable( 'actions-right' )); ?>
        </div>
        <?php echo crypterio_sanitize_text_field($this->getTemplateVariable( 'icons-bottom' )); ?>
        <?php echo crypterio_sanitize_text_field($this->getTemplateVariable( 'icons-right' )); ?>
    </div>
</section>

