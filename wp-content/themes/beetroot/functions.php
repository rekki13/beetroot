<?php
/**
 * Enqueue scripts and styles.
 */



defined( 'ABSPATH' ) || exit;

/**
 * Autoload
 */
$base_dir = __DIR__ . '/inc/';
$files    = scandir( $base_dir );
foreach ( $files as $file ) {
	if ( ( $file !== '.' ) and ( $file !== '..' ) ) {
		load_template( $base_dir . '/' . $file, false );
	}
}
/**
 * Define
 *
 * @TEMPLATE_PATH
 */
define( 'TEMPLATE_PATH', get_template_directory_uri() );
//TODO Do not "insert" anything else into this file. !!!!
