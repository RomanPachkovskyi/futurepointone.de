<?php
$templates_df = ['0' => esc_html__('None', 'vintech')];
$templates_lv1 = ['1' => esc_html__('Hidden Panel Mobile', 'vintech')];
$templates = $templates_df + $templates_lv1 + vintech_get_templates_option('hidden-panel') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_anchor',
        'title' => esc_html__('Case Anchor', 'vintech' ),
        'icon' => 'eicon-anchor',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_template',
                            'label' => esc_html__('Select Template', 'vintech'),
                            'type' => 'select',
                            'options' => $templates,
                            'default' => 'df',
                            'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'default' => 'Default',
                                'icon' => 'Icon',
                            ],
                            'default' => 'default',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Select Icon', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => ['icon'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button .pxl-icon-line' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-anchor-button' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bd_icon_color',
                            'label' => esc_html__('Border Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_icon_color',
                            'label' => esc_html__('Background Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Icon Font Size', 'vintech' ),
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
                                '{{WRAPPER}} .pxl-anchor-button' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_type' => ['icon'],
                            ],
                        ),
                        array(
                            'name' => 'pxl_close_animate_delay',
                            'label' => esc_html__('Close Popup - Animation Delay', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                                'style-3' => 'Style 3',
                                'style-4' => 'Style 4',
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'box_width',
                            'label' => esc_html__('Box Width', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button' => 'width: {{SIZE}}{{UNIT}}; align-items: center; justify-content: center; display: inline-flex;',
                            ],
                        ),
                        array(
                            'name' => 'box_height',
                            'label' => esc_html__('Box Height', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Border Radius', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__( 'Box Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-anchor-button' => 'background-color: {{VALUE}};',
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