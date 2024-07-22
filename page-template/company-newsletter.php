<?php
/*
* Template Name: Company Newsletter
*
*
* @package astra-child
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header(); ?>


<div id="rj-newsletter">
	<div class="container">
        <h1>Company Newsletter</h1>
    	<div class="">
				<?php if ( have_posts() ) :
		      $rj_newsletter_paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
					$rj_bookmarks_args = array(
						'paged' => $rj_newsletter_paged,
                        'post_type' => 'company_newsletter',
					);
					$rj_newsletter_query = new WP_Query( $rj_bookmarks_args );
					while($rj_newsletter_query->have_posts()) :
					   $rj_newsletter_query->the_post();
						 ?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="rj-post-container">
                            <?php $image_id = get_post_thumbnail_id();
                            $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', TRUE);
                            $image_title = get_the_title($image_id); ?>
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url( get_the_ID(), 'medium' )); ?>" alt="<?php echo esc_attr(($image_alt) ? $image_alt : get_the_title() ); ?>" title="<?php echo esc_attr(($image_title) ? $image_title : get_the_title() ); ?>">

                            <div class="px-2 py-3">                                   
                                <h2><?php echo get_the_title(); ?></h2>    
                                <p class="rj-post-date mb-0"><?php echo get_the_date(); ?></p>
                                <p><?php echo get_the_content(); ?></p>    
                                
                            </div>
                        </div>
                    </div>
            <?php endwhile; wp_reset_postdata(); ?>
					</div>
					<div class="rj-post-navigation">
						<?php
							$big = 999999999;
							echo paginate_links( array(
								'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
								'format' => 'paged=%#%',
								'current' =>  (get_query_var('paged') ? get_query_var('paged') : 1),
								'total' => $rj_newsletter_query->max_num_pages
							) );
						?>
					</div>
			<?php else : ?>
				<h3><?php esc_html_e('No posts found','rj-bookmarks'); ?></h3>
			<?php endif; ?>
	</div>
</div>

<?php get_footer(); 