<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_breadcrumb',
        'title' => esc_html__('Case Breadcrumb', 'vintech' ),
        'icon' => 'eicon-yoast',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
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
                            'style1' => 'Default',
                            'style2' => 'Style 2',
                        ],
                        'default' => 'style1',
                    ),
                      array(
                        'name' => 'text_color',
                        'label' => esc_html__('Text Color', 'vintech' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-breadcrumb' => 'color: {{VALUE}};',
                        ],
                    ),
                      array(
                        'name' => 'ic_color',
                        'label' => esc_html__('Icon Color', 'vintech' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-breadcrumb i' => 'color: {{VALUE}};',
                        ],
                    ),
                      array(
                        'name' => 'active_color',
                        'label' => esc_html__('Active Color', 'vintech' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-breadcrumb span.breadcrumb-entry' => 'color: {{VALUE}};',
                        ],
                    ),
                      array(
                        'name' => 'hover_color',
                        'label' => esc_html__('Hover Color', 'vintech' ),
                        'type' => \Elementor\Controls_Manager::COLOR,
                        'selectors' => [
                            '{{WRAPPER}} .pxl-breadcrumb a:hover' => 'color: {{VALUE}};',
                        ],
                    ),
                      array(
                        'name' => 'text_typography',
                        'label' => esc_html__('Text Typography', 'vintech' ),
                        'type' => \Elementor\Group_Control_Typography::get_type(),
                        'control_type' => 'group',
                        'selector' => '{{WRAPPER}} .pxl-breadcrumb',
                    ),
                  ),
                ),
                vintech_widget_animation_settings(),
            ),
        ),
    ),
    vintech_get_class_widget_path()
);