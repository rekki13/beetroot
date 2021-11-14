<?php
$id                = get_the_ID();
$language_taxonomy = get_the_terms( $id, 'languages' );
$location_taxonomy = get_the_terms( $id, 'locations' );

$location_icon = get_stylesheet_directory()
                 . '/assets/images/icons/e-location.svg';
$arrow_icon    = get_stylesheet_directory()
                 . '/assets/images/icons/e-arrow.svg';
$post_link = get_post_permalink($id);
//get_field( 'content', $id );
//get_field( 'customer_logo', $id );
$customer_logo =get_field( 'content', $id );
$vacancy_color = get_field( 'color', $id );
?>

    <div class="col-sm-4 col-xs-12 col-md-6 col-lg-4 col-xl-4 col-xxl-4 my-3 <?= $id ?> vacancy">
        <a href="<?=$post_link ?>" class="h-100 d-block">
            <div class="wrapper bg-white p-4 rounded d-block h-100">
                <div class="row vacancy__header align-items-center mb-2">
                    <div class="col"><?php the_title( '<h6>',
							'</h6>' ); ?></div>
                    <div class="col-3">
						<?php if ( $customer_logo[0]['customer_logo']): ?><img
                            src=" <?= $customer_logo[0]['customer_logo']['url'] ?>"
                            alt=" <?= $customer_logo[0]['customer_logo']['alt'] ?>">
						<?php endif ?>
                    </div>
                </div>
                <div class="row vacancy__body">
                    <div class="col"><?php the_content(); ?></div>
                </div>
                <div class="row vacancy__footer align-items-center"
                     style="fill:  <?= $vacancy_color ?>">
                    <div class="col-6 vacancy__footer-left">

                        <div class="locations">
							<?php
							if ( $location_taxonomy ):

								echo( '<span class="d-flex align-items-center">' );
								echo '<i class="d-inline-block">'
								     . file_get_contents( $location_icon )
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

                                                    <span>
						<?= __( 'Details' ) ?><i
                                                                class="d-inline-block">
<?= file_get_contents( $arrow_icon ) ?></i></span>
                        </div>
                    </div>
                    <div class="col-6 vacancy__footer-right justify-content-end d-flex">
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
						?>
                    </div>
                </div>
            </div>
        </a>
    </div>
<?php
?>