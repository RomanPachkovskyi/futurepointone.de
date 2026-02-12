<?php
// Register Video Player Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_video_player',
        'title' => esc_html__('Case Video Button', 'vintech' ),
        'icon' => 'eicon-play',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'tilt'
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'video_link',
                            'label' => esc_html__('Link', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => 'https://www.youtube.com/watch?v=SF4aHwxHtZ0'
                        ),
                        array(
                            'name' => 'video_icon',
                            'label' => esc_html__('Video Icon', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'label',
                            'label' => esc_html__('Label', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Label', 'vintech'),
                        ), 
                        array(
                            'name' => 'image_type',
                            'label' => esc_html__('Image Type', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'none' => 'None',
                                'img' => 'Image',
                                'bg' => 'Background',
                            ],
                            'default' => 'none',
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Image', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'image_type' => ['img', 'bg'],
                            ],
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'img_border_radius',
                            'label' => esc_html__('Image Border Radius', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--imagebg, {{WRAPPER}} .pxl-video-player .pxl-video--holder img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'image_type' => ['img', 'bg'],
                            ],
                        ),
                        array(
                            'name' => 'image_height',
                            'label' => esc_html__('Image Height', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'vintech' ),
                            'condition' => [
                                'image_type' => 'bg',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--imagebg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_style',
                            'label' => esc_html__('Background Effect', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'parallax' => 'Parallax',
                                'default' => 'No Parallax',
                            ],
                            'default' => 'parallax',
                            'condition' => [
                                'image_type' => ['bg'],
                            ],
                        ),
                        array(
                            'name' => 'btn_video_style',
                            'label' => esc_html__('Button Video Style', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style White',
                                'style-blur' => 'Style Blur',
                                'style-outline-2' => 'Style Outline',
                                'style-icon' => 'Style Icon',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'btn_video_position',
                            'label' => esc_html__('Button Video Position', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'p-center' => 'Center',
                                'p-top-left' => 'Top Left',
                                'p-top-right' => 'Top Right',
                                'p-bottom-left' => 'Bottom Left',
                                'p-bottom-right' => 'Bottom Right',
                            ],
                            'default' => 'p-center',
                            'condition' => [
                                'image_type' => ['img','bg'],
                            ],
                        ),
                        array(
                            'name' => 'top_positioon',
                            'label' => esc_html__('Top Position', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'size' => 0,
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-left, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-right' => 'top: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_video_position' => ['p-top-left', 'p-top-right'],
                            ],
                        ),
                        array(
                            'name' => 'right_positioon',
                            'label' => esc_html__('Right Position', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'size' => 0,
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-right, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-right' => 'right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_video_position' => ['p-top-right', 'p-bottom-right'],
                            ],
                        ),
                        array(
                            'name' => 'bottom_positioon',
                            'label' => esc_html__('Bottom Position', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'size' => 0,
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-left, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-right' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_video_position' => ['p-bottom-left', 'p-bottom-right'],
                            ],
                        ),
                        array(
                            'name' => 'left_positioon',
                            'label' => esc_html__('Left Position', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px', '%' ],
                            'control_type' => 'responsive',
                            'default' => [
                                'size' => 0,
                                'unit' => '%',
                            ],
                            'range' => [
                                '%' => [
                                    'min' => 0,
                                    'max' => 100,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-top-left, {{WRAPPER}} .pxl-video--holder + .btn-video-wrap.p-bottom-left' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_video_position' => ['p-top-left', 'p-bottom-left'],
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
                            'name' => 'button_size',
                            'label' => esc_html__('Button Size', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'vintech' ),
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-btn-video' => 'height: {{SIZE}}{{UNIT}};width: {{SIZE}}{{UNIT}};',
                            ],
                        ),

                        
                        array(
                            'name' => 'ic_border_radius',
                            'label' => esc_html__('Icon Border Radius', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-btn-video' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),

                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-btn-video i' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-video-player .pxl-btn-video svg' => 'fill: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_hv',
                            'label' => esc_html__('Hover Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-btn-video:hover i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bgcolor',
                            'label' => esc_html__('Background Icon Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-btn-video' => 'background-color: {{VALUE}};',
                                '{{WRAPPER}} .pxl-video-player .pxl-btn-video:hover' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bgcolor_hv',
                            'label' => esc_html__('Background Icon Hover Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-btn-video:hover' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_size',
                            'label' => esc_html__('Icon Font Size', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'vintech' ),
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 't_width',
                            'label' => esc_html__('Max Width', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .pxl-video--inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_lb',
                    'label' => esc_html__('Label', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'lb_typography',
                            'label' => esc_html__('Typography', 'vintech' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-video-player .label-text',
                        ),
                        array(
                            'name' => 'lb_color',
                            'label' => esc_html__('Color', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-video-player .label-text' => 'color: {{VALUE}};',
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