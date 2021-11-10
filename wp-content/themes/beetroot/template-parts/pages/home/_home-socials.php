<?php

/*
 * Home: Benefits
 */
defined( 'ABSPATH' ) || exit;

/**
 * Socials
 */
$field = get_query_var( 'home_field' );
$title = $field['title'];
//print_r($field);
?>
<!-- Home Socials -->
<section class="home__socials section">

    <!-- container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 ">
                <div class="row row__socials justify-content-between">
                    <div class="col-9 socials__left ">
                        <h2><?= $title ?></h2>
                    </div>
                    <div class="col-3 socials__right ">
                        <ul class="list-group list-group-horizontal h-100">
							<?php
							foreach ( $field as $row ) :
								foreach ( $row as $social ):
									echo( '<li class="p-0">' );
									echo( '<a href="' . $social ['link']['url']
									      . '"class="btn p-0" ><img src="'
									      .$social ['icon']['url']. '" alt='
									      . $social ['icon']['alt'] . '></a>' );
									echo( '</li>' );
								endforeach;
							endforeach;
							?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end container -->

</section>
<!-- End Home Socials -->

