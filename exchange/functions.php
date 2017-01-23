<?php

add_action( 'genesis_header', 'wsm_exchange_do_theme');

function wsm_exchange_do_theme() {

	if ( it_exchange_is_page() ) {

		// Remove the post format image (requires HTML5 theme support)
		remove_action( 'genesis_entry_header', 'genesis_do_post_format_image', 4 );

		// Remove the author box on single posts HTML5 Themes
		remove_action( 'genesis_after_entry', 'genesis_do_author_box_single', 8 );

		// Customize the entry meta in the entry header (requires HTML5 theme support)
		remove_action( 'genesis_entry_header', 'genesis_post_info', 6 );

		// Remove the entry meta in the entry footer (requires HTML5 theme support)
		remove_action( 'genesis_entry_footer', 'genesis_post_meta' );


		// Remove the  sidebar
		remove_action( 'genesis_sidebar', 'ptsa_child_do_sidebar' );

		// Remove duplicate Simple Share Buttons
		add_action( 'it_exchange_content_product_before_product_info_loop', 'wsm_remove_exchange_simple_share' );
		function wsm_remove_exchange_simple_share() {
			remove_filter( 'the_content', 'show_share_buttons');
		}

		// Add share buttons back at the bottom of the page
		add_action( 'genesis_after_endwhile', 'wsm_add_exchange_simple_share' );
		function wsm_add_exchange_simple_share() {
			if( function_exists( 'show_share_buttons' ) ) {
				echo do_shortcode( '[ssba]' );
			}
		}

	}

}

add_action( 'genesis_sidebar', 'wsm_exchange_do_sidebar');

function wsm_exchange_do_sidebar() {

	if ( it_exchange_is_page() ) {

		genesis_widget_area( 'store-sidebar');

	}

}
