<?php

if( !defined( 'ABSPATH' ) )
	exit; 

class Vintech_Admin_Templates extends Vintech_Base{

	public function __construct() {
		$this->add_action( 'admin_menu', 'register_page', 20 );
	}
 
	public function register_page() {
		add_submenu_page(
			'pxlart',
		    esc_html__( 'Templates', 'vintech' ),
		    esc_html__( 'Templates', 'vintech' ),
		    'manage_options',
		    'edit.php?post_type=pxl-template',
		    false
		);
	}
}
new Vintech_Admin_Templates;
