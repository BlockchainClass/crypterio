<?php

$id = get_the_ID();
$linkedin = get_post_meta( $id, 'linkedin', true )

?>

<li>
    <div class="inner_box">
        <div class="staff_image">
            <?php
            $post_thumbnail = wpb_getImageBySize( array(
                'attach_id' => get_post_thumbnail_id($id),
                'thumb_size' => '115x115',
            ) );

            $thumbnail = $post_thumbnail['thumbnail'];
            ?>

            <?php echo crypterio_sanitize_text_field($thumbnail); ?>

            <?php if( !empty($linkedin) ): ?>
                <a href="<?php echo esc_html( $linkedin ); ?>" class="staff_linkedin">
                    <i class="fa fa-linkedin"></i>
                </a>
            <?php endif; ?>
        </div>

        <div class="inner">
            <h4 class="no_stripe">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
            <div class="stm_invis">
                <div class="stm_excerpt">
					<?php if ($excerpt = crypterio_substr_text(get_the_excerpt(), '50')): ?>
                        <p><?php echo esc_html($excerpt); ?></p>
					<?php endif; ?>
                </div>
<!--                <a class="stm_link_bordered white"-->
<!--                   href="--><?php //the_permalink(); ?><!--">--><?php //esc_html_e('More', 'crypterio'); ?><!--</a>-->
            </div>
        </div>

    </div>
</li>