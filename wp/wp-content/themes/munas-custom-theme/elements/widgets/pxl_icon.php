<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon',
        'title' => esc_html__('Case Icons', 'vintech'),
        'icon' => 'eicon-alert',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'vintech'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'icons',
                            'label' => esc_html__('Icons', 'vintech'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'icon_link',
                                    'label' => esc_html__('Link', 'vintech'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'label',
                                    'label' => esc_html__('Label', 'vintech'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link_text',
                                    'label' => esc_html__('Label Link', 'vintech'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'color_item',
                                    'label' => esc_html__( 'Color', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'default' => '',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-icon1 {{CURRENT_ITEM}}' => 'color: {{VALUE}};',
                                    ],
                                ),
                                array(
                                    'name' => 'color_item_hover',
                                    'label' => esc_html__( 'Color Hover', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'default' => '',
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-icon1 {{CURRENT_ITEM}}:hover' => 'color: {{VALUE}};',
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ label }}}',
                        ),
                        array(
                          'name' => 'align',
                          'label' => esc_html__( 'Alignment', 'vintech' ),
                          'type' => \Elementor\Controls_Manager::CHOOSE,
                          'control_type' => 'responsive',
                          'options' => [
                            'left' => [
                                'title' => esc_html__( 'Left', 'vintech' ),
                                'icon' => 'eicon-text-align-left',
                            ],
                            'center' => [
                                'title' => esc_html__( 'Center', 'vintech' ),
                                'icon' => 'eicon-text-align-center',
                            ],
                            'right' => [
                                'title' => esc_html__( 'Right', 'vintech' ),
                                'icon' => 'eicon-text-align-right',
                            ],
                        ],
                        'selectors' => [
                            '{{WRAPPER}} .pxl-icon1' => 'text-align: {{VALUE}};justify-content: {{VALUE}};',
                        ],
                    ),
                    ),
),
array(
    'name' => 'section_style',
    'label' => esc_html__('Style', 'vintech'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'style',
            'label' => esc_html__('Style', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style-1' => 'Default',
                'style-2' => 'Style Box',
                'style-4' => 'Style Box 2',
                'style-7' => 'Style Box 3',
                'style-3' => 'Style Label',
                'style-6' => 'Style Label 2',
                'style-5' => 'Draw Svg',
            ],
            'default' => 'style-1',
        ),
        array(
            'name' => 'animate_hover',
            'label' => esc_html__('Animation Hover', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '',
            'options' => [
                '' => esc_html__('Style 1', 'vintech' ),
                'ani1' => esc_html__('Style 2', 'vintech' ),
                'ani2' => esc_html__('Style 3', 'vintech' ),
                'ani3' => esc_html__('Style 4', 'vintech' ),
            ],
        ),
        array(
            'name' => 'border_color_4',
            'label' => esc_html__( 'Border Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a .icon-box' => 'border-color: {{VALUE}};',
            ],
            'condition' => [
                'style' => 'style-4',
            ],
        ),
        array(
            'name' => 'color',
            'label' => esc_html__( 'Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-icon1 a i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-icon1 a svg path' => 'fill: {{VALUE}};',
            ],
        ),

        array(
            'name' => 'space_t_tl',
            'label' => esc_html__('Space Bottom', 'vintech' ),
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
                '{{WRAPPER}} .pxl-icon-list i' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-icon-list img' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-icon-list svg' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'color_hover',
            'label' => esc_html__( 'Icon Color Hover', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a:hover,{{WRAPPER}} .pxl-icon1 a:hover i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-icon1 a:hover svg path' => 'fill: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'box_color',
            'label' => esc_html__( 'Box Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'style!' => ['style-4','style-7'],
            ],
        ),
        array(
            'name' => 'box_color_hover',
            'label' => esc_html__( 'Box Color Hover', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a:hover' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'style!' => ['style-4','style-7'],
            ],
        ),
        array(
            'name' => 'box_color_4',
            'label' => esc_html__( 'Box Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'condition' => [
                'style' => ['style-4','style-7'],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a .icon-box' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'box_color_hover_4',
            'label' => esc_html__( 'Box Color Hover', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'condition' => [
                'style' => ['style-4','style-7'],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a:hover .icon-box' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name'         => 'box_shadow',
            'label' => esc_html__( 'Box Shadow', 'vintech' ),
            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-icon1 a',
        ),
        array(
            'name' => 'box_width',
            'label' => esc_html__('Box Width', 'vintech' ),
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
                'style!' => ['style-4','style-7'],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'box_height',
            'label' => esc_html__('Box Height', 'vintech' ),
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
                'style!' => ['style-4','style-7'],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'box_width4',
            'label' => esc_html__('Box Width', 'vintech' ),
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
                'style' => ['style-4','style-7'],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a .icon-box' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'box_height4',
            'label' => esc_html__('Box Height', 'vintech' ),
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
                'style' => ['style-4','style-7'],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a .icon-box' => 'height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_font_size',
            'label' => esc_html__('Font Size', 'vintech' ),
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
                '{{WRAPPER}} .pxl-icon1 a i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-icon1 a svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
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
                '{{WRAPPER}} .pxl-icon1 a' => 'border-style: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'border_width',
            'label' => esc_html__( 'Border Width', 'vintech' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .pxl-icon1 a' => 'border-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'border_type!' => '',
            ],
        ),

        array(
            'name' => 'border_color_hover',
            'label' => esc_html__( 'Border Color Hover', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a:hover' => 'border-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'border_type!' => '',
            ],
        ),
        array(
            'name' => 'icon_border_radius4',
            'label' => esc_html__('Border Radius', 'vintech' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a .icon-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'style' => 'style-4',
            ],
        ),
        array(
            'name' => 'icon_border_radius',
            'label' => esc_html__('Border Radius', 'vintech' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'condition' => [
                'style!' => 'style-4',
            ],
        ),
        array(
            'name' => 'icon_margin',
            'label' => esc_html__('Margin', 'vintech' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                '{{WRAPPER}} .pxl-icon1' => 'margin-left: -{{LEFT}}{{UNIT}};margin-right: -{{RIGHT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'icon_padding',
            'label' => esc_html__('Padding', 'vintech' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-icon1 a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
    ),
),
array(
    'name' => 'section_style_t',
    'label' => esc_html__('Title', 'vintech'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'style_t',
            'label' => esc_html__('Style', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style-1' => 'Default',
                'style-2' => 'Style Gradient',
            ],
            'default' => 'style-1',
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__('Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-list span' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_color_hover',
            'label' => esc_html__('Color Hover', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-icon-list:hover span' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 't_typography',
            'label' => esc_html__('Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-icon-list span',
        ),
    ),
),
vintech_widget_animation_settings(),
),
),
),
vintech_get_class_widget_path()
);