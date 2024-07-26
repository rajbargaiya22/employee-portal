<?php
function rj_enqueue_styles() {

   wp_enqueue_style( 'rj-parent-style', get_template_directory_uri() . '/style.css' );
   wp_enqueue_style( 'child-style',  get_stylesheet_directory_uri() . '/style.css',  array('rj-parent-style'),  wp_get_theme()->get('Version') 
    );
    
    wp_enqueue_style( 'rj-bootstrap', get_stylesheet_directory_uri(). '/assets/css/bootstrap.css' );
    wp_enqueue_style( 'rj-slick-css',  get_stylesheet_directory_uri() . '/assets/css/slick-theme.css' );

    wp_enqueue_script('rj-bootstrap-js', get_stylesheet_directory_uri(). '/assets/js/bootstrap.js', false, false);
    wp_enqueue_script('rj-slick-js', get_stylesheet_directory_uri(). '/assets/js/slick.min.js', array('jquery'), false, false);

    // wp_enqueue_script('pdf-js', 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js', array(), '2.9.359', true);
    // wp_enqueue_script('pdf-worker-js', 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.worker.min.js', array('pdf-js'), '2.9.359', true);
    // wp_enqueue_script('pdf-viewer', get_template_directory_uri() . '/js/pdf-viewer.js', array('pdf-js'), '1.0', true);
    


    wp_enqueue_script('rj-custom-js', get_stylesheet_directory_uri() . '/assets/js/rj-custom.js', array('jquery'), '1.0', true);
    wp_localize_script('rj-custom-js', 'ajaxurl', admin_url('admin-ajax.php'));
    
    

}

add_action( 'wp_enqueue_scripts', 'rj_enqueue_styles' );


function rj_admin_enquee_styles(){
    wp_enqueue_style( 'rj-admin-style', get_stylesheet_directory_uri(). '/admin/admin-style.css' );
    wp_enqueue_media();
    wp_enqueue_script('rj-admin-js', get_stylesheet_directory_uri() . '/admin/assets/js/admin-js.js', array('jquery'), null, true);
}
add_action( 'admin_enqueue_scripts', 'rj_admin_enquee_styles' );



require get_stylesheet_directory() . "/admin/rj-post-types.php";
require get_stylesheet_directory() . "/admin/rj-custom-roles.php";
require get_stylesheet_directory() . "/admin/rj-company-newsletter-image-box.php";
require get_stylesheet_directory() . "/admin/rj-new-vendor-meta-box.php";


function get_search_suggestions() {
    $query = sanitize_text_field($_POST['query']);
    
    // Get all public post types
    $post_types = get_post_types(array('public' => true));
    
    $results = array();
    
    foreach ($post_types as $post_type) {
        $args = array(
            's' => $query,
            'post_type' => $post_type,
            'posts_per_page' => -1 // Get all matching posts
        );
        
        $search_query = new WP_Query($args);
        
        if ($search_query->have_posts()) {
            $results[$post_type] = array();
            while ($search_query->have_posts()) {
                $search_query->the_post();
                $results[$post_type][] = array(
                    'title' => get_the_title(),
                    'url' => get_permalink(),
                    'excerpt' => wp_trim_words(get_the_excerpt(), 20)
                );
            }
            wp_reset_postdata();
        }
    }
    
    if (!empty($results)) {
        wp_send_json_success($results);
    } else {
        wp_send_json_error('No results found');
    }
}
add_action('wp_ajax_get_search_suggestions', 'get_search_suggestions');
add_action('wp_ajax_nopriv_get_search_suggestions', 'get_search_suggestions');
  


