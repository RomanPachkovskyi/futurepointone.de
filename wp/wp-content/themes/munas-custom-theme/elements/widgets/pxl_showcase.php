<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_showcase',
        'title' => esc_html__('Case Showcase', 'vintech'),
        'icon' => 'eicon-parallax',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'vintech'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Icon Type', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => 'Layout 1',
                            ],
                            'default' => '1',
                        ),
                        array(
                            'name' => 'box_padding',
                            'label' => esc_html__('Box Input', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .pxl-item--inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};width:auto !important;height:auto !important;',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Image', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'vintech'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'vintech' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .pxl-item--title a',
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Button Typography', 'vintech' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .pxl-item--readmore a',

                        ),
                        array(
                            'name' => 'btn_padding',
                            'label' => esc_html__('Padding Input', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .pxl-item--readmore a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};width:auto !important;height:auto !important;',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'vintech'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'vintech'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'btn_text2',
                            'label' => esc_html__('Button Text 2', 'vintech'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'btn_link2',
                            'label' => esc_html__('Button Link 2', 'vintech'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'hot',
                            'label' => esc_html__('Show Hot', 'vintech'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'new',
                            'label' => esc_html__('Show New', 'vintech'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'active',
                            'label' => esc_html__('Active', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'No',
                                'yes' => 'Yes',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'active_label',
                            'label' => esc_html__('Active Label', 'vintech'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'active' => 'yes',
                            ],
                        ),
                        array(
                            'name' => 'label_typography',
                            'label' => esc_html__('Label Typography', 'vintech' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .pxl-item--label',
                        ),
                    ),
),
array(
    'name' => 'section_style',
    'label' => esc_html__('Style', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array_merge(
        array(
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
                    '{{WRAPPER}} .pxl-showcase1 .pxl-item--inner' => 'border-style: {{VALUE}} !important;',
                ],
            ),
            array(
                'name' => 'border_width',
                'label' => esc_html__( 'Border Width', 'vintech' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'selectors' => [
                    '{{WRAPPER}} .pxl-showcase1 .pxl-item--inner' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
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
                    '{{WRAPPER}} .pxl-showcase1 .pxl-item--inner' => 'border-color: {{VALUE}} !important;',
                ],
                'condition' => [
                    'border_type!' => '',
                ],
            ),
        ),
    ),
),
),
),
),
vintech_get_class_widget_path()
);