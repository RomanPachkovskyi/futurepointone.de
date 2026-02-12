<?php
$templates_df = ['0' => esc_html__('None', 'vintech')];
$templates = $templates_df + vintech_get_templates_option('popup') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_button',
        'title' => esc_html__('Case Button', 'vintech' ),
        'icon' => 'eicon-button',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'btn_style',
                            'label' => esc_html__('Type', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'btn-default',
                            'options' => [
                                'btn-default' => esc_html__('Default', 'vintech' ),
                                'btn-2-icons' => esc_html__('Icon + Line', 'vintech' ),
                                'btn-outline' => esc_html__('Outline', 'vintech' ),
                                'btn-circle' => esc_html__('Circle', 'vintech' ),
                                'btn-popup' => esc_html__('Popup', 'vintech' ),
                            ],
                        ),
                        array(
                            'name'         => 'title_gradient',
                            'label' => esc_html__( 'Background Type', 'vintech' ),
                            'type'         => \Elementor\Group_Control_Background::get_type(),
                            'control_type' => 'group',
                            'types' => [ 'gradient' ],
                            'condition' => [
                                'btn_style' => ['btn-outline'],
                            ],
                            'selector'     => '{{WRAPPER}} .btn:not(.btn-stroke).btn-outline .pxl--btn-text',
                        ),
                        array(
                            'name' => 'btn_line',
                            'label' => esc_html__('Color Line', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .btn:not(.btn-stroke).btn-2-icons .pxl--btn-text:after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-2-icons'],
                            ],
                        ),
                        array(
                            'name' => 'btn_line_gap',
                            'label' => esc_html__('Gap', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .btn:not(.btn-stroke).btn-2-icons' => 'gap: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                              'btn_style' => ['btn-2-icons'],
                          ],
                      ),
                        array(
                            'name' => 'btn_line_icon',
                            'label' => esc_html__('Line Position', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .btn:not(.btn-stroke).btn-2-icons .pxl--btn-text:after' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                              'btn_style' => ['btn-2-icons'],
                          ],
                      ),
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click Here', 'vintech'),
                        ),
                        array(
                            'name' => 'btn_action',
                            'label' => esc_html__('Action', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-atc-link',
                            'options' => [
                                'pxl-atc-link' => esc_html__('Link', 'vintech' ),
                                'pxl-atc-popup' => esc_html__('Popup', 'vintech' ),
                            ],
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                            'condition' => [
                                'btn_action' => ['pxl-atc-link'],
                            ],
                        ),

                        array(
                            'name' => 'popup_template',
                            'label' => esc_html__('Select Popup Template', 'vintech'),
                            'type' => 'select',
                            'options' => $templates,
                            'default' => 'df',
                            'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                            'condition' => [
                                'btn_action' => ['pxl-atc-popup'],
                            ],
                        ),

                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left'    => [
                                    'title' => esc_html__('Left', 'vintech' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'vintech' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'vintech' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__('Justified', 'vintech' ),
                                    'icon' => 'fa fa-align-justify',
                                ],
                            ],
                            'prefix_class' => 'elementor-align-',
                            'default' => '',
                            'selectors'         => [
                                '{{WRAPPER}} .pxl-button' => 'text-align: {{VALUE}}',
                            ],
                        ),
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'label_block' => true,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'icon_align',
                            'label' => esc_html__('Icon Position', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'left',
                            'options' => [
                                'left' => esc_html__('Before', 'vintech' ),
                                'right' => esc_html__('After', 'vintech' ),
                            ],
                        ),
                    ),
),

