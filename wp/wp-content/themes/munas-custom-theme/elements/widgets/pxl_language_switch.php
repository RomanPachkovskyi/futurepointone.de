<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_language_switch',
        'title' => esc_html__('Case Language Switch', 'vintech'),
        'icon' => 'eicon-kit-parts',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'vintech'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'language',
                            'label' => esc_html__('Language', 'vintech'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'name',
                                    'label' => esc_html__('Name', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'rows' => 10,
                                    'show_label' => false,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'vintech'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ name }}}',
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
                        array(
                            'name' => 'position_top',
                            'label' => esc_html__('Top', 'vintech' ),
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
                                '{{WRAPPER}} .pxl-language-switch:hover .list-language' => 'top: calc(103% + {{SIZE}}{{UNIT}});',
                            ],
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color Text', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .language-first' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Box Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switch .language-first' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'tt_typography',
                            'label' => esc_html__('Typography', 'vintech' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .language-first',
                        ),
                        array(
                            'name' => 'btn_border_radius',
                            'label' => esc_html__('Border Radius', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switch .language-first' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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