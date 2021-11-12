<?php

/*
 * Home: Benefits
 */
defined( 'ABSPATH' ) || exit;

/**
 * Socials
 */
$field     = get_query_var( 'home_field' );
$title     = $field['title'];
$socials_checkbox = $field['socials_checkbox'];
$alt_color=$field['alternative_colors'];
?>
<!-- Home Socials -->
<section class="home__socials  section section--last">

    <!-- container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8 ">
                <div class="row row__socials justify-content-between">
                    <div class="col-9 socials__left ">
                        <h2><?= $title ?></h2>
                    </div>
                    <div class="col-3 socials__right ">
                        <ul class="list-group list-group-horizontal  h-100 <?=$alt_color?'alt-colors':'regular-colors'?>">
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

