<?php 
  

// $post_types = array( 'HR Benefits', 'Company Newsletter', 'Safety Policy',  'IT Help Desk' );

function rj_employee_portal_posts_init() {

	$post_types = array(
		'HR Benefits' => array(
								'HR Benefit', // singular name
								'HR Benefits' // plural name
							),
	
		'Company Newsletter' => 
						 array(
							'Company Newsletter',
							'Company Newsletters',
						),
		'Safety Policy' => 
						array(
							'Safety Policy',
							'Safety Policies',
						),
		'IT Help Desk' => 
						array(
							'IT Help Desk',
							'IT Help Desk',
						),
	); 
	
	foreach ($post_types as $menu_name => $post_details) {
		
		$labels = array(
			'name'                  => _x( $menu_name, 'Post type general name', 'astra-child' ),
			'singular_name'         => _x( $post_details[0], 'Post type singular name', 'astra-child' ),
			'menu_name'             => _x( $menu_name, 'Admin Menu text', 'astra-child' ),
			'name_admin_bar'        => _x( $post_details[0], 'Add New on Toolbar', 'astra-child' ),
			'add_new'               => __( 'Add New', 'astra-child' ),
			'add_new_item'          => __( 'Add New '.$post_details[0], 'astra-child' ),
			'new_item'              => __( 'New '.$post_details[0], 'astra-child' ),
			'edit_item'             => __( 'Edit '.$post_details[0], 'astra-child' ),
			'view_item'             => __( 'View ' .$post_details[0], 'astra-child' ),
			'all_items'             => __( 'All ' . $post_details[1], 'astra-child' ),
			'search_items'          => __( 'Search '.$post_details[1], 'astra-child' ),
			'parent_item_colon'     => __( 'Parent '.$post_details[1].' :', 'astra-child' ),
			'not_found'             => __( 'No'.$post_details[1].' found.', 'astra-child' ),
			'not_found_in_trash'    => __( 'No'.$post_details[1].' found in Trash.', 'astra-child' ),
			'featured_image'        => _x( $post_details[0].' Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'astra-child' ),
			'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'astra-child' ),
			'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'astra-child' ),
			'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'astra-child' ),
			'archives'              => _x( $post_details[0] .' archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'astra-child' ),
			'insert_into_item'      => _x( 'Insert into '.$post_details[0], 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'astra-child' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this '.$post_details[0], 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'astra-child' ),
			'filter_items_list'     => _x( 'Filter '.$post_details[0].' list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'astra-child' ),
			'items_list_navigation' => _x( $post_details[1] .' list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'astra-child' ),
			'items_list'            => _x( $post_details[1] .' list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'astra-child' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => strtolower(str_replace(' ', '_', $menu_name)) ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
		);

		register_post_type( strtolower(str_replace(' ', '_', $menu_name)), $args );

	}
}

add_action( 'init', 'rj_employee_portal_posts_init' );
