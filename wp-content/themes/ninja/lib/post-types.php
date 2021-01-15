<?php

if (!function_exists('register_p_types')) {
	add_action('init', 'register_p_types');
	function register_p_types() {
		register_post_type(
			'_newsletter',
			array(
				'labels'             => array(
					'name'               => _x( 'Newsletter', 'post type general name', 'adm' ),
					'singular_name'      => _x( 'Newsletter', 'post type singular name', 'adm' ),
					'menu_name'          => _x( 'Newsletters', 'admin menu', 'adm' ),
					'name_admin_bar'     => _x( 'Newsletter', 'add new on admin bar', 'adm' ),
					'add_new'            => _x( 'Add New', 'newsletter', 'adm' ),
					'add_new_item'       => __( 'Add New Newsletter', 'adm' ),
					'new_item'           => __( 'New Newsletter', 'adm' ),
					'edit_item'          => __( 'Edit Newsletter', 'adm' ),
					'view_item'          => __( 'View Newsletter', 'adm' ),
					'all_items'          => __( 'All Newsletters', 'adm' ),
					'search_items'       => __( 'Search Newsletters', 'adm' ),
					'parent_item_colon'  => __( 'Parent Newsletter:', 'adm' ),
					'not_found'          => __( 'No Newsletters found.', 'adm' ),
					'not_found_in_trash' => __( 'No Newsletters found in Trash.', 'adm' )
				),
				'description'        => __( 'Description.', 'adm' ),
				'public'             => false,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'show_in_rest'		 => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'newsletters' ),
				'capability_type'    => 'post',
				'has_archive'        => false,
				'hierarchical'       => true,
				'menu_position'      => null,
                'menu_icon'          => 'dashicons-email-alt',
				'supports'           => array( 'title', 'editor', 'page-attributes' )
			)
		);

		/*register_post_type(
			'_product',
			array(
				'labels'             => array(
					'name'               => _x( 'Products', 'post type general name', 'adm' ),
					'singular_name'      => _x( 'Product', 'post type singular name', 'adm' ),
					'menu_name'          => _x( 'Products', 'admin menu', 'adm' ),
					'name_admin_bar'     => _x( 'Product', 'add new on admin bar', 'adm' ),
					'add_new'            => _x( 'Add New', 'product', 'adm' ),
					'add_new_item'       => __( 'Add New Product', 'adm' ),
					'new_item'           => __( 'New Product', 'adm' ),
					'edit_item'          => __( 'Edit Product', 'adm' ),
					'view_item'          => __( 'View Product', 'adm' ),
					'all_items'          => __( 'All Products', 'adm' ),
					'search_items'       => __( 'Search Products', 'adm' ),
					'parent_item_colon'  => __( 'Parent Products:', 'adm' ),
					'not_found'          => __( 'No products found.', 'adm' ),
					'not_found_in_trash' => __( 'No products found in Trash.', 'adm' )
				),
				'description'        => __( 'Description.', 'adm' ),
				'public'             => false,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'show_in_rest'		 => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'products' ),
				'capability_type'    => 'post',
				'has_archive'        => false,
				'hierarchical'       => true,
				'menu_position'      => null,
				'supports'           => array( 'title', 'editor', 'page-attributes' )
			)
		);*/

		/*register_taxonomy(
			'service-category',
			'service',
			array(
				'hierarchical'      => true,
				'labels'            => array(
					'name'              => _x( 'Categories', 'taxonomy general name', 'adm' ),
					'singular_name'     => _x( 'Category', 'taxonomy singular name', 'adm' ),
					'search_items'      => __( 'Search Categories', 'adm' ),
					'all_items'         => __( 'All Categories', 'adm' ),
					'parent_item'       => __( 'Parent Category', 'adm' ),
					'parent_item_colon' => __( 'Parent Category:', 'adm' ),
					'edit_item'         => __( 'Edit Category', 'adm' ),
					'update_item'       => __( 'Update Category', 'adm' ),
					'add_new_item'      => __( 'Add New Category', 'adm' ),
					'new_item_name'     => __( 'New Category', 'adm' ),
					'menu_name'         => __( 'Categories', 'adm' )
				),
				'public'            => false,
				'publicly_queryable' => true,
				'show_in_nav_menus' => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'query_var'         => true,
				'rewrite'           => array(
					'slug' => 'service-categories'
				)
			)
		);*/
	}
}