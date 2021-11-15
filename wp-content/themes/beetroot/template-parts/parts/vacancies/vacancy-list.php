<?php
$id = get_the_ID();

$location_taxonomy   = get_the_terms( $id, 'locations' );
$department_taxonomy = get_the_terms( $id, 'departments' );
$language_taxonomy   = get_the_terms( $id, 'languages' );

$arrow_icon    = get_stylesheet_directory()
                 . '/assets/images/icons/e-arrow.svg';
$customer_logo = get_field( 'content', $id );

$vacancy_color = get_field( 'color', $id );


foreach ( $language_taxonomy as $lang_slug_hot ):

	if ( $lang_slug_hot->slug == 'hot' ):
		$lang_hot = $lang_slug_hot->name;
	endif;
endforeach;
$output ='';
if ( has_term( 'hot', 'languages', $id ) ) :
	$output = '<span class="mark-hot px-2 py-1">' . $lang_hot . '</span>';
else:
	$output ='';


endif;
?>
<tr class="vacancy__td">

    <th scope="row" class="vacancy__td-title"><?php the_title( '<h6>',
			 ' '. $output . '</h6>' ); ?></th>
    <td class="vacancy__td-department"><?php
		if ( $department_taxonomy ):
			foreach ( $department_taxonomy as $department ):
				$department_name = $department->name;
				echo $department_name;
			endforeach;

		endif;
		?></td>
    <td class="vacancy__td-location"><?php
		if ( $location_taxonomy ):

			echo( '<span class="d-flex align-items-center">' );
			foreach ( $location_taxonomy as $location ):
				$location_name = $location->name;
				echo $location_name;
			endforeach;

			echo( '</span>' );

		endif;
		?></td>
    <td style="fill:<?= $vacancy_color ?>" class="vacancy__td-tax">
		<?php
		if ( $language_taxonomy ):

			echo( '<ul class="list-group list-group-horizontal">' );

			foreach ( $language_taxonomy as $lang ):
				$lang_id    = $lang->term_id;
				$lang_image = get_field( 'image', $lang );
//								print_r( $lang_image );
				$img_type
					= exif_imagetype( $lang_image['url'] );

				$img_mime
					= image_type_to_mime_type( $img_type );
				echo( '<li class="list-group-item p-1 border-0" data-bs-toggle="tooltip" data-bs-placement="top" title="'
				      . $lang->name . '">' );
				if ( $img_mime == 'image/png' ):
					echo( '<img src="'
					      . $lang_image['url']
					      . '"alt="'
					      . $lang_image['alt']
					      . '">' );
				else:
					echo( '<i>' );
					$svg
						= file_get_contents( $lang_image['url'] );

					$dom = new DOMDocument();
					$dom->loadHTML( $svg );
					foreach (
						$dom->getElementsByTagName( 'svg' )
						as $element
					) {
						$element->setAttribute( 'class',
							$lang_image['title'] );
					}
					$dom->saveHTML();
					$svg = $dom->saveHTML();
					echo $svg;
					echo( '</i>' );

				endif;
				echo( '</li>' );


			endforeach;
			echo( '</ul>' );

		endif;
		?></td>
    <td class="vacancy__td-customer">
		<?php if ( $customer_logo[0]['customer_logo'] ): ?><img
            src=" <?= $customer_logo[0]['customer_logo']['url'] ?>"
            alt=" <?= $customer_logo[0]['customer_logo']['alt'] ?>">
		<?php endif ?>
    </td>

</tr>