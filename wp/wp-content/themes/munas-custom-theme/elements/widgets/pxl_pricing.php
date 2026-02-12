<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_pricing',
        'title' => esc_html__('Case Pricing', 'vintech'),
        'icon' => 'eicon-settings',
        'categories' => array('pxltheme-core'),
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_pricing/layout1.jpg'
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
                            'name' => 'popular',
                            'label' => esc_html__('Popular', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'non-popular' => 'No',
                                'is-popular' => 'Yes',
                            ],
                            'default' => 'non-popular',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description ', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'title_box',
                            'label' => esc_html__('Box Title ', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'price',
                            'label' => esc_html__('Price', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'time',
                            'label' => esc_html__('Time', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'feature_title',
                            'label' => esc_html__('Feature Title ', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'feature',
                            'label' => esc_html__('List Feature', 'vintech'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'feature_text',
                                    'label' => esc_html__('Text', 'vintech'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'active',
                                    'label' => esc_html__('Active', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'non-active' => 'No',
                                        'is-active' => 'Yes',
                                    ],
                                    'default' => 'is-active',
                                ),
                            ),
                            'title_field' => '{{{ feature_text }}}',
                            
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'button_link',
                            'label' => esc_html__('Button Link', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
),
array(
    'name' => 'section_style_general',
    'label' => esc_html__('Box', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'padding',
            'label' => esc_html__('Content Padding', 'vintech' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'control_type' => 'responsive',
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .content-inner' => 'Padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'box_color',
            'label' => esc_html__('Box Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing' => 'background-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name'         => 'btn_box_shadow',
            'label' => esc_html__( 'Box Shadow', 'vintech' ),
            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
            'control_type' => 'group',
            'selector'     => '{{WRAPPER}} .pxl-pricing',
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
                '{{WRAPPER}} .pxl-pricing .content-inner' => 'border-style: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'border_width',
            'label' => esc_html__( 'Border Width', 'vintech' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .content-inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                '{{WRAPPER}} .pxl-pricing .content-inner' => 'border-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'border_type!' => '',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_tlb',
    'label' => esc_html__('Title Box', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'tlb_typography',
            'label' => esc_html__('Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--title-box',
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--title-box' => 'color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-pricing .pxl-item--title-box svg path' => 'fill: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'bordertl_color',
            'label' => esc_html__('Border Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--title-box' => 'border-color: {{VALUE}} !important;',
            ],
        ),

    ),
),
array(
    'name' => 'section_style_pr',
    'label' => esc_html__('Pricing', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'pr_typography',
            'label' => esc_html__('Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--price',
        ),
        array(
            'name' => 'price_color',
            'label' => esc_html__('Price Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--price' => 'color: {{VALUE}} !important;',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_tm',
    'label' => esc_html__('Time', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'time_typography',
            'label' => esc_html__('Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--price .time',
        ),
        array(
            'name' => 'time_color',
            'label' => esc_html__('Price Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--price .time' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'bgprice_color',
            'label' => esc_html__('Background Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--price .time' => 'background-color: {{VALUE}} !important;',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_des',
    'label' => esc_html__('Description', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(

        array(
            'name' => 'ds_typography',
            'label' => esc_html__('Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item-description',
        ),
        array(
            'name' => 'des_color',
            'label' => esc_html__('Description Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item-description' => 'color: {{VALUE}} !important;',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_feature',
    'label' => esc_html__('Feature', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'ft_typography',
            'label' => esc_html__('Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-pricing .pxl-item--feature .content',
        ),
        array(
            'name' => 'feature_color',
            'label' => esc_html__('Feature Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .content' => 'color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .content svg path' => 'fill: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .content i' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'ic_color_noactive',
            'label' => esc_html__('Feature Color (No Active)', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .non-active svg path' => 'fill: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .non-active .content' => 'color: {{VALUE}} !important;',
                '{{WRAPPER}} .pxl-pricing .pxl-item--feature .non-active i' => 'color: {{VALUE}} !important;',
            ],
        ),
    ),
),
array(
    'name' => 'section_style_button',
    'label' => esc_html__('Button', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(


        array(
            'name' => 'button_color',
            'label' => esc_html__(' Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .btn-see' => 'color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'button_color_hv',
            'label' => esc_html__(' Color Hover', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .btn-see:hover' => 'color: {{VALUE}} !important;',
            ],
        ),


        array(
            'name' => 'buttonbg_color',
            'label' => esc_html__('Background Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .btn-see' => 'background-color: {{VALUE}} !important;',
            ],
        ),
        array(
            'name' => 'buttonbg_color_hv',
            'label' => esc_html__('Background Color Hover', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-pricing .btn-see:hover' => 'background-color: {{VALUE}} !important;',
            ],
        ),
    ),
),vintech_widget_animation_settings(),
),
),
),vintech_get_class_widget_path()
);