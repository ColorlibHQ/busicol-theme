<?php 
// Block direct access
if( !defined( 'ABSPATH' ) ){
	exit( 'Direct script access denied.' );
}
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 

	//  Call Header
	get_header();

	/**
	 * 404 page
	 * @Hook busicol_fof
	 * @Hooked busicol_fof_cb
	 *
	 */

	do_action( 'busicol_fof' );

	 // Call Footer
	 get_footer();
?>