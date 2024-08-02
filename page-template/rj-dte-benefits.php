<?php
/*
* Template Name: DTE Benefits
*
*
* @package astra-child
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header(); ?>


<div class="rj-benefits-vif" style="height: 30vh; background-color: #91c647;">
    <div class="enroll-box">
        <h3>
            Welcome to your Down to Earth Benefits
        </h3>
        <a href="http://www.dayforcehcm.com" target="_blank">
            Click to Enroll
        </a>
    </div>
</div>
<main class="rj-main">



    <div class="container">
    <h1 class="rj-main-heading">About Your Benefits</h1> 

    <div class="row">

       <?php
            $rj_benfits_paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $rj_benefits_args = array(
                'paged' => $rj_benfits_paged,
                'post_type' => 'dte_benefits',
                // 'posts_per_page' => 9, // Add this line to set number of posts per page
                'tax_query' => array(
                    array(
                        'taxonomy' => 'language', 
                        'terms' => 'english',
                        'field' => 'slug',
                    )
                ),
            );
            $rj_benfits_query = new WP_Query($rj_benefits_args);

            while ($rj_benfits_query->have_posts()) :
                $rj_benfits_query->the_post(); ?>
            
            <article class="col-lg-4 col-md-6 mb-4">
                <div class="rj-post-container">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>" 
                            alt="<?php echo esc_attr($image_alt ?: get_the_title()); ?>" 
                            title="<?php echo esc_attr($image_title ?: get_the_title()); ?>"
                            class="post-thumb">
                    <?php endif; ?>

                    
                    <div class="rj-post-content">                                   
                        <h2>
                            <?php echo get_the_title(); ?>
                        </h2>  

                        <p class="rj-post-desc"><?php echo get_the_content(); ?></p>    
                        
                        <?php if(get_post_meta($post->ID, 'button_text', true ) !=''){ ?>
                        <!-- <a href="<?php //echo esc_url(get_post_meta($post->ID, '_pdf_url', true )); ?>" target="_blank"> -->
                        <a href="<?php echo esc_url(get_the_permalink()); ?>" class="rj-read-more">
                                <?php echo esc_html(get_post_meta($post->ID, 'button_text', true )); ?>
                        </a>
                        <?php } ?>
                    </div>
                </div>
            </article>

          <?php endwhile; ?>

        </div>
    </div>
</main>

<?php get_footer(); 