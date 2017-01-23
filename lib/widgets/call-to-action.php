<?php
/**
 * Modification of the Genesis Featured Page Widget
 * to add customizable text area option.
 *
 */


add_action( 'widgets_init', create_function( '', "register_widget('WSM_CTA_Widget');" ) );


class WSM_CTA_Widget extends WP_Widget {

	/**
	 * Constructor. Set the default widget options and create widget.
	 */
	function WSM_CTA_Widget() {
		$widget_ops = array( 'classname' => 'wsm-cta', 'description' => __('Displays backgrounds and customizable headline and Link', 'deborah') );
		$control_ops = array( 'width' => 200, 'height' => 250, 'id_base' => 'wsm-cta-widget' );
		parent::__construct( 'wsm-cta-widget', __('Web Savvy - CTA Widget', 'deborah'), $widget_ops, $control_ops );
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
			'wsm-moretext' => '',
			'wsm-morelink' => '',
			'wsm-color' => '',
		) );

		// WMPL
		/**
		 * Filter strings for WPML translation
     	 */
     	$instance['wsm-title'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-title'], 'Widgets', 'Web Savvy - CTA Widget - Title' );
     	$instance['wsm-moretext'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-moretext'], 'Widgets', 'Web Savvy - CTA Widget - More Text' );
     	$instance['wsm-morelink'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-morelink'], 'Widgets', 'Web Savvy - CTA Widget - Link' );
     	$instance['wsm-color'] = apply_filters( 'wpml_translate_single_string', $instance['wsm-color'], 'Widgets', 'Web Savvy - CTA Widget - Update Color' );
     	// WPML


		echo $before_widget;

			// Set up the CTA's

				if (!empty( $instance['wsm-color'] ) ) :
					echo '<div class="cta-box cta-box" style=" border-color: '.esc_attr( $instance['wsm-color'] ) . ';">';
				else :
				echo '<div class="cta-box cta-box">';
				endif;


					if (!empty( $instance['wsm-title'] ) ) {
					$title1 = wp_kses_post($instance['wsm-title']);
						echo '<h4 class="widget-title widgettitle">';
						echo $title1;
						echo '</h4>';
					}


					if (!empty( $instance['wsm-moretext'] ) && !empty( $instance['wsm-morelink'] ) ) {
						echo '<div class="more-link">';

						if (!empty( $instance['wsm-color'] ) ) {
							echo '<a href="'. esc_attr( $instance['wsm-morelink'] ) . '" style=" background-color: '.esc_attr( $instance['wsm-color'] ) . ';">'. esc_attr( $instance['wsm-moretext'] ) . '</a>';
						}

						else {
							echo '<a href="'. esc_attr( $instance['wsm-morelink'] ) . '">'. esc_attr( $instance['wsm-moretext'] ) . '</a>';
						}

						echo '</div>';
					}

				echo '</div><!--end .cta-box-->';

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
		$new_instance['wsm-moretext'] = strip_tags( $new_instance['wsm-moretext'] );
		$new_instance['wsm-morelink'] = strip_tags( $new_instance['wsm-morelink'] );
		$new_instance['wsm-color'] = strip_tags( $new_instance['wsm-color'] );

		// WMPL
		/**
		 * register strings for translation
     	 */
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - CTA Widget - Title', $new_instance['wsm-title'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - CTA Widget - More Text', $new_instance['wsm-moretext'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - CTA Widget - Link', $new_instance['wsm-morelink'] );
	 	do_action( 'wpml_register_single_string', 'Widgets', 'Web Savvy - CTA Widget - Update Color', $new_instance['wsm-color'] );
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
			'wsm-moretext' => '',
			'wsm-morelink' => '',
			'wsm-color' => '',
		) );

		$title = esc_attr($instance['wsm-title']);
?>
	<!-- CTA -->

		<p><label for="<?php echo $this->get_field_id('wsm-title'); ?>"><?php _e('Title ', 'deborah'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-title'); ?>" name="<?php echo $this->get_field_name('wsm-title'); ?>" value="<?php echo $title; ?>" class="widefat" /></p>

		<p><label for="<?php echo $this->get_field_id('wsm-moretext'); ?>"><?php _e('More Text', 'deborah'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-moretext'); ?>" name="<?php echo $this->get_field_name('wsm-moretext'); ?>" value="<?php echo esc_attr( $instance['wsm-moretext'] ); ?>" class="widefat" /></p>

		<p><label for="<?php echo $this->get_field_id('wsm-morelink'); ?>"><?php _e('Link', 'deborah'); ?>:</label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-morelink'); ?>" name="<?php echo $this->get_field_name('wsm-morelink'); ?>" value="<?php echo esc_attr( $instance['wsm-morelink'] ); ?>" class="widefat" /></p>

		<p><label for="<?php echo $this->get_field_id('wsm-color'); ?>"><?php _e('Update Color', 'deborah'); ?>: <small>Ex: #000000</small></label>
		<input type="text" id="<?php echo $this->get_field_id('wsm-color'); ?>" name="<?php echo $this->get_field_name('wsm-color'); ?>" value="<?php echo esc_attr( $instance['wsm-color'] ); ?>" class="widefat" /></p>


	<?php
	}
}