<?php
$html_id = pxl_get_element_id($settings);
$select_post_by = $widget->get_setting('select_post_by', '');
$source = $post_ids = [];
if($select_post_by === 'post_selected'){
    $post_ids = $widget->get_setting('source_'.$settings['post_type'].'_post_ids', '');
}else{
    $source  = $widget->get_setting('source_'.$settings['post_type'], '');
}
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('service', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$arrows = $widget->get_setting('arrows', false);
$pagination = $widget->get_setting('pagination', false);
$pagination_type = $widget->get_setting('pagination_type', 'bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover', false);
$autoplay = $widget->get_setting('autoplay', false);
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite', false);
$speed = $widget->get_setting('speed', '500');
$center = $widget->get_setting('center', false);
$drap = $widget->get_setting('drap', false);

$img_size = $widget->get_setting('img_size');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => 1, 
    'slide_percolumnfill'           => 1, 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => (int)$col_xl, 
    'slides_to_show_xxl'            => (int)$col_xxl, 
    'slides_to_show_lg'             => (int)$col_lg, 
    'slides_to_show_md'             => (int)$col_md, 
    'slides_to_show_sm'             => (int)$col_sm, 
    'slides_to_show_xs'             => (int)$col_xs, 
    'slides_to_scroll'              => (int)$slides_to_scroll,  
    'slides_gutter'                 => 30, 
    'arrow'                         => (bool)$arrows,
    'pagination'                    => (bool)$pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => (bool)$autoplay,
    'pause_on_hover'                => (bool)$pause_on_hover,
    'pause_on_interaction'          => true,
    'delay'                         => (int)$autoplay_speed,
    'loop'                          => (bool)$infinite,
    'speed'                         => (int)$speed,
    'center'                        => (bool)$center,
];

$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-slider pxl-service-carousel pxl-service-carousel2 pxl-service-style1 " <?php if($drap !== false): ?>data-cursor-drap="<?php echo esc_html('DRAG', 'vintech'); ?>"<?php endif; ?>>
        <div class="pxl-carousel-inner ">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                    $pos_number = 0;
                    foreach ($posts as $post):
                        $service_main_color = get_post_meta($post->ID, 'service_main_color', true);
                        $service_excerpt = get_post_meta($post->ID, 'service_excerpt', true);
                        $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
                        $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                        $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                        $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                        $pos_number++;
                        $multi_text_country = get_post_meta($post->ID, 'multi_text_country_ser', true);  
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-post--inner  <?php echo esc_attr($pxl_animate); ?> wow">
                                <div class="inner-content">
                                    <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                        <div class="pxl-post--icon">
                                            <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                                        $icon_img = pxl_get_image_by_size( array(
                                            'attach_id'  => $service_icon_img['id'],
                                            'thumb_size' => 'full',
                                        ));
                                        $icon_thumbnail = $icon_img['thumbnail'];
                                        ?>
                                        <div class="pxl-post--icon">
                                            <?php echo wp_kses_post($icon_thumbnail); ?>
                                        </div>
                                    <?php endif; ?>
                                    <h4 class="pxl-post--title">
                                        <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php echo pxl_print_html(get_the_title($post->ID)); ?>
                                    </a>
                                </h4>
                                <?php if($show_excerpt == 'true'): ?>
                                    <div class="pxl-post--content">
                                        <?php echo wp_trim_words( $post->post_excerpt,  $num_words, null ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (!empty($multi_text_country)): ?>
                                    <ul class="multi-text">
                                        <?php foreach ($multi_text_country as $index => $text): ?>
                                            <li class="box-multi">
                                                <?php echo pxl_print_html($text); ?>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <?php if($show_button == 'true') : ?>
                                    <div class="pxl-post--readmore">
                                        <a class="btn-readmore btn-text-nanuk btn btn-2-icons" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                            <span class="pxl--btn-text" data-text="<?php if(!empty($button_text)) {
                                                echo pxl_print_html($button_text);
                                            } else {
                                                echo esc_html__('Read more', 'vintech');
                                            } ?>"><?php if(!empty($button_text)) {
                                                $chars = str_split($button_text);
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="14" viewBox="0 0 17 14" fill="none"><path d="M10.2 0.199951L9.01 1.38995L13.77 6.14995H0V7.84995H13.77L9.01 12.61L10.2 13.8L17 6.99995L10.2 0.199951Z" fill="#5230DA"></path></svg>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>    
                <?php endforeach; ?>
            </div> 
        </div>
        <?php if($pagination !== false): ?>
            <div class="pxl-swiper-dots style-1"></div>
        <?php endif; ?>

        <?php if($arrows !== false): ?>
            <div class="pxl-swiper-arrow-wrap style-1">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="bi-chevron-left rtl-icon"></i></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="bi-chevron-right rtl-icon"></i></div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>