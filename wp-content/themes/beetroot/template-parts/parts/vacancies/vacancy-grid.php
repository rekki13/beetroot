<?php
$id                = get_the_ID();
$language_taxonomy = get_the_terms( $id, 'languages' );
$location_taxonomy = get_the_terms( $id, 'locations' );

$location_icon = get_stylesheet_directory()
                 . '/assets/images/icons/e-location.svg';
$arrow_icon    = get_stylesheet_directory()
                 . '/assets/images/icons/e-arrow.svg';

$customer_logo = get_field( 'customer_logo', $id );
$vacancy_color = get_field( 'color', $id );
?>

    <div class="col-4 <?= $id ?> my-5 vacancy">
        <a href="<?php get_permalink() ?>">
            <div class="wrapper bg-white p-4 rounded">
                <div class="row vacancy__header align-items-center mb-2">
                    <div class="col"><?php the_title( '<h6>',
							'</h6>' ); ?></div>
                    <div class="col-3">
						<?php if ( $customer_logo ): ?><img
                            src=" <?= $customer_logo['url'] ?>"
                            alt=" <?= $customer_logo['alt'] ?>">
						<?php endif ?>
                    </div>
                </div>
                <div class="row vacancy__body">
                    <div class="col"><?php the_content(); ?></div>
                </div>
                <div class="row vacancy__footer"
                     style="fill:  <?= $vacancy_color ?>">
                    <div class="col-8 vacancy__footer-left">

                        <div class="locations">
							<?php
							if ( $location_taxonomy ):

								echo( '<span class="d-inline-block">' );
								echo '<i class="d-inline-block">' . file_get_contents( $location_icon )
								     . '</i>';
								foreach ( $location_taxonomy as $location ):
									$location_name = $location->name;
									echo $location_name;
								endforeach;

								echo( '</span>' );

							endif;
							?>
                        </div>
                        <div class="details">

                            <span><?= __( 'Details' ) ?> <i
                                        class="d-inline-block"><?= file_get_contents( $arrow_icon ) ?></i></span>
                        </div>
                    </div>
                    <div class="col-4 vacancy__footer-right justify-content-end d-flex">
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
								echo( '<li class="list-group-item p-1 border-0">' );
								if ( $img_mime == 'image/png' ):
									echo( '<img src="'
									      . $lang_image['url']
									      . '"alt="'
									      . $lang_image['alt']
									      . '">' );
								else:
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
								endif;
								echo( '</li>' );


							endforeach;
							echo( '</ul>' );

						endif;
						?>
                    </div>
                </div>
            </div>
        </a>
    </div>
<?php
?>