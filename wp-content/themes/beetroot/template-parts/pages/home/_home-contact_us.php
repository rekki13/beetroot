<?php
/*
 * Vacancies: Contact us
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field       = get_query_var( 'home_field' );
$title       = $field['title'];
$text        = $field['text'];
$button_text = $field['button_text'];
$button_link = $field['button_link'];

$locations_terms = get_terms( [
	'taxonomy'   => 'locations',
	'hide_empty' => false,
] );


?>

<!-- Home Rise -->
<section class="home__contact_us vacancies section">

    <!-- container -->
    <div class="container">

        <div class="row contact__us-row justify-content-center">
            <div class="col-3 row--left ">
	            <p class="text-center"><?= $text ?></p>

            </div>
            <div class="col-3 row--right">
	            <a href="<?= $button_link?>" class="link-info"><?= $button_text?></a>
            </div>
        </div>

    </div>
    <!-- end container -->

</section>
<!-- End Home Slider -->
