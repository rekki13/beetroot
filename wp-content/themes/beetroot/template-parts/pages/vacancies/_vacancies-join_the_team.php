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

?>

<!-- Home Rise -->
<section class="vacancies__intro vacancies section">

    <!-- container -->
    <div class="container">


        <h1 class="text-center"><?= $title ?></h1>
        <p class="text-center"><?= $text ?></p>
    </div>
    <!-- end container -->

</section>
<!-- End Home Slider -->
