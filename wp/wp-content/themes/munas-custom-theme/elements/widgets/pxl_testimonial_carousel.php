<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );

pxl_add_custom_widget(
    array(
        'name' => 'pxl_testimonial_carousel',
        'title' => esc_html__('Case Testimonial Carousel', 'vintech'),
        'icon' => 'eicon-testimonial',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_carousel/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'vintech' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_carousel/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'vintech' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_carousel/layout3.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'vintech'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'testimonial',
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'avatar',
                                    'label' => esc_html__('Avatar', 'vintech' ),
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
                                    'name' => 'desc',
                                    'label' => esc_html__('Description', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'star',
                                    'label' => esc_html__('Star', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '5',
                                    'options' => [
                                        '1' => esc_html__('1', 'vintech' ),
                                        '2' => esc_html__('2', 'vintech' ),
                                        '3' => esc_html__('3', 'vintech' ),
                                        '4' => esc_html__('4', 'vintech' ),
                                        '5' => esc_html__('5', 'vintech' ),
                                        'none' => esc_html__('0', 'vintech' ),
                                    ],
                                ),

                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                        array(
                            'name' => 'client_title',
                            'label' => esc_html__('Client Title', 'vintech'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout' => ['2']
                            ],
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'vintech'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                            'condition' => [
                                'layout' => ['2']
                            ],
                        ),
                        array(
                            'name' => 'client',
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['2']
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'avatar_c',
                                    'label' => esc_html__('Avatar', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                            ),
                            'title_field' => '{{{ avatar_c }}}',
                        ),
                    ),
),

array(
    'name' => 'section_style_general',
    'label' => esc_html__('General', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'condition' => [
        'layout' => ['2','3']
    ],
    'controls' => array(
        array(
            'name' => 'show_overlay',
            'label' => esc_html__('Show Overlay', 'vintech'),
            'type' => \elementor\controls_manager::SWITCHER,
        ),
        array(
            'name' => 'style',
            'label' => esc_html__('Style', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '',
            'options' => [
                '' => esc_html__('Default', 'vintech' ),
                'style-2' => esc_html__('Style 2', 'vintech' ),
            ],
        ),
        array(
            'name' => 'box_color',
            'label' => esc_html__('Box Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'box_padding',
            'label' => esc_html__('Box Padding', 'vintech' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'border_type',
            'label' => esc_html__( 'Border Type', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                '' => esc_html__( 'None', 'vintech' ),
                'solid' => esc_html__( 'Solid', 'vintech' ),
                'double' => esc_html__( 'Double', 'vintech' ),
                'dotted' => esc_html__( 'Dotted', 'vintech' ),
                'dashed' => esc_html__( 'Dashed', 'vintech' ),
                'groove' => esc_html__( 'Groove', 'vintech' ),
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-style: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'border_width',
            'label' => esc_html__( 'Border Width', 'vintech' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
            'condition' => [
                'border_type!' => '',
            ],
            'responsive' => true,
        ),
        array(
            'name' => 'border_color',
            'label' => esc_html__( 'Border Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--inner' => 'border-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'border_type!' => '',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_color',
            'label' => esc_html__('Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--title',
        ),
    ),
),
array(
    'name' => 'section_style_position',
    'label' => esc_html__('Position', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'position_color',
            'label' => esc_html__('Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'position_typography',
            'label' => esc_html__('Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--position',
        ),
    ),
),
array(
    'name' => 'section_style_desc',
    'label' => esc_html__('Description', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'line_color',
            'label' => esc_html__('Under Line Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'condition' => [
                'layout' => '1'
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc' => 'border-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'desc_color',
            'label' => esc_html__('Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'desc_typography',
            'label' => esc_html__('Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-testimonial-carousel .pxl-item--desc',
        ),
    ),
),
array(
    'name' => 'section_settings_carousel',
    'label' => esc_html__('Settings', 'vintech'),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array(
        array(
            'name' => 'item_padding_r',
            'label' => esc_html__('Item Padding', 'vintech' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'default' => [
                'top' => '15',
                'right' => '15',
                'bottom' => '15',
                'left' => '15'
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-container' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
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
            'name' => 'arrows_type',
            'label' => esc_html__('Arrows Type', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'style-1',
            'options' => [
                'style-1' => esc_html__('Default', 'vintech' ),
                'style-2' => esc_html__('Style 2', 'vintech' ),
                'style-3' => esc_html__('Style 3', 'vintech' ),
            ],
            'condition' => [
                'layout' => '3'
            ]
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