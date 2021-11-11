<?php

/*
 * Home: Benefits
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */

$field = get_query_var( 'home_field' );
$title = $field['title'];
$benefits_repeater = $field['benefits_repeater'];
if ( $benefits_repeater ) :

	?>
    <!-- Home Benefits -->
    <section class="home__benefits section">

        <!-- container -->
        <div class="container">

            <!-- left -->
            <div class="row justify-content-center">
                <div class="col-8 ">
                    <div class="row row__benefits">

                        <h2><?= $title ?></h2>
						<?php
						foreach ( $benefits_repeater as $row ) :?>
							<?php

							$img_type = exif_imagetype( $row['icon']['url'] );

							$img_mime = image_type_to_mime_type( $img_type );

							?>
                            <div class="col-6 benefit my-3">
                                <div class="row">
                                    <div class="col-2 ">
										<?php
										if ( $img_mime == 'image/png' ):
											echo( '<img src="'
											      . $row['icon']['url']
											      . '"alt="'
											      . $row['icon']['alt']
											      . '">' );
										else:
											$svg
												= file_get_contents( $row['icon']['url'] );

											$dom = new DOMDocument();
											$dom->loadHTML( $svg );
											foreach (
												$dom->getElementsByTagName( 'svg' )
												as $element
											) {
												$element->setAttribute( 'class',
													$row['icon']['title'] );
											}
											$dom->saveHTML();
											$svg = $dom->saveHTML();
											echo $svg;
										endif;

										?>
                                    </div>
                                    <div class="col-10">
										<?= $row['text'] ?>
                                    </div>
                                </div>
                            </div>

						<?php
						endforeach;
						?>
                        <!-- end left -->

                    </div>
                </div>
            </div>
        </div>
        <!-- end container -->
    </section>
    <!-- End Home Benefits -->
<?php
endif;