array(
    'name' => 'section_style_button',
    'label' => esc_html__('Button Normal', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array_merge(
        array(
            array(
                'name' => 'btn_w',
                'label' => esc_html__('Width', 'vintech' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'inline',
                'options' => [
                    'inline' => esc_html__('Inline', 'vintech' ),
                    'full' => esc_html__('Full Width', 'vintech' ),
                    'full justify-sb' => esc_html__('Full Width Space Between', 'vintech' ),
                ],
            ),
            array(
                'name' => 'btn_width_height',
                'label' => esc_html__( 'Button Width/Height', 'vintech' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .btn.btn-circle' => 'width: {{SIZE}}{{UNIT}};height: {{SIZE}}{{UNIT}};',
                ],
                'control_type' => 'responsive',
                'condition' => [
                    'btn_style' => ['btn-circle'],
                ],
            ),
            array(
                'name' => 'color',
                'label' => esc_html__('Color', 'vintech' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-button .btn' => 'color: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'btn_bg_color',
                'label' => esc_html__('Background Color', 'vintech' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .pxl-button .btn' => 'background-color: {{VALUE}};',
                ],
            ),
            array(
                'name' => 'btn_typography',
                'label' => esc_html__('Typography', 'vintech' ),
                'type' => \Elementor\Group_Control_Typography::get_type(),
                'control_type' => 'group',
                'selector' => '{{WRAPPER}} .pxl-button .btn',
            ),
            array(
                'name'         => 'btn_box_shadow',
                'label' => esc_html__( 'Box Shadow', 'vintech' ),
                'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                'control_type' => 'group',
                'selector'     => '{{WRAPPER}} .pxl-button .btn',
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
                    '{{WRAPPER}} .pxl-button .btn' => 'border-style: {{VALUE}} !important;',
                ],
            ),
            array(
                'name' => 'border_width',
                'label' => esc_html__( 'Border Width', 'vintech' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .pxl-button .btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .pxl-button .btn' => 'border-color: {{VALUE}} !important;',
                ],
                'condition' => [
                    'border_type!' => '',
                ],
            ),
        ),

array(
    array(
        'name' => 'btn_border_radius',
        'label' => esc_html__('Border Radius', 'vintech' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px' ],
        'selectors' => [
            '{{WRAPPER}} .pxl-button .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
    ),
    array(
        'name' => 'btn_padding',
        'label' => esc_html__('Padding', 'vintech' ),
        'type' => \Elementor\Controls_Manager::DIMENSIONS,
        'size_units' => [ 'px','vw' ],
        'selectors' => [
            '{{WRAPPER}} .pxl-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
        ],
        'control_type' => 'responsive',
    ),
)
),
),

array(
    'name' => 'section_style_button_hover',
    'label' => esc_html__('Button Hover', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'btn_text_effect',
            'label' => esc_html__('Text Effect', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => '',
            'options' => [
                '' => esc_html__('Default', 'vintech' ),
                'no-ef' => esc_html__('No Effect', 'vintech' ),
                'btn-text-nina' => esc_html__('Nina', 'vintech' ),
                'btn-text-nanuk' => esc_html__('Nanuk', 'vintech' ),
                'btn-text-smoke' => esc_html__('Smoke', 'vintech' ),
                'btn-text-reverse' => esc_html__('Reverse', 'vintech' ),
                'btn-text-parallax' => esc_html__('Text Parallax', 'vintech' ),
                'btn-hide-icon' => esc_html__('Hide Icon', 'vintech' ),
                'btn-glossy' => esc_html__('Glossy', 'vintech' ),
                'btn-underline' => esc_html__('Underline', 'vintech' ),
                'btn-text-applied' => esc_html__('Applied', 'vintech' ),
            ],
        ),
        array(
            'name' => 'transition_duration',
            'label' => esc_html__('Transition Duration', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 100000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .btn.btn-text-reverse .pxl-text--inner span' => 'transition-duration: {{SIZE}}ms;',
            ],
            'condition' => [
                'btn_text_effect' => ['btn-text-reverse'],
            ],
            'description' => 'Enter number, unit is ms.',
        ),
        array(
            'name' => 'color_hover',
            'label' => esc_html__('Color Hover', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-button .btn:hover' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-button .btn-hide-icon .pxl--btn-text:before' => 'background-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'bd_color_hover',
            'label' => esc_html__('Border Color Hover', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-button .btn:hover' => ' border-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'btn_bg_color_hover',
            'label' => esc_html__('Background Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-button .btn:hover' => 'background-color: {{VALUE}};',
            ],
            'condition' => [
                'btn_style!' => [''],
            ],
        ),

        array(
            'name'         => 'btn_box_shadow_hover',
            'label' => esc_html__( 'Box Shadow', 'vintech' ),
            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-button .btn:hover',
        ),
    ),
),

array(
    'name' => 'section_style_icon',
    'label' => esc_html__('Icon', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-button .btn i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-button .btn svg path' => 'fill: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'icon_hv_color',
            'label' => esc_html__('Color Hover', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-button .btn:hover i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-button .btn:hover svg path' => 'fill: {{VALUE}};',
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
                '{{WRAPPER}} .pxl-button .btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-button .btn svg' => 'width: {{SIZE}}{{UNIT}}; height: auto;',
                '{{WRAPPER}} .pxl-button .btn-svg:hover svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_font_size_2',
            'label' => esc_html__('Font Size Icon 2', 'vintech' ),
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
                '{{WRAPPER}} .pxl-button .btn-2-icons .pxl--btn-text > i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-button .btn-2-icons .pxl--btn-text > svg' => 'width: {{SIZE}}{{UNIT}};',
            ],

            'condition' => [
                'btn_style' => ['btn-2-icons'],
            ],
        ),

        array(
            'name' => 'width_box_icon',
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
            'selectors' => [
                '{{WRAPPER}} .pxl-button .btn i' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'height_box_icon',
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
            'selectors' => [
                '{{WRAPPER}} .pxl-button .btn i' => 'height: {{SIZE}}{{UNIT}};line-height: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'box_color',
            'label' => esc_html__('Box Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-button .btn i' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'box_color_hv',
            'label' => esc_html__('Box Color Hover', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-button .btn:hover i' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'icon_space_left',
            'label' => esc_html__('Icon Spacer', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'default' => [
                'size' => 10,
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-button .btn.pxl-icon--left:not(.btn-svg) i, {{WRAPPER}} .pxl-button .btn.pxl-icon--left:not(.btn-svg) svg' => 'margin-right: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-button .btn-svg.pxl-icon--left:hover  svg' => 'margin-right: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_align' => ['left'],
            ],
        ),
        array(
            'name' => 'icon_space_right',
            'label' => esc_html__('Icon Spacer', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 300,
                ],
            ],
            'default' => [
                'size' => 10,
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-button .btn.pxl-icon--right:not(.btn-svg) i, {{WRAPPER}} .pxl-button .btn.pxl-icon--right:not(.btn-svg) svg' => 'margin-left: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-button .btn-svg.pxl-icon--right:hover svg' => 'margin-left: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_align' => ['right'],
            ],
        ),
    ),
),
vintech_widget_animation_settings(),
),
),
),
vintech_get_class_widget_path()
);