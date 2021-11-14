<?php

/*
 * Home: Benefits
 */
defined( 'ABSPATH' ) || exit;

/**
 * Socials
 */
$field     = get_query_var( 'vacancies_field' );
$title     = $field['title'];
$socials_checkbox = $field['socials_checkbox'];
$alt_color=$field['alternative_colors'];
?>
<!-- Home Socials -->
<section class="vacancy__socials  section section--last">

    <!-- container -->
    <div class="container">
        <div class="row justify-content-center socials">
            <div class="col-10 ">
                <div class="row row__socials justify-content-between">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9 col-xl-9 col-xxl-9 socials__left ">
                        <h2><?= $title ?></h2>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-3 col-xxl-3 socials__right ">
                        <ul class="list-group list-group-horizontal justify-content-between h-100 <?=$alt_color?'alt-colors':'regular-colors'?>">
							<?php
							if ( $socials_checkbox ):
								$param = ['social_name'=>$socials_checkbox,'alt_colors' =>$alt_color];
                                get_template_part( 'template-parts/parts/_part-page',
											'socials',$param );
							endif;
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

