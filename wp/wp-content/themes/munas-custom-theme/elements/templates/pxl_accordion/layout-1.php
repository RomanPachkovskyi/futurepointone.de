<?php
$active = intval($settings['active']);
$accordion = $widget->get_settings('accordion');
$accordion2 = $widget->get_settings('accordion2');
$wg_id = pxl_get_element_id($settings);
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '826x657';
if(!empty($accordion)) : ?>
    <div class="pxl-accordion pxl-accordion1 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($accordion as $key => $value):
            $is_active = ($key + 1) == $active;
            $pxl_id = isset($value['_id']) ? $value['_id'] : '';
            $title = isset($value['title']) ? $value['title'] : '';
            $number = isset($value['number']) ? $value['number'] : '';
            $desc = isset($value['desc']) ? $value['desc'] : '';
            $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
            $widget->add_render_attribute( $icon_key, [
                'class' => $value['pxl_icon'],
                'aria-hidden' => 'true',
            ] ); ?>
            <div class="pxl--item  <?php if($settings['style'] != 'style2') : ?> <?php echo esc_attr($is_active ? 'active' : ''); ?> <?php endif; ?>">
                <?php if($settings['style'] == 'style2') : ?><div class="wrap-content <?php echo esc_attr($is_active ? 'active' : ''); ?>"><?php endif; ?>

                <<?php pxl_print_html($settings['title_tag']); ?> class="pxl-accordion--title" data-target="<?php echo esc_attr('#'.$wg_id.'-'.$pxl_id); ?>">
                <?php if ( ! empty( $value['number'] ) && $settings['style'] != 'style3' ) : ?>
                    <span class="pxl-title--number pxl-mr-11">
                        <?php echo wp_kses_post($number); ?>
                    </span>
                <?php endif; ?>
                <?php if ( ! empty( $value['pxl_icon']['value'] ) ) : ?>
                    <span class="pxl-title--icon pxl-mr-11">
                        <?php \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true' ] ); ?>
                    </span>
                <?php endif; ?>
                <span class="pxl-title--text"><?php echo wp_kses_post($title); ?></span>

                <?php if($settings['style'] == 'style1') : ?><svg class="pxl-icon--plus " xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                  <g clip-path="url(#clip0_332_9859)">
                    <path d="M24 12C24 5.38331 18.6167 -2.35312e-07 12 -5.24537e-07C5.38331 -8.13761e-07 -2.35312e-07 5.38331 -5.24537e-07 12C-8.13761e-07 18.6167 5.38331 24 12 24C18.6167 24 24 18.6167 24 12ZM1.5 12C1.5 6.21019 6.21019 1.5 12 1.5C17.7898 1.5 22.5 6.21019 22.5 12C22.5 17.7898 17.7898 22.5 12 22.5C6.21019 22.5 1.5 17.7898 1.5 12ZM12.5302 17.0303C12.2372 17.3233 11.7626 17.3233 11.4697 17.0303L7.71975 13.2802C7.57331 13.1338 7.5 12.9418 7.5 12.75C7.5 12.5582 7.57331 12.3662 7.71975 12.2197C8.01281 11.9267 8.48737 11.9267 8.78025 12.2197L11.25 14.6895L11.25 7.5C11.25 7.08581 11.5854 6.75 12 6.75C12.4146 6.75 12.75 7.08581 12.75 7.5L12.75 14.6895L15.2197 12.2197C15.5128 11.9267 15.9874 11.9267 16.2802 12.2197C16.5731 12.5128 16.5733 12.9874 16.2802 13.2803L12.5302 17.0303Z" fill="#444444"/>
                </g>
                <defs>
                    <clipPath id="clip0_332_9859">
                      <rect width="24" height="24" fill="white" transform="translate(24) rotate(90)"/>
                  </clipPath>
              </defs>
              </svg><?php endif; ?> 

              <?php if($settings['style'] == 'style3') : ?><i class="pxl-icon--plus pxl-r-9"></i><?php endif; ?>

              </<?php pxl_print_html($settings['title_tag']); ?>>
              <?php if($settings['style'] != 'style3') : ?>
                  <div id="<?php echo esc_attr($wg_id.'-'.$pxl_id); ?>" class="pxl-accordion--content" <?php if($is_active){ ?>style="display: block;"<?php } ?>>
                    <?php echo wp_kses_post(nl2br($desc)); ?>
                </div>
            <?php endif; ?>
            <?php if($settings['style'] == 'style2') : ?></div><?php endif; ?>
            <?php if($settings['style'] == 'style3') : ?> <span class="pxl-title--number pxl-flex-center">
                <?php echo wp_kses_post($number); ?>
                </span><?php endif; ?>
                <?php if($settings['style'] == 'style2' || $settings['style'] == 'style3') : ?>
                    <div class="wrap-image">
                      <div id="<?php echo esc_attr($wg_id.'-'.$pxl_id); ?>" class="pxl-accordion--content" <?php if($is_active){ ?>style="display: block;"<?php } ?>>
                        <?php echo wp_kses_post(nl2br($desc)); ?>
                    </div>                    
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
<?php elseif (!empty($accordion2)) : ?>
    <div class="pxl-accordion pxl-accordion1 <?php echo esc_attr($settings['style'].' '.$settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php foreach ($accordion2 as $key => $value):
            $is_active = ($key + 1) == $active;
            $social = isset($value['social']) ? $value['social'] : '';
            $pxl_id = isset($value['_id']) ? $value['_id'] : '';
            $popup_template = isset($value['popup_template']) ? $value['popup_template'] : '';
            $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
            $btn_text5 = isset($value['btn_text2']) ? $value['btn_text2'] : '';
            $link_key = $widget->get_repeater_setting_key( 'btn_link', 'value', $key );
            if (!empty($value['btn_link']['url'])) {
                $widget->add_render_attribute( $link_key, 'href', $value['btn_link']['url'] );

                if ($value['btn_link']['is_external']) {
                    $widget->add_render_attribute( $link_key, 'target', '_blank' );
                }

                if ($value['btn_link']['nofollow']) {
                    $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                }
            }
            $link_attributes = $widget->get_render_attribute_string($link_key);
            $title = isset($value['title2']) ? $value['title2'] : '';
            if($popup_template > 0 ){
                if ( !has_action( 'pxl_anchor_target_page_popup_'.$popup_template) ){
                    add_action( 'pxl_anchor_target_page_popup_'.$popup_template, 'vintech_hook_anchor_page_popup' );
                } 
            }
            ?>
            <div class="pxl--item">
                <div class="pxl-item--container <?php echo esc_attr($is_active ? 'active' : ''); ?>">
                    <<?php pxl_print_html($settings['title_tag']); ?> class="pxl-accordion--title" data-target="<?php echo esc_attr('#'.$wg_id.'-'.$pxl_id); ?>">
                    <span class="pxl-title--text pxl-pr-20"><?php echo wp_kses_post($title); ?></span>
                    <?php if (!empty($btn_text5)): ?>
                        <span class="pxl-title--btn">
                            <?php echo pxl_print_html($btn_text5); ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                              <path d="M7.99996 10.6666C7.91222 10.6671 7.82525 10.6503 7.74402 10.6171C7.6628 10.584 7.58892 10.5351 7.52663 10.4733L3.52663 6.47329C3.40109 6.34776 3.33057 6.1775 3.33057 5.99996C3.33057 5.82243 3.40109 5.65216 3.52663 5.52663C3.65216 5.40109 3.82243 5.33057 3.99996 5.33057C4.1775 5.33057 4.34776 5.40109 4.47329 5.52663L7.99996 9.05996L11.5266 5.53329C11.6542 5.42408 11.8182 5.36701 11.986 5.37349C12.1538 5.37997 12.3129 5.44952 12.4317 5.56825C12.5504 5.68698 12.62 5.84614 12.6264 6.01393C12.6329 6.18171 12.5758 6.34576 12.4666 6.47329L8.46663 10.4733C8.34245 10.5965 8.17485 10.6659 7.99996 10.6666Z" fill="#5230DA"/>
                          </svg>
                      </span>
                  <?php endif ?>
                  </<?php pxl_print_html($settings['title_tag']); ?>>
                  <?php if(!empty($social)): ?>
                    <div class="pxl-item--location pxl-flex-justify">
                        <?php
                        $team_social = json_decode($social, true);
                        foreach ($team_social as $value):
                            if (!empty($value['url'])): ?>
                                <a href="<?php echo esc_url($value['url']); ?>">
                                <?php endif; ?>
                                <span><?php echo pxl_print_html($value['content']); ?></span>
                                <?php if (!empty($value['url'])): ?>
                                </a>
                            <?php endif;
                        endforeach;
                        ?>
                    </div>
                <?php endif; ?>
            </div>
            <?php if(!empty($btn_text)) : ?>
                <a class="btn btn-text-nanuk btn-default" <?php echo implode( ' ', [ $link_attributes ] ); ?>><span class="pxl--btn-text" data-text="Get in Touch">
                    <?php 
                    $chars = str_split($btn_text);
                    foreach ($chars as $value) {
                        if($value == ' ') {
                            echo '<span class="spacer">&nbsp;</span>';
                        } else {
                            echo '<span>'.$value.'</span>';
                        }
                    } ?>
                </span><svg xmlns="http://www.w3.org/2000/svg" width="20" height="6" viewBox="0 0 20 6" fill="none">
                  <path d="M17.7721 5.477L19.8245 3.42458C19.9369 3.31189 20 3.15921 20 3.00003C20 2.84085 19.9369 2.68817 19.8245 2.57548L17.7721 0.523097C17.68 0.433323 17.5562 0.383455 17.4275 0.384288C17.2989 0.385121 17.1757 0.436588 17.0848 0.527548C16.9938 0.618508 16.9423 0.741639 16.9414 0.870284C16.9406 0.998928 16.9904 1.12273 17.0802 1.21489L18.376 2.51071H0.489219C0.35947 2.51071 0.235035 2.56226 0.143289 2.654C0.0515425 2.74575 0 2.87018 0 2.99993C0 3.12968 0.0515425 3.25412 0.143289 3.34586C0.235035 3.43761 0.35947 3.48915 0.489219 3.48915H18.3759L17.0802 4.78521C16.9896 4.8772 16.939 5.00126 16.9395 5.13037C16.94 5.25948 16.9915 5.38315 17.0828 5.47445C17.1741 5.56574 17.2978 5.61725 17.4269 5.61775C17.556 5.61825 17.6801 5.5677 17.7721 5.47712V5.477Z" fill="white"/>
              </svg></a>
          <?php endif; ?>
          <div id="<?php echo esc_attr($wg_id.'-'.$pxl_id); ?>" class="pxl-accordion--content" <?php if($is_active){ ?>style="display: block;"<?php } ?>>
            <?php if(!empty($popup_template)) {
                $tab_content = elementor\plugin::$instance->frontend->get_builder_content_for_display( (int)$popup_template);
                $tab_bd_ids[] = (int)$popup_template;
                pxl_print_html($tab_content);
            }
            ?>
        </div>
    </div>
<?php endforeach; ?>
</div>
<?php endif; ?>