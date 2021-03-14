<?php
/**
 * @Packge       : Colorlib
 * @Version      : 1.0
 * @Author       : Colorlib
 * @Author       URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}


/**
 *
 * Define constant
 *
 */

// Base URI
if ( ! defined( 'BUSICOL_DIR_URI' ) ) {
	define( 'BUSICOL_DIR_URI', get_template_directory_uri() . '/' );
}

// assets URI
if ( ! defined( 'BUSICOL_DIR_ASSETS_URI' ) ) {
	define( 'BUSICOL_DIR_ASSETS_URI', BUSICOL_DIR_URI . 'assets/' );
}

// Css File URI
if ( ! defined( 'BUSICOL_DIR_CSS_URI' ) ) {
	define( 'BUSICOL_DIR_CSS_URI', BUSICOL_DIR_ASSETS_URI . 'css/' );
}

// Js File URI
if ( ! defined( 'BUSICOL_DIR_JS_URI' ) ) {
	define( 'BUSICOL_DIR_JS_URI', BUSICOL_DIR_ASSETS_URI . 'js/' );
}

// Images URI
if ( ! defined( 'BUSICOL_DIR_IMGS_URI' ) ) {
	define( 'BUSICOL_DIR_IMGS_URI', BUSICOL_DIR_ASSETS_URI . 'img/' );
}

// Icon Images
if ( ! defined( 'BUSICOL_DIR_ICON_IMG_URI' ) ) {
	define( 'BUSICOL_DIR_ICON_IMG_URI', BUSICOL_DIR_ASSETS_URI . 'img/icon/' );
}

// Base Directory
if ( ! defined( 'BUSICOL_DIR_PATH' ) ) {
	define( 'BUSICOL_DIR_PATH', get_parent_theme_file_path() . '/' );
}

//Inc Folder Directory
if ( ! defined( 'BUSICOL_DIR_PATH_INC' ) ) {
	define( 'BUSICOL_DIR_PATH_INC', BUSICOL_DIR_PATH . 'inc/' );
}

//Busicol Libraries Folder Directory
if ( ! defined( 'BUSICOL_DIR_PATH_LIBS' ) ) {
	define( 'BUSICOL_DIR_PATH_LIBS', BUSICOL_DIR_PATH_INC . 'libraries/' );
}

//Classes Folder Directory
if ( ! defined( 'BUSICOL_DIR_PATH_CLASSES' ) ) {
	define( 'BUSICOL_DIR_PATH_CLASSES', BUSICOL_DIR_PATH_INC . 'classes/' );
}

//Hooks Folder Directory
if ( ! defined( 'BUSICOL_DIR_PATH_HOOKS' ) ) {
	define( 'BUSICOL_DIR_PATH_HOOKS', BUSICOL_DIR_PATH_INC . 'hooks/' );
}

// Admin Enqueue script
function busicol_admin_script(){
    wp_enqueue_style( 'busicol-admin', get_template_directory_uri().'/assets/css/busicol-admin.css', false, '1.0.0' );
    wp_enqueue_script( 'busicol_admin', get_template_directory_uri().'/assets/js/busicol-admin.js', false, '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'busicol_admin_script' );



/**
 * Include File
 *
 */
require_once( BUSICOL_DIR_PATH_INC . 'busicol-breadcrumbs.php' );
require_once( BUSICOL_DIR_PATH_INC . 'busicol-widgets-reg.php' );
require_once( BUSICOL_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
require_once( BUSICOL_DIR_PATH_INC . 'post-like.php' );
require_once( BUSICOL_DIR_PATH_INC . 'busicol-functions.php' );
require_once( BUSICOL_DIR_PATH_INC . 'busicol-commoncss.php' );
require_once( BUSICOL_DIR_PATH_INC . 'support-functions.php' );
require_once( BUSICOL_DIR_PATH_INC . 'wp-html-helper.php' );
require_once( BUSICOL_DIR_PATH_INC . 'wp_bootstrap_pagination.php' );
require_once( BUSICOL_DIR_PATH_INC . 'customizer/customizer.php' );
require_once( BUSICOL_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
require_once( BUSICOL_DIR_PATH_CLASSES . 'Class-Config.php' );
require_once( BUSICOL_DIR_PATH_HOOKS . 'hooks.php' );
require_once( BUSICOL_DIR_PATH_HOOKS . 'hooks-functions.php' );
require_once( BUSICOL_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
require_once( BUSICOL_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );



/**
 * Instantiate Busicol object
 *
 * Inside this object:
 * Enqueue scripts, Google font, Theme support features, Epsilon Dashboard .
 *
 */

$Busicol = new Busicol();