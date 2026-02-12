<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_mailchimp',
        'title' => esc_html__('Case Mailchimp', 'vintech'),
        'icon' => 'eicon-email-field',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('General', 'vintech'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style-outline' => 'Outline',
                                'style-2' => 'Style 2',
                            ],
                            'default' => 'style-default',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_email',
                    'label' => esc_html__('Email', 'vintech'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'mail_typography',
                            'label' => esc_html__('Typography', 'vintech' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-mailchimp [type="email"]',
                        ),
                        array(
                            'name' => 'email_color',
                            'label' => esc_html__('Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'email_color_bg',
                            'label' => esc_html__('Background Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'email_height',
                            'label' => esc_html__('Height', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 1000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'         => 'email_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'vintech' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-mailchimp [type="email"]'
                        ),
                        array(
                            'name' => 'email_padding',
                            'label' => esc_html__('Padding', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'email_border_radius',
                            'label' => esc_html__('Border Radius', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                            ],
                        ),
                    ),
),
array(
    'name' => 'section_style_button',
    'label' => esc_html__('Button', 'vintech'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'btn_typography',
            'label' => esc_html__('Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-mailchimp button',
        ),
        array(
            'name' => 'btn_color',
            'label' => esc_html__('Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-mailchimp button i' => 'color: {{VALUE}};',
                '{{WRAPPER}} .pxl-mailchimp button svg path' => 'fill: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'btn_color_bg',
            'label' => esc_html__('Background Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-mailchimp button' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'btn_color_bgh',
            'label' => esc_html__('Background Color/Hover', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-mailchimp button:hover' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'email_border_radius',
            'label' => esc_html__('Border Radius', 'vintech' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-mailchimp button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
    ),
),
vintech_widget_animation_settings(),
),
),
),
vintech_get_class_widget_path()
);