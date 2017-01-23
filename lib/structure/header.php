<?php

/**
 * Header Functions
 *
 * This file controls the header display on the site to allow
 * social media icons in the header
 *
 * @category     ChildTheme
 * @package      Admin
 * @author       Web Savvy Marketing
 * @copyright    Copyright (c) 2012, Web Savvy Marketing
 * @license      http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since        1.0.0
 *
 */

remove_action ( 'genesis_header', 'genesis_do_header' );

add_action( 'genesis_header' , 'wsm_child_do_header' );

function wsm_child_do_header() {

	echo '<div class="title-area">';

	$ptsa_logo = genesis_get_option( 'wsm_logo_ptsa', 'deborah-settings' );
	$site_name = genesis_get_option( 'wsm_cityname_ptsa', 'deborah-settings' );

	if ( !empty( $ptsa_logo ) ) {

		if ( !empty( $site_name ) ) {
			echo '<h1 class="site-name"><a href="'.home_url('/').'">' . genesis_get_option( 'wsm_cityname_ptsa', 'deborah-settings' ) . '</a></h1>';
		}

	}

	else {

	do_action( 'genesis_site_title' );
	do_action( 'genesis_site_description' );

	}

	echo '</div>';

	echo '<aside class="widget-area">';

	$facebook = genesis_get_option( 'wsm_facebook_url', 'deborah-settings' );
	$twitter = genesis_get_option( 'wsm_twitter_url', 'deborah-settings' );
	$gplus = genesis_get_option( 'wsm_gplus_url', 'deborah-settings' );
	$linkedin = genesis_get_option( 'wsm_linkedin_url', 'deborah-settings' );
	$youtube = genesis_get_option( 'wsm_youtube_url', 'deborah-settings' );

	echo '<div class="social-media">';

	if ( !empty( $twitter ) ) {
		echo '<a class="btn-tw" href="' . genesis_get_option( 'wsm_twitter_url', 'deborah-settings' ) . '" title="Twitter" target="_blank">' . __( 'Twitter', 'deborah' ) . '</a>';
	}

	if ( !empty( $linkedin ) ) {
		echo '<a class="btn-li" href="' . genesis_get_option( 'wsm_linkedin_url', 'deborah-settings' ) . '"  title="Linkedin" target="_blank">' . __( 'LinkedIn', 'deborah' ) . '</a>';
	}

	if ( !empty( $facebook ) ) {
		echo '<a class="btn-fb" href="' . genesis_get_option( 'wsm_facebook_url', 'deborah-settings' ) . '"  title="Facebook" target="_blank">' . __( 'Facebook', 'deborah' ) . '</a>';
	}

	if ( !empty( $gplus ) ) {
		echo '<a class="btn-gp" href="' . genesis_get_option( 'wsm_gplus_url', 'deborah-settings' ) . '"  title="Google +" target="_blank">' . __( 'Google+', 'deborah' ) . '</a>';
	}

	if ( !empty( $youtube ) ) {
		echo '<a class="btn-yt" href="' . genesis_get_option( 'wsm_youtube_url', 'deborah-settings' ) . '"  title="Youtube" target="_blank">' . __( 'Youtube', 'deborah' ) . '</a>';
	}


	echo '</div>';

	do_action( 'genesis_header_right' );

	dynamic_sidebar( 'header-right' );

	echo '</aside>';

}