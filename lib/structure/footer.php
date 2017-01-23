<?php 

/**
 * Footer Functions
 *
 * This file controls the footer on the site. The standard Genesis footer
 * has been replaced with one that has menu links on the right side and
 * copyright and credits on the left side.
 *
 * @category     ChildTheme
 * @package      Admin
 * @author       Web Savvy Marketing
 * @copyright    Copyright (c) 2012, Web Savvy Marketing
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0.0
 *
 */

remove_action('genesis_footer', 'genesis_do_footer');

add_action('genesis_footer', 'deborah_child_do_footer');
function deborah_child_do_footer() {

 
		if ( has_nav_menu( 'footer' ) ) {

			$args = array(
				'theme_location' => 'footer',
				'container' => '',
				'menu_class' => genesis_get_option('nav_superfish') ? 'nav genesis-nav-menu superfish' : 'nav genesis-nav-menu',
				'echo' => 0
			);

			$nav = wp_nav_menu( $args );

			$nav_output = sprintf( '<div class="footer-nav">%1$s</div>', $nav );

			echo apply_filters( 'deborah_do_footer_nav', $nav_output, $nav, $args );
		
		}

	$credit= genesis_get_option( 'wsm_credit', 'deborah-settings' );
	
	if ( !empty($credit ) ) { 		
		echo '<p class="credit">' . genesis_get_option( 'wsm_credit', 'deborah-settings' ) . '</p>';
	}


}