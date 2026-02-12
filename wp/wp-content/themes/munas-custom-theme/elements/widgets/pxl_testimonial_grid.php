<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_testimonial_grid',
        'title' => esc_html__('Case Testimonial Grid', 'vintech'),
        'icon' => 'eicon-blockquote',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_grid/layout1.jpg'
                                ],
                                // '2' => [
                                //     'label' => esc_html__('Layout 2', 'vintech' ),
                                //     'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_testimonial_grid/layout2.jpg'
                                // ],
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
                            'name' => 'style',
                            'label' => esc_html__('Style', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'default',
                            'options' => [
                                'default' => esc_html__('Default', 'vintech' ),
                                'style-2' => esc_html__('Style 2', 'vintech' ),
                            ],
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'testimonial',
                            'label' => esc_html__('Testimonial', 'vintech'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'image',
                                    'label' => esc_html__('Image', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'vintech'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'position',
                                    'label' => esc_html__('Position', 'vintech'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'description',
                                    'label' => esc_html__('Description', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'rows' => 10,
                                ),
                                array(
                                    'name' => 'star',
                                    'label' => esc_html__('Star', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '5',
                                    'options' => [
                                        '1' => esc_html__('1', 'vintech' ),
                                        '2' => esc_html__('2', 'vintech' ),
                                        '3' => esc_html__('3', 'vintech' ),
                                        '4' => esc_html__('4', 'vintech' ),
                                        '5' => esc_html__('5', 'vintech' ),
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_settings',
                    'label' => esc_html__('Grid', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'layout_mode',
                            'label' => esc_html__('Layout Mode', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'masonry',
                            'options' => [
                                'masonry' => esc_html__('Masonry', 'vintech' ),
                                'fitRows' => esc_html__('Fit Rows', 'vintech' ),
                            ],
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Case  Animate', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => vintech_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '4',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '4',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-grid .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'vintech' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-grid .pxl-item--title',
                        ),
                        array(
                            'name' => 'pos_color',
                            'label' => esc_html__('Position Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-grid .pxl-item--position' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'pos_typography',
                            'label' => esc_html__('Position Typography', 'vintech' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-grid .pxl-item--position',
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Description Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-testimonial-grid .pxl-item--description' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Description Typography', 'vintech' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-testimonial-grid .pxl-item--description',
                        ),
                    ),
                ),
            ),
        ),
    ),
    vintech_get_class_widget_path()
);