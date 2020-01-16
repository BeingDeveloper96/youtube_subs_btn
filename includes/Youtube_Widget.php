<?php
class Youtube_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'youtube_widget', // Base ID
			esc_html__( 'Youtube Widget', 'ys_domain' ), // Name
			array( 'description' => esc_html__( 'A simple Youtube Subscribe Button', 'ys_domain' ), ) // Args
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
        echo '<div class="g-ytsubscribe" data-channel="' . $instance['channel'] . '" data-layout="' . $instance['layout'] . '" data-theme="dark" data-count="' . $instance['subs_count'] . '"></div>';
        
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
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Coke Studio', 'ys_domain' );
        
        $channel = ! empty( $instance['channel']) ? $instance['channel'] : esc_html__('CokeStudioPk', 'ys_domain');

        $layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__('default', 'ys_domain');

        $subs_count = ! empty( $instance['subs_count'] ) ? $instance['subs_count'] : esc_html__('default', 'ys_domain');
		?>

		<p>
		    <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
                <?php esc_attr_e( 'Title:', 'ys_domain' ); ?>
            </label> 
		    <input 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $title ); ?>">
		</p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">
                <?php esc_attr_e( 'Channel:', 'ys_domain' ) ?>
            </label>
            <input 
            type="text"
            class="widefat"
            id="<?php echo esc_attr( $this->get_field_id('channel') ); ?>"
            name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>"
            value="<?php echo esc_attr( $channel ); ?>">
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">
                <?php esc_attr_e( 'Layout:', 'ys_domain' ); ?>
            </label>
            <select 
            type="text"
            class="widefat"
            name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ) ?>">
                <option 
                value="<?php echo esc_attr( 'default' ) ?>"
                <?php echo ($layout == 'default') ? 'selected' : '' ?>>
                    <?php echo esc_attr_e( 'Default', 'ys_domain' ) ?>
                </option>

                <option 
                value="<?php echo esc_attr( 'full' ) ?>"
                <?php echo ($layout == 'full') ? 'selected' : '' ?>>
                    <?php echo esc_attr_e( 'Full', 'ys_domain' ) ?>
                </option>
            </select>
        </p>

        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'subs_count' ) ); ?>">
                <?php esc_attr_e( 'Subscriber count:', 'ys_domain' ); ?>
            </label>
            <select 
            type="text"
            class="widefat"
            name="<?php echo esc_attr( $this->get_field_name( 'subs_count' ) ) ?>">
                <option 
                value="<?php echo esc_attr( 'default' ) ?>"
                <?php echo ($subs_count == 'default') ? 'selected' : '' ?>>
                    <?php echo esc_attr_e( 'Default (Shown)', 'ys_domain' ) ?>
                </option>

                <option 
                value="<?php echo esc_attr( 'hidden' ) ?>"
                <?php echo ($subs_count == 'hidden') ? 'selected' : '' ?>>
                    <?php echo esc_attr_e( 'Hidden', 'ys_domain' ) ?>
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
        
        $instance['channel'] = ( !empty( $new_instance['channel'] ) ) ? sanitize_text_field( $new_instance['channel'] ) : '';

        $instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';

        $instance['subs_count'] = ( ! empty( $new_instance['subs_count'] ) ) ? sanitize_text_field( $new_instance['subs_count'] ) : '';

		return $instance;
	}

} // class Foo_Widget