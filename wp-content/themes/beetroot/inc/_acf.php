<?php
defined( 'ABSPATH' ) || exit;

/**
 * Save ACF Settings to Json
 * @acf
 */
add_filter('acf/settings/save_json', 'beetroot_acf_json_save_point');

function beetroot_acf_json_save_point( $path ) {

    $path = get_stylesheet_directory() . '/acf-json';
    return $path;

}

/**
 * Load ACF Settings to Json
 * @acf
 */
add_filter('acf/settings/load_json', 'beetroot_acf_json_load_point');

function beetroot_acf_json_load_point( $paths ) {
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/acf-json';
    return $paths;

}

/**
 * Options page
 */
if (function_exists('acf_add_options_page')) {

    /**
     * Theme Settings
     */
    acf_add_options_page(array(
        'page_title'    => __('Theme Settings', 'beetroot'),
        'menu_title'    => __('Theme Settings', 'beetroot'),
        'menu_slug'     => 'theme_settings',
        'capability'    => 'edit_posts',
        'position'      => '15.54',
        'post_id'       => 'theme_settings',
        'icon_url'      => 'dashicons-schedule',
        'redirect'      => false
    ));

}

if( function_exists('acf_add_local_field_group') ):

	acf_add_local_field_group(array(
		'key' => 'group_618f5cbee18b7',
		'title' => 'Language image',
		'fields' => array(
			array(
				'key' => 'field_618f5ce49cabe',
				'label' => 'Image',
				'name' => 'image',
				'type' => 'image',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => '',
				'min_height' => '',
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
			array(
				'key' => 'field_6193453470',
				'label' => 'Color for icon',
				'name' => 'color',
				'type' => 'color_picker',
				'instructions' => '',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'languages',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
	));

endif;