<?php 
// Block direct access
if( !defined( 'ABSPATH' ) ){
	exit( 'Direct script access denied.' );
}
/**
 * @Packge     : Busicol
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
?>
<div class="col-sm-12 text-center">
	<h1 class="blog-item-title p-b-30"><?php esc_html_e( 'Nothing Found', 'busicol' ); ?></h1>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	    <p><?php echo sprintf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'busicol' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

	<?php elseif ( is_search() ) : ?>
		
	    <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'busicol' ); ?></p>
	    	<div class="row content-none-search">
				<div class="col-sm-6 offset-sm-3 backtohome">
					<?php 
					$anchor = busicol_anchor_tag(
						array(
							'url' 	 => esc_url( site_url( '/' ) ),
							'text' 	 => esc_html__( 'Back to home page', 'busicol' ),
							'class'  => 'button-contactForm btn_1 boxed-btn'
						)
					);
					echo wp_kses_post( $anchor );
					?>
				</div>
			</div>

	<?php else : ?>

	    <p><?php wp_kses_post( _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'busicol' ) ); ?></p>
	    <?php get_search_form(); ?>

	<?php endif; ?>
</div>
