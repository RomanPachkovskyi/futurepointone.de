<?php
//Register Counter Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_counter',
        'title' => esc_html__('Case Counter', 'vintech'),
        'icon' => 'eicon-counter-circle',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'elementor-waypoints',
            'jquery-numerator',
            'pxl-counter',
            'pxl-counter-slide',
            'vintech-counter',
        ),
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
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_counter/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'vintech' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_counter/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'vintech' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_counter/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'vintech' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_counter/layout4.jpg'
                                ],
                                '5' => [
                                    'label' => esc_html__('Layout 5', 'vintech' ),
                                    'image' => get_template_directory_uri() . '/elements/widgets/img-layout/pxl_counter/layout5.jpg'
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
                            'name' => 'title',
                            'label' => esc_html__('Title', 'vintech'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'vintech'),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'condition' => [
                                'layout' => ['5'],
                            ],
                        ),
                        array(
                            'name' => 'starting_number',
                            'label' => esc_html__('Starting Number', 'vintech'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                        ),
                        array(
                            'name' => 'ending_number',
                            'label' => esc_html__('Ending Number', 'vintech'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 100,
                        ),
                        array(
                            'name' => 'prefix',
                            'label' => esc_html__('Number Prefix', 'vintech'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'suffix',
                            'label' => esc_html__('Number Suffix', 'vintech'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '',
                        ),
                        array(
                            'name' => 'thousand_separator_char',
                            'label' => esc_html__('Number Separator', 'vintech'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'Default',
                                '.' => 'Dot',
                                ',' => 'Comma',
                                ' ' => 'Space',
                            ],
                            'default' => '',
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
                            ],
                            'default' => 'icon',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => ['icon'],
                            ],
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Icon Image', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'description' => esc_html__('Select image icon.', 'vintech'),
                            'condition' => [
                                'icon_type' => ['image'],
                            ],
                        ),
                    ),
                ),
