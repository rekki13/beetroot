<?php
/*
 * Vacancies: Joint the team
 */
defined( 'ABSPATH' ) || exit;

/**
 * Fields
 */
$field = get_query_var( 'vacancies_field' );
$title = $field['title'];
$text  = $field['text'];

$locations_terms = get_terms( [
	'taxonomy' => 'locations',
	'hide_empty' => false,
] );
?>

<!-- Home Rise -->
<section class="vacancies__intro vacancies section">

    <!-- container -->
    <div class="container">
        <h1 class="text-center"><?= $title ?></h1>
        <p class="text-center"><?= $text ?></p>
        <?= do_shortcode('[ajax_filter_posts_mt]')?>
        <div class="tagged-posts">
        </div>


    </div>
    <!-- end container -->

</section>
<!-- End Home Slider -->
