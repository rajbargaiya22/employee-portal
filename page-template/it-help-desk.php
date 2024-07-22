<?php
/*
* Template Name: IT Help Desk
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
       <h1>IT Help Desk</h1> 
        <div class="row">
            <div class="col-md-8">
                <h2>
                    <?php echo esc_html(get_theme_mod('rj_employee_portal_help_desk_subhead', 'Need It Support? Please contact the IT Helpdesk')); ?>
                </h2>

                <p>
                    <span><?php echo esc_html(get_theme_mod('rj_employee_portal_help_desk_contact_text', 'Phone')); ?></span>
                    <a href="tel:<?php echo esc_attr(get_theme_mod('rj_employee_portal_help_desk_contact_num', '877-584-6093')); ?>">
                        <?php echo esc_html(get_theme_mod('rj_employee_portal_help_desk_contact_num', '877-584-6093')); ?>
                    </a>
                </p>

                <p>
                    <?php echo esc_html(get_theme_mod('rj_employee_portal_help_desk_text', 'Option 2 for support, then 1 for IT support')); ?>
                </p>

                <p>
                    <span><?php echo esc_html(get_theme_mod('rj_employee_portal_help_desk_mail_text', 'Email')); ?></span>
                    <a href="mailto:<?php echo esc_attr(get_theme_mod('rj_employee_portal_help_desk_mail', 'support@spar.com')); ?>">
                        <?php echo esc_html(get_theme_mod('rj_employee_portal_help_desk_mail', 'support@spar.com')); ?>
                    </a>
                </p>

                <p>
                    <?php echo esc_html(get_theme_mod('rj_employee_portal_help_desk_person', 'Henry Grablewski')); ?>
                </p>
                <p>
                    <?php echo esc_html(get_theme_mod('rj_employee_portal_help_desk_person_designation', 'Down To Earth Director of IT')); ?>
                </p>

                <p>
                    <span><?php echo esc_html(get_theme_mod('rj_employee_portal_help_desk_office_contact_text', 'Phone')); ?></span>
                    <a href="tel:<?php echo esc_attr(get_theme_mod('rj_employee_portal_help_desk_office_contact_num', '– 407-637-7355')); ?>">
                        <?php echo esc_html(get_theme_mod('rj_employee_portal_help_desk_office_contact_num', '– 407-637-7355')); ?>
                    </a>
                </p>
               
                <p>
                    <span><?php echo esc_html(get_theme_mod('rj_employee_portal_help_desk_mobile_contact_text', 'Mobile')); ?></span>
                    <a href="tel:<?php echo esc_attr(get_theme_mod('rj_employee_portal_help_desk_mobile_contact_num', '– 689-500-8765')); ?>">
                        <?php echo esc_html(get_theme_mod('rj_employee_portal_help_desk_mobile_contact_num', '– 689-500-8765')); ?>
                    </a>
                </p>

                <a href="http://maps.google.com/maps?q=<?php echo esc_attr(get_theme_mod('rj_employee_portal_help_desk_address', '2701 Maitland Center PKWY, Suite 200 Maitland, Florida 32751')); ?>" target="_blank">
                    <?php echo esc_html(get_theme_mod('rj_employee_portal_help_desk_address', '2701 Maitland Center PKWY, Suite 200 Maitland, Florida 32751')); ?>
                </a>


            </div>
            <div class="col-md-4">

            </div>
        </div>
       
       

    </div>
</main>

<?php get_footer(); 