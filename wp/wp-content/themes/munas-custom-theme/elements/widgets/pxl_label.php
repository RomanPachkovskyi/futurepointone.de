<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_label',
        'title' => esc_html__('Case Label', 'vintech' ),
        'icon' => 'eicon-code-highlight',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__('Icon Image', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                    ),
                ),

                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-e-label label' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Typography', 'vintech' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-e-label label',
                        ),
                    ),
                ),
                vintech_widget_animation_settings(),
            ),
        ),
    ),
    vintech_get_class_widget_path()
);