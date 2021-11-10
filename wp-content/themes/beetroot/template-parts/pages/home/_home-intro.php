<?php
/*
 * Home: Intro
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field = get_query_var( 'home_field' );;
$title         = $field['title'];
$text          = $field['text'];
$intro_columns = $field['columns'];
?>

<!-- Home Rise -->
<section class="home__intro section">

    <!-- container -->
    <div class="container">

        <!-- left -->
        <div class="row justify-content-center">
            <div class="col-8 row__benefits--left">
                <div class="row">

                    <h1><?= $title ?></h1>
                    <p><?= $text ?></p>


					<?php
					$i = 0;
					foreach ( $intro_columns as $row ) :
						$i ++;
						?>
                        <div class="col">
							<?php
							switch ( 'col_' . $i ) :
								case "col_1":
									$button = $row[ $i . '_button_info' ]; ?>
                                    <a href="<?= $button['url'] ?>"><?= $button['title'] ?></a> <?php

									break;
								case "col_2":
									$text = $row[ $i . '_text' ];
									echo( '<p>' . $text . '</p>' );
									break;
								case "col_3" or "col_4"  :
									foreach ( $row as $icons ) :
										foreach ( $icons as $icon ) :
											foreach ( $icon as $info ) :
												echo( '<img src="'
												      . $info['url'] . '" alt="'
												      . $info['alt'] . '">' );
											endforeach;
										endforeach;
									endforeach;
									break;
							endswitch;
							?>
                        </div>
					<?php
					endforeach;
					?>
                    <!-- end left -->

                </div>
            </div>
        </div>
        <!-- end left -->

    </div>
    <!-- end container -->

</section>
<!-- End Home Slider -->
