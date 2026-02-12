<?php
$pt_supports = ['service','post','portfolio'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_carousel',
        'title' => esc_html__('Case Post Carousel', 'vintech' ),
        'icon' => 'eicon-posts-carousel',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
            'pxl-effect-carousel',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'vintech' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'vintech' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => vintech_get_post_type_options($pt_supports),
                                'default'  => 'post'
                            ) 
                        ),
                        vintech_get_post_carousel_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'section_source',
                    'label' => esc_html__('Source', 'vintech' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'select_post_by',
                                'label'    => esc_html__( 'Select posts by', 'vintech' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => [
                                    'term_selected' => esc_html__( 'Terms selected', 'vintech' ),
                                    'post_selected' => esc_html__( 'Posts selected ', 'vintech' ),
                                ],
                                'default'  => 'term_selected'
                            ) 
                        ),
                        vintech_get_grid_term_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        vintech_get_grid_ids_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'post_selected']]),
                        array(
                            array(
                                'name' => 'orderby',
                                'label' => esc_html__('Order By', 'vintech' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date' => esc_html__('Date', 'vintech' ),
                                    'ID' => esc_html__('ID', 'vintech' ),
                                    'author' => esc_html__('Author', 'vintech' ),
                                    'title' => esc_html__('Title', 'vintech' ),
                                    'rand' => esc_html__('Random', 'vintech' ),
                                ],
                            ),
                            array(
                                'name' => 'order',
                                'label' => esc_html__('Sort Order', 'vintech' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__('Descending', 'vintech' ),
                                    'asc' => esc_html__('Ascending', 'vintech' ),
                                ],
                            ),
                            array(
                                'name' => 'limit',
                                'label' => esc_html__('Total items', 'vintech' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_carousel',
                    'label' => esc_html__('Carousel', 'vintech'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Vintech Animate', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => vintech_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'post_number',
                            'label' => esc_html__('Post Number', 'vintech'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 3,
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-2']]
                                        ]
                                    ],
                                ],
                            ],
                        ),
                        array(
                            'name' => 'slide_direction',
                            'label' => esc_html__('Slide Direction', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'vertical' => esc_html__('Vertical', 'vintech' ),
                                'horizontal' => esc_html__('Horizontal', 'vintech' ),
                            ],
                            'default' => 'horizontal',
                            'conditions' => [
                                'pagination_type' => 'bullets',
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-3']]
                                        ]
                                    ]
                                ],
                            ],
                        ),
                        array(
                            'name' => 'item_padding_r',
                            'label' => esc_html__('Item Padding', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'top' => '15',
                                'right' => '15',
                                'bottom' => '15',
                                'left' => '15'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-container' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-swiper-container .pxl-swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'effect',
                            'label' => esc_html__('Effect', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'slide' => esc_html__('Slide', 'vintech' ),
                                'carousel' => esc_html__('Carousel', 'vintech' ),
                            ],
                            'default' => 'slide',
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns: Screen <= 575', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns: Screen <= 767', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns: Screen <= 991', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns: Screen <= 1199', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns: Screen => 1200', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),
                        array(
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns: Screen => 1600', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'auto' => 'auto',
                            ],
                        ),

                        array(
                            'name' => 'slides_to_scroll',
                            'label' => esc_html__('Slides Scroll', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'vintech'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'vintech'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'fraction' => 'Fraction',
                                'progressbar' => 'Progressbar',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'style-pa',
                            'label' => esc_html__('Alignment Bullets', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'center',
                            'options' => [
                                'left' => 'Left',
                                'center' => 'Center',
                                'right' => 'Right',
                            ],
                            'conditions' => [
                                'pagination_type' => 'bullets',
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'industries'],
                                            ['name' => 'layout_industries', 'operator' => 'in', 'value' => ['industries-1']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']]
                                        ]
                                    ],
                                ],
                            ],

                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'vintech'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'vintech'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Delay', 'vintech'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'false'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'vintech'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'vintech'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                        array(
                            'name' => 'center',
                            'label' => esc_html__('Center', 'vintech'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'drap',
                            'label' => esc_html__('Show Scroll Drap', 'vintech'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'offset_left',
                            'label' => esc_html__('Offset Left', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-portfolio-carousel .pxl-swiper-slide .pxl-post--inner .pxl-post--holder,{{WRAPPER}} .pxl-portfolio-carousel .pxl-swiper-slide .pxl-post--inner .pxl-front' => 'left: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'offset_bottom',
                            'label' => esc_html__('Offset Buttom', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-portfolio-carousel .pxl-swiper-slide .pxl-post--inner .pxl-post--holder,{{WRAPPER}} .pxl-portfolio-carousel .pxl-swiper-slide .pxl-post--inner .pxl-front' => 'bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
),
array(
    'name' => 'section_display',
    'label' => esc_html__('Display', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array(
        array(
            'name' => 'img_height',
            'label' => esc_html__('Image Height', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-portfolio-carousel .carousel-nav-appended .pxl-post--featured img' => 'height: {{SIZE}}{{UNIT}};',
            ],
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1','portfolio-2']]
                        ]
                    ]
                ],
            ],
        ),
        array(
            'name'    => 'filter',
            'label'   => esc_html__('Term Filter', 'vintech' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => 'false',
            'options' => [
                'true'  => esc_html__('Enable', 'vintech' ),
                'false' => esc_html__('Disable', 'vintech' ),
            ],
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'industries'],
                            ['name' => 'layout_industries', 'operator' => 'in', 'value' => ['industries-1']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1','portfolio-2','portfolio-3']]
                        ]
                    ]
                ],
            ],
        ),
        array(
            'name' => 'filter_type',
            'label' => esc_html__('Filter Type', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'df',
            'options' => [
                'df' => esc_html__('Default', 'vintech' ),
                'style-2' => esc_html__('Style 2', 'vintech' ),
            ],
            'condition' => [
                'filter' => 'true',
            ]
        ),
        array(
            'name'      => 'filter_default_title',
            'label'     => esc_html__('Filter Default Title', 'vintech' ),
            'type'      => \Elementor\Controls_Manager::TEXT,
            'default'   => esc_html__('All', 'vintech' ),
            'condition' => [
                'filter'         => 'true',
            ],
        ),
        array(
          'name' => 'align_ft',
          'label' => esc_html__( 'Alignment Filter', 'vintech' ),
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
            '{{WRAPPER}} .pxl-grid-filter' => 'text-align: {{VALUE}} !important;',
        ],
        'condition' => [
            'filter'         => 'true',
        ],
    ),
        array(
            'name' => 'width_feature',
            'label' => esc_html__('Width Feature', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SLIDER,
            'control_type' => 'responsive',
            'size_units' => [ 'px','%' ],
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 3000,
                ],
                '%' => [
                    'min' => 0,
                    'max' => 100,
                ],
            ],
            'selectors' => [
                '{{WRAPPER}} .pxl-portfolio-carousel .pxl-post--featured img' => 'width: {{SIZE}}{{UNIT}};',
            ],
        ),
        array(
            'name' => 'btn_typography',
            'label' => esc_html__('Typography Filter', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .filter-item',
            'condition' => [
                'filter'         => 'true',
            ],
        ),
        array(
            'name' => 'color_filter',
            'label' => esc_html__('Filter Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .filter-item,{{WRAPPER}} .filter-item .filter-item-count' => 'color: {{VALUE}} !important;',
            ],
            'condition' => [
                'filter'         => 'true',
            ],
        ),
        array(
            'name' => 'colordv_filter',
            'label' => esc_html__('Filter Under Line Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-el-divider' => 'background-color: {{VALUE}} !important;',
            ],
            'condition' => [
                'filter'         => 'true',
            ],
        ),
        array(
            'name' => 'color_filter_at',
            'label' => esc_html__('Filter Active Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .filter-item.active,{{WRAPPER}} .filter-item.active .filter-item-count' => 'color: {{VALUE}} !important;',
                '{{WRAPPER}} .filter-item:hover,{{WRAPPER}} .filter-item:hover .filter-item-count' => 'color: {{VALUE}} !important;',
            ],
            'condition' => [
                'filter'         => 'true',
            ],
        ),
        array(
            'name' => 'padding_right',
            'label' => esc_html__('Widget Padding Right', 'vintech' ),
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
                '{{WRAPPER}} .pxl-swiper-slider' => 'padding-right: {{SIZE}}{{UNIT}};',
            ],
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                        ]
                    ]
                ],
            ],
        ),

        array(
            'name' => 'style_l11',
            'label' => esc_html__('Style', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'pxl-post-style1' => 'Style 1',
                'pxl-post-style2' => 'Style 2',
                'pxl-post-style3' => 'Style 3',
            ],
            'default' => 'pxl-post-style1',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-2']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                        ]
                    ],
                ],
            ]
        ),
        array(
            'name' => 'img_size',
            'label' => esc_html__('Image Size', 'vintech' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'industries'],
                            ['name' => 'layout_industries', 'operator' => 'in', 'value' => ['industries-1']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2','post-3']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1','portfolio-2','portfolio-3','portfolio-4']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_date',
            'label' => esc_html__('Show Date', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_number',
            'label' => esc_html__('Show Number', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_title',
            'label' => esc_html__('Show Title', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']]
                        ]
                    ],
                ],
            ]
        ),
        array(
            'name' => 'show_category',
            'label' => esc_html__('Show Category', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2','post-3']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']]
                        ]
                    ],
                ],
            ]
        ),
        array(
            'name' => 'show_author',
            'label' => esc_html__('Show Author', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2','post-3']]
                        ]
                    ],
                ],
            ]
        ),
        array(
            'name' => 'show_comment',
            'label' => esc_html__('Show Comment', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2','post-3']]
                        ]
                    ],
                ],
            ]
        ),
        array(
            'name' => 'show_excerpt',
            'label' => esc_html__('Show Excerpt', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2','post-3']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-3','service-4']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'num_words',
            'label' => esc_html__('Number of Words', 'vintech' ),
            'type' => \Elementor\Controls_Manager::NUMBER,
            'default' => 25,
            'separator' => 'after',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1','portfolio-2']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'industries'],
                            ['name' => 'layout_industries', 'operator' => 'in', 'value' => ['industries-1']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2','post-3']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-3','service-4']],
                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true'],
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_button',
            'label' => esc_html__('Show Button Readmore', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'true',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-3','service-4']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'button_text',
            'label' => esc_html__('Button Text', 'vintech' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-3','service-4']],
                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                        ]
                    ],
                ],
            ]
        ),
    ),
),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'vintech'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'item_padding',
            'label' => esc_html__('Item Padding', 'vintech' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-container' => 'margin-right: -{{RIGHT}}{{UNIT}} !important;  margin-left: -{{LEFT}}{{UNIT}}  !important;',
                '{{WRAPPER}} .pxl-swiper-slider .pxl-swiper-container .pxl-swiper-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'title_margin',
            'label' => esc_html__('Title Margin', 'vintech' ),
            'type' => \Elementor\Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px' ],
            'selectors' => [
                '{{WRAPPER}} .pxl-post-carousel .pxl-post--inner .pxl-post--title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
            'control_type' => 'responsive',
        ),
        array(
            'name' => 'title_color',
            'label' => esc_html__('Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-post--title,body {{WRAPPER}} .pxl-swiper-slider .pxl-item--title a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => 'body {{WRAPPER}} .pxl-swiper-slider .pxl-item--title,body {{WRAPPER}} .pxl-swiper-slider .pxl-item--title a',
        ),
    ),
),
array(
    'name' => 'section_style_excerpt',
    'label' => esc_html__('Excerpt', 'vintech'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'conditions' => [
        'relation' => 'or',
        'terms' => [
            [
                'terms' => [
                    ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                    ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']]
                ]
            ]
        ],
    ],
    'controls' => array(
        array(
            'name' => 'excerpt_color',
            'label' => esc_html__('Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .pxl-swiper-slider .pxl-post--content' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'excerpt_typography',
            'label' => esc_html__('Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-swiper-slider .pxl-post--content',
        ),
    ),
),
),
),
),
vintech_get_class_widget_path()
);