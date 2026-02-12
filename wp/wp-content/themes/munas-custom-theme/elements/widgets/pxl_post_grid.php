<?php
$pt_supports = ['post','portfolio','service','industries'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_grid',
        'title' => esc_html__('Case Post Grid', 'vintech' ),
        'icon' => 'eicon-posts-grid',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'tab_layout',
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
                        vintech_get_post_grid_layout($pt_supports)
                    ),
                ),

                array(
                    'name' => 'tab_source',
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
                    'name' => 'tab_grid',
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
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                            
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Case  Animate', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => vintech_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'filter',
                            'label' => esc_html__('Filter on Masonry', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true' => esc_html__('Enable', 'vintech' ),
                                'false' => esc_html__('Disable', 'vintech' ),
                            ],
                            'condition' => [
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                            'name' => 'search',
                            'label' => esc_html__('Search', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true' => esc_html__('Enable', 'vintech' ),
                                'false' => esc_html__('Disable', 'vintech' ),
                            ],
                            'condition' => [
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name'    => 'filter_type',
                            'label'   => esc_html__('Filter Type', 'vintech' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'default' => 'normal',
                            'options' => [
                                'normal'  => esc_html__('Normal', 'vintech' ),
                                'ajax' => esc_html__('Ajax', 'vintech' ),
                            ],
                            'condition' => [
                                'select_post_by' => 'term_selected',
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'filter_default_title',
                            'label' => esc_html__('Filter Default Title', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('All', 'vintech' ),
                            'condition' => [
                                'filter' => 'true',
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'pagination' => esc_html__('Pagination', 'vintech' ),
                                'loadmore' => esc_html__('Loadmore', 'vintech' ),
                                'false' => esc_html__('Disable', 'vintech' ),
                            ],
                        ),
                        array(
                            'name' => 'button_text_load_more',
                            'label' => esc_html__('Button Loadmore', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'pagination_type' => 'loadmore',
                            ],
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
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'vintech' ),
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
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'vintech' ),
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
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
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
                            'name' => 'col_xxl',
                            'label' => esc_html__('Columns XXL Devices', 'vintech' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'inherit',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                'inherit' => 'Inherit',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['portfolio-3']]
                                        ]
                                    ]
                                ],
                            ]
                        ),
                        array(
                            'name' => 'item_padding',
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
                                '{{WRAPPER}} .pxl-grid-inner' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-grid-inner .pxl-grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'grid_masonry',
                            'label' => esc_html__('Grid Masonry', 'vintech'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'col_xs_m',
                                    'label' => esc_html__('Columns: Screen <= 575', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '1',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '1.5' => '2/3',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_sm_m',
                                    'label' => esc_html__('Columns: Screen <= 767', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '2',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '1.5' => '2/3',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_md_m',
                                    'label' => esc_html__('Columns: Screen <= 991', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '2',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '1.5' => '2/3',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_lg_m',
                                    'label' => esc_html__('Columns: Screen <= 1199', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '1.5' => '2/3',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                        'col-66' => 'Column 66%',
                                    ],
                                ),
                                array(
                                    'name' => 'col_xl_m',
                                    'label' => esc_html__('Columns: Screen => 1200', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '1.5' => '2/3',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                        'col-66' => 'Column 66%',
                                    ],
                                ),
                                array(
                                    'name' => 'img_size_m',
                                    'label' => esc_html__('Image Size', 'vintech' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                                ),
                            ),
),
),
),


array(
    'name' => 'tab_display',
    'label' => esc_html__('Display', 'vintech' ),
    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
    'controls' => array(
        array(
            'name' => 'pxl_icon',
            'label' => esc_html__('Icon', 'vintech' ),
            'type' => \Elementor\Controls_Manager::ICONS,
            'fa4compatibility' => 'icon',
            'conditions' => [
                'relation' => 'or',
                'terms' => [
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1']]
                        ]
                    ]
                ],
            ],
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
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        ]
                    ]
                ],
            ]
        ),
        array(
            'name' => 'show_social',
            'label' => esc_html__('Show Social', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'default' => 'false',
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
            'default' => 'false',
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
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        ]
                    ]
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
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1','portfolio-2','portfolio-3']]
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
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'industries'],
                            ['name' => 'layout_industries', 'operator' => 'in', 'value' => ['industries-1','industries-2']]
                        ]
                    ],
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
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2']],
                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-3']],
                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-2','portfolio-3']],
                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'industries'],
                            ['name' => 'layout_industries', 'operator' => 'in', 'value' => ['industries-1','industries-2']]
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
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1','portfolio-2','portfolio-3']],
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-3']]
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'industries'],
                            ['name' => 'layout_industries', 'operator' => 'in', 'value' => ['industries-1','industries-2']]
                        ]
                    ],
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
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1','post-2']],
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'portfolio'],
                            ['name' => 'layout_portfolio', 'operator' => 'in', 'value' => ['portfolio-1','portfolio-2','portfolio-3']],
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1','service-2','service-3']],
                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                        ]
                    ],
                    [
                        'terms' => [
                            ['name' => 'post_type', 'operator' => '==', 'value' => 'industries'],
                            ['name' => 'layout_industries', 'operator' => 'in', 'value' => ['industries-1','industries-2']]
                        ]
                    ],
                ],
            ],
        ),
    ),
),
array(
    'name' => 'section_style_title',
    'label' => esc_html__('Title', 'vintech'),
    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
    'controls' => array(
        array(
            'name' => 'custom_box',
            'label' => esc_html__('Custom Box', 'vintech' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'options' => [
                'df' => 'Default',
                'style-2' => 'Style 2',
            ],
            'default' => 'df',
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
            'name' => 'title_color',
            'label' => esc_html__('Color', 'vintech' ),
            'type' => \Elementor\Controls_Manager::COLOR,
            'selectors' => [
                'body {{WRAPPER}} .pxl-grid .pxl-post--title,body {{WRAPPER}} .pxl-grid .pxl-post--title a' => 'color: {{VALUE}};',
            ],
        ),
        array(
            'name' => 'title_typography',
            'label' => esc_html__('Typography', 'vintech' ),
            'type' => \Elementor\Group_Control_Typography::get_type(),
            'control_type' => 'group',
            'selector' => '{{WRAPPER}} .pxl-grid .pxl-post--title,body {{WRAPPER}} .pxl-grid .pxl-post--title a',
        ),
    ),
),
),
),
),
vintech_get_class_widget_path()
);