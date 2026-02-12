<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_info_box',
        'title' => esc_html__('Case Info Box', 'vintech' ),
        'icon' => 'eicon-info-box',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'number',
                            'label' => esc_html__('Number', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_box',
                    'label' => esc_html__('Box', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'pd_box',
                                'label' => esc_html__('Padding Box', 'vintech' ),
                                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                                'control_type' => 'responsive',
                                'size_units' => [ 'px' ],
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-info-box1 ' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                                ],
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_title',
                    'label' => esc_html__('Title', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'title_color',
                                'label' => esc_html__('Title', 'vintech' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-info-box1 .pxl-title' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'title_typography',
                                'label' => esc_html__('Typography', 'vintech' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-info-box1 .pxl-title',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_desc',
                    'label' => esc_html__('Title', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array_merge(
                        array(
                            array(
                                'name' => 'desc_color',
                                'label' => esc_html__('Title', 'vintech' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .pxl-info-box1 .pxl-desc' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'desc_typography',
                                'label' => esc_html__('Typography', 'vintech' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .pxl-info-box1 .pxl-title',
                            ),
                        )
                    ),
                ),
                vintech_widget_animation_settings(),
            ),
),
),
vintech_get_class_widget_path()
);