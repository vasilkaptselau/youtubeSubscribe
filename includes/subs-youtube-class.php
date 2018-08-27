<?php
	

	/**
 * Adds Foo_Widget widget.
 */
class Subs_Youtube_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'subsyoutube_widget', // Base ID
			esc_html__( 'Subs Youtube', 'subs_domain' ), // Name
			array( 'description' => esc_html__( 'The Widget to display subs of youtube', 'subs_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		echo '<div class="g-ytsubscribe" data-channel="' .$instance['channel']. '" data-layout="'.$instance['layout'].'" data-count="'.$instance['count'].'"></div>';
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Subs Youtube', 'subs_domain' ); 
		$channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( 'your_Channel', 'subs_domain' ); 
		
		$layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'default', 'subs_domain' ); 
		$count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( 'default', 'subs_domain' ); 
		?>
		<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
					<?php esc_attr_e( 'Title:', 'subs_domain' ); ?>
				</label> 
				<input 
					class="widefat" 
					id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
					name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
					type="text" 
					value="<?php echo esc_attr( $title ); ?>">
		</p>
		
<!--Youtube Channel-->
		<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">
					<?php esc_attr_e( 'Channel:', 'subs_domain' ); ?>
				</label> 
				<input 
					class="widefat" 
					id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
					name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" 
					type="text" 
					value="<?php echo esc_attr( $channel ); ?>">
		</p>
		
		<!--Layout widget-->
		<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">
					<?php esc_attr_e( 'Layout:', 'subs_domain' ); ?>
				</label> 
				<select 
					class="widefat" 
					id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" 
					name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>" >
					<option value="default" <?php echo ($layout == 'default') ? 'selected' : ''; ?>>
					Default
					</option>
					<option value="full" <?php echo ($layout == 'full') ? 'selected' : ''; ?>>
					Full
					</option>
				</select>	
		</p>
		<!--Add Count-->
		<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>">
					<?php esc_attr_e( 'Count:', 'subs_domain' ); ?>
				</label> 
				<select 
					class="widefat" 
					id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" 
					name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>" >
					<option value="default" <?php echo ($count == 'default') ? 'selected' : ''; ?>>
					Default
					</option>
					<option value="hidden" <?php echo ($count == 'hidden') ? 'selected' : ''; ?>>
					Hidden
					</option>
				</select>	
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? sanitize_text_field( $new_instance['channel'] ) : '';
		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? sanitize_text_field( $new_instance['count'] ) : '';



		return $instance;
	}

} // class Foo_Widget