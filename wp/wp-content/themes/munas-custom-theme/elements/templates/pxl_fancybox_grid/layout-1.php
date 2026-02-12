<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');

$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
?>
<?php if(isset($settings['box']) && !empty($settings['box']) && count($settings['box'])): ?>
    <div class="pxl-grid pxl-box-grid pxl-box-grid1 " data-layout="<?php echo esc_attr($settings['layout_mode']); ?>">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <?php foreach ($settings['box'] as $key => $value):
                $title = isset($value['title']) ? $value['title'] : '';
                $step = isset($value['step']) ? $value['step'] : '';
                $desc = isset($value['desc']) ? $value['desc'] : '';
                $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
                $btn_link = isset($value['btn_link']) ? $value['btn_link'] : '';
                $link_key_2 = $widget->get_repeater_setting_key( 'btn_link', 'value', $key );
                if ( ! empty( $value['btn_link']['url'] ) ) {
                    $widget->add_render_attribute( $link_key_2, 'href', $value['btn_link']['url'] );

                    if ( $value['btn_link']['is_external'] ) {
                        $widget->add_render_attribute( $link_key_2, 'target', '_blank' );
                    }

                    if ( $value['btn_link']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key_2, 'rel', 'nofollow' );
                    }
                }
                $link_attributes_2 = $widget->get_render_attribute_string( $link_key_2 );
                ?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
                        <div class="pxl-item--holder ">
                            <span class="pxl-item--step"><?php echo pxl_print_html($step); ?></span>
                            <h3 class="pxl-item--title"><?php echo pxl_print_html($title); ?></h3>
                            <p class="pxl-item--desc"><?php echo pxl_print_html($desc); ?></p>
                            <?php if(!empty($btn_text)) : ?>
                                <div class="pxl-button">
                                    <a <?php echo implode( ' ', [ $link_attributes_2 ] ); ?> class="btn">
                                        <span><?php echo pxl_print_html($btn_text); ?></span>
                                        <i class="bi-arrow-right-short rtl-reverse"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                   </div>
                </div>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>
