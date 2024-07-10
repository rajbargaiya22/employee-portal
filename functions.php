<?php
function rj_enqueue_styles() {

   wp_enqueue_style( 'rj-parent-style', get_template_directory_uri() . '/style.css' );

   wp_enqueue_style( 'child-style',  get_stylesheet_directory_uri() . '/style.css',  array('rj-parent-style'),  wp_get_theme()->get('Version') 
    );
}

add_action( 'wp_enqueue_scripts', 'rj_enqueue_styles' );
