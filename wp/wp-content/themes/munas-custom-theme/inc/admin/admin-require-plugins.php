<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
get_template_part( 'inc/admin/libs/tgmpa/class-tgm-plugin-activation' );

add_action( 'tgmpa_register', 'vintech_register_required_plugins' );
function vintech_register_required_plugins() {
    include( locate_template( 'inc/admin/demo-data/demo-config.php' ) );
    $pxl_server_info = apply_filters( 'pxl_server_info', ['plugin_url' => 'https://api.casethemes.net/plugins/'] ) ; 
    $default_path = $pxl_server_info['plugin_url'];  
    $images = get_template_directory_uri() . '/inc/admin/assets/img/plugins'; 
    $plugins = array(

        array(
            'name'               => esc_html__('Redux Framework', 'vintech'),
            'slug'               => 'redux-framework',
            'required'           => true,
            'logo'        => $images . '/redux.png',
            'description' => esc_html__( 'Build theme options and post, page options for WordPress Theme.', 'vintech' ),
        ),

        array(
            'name'               => esc_html__('Elementor', 'vintech'),
            'slug'               => 'elementor',
            'required'           => true,
            'logo'        => $images . '/elementor.png',
            'description' => esc_html__( 'Introducing a WordPress website builder, with no limits of design. A website builder that delivers high-end page designs and advanced capabilities', 'vintech' ),
        ),  

        array(
            'name'               => esc_html__('WPC Frequently Bought Together', 'vintech'),
            'slug'               => "woo-bought-together",
            'required'           => false,
            'logo'        => $images . '/bought-together.png',
            'description' => esc_html__( 'WPC Frequently Bought Together is a highly effective plugin developed for assisting online businesses in improving sales and profits through the cross-selling marketing strategy.', 'vintech' ),
        ),

        array(
            'name'               => esc_html__('Case Addons', 'vintech'),
            'slug'               => 'case-addons',
            'source'             => 'case-addons.zip',
            'required'           => true,
            'logo'        => $images . '/case-logo.png',
            'description' => esc_html__( 'Main process and Powerful Elements Plugin, exclusively for Farmas WordPress Theme.', 'vintech' ),
        ),
        array(
            'name'               => esc_html__('Contact Form 7', 'vintech'),
            'slug'               => 'contact-form-7',
            'required'           => true,
            'logo'        => $images . '/contact-f7.png',
            'description' => esc_html__( 'Contact Form 7 can manage multiple contact forms, you can customize the form and the mail contents flexibly with simple markup', 'vintech' ),
        ),
        array(
            'name'               => esc_html__('Revolution Slider', 'vintech'),
            'slug'               => 'revslider',
            'source'             => 'revslider.zip',
            'required'           => false,
            'logo'        => $images . '/rev-slider.png',
            'description' => esc_html__( 'Revolution Slider helps beginner-and mid-level designers WOW their clients with pro-level visuals.', 'vintech' )
        ),
        array(
            'name'               => esc_html__('Plugin WooCommerce', 'vintech'),
            'slug'               => "woocommerce",
            'required'           => true,
            'logo'        => $images . '/woo.png',
            'description' => esc_html__( 'WooCommerce is the world’s most popular open-source eCommerce solution.', 'vintech' ),
        ),

        array(
            'name'               => esc_html__('WPC Compare', 'vintech'),
            'slug'               => "woo-smart-compare",
            'required'           => false, 
            'logo'        => $images . '/woo-smart-compare.png',
            'description' => esc_html__( 'WPC Smart Compare allows users to get a quick look of products without opening the product page.', 'vintech' ),
        ),
        array(
            'name'               => esc_html__('Wishlist', 'vintech'),
            'slug'               => "woo-smart-wishlist",
            'required'           => false,
            'logo'        => $images . '/woo-smart-wishlist.png',
            'description' => esc_html__( 'WPC Smart Wishlist is a simple but powerful tool that can help your customer save products for buying later.', 'vintech' ),
        ),
    );
$config = array(
        'default_path' => $default_path,           // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'is_automatic' => true,
    );

tgmpa( $plugins, $config );
}