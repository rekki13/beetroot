<?php
/*
 * Home: Intro
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */

$field             = get_query_var( 'vacancies_field' );
$title             = $field['title'];
$text              = $field['text'];
$intro_columns     = $field['columns'];
$button_text       = $field['button_text'];
$id                = get_the_ID();
$language_taxonomy = get_the_terms( $id, 'languages' );
$location_taxonomy = get_the_terms( $id, 'locations' );
$customer_logo     = $field['customer_logo'];
//print_r($button_text);

?>

<!-- Home Rise -->
<section class="vacancy__intro section">

    <!-- container -->
    <div class="container">

        <!-- left -->
        <div class="row justify-content-center">
            <div class="col-10 row__benefits--left">
                <div class="row">

                    <h1><?= the_title() ?></h1>
                    <p><?= the_content() ?></p>
                    <div class="col col_2">
                        <a href="<?= $button_text['url'] ?>"
                           class="link-info"><?= $button_text['title'] ?></a>


                    </div>
                    <div class="col col_2">
						<?php
						if ( $location_taxonomy ):

							echo( '<span class="d-flex align-items-center">' );
							foreach ( $location_taxonomy as $location ):
								$location_name = $location->name;
								echo $location_name;
							endforeach;

							echo( '</span>' );

						endif;
						?>
                    </div>
                    <div class="col col_3">
						<?php

						if ( $language_taxonomy ):
							echo( '<ul class="list-group list-group-horizontal">' );

							foreach ( $language_taxonomy as $lang ):
								$lang_id    = $lang->term_id;
								$lang_image = get_field( 'image',
									$lang );
								$lang_color = get_field( 'color',
									$lang );
								if ( $lang_image ):
									$img_type
										= exif_imagetype( $lang_image['url'] );

									$img_mime
										= image_type_to_mime_type( $img_type );
									echo( '<li class="list-group-item p-1 border-0" style="fill: '
									      . $lang_color . '">' );
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

								endif;
							endforeach;
							echo( '</ul>' );

						endif;
						?>
                    </div>
                    <div class="col col_4"><?php if ( $customer_logo ): ?><img
                            src=" <?= $customer_logo['url'] ?>"
                            alt=" <?= $customer_logo['alt'] ?>">
						<?php endif ?></div>
                    <!-- end left -->

                </div>
            </div>
        </div>
        <!-- end left -->

    </div>
    <!-- end container -->

</section>
<!-- End Home Slider -->
