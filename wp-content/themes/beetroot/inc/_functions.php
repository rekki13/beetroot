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
add_filter( 'wp_check_filetype_and_ext',
	function ( $data, $file, $filename, $mimes ) {
		$filetype = wp_check_filetype( $filename, $mimes );

		return [
			'ext'             => $filetype['ext'],
			'type'            => $filetype['type'],
			'proper_filename' => $data['proper_filename']
		];

	}, 10, 4 );

function cc_mime_types( $mimes ) {
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

add_action( 'wp_ajax_find-best-posts', 'vb_filter_posts_mt' );

/**
 * AJAC filter posts by taxonomy term
 */
function vb_filter_posts_mt() {
	if ( ! isset( $_POST['nonce'] )
	     || ! wp_verify_nonce( $_POST['nonce'], 'bobz' )
	) {
		die( 'Permission denied' );
	}


	/**
	 * Default response
	 */
	$response = [
		'status'  => 500,
		'message' => 'Something is wrong, please try again later ...',
		'content' => false,
		'found'   => 0
	];


	$all     = false;
	$terms   = $_POST['params']['terms'];
	$page    = intval( $_POST['params']['page'] );
	$qty     = intval( $_POST['params']['qty'] );
	$pager   = isset( $_POST['pager'] ) ? $_POST['pager'] : 'pager';
	$tax_qry = [ 'language', 'locations' ];
	$msg     = '';
//	$rekkiGridView =  $_POST['params']['rekkiView'] ;
	/**
	 * Check if term exists
	 */
	if ( ! is_array( $terms ) ) :
		$response = [
			'status'  => 501,
			'message' => 'Term doesn\'t exist',
			'content' => 0
		];

		die( json_encode( $response ) );
	else :

		foreach ( $terms as $tax => $slugs ) :

			if ( in_array( 'all-terms', $slugs ) ) {
				$all = true;
			}

			$tax_qry[] = [
				'taxonomy' => $tax,
				'field'    => 'slug',
				'terms'    => $slugs,
			];
		endforeach;
	endif;

	/**
	 * Setup query
	 */
	$args = [
		'paged'          => $page,
		'post_type'      => 'vacancies',
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
		'posts_per_page' => $qty,
	];

	if ( $tax_qry && ! $all ) :
		$args['tax_query'] = $tax_qry;
	endif;

	$qry = new WP_Query( $args );
	ob_start();
	$vacancy_count = wp_count_posts($qry->query_vars['post_type']);
	$rekki_view = ( $_POST['params']['rekkiView'] ); // 12345
	if ( $qry->have_posts() ) :
		echo( $rekki_view == 'grid' ? '<div class="row align-items-stretch">' : '<div class="table-responsive"><table class="table"> <thead><tr><th scope="col">'.$vacancy_count->publish.' opening</th><th scope="col">Department</th><th scope="col">Location</th><th scope="col">Tags</th><th scope="col">Client</th></tr> </thead>' );
		while ( $qry->have_posts() ) : $qry->the_post();

			?>
			<?php get_template_part( 'template-parts/parts/vacancies/vacancy',
				$rekki_view );
?>

		<?php endwhile;
		echo( $rekki_view == 'grid' ? '</div>' : '</table></div>' );
		/**
		 * Pagination
		 */
		if ( $pager == 'pager' ) {
			vb_mt_ajax_pager( $qry, $page );
		}


		foreach ( $tax_qry as $tax ) :
			$msg .= 'Displaying terms: ';

			foreach ( $tax['terms'] as $trm ) :
				$msg .= $trm . ', ';
			endforeach;

			$msg .= ' from taxonomy: ' . $tax['taxonomy'];
			$msg .= '. Found: ' . $qry->found_posts . ' posts';
		endforeach;

		$response = [
			'status'  => 200,
			'found'   => $qry->found_posts,
			'message' => $msg,
			'method'  => $pager,
			'next'    => $page + 1
		];
	else :
		$response = [
			'status'  => 201,
			'message' => 'No posts found',
			'next'    => 0
		];
	endif;
	$response['content'] = ob_get_clean();
	die( json_encode( $response ) );

}

add_action( 'wp_ajax_do_filter_posts_mt', 'vb_filter_posts_mt' );
add_action( 'wp_ajax_nopriv_do_filter_posts_mt', 'vb_filter_posts_mt' );


/**
 * Shortocde for displaying terms filter and results on page
 */
function vb_filter_posts_mt_sc( $atts ) {

	$icon_list   = get_stylesheet_directory()
	               . '/assets/images/icons/e-list.svg';
	$icon_grid   = get_stylesheet_directory()
	               . '/assets/images/icons/e-grid.svg';
	$icon_search = get_stylesheet_directory()
	               . '/assets/images/icons/e-search.svg';

	$a = shortcode_atts( array(
		'tax'      => 'languages',
		// Taxonomy
		'terms'    => false,
		// Get specific taxonomy terms only
		'active'   => false,
		// Set active term by ID
		'per_page' => - 1,
		// How many posts per page,
		'pager'    => 'pager',
		// 'pager' to use numbered pagination || 'infscr' to use infinite scroll
	), $atts );

	$b = shortcode_atts( array(
		'tax'      => 'locations',
		// Taxonomy
		'terms'    => false,
		// Get specific taxonomy terms only
		'active'   => false,
		// Set active term by ID
		'per_page' => - 1,
		// How many posts per page,
		'pager'    => 'pager',

		// 'pager' to use numbered pagination || 'infscr' to use infinite scroll
	), $atts );$c = shortcode_atts( array(
		'tax'      => 'departments',
		// Taxonomy
		'terms'    => false,
		// Get specific taxonomy terms only
		'active'   => false,
		// Set active term by ID
		'per_page' => - 1,
		// How many posts per page,
		'pager'    => 'pager'
		// 'pager' to use numbered pagination || 'infscr' to use infinite scroll
	), $atts );

	$result = null;
	$terms  = get_terms( $a['tax'])	;
	$termsb = get_terms( $b['tax'] );
	$termsC = get_terms( $c['tax'] );
	if ( count( $terms ) ) :
		ob_start(); ?>
        <div id="container-async" data-paged="<?= $a['per_page']; ?>"
             class="sc-ajax-filter sc-ajax-filter-multi">

            <div class="input-group">
                <i class="icon-search"><?= file_get_contents( $icon_search ); ?></i>
                <input id="myInput" type="text"
                       placeholder="Search job openings"
                       class="form-control input"
                       aria-label="Text input with dropdown button">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary border-0 dropdown-toggle ps-5"
                            type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">All
                        departments
                    </button>
                    <div class="dropdown-menu">
                        <ul class="nav-filter list-group list-group-horizontal">
							<?php foreach ( $termsC as $term ) : ?>
								<?php if ( $term->taxonomy == 'departments' ): ?>
                                    <li class="list-group-item p-0 <?php if ( $term->term_id
									                                          == $a['active']
									) : ?> active<?php endif; ?>">
                                        <a href="<?= get_term_link( $term,
											$term->taxonomy ); ?>"
                                           data-filter="<?= $term->taxonomy; ?>"
                                           data-term="<?= $term->slug; ?>"
                                           data-page="1"
                                           class="p-2 d-block">
											<?= $term->name; ?>
                                        </a>
                                    </li>
								<?php endif; ?>
							<?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary border-0 dropdown-toggle ps-5"
                            type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">All
                        locations
                    </button>
                    <div class="dropdown-menu">
                        <ul class="nav-filter list-group list-group-horizontal">
							<?php foreach ( $termsb as $term ) : ?>
								<?php if ( $term->taxonomy == 'locations' ): ?>
                                    <li class="list-group-item p-0 <?php if ( $term->term_id
									                                          == $a['active']
									) : ?> active<?php endif; ?>">
                                        <a href="<?= get_term_link( $term,
											$term->taxonomy ); ?>"
                                           data-filter="<?= $term->taxonomy; ?>"
                                           data-term="<?= $term->slug; ?>"
                                           data-page="1"
                                           class="p-2 d-block">
											<?= $term->name; ?>
                                        </a>
                                    </li>
								<?php endif; ?>
							<?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row row__filters my-5">
                <div class="col">
                    <ul class="nav-filter list-group list-group-horizontal">
                        <li class="list-group-item px-3 py-2 mx-2">
                            <a href="#"
                               data-filter="<?= $terms[0]->taxonomy; ?>"
                               data-term="all-terms" data-page="1"
                               class=" d-block">
                                Show All
                            </a>
                        </li>
						<?php foreach ( $terms as $term ) : ?>
							<?php if ( $term->taxonomy != 'locations' ): ?>
                                <li class="list-group-item px-3 py-2  mx-2 <?php if ( $term->term_id
								                                                      == $a['active']
								) : ?> active<?php endif; ?>">
                                    <a href="<?= get_term_link( $term,
										$term->taxonomy ); ?>"
                                       data-filter="<?= $term->taxonomy; ?>"
                                       data-term="<?= $term->slug; ?>"
                                       data-page="1"
                                       class="d-block">
										<?= $term->name . ' ' . $term->count ?>
                                    </a>
                                </li>
							<?php endif; ?>
						<?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-1 view__buttons">

                    <div class="btn-group d-flex align-items-stretch h-100"
                         role="group"
                         aria-label="Basic example">
                        <div class="col view__buttons-grid activeView">
                            <button type="button" id="vacancies__view-grid"
                                    value="grid"
                                    class="btn btn-secondary vacancies__view p-0 bg-transparent border-0"><?= file_get_contents( $icon_grid ); ?>
                            </button>
                        </div>
                        <div class="col view__buttons-list">
                            <button type="button" id="vacancies__view-list"
                                    value="list"
                                    class="btn btn-secondary vacancies__view p-0 bg-transparent border-0"><?= file_get_contents( $icon_list ); ?>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content"></div>
        </div>
		<?php $result = ob_get_clean();
	endif;

	return $result;
}

add_shortcode( 'ajax_filter_posts_mt', 'vb_filter_posts_mt_sc' );


/**
 * Pagination
 */
function vb_mt_ajax_pager( $query = null, $paged = 1 ) {

	if ( ! $query ) {
		return;
	}

	$paginate = paginate_links( [
		'base'      => '%_%',
		'type'      => 'array',
		'total'     => $query->max_num_pages,
		'format'    => '#page=%#%',
		'current'   => max( 1, $paged ),
		'prev_text' => 'Prev',
		'next_text' => 'Next'
	] );

	if ( $query->max_num_pages > 1 ) : ?>
        <ul class="pagination">
			<?php foreach ( $paginate as $page ) : ?>
                <li><?php echo $page; ?></li>
			<?php endforeach; ?>
        </ul>
	<?php endif;
}

function assets() {

	wp_enqueue_script( 'tuts/js', 'scripts/tuts.js', [ 'jquery' ], null, true );

	wp_localize_script( 'tuts/js', 'bobz', array(
		'nonce'    => wp_create_nonce( 'bobz' ),
		'ajax_url' => admin_url( 'admin-ajax.php' )
	) );
}

add_action( 'wp_enqueue_scripts', 'assets', 100 );
