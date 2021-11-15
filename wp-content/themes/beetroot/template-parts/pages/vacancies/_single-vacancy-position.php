<?php

/*
 * Home: Benefits
 */
defined( 'ABSPATH' ) || exit;

/**
 * Position
 */

$field       = get_query_var( 'vacancies_field' );
$title       = $field['title'];
$input_forms = $field['input_forms'];
?>
<!-- Home Position -->
<section class="vacancy__position section">
    <!-- container -->
    <div class="container">
        <!-- left -->
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="row row__position">
                    <h2><?= $title ?></h2>
					<?php get_template_part( 'template-parts/parts/forms/index' ) ?>
                </div>

            </div>
        </div>

    </div>
    <!-- end container -->


</section>
<!-- End Home Position -->
