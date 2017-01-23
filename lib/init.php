<?php
/**
 * Deborah Child Init File
 *
 * This file calls the Child and Genesis init.php files.
 *
 * @category     Deborah
 * @package      Admin
 * @author       Web Savvy Marketing
 * @copyright    Copyright (c) 2012, Web Savvy Marketing
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0.0
 */

/**
 * This function defines the Genesis Child theme constants
 * and calls necessary theme files
 *
 */
function deborah_init() {
	// Child theme (do not remove)
	define( 'CHILD_THEME_NAME', 'Deborah' );
	define( 'CHILD_THEME_URL', 'http://www.web-savvy-marketing.com/store/' );
	define( 'CHILD_THEME_VERSION', wp_get_theme()->get( 'Version' ) );
	define( 'DEBORAH_SETTINGS_FIELD', 'deborah-settings' );
	define( 'SOLILOQUY_LICENSE_KEY', 'YinP3ZMcnSl0kc+QbvQnzyXBfKRYyPm8p1DJfsC5nLY=' );

	// Developer Information (do not remove)
	define( 'CHILD_DEVELOPER', 'Web Savvy Marketing' );
	define( 'CHILD_DEVELOPER_URL', 'https://www.web-savvy-marketing.com/'  );

	/** Define Directory Location Constants */
	if ( ! defined( 'CHILD_DIR' ) )
		define( 'CHILD_DIR', get_stylesheet_directory() );

	/** Define URL Location Constants */
	if ( ! defined( 'CHILD_URL' ) )
		define( 'CHILD_URL', get_stylesheet_directory_uri() );
	define( 'Deborah_LIB', CHILD_URL . '/lib' );
	define( 'Deborah_IMAGES', CHILD_URL . '/images' );
	define( 'Deborah_ADMIN', Deborah_LIB . '/admin' );
	define( 'Deborah_ADMIN_IMAGES', Deborah_LIB . '/images' );
	define( 'Deborah_JS' , CHILD_URL .'/js' );
	define( 'Deborah_CSS' , CHILD_URL .'/css' );

	// Load admin files when necessary
	if ( is_admin() ) {

		// Plugins

		include_once( CHILD_DIR . '/lib/plugins/plugins.php' );

		// Theme Settings
		require_once( CHILD_DIR . '/lib/admin/deborah-theme-settings.php' );

		// Updater
		include_once( CHILD_DIR . '/lib/functions/update.php' );

	}

	// Add HTML5 markup structure
	add_theme_support( 'html5' );

	// Add Viewport meta tag for mobile browsers
	add_theme_support( 'genesis-responsive-viewport' );

	//Structure
	include_once( CHILD_DIR . '/lib/structure/header.php');
	include_once( CHILD_DIR . '/lib/structure/sidebar.php');
	include_once( CHILD_DIR . '/lib/structure/footer.php');
	include_once( CHILD_DIR . '/lib/structure/comment-form.php');

	// Shortcodes
	include_once( CHILD_DIR . '/lib/functions/shortcodes.php');

	// Setup Widgets
	include_once( CHILD_DIR . '/lib/widgets/wsm-sidebar-button.php');
	include_once( CHILD_DIR . '/lib/widgets/call-to-action.php');
	include_once( CHILD_DIR . '/lib/widgets/wsm-featured-page.php');
	include_once( CHILD_DIR . '/lib/widgets/wsm-featured-post.php');

	// Mobile menu
	include_once( CHILD_DIR . '/lib/functions/mobilemenu.php');

	// Enable Gravity Forms setting to hide form labels
	add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

	// Remove Edit link
	add_filter( 'edit_post_link', '__return_false' );

}

add_filter( 'http_request_args', 'deborah_dont_update_theme', 5, 2 );
/**
 * Don't Update Theme
 * If there is a theme in the repo with the same name,
 * this prevents WP from prompting an update.
 *
 * @author Mark Jaquith
 * @link http://markjaquith.wordpress.com/2009/12/14/excluding-your-plugin-or-theme-from-update-checks/
 *
 * @param array $r Request arguments
 * @param string $url Request url
 * @return array $r Request arguments
 */
function deborah_dont_update_theme( $r, $url ) {
	if ( 0 !== strpos( $url, 'http://api.wordpress.org/themes/update-check' ) )
		return $r; // Not a theme update request. Bail immediately.
	$themes = unserialize( $r['body']['themes'] );
	unset( $themes[ get_option( 'template' ) ] );
	unset( $themes[ get_option( 'stylesheet' ) ] );
	$r['body']['themes'] = serialize( $themes );
	return $r;
}