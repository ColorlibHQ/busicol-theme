<?php 
// Block direct access
if( !defined( 'ABSPATH' ) ){
	exit( 'Direct script access denied.' );
}
/**
 * @Packge 	   : Busicol
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

	$busicol_reservation_title     = !empty( busicol_opt( 'busicol_reservation_title' ) ) ? busicol_opt( 'busicol_reservation_title' ) : '';
	$busicol_reservation_sub_title = !empty( busicol_opt( 'busicol_reservation_sub_title' ) ) ? busicol_opt( 'busicol_reservation_sub_title' ) : '';
	$busicol_reservation_btn_text  = !empty( busicol_opt( 'busicol_reservation_btn_text' ) ) ? busicol_opt( 'busicol_reservation_btn_text' ) : '';
	$busicol_reservation_btn_url	  = !empty( busicol_opt( 'busicol_reservation_btn_url' ) ) ? busicol_opt( 'busicol_reservation_btn_url' ) : '';
	?>
	<div class="footer_header d-flex justify-content-between">
		<div class="footer_header_left">
			<h3><?php echo esc_html( $busicol_reservation_title )?></h3>
			<p><?php echo esc_html( $busicol_reservation_sub_title )?></p>
		</div>
		<div class="footer_btn">
			<a href="<?php echo esc_url( $busicol_reservation_btn_url )?>" class="boxed-btn2"><?php echo esc_html( $busicol_reservation_btn_text )?></a>
		</div>
	</div>