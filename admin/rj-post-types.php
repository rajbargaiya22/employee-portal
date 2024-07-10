<?php 
// $post_types = array(
//     'HR Benefits' => array('rj-hr-links'),
//     'Company Newsletter' => array(''),
//     'Safety Policy' => array(''),
//     'IT Help Desk' => array(''),
// )    

$post_types = array( 'HR Benefits', 'Company Newsletter', 'Safety Policy',  'IT Help Desk' );

function rj_employee_portal_posts_init() {

    foreach ($variable as $key => $value) {
        # code...
    }

	$labels = array(
		'name'                  => _x( 'Books', 'Post type general name', 'astra-child' ),
		'singular_name'         => _x( 'Book', 'Post type singular name', 'astra-child' ),
		'menu_name'             => _x( 'Books', 'Admin Menu text', 'astra-child' ),
		'name_admin_bar'        => _x( 'Book', 'Add New on Toolbar', 'astra-child' ),
		'add_new'               => __( 'Add New', 'astra-child' ),
		'add_new_item'          => __( 'Add New Book', 'astra-child' ),
		'new_item'              => __( 'New Book', 'astra-child' ),
		'edit_item'             => __( 'Edit Book', 'astra-child' ),
		'view_item'             => __( 'View Book', 'astra-child' ),
		'all_items'             => __( 'All Books', 'astra-child' ),
		'search_items'          => __( 'Search Books', 'astra-child' ),
		'parent_item_colon'     => __( 'Parent Books:', 'astra-child' ),
		'not_found'             => __( 'No books found.', 'astra-child' ),
		'not_found_in_trash'    => __( 'No books found in Trash.', 'astra-child' ),
		'featured_image'        => _x( 'Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'astra-child' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'astra-child' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'astra-child' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'astra-child' ),
		'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'astra-child' ),
		'insert_into_item'      => _x( 'Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'astra-child' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'astra-child' ),
		'filter_items_list'     => _x( 'Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'astra-child' ),
		'items_list_navigation' => _x( 'Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'astra-child' ),
		'items_list'            => _x( 'Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'astra-child' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
	);

	register_post_type( 'book', $args );
}

add_action( 'init', 'rj_employee_portal_posts_init' );
