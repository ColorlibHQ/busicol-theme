<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package busicol
 */

get_header();
$benifits        = ! empty( busicol_meta( 'benifits') ) ? busicol_meta( 'benifits') : 'N/A';
$trainer_name    = ! empty( busicol_meta( 'trainer_name') ) ? busicol_meta( 'trainer_name') : 'N/A';
$course_fee      = ! empty( busicol_meta( 'course_fee') ) ? busicol_meta( 'course_fee') : 'N/A';
$available_seats = ! empty( busicol_meta( 'available_seats') ) ? busicol_meta( 'available_seats') : 'N/A';
$schedule_time   = ! empty( busicol_meta( 'schedule_time') ) ? busicol_meta( 'schedule_time') : 'N/A';
$enroll_url      = ! empty( busicol_meta( 'enroll_url') ) ? busicol_meta( 'enroll_url') : '#';

if( have_posts() ) {
    while( have_posts() ) : the_post();
    ?>
    <!-- cource details part here -->
    <section class="cource_details section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7">
                    <div class="cource_details_content">
                        <div class="single_cource_details">
                            <h4><?php the_title()?></h4>
                            <?php the_content()?>
                        </div>
                        <div class="single_cource_details">
                            <h4><?php echo esc_html( 'Benifits', 'busicol' );?></h4>
                            <p><?php echo esc_html( $benifits )?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-5">
                    <div class="cource_details_sidebar">
                        <div class="single_cource_details_sidebar">
                            <p><?php echo esc_html( 'Trainer’s Name', 'busicol' );?></p>
                            <span><?php echo esc_html( $trainer_name );?></span>
                        </div>
                        <div class="single_cource_details_sidebar">
                            <p><?php echo esc_html( 'Course Fee', 'busicol' );?></p>
                            <span><?php echo esc_html( $course_fee );?></span>
                        </div>
                        <div class="single_cource_details_sidebar">
                            <p><?php echo esc_html( 'Available Seats', 'busicol' );?></p>
                            <span><?php echo esc_html( $available_seats );?></span>
                        </div>
                        <div class="single_cource_details_sidebar">
                            <p><?php echo esc_html( 'Schedule', 'busicol' );?></p>
                            <span><?php echo esc_html( $schedule_time );?></span>
                        </div>
                        <a href="<?php echo esc_url( $enroll_url );?>" class="btn_1"><?php echo esc_html( 'Enroll the Course', 'busicol' );?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cource details part end -->
    <?php 
    endwhile;
}

// Footer============
get_footer();