<?php $html_id = pxl_get_element_id($settings); 
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '767x767';
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}

if(isset($settings['tabs']) && !empty($settings['tabs']) && count($settings['tabs'])): 
    $tab_bd_ids = [];
?>
<div class="pxl-tabs pxl-tabs5 <?php echo esc_attr($settings['tab_effect'].' '.$settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-tabs--inner">
        <div class="pxl-tabs--content">
            <?php foreach ($settings['tabs'] as $key => $content) : 
                $image = isset($content['image']) ? $content['image'] : '';
                ?>
                <div id="<?php echo esc_attr($html_id.'-'.$content['_id']); ?>" class="pxl-item--content <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?> <?php if($content['content_type'] == 'template') { echo 'pxl-tabs--elementor'; } ?>" <?php if($settings['tab_active'] == $key + 1) { ?>style="display: block;"<?php } ?>>
                    <?php
                    if (!empty($content['content_type']) && !empty($content['desc'])) {
                        echo pxl_print_html($content['desc']);

                    } elseif (!empty($content['content_template'])) {
                        $tab_content = Elementor\Plugin::$instance->frontend->get_builder_content_for_display((int) $content['content_template']);
                        $tab_bd_ids[] = (int) $content['content_template'];
                        pxl_print_html($tab_content);

                    } else {
                        if (!empty($image['id'])) {
                            $img = pxl_get_image_by_size([
                                'attach_id'  => $image['id'],
                                'thumb_size' => $image_size,
                                'class'      => 'no-lazyload',
                            ]);

                            if (!empty($img['thumbnail'])) {
                                ?>
                                <div class="pxl-item--image">
                                    <a <?php echo !empty($link_attributes) ? implode(' ', [$link_attributes]) : ''; ?>>
                                        <?php echo wp_kses_post($img['thumbnail']); ?>
                                    </a>
                                </div>
                                <?php
                            }
                        }
                    }
                    ?>   
                </div>
            <?php endforeach; ?>
        </div>
        <div class="wrap-content-title">
            <?php if (!empty($settings['subtitle_box'])) { ?>
                <div class="subtitle-box">
                    <?php echo pxl_print_html($settings['subtitle_box']); ?>
                </div>
            <?php } ?>
            <?php if (!empty($settings['title_box'])) { ?>
                <h2 class="title-box">
                    <?php echo pxl_print_html($settings['title_box']); ?>
                </h2>
            <?php } ?>
            <?php if (!empty($settings['desc_box'])){ ?>
                <div class="desc-box">
                    <?php echo pxl_print_html($settings['desc_box']); ?>
                </div>
            <?php } ?>
            <div class="pxl-tabs--title">
                <?php foreach ($settings['tabs'] as $key => $value) : ?>
                    <span class="pxl-item--title <?php if($settings['tab_active'] == $key + 1) { echo 'active'; } ?>" data-target="#<?php echo esc_attr($html_id.'-'.$value['_id']); ?>">
                     <?php if(!empty($value['pxl_icon_tab'])) { ?>
                        <span class="icon-tab">
                            <?php \Elementor\Icons_Manager::render_icon( $value['pxl_icon_tab'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                        </span>
                    <?php } ?> 
                    <?php echo pxl_print_html($value['title']); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="6" viewBox="0 0 20 6" fill="none">
                      <path d="M17.7721 5.47651L19.8245 3.42409C19.9369 3.3114 20 3.15872 20 2.99954C20 2.84036 19.9369 2.68768 19.8245 2.57499L17.7721 0.522608C17.68 0.432835 17.5562 0.382966 17.4275 0.383799C17.2989 0.384632 17.1757 0.4361 17.0848 0.52706C16.9938 0.618019 16.9423 0.741151 16.9414 0.869795C16.9406 0.99844 16.9904 1.12224 17.0802 1.21441L18.376 2.51023H0.489219C0.35947 2.51023 0.235035 2.56177 0.143289 2.65351C0.0515425 2.74526 0 2.8697 0 2.99944C0 3.12919 0.0515425 3.25363 0.143289 3.34537C0.235035 3.43712 0.35947 3.48866 0.489219 3.48866H18.3759L17.0802 4.78472C16.9896 4.87671 16.939 5.00078 16.9395 5.12988C16.94 5.25899 16.9915 5.38266 17.0828 5.47396C17.1741 5.56525 17.2978 5.61676 17.4269 5.61727C17.556 5.61777 17.6801 5.56722 17.7721 5.47663V5.47651Z" fill="#5230DA"/>
                  </svg>
              </span>
              <?php if($settings['style'] == 'style-text-gradient') { echo '<br/>'; } ?>
          <?php endforeach; ?>
      </div>
      <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?> class="btn-text-nanuk btn btn-2-icons">
        <span class="pxl--btn-text" data-text="<?php if(!empty($settings['text'])) {
            echo pxl_print_html($settings['text']);
        } else {
            echo esc_html__('Read more', 'vintech');
        } ?>"><?php if(!empty($settings['text'])) {
            $chars = str_split($settings['text']);
            foreach ($chars as $value) {
                if($value == ' ') {
                    echo '<span class="spacer">&nbsp;</span>';
                } else {
                    echo '<span>'.$value.'</span>';
                }
            }
        } else {
            echo esc_html__('Read more', 'vintech');
        } ?></span>
        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14" fill="none"><path d="M10.2 0.199951L9.01 1.38995L13.77 6.14995H0V7.84995H13.77L9.01 12.61L10.2 13.8L17 6.99995L10.2 0.199951Z" fill="#fff"></path></svg>
    </a>
</div>
</div>
</div>
<?php endif; ?>