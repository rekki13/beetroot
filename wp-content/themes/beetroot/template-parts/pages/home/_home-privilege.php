<?php
/*
 * Home: Privilege
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field = get_query_var( 'home_field' );;
$text                = $field['text'];
$testimonials_enable = $field['add_testimonials'];
$repeater_item       = $field['repeater'];
$testimonials_array  = $field['choose_testimonial'];
?>

<!-- Home Rise -->
<section class="home__privilege section">

    <!-- container -->
    <div class="container">

        <!-- left -->
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="row">
                    <p class="mb-5 p-0"><?= $text ?></p>
                    <div class="col position-relative">
						<?php
						foreach ( $repeater_item as $item ) :?>
                            <div class="wrapper privilege__wrapper mb-5">
								<?php
								$title          = $item['title'];
								$list_privilege = $item['list_repeater'];
								echo( '<h2 class="p-0">' . $title
								      . '</h2>' ); ?>
                                <ul class="list-group ">

									<?php
									foreach ( $list_privilege as $list ) :
										echo( '<li class="list-group-item border-0"></span>' );
										echo $list['title'];
										echo( '</li>' );
									endforeach;

									?>

                                </ul>
                            </div>
						<?php

						endforeach;
						?>
				<?php

				if ( $testimonials_enable ):
					?>
                    <div class="items swiper-container  swiper-testimonials">
                        <div class="swiper-wrapper">
							<?php
							foreach ( $testimonials_array as $item ) :?>
								<?php
								get_template_part( 'template-parts/parts/_part',
									'page-testimonials',
									$item );
							endforeach;

							?></div>
                    </div></div><?php
				endif; ?>
            </div>                </div>

        </div>
        <!-- end left -->

    </div>
    <!-- end container -->

</section>
