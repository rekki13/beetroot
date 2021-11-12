<?php

class My_Widget extends WP_Widget {

	function __construct() {

		parent::__construct(
			'rekki_social_media', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: my_widget
			'Beetroot Socials',
			array('description' => 'Socials')
		);
	}

	public $args = array(
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
		'before_widget' => '<div class="widget-wrap">',
		'after_widget'  => '</div></div>'
	);

	public function widget( $args, $instance ) {

		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		echo '<div class="textwidget">';

		echo esc_html__( $instance['text'], 'text_domain' );
		if ( get_field('socials', 'beetroot-footer-fourth') ) {
			echo 'IMAGE!!';
		}
		echo '</div>';

		echo $args['after_widget'];

	}

	public function form( $instance ) {
//		print_r($instance);
//		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
//		$text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'text_domain' );
//		$socials = ! empty( $instance['socials'] ) ?$instance['socials']  : 0;
//		$socials = $instance['socials'];
////		$color = get_field('socials', 'beetroot-footer-fourth');
//		print_r($socials);
//		?>
<!--		<p>-->
<!--			<label for="--><?php //echo esc_attr( $this->get_field_id( 'title' ) ); ?><!--">--><?php //echo esc_html__( 'Title:', 'text_domain' ); ?><!--</label>-->
<!--			<input class="widefat" id="--><?php //echo esc_attr( $this->get_field_id( 'title' ) ); ?><!--" name="--><?php //echo esc_attr( $this->get_field_name( 'title' ) ); ?><!--" type="text" value="--><?php //echo esc_attr( $title ); ?><!--">-->
<!--		</p>-->
<!--		<p>-->
<!--			<label for="--><?php //echo esc_attr( $this->get_field_id( 'Text' ) ); ?><!--">--><?php //echo esc_html__( 'Text:', 'text_domain' ); ?><!--</label>-->
<!--			<textarea class="widefat" id="--><?php //echo esc_attr( $this->get_field_id( 'text' ) ); ?><!--" name="--><?php //echo esc_attr( $this->get_field_name( 'text' ) ); ?><!--" type="text" cols="30" rows="10">--><?php //echo esc_attr( $text ); ?><!--</textarea>-->
<!--		</p>-->
<!--        <input id="--><?php //echo $this->get_field_id('socials'); ?><!--" name="--><?php //echo $this->get_field_name('socials'); ?><!--" type="checkbox" --><?//= $socials?><!--/>-->
<!---->
<!--		--><?php
		$defaults = array (
			'socials' => isset( $instance['socials'] ) ? (bool) $instance['socials'] : false
		);
		$instance = wp_parse_args( (array) $instance, $defaults);
		print_r($instance);
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
//print_r($instance);
		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
		$instance['socials'] = (bool) $new_instance['socials'];

		return $instance;
	}

}
$my_widget = new My_Widget();
