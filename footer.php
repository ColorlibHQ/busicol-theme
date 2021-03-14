<?php 
/**
 * @Packge     : Busicol
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
    // Block direct access
    if( !defined( 'ABSPATH' ) ){
        exit( 'Direct script access denied.' );
    }

        /**
         * Footer Area
         *
         * @Footer
         * @Back To Top Button
         *
         * @Hook busicol_footer
         *
         * @Hooked  busicol_footer_area 
         *
         */

		do_action( 'busicol_footer' );

	wp_footer(); 
 ?>
</body>
</html>