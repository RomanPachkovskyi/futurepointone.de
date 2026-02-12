<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_location',
        'title' => esc_html__('Case Location', 'vintech'),
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_location/layout1.jpg'
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
                            'name' => 'img',
                            'label' => esc_html__('Image', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'lists',
                            'label' => esc_html__('List', 'vintech'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'id_l',
                                    'label' => esc_html__('Id', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'space_t_tl',
                                    'label' => esc_html__('Space Top', 'vintech' ),
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
                                    '{{WRAPPER}} .pxl-location {{CURRENT_ITEM}}' => 'top: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                                array(
                                    'name' => 'space_L_tl',
                                    'label' => esc_html__('Space Left', 'vintech' ),
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
                                    '{{WRAPPER}} .pxl-location {{CURRENT_ITEM}}' => 'left: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                                array(
                                    'name' => 'space_r_tl',
                                    'label' => esc_html__('Space Right', 'vintech' ),
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
                                    '{{WRAPPER}} .pxl-location {{CURRENT_ITEM}}' => 'right: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                                array(
                                    'name' => 'space_b_tl',
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
                                    '{{WRAPPER}} .pxl-location {{CURRENT_ITEM}}' => 'bottom: {{SIZE}}{{UNIT}};',
                                ],
                            ),
                            ),
'title_field' => '{{{ content }}}',
),
),
),
array(
    'name' => 'section_style',
    'label' => esc_html__('Style', 'vintech'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'dot_color',
            'label' => esc_html__('Dot Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-location .pxl-list .pxl--item:after' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__('Title Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-location .pxl-list .pxl--item span' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_color_bg',
            'label' => esc_html__('Background Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-location .pxl-list .pxl--item span' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-location .pxl-list .pxl--item',
        ),
    ),
),
vintech_widget_animation_settings(),
),
),
),
vintech_get_class_widget_path()
);