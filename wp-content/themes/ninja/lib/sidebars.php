<?php

if (!function_exists('setup_widgets')) {
	function setup_widgets() {
		register_sidebar( array(
				'name'          => __( 'Main Sidebar', 'ninja' ),
				'id'            => 'sidebar-main',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
			) );
		register_sidebar( array(
				'name'          => __( 'Left Sidebar', 'ninja' ),
				'id'            => 'sidebar-left',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
			) );
		register_sidebar( array(
				'name'          => __( 'Right Sidebar', 'ninja' ),
				'id'            => 'sidebar-right',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
			) );
		register_sidebar( array(
				'name'          => __( 'Footer Sidebar 1', 'ninja' ),
				'id'            => 'sidebar-footer-1',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
			) );
		register_sidebar( array(
				'name'          => __( 'Footer Sidebar 2', 'ninja' ),
				'id'            => 'sidebar-footer-2',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
			) );
		register_sidebar( array(
				'name'          => __( 'Footer Sidebar 3', 'ninja' ),
				'id'            => 'sidebar-footer-3',
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2>',
				'after_title'   => '</h2>',
			) );
	}

	add_action( 'widgets_init', 'setup_widgets' );
}