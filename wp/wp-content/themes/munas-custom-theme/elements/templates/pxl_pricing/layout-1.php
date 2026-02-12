<?php

if ( ! empty( $settings['button_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['button_link']['url'] );

    if ( $settings['button_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['button_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}

if ( ! empty( $settings['link_download']['url'] ) ) {
    $widget->add_render_attribute( 'button2', 'href', $settings['link_download']['url'] );

    if ( $settings['link_download']['is_external'] ) {
        $widget->add_render_attribute( 'button2', 'target', '_blank' );
    }

    if ( $settings['link_download']['nofollow'] ) {
        $widget->add_render_attribute( 'button2', 'rel', 'nofollow' );
    }
}

?>
<div class="pxl-pricing pxl-pricing1 <?php echo esc_attr($settings['pxl_animate'].' '.$settings['popular']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="content-inner">
        <?php if ($settings['popular']== 'is-popular'): ?>
            <span class="pxl-popular el-empty">
                <?php esc_html_e('Popular', 'vintech'); ?>
            </span>
        <?php endif ?>
        <?php if(!empty($settings['title_box'])) : ?>
            <h4 class="pxl-item--title">
                <?php echo pxl_print_html($settings['title_box']); ?>
            </h4>
        <?php endif; ?>
        <?php if ( !empty($settings['pxl_icon']['value']) ) : ?>
            <div class="pxl-counter--icon">
                <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
            </div>
        <?php endif; ?>
        <?php if (!empty($settings['price']) ) : ?>
            <div class="pxl-item--price">
                <?php echo pxl_print_html($settings['price']); ?>
                <?php if (!empty($settings['time']) ) : ?>
                    <span class="time"><?php echo pxl_print_html($settings['time']); ?></span>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if(!empty($settings['desc'])) : ?>
            <p class="pxl-item-description el-empty"><?php echo pxl_print_html($settings['desc']); ?></p>
        <?php endif; ?>
        <?php if(!empty($settings['button_text'])) : ?>
            <div class="pxl-item--button">
                <a class="btn-see btn btn-text-nina" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                    <span class="pxl--btn-text" data-text="<?php echo pxl_print_html($settings['button_text']); ?>">
                        <?php 
                        $chars = str_split($settings['button_text']);
                        foreach ($chars as $value) {
                            if($value == ' ') {
                                echo '<span class="spacer">&nbsp;</span>';
                            } else {
                                echo '<span>'.$value.'</span>';
                            }
                        } ?>
                    </span>
                </a>
            </div>
        <?php endif; ?>
        <?php if(isset($settings['feature']) && !empty($settings['feature']) && count($settings['feature'])): ?>
        <?php if(!empty($settings['feature_title'])) : ?>
            <p class="pxl-feature--title el-empty"><?php echo pxl_print_html($settings['feature_title']); ?></p>
        <?php endif; ?>
        <div class="pxl-item--feature ">
            <?php foreach ($settings['feature'] as $key => $value): ?>
                <div class="<?php echo esc_attr($value['active']); ?> d-flex">
                    <div class="content">
                        <?php if ($value['active']== 'is-active'): ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                              <g clip-path="url(#clip0_445_6997)">
                                <path d="M10 0C4.48578 0 0 4.48578 0 10C0 15.5142 4.48578 20 10 20C15.5142 20 20 15.5142 20 10C20 4.48578 15.5142 0 10 0Z" fill="#90D44B"/>
                                <path d="M15.0673 7.88074L9.65054 13.2973C9.48804 13.4598 9.27472 13.5416 9.0614 13.5416C8.84808 13.5416 8.63477 13.4598 8.47226 13.2973L5.76398 10.589C5.43805 10.2632 5.43805 9.73651 5.76398 9.41074C6.08975 9.08481 6.61633 9.08481 6.94226 9.41074L9.0614 11.5299L13.889 6.70245C14.2148 6.37653 14.7413 6.37653 15.0673 6.70245C15.393 7.02823 15.393 7.55481 15.0673 7.88074Z" fill="#252525"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_445_6997">
                                  <rect width="20" height="20" fill="white"/>
                              </clipPath>
                          </defs>
                      </svg>
                  <?php endif ?>
                  <?php if ($value['active'] != 'is-active'): ?>
                    <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" id="fi_10412365"><path d="m6.81 25.19a2 2 0 0 0 2.83 0l6.36-6.36 6.36 6.36a2 2 0 0 0 2.83-2.83l-6.36-6.36 6.36-6.36a2 2 0 0 0 -2.83-2.83l-6.36 6.36-6.36-6.36a2 2 0 0 0 -2.83 2.83l6.36 6.36-6.36 6.36a2 2 0 0 0 0 2.83z"></path></svg>
                <?php endif ?>
                <?php echo pxl_print_html($value['feature_text'])?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>
</div>
</div>