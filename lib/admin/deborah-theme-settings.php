<?php
/**
 * Deborah Settings
 *
 * This file registers all of Deborah's specific Theme Settings, accessible from
 * Genesis --> Deborah Settings.
 *
 * NOTE: Change out "Deborah" in this file with name of theme and delete this note
 */

/**
 * Registers a new admin page, providing content and corresponding menu item
 * for the Child Theme Settings page.
 *
 * @since 1.0.0
 *
 * @package deborah
 * @subpackage Deborah_Settings
 */
class Deborah_Settings extends Genesis_Admin_Boxes {

	/**
	 * Create an admin menu item and settings page.
	 * @since 1.0.0
	 */
	function __construct() {

		// Specify a unique page ID.
		$page_id = 'deborah';

		// Set it as a child to genesis, and define the menu and page titles
		$menu_ops = array(
			'submenu' => array(
				'parent_slug' => 'genesis',
				'page_title'  => __( 'Deborah Settings', 'deborah' ),
				'menu_title'  => __( 'Deborah Settings', 'deborah' ),
				'capability' => 'manage_options',
			)
		);

		// Set up page options. These are optional, so only uncomment if you want to change the defaults
		$page_ops = array(
		//	'screen_icon'       => 'options-general',
		//	'save_button_text'  => 'Save Settings',
		//	'reset_button_text' => 'Reset Settings',
		//	'save_notice_text'  => 'Settings saved.',
		//	'reset_notice_text' => 'Settings reset.',
		);

		// Give it a unique settings field.
		// You'll access them from genesis_get_option( 'option_name', 'deborah-settings' );
		$settings_field = 'deborah-settings';

		// Set the default values
		$default_settings = array(
			'wsm_cityname_ptsa' => 'City Name Goes Here',
			'wsm_logo_ptsa' => 0,
			'wsm_facebook_url' => 'http://www.facebook.com',
			'wsm_twitter_url' => 'https://twitter.com/',
			'wsm_gplus_url' => 'https://plus.google.com/',
			'wsm_linkedin_url' => 'http://www.linkedin.com/',
			'wsm_youtube_url' => 'http://www.youtube.com/',
			'wsm_credit' => 'Deborah is a WordPress Theme by <strong>Web Savvy Marketing</strong>',
			'wsm_ignore_updates' => 0,
			'wsm_gforms_placeholder' => 0,
		);

		// Create the Admin Page
		$this->create( $page_id, $menu_ops, $page_ops, $settings_field, $default_settings );

		// Initialize the Sanitization Filter
		add_action( 'genesis_settings_sanitizer_init', array( $this, 'sanitization_filters' ) );

	}

	/**
	 * Set up Sanitization Filters
	 * @since 1.0.0
	 *
	 * See /lib/classes/sanitization.php for all available filters.
	 */
	function sanitization_filters() {

		genesis_add_option_filter( 'no_html', $this->settings_field,
			array(

			) );

		genesis_add_option_filter( 'safe_html', $this->settings_field,
			array(
				'wsm_cityname_ptsa',
				'wsm_facebook_url',
				'wsm_twitter_url',
				'wsm_gplus_url',
				'wsm_linkedin_url',
				'wsm_youtube_url',
				'wsm_credit',
			) );
	}

	/**
	 * Set up Help Tab
	 * @since 1.0.0
	 *
	 * Genesis automatically looks for a help() function, and if provided uses it for the help tabs
	 * @link http://wpdevel.wordpress.com/2011/12/06/help-and-screen-api-changes-in-3-3/
	 */
	 function help() {
	 	$screen = get_current_screen();

		$screen->add_help_tab( array(
			'id'      => 'sample-help',
			'title'   => 'Sample Help',
			'content' => '<p>Help content goes here.</p>',
		) );
	 }

	/**
	 * Register metaboxes on Child Theme Settings page
	 * @since 1.0.0
	 */
	function metaboxes() {

		add_meta_box('wsm_ptsa_logo_metabox', __( 'PTSA Logo', 'deborah' ), array( $this, 'wsm_ptsa_logo_metabox' ), $this->pagehook, 'main', 'high');
		add_meta_box('wsm_social_profiles_metabox', __( 'Social Profiles', 'deborah' ), array( $this, 'wsm_social_profiles_metabox' ), $this->pagehook, 'main', 'high');
		add_meta_box('wsm_footer_info_metabox', __( 'Footer Info', 'deborah' ), array( $this, 'wsm_footer_info_metabox' ), $this->pagehook, 'main', 'high');
		add_meta_box('wsm_gforms_placeholders_metabox', __( 'Gravity Forms Auto Placeholders', 'deborah' ), array( $this, 'wsm_gforms_placeholders_metabox' ), $this->pagehook, 'main', 'high');
		add_meta_box('wsm_upate_notifications_metabox', __( 'Update Notifications', 'deborah' ), array( $this, 'wsm_upate_notifications_metabox' ), $this->pagehook, 'main', 'high');

	}

