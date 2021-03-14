<?php
/**
 * @Packge       : Busicol
 * @Version      : 1.0
 * @Author       : Colorlib
 * @Author URI 	 : http://colorlib.com/wp/
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

// Final Class
final class Busicol {

	// Theme Version
	private $busicol_version = '1.0';

	// Minimum WordPress Version required
	private $min_wp = '5.0';

	// Minimum PHP version required
	private $min_php = '7.0';

	function __construct(){

		// After setup theme
		add_action( 'after_setup_theme', array( $this, 'support' ) );
		// elementor flag
		add_action( 'after_switch_theme', array( $this, 'set_elementor_flag' ) );
		// Enqueue elementor theme default style 
		add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'enqueue_elementor_theme_default_style' ) );
		// Enqueue elementor notice script
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_elementor_notice_script' ) );
		// Elementor disable default style
		add_action( 'wp_ajax_elementor_desiable_default_style' , array( $this, 'elementor_desiable_default_style' ) );
		// initialize theme flag
		$this->init();

	}
	// Theme init
	public function init() {

		$this->setup();

		// customizer init Instantiate
		if( class_exists('Epsilon_Framework') ){
			$this->customizer_init();
		}
		
		// Instantiate  Dashboard
		$Epsilon_init_Dashboard = Epsilon_init_Dashboard::get_instance();

	}

	// Theme setup
	private function setup() {

		// Create enqueue class instance
		$enqueu          = new busicol_Enqueue();
		$enqueu->scripts = $this->enqueue();
		$enqueu->busicol_scripts_enqueue_init();


	}

	// Theme Support
	public function support() {
		// content width
		$GLOBALS['content_width'] = apply_filters( 'busicol_content_width', 751 );


		// text domain for translation.
		load_theme_textdomain( 'busicol', BUSICOL_DIR_PATH . '/languages' );

		// support title tage
		add_theme_support( 'title-tag' );

		// support logo
		add_theme_support( 'custom-logo', array(
			'height'      => 38,
			'width'       => 144,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		//  support post format
		add_theme_support( 'post-formats', array( 'video', 'audio' ) );

		// support post-thumbnails
		add_theme_support( 'post-thumbnails', array( 'post', 'portfolio' ) );

		// Site logo size
		add_image_size( 'busicol_site_logo_144x38', 144, 38, true );
		add_image_size( 'busicol_footer_logo_166x45', 166, 45, true );

		// Service bg thumb size
		add_image_size( 'busicol_service_bg_thumb_362x280', 362, 280, true );

		// About thumb size
		add_image_size( 'busicol_about_thumb_877x620', 877, 620, true );

		// Project thumb size
		add_image_size( 'busicol_project_thumb_362x410', 362, 410, true );
		add_image_size( 'busicol_project_thumb_754x410', 754, 410, true );

		// Financial thumb size
		add_image_size( 'busicol_fincial_thumb_558x465', 558, 465, true );

		// Testimonial thumb size
		add_image_size( 'busicol_testimonial_thumb_100x100', 100, 100, true );

		// Latest post thumbnail size
		add_image_size( 'busicol_widget_post_thumb', 80, 80, true );

		// Single blog post image size
		add_image_size( 'busicol_single_blog_750x375', 750, 375, true );
		add_image_size( 'busicol_np_thumb', 60, 60, true );

		// support custom background
		add_theme_support( 'custom-background', array(
			'default-color' => '#fff',
		) );

		// support custom header
		add_theme_support( 'custom-header', array(
			'default-image'      => get_template_directory_uri() . '/assets/img/breadcrumb.png',
			'width'              => 1820,
			'height'             => 500,
			'flex-width'         => true,
			'flex-height'        => true,
		) );

		// support automatic feed links
		add_theme_support( 'automatic-feed-links' );

		// support html5
		add_theme_support( 'html5' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// register nav menu
		register_nav_menus( array(
			'primary-menu' => esc_html__( 'Primary Menu', 'busicol' ),
			'services'     => esc_html__( 'Services', 'busicol' ),
			'useful-links' => esc_html__( 'Useful Links', 'busicol' ),
		) );

		// editor style
		add_editor_style( 'assets/css/editor-style.css' );

	} // end support method

	// enqueue theme style and script
	private function enqueue() {

		$cssPath = BUSICOL_DIR_CSS_URI;
		$jsPath  = BUSICOL_DIR_JS_URI;
		
		$scripts = array(
			'style'   => array(
				array(
					'handler' => 'google-font',
					'file'    => $this->google_font(),
				),
				array(
					'handler'    => 'bootstrap-css',
					'file'       => $cssPath . 'bootstrap.min.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'owl-carousel-css',
					'file'       => $cssPath . 'owl.carousel.min.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'magnific-popup-css',
					'file'       => $cssPath . 'magnific-popup.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'font-awesome',
					'file'       => $cssPath . 'font-awesome.min.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'themify-icons',
					'file'       => $cssPath . 'themify-icons.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'nice-select-css',
					'file'       => $cssPath . 'nice-select.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'flaticon-css',
					'file'       => $cssPath . 'flaticon.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'gijgo-css',
					'file'       => $cssPath . 'gijgo.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'animate-css',
					'file'       => $cssPath . 'animate.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'slick-css',
					'file'       => $cssPath . 'slick.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'slicknav-css',
					'file'       => $cssPath . 'slicknav.css',
					'dependency' => array(),
					'version'    => '1.0',
				),
				array(
					'handler'    => 'main-style',
					'file'       => $cssPath . 'style.css',
					'dependency' => array(),
					'version'    => $this->busicol_version,
				),
				array(
					'handler' => 'busicol-style',
					'file'    => get_stylesheet_uri(),
				),
			),
			'scripts' => array(
				array(
					'handler'    => 'popper-js',
					'file'       => $jsPath . 'popper.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'bootstrap-js',
					'file'       => $jsPath . 'bootstrap.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'magnific-popup-js',
					'file'       => $jsPath . 'jquery.magnific-popup.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),	
				array(
					'handler'    => 'owl-carousel-js',
					'file'       => $jsPath . 'owl.carousel.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'isotope-pkgd-js',
					'file'       => $jsPath . 'isotope.pkgd.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'waypoints-js',
					'file'       => $jsPath . 'waypoints.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'jquery-counterup-js',
					'file'       => $jsPath . 'jquery.counterup.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'imagesloaded-pkgd-js',
					'file'       => $jsPath . 'imagesloaded.pkgd.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'scrollIt-js',
					'file'       => $jsPath . 'scrollIt.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'jquery-scrollUp-js',
					'file'       => $jsPath . 'jquery.scrollUp.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'wow-js',
					'file'       => $jsPath . 'wow.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'nice-select-js',
					'file'       => $jsPath . 'nice-select.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'jquery-slicknav-js',
					'file'       => $jsPath . 'jquery.slicknav.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'ajaxchimp-js',
					'file'       => $jsPath . 'jquery.ajaxchimp.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),	
				array(
					'handler'    => 'plugins-js',
					'file'       => $jsPath . 'plugins.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'gijgo-js',
					'file'       => $jsPath . 'gijgo.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'slick-js',
					'file'       => $jsPath . 'slick.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),
				array(
					'handler'    => 'jquery-instagramFeed-js',
					'file'       => $jsPath . 'jquery.instagramFeed.min.js',
					'dependency' => array( 'jquery' ),
					'version'    => '1.0',
					'in_footer'  => true,
				),		
				array(
					'handler'		=> 'post-like-js',
					'file' 			=> $jsPath.'post-likes.js',
					'dependency' 	=> array( 'jquery' ),
					'version' 		=> '1.0',
					'in_footer' 	=> true
				),
				array(
					'handler'    => 'custom-js',
					'file'       => $jsPath . 'main.js',
					'dependency' => array( 'jquery' ),
					'version'    => $this->busicol_version,
					'in_footer'  => true,
				),

			),
		);

		return $scripts;

	} // end enqueu method


	// Google Font
	private function google_font() {

		$fontUrl = '';

		if ( 'off' !== _x( 'on', 'Google font: on or off', 'busicol' ) ) {
			
			$font_families = array(
				'Poppins:200,200i,300,300i,400,400i,500,500i,600,600i,700',
			);

			$familyArgs = array(
				'family' => htmlentities( implode( '|', $font_families ) ),
				'subset' => urlencode( 'latin, latin-text' ),
			);

			$fontUrl = add_query_arg( $familyArgs, '//fonts.googleapis.com/css' );
		}

		return esc_url_raw( $fontUrl );

	} //End google_font method

	/**
	 * Epsilon customizer
	 *
	 */

	// epsilon customizer init
	private function customizer_init(){

		// epsilon customizer quickie settings
	
		add_filter( 'epsilon_quickie_bar_shortcuts', array( $this, 'epsilon_quickie' ) );
		
		// Instantiate Epsilon Framework object
		$Epsilon_Framework = new Epsilon_Framework();

		
		// Instantiate busicol theme customizer
		$busicol_theme_customizer = new busicol_theme_customizer();
	}

	public function epsilon_quickie(){

			return	array(

			'links' => array(
				array(
					'link_to'   => 'busicol_options_panel',
					'icon'      => 'dashicons dashicons-admin-tools',
					'link_type' => 'panel',
				),
				array(
					'link_to'   => 'nav_menus',
					'icon'      => 'dashicons dashicons-menu',
					'link_type' => 'panel',
				),
				array(
					'link_to'   => 'widgets',
					'icon'      => 'dashicons dashicons-archive',
					'link_type' => 'panel',
				),
				array(
					'link_to'   => 'custom_css',
					'icon'      => 'dashicons dashicons-editor-code',
					'link_type' => 'section',
				),

			),
			'logo'  => array(
				'url' => EPSILON_URI . '/assets/img/epsilon-logo.png',
				'alt' => 'Epsilon Builder Logo',
			),
		);

	}
	
	/**
	 * Notice for Elementor default style
	 *
	 */

	// Check elementor preview page
	public static function check_elementor_preview_page(){

		if( ( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) || isset( $_REQUEST['elementor-preview'] ) ){
			return true;
		}

		return false;

	}
	// Set flag for elementor ( hooked in after switch theme )
	public function set_elementor_flag(){
		update_option( 'busicol_had_elementor', 'no' );
	}
	// Elementor dsiable default style
	public function elementor_desiable_default_style(){

		$nonce = $_POST['nonce'];
		if ( ! wp_verify_nonce( $nonce, 'busicol-elementor-notice-nonce' ) ) {
			return;
		}
		$reply = $_POST['reply'];
		if ( ! empty( $reply ) ) {
			if ( $reply == 'yes' ) {
				update_option( 'elementor_disable_color_schemes', 'yes' );
				update_option( 'elementor_disable_typography_schemes', 'yes' );
			}
			update_option( 'busicol_had_elementor', 'yes' );
		}
		die();

	}
	// Enqueue theme default style for elementor
	public function enqueue_elementor_theme_default_style(){

		$disabled_color_schemes      = get_option( 'elementor_disable_color_schemes' );
		$disabled_typography_schemes = get_option( 'elementor_disable_typography_schemes' );

		if ( $disabled_color_schemes === 'yes' && $disabled_typography_schemes === 'yes' ) {
			wp_enqueue_style( 'busicol-elementor-default-style',  BUSICOL_DIR_CSS_URI. 'elementor-default-element-style.css', array(), $this->busicol_version );
		}
	}
	// Enqueue elementor notice scripts
	public function enqueue_elementor_notice_script(){

		$had_elementor = get_option( 'busicol_had_elementor' );

		if( $had_elementor == 'no' && self::check_elementor_preview_page() ){
			wp_enqueue_script( 'busicol-elementor-notice', BUSICOL_DIR_JS_URI.'busicol-elementor-notice.js', array('jquery'), '1.0', true );
			wp_localize_script(
				'busicol-elementor-notice',
				'busicolElementorNotice',
				array(
					'ajaxurl' => admin_url( 'admin-ajax.php' ),
					'nonce'   => wp_create_nonce( 'busicol-elementor-notice-nonce' ),
				)
			);
		}

	}


} // End Busicol Class


?>