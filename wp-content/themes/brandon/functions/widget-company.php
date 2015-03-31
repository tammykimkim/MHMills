<?php
/**
 * Widget Muffin Company Box
 *
 * @package Brandon
 * @author Muffin group
 * @link http://muffingroup.com
 */

class Mfn_Company_Widget extends WP_Widget {

	
	/* ---------------------------------------------------------------------------
	 * Constructor
	 * --------------------------------------------------------------------------- */
	function Mfn_Company_Widget() {
		$widget_ops = array( 'classname' => 'widget_mfn_company', 'description' => __( 'Use this widget on pages to display Company Box.', 'mfn-opts' ) );
		$this->WP_Widget( 'widget_mfn_company', __( 'Muffin Company Box', 'mfn-opts' ), $widget_ops );
		$this->alt_option_name = 'widget_mfn_company';
	}
	
	
	/* ---------------------------------------------------------------------------
	 * Outputs the HTML for this widget.
	 * --------------------------------------------------------------------------- */
	function widget( $args, $instance ) {

		if ( ! isset( $args['widget_id'] ) ) $args['widget_id'] = null;
		extract( $args, EXTR_SKIP );

		echo $before_widget;
		
		$title = apply_filters( 'widget_title', $instance['title'], $instance, $this->id_base);
		if( $title ) echo $before_title . $title . $after_title;
		
		echo '<div class="company_box">';
			if( $instance['image'] ){
				echo '<div class="logo">';
					echo '<img class="scale-with-grid" src="'. $instance['image'] .'" alt="" />';
				echo '</div>';
			}
			echo $instance['text'];
		echo '</div>';

		echo $after_widget;
	}


	/* ---------------------------------------------------------------------------
	 * Deals with the settings when they are saved by the admin.
	 * --------------------------------------------------------------------------- */
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		
		$instance['title'] 	= strip_tags( $new_instance['title'] );
		$instance['image'] 	= strip_tags( $new_instance['image'] );
		$instance['text'] 	= $new_instance['text'];
		
		return $instance;
	}

	
	/* ---------------------------------------------------------------------------
	 * Displays the form for this widget on the Widgets page of the WP Admin area.
	 * --------------------------------------------------------------------------- */
	function form( $instance ) {
		
		$title 	= isset( $instance['title']) 	? esc_attr( $instance['title'] ) 	: '';
		$image 	= isset( $instance['image']) 	? esc_attr( $instance['image'] ) 	: '';
		$text 	= isset( $instance['text']) 	? esc_attr( $instance['text'] ) 	: '';

		?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'mfn-opts' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>"><?php _e( 'Image URL:', 'mfn-opts' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'image' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'image' ) ); ?>" type="text" value="<?php echo esc_attr( $image ); ?>" />
				<small>Please paste an uploaded image URL.<br />To use retina image please upload high-resolution image to the same directory with name "your-image-name@2x.png".</small>
			</p>
			
			<p>
				<textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" rows="7"><?php echo esc_attr( $text ); ?></textarea>
			</p>

		<?php
	}
}
?>