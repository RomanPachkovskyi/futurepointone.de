<?php

add_action( 'pxl_post_metabox_register', 'vintech_page_options_register' );
function vintech_page_options_register( $metabox ) {

	$panels = [
		'post' => [
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'vintech' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'post_settings' => [
					'title'  => esc_html__( 'Post Settings', 'vintech' ),
					'icon'   => 'el el-refresh',
					'fields' => array_merge(
						vintech_sidebar_pos_opts(['prefix' => 'post_', 'default' => true, 'default_value' => '-1']),
						vintech_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'           => 'custom_main_title',
								'type'         => 'text',
								'title'        => esc_html__( 'Custom Main Title', 'vintech' ),
								'subtitle'     => esc_html__( 'Custom heading text title', 'vintech' ),
								'required' => array( 'pt_mode', '!=', 'none' )
							),
							array(
								'id'      => 'custom_ptitle_desc',
								'type'    => 'textarea',
								'title'   => esc_html__('Page Title Description', 'vintech'),
								'default' => 'Description Details',
								'required' => array( 'pt_mode', '!=', 'none' )
							),
						),
						array(
							array(
								'id'          => 'featured-video-url',
								'type'        => 'text',
								'title'       => esc_html__( 'Video URL', 'vintech' ),
								'description' => esc_html__( 'Video will show when set post format is video', 'vintech' ),
								'validate'    => 'url',
								'msg'         => 'Url error!',
							),
							array(
								'id'          => 'featured-audio-url',
								'type'        => 'text',
								'title'       => esc_html__( 'Audio URL', 'vintech' ),
								'description' => esc_html__( 'Audio that will show when set post format is audio', 'vintech' ),
								'validate'    => 'url',
								'msg'         => 'Url error!',
							),
							array(
								'id'=>'featured-quote-text',
								'type' => 'textarea',
								'title' => esc_html__('Quote Text', 'vintech'),
								'default' => '',
							),
							array(
								'id'          => 'featured-quote-cite',
								'type'        => 'text',
								'title'       => esc_html__( 'Quote Cite', 'vintech' ),
								'description' => esc_html__( 'Quote will show when set post format is quote', 'vintech' ),
							),
							array(
								'id'       => 'featured-link-url',
								'type'     => 'text',
								'title'    => esc_html__( 'Format Link URL', 'vintech' ),
								'description' => esc_html__( 'Link will show when set post format is link', 'vintech' ),
							),
							array(
								'id'          => 'featured-link-text',
								'type'        => 'text',
								'title'       => esc_html__( 'Format Link Text', 'vintech' ),
							),
						)
					)
				]
			]
		],
		'page' => [
			'opt_name'            => 'pxl_page_options',
			'display_name'        => esc_html__( 'Page Options', 'vintech' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'Header', 'vintech' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						vintech_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						vintech_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'vintech'),
								'options'  => array(
									'show' => esc_html__('Show', 'vintech'),
									'hide'  => esc_html__('Hide', 'vintech'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'vintech' ),
								'options'  => vintech_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'vintech'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'vintech'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'vintech'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'vintech'),
								),
								'default'  => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'vintech' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						vintech_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'           => 'custom_main_title',
								'type'         => 'text',
								'title'        => esc_html__( 'Custom Main Title', 'vintech' ),
								'subtitle'     => esc_html__( 'Custom heading text title', 'vintech' ),
								'required' => array( 'pt_mode', '!=', 'none' )
							),
							array(
								'id'      => 'custom_ptitle_desc',
								'type'    => 'textarea',
								'title'   => esc_html__('Page Title Description', 'vintech'),
								'default' => 'Description Details',
								'required' => array( 'pt_mode', '!=', 'none' )
							),
						),
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'vintech' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						vintech_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'vintech' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'vintech' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						vintech_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'footer_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Display', 'vintech'),
								'options'  => array(
									'show' => esc_html__('Show', 'vintech'),
									'hide'  => esc_html__('Hide', 'vintech'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'vintech'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'vintech'),
									'on' => esc_html__('On', 'vintech'),
									'off' => esc_html__('Off', 'vintech'),
								),
								'default'  => 'inherit',
							),
							array(
								'id'          => 'body_bg_color_ct',
								'type'        => 'background',
								'title'       => esc_html__('Body Background Color Custom', 'vintech'),
								'transparent' => false,
								'output' => [
									'.pxl-footer-fixed #pxl-main',
								],        
								'required' => array( 0 => 'p_footer_fixed', 1 => 'equals', 2 => 'on' ),            
								'url'      => false
							),  
							array(
								'id'       => 'back_top_top_style',
								'type'     => 'button_set',
								'title'    => esc_html__('Back to Top Style', 'vintech'),
								'options'  => array(
									'style-default' => esc_html__('Default', 'vintech'),
									'style-round' => esc_html__('Round', 'vintech'),
								),
								'default'  => 'style-default',
							),
						)
					)
				],
				'colors' => [
					'title'  => esc_html__( 'Colors', 'vintech' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id'       => 'body_bg_color',
								'type'     => 'color',
								'title'    => esc_html__('Body Background Color', 'vintech'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'primary_color',
								'type'        => 'color',
								'title'       => esc_html__('Primary Color', 'vintech'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'third_color',
								'type'        => 'color',
								'title'       => esc_html__('Third Color', 'vintech'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'four_color',
								'type'        => 'color',
								'title'       => esc_html__('Four Color', 'vintech'),
								'transparent' => false,
								'default'     => ''
							),
							array(
								'id'          => 'gradient_color',
								'type'        => 'color_gradient',
								'title'       => esc_html__('Gradient Color One', 'vintech'),
								'transparent' => false,
								'default'  => array(
									'from' => '',
									'to'   => '', 
								),
							),
							array(
								'id'          => 'gradient_color_two',
								'type'        => 'color_gradient',
								'title'       => esc_html__('Gradient Color Two', 'vintech'),
								'transparent' => false,
								'default'  => array(
									'from' => '',
									'to'   => '', 
								),
							)
						)
					)
				],
				'extra' => [
					'title'  => esc_html__( 'Extra', 'vintech' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						array(
							array(
								'id' => 'body_custom_class',
								'type' => 'text',
								'title' => esc_html__('Body Custom Class', 'vintech'),
							),
						)
					)
				]
			]
		],
		'portfolio' => [
			'opt_name'            => 'pxl_portfolio_options',
			'display_name'        => esc_html__( 'Product Options', 'vintech' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header1' => [
					'title'  => esc_html__( 'Header', 'vintech' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						vintech_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						vintech_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'vintech'),
								'options'  => array(
									'show' => esc_html__('Show', 'vintech'),
									'hide'  => esc_html__('Hide', 'vintech'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'vintech' ),
								'options'  => vintech_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'vintech'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'vintech'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'vintech'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'vintech'),
								),
								'default'  => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'vintech' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						vintech_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'           => 'custom_main_title',
								'type'         => 'text',
								'title'        => esc_html__( 'Custom Main Title', 'vintech' ),
								'subtitle'     => esc_html__( 'Custom heading text title', 'vintech' ),
								'required' => array( 'pt_mode', '!=', 'none' )
							),
							array(
								'id'      => 'custom_ptitle_desc',
								'type'    => 'textarea',
								'title'   => esc_html__('Page Title Description', 'vintech'),
								'default' => 'Description Details',
								'required' => array( 'pt_mode', '!=', 'none' )
							),
						),
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'vintech' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						vintech_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'vintech' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
							array(
								'id'=>'multi_text_country',
								'type' => 'multi_text',
								'title' => ('Multi Text Option'),
								'title'    => esc_html('Mutil Text', 'vintech'),
							),
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'vintech' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						vintech_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'footer_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Display', 'vintech'),
								'options'  => array(
									'show' => esc_html__('Show', 'vintech'),
									'hide'  => esc_html__('Hide', 'vintech'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'vintech'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'vintech'),
									'on' => esc_html__('On', 'vintech'),
									'off' => esc_html__('Off', 'vintech'),
								),
								'default'  => 'inherit',
							),
							array(
								'id'       => 'back_top_top_style',
								'type'     => 'button_set',
								'title'    => esc_html__('Back to Top Style', 'vintech'),
								'options'  => array(
									'style-default' => esc_html__('Default', 'vintech'),
									'style-round' => esc_html__('Round', 'vintech'),
								),
								'default'  => 'style-default',
							),
						)
					)
				],
			]
		],
		'product' => [
			'opt_name'            => 'pxl_product_options',
			'display_name'        => esc_html__( 'Portfolio Options', 'vintech' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header1' => [
					'title'  => esc_html__( 'Header', 'vintech' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						vintech_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						vintech_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'vintech'),
								'options'  => array(
									'show' => esc_html__('Show', 'vintech'),
									'hide'  => esc_html__('Hide', 'vintech'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'vintech' ),
								'options'  => vintech_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'vintech'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'vintech'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'vintech'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'vintech'),
								),
								'default'  => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'vintech' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						vintech_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'           => 'custom_main_title',
								'type'         => 'text',
								'title'        => esc_html__( 'Custom Main Title', 'vintech' ),
								'subtitle'     => esc_html__( 'Custom heading text title', 'vintech' ),
								'required' => array( 'pt_mode', '!=', 'none' )
							),
							array(
								'id'      => 'custom_ptitle_desc',
								'type'    => 'textarea',
								'title'   => esc_html__('Page Title Description', 'vintech'),
								'default' => 'Description Details',
								'required' => array( 'pt_mode', '!=', 'none' )
							),
						),
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'vintech' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						vintech_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'vintech' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'vintech' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						vintech_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
					)
				],
			]
		],
		'service' => [
			'opt_name'            => 'pxl_service_options',
			'display_name'        => esc_html__( 'Service Options', 'vintech' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'vintech' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'=> 'service_external_link',
								'type' => 'text',
								'title' => esc_html__('External Link', 'vintech'),
								'validate' => 'url',
								'default' => '',
							),
							array(
								'id'       => 'service_icon_type',
								'type'     => 'button_set',
								'title'    => esc_html__('Icon Type', 'vintech'),
								'options'  => array(
									'icon'  => esc_html__('Icon', 'vintech'),
									'image'  => esc_html__('Image', 'vintech'),
								),
								'default'  => 'icon'
							),
							array(
								'id'       => 'service_icon_font',
								'type'     => 'pxl_iconpicker',
								'title'    => esc_html__('Icon', 'vintech'),
								'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'icon' ),
								'force_output' => true
							),
							array(
								'id'       => 'service_icon_img',
								'type'     => 'media',
								'title'    => esc_html__('Icon Image', 'vintech'),
								'default' => '',
								'required' => array( 0 => 'service_icon_type', 1 => 'equals', 2 => 'image' ),
								'force_output' => true
							),
						)
					)
				],
				'header1' => [
					'title'  => esc_html__( 'Header', 'vintech' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						vintech_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						vintech_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'vintech'),
								'options'  => array(
									'show' => esc_html__('Show', 'vintech'),
									'hide'  => esc_html__('Hide', 'vintech'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'vintech' ),
								'options'  => vintech_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'vintech'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'vintech'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'vintech'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'vintech'),
								),
								'default'  => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'vintech' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						vintech_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'           => 'custom_main_title',
								'type'         => 'text',
								'title'        => esc_html__( 'Custom Main Title', 'vintech' ),
								'subtitle'     => esc_html__( 'Custom heading text title', 'vintech' ),
								'required' => array( 'pt_mode', '!=', 'none' )
							),
							array(
								'id'      => 'custom_ptitle_desc',
								'type'    => 'textarea',
								'title'   => esc_html__('Page Title Description', 'vintech'),
								'default' => 'Description Details',
								'required' => array( 'pt_mode', '!=', 'none' )
							),
						),
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'vintech' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						vintech_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'vintech' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
							array(
								'id'=>'multi_text_country_ser',
								'type' => 'multi_text',
								'title' => ('Multi Text Option'),
								'title'    => esc_html('Mutil Text', 'vintech'),
							),
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'vintech' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						vintech_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'footer_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Display', 'vintech'),
								'options'  => array(
									'show' => esc_html__('Show', 'vintech'),
									'hide'  => esc_html__('Hide', 'vintech'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'vintech'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'vintech'),
									'on' => esc_html__('On', 'vintech'),
									'off' => esc_html__('Off', 'vintech'),
								),
								'default'  => 'inherit',
							),
							array(
								'id'       => 'back_top_top_style',
								'type'     => 'button_set',
								'title'    => esc_html__('Back to Top Style', 'vintech'),
								'options'  => array(
									'style-default' => esc_html__('Default', 'vintech'),
									'style-round' => esc_html__('Round', 'vintech'),
								),
								'default'  => 'style-default',
							),
						)
					)
				],
			]
		],
		'industries' => [
			'opt_name'            => 'pxl_industries_options',
			'display_name'        => esc_html__( 'Industries Options', 'vintech' ),
			'show_options_object' => false,
			'context'  => 'advanced',
			'priority' => 'default',
			'sections'  => [
				'header' => [
					'title'  => esc_html__( 'General', 'vintech' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						array(
							array(
								'id'=> 'industries_external_link',
								'type' => 'text',
								'title' => esc_html__('External Link', 'vintech'),
								'validate' => 'url',
								'default' => '',
							),
							array(
								'id'       => 'industries_icon_type',
								'type'     => 'button_set',
								'title'    => esc_html__('Icon Type', 'vintech'),
								'options'  => array(
									'icon'  => esc_html__('Icon', 'vintech'),
									'image'  => esc_html__('Image', 'vintech'),
								),
								'default'  => 'icon'
							),
							array(
								'id'       => 'industries_icon_font',
								'type'     => 'pxl_iconpicker',
								'title'    => esc_html__('Icon', 'vintech'),
								'required' => array( 0 => 'industries_icon_type', 1 => 'equals', 2 => 'icon' ),
								'force_output' => true
							),
							array(
								'id'       => 'industries_icon_img',
								'type'     => 'media',
								'title'    => esc_html__('Icon Image', 'vintech'),
								'default' => '',
								'required' => array( 0 => 'industries_icon_type', 1 => 'equals', 2 => 'image' ),
								'force_output' => true
							),
						)
					)
				],
				'header1' => [
					'title'  => esc_html__( 'Header', 'vintech' ),
					'icon'   => 'el-icon-website',
					'fields' => array_merge(
						vintech_header_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						vintech_header_mobile_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'header_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Header Display', 'vintech'),
								'options'  => array(
									'show' => esc_html__('Show', 'vintech'),
									'hide'  => esc_html__('Hide', 'vintech'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_menu',
								'type'     => 'select',
								'title'    => esc_html__( 'Menu', 'vintech' ),
								'options'  => vintech_get_nav_menu_slug(),
								'default' => '',
							),
						),
						array(
							array(
								'id'       => 'sticky_scroll',
								'type'     => 'button_set',
								'title'    => esc_html__('Sticky Scroll', 'vintech'),
								'options'  => array(
									'-1' => esc_html__('Inherit', 'vintech'),
									'pxl-sticky-stt' => esc_html__('Scroll To Top', 'vintech'),
									'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'vintech'),
								),
								'default'  => '-1',
							),
						)
					)

				],
				'page_title' => [
					'title'  => esc_html__( 'Page Title', 'vintech' ),
					'icon'   => 'el el-indent-left',
					'fields' => array_merge(
						vintech_page_title_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'           => 'custom_main_title',
								'type'         => 'text',
								'title'        => esc_html__( 'Custom Main Title', 'vintech' ),
								'subtitle'     => esc_html__( 'Custom heading text title', 'vintech' ),
								'required' => array( 'pt_mode', '!=', 'none' )
							),
							array(
								'id'      => 'custom_ptitle_desc',
								'type'    => 'textarea',
								'title'   => esc_html__('Page Title Description', 'vintech'),
								'default' => 'Description Details',
								'required' => array( 'pt_mode', '!=', 'none' )
							),
						),
					)
				],
				'content' => [
					'title'  => esc_html__( 'Content', 'vintech' ),
					'icon'   => 'el-icon-pencil',
					'fields' => array_merge(
						vintech_sidebar_pos_opts(['prefix' => 'page_', 'default' => false, 'default_value' => '0']),
						array(
							array(
								'id'             => 'content_spacing',
								'type'           => 'spacing',
								'output'         => array( '#pxl-wapper #pxl-main' ),
								'right'          => false,
								'left'           => false,
								'mode'           => 'padding',
								'units'          => array( 'px' ),
								'units_extended' => 'false',
								'title'          => esc_html__( 'Spacing Top/Bottom', 'vintech' ),
								'default'        => array(
									'padding-top'    => '',
									'padding-bottom' => '',
									'units'          => 'px',
								)
							), 
						)
					)
				],
				'footer' => [
					'title'  => esc_html__( 'Footer', 'vintech' ),
					'icon'   => 'el el-website',
					'fields' => array_merge(
						vintech_footer_opts([
							'default'         => true,
							'default_value'   => '-1'
						]),
						array(
							array(
								'id'       => 'footer_display',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Display', 'vintech'),
								'options'  => array(
									'show' => esc_html__('Show', 'vintech'),
									'hide'  => esc_html__('Hide', 'vintech'),
								),
								'default'  => 'show',
							),
							array(
								'id'       => 'p_footer_fixed',
								'type'     => 'button_set',
								'title'    => esc_html__('Footer Fixed', 'vintech'),
								'options'  => array(
									'inherit' => esc_html__('Inherit', 'vintech'),
									'on' => esc_html__('On', 'vintech'),
									'off' => esc_html__('Off', 'vintech'),
								),
								'default'  => 'inherit',
							),
							array(
								'id'       => 'back_top_top_style',
								'type'     => 'button_set',
								'title'    => esc_html__('Back to Top Style', 'vintech'),
								'options'  => array(
									'style-default' => esc_html__('Default', 'vintech'),
									'style-round' => esc_html__('Round', 'vintech'),
								),
								'default'  => 'style-default',
							),
						)
					)
				],
			]
		],

		'pxl-template' => [ //post_type
		'opt_name'            => 'pxl_hidden_template_options',
		'display_name'        => esc_html__( 'Template Options', 'vintech' ),
		'show_options_object' => false,
		'context'  => 'advanced',
		'priority' => 'default',
		'sections'  => [
			'header' => [
				'title'  => esc_html__( 'General', 'vintech' ),
				'icon'   => 'el-icon-website',
				'fields' => array(
					array(
						'id'    => 'template_type',
						'type'  => 'select',
						'title' => esc_html__('Type', 'vintech'),
						'options' => [
							'df'       	   => esc_html__('Select Type', 'vintech'), 
							'header'       => esc_html__('Header Desktop', 'vintech'),
							'header-mobile'       => esc_html__('Header Mobile', 'vintech'),
							'footer'       => esc_html__('Footer', 'vintech'), 
							'mega-menu'    => esc_html__('Mega Menu', 'vintech'), 
							'page-title'   => esc_html__('Page Title', 'vintech'), 
							'tab' => esc_html__('Tab', 'vintech'),
							'hidden-panel' => esc_html__('Hidden Panel', 'vintech'),
							'popup' => esc_html__('Popup', 'vintech'),
							'widget' => esc_html__('Widget Sidebar', 'vintech'),
							'page' => esc_html__('Page', 'vintech'),
							'slider' => esc_html__('Slider', 'vintech'),
						],
						'default' => 'df',
					),
					array(
						'id'    => 'header_type',
						'type'  => 'select',
						'title' => esc_html__('Header Type', 'vintech'),
						'options' => [
							'px-header--default'       	   => esc_html__('Default', 'vintech'), 
							'px-header--transparent'       => esc_html__('Transparent', 'vintech'),
							'px-header--left_sidebar'       => esc_html__('Left Sidebar', 'vintech'),
						],
						'default' => 'px-header--default',
						'indent' => true,
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header' ),
					),

					array(
						'id'    => 'header_mobile_type',
						'type'  => 'select',
						'title' => esc_html__('Header Type', 'vintech'),
						'options' => [
							'px-header--default'       	   => esc_html__('Default', 'vintech'), 
							'px-header--transparent'       => esc_html__('Transparent', 'vintech'),
						],
						'default' => 'px-header--default',
						'indent' => true,
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'header-mobile' ),
					),

					array(
						'id'    => 'hidden_panel_position',
						'type'  => 'select',
						'title' => esc_html__('Hidden Panel Position', 'vintech'),
						'options' => [
							'top'       	   => esc_html__('Top', 'vintech'),
							'right'       	   => esc_html__('Right', 'vintech'),
						],
						'default' => 'right',
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
					),
					array(
						'id'          => 'hidden_panel_height',
						'type'        => 'text',
						'title'       => esc_html__('Hidden Panel Height', 'vintech'),
						'subtitle'       => esc_html__('Enter number.', 'vintech'),
						'transparent' => false,
						'default'     => '',
						'force_output' => true,
						'required' => array( 0 => 'hidden_panel_position', 1 => 'equals', 2 => 'top' ),
					),
					array(
						'id'          => 'hidden_panel_boxcolor',
						'type'        => 'color',
						'title'       => esc_html__('Box Color', 'vintech'),
						'transparent' => false,
						'default'     => '',
						'required' => array( 0 => 'template_type', 1 => 'equals', 2 => 'hidden-panel' ),
					),

					array(
						'id'          => 'header_sidebar_width',
						'type'        => 'slider',
						'title'       => esc_html__('Header Sidebar Width', 'vintech'),
						"default"   => 300,
						"min"       => 50,
						"step"      => 1,
						"max"       => 900,
						'force_output' => true,
						'required' => array( 0 => 'header_type', 1 => 'equals', 2 => 'px-header--left_sidebar' ),
					),

					array(
						'id'          => 'header_sidebar_border',
						'type'        => 'border',
						'title'       => esc_html__('Header Sidebar Border', 'vintech'),
						'force_output' => true,
						'required' => array( 0 => 'header_type', 1 => 'equals', 2 => 'px-header--left_sidebar' ),
						'default' => '',
					),
				),

			],
		]
	],
];

$metabox->add_meta_data( $panels );
}
