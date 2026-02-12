<?php
/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets.
 *
 * @package Case-Themes
 * @since Vintech 1.0
 */

if(!defined('DEV_MODE')){ define('DEV_MODE', true); }

if(!defined('THEME_DEV_MODE_ELEMENTS') && is_user_logged_in()){
    define('THEME_DEV_MODE_ELEMENTS', true);
}
 
require_once get_template_directory() . '/inc/classes/class-main.php';
    
if ( is_admin() ){ 
	require_once get_template_directory() . '/inc/admin/admin-init.php'; }
 
/**
 * Theme Require
*/
vintech()->require_folder('inc');
vintech()->require_folder('inc/classes');
vintech()->require_folder('inc/theme-options');
vintech()->require_folder('template-parts/widgets');
if(class_exists('Woocommerce')){
    vintech()->require_folder('woocommerce');
}

// Elementor Preview CSS / JS
add_action( 'elementor/preview/enqueue_styles', function() {

    wp_enqueue_script(
        'theme-editor',
        get_template_directory_uri() . '/assets/js/custom-elementor-button.js',
        ['elementor-frontend'],
        null, 
        true  
    );

    wp_enqueue_script( 'tsparticles' );
} );




