<?php
defined( 'ABSPATH' ) || exit;

/**
 * CSS files
 * @add_action
 * @wp_enqueue_scripts
 * @beetroot_styles
 */
add_action( 'wp_enqueue_scripts', 'beetroot_styles' );
function beetroot_styles() {
	/**
	 * Enqueue Style
	 * @wp_enqueue_style
	 */
    wp_enqueue_style( 'fonts-josefin-beetroot', 'https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap', [], null );
    wp_enqueue_style( 'bundle-beetroot', TEMPLATE_PATH . '/assets/css/bundle.css', [], '1.2.6' );

}
/**
 * JS files
 * @add_action
 * @wp_enqueue_scripts
 * @beetroot_scripts
 */
add_action( 'wp_enqueue_scripts', 'beetroot_scripts' );
function beetroot_scripts() {

    /**
     * Jquery
     */
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', TEMPLATE_PATH . '/assets/js/src/jquery/jquery.js', false, '3.4.2', false );
    wp_enqueue_script( 'jquery' );

	/**
	 * Enqueue Script
	 * @wp_enqueue_script
	 */

    wp_enqueue_script( 'bundle-beetroot', TEMPLATE_PATH . '/assets/js/bundle.js', ['jquery'], '1.1.0', true );

}
//
//function beetroot_scripts() {
//	wp_enqueue_style( 'beetroot-style', get_stylesheet_uri(), array(), _S_VERSION );
//	wp_style_add_data( 'beetroot-style', 'rtl', 'replace' );
//
//	wp_enqueue_script( 'beetroot-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
//
//	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
//		wp_enqueue_script( 'comment-reply' );
//	}
//}
//add_action( 'wp_enqueue_scripts', 'beetroot_scripts' );
