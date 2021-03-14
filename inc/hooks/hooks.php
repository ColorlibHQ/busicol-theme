<?php 
/**
 * @Packge 	   : Colorlib
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
	// Block direct access
	if( !defined( 'ABSPATH' ) ){
		exit( 'Direct script access denied.' );
	}

	/**
	 *
	 * Before Wrapper
	 *
	 * @Preloader
	 *
	 */
	add_action( 'busicol_preloader', 'busicol_site_preloader', 10 );

	/**
	 * Header
	 *
	 * @Header Menu
	 * @Header Bottom
	 * 
	 */

	add_action( 'busicol_header', 'busicol_header_cb', 10 );

	/**
	 * Hook for footer
	 *
	 */
	add_action( 'busicol_footer', 'busicol_footer_area', 10 );

	/**
	 * Hook for Blog, single, page, search, archive pages wrapper.
	 */
	add_action( 'busicol_wrp_start', 'busicol_wrp_start_cb', 10 );
	add_action( 'busicol_wrp_end', 'busicol_wrp_end_cb', 10 );
	
	/**
	 * Hook for Blog, single, search, archive pages column.
	 */
	add_action( 'busicol_blog_col_start', 'busicol_blog_col_start_cb', 10 );
	add_action( 'busicol_blog_col_end', 'busicol_blog_col_end_cb', 10 );
	
	/**
	 * Hook for blog posts thumbnail.
	 */
	add_action( 'busicol_blog_posts_thumb', 'busicol_blog_posts_thumb_cb', 10 );

	/**
	 * Hook for blog details wrapper.
	 */
	add_action( 'busicol_blog_details_wrap_start', 'busicol_blog_details_wrap_start_cb', 10 );
	add_action( 'busicol_blog_details_wrap_end', 'busicol_blog_details_wrap_end_cb', 10 );

	/**
	 * Hook for blog posts title.
	 */
	add_action( 'busicol_blog_posts_title', 'busicol_blog_posts_title_cb', 10 );

	/**
	 * Hook for blog posts meta.
	 */
	add_action( 'busicol_blog_posts_meta', 'busicol_blog_posts_meta_cb', 10 );

	/**
	 * Hook for blog posts excerpt.
	 */
	add_action( 'busicol_blog_posts_excerpt', 'busicol_blog_posts_excerpt_cb', 10 );
	// add_action( 'busicol_blog_posts_excerpt', 'busicol_blog_read_more_cb', 10 );

	/**
	 * Hook for blog posts info links.
	 */
	add_action( 'busicol_blog_posts_info_link', 'busicol_blog_posts_info_link_cb', 10 );

	/**
	 * Hook for blog posts content.
	 */
	add_action( 'busicol_blog_posts_content', 'busicol_blog_posts_content_cb', 10 );
	
	/**
	 * Hook for blog single post social share option.
	 */
	add_action( 'busicol_blog_posts_share', 'busicol_blog_posts_share_cb', 10 );

	/**
	 * Hook for blog sidebar.
	 */
	add_action( 'busicol_blog_sidebar', 'busicol_blog_sidebar_cb', 10 );
	
	/**
	 * Hook for blog single post meta category, tag, next - previous link and comments form.
	 */
	add_action( 'busicol_blog_single_meta', 'busicol_blog_single_meta_cb', 10 );
	
	/**
	 * Hook for page content.
	 */
	add_action( 'busicol_page_content', 'busicol_page_content_cb', 10 );
	
	
	/**
	 * Hook for 404 page.
	 */
	add_action( 'busicol_fof', 'busicol_fof_cb', 10 );

	

?>