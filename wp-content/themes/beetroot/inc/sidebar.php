<?php
function beetroot_register_widgets() {
	register_widget( 'My_Widget' );



	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'beetroot' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'beetroot' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar( array(
		'name'           => sprintf( __( 'Footer First' ),$i ),
		'id'             => "beetroot-footer-first",
		'description'    => '',
		'class'          => '',
		'before_widget'  => '',
		'after_widget'   => '',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'    => "</h6>\n",
		'before_sidebar' => '', // WP 5.6
		'after_sidebar'  => '', // WP 5.6
	) );
	register_sidebar( array(
		'name'           => sprintf( __( 'Footer Second' ),$i ),
		'id'             => "beetroot-footer-second",
		'description'    => '',
		'class'          => '',
		'before_widget'  => '',
		'after_widget'   =>'',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'    => "</h6>\n",
		'before_sidebar' => '', // WP 5.6
		'after_sidebar'  => '', // WP 5.6
	) );

	register_sidebar( array(
		'name'           => sprintf( __( 'Footer Third' ),$i ),
		'id'             => "beetroot-footer-third",
		'description'    => '',
		'class'          => '',
		'before_widget'  => '',
		'after_widget'   =>'',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'    => "</h6>\n",
		'before_sidebar' => '', // WP 5.6
		'after_sidebar'  => '', // WP 5.6
	) );register_sidebar( array(
		'name'           => sprintf( __( 'Footer Fourth' ),$i ),
		'id'             => "beetroot-footer-fourth",
		'description'    => '',
		'class'          => '',
		'before_widget'  => '',
		'after_widget'   =>'',
		'before_title'  => '<h6 class="widget-title">',
		'after_title'    => "</h6>\n",
		'before_sidebar' => '', // WP 5.6
		'after_sidebar'  => '', // WP 5.6
	) );
}