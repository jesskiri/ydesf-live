<?php

add_action( 'after_setup_theme', 'deborah_i18n' );
/**
 * Load the child theme textdomain for internationalization.
 *
 * Must be loaded before Genesis Framework /lib/init.php is included.
 * Translations can be filed in the /languages/ directory.
 *
 * @since 1.2.0
 */
function deborah_i18n() {
    load_child_theme_textdomain( 'deborah', get_stylesheet_directory() . '/languages' );
}

add_action( 'wp_enqueue_scripts', 'wsm_enqueue_assets' );
/**
 * Enqueue theme assets.
 */
function wsm_enqueue_assets() {
	wp_enqueue_style( 'deborah', get_stylesheet_uri() );
	wp_style_add_data( 'deborah', 'rtl', 'replace' );
}

// Start the engine
require_once( TEMPLATEPATH.'/lib/init.php' );
require_once( 'lib/init.php' );

// Calls the theme's constants & files
deborah_init();

// Editor Styles
add_editor_style( 'editor-style.css' );

// Force Stupid IE to NOT use compatibility mode
add_filter( 'wp_headers', 'wsm_keep_ie_modern' );
function wsm_keep_ie_modern( $headers ) {
        if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && ( strpos( $_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== false ) ) {
                $headers['X-UA-Compatible'] = 'IE=edge,chrome=1';
        }
        return $headers;
}

// Accessibility features.
add_theme_support( 'genesis-accessibility', array(
	'headings',
	'drop-down-menu',
	'search-form',
	'skip-links',
	'rems',
) );

// Add new image sizes
add_image_size( 'Blog Thumbnail', 286, 188, TRUE );

// Customize the Search Box
add_filter( 'genesis_search_button_text', 'custom_search_button_text' );
function custom_search_button_text( $text ) {
    return esc_attr( 'Go', 'deborah' );
}

// Modify the author box display
add_filter( 'genesis_author_box', 'deborah_author_box' );

function deborah_author_box() {

	$authinfo = '';
	$authdesc = get_the_author_meta( 'description' );

	if( !empty( $authdesc ) ) {
		$authinfo .= sprintf( '<section %s>', genesis_attr( 'author-box' ) );
		$authinfo .= get_avatar( get_the_author_id() , 115, '', get_the_author_meta( 'display_name' ) . '\'s avatar' ) ;
		$authinfo .= '<h3 class="author-box-title">' . __( 'About the Author', 'deborah' ) . '</h3>';
		$authinfo .= '<div class="author-box-content" itemprop="description">';
		$authinfo .= '<p>' . get_the_author_meta( 'description' ) . '</p>';
		$authinfo .= '</div>';
		$authinfo .= '</section>';
	}
	if ( is_author() || is_single() ) {
		echo $authinfo;
	}
}

// Reposition the post image (requires HTML5 theme support)
remove_action( 'genesis_entry_content', 'genesis_do_post_image', 8 );
add_action( 'genesis_entry_header', 'genesis_do_post_image', 5 );

// Reposition the entry meta in the entry header (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
add_action( 'genesis_entry_header', 'genesis_post_info', 6 );

// Customize the entry meta in the entry header (requires HTML5 theme support)
add_filter( 'genesis_post_info', 'sp_post_info_filter' );
function sp_post_info_filter( $post_info ) {
	$post_info = '[post_date format="m.d.y"] <span class="sep">|</span> [post_comments]';
	return $post_info;
}

// Customize the post meta function
add_filter( 'genesis_post_meta', 'post_meta_filter' );
function post_meta_filter( $post_meta ) {
	if ( is_single() ) {
    	$post_meta = '[post_categories sep=", " before="' . __( 'Categories: ', 'deborah' ) . '"] [post_tags sep=", " before="' . __( 'Tags: ', 'deborah' ) . '"]';
    	return $post_meta;
	}
}

// Add Read More button to blog page and archives
add_filter( 'excerpt_more', 'deborah_add_excerpt_more' );
add_filter( 'get_the_content_more_link', 'deborah_add_excerpt_more' );
add_filter( 'the_content_more_link', 'deborah_add_excerpt_more' );
function deborah_add_excerpt_more( $more ) {
    return ' <span class="more-link"><a href="' . get_permalink() . '" rel="nofollow">' . __( 'Read More >>', 'deborah' ) . '</a></span>';
}

/*
 * Add support for targeting individual browsers via CSS
 * See readme file located at /lib/js/css_browser_selector_readm.html
 * for a full explanation of available browser css selectors.
 */
add_action( 'get_header', 'deborah_load_scripts' );
function deborah_load_scripts() {
    wp_enqueue_script( 'browserselect', CHILD_URL . '/lib/js/css_browser_selector.js', array('jquery'), '0.4.0', TRUE );
}

// Structural Wrap
add_theme_support( 'genesis-structural-wraps',
	array(
		'header',
		'nav',
		'site-inner',
		'footer-widgets',
		'footer',
	)
);


// Changes Default Navigation to Primary & Footer

add_theme_support ( 'genesis-menus' ,
	array (
		'primary' => __( 'Primary Navigation Menu', 'deborah' ),
		'secondary' => __( 'Secondary Navigation Menu', 'deborah' ),
		'footer' => __( 'Footer Navigation Menu', 'deborah' ),
	)
);

// Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_header_right', 'genesis_do_subnav' );

// Unregister Layouts
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );

//* Add support for 4-column footer widgets
add_theme_support( 'genesis-footer-widgets', 4 );

// Setup Sidebars
unregister_sidebar( 'sidebar-alt' );
unregister_sidebar( 'header-right' );

genesis_register_sidebar( array(
	'id'			=> 'rotator',
	'name'			=> __( 'Rotator', 'deborah' ),
	'description'	=> __( 'This is the image rotator section.', 'deborah' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-cta1',
	'name'			=> __( 'Home CTA 1', 'deborah' ),
	'description'	=> __( 'This is the Home Page top left.', 'deborah' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-cta2',
	'name'			=> __( 'Home CTA 2', 'deborah' ),
	'description'	=> __( 'This is the Home Page top center.', 'deborah' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-cta3',
	'name'			=> __( 'Home CTA 3', 'deborah' ),
	'description'	=> __( 'This is the Home Page top right.', 'deborah' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-mid1',
	'name'			=> __( 'Home Middle 1', 'deborah' ),
	'description'	=> __( 'This is the Home Page middle left.', 'deborah' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-mid2',
	'name'			=> __( 'Home Middle 2', 'deborah' ),
	'description'	=> __( 'This is the Home Page middle center.', 'deborah' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'home-sidebar',
	'name'			=> __( 'Home Sidebar', 'deborah' ),
	'description'	=> __( 'This is the Home Page Sidebar.', 'deborah' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'blog-sidebar',
	'name'			=> __( 'Blog Sidebar', 'deborah' ),
	'description'	=> __( 'This is the Blog Page Sidebar.', 'deborah' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'page-sidebar',
	'name'			=> __( 'Page Sidebar', 'deborah' ),
	'description'	=> __( 'This is the Page Sidebar.', 'deborah' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'store-sidebar',
	'name'			=> __( 'Store Sidebar', 'deborah' ),
	'description'	=> __( 'This is the page sidebar.', 'deborah' ),
) );
genesis_register_sidebar( array(
	'id'			=> 'bottom-sponsors',
	'name'			=> __( 'Bottom Sponsors', 'deborah' ),
	'description'	=> __( 'This is the bottom sponsors logo', 'deborah' ),
) );


// Remove edit link from TablePress tables for logged in users
add_filter( 'tablepress_edit_link_below_table', '__return_false' );


// Insert SPAN tag into widgettitle
add_filter( 'dynamic_sidebar_params', 'deborah_wrap_widget_titles', 20 );
function deborah_wrap_widget_titles( array $params ) {

	// $params will ordinarily be an array of 2 elements, we're only interested in the first element
	$widget =& $params[0];
	$widget['before_title'] = '<h4 class="widget-title widgettitle"><span>';
	$widget['after_title'] = '</span></h4>';

	return $params;
}

// Add Bottom Sponsors Widget
add_action( 'genesis_after_content_sidebar_wrap', 'deborah_bottom_sponsors' );
function deborah_bottom_sponsors() {
	genesis_widget_area( 'bottom-sponsors', array( 'before' => '<aside class="bottom-sponsors widget-area">', 'after' => '</aside>' ) );
}


// ------------------ Woocommerce ------------------------ //

add_theme_support( 'woocommerce' );

// Remove Breadcrumbs
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

// Change number of products per row to 3
add_filter( 'loop_shop_columns', 'loop_columns' );
if ( !function_exists( 'loop_columns' ) ) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

add_filter ( 'woocommerce_product_thumbnails_columns', 'wsm_thumb_cols' );
function wsm_thumb_cols() {
	return 3;
}

// Redefine woocommerce_output_related_products()
function woocommerce_output_related_products() {
	woocommerce_related_products( 3,3 ); // Display 3 products in rows of 3
}

add_filter( 'add_to_cart_text', 'woo_custom_cart_button_text' ); // < 2.1
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text' ); // 2.1 +
function woo_custom_cart_button_text() {
	return __( 'Buy Product', 'deborah' );
}


/**
* Sidebar
*
* @see woocommerce_get_sidebar()
*/
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
add_action( 'woocommerce_sidebar', 'wsm_woo_get_sidebar', 10 );

function wsm_woo_get_sidebar() {

	genesis_markup( array(
	'html5'   => '<aside %s>',
	'xhtml'   => '<div id="sidebar" class="sidebar widget-area">',
	'context' => 'sidebar-primary',
	) );

	genesis_widget_area( 'store-sidebar');

	genesis_markup( array(
	'html5' => '</aside>', //* end .sidebar-primary
	'xhtml' => '</div>', //* end #sidebar
	) );

}

// Replace WooCommerce Default Pagination with Genesis Pagination
remove_action( 'woocommerce_pagination', 'woocommerce_pagination', 10 );
add_action( 'woocommerce_pagination', 'woocommerce_pagination', 10 );
function woocommerce_pagination() {
	genesis_posts_nav();
}

//* Modify breadcrumb arguments.
add_filter( 'genesis_breadcrumb_args', 'wsm_breadcrumb_args' );
function wsm_breadcrumb_args( $args ) {
	$args['prefix'] = '<div class="breadcrumb"><div class="breadcrumb-inner">';
	$args['suffix'] = '</div></div>';
return $args;
}
