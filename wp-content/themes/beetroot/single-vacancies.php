<?php
get_header();

$sections = get_field( 'content', get_the_ID() );
if( $sections ) :
	foreach ( $sections as $section ) :

		// TODO Old Version WP
		set_query_var( 'vacancies_field', $section );
		get_template_part(
			'template-parts/pages/vacancies/_single-vacancy',
			$section['acf_fc_layout']
		);

	endforeach;
endif;
get_footer();