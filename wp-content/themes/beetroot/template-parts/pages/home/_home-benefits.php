<?php

/*
 * Home: Benefits
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */

$field = get_query_var( 'home_field' );
$title             = $field['title'];
$benefits_repeater = $field['benefits_repeater'];
if ( $benefits_repeater ) :

	?>
    <!-- Home Benefits -->
    <section class="home__benefits section">

        <!-- container -->
        <div class="container">

            <!-- left -->
            <div class="row justify-content-center">
                <div class="col-8 row__benefits">
                    <div class="row">

                        <h2><?= $title ?></h2>
						<?php
						foreach ( $benefits_repeater as $row ) :
							?>
                            <div class="col-6 row__benefits"><?= $row['text'] ?></div>

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
