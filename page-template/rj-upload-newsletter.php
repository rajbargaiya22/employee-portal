<?php
/*
 * Template Name: Upload Newsletter
 *
 * @package astra-child
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();


if (is_user_logged_in()) { ?>

<div id="upload-newsletter" class="rj-main">
        <div class="container">
        <h1 class="rj-main-heading">Upload Newsletter</h1>
    

        <form id="frontend-post-form" method="post" enctype="multipart/form-data">
            <input type="text" name="post_title" placeholder="Post Title" required>
            <textarea name="post_content" placeholder="Post Content" required></textarea>
            <input type="file" name="post_images[]" accept="image/*" multiple>
            <input type="submit" value="Submit Post">
            <?php wp_nonce_field('frontend_post_nonce', 'frontend_post_nonce_field'); ?>
        </form>

</div>
</div>

<?php } ?>

<?php get_footer(); ?>