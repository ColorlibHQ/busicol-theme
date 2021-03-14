<?php 
/**
 * @Packge     : Busicol
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 * Customizer panels and sections
 *
 */

/***********************************
 * Register customizer panels
 ***********************************/

$panels = array(
    /**
     * Theme Options Panel
     */
    array(
        'id'   => 'busicol_theme_options_panel',
        'args' => array(
            'priority'       => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => esc_html__( 'Theme Options', 'busicol' ),
        ),
    )
);


/***********************************
 * Register customizer sections
 ***********************************/


$sections = array(

    /**
     * General Section
     */
    array(
        'id'   => 'busicol_general_section',
        'args' => array(
            'title'    => esc_html__( 'General', 'busicol' ),
            'panel'    => 'busicol_theme_options_panel',
            'priority' => 1,
        ),
    ),

    /**
     * Social Profiles Section
     */
    array(
        'id'   => 'busicol_social_section',
        'args' => array(
            'title'    => esc_html__( 'Social Profiles', 'busicol' ),
            'panel'    => 'busicol_theme_options_panel',
            'priority' => 2,
        ),
    ),
    
    /**
     * Header Section
     */
    array(
        'id'   => 'busicol_header_section',
        'args' => array(
            'title'    => esc_html__( 'Header', 'busicol' ),
            'panel'    => 'busicol_theme_options_panel',
            'priority' => 3,
        ),
    ),

    /**
     * Blog Section
     */
    array(
        'id'   => 'busicol_blog_section',
        'args' => array(
            'title'    => esc_html__( 'Blog', 'busicol' ),
            'panel'    => 'busicol_theme_options_panel',
            'priority' => 4,
        ),
    ),

    /**
     * Reservation Section
     */
    array(
        'id'   => 'busicol_reservation_section',
        'args' => array(
            'title'    => esc_html__( 'Reservation or Query Settings', 'busicol' ),
            'panel'    => 'busicol_theme_options_panel',
            'priority' => 5,
        ),
    ),

    /**
     * Instagram Section
     */
    array(
        'id'   => 'busicol_instagram_section',
        'args' => array(
            'title'    => esc_html__( 'Instagram Settings', 'busicol' ),
            'panel'    => 'busicol_theme_options_panel',
            'priority' => 6,
        ),
    ),


    /**
     * 404 Page Section
     */
    array(
        'id'   => 'busicol_fof_section',
        'args' => array(
            'title'    => esc_html__( '404 Page', 'busicol' ),
            'panel'    => 'busicol_theme_options_panel',
            'priority' => 7,
        ),
    ),

    /**
     * Footer Section
     */
    array(
        'id'   => 'busicol_footer_section',
        'args' => array(
            'title'    => esc_html__( 'Footer Page', 'busicol' ),
            'panel'    => 'busicol_theme_options_panel',
            'priority' => 8,
        ),
    ),



);


/***********************************
 * Add customizer elements
 ***********************************/
$collection = array(
    'panel'   => $panels,
    'section' => $sections,
);

Epsilon_Customizer::add_multiple( $collection );

?>