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

<main>
    <div class="container">
        <h1>
            <?php echo esc_html(get_the_title()); ?>
        </h1>
    </div>

</main>
<?php get_footer(); 