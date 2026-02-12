<?php
/**
 * Future Point One child theme functions.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'FPO_CHILD_VERSION', '1.0.0' );
define( 'FPO_CHILD_DIR', get_stylesheet_directory() );
define( 'FPO_CHILD_URI', get_stylesheet_directory_uri() );

function fpo_asset_version( $relative_path ) {
    if ( defined( 'WP_DEBUG' ) && WP_DEBUG && defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
        $full_path = FPO_CHILD_DIR . $relative_path;
        if ( file_exists( $full_path ) ) {
            return filemtime( $full_path );
        }
    }

    return FPO_CHILD_VERSION;
}

function fpo_enqueue_assets() {
    wp_enqueue_style(
        'futurepointone-style',
        get_stylesheet_uri(),
        array( 'pxl-style' ),
        fpo_asset_version( '/style.css' )
    );

    wp_enqueue_style(
        'fpo-custom-style',
        FPO_CHILD_URI . '/assets/css/custom.css',
        array( 'futurepointone-style' ),
        fpo_asset_version( '/assets/css/custom.css' )
    );

    wp_enqueue_script(
        'fpo-custom-script',
        FPO_CHILD_URI . '/assets/js/custom.js',
        array( 'jquery', 'pxl-main' ),
        fpo_asset_version( '/assets/js/custom.js' ),
        true
    );
}
add_action( 'wp_enqueue_scripts', 'fpo_enqueue_assets', 20 );

/**
 * Keep CaseThemes demo API compatibility after parent theme folder rename.
 *
 * The vendor API expects the original purchased slug ("vintech"), while the
 * local parent theme folder is renamed to "munas-custom-theme" per SOP.
 */
function fpo_force_vendor_demo_slug( $item ) {
    return 'vintech';
}
add_filter( 'pxl_demo_item_download', 'fpo_force_vendor_demo_slug' );
