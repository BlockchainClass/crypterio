<?php
wp_enqueue_script('particles');
$particles_class = 'stm_particles_bg-' . rand(0, 9999);

?>

<div class="stm_particles_bg_main" id="<?php echo esc_attr($particles_class); ?>"></div>

<style>
    #<?php echo esc_attr( $particles_class ); ?>
    {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        min-width: 3000px;
    }
    .vc_cta3_content-container {
        position: relative;
    }
</style>

<script type="text/javascript">
    (function ($) {
        $(window).load(function () {
            var screenWidth = $(window).width();
            if (screenWidth < 1140) {
                var defaultWidth = screenWidth;
            } else {
                var defaultWidth = 1140;
            }
            var marginLeft = (screenWidth - defaultWidth) / 2;

            $('#<?php echo esc_js($particles_class); ?>').css({
                'width': screenWidth + 'px',
                'margin-left': '-' + marginLeft + 'px'
            });

            particlesJS('<?php echo esc_js($particles_class); ?>',

                {
                    "particles": {
                        "number": {
                            "value": 100,
                            "density": {
                                "enable": true,
                                "value_area": 800
                            }
                        },
                        "color": {
                            "value": "#ffffff"
                        },
                        "opacity": {
                            "value": 0.1,
                            "random": false,
                            "anim": {
                                "enable": false,
                                "speed": 1,
                                "opacity_min": 0.1,
                                "sync": false
                            }
                        },
                        "size": {
                            "value": 4,
                            "random": true,
                            "anim": {
                                "enable": false,
                                "speed": 40,
                                "size_min": 0.1,
                                "sync": false
                            }
                        },
                        "line_linked": {
                            "enable": true,
                            "distance": 150,
                            "color": "#ffffff",
                            "opacity": 0.1,
                            "width": 1
                        },
                        "move": {
                            "enable": true,
                            "speed": 3,
                            "direction": "none",
                            "random": false,
                            "straight": false,
                            "out_mode": "out",
                            "attract": {
                                "enable": false,
                                "rotateX": 600,
                                "rotateY": 1200
                            }
                        }
                    },
                    "interactivity": {
                        "detect_on": "canvas",
                        "events": {
                            "onhover": {
                                "enable": false,
                                "mode": "grab"
                            },
                            "onclick": {
                                "enable": false,
                                "mode": "push"
                            },
                            "resize": true
                        }
                    },
                    "retina_detect": true
                }
            );
        });
    })(jQuery);
</script>