<?php

use Elementor\Element_Base;
use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Schemes\Color;
use Elementor\Schemes\Typography;
use Elementor\Utils;
use Elementor\Control_Media;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Repeater;
use Elementor\Includes\Elements\PXL_Container;

defined('ABSPATH') || die();

class Hub_Elementor_Custom_Controls {

    public static $pxl_el_container_bg = array();

    public static function init() {

        add_action( 'elementor/frontend/before_render', [ __CLASS__, 'before_section_render' ], 1 );

        //pxl sticky layout
        add_action( 'elementor/element/after_section_end', function( $element, $section_id ) {

            if ( $element->get_name() === 'container' && 'section_layout_additional_options' === $section_id ) {

                $elementor_doc_selector = '.elementor';

                $element->start_controls_section(
                    'pxl_sticky_container_layout_section',
                    [
                        'label' => __( 'Sticky <span style="font-size: 1.5em; vertical-align:middle; margin-inline-start:0.35em;">📌<span>', 'vintech' ),
                        'tab' => Controls_Manager::TAB_LAYOUT,
                    ]
                );

                $element->add_control(
                    'pxl_section_border_animated',
                    [
                        'label' => esc_html__('Border Animated', 'vintech'),
                        'type' => \Elementor\Controls_Manager::SWITCHER,
                        'label_on' => esc_html__( 'Yes', 'vintech' ),
                        'label_off' => esc_html__( 'No', 'vintech' ),
                        'return_value' => 'yes',
                        'default' => 'no',
                        'separator' => 'after',
                    ]
                );

                $element->add_control(
                    'col_fixed',
                    [
                        'label'   => esc_html__( 'Column Fixed', 'vintech' ),
                        'type'    => \Elementor\Controls_Manager::SELECT,
                        'description' => esc_html__('Only applies to the original container.', 'vintech' ),
                        'options' => array(
                          'none'        => esc_html__( 'No', 'vintech' ),
                          'fixed'   => esc_html__( 'Yes', 'vintech' ),
                      ),
                        'default' => 'none',
                        'prefix_class' => 'pxl-row-scroll-'
                    ]
                );

                $element->add_control(
                    'col_sticky',
                    [
                        'label'   => esc_html__( 'Column Sticky', 'vintech' ),
                        'type'    => \Elementor\Controls_Manager::SELECT,
                        'options' => array(
                            'none'           => esc_html__( 'No', 'vintech' ),
                            'sticky' => esc_html__( 'Yes', 'vintech' ),
                        ),
                        'default' => 'none',
                        'prefix_class' => 'pxl-column-'
                    ]
                );

                $element->add_control(
                    'col_sticky_offset_top',
                    [
                        'label' => esc_html__( 'Sticky Offset Top', 'vintech' ),
                        'type' => 'text',
                        'description' => esc_html__('Enter number.', 'vintech' ),
                        'default'  => '30',
                        'selectors' => [
                            '{{WRAPPER}}.pxl-column-sticky' => 'top: {{VALUE}}'.'px',
                        ],
                        'condition' => [
                            'col_sticky' => 'sticky'
                        ]
                    ]
                );

                $element->add_control(
                    'full_content_with_space',
                    [
                      'label' => esc_html__( 'Full Content with space from?', 'vintech' ),
                      'type'         => \Elementor\Controls_Manager::SELECT,
                      'prefix_class' => 'pxl-full-content-with-space-',
                      'options'      => array(
                        'none'    => esc_html__( 'None', 'vintech' ),
                        'start'   => esc_html__( 'Start', 'vintech' ),
                        'end'     => esc_html__( 'End', 'vintech' ),
                    ),
                      'default'      => 'none',
                  ]
              );

                $element->add_control(
                    'pxl_container_width',
                    [
                        'label' => esc_html__('Container Width', 'vintech'),
                        'type' => \Elementor\Controls_Manager::NUMBER,
                        'default' => 1200,
                        'condition' => [
                          'full_content_with_space!' => 'none'
                      ]           
                  ]
              );

                $element->end_controls_section();
            }

        }, 10, 2 );

        // pxl dark layout
add_action( 'elementor/element/after_section_end', function( $element, $section_id ) {

    if ( $element->get_name() === 'container' && 'section_layout_additional_options' === $section_id ) {

        $elementor_doc_selector = '.elementor';

        $element->start_controls_section(
            'pxl_dark_container_layout_section',
            [
                'label' => __( 'Background <span style="font-size: 1.5em; vertical-align:middle; margin-inline-start:0.35em;">🖼️<span>', 'vintech' ),
                'tab' => Controls_Manager::TAB_LAYOUT,
            ]
        );

        $element->add_control(
            'pxl_parallax_bg_img',
            [
                'label' => esc_html__( 'Parallax Background Image', 'vintech' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-image: url( {{URL}} );',
                ],
            ]
        );

        $element->add_responsive_control(
            'pxl_parallax_bg_position',
            [
                'label' => esc_html__( 'Background Position', 'vintech' ),
                'type'         => \Elementor\Controls_Manager::SELECT,
                'hide_in_inner' => true,
                'options'      => array(
                    ''              => esc_html__( 'Default', 'vintech' ),
                    'center center' => esc_html__( 'Center Center', 'vintech' ),
                    'center left'   => esc_html__( 'Center Left', 'vintech' ),
                    'center right'  => esc_html__( 'Center Right', 'vintech' ),
                    'top center'    => esc_html__( 'Top Center', 'vintech' ),
                    'top left'      => esc_html__( 'Top Left', 'vintech' ),
                    'top right'     => esc_html__( 'Top Right', 'vintech' ),
                    'bottom center' => esc_html__( 'Bottom Center', 'vintech' ),
                    'bottom left'   => esc_html__( 'Bottom Left', 'vintech' ),
                    'bottom right'  => esc_html__( 'Bottom Right', 'vintech' ),
                    'initial'       =>  esc_html__( 'Custom', 'vintech' ),
                ),
                'default'      => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-position: {{VALUE}};',
                ],
                'condition' => [
                    'pxl_parallax_bg_img[url]!' => ''
                ]        
            ]
        );

        $element->add_responsive_control(
            'pxl_parallax_bg_pos_custom_x',
            [
                'label' => esc_html__( 'X Position', 'vintech' ),
                'type' => \Elementor\Controls_Manager::SLIDER,  
                'hide_in_inner' => true,
                'size_units' => [ 'px', 'em', '%', 'vw' ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'range' => [
                    'px' => [
                        'min' => -800,
                        'max' => 800,
                    ],
                    'em' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                    'vw' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-position: {{SIZE}}{{UNIT}} {{pxl_parallax_bg_pos_custom_y.SIZE}}{{pxl_parallax_bg_pos_custom_y.UNIT}}',
                ],
                'condition' => [
                    'pxl_parallax_bg_position' => [ 'initial' ],
                    'pxl_parallax_bg_img[url]!' => '',
                ],
            ]
        );
        $element->add_responsive_control(
            'pxl_parallax_bg_pos_custom_y',
            [
                'label' => esc_html__( 'Y Position', 'vintech' ),
                'type' => \Elementor\Controls_Manager::SLIDER,  
                'hide_in_inner' => true,
                'size_units' => [ 'px', 'em', '%', 'vw' ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'range' => [
                    'px' => [
                        'min' => -800,
                        'max' => 800,
                    ],
                    'em' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                    'vw' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-position: {{pxl_parallax_bg_pos_custom_x.SIZE}}{{pxl_parallax_bg_pos_custom_x.UNIT}} {{SIZE}}{{UNIT}}',
                ],

                'condition' => [
                    'pxl_parallax_bg_position' => [ 'initial' ],
                    'pxl_parallax_bg_img[url]!' => '',
                ],
            ]
        );
        $element->add_responsive_control(
            'pxl_parallax_bg_size',
            [
                'label' => esc_html__( 'Background Size', 'vintech' ),
                'type'         => \Elementor\Controls_Manager::SELECT,
                'hide_in_inner' => true,
                'options'      => array(
                    ''              => esc_html__( 'Default', 'vintech' ),
                    'auto' => esc_html__( 'Auto', 'vintech' ),
                    'cover'   => esc_html__( 'Cover', 'vintech' ),
                    'contain'  => esc_html__( 'Contain', 'vintech' ),
                    'initial'    => esc_html__( 'Custom', 'vintech' ),
                ),
                'default'      => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-size: {{VALUE}};',
                ],
                'condition' => [
                    'pxl_parallax_bg_img[url]!' => ''
                ]        
            ]
        );
        $element->add_responsive_control(
            'pxl_parallax_bg_size_custom',
            [
                'label' => esc_html__( 'Background Width', 'vintech' ),
                'type' => \Elementor\Controls_Manager::SLIDER,  
                'hide_in_inner' => true,
                'size_units' => [ 'px', 'em', '%', 'vw' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                    'vw' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'size' => 100,
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'background-size: {{SIZE}}{{UNIT}} auto',
                ],
                'condition' => [
                    'pxl_parallax_bg_size' => [ 'initial' ],
                    'pxl_parallax_bg_img[url]!' => '',
                ],
            ]
        );
        $element->add_control(
            'pxl_parallax_pos_popover_toggle',
            [
                'label' => esc_html__( 'Parallax Background Position', 'vintech' ),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off' => esc_html__( 'Default', 'vintech' ),
                'label_on' => esc_html__( 'Custom', 'vintech' ),
                'return_value' => 'yes',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->start_popover();
        $element->add_responsive_control(
            'pxl_parallax_pos_left',
            [
                'label' => esc_html__( 'Left', 'vintech' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'left: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_responsive_control(
            'pxl_parallax_pos_top',
            [
                'label' => esc_html__( 'Top', 'vintech' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'top: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        ); 
        $element->add_responsive_control(
            'pxl_parallax_pos_right',
            [
                'label' => esc_html__( 'Right', 'vintech' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'right: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_responsive_control(
            'pxl_parallax_pos_bottom',
            [
                'label' => esc_html__( 'Bottom', 'vintech' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'bottom: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        ); 
        $element->end_popover();

        $element->add_control(
            'pxl_parallax_effect_popover_toggle',
            [
                'label' => esc_html__( 'Parallax Background Effect', 'vintech' ),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off' => esc_html__( 'Default', 'vintech' ),
                'label_on' => esc_html__( 'Custom', 'vintech' ),
                'return_value' => 'yes',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->start_popover();
        $element->add_control(
            'pxl_parallax_bg_img_effect_x',
            [
                'label' => esc_html__( 'TranslateX', 'vintech' ).' (-80)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_y',
            [
                'label' => esc_html__( 'TranslateY', 'vintech' ).' (-80)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_z',
            [
                'label' => esc_html__( 'TranslateZ', 'vintech' ).' (-80)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_rotate_x',
            [
                'label' => esc_html__( 'Rotate X', 'vintech' ).' (30)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_rotate_y',
            [
                'label' => esc_html__( 'Rotate Y', 'vintech' ).' (30)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_rotate_z',
            [
                'label' => esc_html__( 'Rotate Z', 'vintech' ).' (30)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_scale_x',
            [
                'label' => esc_html__( 'Scale X', 'vintech' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        ); 
        $element->add_control(
            'pxl_parallax_bg_img_effect_scale_y',
            [
                'label' => esc_html__( 'Scale Y', 'vintech' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_scale_z',
            [
                'label' => esc_html__( 'Scale Z', 'vintech' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_img_effect_scale',
            [
                'label' => esc_html__( 'Scale', 'vintech' ).' (1.2)',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_from_scroll_custom',
            [
                'label' => esc_html__( 'Scroll From (px)', 'vintech' ).' (350) from offset top',
                'type' => 'text',
                'default' => '',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->end_popover(); 
        $element->add_control(
            'pxl_parallax_bg_effect_other',
            [
                'label'         => esc_html__( 'Background Effect Other', 'vintech' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'options'       => array(
                    ''        => esc_html__( 'None', 'vintech' ),
                    'pinned-zoom-clipped'    => esc_html__( 'Pinned Zoom Clipped', 'vintech' ),
                    'pinned-circle-zoom-clipped'    => esc_html__( 'Pinned Circle Zoom Clipped', 'vintech' ),
                    'mask-parallax'    => esc_html__( 'Mask Parallax ', 'vintech' ),
                    'mask-parallax light-content'    => esc_html__( 'Mask Parallax - Light Content', 'vintech' ),
                ),
                'default'      => '',
                'frontend_available' => true,
                'prefix_class' => 'pxl-bg-prx-effect-',
                'condition' => [
                    'pxl_parallax_bg_img[url]!' => ''
                ]        
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_circle_zoom_bg_color',
            [
                'label'         => esc_html__( 'Circle Zoom Clipped Mask Background Color', 'vintech' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .circle-zoom-mask-svg .mask-bg' => 'fill: {{VALUE}};'
                ],
                'condition' => [
                    'pxl_parallax_bg_img[url]!' => '',
                    'pxl_parallax_bg_effect_other' => 'pinned-circle-zoom-clipped'
                ]        
            ]
        );
        $element->add_control(
            'pxl_parallax_bg_circle_zoom_inner_bg_color',
            [
                'label'         => esc_html__( 'Circle Zoom Inner Background Color', 'vintech' ),
                'type'          => \Elementor\Controls_Manager::SELECT,
                'label_block'   => true,
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .circle-zoom-mask-svg .circle-inner-layer' => 'fill: {{VALUE}};'
                ],
                'condition' => [
                    'pxl_parallax_bg_img[url]!' => '',
                    'pxl_parallax_bg_effect_other' => 'pinned-circle-zoom-clipped'
                ]        
            ]
        );
        $element->add_group_control(
            \Elementor\Group_Control_Css_Filter::get_type(),
            [
                'name'      => 'pxl_section_parallax_img_css_filter',
                'selector' => '{{WRAPPER}} .pxl-section-bg-parallax',
                'condition'     => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );
        $element->add_responsive_control(
            'pxl_section_parallax_opacity',
            [
                'label'      => esc_html__( 'Parallax Opacity (0 - 100)', 'vintech' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ '%' ],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ]
                ],
                'default'    => [
                    'unit' => '%'
                ],
                'laptop_default' => [
                    'unit' => '%',
                ],
                'tablet_extra_default' => [
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_extra_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'selectors' => [
                    '{{WRAPPER}} .pxl-section-bg-parallax' => 'opacity: {{SIZE}}{{UNIT}};',
                ],
                'condition' => [
                    'pxl_parallax_bg_img[url]!' => ''
                ] 
            ]
        );

        $element->end_controls_section();
    }

}, 10, 2 );

add_action( 'elementor/element/after_section_end', function( $element, $section_id ) {

    if (
        $section_id === 'section_layout'  ||
        $section_id === 'section_advanced' ||
        $section_id === '_section_style'
    ) {

        if ( $element->get_controls( 'pxl_effect_container_layout_section' ) ) {
            return;
        }

        $element->start_controls_section(
            'pxl_effect_container_layout_section',
            [
                'label' => __( 'Effect Images 🖊', 'vintech' ),
                'tab' => Controls_Manager::TAB_ADVANCED,
            ]
        );

        $element->add_control(
            'pxl_widget_el_pos_popover_toggle',
            [
                'label' => esc_html__( 'Position', 'vintech' ),
                'type' => \Elementor\Controls_Manager::POPOVER_TOGGLE,
                'label_off' => esc_html__( 'Default', 'vintech' ),
                'label_on' => esc_html__( 'Custom', 'vintech' ),
                'return_value' => 'yes',
            ]
        );
        $element->start_popover();
        $element->add_responsive_control(
            'pxl_widget_el_position',
            [
                'label' => esc_html__( 'Position', 'vintech' ),
                'type'         => \Elementor\Controls_Manager::SELECT,
                'options'      => array(
                    ''         => esc_html__( 'Default', 'vintech' ),
                    'absolute' => esc_html__( 'Absolute', 'vintech' ),
                    'relative' => esc_html__( 'Relative', 'vintech' ),
                    'fixed'    => esc_html__( 'Fixed', 'vintech' ),
                ),
                'default'      => '',
                'selectors' => [
                    '{{WRAPPER}}' => 'position: {{VALUE}};',
                ],
            ]
        );
        $element->add_responsive_control(
            'pxl_widget_el_pos_left',
            [
                'label' => esc_html__( 'Left', 'vintech' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}}' => 'left: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_widget_el_position!' => ''
                ] 
            ]
        );
        $element->add_responsive_control(
            'pxl_widget_el_pos_top',
            [
                'label' => esc_html__( 'Top', 'vintech' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}}' => 'top: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_widget_el_position!' => ''
                ] 
            ]
        ); 
        $element->add_responsive_control(
            'pxl_widget_el_pos_right',
            [
                'label' => esc_html__( 'Right', 'vintech' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}}' => 'right: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_widget_el_position!' => ''
                ] 
            ]
        );
        $element->add_responsive_control(
            'pxl_widget_el_pos_bottom',
            [
                'label' => esc_html__( 'Bottom', 'vintech' ).' (50px) px,%,vw,auto',
                'type' => 'text',
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}}' => 'bottom: {{VALUE}}',
                ],
                'condition'     => [
                    'pxl_widget_el_position!' => ''
                ] 
            ]
        ); 
        $element->end_popover();

        $element->add_control(
            'pxl_widget_el_parallax_effect',
            [
                'label' => esc_html__('Pxl Parallax Effect', 'vintech' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    ''               => esc_html__( 'None', 'vintech' ),
                    'wow PXLfadeInUp' => esc_html__( 'PXLfadeInUp', 'vintech' ),
                    'wow PXLZoom2' => esc_html__( 'PXLZoom', 'vintech' ),
                    'wow PXLfadeInUp2' => esc_html__( 'Mouse Move Scope Class (mouse-move-scope)', 'vintech' ),
                ],
                'label_block' => true,
                'default' => '',
                'prefix_class' => ''
            ]
        );
        $element->end_controls_section();
    }
}, 10, 2 );

add_action('elementor/element/after_add_attributes', 'vintech_custom_el_attributes', 10, 1);

add_filter( 'pxl_element_container/before-render', function( $html, $settings ) {
    if( isset($settings['pxl_section_border_animated']) && $settings['pxl_section_border_animated'] == 'yes' ){
        $breakpoints = ['laptop','tablet_extra','tablet','mobile_extra','mobile'];

        $unit = $settings['border_width']['unit'];
        $border_num = 0;

        $bt_width = $settings['border_width']['top'];
        $br_width = $settings['border_width']['right'];
        $bb_width = $settings['border_width']['bottom'];
        $bl_width = $settings['border_width']['left'];

        foreach ($breakpoints as $v) {
            if( isset($settings['border_width_'.$v]['top']) && (int)$settings['border_width_'.$v]['top'] > 0 )
                $bt_width = $settings['border_width_'.$v]['top'];
            if( isset($settings['border_width_'.$v]['right']) && (int)$settings['border_width_'.$v]['right'] > 0 )
                $br_width = $settings['border_width_'.$v]['right'];
            if( isset($settings['border_width_'.$v]['bottom']) && (int)$settings['border_width_'.$v]['bottom'] > 0 )
                $bb_width = $settings['border_width_'.$v]['bottom'];
            if( isset($settings['border_width_'.$v]['left']) && (int)$settings['border_width_'.$v]['left'] > 0 )
                $bl_width = $settings['border_width_'.$v]['left'];
        }

        $bd_top_style = 'style="--bd-width: '.$bt_width.$unit.' 0 0 0; border-style: '.$settings['border_border'].'; border-color: '.$settings['border_color'].';"';
        $bd_right_style = 'style="--bd-width: 0 '.$br_width.$unit.' 0 0; border-style: '.$settings['border_border'].'; border-color: '.$settings['border_color'].';"';
        $bd_bottom_style = 'style="--bd-width: 0 0 '.$bb_width.$unit.' 0; border-style: '.$settings['border_border'].'; border-color: '.$settings['border_color'].';"';
        $bd_left_style = 'style="--bd-width: 0 0 0 '.$bl_width.$unit.'; border-style: '.$settings['border_border'].'; border-color: '.$settings['border_color'].';"';

        $bd_top_w = $bd_right_w = $bd_bottom_w = $bd_left_w = '';

        foreach (['top', 'right', 'bottom', 'left'] as $side) {
            $var_name = 'bd_' . $side . '_w';
            if (isset($settings['border_width'][$side])) {
                if ($settings['border_width'][$side] == '0') {
                    $$var_name .= ' bw-no';
                } elseif ((int)$settings['border_width'][$side] > 0) {
                    $$var_name .= ' bw-yes';
                }
            }
        }

        foreach ($breakpoints as $v) {
            foreach (['top', 'right', 'bottom', 'left'] as $side) {
                $var_name = 'bd_' . $side . '_w';
                if (isset($settings['border_width_'.$v][$side])) {
                    if ($settings['border_width_'.$v][$side] == '0') {
                        $$var_name .= ' bw-'.$v.'-no';
                    } elseif ((int)$settings['border_width_'.$v][$side] > 0) {
                        $$var_name .= ' bw-'.$v.'-yes';
                    }
                }
            }
        }

        if( (int)$settings['border_width']['top'] > 0) $border_num++;
        if( (int)$settings['border_width']['right'] > 0) $border_num++;
        if( (int)$settings['border_width']['bottom'] > 0) $border_num++;
        if( (int)$settings['border_width']['left'] > 0) $border_num++;

        $html .= '<div class="pxl-border-animated num-'.$border_num.'">
        <div class="pxl-border-anm bt w-100 '.$bd_top_w.'" '.$bd_top_style.'></div>
        <div class="pxl-border-anm br h-100 '.$bd_right_w.'" '.$bd_right_style.'></div>
        <div class="pxl-border-anm bb w-100 '.$bd_bottom_w.'" '.$bd_bottom_style.'></div>
        <div class="pxl-border-anm bl h-100 '.$bd_left_w.'" '.$bd_left_style.'></div>
        </div>';
    }   

    return $html;
}, 10, 2 );

add_filter( 'pxl_element_container/before-render', function( $html, $settings ) {
    if(!empty($settings['pxl_parallax_bg_img']['url'])){
        $effects = [];
        if(!empty($settings['pxl_parallax_bg_img_effect_x'])){
            $effects['x'] = (int)$settings['pxl_parallax_bg_img_effect_x'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_y'])){
            $effects['y'] = (int)$settings['pxl_parallax_bg_img_effect_y'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_z'])){
            $effects['z'] = (int)$settings['pxl_parallax_bg_img_effect_z'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_rotate_x'])){
            $effects['rotateX'] = (float)$settings['pxl_parallax_bg_img_effect_rotate_x'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_rotate_y'])){
            $effects['rotateY'] = (float)$settings['pxl_parallax_bg_img_effect_rotate_y'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_rotate_z'])){
            $effects['rotateZ'] = (float)$settings['pxl_parallax_bg_img_effect_rotate_z'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_scale'])){
            $effects['scale'] = (float)$settings['pxl_parallax_bg_img_effect_scale'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_scale_x'])){
            $effects['scaleX'] = (float)$settings['pxl_parallax_bg_img_effect_scale_x'];
        }
        if(!empty($settings['pxl_parallax_bg_img_effect_scale_y'])){
            $effects['scaleY'] = (float)$settings['pxl_parallax_bg_img_effect_scale_y'];
        }
        if(!empty($settings['pxl_parallax_bg_from_scroll_custom'])){
            $effects['from-scroll-custom'] = (int)$settings['pxl_parallax_bg_from_scroll_custom'];
        }
        
        $data_parallax = json_encode($effects);
        $pll_ccls = 'df-prl';
        if( !empty( $settings['pxl_parallax_bg_effect_other']) ){
            if( $settings['pxl_parallax_bg_effect_other'] == 'pinned-zoom-clipped' ){
                $html .= '<div class="clipped-bg-pinned"><div class="clipped-bg">';
            }
            if( $settings['pxl_parallax_bg_effect_other'] == 'pinned-circle-zoom-clipped' ){
                $html .= '<div class="clipped-bg-circle-pinned">';
            }
            if( $settings['pxl_parallax_bg_effect_other'] == 'mask-parallax' || $settings['pxl_parallax_bg_effect_other'] == 'mask-parallax light-content' ){
                $html .= '<div class="mask-parallax">';
                $pll_ccls = 'mask-prl';
            }
        }
        $html .= '<div class="pxl-section-bg-parallax '.$settings['pxl_parallax_bg_effect_other'].'" data-parallax="'.esc_attr($data_parallax).'"></div>';
        if( !empty( $settings['pxl_parallax_bg_effect_other']) ){
            if( $settings['pxl_parallax_bg_effect_other'] == 'pinned-zoom-clipped' ){
                $html .= '</div></div>';
            }
            if( $settings['pxl_parallax_bg_effect_other'] == 'pinned-circle-zoom-clipped' ){
                $html .= '<svg class="circle-zoom-mask-svg">
                <defs>
                <mask id="circle-zoom-mask">
                <rect width="100%" height="100%" fill="white"></rect>
                <circle class="circle-zoom" cx="50%" cy="50%" r="60"></circle>
                </mask>
                </defs>
                <rect class="circle-inner-layer" width="100%" height="100%" fill="white"></rect>
                <rect class="mask-bg" width="100%" height="100%" fill="#c4b5a4" mask="url(#circle-zoom-mask)"></rect>
                </svg>';
                $html .= '</div>';
            }
            if( $settings['pxl_parallax_bg_effect_other'] == 'mask-parallax' || $settings['pxl_parallax_bg_effect_other'] == 'mask-parallax light-content' ){
                $html .= '</div>';
            }
            
        }
    }

    if(isset($settings['row_effect_images']) && !empty($settings['row_effect_images']) && count($settings['row_effect_images'])):
        $html .= '<div class="pxl-section-effect-images">';
    foreach ($settings['row_effect_images'] as $key => $value):
        $item_image = isset($value['item_image']) ? $value['item_image'] : '';
        $effect_image = isset($value['effect_image']) ? $value['effect_image'] : '';
        $image_display = isset($value['image_display']) ? $value['image_display'] : '';
        $image_display_md = isset($value['image_display_md']) ? $value['image_display_md'] : '';
        $image_display_sm = isset($value['image_display_sm']) ? $value['image_display_sm'] : '';
        $parallax_scroll_type = isset($value['parallax_scroll_type']) ? $value['parallax_scroll_type'] : '';
        $parallax_scroll_value = isset($value['parallax_scroll_value']) ? $value['parallax_scroll_value'] : '';
        $hidde_class = '';
        if($image_display !== 'false') {
           $hidde_class = 'pxl-hide-sr-lg';
       }
       $hidde_class_md = '';
       if($image_display_md !== 'false') {
           $hidde_class_md = 'pxl-hide-sr-md';
       }
       $hidde_class_sm = '';
       if($image_display_sm !== 'false') {
           $hidde_class_sm = 'pxl-hide-sr-sm';
       }
       $effects = [];
       if($parallax_scroll_type == 'y' && !empty($parallax_scroll_value)){
        $effects['y'] = (int)$parallax_scroll_value;
    }
    if($parallax_scroll_type == 'x' && !empty($parallax_scroll_value)){
        $effects['x'] = (int)$parallax_scroll_value;
    }
    if($parallax_scroll_type == 'z' && !empty($parallax_scroll_value)){
        $effects['z'] = (int)$parallax_scroll_value;
    }
    $data_parallax = json_encode($effects);

    $parallax_hover_value = isset($value['parallax_hover_value']) ? $value['parallax_hover_value'] : '';

    $html .= '<img data-parallax-value="'.esc_attr($parallax_hover_value).'" data-parallax="'.esc_attr($data_parallax).'" class="pxl-item--image elementor-repeater-item-'.$value['_id'].' '.$effect_image.' '.$hidde_class.' '.$hidde_class_md.' '.$hidde_class_sm.'" src="'.$item_image['url'].'" alt=""/>';
endforeach;
$html .= '</div>';
endif;

return $html;
}, 10, 2 );

add_action('elementor/editor/after_enqueue_scripts', function () {
    ?>
    <script>
        jQuery(document).ready(function ($) {
            // Chờ Elementor load xong
            setInterval(function () {
                $('.elementor-editor-container .elementor-editor-element-settings').each(function () {
                    // Kiểm tra nếu nút đã tồn tại, tránh thêm nhiều lần
                    if ($(this).find('.elementor-editor-element-play').length === 0) {
                        // Thêm nút vào danh sách
                        $(this).append(`
                            <li class="elementor-editor-element-setting elementor-editor-element-play" 
                                title="Play children inview animations" 
                                aria-label="Play children inview animations">
                                <i class="eicon-play"></i>
                            </li>
                        `);
                    }
                });
            }, 1000);

            // Xử lý sự kiện khi click vào nút
            $(document).on('click', '.elementor-editor-element-play', function () {
                var $widget = $(this).closest('.elementor-editor-element');

                // Reset animation
                $widget.find('.wow').removeClass('animated').css('visibility', 'hidden');

                setTimeout(function () {
                    $widget.find('.wow').addClass('animated').css('visibility', 'visible');
                    new WOW().init(); // Restart WOW.js
                }, 100);
            });
        });
    </script>
    <?php
});


function vintech_custom_el_attributes(Element_Base $el) {
    $settings = $el->get_settings();

    $pxl_container_width = !empty($settings['pxl_container_width']) ? (int)$settings['pxl_container_width'] : 1200;

    if (!empty($settings['stretch_section']) && $settings['stretch_section'] === 'section-stretched') {
        $pxl_container_width = max(0, $pxl_container_width - 30);
    }

    $pxl_container_width .= 'px';

    if (!empty($settings['full_content_with_space'])) {
        if ($settings['full_content_with_space'] === 'start') {
            $el->add_render_attribute('_wrapper', 'style', 'padding-left: max(15px, calc((100% - ' . $pxl_container_width . ') / 2));');
        } elseif ($settings['full_content_with_space'] === 'end') {
            $el->add_render_attribute('_wrapper', 'style', 'padding-right: max(15px, calc((100% - ' . $pxl_container_width . ') / 2));');
        }
    }

    if ($el->get_name() === 'section' && !empty($settings['pxl_header_type'])) {
        $el->add_render_attribute('_wrapper', 'class', 'pxl-header-' . $settings['pxl_header_type']);
    }

    if ( isset( $settings['pxl_section_border_animated'] ) && $settings['pxl_section_border_animated'] == 'yes'  ) {
        $el->add_render_attribute( '_wrapper', 'class', 'pxl-border-section-anm');
    }
}


add_action( 'elementor/element/parse_css', function( $post_css, $element ){

    if ( $post_css instanceof Dynamic_CSS ) {
        return;
    }

    $element_settings = $element->get_settings();

    if ( empty( $element_settings['pxl_custom_css'] ) ) {
        return;
    }

    $css = trim( $element_settings['pxl_custom_css'] );

    if ( empty( $css ) ) {
        return;
    }

    $css = str_replace( 'selector', $post_css->get_element_unique_selector( $element ), $css );

    $post_css->get_stylesheet()->add_raw_css( $css );

}, 10, 2 );
add_action( 'elementor/element/after_section_end', function( $element, $section_id ) {

    if (
        $section_id === 'section_layout'  ||
        $section_id === 'section_advanced' ||
        $section_id === '_section_style'
    ) {

        if ( $element->get_controls( 'pxl_custom_css_section' ) ) {
            return;
        }

        $element->start_controls_section(
            'pxl_custom_css_section',
            [
                'label' => __( 'Vintech Custom CSS 🖊', 'vintech' ),
                'tab' => Controls_Manager::TAB_ADVANCED,
            ]
        );

        $element->add_control(
            'pxl_custom_css',
            [
                'type' => Controls_Manager::CODE,
                'language' => 'css',
                'render_type' => 'ui',
            ]
        );

        $element->add_control(
            'pxl_custom_css_desc',
            [
                'raw' => sprintf(
                    esc_html__( 'Use "selector" to target wrapper element.%1$sselector {your css code}', 'vintech' ),
                    '<br><br>'
                ),
                'type' => Controls_Manager::RAW_HTML,
                'content_classes' => 'elementor-panel-alert elementor-panel-alert-info',
            ]
        );

        $element->end_controls_section();
    }
}, 10, 3 );
}

public static function before_section_render( Element_Base $element ) {

    if ( $element->get_settings( 'pxl_section_color_scheme' ) && $element->get_settings( 'pxl_section_color_scheme' ) !== '' ) {
        $element->add_render_attribute( '_wrapper', [
            'data-pxl-color-scheme' => $element->get_settings( 'pxl_section_color_scheme' ),
        ] );
    }
    if ( $element->get_settings( 'pxl_sticky_show' ) && $element->get_settings( 'pxl_sticky_show' ) === 'yes' ) {
        $element->add_render_attribute( '_wrapper', [
            'data-pxl-show-on-sticky' => 'true',
        ] );
        if ( $element->get_name() !== 'container' ) {
            $element->add_render_attribute( '_wrapper', 'class', 'hidden pxl-sticky:block');
        }
    }
    if ( $element->get_settings( 'pxl_sticky_hide' ) && $element->get_settings( 'pxl_sticky_hide' ) === 'yes' ) {
        $element->add_render_attribute( '_wrapper', [
            'data-pxl-hide-on-sticky' => 'true',
        ] );
        if ( $element->get_name() !== 'container' ) {
            $element->add_render_attribute( '_wrapper', 'class', 'pxl-sticky:hidden');
        }
    }
    if ( isset( $settings['pxl_section_border_animated'] ) && $settings['pxl_section_border_animated'] == 'yes'  ) {
        $el->add_render_attribute( '_wrapper', 'class', 'pxl-border-section-anm');
    }
}


}

Hub_Elementor_Custom_Controls::init();
