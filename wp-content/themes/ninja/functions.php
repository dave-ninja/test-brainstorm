<?php

require_once('vendor/autoload.php');
require_once('lib/helper-functions.php');
require_once('lib/post-types.php');
require_once('lib/sidebars.php');
require_once('lib/menus.php');
require_once('BooksController.php');

$blade = TorMorten\View\Blade::create();
$blade->addController('BooksController');


if (!function_exists('setup_theme')) {
	add_action( 'after_setup_theme', 'setup_theme' );
	function setup_theme() {
		load_theme_textdomain( 'ninjadev', get_stylesheet_directory() . '/languages' );

		add_theme_support( 'menus' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'woocommerce' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'blade-templates' );
        include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
        if ( is_plugin_active('advanced-custom-fields-pro/acf.php') ) {
            acf_add_options_page(array(
                'page_title' => 'Theme General Settings',
                'menu_title' => 'Theme Settings',
                'menu_slug' => 'theme-general-settings',
                'capability' => 'edit_posts',
                'redirect' => false
            ));
        }
	}
}

if (!function_exists('enqueue_scripts')) {
	add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
	function enqueue_scripts() {
        global $post;
		wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css', '', false );
		wp_enqueue_style( 'ninja-main', get_bloginfo( 'stylesheet_directory' ) . '/app.css', '', false );
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'ninja-main', get_bloginfo( 'stylesheet_directory' ) . '/app.js', array( 'jquery' ), false, true );
        wp_localize_script( 'ninja-main', 'ajax_params',  [
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'site_url' => site_url(),
            'nonce' => wp_create_nonce('my_repeater_field_nonce'),
            'post_id' =>  $post->ID
        ] );
	}
}

