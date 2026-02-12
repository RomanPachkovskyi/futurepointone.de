<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_history',
        'title' => esc_html__('Case History', 'vintech'),
        'icon' => 'eicon-editor-link',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'vintech'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'history',
                            'label' => esc_html__('History', 'vintech'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'date',
                                    'label' => esc_html__('Year', 'vintech'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'img_size',
                                    'label' => esc_html__('Image Size', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                                ),
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Title', 'vintech'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'decs',
                                    'label' => esc_html__('Description', 'vintech'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA, 
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ date }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_link',
                    'label' => esc_html__('Style', 'vintech'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Description Color ', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-history .desc' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Description Typography', 'vintech' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-history .desc',
                        ),
                    ),
                ),
                vintech_widget_animation_settings(),
            ),
        ),
    ),
vintech_get_class_widget_path()
);