<?php
function beetroot_post_types(){
	register_post_type( 'testimonials', [
		'label'  => null,
		'labels' => [
			'name'               => 'Testimonials', // основное название для типа записи
			'singular_name'      => 'Testimonial', // название для одной записи этого типа
			'add_new'            => 'Add testimonial', // для добавления новой записи
			'add_new_item'       => 'Adding testimonial', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit testimonial', // для редактирования типа записи
			'new_item'           => 'New testimonial', // текст новой записи
			'view_item'          => 'Look testimonial', // для просмотра записи этого типа.
			'search_items'       => 'Search testimonial', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Testimonials', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-testimonial',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title','thumbnail', 'editor' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => [],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );

	register_post_type( 'vacancies', [
		'label'  => null,
		'labels' => [
			'name'               => 'Vacancies', // основное название для типа записи
			'singular_name'      => 'Vacancy', // название для одной записи этого типа
			'add_new'            => 'Add vacancy', // для добавления новой записи
			'add_new_item'       => 'Adding vacancy', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit vacancy', // для редактирования типа записи
			'new_item'           => 'New vacancy', // текст новой записи
			'view_item'          => 'Look vacancy', // для просмотра записи этого типа.
			'search_items'       => 'Search vacancy', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Vacancies', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => null, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-welcome-widgets-menus',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title','thumbnail', 'editor' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['languages','locations'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}
function beetroot_build_taxonomies(){
	register_taxonomy( 'locations', [ 'vacancies' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Locations',
			'singular_name'     => 'Location',
			'search_items'      => 'Search location',
			'all_items'         => 'All Location',
			'view_item '        => 'View Location',
			'parent_item'       => 'Parent Location',
			'parent_item_colon' => 'Parent Location:',
			'edit_item'         => 'Edit Location',
			'update_item'       => 'Update Location',
			'add_new_item'      => 'Add New Location',
			'new_item_name'     => 'New Genre Location',
			'menu_name'         => 'Locations',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
	register_taxonomy( 'languages', [ 'vacancies' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Languages',
			'singular_name'     => 'Language',
			'search_items'      => 'Search language',
			'all_items'         => 'All language',
			'view_item '        => 'View language',
			'parent_item'       => 'Parent language',
			'parent_item_colon' => 'Parent language:',
			'edit_item'         => 'Edit language',
			'update_item'       => 'Update language',
			'add_new_item'      => 'Add New language',
			'new_item_name'     => 'New Genre language',
			'menu_name'         => 'Languages',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		// 'publicly_queryable'    => null, // равен аргументу public
		// 'show_in_nav_menus'     => true, // равен аргументу public
		// 'show_ui'               => true, // равен аргументу public
		// 'show_in_menu'          => true, // равен аргументу show_ui
		// 'show_tagcloud'         => true, // равен аргументу show_ui
		// 'show_in_quick_edit'    => null, // равен аргументу show_ui
		'hierarchical'          => true,

		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}
