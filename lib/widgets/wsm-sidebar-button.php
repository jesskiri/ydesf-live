<?php
/**
 * Modification of the Genesis Featured Page Widget
 * to add customizable text area option.
 *
 */


add_action( 'widgets_init', create_function( '', "register_widget('WSM_BTN_Widget');" ) );


class WSM_BTN_Widget extends WP_Widget {

	/**
	 * Constructor. Set the default widget options and create widget.
	 */
	function WSM_BTN_Widget() {
		$widget_ops = array( 'classname' => 'wsm-btn', 'description' => __('Displays backgrounds and customizable headline and Link', 'deborah') );
		$control_ops = array( 'width' => 200, 'height' => 250, 'id_base' => 'wsm-btn-widget' );
		parent::__construct( 'wsm-btn-widget', __('Web Savvy - Button Widget', 'deborah'), $widget_ops, $control_ops );
	}

	/**
	 * Echo the widget content.
	 *
	 * @param array $args Display arguments including before_title, after_title, before_widget, and after_widget.
	 * @param array $instance The settings for the particular instance of the widget
	 */
	function widget($args, $instance) {
		extract($args);

		$instance = wp_parse_args( (array) $instance, array(
			'wsm-title' => '',
			'wsm-morelink' => '',
			'wsm-icon' => '',
		) );

		// WMPL
		/**
		 * Filter strings for WPML translation
     	 */
     	$instance['wsm-title'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-title'], 'Widgets', 'Web Savvy - Button Widget - Title' );
     	$instance['wsm-morelink'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-morelink'], 'Widgets', 'Web Savvy - Button Widget - Link' );
     	$instance['wsm-icon'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-icon'], 'Widgets', 'Web Savvy - Button Widget - Icon' );
     	// WPML


		echo $before_widget;


				echo '<div class="sidebar-btn"> ';


					if (!empty( $instance['wsm-title'] ) ) {
					if (!empty( $instance['wsm-morelink'] ) ) :
					$title = wp_kses_post($instance['wsm-title']);
						echo '<h4 class="btn-title">';
						echo '<a href="'. esc_attr( $instance['wsm-morelink'] ) . '"  style="background-image: url('. esc_attr( $instance['wsm-icon'] ) . ');">';
						echo $title;
						echo '</a>';
						echo '</h4>';

					else:

						$title = wp_kses_post($instance['wsm-title']);
						echo '<h4 class="btn-title" style="background-image: url('. esc_attr( $instance['wsm-icon'] ) . ');">';
						echo '<a href="#"  style="background-image: url('. esc_attr( $instance['wsm-icon'] ) . ');">';
						echo $title;
						echo '</a>';
						echo '</h4>';
					endif;

					}

				echo '</div><!--end .sidebar-btn-->';


				echo "\n\n";


		echo $after_widget;
		wp_reset_query();
	}

	/** Update a particular instance.
	 *
	 * This function should check that $new_instance is set correctly.
	 * The newly calculated value of $instance should be returned.
	 * If "false" is returned, the instance won't be saved/updated.
	 *
	 * @param array $new_instance New settings for this instance as input by the user via form()
	 * @param array $old_instance Old settings for this instance
	 * @return array Settings to save or bool false to cancel saving
	 */
	function update($new_instance, $old_instance) {
		$new_instance['wsm-title'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['wsm-title']) ) );
		$new_instance['wsm-morelink'] = strip_tags( $new_instance['wsm-morelink'] );
		$new_instance['wsm-icon'] = strip_tags( $new_instance['wsm-icon'] );

		// WMPL
		/**
		 * register strings for translation
     	 */
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - Button Widget - Title', $new_instance['wsm-title'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - Button Widget - Link', $new_instance['wsm-morelink'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - Button Widget - icon', $new_instance['wsm-icon'] );
	 	// WPML

		return $new_instance;
	}

	/** Echo the settings update form.
	 *
	 * @param array $instance Current settings
	 */
	function form($instance) {

		$instance = wp_parse_args( (array)$instance, array(

			'wsm-title' => '',
			'wsm-morelink' => '',
			'wsm-icon',

		) );

		$title = esc_attr($instance['wsm-title']);

?>

		<p><label for="<?php echo $this->get_field_id('wsm-title'); ?>"><?php _e('Title', 'deborah'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-title'); ?>" name="<?php echo $this->get_field_name('wsm-title'); ?>" value="<?php echo $title; ?>" class="widefat" /></p>

		<p><label for="<?php echo $this->get_field_id('wsm-morelink'); ?>"><?php _e('Link ', 'deborah'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-morelink'); ?>" name="<?php echo $this->get_field_name('wsm-morelink'); ?>" value="<?php echo esc_attr( $instance['wsm-morelink'] ); ?>" class="widefat" /></p>

		<p><label for="<?php echo $this->get_field_id('wsm-icon'); ?>"><?php _e('Icon ', 'deborah'); ?>: <small>32x32 PX</small></label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-icon'); ?>" name="<?php echo $this->get_field_name('wsm-icon'); ?>" value="<?php echo esc_attr( $instance['wsm-icon'] ); ?>" class="widefat" /></p>

	<?php
	}
}