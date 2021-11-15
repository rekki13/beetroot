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

		$defaults = array (
			'socials' => isset( $instance['socials'] ) ? (bool) $instance['socials'] : false
		);
		$instance = wp_parse_args( (array) $instance, $defaults);
		print_r($instance);
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		$instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
		$instance['socials'] = (bool) $new_instance['socials'];

		return $instance;
	}

}
$my_widget = new My_Widget();
