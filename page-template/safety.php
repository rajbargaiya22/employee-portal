<?php
/*
 * Template Name: Safety Policy
 *
 * @package astra-child
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$user = wp_get_current_user();
$allowed_roles = array('regionals', 'branch_managers', 'office_managers', 'accounting', 'administrator');

if (is_user_logged_in() && array_intersect($allowed_roles, (array) $user->roles)) {
    ?>
    <div id="rj-safety" class="w-100" style="flex-basis: 100%">
        <div class="container">
            <h1>Safety</h1>
            
            <?php
            $rj_newsletter_paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $rj_bookmarks_args = array(
                'paged' => $rj_newsletter_paged,
                'post_type' => 'safety_policy',
                'posts_per_page' => 9, // Add this line to set number of posts per page
            );
            $rj_newsletter_query = new WP_Query($rj_bookmarks_args);

            if ($rj_newsletter_query->have_posts()) : ?>
                <div class="row">
                    <?php while ($rj_newsletter_query->have_posts()) :
                        $rj_newsletter_query->the_post();
                        $image_id = get_post_thumbnail_id();
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                        $image_title = get_the_title($image_id);
                        ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="rj-post-container">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" 
                                         alt="<?php echo esc_attr($image_alt ?: get_the_title()); ?>" 
                                         title="<?php echo esc_attr($image_title ?: get_the_title()); ?>">
                                <?php endif; ?>
                                <div class="px-2 py-3">                                  
                                    <h2><?php the_title(); ?></h2>    
                                    <p class="rj-post-date mb-0"><?php echo get_the_date(); ?></p>
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="rj-post-navigation">
                    <?php
                    echo paginate_links(array(
                        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                        'format' => 'paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $rj_newsletter_query->max_num_pages
                    ));
                    ?>
                </div>
            <?php else : ?>
                <h3><?php esc_html_e('No posts found', 'rj-bookmarks'); ?></h3>
            <?php 
            endif; 
            wp_reset_postdata();
            ?>
        </div>
    </div>
    <?php
} else {
    if (!is_user_logged_in()) {
        $args = array(
            'redirect' => home_url($_SERVER['REQUEST_URI']),
            'form_id' => 'loginform-custom',
            'label_username' => __('Username'),
            'label_password' => __('Password'),
            'label_remember' => __('Remember Me'),
            'label_log_in' => __('Log In'),
            'remember' => true
        );
        wp_login_form($args);
    } else {
        echo '<p>You do not have permission to view this page.</p>';
    }
}

get_footer();