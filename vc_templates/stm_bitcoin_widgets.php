<?php
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

if(!empty($type)):
	$style = (!empty($style)) ? $style : 'dark'; ?>

	<div class="<?php echo esc_attr($type); ?>" bw-theme="<?php echo esc_attr($style); ?>"></div>

	<script>
        (function(b,i,t,C,O,I,N) {
            window.addEventListener('load',function() {
                if(b.getElementById(C))return;
                I=b.createElement(i),N=b.getElementsByTagName(i)[0];
                I.src=t;I.id=C;N.parentNode.insertBefore(I, N);
            },false)
        })(document,'script','https://widgets.bitcoin.com/widget.js','btcwdgt');
	</script>

<?php endif;