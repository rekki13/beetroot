<?php
/**
 * beetroot functions and definitions
 *
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package beetroot
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'beetroot_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function beetroot_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on beetroot, use a find and replace
		 * to change 'beetroot' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'beetroot',
			get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'beetroot' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'beetroot_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'beetroot_setup' );

function change_wp_version( $scripts ) {
	/**
	 * @var WP_Scripts $scripts
	 */
	$scripts->default_version = '5.8';
}

add_action( 'wp_default_scripts', 'change_wp_version', 10 );

/**
 * Register widget area.
 *
 * @since SPG 1.0
 *
 * @link  https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function beetroot_widgets_init() {
	beetroot_register_widgets();
}

add_action( 'widgets_init', 'beetroot_widgets_init' );


function beetroot_init() {
	beetroot_build_taxonomies();
	beetroot_post_types();
}

add_action( 'init', 'beetroot_init' );

function add_additional_class_on_li( $classes, $item, $args ) {
	if ( isset( $args->add_li_class ) ) {
		$classes[] = $args->add_li_class;
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'add_additional_class_on_li', 1, 3 );
function add_menu_link_class( $atts, $item, $args ) {
	if ( property_exists( $args, 'link_class' ) ) {
		$atts['class'] = $args->link_class;
	}

	return $atts;
}

add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );


add_filter( 'get_custom_logo', 'change_logo_class' );
function change_logo_class( $html ) {

	$html = str_replace( 'custom-logo', 'header-logo__image', $html );
	$html = str_replace( 'custom-logo-link', 'header-logo__link', $html );

	return $html;
}


add_action( 'admin_head', 'fix_svg_thumb_display' );


function icons_alternative_color( $svg ) {
	$dom = new DOMDocument();
	$dom->loadHTML( $svg );
	foreach (
		$dom->getElementsByTagName( 'svg' ) as $element
	) {
		$element->setAttribute( 'class', $icon['title'] );
	}
	$dom->saveHTML();
	$svg = $dom->saveHTML();

	return $svg;
}

function filter_wp_nav_menu_objects( $sorted_menu_items, $args ) {
	$menus = [ 'footer-1', 'footer-2', 'footer-3' ];
	if ( in_array( $args->menu->slug, $menus ) ):


		$args->menu_class = 'menu list-group';
		foreach ( $sorted_menu_items as $li ):

			$li->classes
				= 'menu-item menu-item-type-custom menu-item-object-custom list-group-item bg-transparent border-0 ps-0';
		endforeach;

	endif;

	return $sorted_menu_items;
}

;

// add the filter
add_filter( 'wp_nav_menu_objects', 'filter_wp_nav_menu_objects', 10, 2 );
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
	$filetype = wp_check_filetype( $filename, $mimes );
	return [
		'ext'             => $filetype['ext'],
		'type'            => $filetype['type'],
		'proper_filename' => $data['proper_filename']
	];

}, 10, 4 );

function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
	echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
             width: 100% !important;
             height: auto !important;
        }
        </style>';
}
add_action( 'admin_head', 'fix_svg' );


//Add image field in taxonomy page
add_action( 'languages_add_form_fields', 'add_custom_taxonomy_image', 10, 2 );
function add_custom_taxonomy_image ( $taxonomy ) {
	?>
	<div class="form-field term-group">

		<label for="image_id"><?php _e('Image', 'taxt-domain'); ?></label>
		<input type="hidden" id="image_id" name="image_id" class="custom_media_url" value="">

		<div id="image_wrapper"></div>

		<p>
			<input type="button" class="button button-secondary taxonomy_media_button" id="taxonomy_media_button" name="taxonomy_media_button" value="<?php _e( 'Add Image', 'taxt-domain' ); ?>">
			<input type="button" class="button button-secondary taxonomy_media_remove" id="taxonomy_media_remove" name="taxonomy_media_remove" value="<?php _e( 'Remove Image', 'taxt-domain' ); ?>">
		</p>

	</div>
	<?php
}

//Save the taxonomy image field
add_action( 'created_languages', 'save_custom_taxonomy_image', 10, 2 );
function save_custom_taxonomy_image ( $term_id, $tt_id ) {
	if( isset( $_POST['image_id'] ) && '' !== $_POST['image_id'] ){
		$image = $_POST['image_id'];
		add_term_meta( $term_id, 'category_image_id', $image, true );
	}
}

//Add the image field in edit form page
add_action( 'languages_edit_form_fields', 'update_custom_taxonomy_image', 10, 2 );
function update_custom_taxonomy_image ( $term, $taxonomy ) { ?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="image_id"><?php _e( 'Image', 'taxt-domain' ); ?></label>
		</th>
		<td>

			<?php $image_id = get_term_meta ( $term -> term_id, 'image_id', true ); ?>
			<input type="hidden" id="image_id" name="image_id" value="<?php echo $image_id; ?>">

			<div id="image_wrapper">
				<?php if ( $image_id ) { ?>
					<?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
				<?php } ?>

			</div>

			<p>
				<input type="button" class="button button-secondary taxonomy_media_button" id="taxonomy_media_button" name="taxonomy_media_button" value="<?php _e( 'Add Image', 'taxt-domain' ); ?>">
				<input type="button" class="button button-secondary taxonomy_media_remove" id="taxonomy_media_remove" name="taxonomy_media_remove" value="<?php _e( 'Remove Image', 'taxt-domain' ); ?>">
			</p>

			</div></td>
	</tr>
	<?php
}

//Update the taxonomy image field
add_action( 'edited_languages', 'updated_custom_taxonomy_image', 10, 2 );
function updated_custom_taxonomy_image ( $term_id, $tt_id ) {
	if( isset( $_POST['image_id'] ) && '' !== $_POST['image_id'] ){
		$image = $_POST['image_id'];
		update_term_meta ( $term_id, 'image_id', $image );
	} else {
		update_term_meta ( $term_id, 'image_id', '' );
	}
}

//Enqueue the wp_media library
add_action( 'admin_enqueue_scripts', 'custom_taxonomy_load_media' );
function custom_taxonomy_load_media() {
	if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'languages' ) {
		return;
	}
	wp_enqueue_media();
}

//Custom script
add_action( 'admin_footer', 'add_custom_taxonomy_script' );
function add_custom_taxonomy_script() {
	if( ! isset( $_GET['taxonomy'] ) || $_GET['taxonomy'] != 'languages' ) {
		return;
	}
	?>
	<script>
        jQuery(document).ready( function($) {
            function taxonomy_media_upload(button_class) {
                var custom_media = true,
                    original_attachment = wp.media.editor.send.attachment;
                $('body').on('click', button_class, function(e) {
                    var button_id = '#'+$(this).attr('id');
                    var send_attachment = wp.media.editor.send.attachment;
                    var button = $(button_id);
                    custom_media = true;
                    wp.media.editor.send.attachment = function(props, attachment){
                        if ( custom_media ) {
                            $('#image_id').val(attachment.id);
                            $('#image_wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
                            $('#image_wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
                        } else {
                            return original_attachment.apply( button_id, [props, attachment] );
                        }
                    }
                    wp.media.editor.open(button);
                    return false;
                });
            }
            taxonomy_media_upload('.taxonomy_media_button.button');
            $('body').on('click','.taxonomy_media_remove',function(){
                $('#image_id').val('');
                $('#image_wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
            });

            $(document).ajaxComplete(function(event, xhr, settings) {
                var queryStringArr = settings.data.split('&');
                if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
                    var xml = xhr.responseXML;
                    $response = $(xml).find('term_id').text();
                    if($response!=""){
                        $('#image_wrapper').html('');
                    }
                }
            });
        });
	</script>
	<?php
}

//Add new column heading
add_filter( 'manage_edit-languages_columns', 'display_custom_taxonomy_image_column_heading' );
function display_custom_taxonomy_image_column_heading( $columns ) {
	$columns['category_image'] = __( 'Image', 'taxt-domain' );
	return $columns;
}

//Display new columns values
add_action( 'manage_languages_custom_column', 'display_custom_taxonomy_image_column_value' , 10, 3);
function display_custom_taxonomy_image_column_value( $columns, $column, $id ) {
	if ( 'category_image' == $column ) {
		$image_id = esc_html( get_term_meta($id, 'image_id', true) );

		$columns = wp_get_attachment_image ( $image_id, array('50', '50') );
	}
	return $columns;
}