	/**
	* PTSA Logo Metabox
    * @since 2.0.0
    */
    function wsm_ptsa_logo_metabox() {

        echo '<input type="checkbox" name="' . $this->get_field_name( 'wsm_logo_ptsa' ) . '" id="' . $this->get_field_id( 'wsm_logo_ptsa' ) . '" value="1"';
        checked( 1, $this->get_field_value( 'wsm_logo_ptsa' ) ); echo '/>';

        echo '<label for="' . $this->get_field_id( 'wsm_logo_ptsa' ) . '">' . __( 'Display PTSA Everychild Onevoice logo with the city name above.', 'deborah' ) . '</label>';
        echo '<p><em>' . __( 'By default, leaving this unchecked will apply regular image logo or just use a text logo', 'deborah' ) . '</em></p>';

		echo '<p><strong>' . __( 'City Name:', 'deborah' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_cityname_ptsa' ) . '" id="' . $this->get_field_id( 'wsm_cityname_ptsa' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_cityname_ptsa' ) ) . '" size="50" /></p>';


   }

	/**
	 * Social Profiles Metabox
	 * @since 1.0.0
	 */
	function wsm_social_profiles_metabox() {

		echo '<p><strong>' . __( 'Facebook URL:', 'deborah' ) . '</strong><br />';
		echo '<input type="text" name="' . $this->get_field_name( 'wsm_facebook_url' ) . '" id="' . $this->get_field_id( 'wsm_facebook_url' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_facebook_url' ) ) . '" size="50" />';
		echo '</p>';

		echo '<p><strong>' . __( 'Twitter URL:', 'deborah' ) . '</strong><br />';
		echo '<input type="text" name="' . $this->get_field_name( 'wsm_twitter_url' ) . '" id="' . $this->get_field_id( 'wsm_twitter_url' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_twitter_url' ) ) . '" size="50" />';
		echo '</p>';

		echo '<p><strong>' . __( 'Google+ URL:', 'deborah' ) . '</strong><br />';
		echo '<input type="text" name="' . $this->get_field_name( 'wsm_gplus_url' ) . '" id="' . $this->get_field_id( 'wsm_gplus_url' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_gplus_url' ) ) . '" size="50" />';
		echo '</p>';

		echo '<p><strong>' . __( 'LinkedIn URL:', 'deborah' ) . '</strong><br />';
		echo '<input type="text" name="' . $this->get_field_name( 'wsm_linkedin_url' ) . '" id="' . $this->get_field_id( 'wsm_linkedin_url' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_linkedin_url' ) ) . '" size="50" />';
		echo '</p>';

		echo '<p><strong>' . __( 'Youtube URL:', 'deborah' ) . '</strong><br />';
		echo '<input type="text" name="' . $this->get_field_name( 'wsm_youtube_url' ) . '" id="' . $this->get_field_id( 'wsm_youtube_url' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_youtube_url' ) ) . '" size="50" />';
		echo '</p>';

	}



	/**
	 * Footer Info Metabox
	 * @since 1.0.0
	 */
	function wsm_footer_info_metabox() {

		echo '<p><strong>' . __( 'Credit Info:', 'deborah' ) . '</strong></p>';
		echo '<p><input type="text" name="' . $this->get_field_name( 'wsm_credit' ) . '" id="' . $this->get_field_id( 'wsm_credit' ) . '" value="' . esc_attr( $this->get_field_value( 'wsm_credit' ) ) . '" size="70" /></p>';
	}

	/**
	* Gravity Forms Auto Placeholders Metabox
    * @since 2.0.0
    */
    function wsm_gforms_placeholders_metabox() {

        echo '<input type="checkbox" name="' . $this->get_field_name( 'wsm_gforms_placeholder' ) . '" id="' . $this->get_field_id( 'wsm_gforms_placeholder' ) . '" value="1"';
        checked( 1, $this->get_field_value( 'wsm_gforms_placeholder' ) ); echo '/>';

        echo '<label for="' . $this->get_field_id( 'wsm_gforms_placeholder' ) . '">' . __( 'Only convert labels to placeholders on forms or form items with the class <strong><em>gforms-placeholder</em></strong>', 'deborah' ) . '</label>';
        echo '<p><em>' . __( 'By default, leaving this unchecked will apply the effect to all Gravity Form fields.', 'deborah' ) . '</em></p>';

    }

	/**
	 * Update Notifications Metabox
	 * @since 2.0.0
	 */
	function wsm_upate_notifications_metabox() {

		echo '<p>' . __( 'Please check the box below if you wish to ignore/hide the theme update notification.<br/>Uncheck the box if you wish to be notified of theme updates.', 'deborah' ) . '</p>';

		echo '<input type="checkbox" name="' . $this->get_field_name( 'wsm_ignore_updates' ) . '" id="' .  $this->get_field_id( 'wsm_ignore_updates' ) . '" value="1" ';
		checked( 1, $this->get_field_value( 'wsm_ignore_updates' ) );
		echo '/> <label for="' . $this->get_field_id( 'wsm_ignore_updates' ) . '">' . __( 'Ignore Theme Updates?', 'deborah' ) . '</label>';

	}



}

/**
 * Add the Theme Settings Page
 * @since 1.0.0
 */
function deborah_add_settings() {
	global $_child_theme_settings;
	$_child_theme_settings = new Deborah_Settings;
}
add_action( 'genesis_admin_menu', 'deborah_add_settings' );
