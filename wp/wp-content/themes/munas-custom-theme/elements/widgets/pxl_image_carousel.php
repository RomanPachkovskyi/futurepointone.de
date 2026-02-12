<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

pxl_add_custom_widget(
    array(
        'name' => 'pxl_image_carousel',
        'title' => esc_html__('Case Image Carousel', 'vintech'),
        'icon' => 'eicon-testimonial',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
            'pxl-effect-gl',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'vintech' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'vintech' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_image_carousel/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'vintech' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_image_carousel/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 5', 'vintech' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_image_carousel/layout5.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'vintech'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => '1'
                    ],
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__('List', 'vintech'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                        ),
                    ),
                ),

                array(
                    'name' => 'section_content_5',
                    'label' => esc_html__('Content', 'vintech'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => '3'
                    ],
                    'controls' => array(
                        array(
                            'name' => 'image_5',
                            'label' => esc_html__('List', 'vintech'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            
                            'controls' => array(
                                array(
                                    'name' => 'image_5',
                                    'label' => esc_html__('Image', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'btn_text_5',
                                    'label' => esc_html__('Button Text', 'vintech'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'vintech'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                        ),
                    ),
                ),

                array(
                    'name' => 'section_content_2',
                    'label' => esc_html__('Content', 'vintech'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'layout' => '2'
                    ],
                    'controls' => array(
                        array(
                            'name' => 'image_2',
                            'label' => esc_html__('List', 'vintech'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            
                            'controls' => array(
                                array(
                                    'name' => 'image_2',
                                    'label' => esc_html__('Image', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'vintech'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'vintech'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'url_video',
                                    'label' => esc_html__('Url Video', 'vintech'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                            ),
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style_general',
                    'label' => esc_html__('General', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style_img',
                            'label' => esc_html__('Type', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'image',
                            'options' => [
                                'image' => esc_html__('Image', 'vintech' ),
                                'bgr' => esc_html__('Background', 'vintech' ),
                            ],
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'style_scroll',
                            'label' => esc_html__('Scroll', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'default',
                            'options' => [
                                'default' => esc_html__('Default', 'vintech' ),
                                'scroll-ltr' => esc_html__(' Left To Right', 'vintech' ),
                            ],
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                        array(
                            'name' => 'border_radius',
                            'label' => esc_html__( 'Border Radius', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-item--image,{{WRAPPER}} .pxl-image-carousel canvas' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'height_img',
                            'label' => esc_html__('Height', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],

                            'condition' => [
                                'style_img' => ['bgr'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-item--image ' => 'height: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'gap',
                            'label' => esc_html__('Gap', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-carousel .pxl-swiper-slide' => 'padding: {{SIZE}}{{UNIT}} {{SIZE}}{{UNIT}} 0 {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'default',
                            'options' => [
                                'default' => esc_html__('Default', 'vintech' ),
                                'style-2' => esc_html__('Style 2', 'vintech' ),
                                'style-3' => esc_html__('Style 3', 'vintech' ),
                            ],
                        ),

                    ),
),
array(
    'name' => 'tab_style',
    'label' => esc_html__('Style', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-image-carousel .pxl-item--title' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-image-carousel .pxl-item--title',
        ),
        array(
            'name' => 'position_color',
            'label' => esc_html__('Position Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-image-carousel .pxl-item--description' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'position_typography',
            'label' => esc_html__('Position Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-image-carousel .pxl-item--description',
        ),
        array(
            'name' => 'btn_color',
            'label' => esc_html__('Button Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-image-carousel .pxl-button' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'btn_typography',
            'label' => esc_html__('Button Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-image-carousel .pxl-button',
        ),
    ),
),
array(
    'name' => 'section_settings_carousel',
    'label' => esc_html__('Settings', 'vintech'),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array(
        array(
            'name' => 'effect',
            'label' => esc_html__('Effect', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'slide' => esc_html__('Slide', 'vintech' ),
                'gl' => esc_html__('Gl', 'vintech' ),
            ],
            'default' => 'slide',
        ),
        array(
            'name' => 'col_xs',
            'label' => esc_html__('Columns XS Devices', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_sm',
            'label' => esc_html__('Columns SM Devices', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '2',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_md',
            'label' => esc_html__('Columns MD Devices', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_lg',
            'label' => esc_html__('Columns LG Devices', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_xl',
            'label' => esc_html__('Columns XL Devices', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
                'auto' => 'Auto',
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'col_xxl',
            'label' => esc_html__('Columns XXL Devices', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '3',
            'options' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
            ],
        ),

        array(
            'name' => 'slides_to_scroll',
            'label' => esc_html__('Slides to scroll', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                '1' => '1',
                '2' => '2',
                '3' => '3',
                '4' => '4',
                '5' => '5',
                '6' => '6',
            ],
        ),
        array(
            'name' => 'arrows',
            'label' => esc_html__('Show Arrows', 'vintech'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'sizeb',
            'label' => esc_html__('Size Button', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-arrow' => 'width: {{SIZE}}{{UNIT}} !important;height: {{SIZE}}{{UNIT}} !important;line-height: {{SIZE}}{{UNIT}} !important;',
            ],
            'condition' => [
                'arrows' => ['true'],
            ],
        ),
        array(
            'name' => 'sizei',
            'label' => esc_html__('Size Icon', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-arrow i' => 'font-size: {{SIZE}}{{UNIT}} !important;',
            ],
            'condition' => [
                'arrows' => ['true'],
            ],
        ),
        array(
            'name' => 'pagination',
            'label' => esc_html__('Show Pagination', 'vintech'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => false,
        ),
        array(
            'name' => 'pagination_type',
            'label' => esc_html__('Pagination Type', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'bullets',
            'options' => [
                'bullets' => 'Bullets',
                'fraction' => 'Fraction',
                'progressbar' => 'Progressbar',
            ],
            'condition' => [
                'pagination' => 'true'
            ]
        ),

        array(
            'name' => 'dot_progressbar_color',
            'label' => esc_html__('Progressbar Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-dots.pxl-swiper-pagination-progressbar .swiper-pagination-progressbar-fill' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'pagination_type' => 'progressbar'
            ]
        ),

        array(
            'name' => 'pause_on_hover',
            'label' => esc_html__('Pause on Hover', 'vintech'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'autoplay',
            'label' => esc_html__('Autoplay', 'vintech'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'autoplay_speed',
            'label' => esc_html__('Autoplay Delay', 'vintech'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 5000,
            'condition' => [
                'autoplay' => 'true'
            ]
        ),
        array(
            'name' => 'infinite',
            'label' => esc_html__('Infinite Loop', 'vintech'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
        ),
        array(
            'name' => 'speed',
            'label' => esc_html__('Animation Speed', 'vintech'),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 500,
        ),
        array(
            'name' => 'drap',
            'label' => esc_html__('Show Scroll Drap', 'vintech'),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => false,
        ),
    ),
),
vintech_widget_animation_settings(),
),
),
),
vintech_get_class_widget_path()
);