<?php

if (!function_exists('register_menus')) {
	add_action( 'after_setup_theme', 'register_menus' );
	function register_menus() {
		register_nav_menu( 'main-menu-left', __( 'Main Menu Left', 'ninjadev' ) );
		register_nav_menu( 'main-menu-right', __( 'Main Menu Right', 'ninjadev' ) );
		register_nav_menu( 'footer-menu-1', __( 'Footer Menu 1', 'ninjadev' ) );
		register_nav_menu( 'footer-menu-2', __( 'Footer Menu 2', 'ninjadev' ) );
	}
}