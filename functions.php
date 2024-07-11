<?php
function rj_enqueue_styles() {

   wp_enqueue_style( 'rj-parent-style', get_template_directory_uri() . '/style.css' );
   wp_enqueue_style( 'child-style',  get_stylesheet_directory_uri() . '/style.css',  array('rj-parent-style'),  wp_get_theme()->get('Version') 
    );

    wp_enqueue_style( 'rj-bootstrap', get_stylesheet_directory_uri(). '/assets/css/bootstrap.css' );
    wp_enqueue_script('rj-bootstrap-js', get_stylesheet_directory_uri(). '/assets/js/bootstrap.js', false, false);
}

add_action( 'wp_enqueue_scripts', 'rj_enqueue_styles' );


require get_stylesheet_directory() . "/admin/rj-post-types.php";