array(
    'name' => 'section_style_general',
    'label' => esc_html__('General', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'effect',
            'label' => esc_html__('Effect', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'effect-default' => 'Default',
                'effect-slide' => 'Slide',
            ],
            'default' => 'effect-default',
        ),
        array(
          'name' => 'align',
          'label' => esc_html__( 'Alignment', 'vintech' ),
          'type' => \Elementor\Controls_Manager::CHOOSE,
          'control_type' => 'responsive',
          'options' => [
            'left' => [
                'title' => esc_html__( 'Left', 'vintech' ),
                'icon' => 'eicon-text-align-left',
            ],
            'center' => [
                'title' => esc_html__( 'Center', 'vintech' ),
                'icon' => 'eicon-text-align-center',
            ],
            'right' => [
                'title' => esc_html__( 'Right', 'vintech' ),
                'icon' => 'eicon-text-align-right',
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .pxl-counter .pxl-counter--inner .pxl-counter--holder' => 'justify-content: {{VALUE}};',
            '{{WRAPPER}} .pxl-counter .pxl-counter--inner .pxl-counter--title,{{WRAPPER}} .pxl-counter .pxl-counter--number' => 'text-align: {{VALUE}};',
        ],
    ),
        array(
            'name' => 'box_color',
            'label' => esc_html__('Box Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'condition' => [
                'layout' => ['3'],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter3' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'box_border_color',
            'label' => esc_html__('Border Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'condition' => [
                'layout' => ['3'],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter3' => 'border-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'style',
            'label' => esc_html__('Style', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'style1' => 'Style 1',
                'style2' => 'Style 2',
                'style3' => 'Style Gradient',
            ],
            'default' => 'style1',
        ), 
    ),
),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'title_color',
            'label' => esc_html__('Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-counter--title' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl-counter--title',
        ),
        array(
            'name' => 'title_w',
            'label' => esc_html__('Width', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'title-full-w' => 'Full',
                'title-inline-w' => 'Inline',
            ],
            'default' => 'title-inline-w',
        ),
    ),
),
array(
    'name' => 'section_style_icon',
    'label' => esc_html__('Icon', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'box_size',
            'label' => esc_html__('Box Icon Size', 'vintech' ),
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
                '{{WRAPPER}} .pxl-counter .pxl-counter--icon' => 'width: {{SIZE}}{{UNIT}};min-width: {{SIZE}}{{UNIT}};Height: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),
        array(
            'name' => 'icon_color',
            'label' => esc_html__('Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-counter--icon i' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                '{{WRAPPER}} .pxl-counter .pxl-counter--icon svg path' => 'fill: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'bg_icon_color',
            'label' => esc_html__('Background Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-counter--icon' => 'background-color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'icon_font_size',
            'label' => esc_html__('Icon Font Size', 'vintech' ),
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
                '{{WRAPPER}} .pxl-counter .pxl-counter--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                '{{WRAPPER}} .pxl-counter .pxl-counter--icon svg' => 'width: {{SIZE}}{{UNIT}};',
            ],
            'condition' => [
                'icon_type' => 'icon',
            ],
        ),
        array(
            'name' => 'icon_space_top',
            'label' => esc_html__('Top Spacer', 'vintech' ),
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
                '{{WRAPPER}} .pxl-counter .pxl-counter--icon' => 'padding-top: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'icon_space_bottom',
            'label' => esc_html__('Bottom Spacer', 'vintech' ),
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
                '{{WRAPPER}} .pxl-counter .pxl-counter--icon' => 'margin-bottom: {{SIZE}}{{UNIT}};',
            ],
            'separator' => 'after',
        ),
    ),
),
array(
    'name' => 'section_number',
    'label' => esc_html__('Number', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
       array(
          'name' => 'align',
          'label' => esc_html__( 'Alignment', 'vintech' ),
          'type' => \Elementor\Controls_Manager::CHOOSE,
          'control_type' => 'responsive',
          'options' => [
            'left' => [
                'title' => esc_html__( 'Left', 'vintech' ),
                'icon' => 'eicon-text-align-left',
            ],
            'center' => [
                'title' => esc_html__( 'Center', 'vintech' ),
                'icon' => 'eicon-text-align-center',
            ],
            'right' => [
                'title' => esc_html__( 'Right', 'vintech' ),
                'icon' => 'eicon-text-align-right',
            ],
        ],
        'selectors' => [
            '{{WRAPPER}} .pxl-counter .pxl-counter--inner .pxl-counter--holder' => 'justify-content: {{VALUE}};',
        ],
    ),
       array(
        'name'         => 'btn_gradient',
        'label' => esc_html__( 'Background Type', 'vintech' ),
        'type'         => \Elementor\Group_Control_Background::get_type(),
        'control_type' => 'group',
        'types' => [ 'gradient' ],
        'condition' => [
            'style' => ['style3'],
        ],
        'selector'     => '{{WRAPPER}} .pxl-counter .pxl-counter--number span',
    ),
       array(
        'name' => 'number_color',
        'label' => esc_html__('Color', 'vintech' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pxl-counter .pxl-counter--number' => 'color: {{VALUE}};',
        ],
    ),
       array(
        'name' => 'number_typography',
        'type' => \Elementor\Group_Control_Typography::get_type(),
        'control_type' => 'group',
        'selector' => '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--value',
    ),
       array(
        'name' => 'prefix_suffix_color',
        'label' => esc_html__('Prefix/Suffix Color', 'vintech' ),
        'type' => \Elementor\Controls_Manager::COLOR,
        'selectors' => [
            '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--suffix, {{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--prefix' => 'color: {{VALUE}};',
        ],
        'condition' => [
            'number_color_type' => ['color'],
        ],
    ),
       array(
        'name' => 'duration',
        'label' => esc_html__('Animation Duration', 'vintech'),
        'type' => \Elementor\Controls_Manager::NUMBER,
        'default' => 2000,
        'min' => 100,
        'step' => 100,
    ),
       array(
        'name' => 'number_space_top',
        'label' => esc_html__('Top Spacer', 'vintech' ),
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
            '{{WRAPPER}} .pxl-counter .pxl-counter--number' => 'margin-top: {{SIZE}}{{UNIT}};',
        ],
    ),
       array(
        'name' => 'number_space_l',
        'label' => esc_html__('Left Spacer', 'vintech' ),
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
            '{{WRAPPER}} .pxl-counter .pxl-counter--number' => 'margin-left: {{SIZE}}{{UNIT}};',
        ],
    ),
       array(
        'name' => 'number_space_r',
        'label' => esc_html__('Right Spacer', 'vintech' ),
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
            '{{WRAPPER}} .pxl-counter .pxl-counter--number' => 'margin-right: {{SIZE}}{{UNIT}};',
        ],
    ),
       array(
        'name' => 'number_space_bottom',
        'label' => esc_html__('Bottom Spacer', 'vintech' ),
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
            '{{WRAPPER}} .pxl-counter .pxl-counter--number' => 'margin-bottom: {{SIZE}}{{UNIT}};',
        ],
    ),
   ),
),
array(
    'name' => 'section_number_suf',
    'label' => esc_html__('Suffix', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'suf_color',
            'label' => esc_html__('Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--suffix' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'suf_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--suffix',
        ),
        array(
            'name' => 'number_space_tb',
            'label' => esc_html__('Transform Y', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => -300,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--suffix' => 'transform: translatey({{SIZE}}{{UNIT}});',
            ],
        ),
        array(
            'name' => 'number_space_lr',
            'label' => esc_html__('Padding Left/Right', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => -300,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--suffix' => 'margin-left:{{SIZE}}{{UNIT}};',
            ],
        ),
    ),
),
array(
    'name' => 'section_number_prefix',
    'label' => esc_html__('Prefix', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'pre_color',
            'label' => esc_html__('Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--prefix' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'pre_typography',
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--prefix',
        ),
        array(
            'name' => 'number_space_tb',
            'label' => esc_html__('Transform Y', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => -300,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--prefix' => 'transform: translatey({{SIZE}}{{UNIT}});',
            ],
        ),
        array(
            'name' => 'number_space_lr',
            'label' => esc_html__('Padding Left/Right', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => -300,
                    'max' => 300,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-counter .pxl-counter--number .pxl-counter--prefix' => 'margin-left:{{SIZE}}{{UNIT}};',
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